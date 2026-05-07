<?php
namespace App\Services;

use App\Config\Config;

class DniService {
    public static function consultar($dni) {
        $token = Config::get('API_DNI_TOKEN');
        $url = Config::get('API_DNI_URL') . $dni;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }
}