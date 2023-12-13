<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Session;
use URL;

class LanguageController extends Controller
{
    public function setLocale($locale = 'es')
    {
        if (!in_array($locale, ['es', 'en'])){
            $locale = 'es';
        }

        //\Illuminate\Support\Facades\Session::put('locale', $locale);
        //config('app.locale', $locale);
        Session::put('locale', $locale);
        App::setLocale(session('locale'));
        Carbon::setLocale($locale);

        return redirect(url(URL::previous()));
    }
}
