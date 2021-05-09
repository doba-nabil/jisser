<?php

namespace App\Providers;

use App\Models\Models\PopupAd;
use App\Models\Option;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        if(\Schema::hasTable('popup_ads')){
            $popup = PopupAd::find(1);
            if(!isset($popup)){
                $po = new PopupAd();
                $po->id = 1;
                $po->link = '#';
                $po->save();
            }
        }
        $option = Option::find(1);
        view()->share('options', $option);
    }
}
