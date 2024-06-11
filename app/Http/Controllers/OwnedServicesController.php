<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OwnedService;
use App\Helpers\FlashHelper;


class OwnedServicesController extends Controller
{
    public function submitRating(Request $request)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $ownedService = OwnedService::where('service_id', $request->servicio_id)->first();

        $ownedService->valoracion = $request->rating;

        $ownedService->save();

        FlashHelper::success('Gracias por compartir tu opinión');
        return redirect()->route('show.myServices');
    }
}
