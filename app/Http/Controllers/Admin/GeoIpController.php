<?php

namespace App\Http\Controllers\Admin;

use AingSh\Alexander\PackageHillelGeoTest\GeoServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\Visit;
use donatj\UserAgent\UserAgentInterface;
use GeoIp2\Database\Reader;

class GeoIpController extends Controller
{

    public function index(GeoServiceInterface $reader)
    {
        $ip = '93.75.136.251';

//        $ip = request()->ip();
//        if ($ip == '::1') {
//            $ip = request()->server->get('HTTP_X_FORWARDED_FOR');
//        }

        $reader->parse($ip);
        $isoCode = $reader->getIsoCode();
        $country = $reader->getCountry();
        if (!empty($isoCode) && !empty($country)) {

            Visit::create([
                'ip' => $ip,
                'country_code' => $country,
                'continent_code' => $isoCode,
            ]);
        }
    }

}

