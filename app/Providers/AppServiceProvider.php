<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

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
        Sanctum::getAccessTokenFromRequestUsing(
            function ($request) {
                if($request->has('api_token')){
                    return $request->api_token;
                } else if($request->hasHeader('Authorization')) {
                    return $request->header('Authorization');
                }
            }
        );
        Schema::defaultStringLength(191);
    }
}
