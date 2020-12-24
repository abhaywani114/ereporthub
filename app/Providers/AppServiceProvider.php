<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use \App\Service\textlocal;

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
        //
          Schema::defaultStringLength(191);
//5OwY7hO4KWc-AyfPEX03r7PneCNcnpNFZnjdxmFXUn ||| eAgNDDl/unk-AriCKcCzaxxv90pr7pIMLXjg1tn0yf
          app()->singleton('textLocal',function($App) {
            return new \App\Services\Textlocal(false,false,'eAgNDDl/unk-AriCKcCzaxxv90pr7pIMLXjg1tn0yf',null,true);
          });

    }
}
