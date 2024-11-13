<?php

namespace App\Providers;

use App\Http\Controllers\UtmController;
use App\Models\Acercade;
use App\Models\Menu;
use App\Models\Plantel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $utmRecurso = new UtmController();
        $dataUtm = $utmRecurso->iniciarUtmSource();
        $planteles = Plantel::all();
        $acercade = Acercade::all();
        $menus = Menu::all()->sortBy('nombre');

        $data = array(
            "planteles" => $planteles,
            "acercade" => $acercade,
            "menus" => $menus,
            "dataUTM" => $dataUtm
        );

        View::share('data', $data);
    }
}
