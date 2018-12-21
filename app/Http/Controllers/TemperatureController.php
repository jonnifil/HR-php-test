<?php
/**
 * Created by PhpStorm.
 * User: jonni
 * Date: 20.12.18
 * Time: 18:17
 */

namespace App\Http\Controllers;


class TemperatureController extends Controller
{
    public function index()
    {
        $temp = 'not now!';
        $apiUrl = 'https://api.weather.yandex.ru/v1/forecast?lat=53.25209&lon=34.37167';
        $curl = curl_init($apiUrl);
        $options = array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPGET => 1,
            CURLOPT_HTTPHEADER => ['X-Yandex-API-Key: d1648e22-d074-4807-95be-6f944d9f2705']
        );
        curl_setopt_array($curl, $options);
        $data = curl_exec($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $data = json_decode($data, true);
        if (!empty($data) && $code == 200) {
            $temp = $data['fact']['temp'];
        }
        return view('brjansk', ['temp' => $temp]);
    }
}