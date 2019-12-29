<?php

namespace App\Lib;
/**
 * PHP反射相关处理
 *
 * @Description
 */
class ClassArr {
    public function uploadClassStat(){
        return [
            'image' => '\App\Lib\Upload\Image',
            'video' => '\App\Lib\Upload\Video'
        ];
    }

    /**
     * Undocumented function
     *
     * @param [type] $type
     * @param array $supportedClass
     * @param array $params
     * @param boolean $needInstance
     * @return void
     * @Description
     */
    public function initClass($type,$supportedClass,$params = [],$needInstance = true){
        if(!array_key_exists($type,$supportedClass)){
            return false;
        }
        $className = $supportedClass[$type];
        return $needInstance ? (new \ReflectionClass($className))->newInstanceArgs($params) : $className;
    }
}