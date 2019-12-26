<?php

namespace App\Lib;

class Utils {

    public static function getFileKey($str){
        return substr(md5(self::makeRandomString() . $str . time() . rand(0,999)),8,16);
    }

    public static function makeRandomString($length = 1){
        $str = null;
        $strPol = "QWERTYUIOPLKJHGFDSAZXCVBNMqwertyuioplkjhgfdsazxcvbnm1234567890";
        $max = strlen($strPol) - 1;
        for($i = 0;$i<$length;$i++){
            $str .= $strPol[rand(0,$max)];
        }
        return $str;
    }
}