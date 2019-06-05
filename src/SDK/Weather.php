<?php
/**
 * Created by PhpStorm.
 * User: Qiash
 * Date: 2019/6/5
 * Time: 7:37
 */
namespace TestPackage\SDK;

use GuzzleHttp\Client;

class Weather
{

    private $config = [];

    public function __construct($config)
    {
        $this->config = $config;
    }


    public function getWeather()
    {
        // 初始化 config 配置等等

        $client = new Client([
            'base_uri' => 'http://api.map.baidu.com/',
            'timeout'  => 5.0,
        ]);

        $path = 'geocoder/v2/?address=西安市雁塔区财富中心&output=json&ak=eHtWy0Ddwh3vquhKOV4ulxqASmt3RFF5&callback=showLocation';
        $response = $client->request('GET', $path);

        return $response;
    }


}