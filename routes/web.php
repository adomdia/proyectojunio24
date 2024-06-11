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






//Auth::routes(['verify' => true]);


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


//PUBLICACIONES
Route::get('/subir_publicacion','UserContentController@index')->name('subir_publicacion');
Route::post('/upload_publicacion','UserContentController@store')->name('upload_publicacion');

//PERFIL
Route::get('/perfil', 'UserController@showProfile')->name('user_profile');
Route::get('/edit-perfil', 'UserController@editProfile')->name('user_edit_profile');
Route::post('/editar-perfil', 'UserController@updateProfile')->name('edit_profile');
Route::get('/perfil/{id}', 'UserController@showGuestProfile')->name('guest_profile');


//USUARIOS
Route::get('/usuarios', 'AmistadController@index')->name('users');
Route::get('/obtener_usuarios', 'IndexController@getUsers')->name('getUsers');

//AMISTAD
Route::post('/send_solicitude', 'AmistadController@sendSolicitude')->name('send_solicitude');
Route::post('/cancel_solicitude', 'AmistadController@cancelSolicitude')->name('cancel_solicitude');
Route::post('/block_user', 'AmistadController@blockUser')->name('block_user');
Route::post('/unblock_user', 'AmistadController@unblockUser')->name('unblock_user');
Route::get('/get_friendship_status/{userId}', 'AmistadController@getFriendshipStatus');

Route::get('/solicitudes', 'AmistadController@getSolicitud')->name('solicitud');
Route::post('/rechazar_solicitud', 'AmistadController@rechazarSolicitud')->name('rechazar_solicitud');
Route::post('/aceptar_solicitud', 'AmistadController@aceptarSolicitud')->name('aceptar_solicitud');
Route::get('/are_friends/{userId}', 'AmistadController@areFriends')->name('are_friends');
Route::post('/remove_friend', 'AmistadController@removeFriend')->name('remove_friend');

Route::get('/amigos', 'AmistadController@show')->name('amigos');


//CHAT
Route::get('/chat/{user}', 'ChatController@show')->name('chat');

Route::middleware(['auth'])->group(function () {
    Route::get('/chat/{userId}/messages', 'ChatController@getMessages')->name('chat.messages');
    Route::post('/chat/{userId}/sends', 'ChatController@sendMessage')->name('chat.send');
});


//COMENTARIOS Y LIKES
Route::post('/send_comment', 'UserContentController@comment')->name('post.comment');
Route::post('/like-post', 'UserContentController@like')->name('like.post');
Route::post('/unlike-post', 'UserContentController@unlike')->name('unlike.post');

//FORO 
Route::get('/foro', 'ForoContentController@index')->name('foro');
Route::get('/subforo/{id}', 'ForoContentController@subforo')->name('subforo');


//SERVICIOS
Route::get('/subir_servicio','ServicioController@index')->name('subir_servicio');
Route::post('/upload_servicio','ServicioController@store')->name('upload_servicio');
Route::get('/servicios', 'ServicioController@show')->name('show.services');
Route::get('/pagos/{id}', 'ServicioController@mostrarFormularioPago')->name('pagos-servicios');
Route::post('/confirmar-pago', 'ServicioController@confirmarPagoAcademia')->name('confirmar-pago');
Route::get('/my_services', 'ServicioController@myServices')->name('show.myServices');
Route::get('/servicio/{id}', 'ServicioController@showSingle')->name('show.single.service');
Route::post('/submit-rating', 'OwnedServicesController@submitRating')->name('submit.rating');


