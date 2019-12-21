<?php

namespace app\Lib\Redis;

use EasySwoole\Config;
use EasySwoole\Core\AbstractInterface\Singleton;
class Redis {
    use Singleton;
    public $redis;
    private function __construct(){
        if(!extension_loaded('redis')){
            throw new \Exception("redis.so不存在");
        }
        try{
            $this->redis = new \Redis();
            $redisConfig = \Yaconf::get('redis');
            $this->redis->connect($redisConfig['host'],$redisConfig['port'],$redisConfig['time_out']);
        }catch(\Exception $e){
            throw new \Exception("redis服务异常");
            // throw new \Exception($e->getMessage());
        }

    }
        
    /**
     * get
     *
     * @param [type] $key
     * @return void
     * @Description
     */
    public function get($key){
        if(empty($key)){
            return '';
        }
        return $this->redis->get($key);
    }

    public function lPop($key){
        if(empty($key)){
            return '';
        }
        return $this->redis->lPop($key);
    }

    public function rPush($key,$value){
        if(empty($key)){
            return '';
        }
        return $this->redis->rPush($key,$value);
    }

}