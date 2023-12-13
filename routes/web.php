<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TestController;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', 'IndexController@index')->name('index');
Route::get('/home', 'IndexController@home')->name('home');
Route::get('/index', 'IndexController@index')->name('index');
Route::get('/registro', 'AuthController@index')->name('reg');
Route::get('/acceder', 'AuthController@acceder')->name('log');
Route::post('/registrar','AuthController@store')->name('registrar');
Route::post('/validate_code','AuthController@validar_code')->name('validar');
Route::get('/validar_code','AuthController@validar')->name('validar_code');
Route::post('/loginV','AuthController@login')->name('loginV');


// Auth::routes(['verify' => true]);


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/ejemplo-slide', function () {
        return view('ejemplo_slide');
    })->name('ejemplo.slide');

    Route::get('/notificaciones', function () {
        return view('notificaciones');
    })->name('notificaciones');
    Route::get('/livewire', function () {
        return view('ejemplo_livewire');
    })->name('livewire');
    Route::get('/fancy-box', function () {
        return view('fancybox');
    })->name('fancybox');
    Route::get('/editar-perfil','UserController@showProfile')->name('edit.perfil.form');
    Route::post('/send-update-perfil','UserController@updateProfile')->name('update.profile');

    Route::get('/dompdf', function () {
        return view('dompdf');
    })->name('dompdf');
    Route::post('/download-dompdf', function () {
        $data['dato_1'] = 1;
        $data['dato_2'] = 2;
        $pdf = Pdf::loadView('pdf.invoice', array('data'=>$data));
        return $pdf->download('factura_123.pdf');
    })->name('download-dompdf');

});

require __DIR__ . '/auth.php';

##Stripe
Route::group(['middleware' => 'auth'], function () {
    Route::get('/subscription/create', [\App\Http\Controllers\StripeController::class, 'index'])->name('subscription.create');
    Route::post('order-post', [\App\Http\Controllers\StripeController::class, 'orderPost'])->name('order-post');
});

Route::group(['prefix' => 'intranet'], function () {
    Route::group(['middleware' => 'admin.user'], function () {
        Route::get('/users/suplantar/{id}', [\App\Http\Controllers\AdminExtraController::class, 'suplantar'])->name('suplantar');
        // Route::get('/users/suplantar/{id}', [UserController::class,'suplantar'])->name('suplantar');
        Route::any('/cms/imagesave', 'Admin\VoyagerController@saveImage')->name('intranet.contentbuilder.saveimage');
        Route::get('/ayuda', function () {
            return view('vendor.voyager.ayuda.index');
        })->name('ayuda');
    });
    Voyager::routes();
});
Route::get('language/{locale}', 'LanguageController@setLocale')->where('locale','en|es')->name('language');
