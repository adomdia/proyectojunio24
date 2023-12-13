<?php

namespace App\Http\Controllers;


use App\Helpers\CartHelper;
use App\Helpers\FlashHelper;
use App\Models\Order;
use App\Models\OrderDetail;
use App\PlanSuscripcion;
use App\SuscripcionUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Stripe;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Subscription;

class StripeController extends Controller
{
    public function index()
    {
        $productos_prices= [];
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $products=Stripe\Product::all(['active'=>true]);
        foreach($products as $producto) {
            $prices=Stripe\Price::all(['product'=>$producto->id]);
            $productos_prices+=[$producto->name =>$prices['data'][0]->id];
        }
        $products=Stripe\Product::all(); //Trae todos los productos creados en Stripe y los muestra en la vista
        return view('teststripe',compact('productos_prices'));
    }
    public function crearProducto(Request $request){

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $new_product=Stripe\Product::create([
            'name' => 'Producto test diario',
            'description' => 'Producto test diario'
        ]);
        Stripe\Price::create([
            'unit_amount' => 15*100,
            'currency' => 'eur',
            'recurring' => ['interval' => 'day'],
            'product' => $new_product->id, //Asocia al precio el producto creado
        ]);
    }
    public function realizarPago(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'billing_address' => 'required|string|max:255',
            'modifications' => 'nullable|string|max:255',
            'terms_check' => 'required|accepted',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error_validación', 'message' => 'Los datos introducidos no son válidos.'],500);
        } else {
            $user = auth()->user();
            $token = $request->stripeToken;
            $paymentMethod = $request->paymentMethod;
            Stripe\Stripe::setApiKey(Config::get('services.stripe.secret'));
            $customer = null;
            try {
                $customer = Customer::retrieve($user->stripe_id);
            } catch (\Exception $e) {
                Log::error('Error obtener cliente al realizar suscripcion');
                Log::error($e->getMessage());
            }
            if (is_null($user->stripe_id) || $customer == null || $customer->isDeleted()) {
                $cliente = Customer::create([
                    'name' => auth()->user()->name . ' ' . auth()->user()->surname,
                    'email' => auth()->user()->email,
                    'description' => 'Usuario de la plataforma XX',
                    'preferred_locales'=>[Config::get('app.locale')]
                ]);
                $user->stripe_id = $cliente->id;
                $user->save();
            }
            Customer::createSource($user->stripe_id, ['source' => $token]);
            $charge = Charge::create(array(
                'customer' => $user->stripe_id,
                'amount' => 10*100,
                'currency' => 'eur',
                'description' => 'Pedido realizado por ' . $user->name . ' ' . $user->lastname,
                "receipt_email"=> auth()->user()->email,
            ));

            if($charge['status']=='succeeded'){;
                //TODO=>Todo lo que queramos hacer despues de comprobar pago ok
                FlashHelper::success('El pago se ha realizado correctamente.');
                return redirect()->route('orders.index');
            }else{
                FlashHelper::danger('Ha ocurrido un error al realizar el pago.');
                return redirect()->back();
            }
        }

    }
    public function pagoSuscripcion(Request $request)
    {
        //dd($request->all());
        $user = auth()->user();
        $input = $request->all();
        $token = $request->stripeToken;
        try {
            $customer = null;
            try {
                $customer = Customer::retrieve($user->stripe_id);
            } catch (\Exception $e) {
                Log::error('Error obtener cliente al realizar suscripcion');
                Log::error($e->getMessage());
            }
            if (is_null($user->stripe_id) || $customer->isDeleted() || $customer == null) {
                $cliente = Customer::create([
                    'name' => auth()->user()->name . ' ' . auth()->user()->surname,
                    'email' => auth()->user()->email,
                    'description' => 'Usuario de la plataforma XX'
                ]);
                $user->stripe_id = $cliente->id;
                $user->save();
            }
            Customer::createSource($user->stripe_id, ['source' => $token]);
            $suscripciones_activas = SuscripcionUsuario::where('user_id', auth()->id())->get();
            // Eliminamos todas las suscripciones que tuviera activa
            if ($suscripciones_activas) {
                foreach ($suscripciones_activas as $sus) {
                    $sus->delete(); // borro de bd
                    $suscripcion = Subscription::retrieve($sus->suscripcion_id);
                    if ($suscripcion) {
                        $suscripcion->delete(); // borro de stripe
                    }
                }
            }
            $subscription = Subscription::create(array(
                    'customer' => $user->stripe_id,
                    'items' => [
                        ['price' => $input['price_key']],
                    ])
            );
            $plan = PlanSuscripcion::select('id')->where('price_id', $subscription['plan']->id)->first();
            if (!$plan) {
                Log::error('Error al realizar suscripcion. Plan inexistente en BD');
                FlashHelper::danger('El plan no existe, contacta con el administrador.');
                return redirect()->back();
            }
            //Creamos registro de suscripcion nueva en bd, con los datos proporcionados de stripe
            $suscripcion_user = SuscripcionUsuario::create([
                'user_id' => auth()->id(),
                'plan_id' => $plan->id,
                'pagado' => 1,
                'suscripcion_id' => $subscription['id'],
            ]);
            session()->forget('tarifa_sesion');
            FlashHelper::success('Suscripción creada correctamente.');
            return redirect()->route('show.profile');
        } catch (\Exception $e) {
            return back()->with('success', $e->getMessage());
        }
    }
    public function cancelarSuscripcion()
    {
       // Comprobamos que tiene suscripcion activa en BD $misuscripcion = SuscripcionUsuario::where('user_id', auth()->id())->first();
        $misuscripcion = collect(['estado'=>'activa']);
        if (true) {
            $suscripcion = Subscription::retrieve(/*Id suscripcion de stripe*/);
            if ($suscripcion) {
                $suscripcion->delete(); //Borramos la de stripe
                $misuscripcion->delete(); // Borramos la de bd
                FlashHelper::success('Suscripción cancelada correctamente.');
                return redirect()->route('show.profile');
            } else {
                FlashHelper::danger('Ha ocurrido un error.');
                return redirect()->back();
            }
        } else {
            FlashHelper::warning('No tienes ninguna suscripcion activa.');
            return redirect()->back();
        }

    }

}
