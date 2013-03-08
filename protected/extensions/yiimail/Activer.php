<?php
/**
 * Created by JetBrains PhpStorm.
 * User: weijie
 * Date: 13-3-8
 * Time: 上午10:59
 * File: Activer.php
 * To change this template use File | Settings | File Templates.
 */
class Activer
{
    public function __construct()
    {
    }

    public static function checkKey($secret,$key=false){
        if($key !==false && $secret=== self::getSecret($key)){
            return true;
        }
        return false;
    }
    public static function getSecret($key){
        return md5($key);
    }
    /**
     * @return string
     */
    public static function incodeKey($str){
        return base64_encode(urlencode($str));
    }

    /**
     * @param $key
     * @return array
     */
    public static function decodeKey($key,$separator=':'){
        return explode($separator,urldecode(base64_decode($key)));
    }
}
