<?php

namespace App\Providers;

use App\Services\Geo\GeoServiceInterface;
use App\Services\Geo\IpApiGeoService;
use App\Services\Geo\MaxmindService;
use App\Services\Geo\UserAgentService;
use donatj\UserAgent\UserAgentInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserAgentInterface::class, function () {
            return new UserAgentService();
        });

//        $this->app->singleton(GeoServiceInterface::class, function () {
////          return new MaxmindService();
//            return new IpApiGeoService();
//        });
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
