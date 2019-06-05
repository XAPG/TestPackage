<?php
/**
 * Created by PhpStorm.
 * User: Qiash
 * Date: 2019/6/5
 * Time: 7:30
 */
namespace TestPackage\Tools;

class Json
{

    private $json = '';

    public function __construct($json)
    {
        $this->json = $json;
    }

    public static function arrayToJson($array)
    {
        return json_encode($array);
    }

    public static function jsonToArray($json)
    {
        return json_decode($json, true);
    }

    public function toArray()
    {
        return json_decode($this->json, true);
    }

    public function json()
    {
        return $this->json;
    }

    public function length()
    {
        return mb_strlen($this->json);
    }
}