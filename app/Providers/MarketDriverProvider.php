<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class MarketDriverProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('MarketDriverProvider', function ($app) {
            return function (Request $request) {
                $selectedMarkets = ['basalam', 'insta'];
                return array_map(function ($driver) {
                    return new (config("driver.$driver.driver", "kareto"));
                }, $selectedMarkets);
            };
        });
    }

    public function boot()
    {
        //
    }    
}
