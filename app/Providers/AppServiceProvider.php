<?php

namespace App\Providers;

use App\FormFields\ContentBuilderFormField;
use App\Http\Controllers\Admin\VoyagerController;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Facades\Voyager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\TCG\Voyager\Http\Controllers\VoyagerController::class, VoyagerController::class);
        Voyager::addFormField(ContentBuilderFormField::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Carbon::setUtf8(true);
        Carbon::setLocale(config('app.locale'));
        setlocale(LC_ALL, 'es_ES', 'es', 'ES', 'es_ES.utf8');
        Paginator::useBootstrap();
    }
}
