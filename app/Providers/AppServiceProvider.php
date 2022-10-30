<?php

namespace App\Providers;

use App\Services\Geo\GeoServiceInterface;
use App\Services\Geo\IpApiGeoService;
use App\Services\Geo\MaxmindService;
use GeoIp2\Database\Reader;
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
        $this->app->singleton(UserAgentServiceInterface::class, function () {
            return new UAParserService();
//            return new IpApiGeoService();
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
