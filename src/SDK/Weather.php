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

    public function __construct($config = [])
    {
        // 可以从框架的 config/*.php 或者 package 的 config.php 文件中加载配置，以package的config.php为例
        $defaultConfig = require __DIR__. "/../config.php";
        $this->config = array_merge($defaultConfig, $config);
    }

    public function getWeather($address)
    {
        $client = new Client([
            'base_uri' => 'http://api.map.baidu.com/',
            'timeout'  => 5.0,
        ]);

        $path = 'geocoder/v2/';
        $options = ['query' =>
            [
                'address' => $address ?? '西安市雁塔区财富中心',
                'output' => 'json',
                'ak' => $this->config['app_secret']
            ]
        ];
        $response = $client->request('GET', $path, $options);

        $result = $response->getBody()->getContents();
        $result = \GuzzleHttp\json_decode($result, true);

        return $result;
    }

}