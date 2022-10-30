<?php

namespace App\Services\Geo;

use GeoIp2\Database\Reader;
use GeoIp2\Exception\AddressNotFoundException;
use GeoIp2\Exception\GeoIp2Exception;


class MaxmindService implements GeoServiceInterface
{
    protected $_reader;
    protected $_data;

    public function __construct()
    {
        $this->_reader = new Reader(
            base_path() . DIRECTORY_SEPARATOR .
            'database' . DIRECTORY_SEPARATOR .
            'geoip' . DIRECTORY_SEPARATOR .
            'GeoLite2-Country.mmdb'
        );
    }


    public function parse(string $ip): void
    {
        try {

            $this->_data = $this->_reader->country($ip);
        } catch (AddressNotFoundException $exception) {

        }

    }

    public function getIsoCode(): ?string
    {
        return $this->_data->continent->code ?? null;
    }

    public function getCountry(): ?string
    {
        return $this->_data->country->isoCode ?? null;
    }
}
