<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use PharIo\Manifest\Application;
use Illuminate\Http\Request;

class MultiLenguaje
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    private $locales = ['es', 'en'];

    public function handle(Request $request,  Closure $next)
    {
        App::setLocale(session('locale'));

        return $next($request);
    }
}
