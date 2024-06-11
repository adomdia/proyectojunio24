<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Helpers\FlashHelper;
use Barryvdh\DomPDF\Facade as PDF;


use App\Models\Service;
use App\Models\ServicioInvoice;
use App\Models\OwnedService;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class ServicioController extends Controller
{
    public function index()
    {
        return view('subir_servicio');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'price' => 'required|numeric'
        ]);
        
        if ($validator->fails()) {
            FlashHelper::warning('Los datos recibidos no son válidos.');
            return redirect()->route('subir_servicio');
        } else {
            $user = Auth()->user();
            $imagenes = array();

            if ($request->file('img')) {
                foreach($request->file('img') as $img){
                    $month = date('F');
                    $year = date('Y');
                    $imagen = $img;
                    $nombreImg = Str::random(10) . time();
                    $extension = $imagen->clientExtension();
                    $nombreCompletoImg = $nombreImg . "." . $extension;
                    $path_avatar = 'servicios/' . $month . $year . '/' . $nombreCompletoImg;
                    $imagen->storeAs('public/servicios/' . $month . $year, $nombreCompletoImg);
                    $imagenes['download_link'] = $path_avatar;
                    $imagenes['original_name'] = $nombreCompletoImg;
                }
            }

            // dd(json_encode($imagenes), $imagenes);

            $publicacion = new Service([
                'user_id' => $user->id,
                'title' => $request->title,
                'multimedia' => "[".json_encode($imagenes)."]",
                'price' => $request->price,
                'text' => $request->text,


            ]);
            $publicacion->save();

            return redirect()->route('home');
        }
        
    }

    public function show()
    {
        $ownedServices = OwnedService::where('user_id', Auth()->user()->id)->pluck('service_id');

        $servicios = Service::where('user_id', '!=', Auth()->user()->id)
            ->whereNotIn('id', $ownedServices)
            ->get()
            ->sortByDesc(function ($service) {
                return $service->averageRating();
            });

        return view('servicios', compact('servicios'));
    }

    public function mostrarFormularioPago($id)
    {
        $servicio = Service::findOrFail($id);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $paymentIntent = PaymentIntent::create([
            'amount' => ($servicio->price * 100), 
            'currency' => 'eur',
        ]);

        return view('pasarela_pago', ['client_secret' => $paymentIntent->client_secret] , compact('servicio'));
    }

    public function confirmarPagoAcademia(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $user = Auth()->user();

        $precio = round(($request->price  * 1.21), 2);
        try {
            $customer = Customer::create([
                'email' => $user->email,
                'source' => $request->stripeToken
            ]);

            $charge = Charge::create([
                'customer' => $customer->id,
                'amount' => $precio * 100,
                'currency' => 'eur'
            ]);

            if($request->user_dni != null){
                $user->user_dni = $request->user_dni; 
                $user->save();
            }

            $playtogether['name'] = "PlayTogether SL";
            $playtogether['address'] = "Calle de las Flores";
            $playtogether['nif'] = "B12345678";
            $fecha = date("d/m/Y");
            $concepto = "Compra servicio: $request->servicio_name";
            $precioSinIva = $request->price;
            $iva = round(($request->price * 0.21), 2);
    
            $data = [
                'user' => $user,
                'userName' => $request->name,
                'userStreet'=> $request->street_name,
                'userCity'=> $request->city_name,
                'userProvince'=> $request->street_name,
                'playtogether' => $playtogether,
                'fecha' => $fecha,
                'concepto' => $concepto,
                'precio' => $precio,
                'iva' => $iva,
                'precioSinIva' => $precioSinIva

            ];
    
            $pdf = PDF::loadView('pdf-factura', $data);

            $month = date('F');
            $year = date('Y');
            $nombre = now()->format('YmdHis') . Str::random(5);
            $nombreCompletoPdf = $nombre . ".pdf";
            $pdf_path = 'facturas_servicios/' . $month . $year . '/' . $nombreCompletoPdf;
            Storage::put("public/".$pdf_path, $pdf->output());

            OwnedService::create([
                'user_id' => $user->id,
                'service_id' => $request->servicio_id
            ]);
    
            ServicioInvoice::create([
                'user_id' => $user->id,
                'pdf_path' => $pdf_path
            ]);

            FlashHelper::success('Tu compra se ha realizado con éxito');
            return redirect()->route('show.myServices')->with('pdf_path', $pdf_path); 
        } catch (\Exception $ex) {
            dd($ex);
            return redirect()->back()->with(['message-error' => 'Hubo un error al procesar el pago de la suscripción. Asegúrate de que has introducido los datos de tu tarjeta correctamente'])->withInput();
        }
    }


    public function myServices()
    {
        $owned = OwnedService::where('user_id', Auth()->user()->id)->pluck('service_id');

        $servicios = Service::whereIn('id', $owned)->get();

        return view('my_services', compact('servicios'));
    }

    public function showSingle($id)
    {
        $servicio = Service::where('id', $id)->first();

        return view('single_service', compact('servicio'));
    }
}
