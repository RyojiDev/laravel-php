<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
         $this->app->singleton('GuzzleHttp\Client', function(){

                 return new Client([
                     
     #não mexer nessa linha - servidor local Home //'base_uri' => 'http://localhost:8080/gestor_api/',  

                  'base_uri' => 'http://172.16.0.198:8080/gestor_api/',
                
                    'timeout' => 2.0,
               ]);
         });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
