<?php

namespace App\Services;

use Dadata\DadataClient;

class GeoService
{
    /**
     * @param string $ip
     * @return mixed
     */
    public function getAllDataByIp(string $ip)
    {
        return (new DadataClient(config('app.data_api'), null))->iplocate($ip);
    }

    public function getCityByIp(string $ip)
    {$ip='46.41.85.74';
        if ($this->getAllDataByIp($ip)) {
            return $this->getAllDataByIp($ip)['data']['city'];
        } else {
            return null;
        }
    }

}
