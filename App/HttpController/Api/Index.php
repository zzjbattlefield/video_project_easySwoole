<?php

namespace App\HttpController\Api;
use EasySwoole\Core\Component\Di;
use App\Lib\Redis\Redis;
/**
 * Class Category
 * @package App\HttpController
 */
class Index extends Base
{
    /**
     * 首页方法
     * @author : evalor <master@evalor.cn>
     */
    public function viedo()
    {
        new abc;
        $data  = [
            'id' => 1,
            'name' => 'imooc'
        ];
        return $this->writeJson(201,'ok',$data);
    }

    public function getVideo(){
        $db = Di::getInstance()->get("MYSQL");
        $result = $db->where("id",1)->getOne('video');
        return $this->writeJson('200','ok',$result);
    }

    public function getRedis(){
        // $result = Redis::getInstance()->get('zzj');
        $result = Di::getInstance()->get("REDIS")->get('zzj');
        return $this->writeJson(200,'ok',$result);
    }

    public function yaconf(){
        $result = \Yaconf::get('redis');
        return $this->writeJson(200,'ok',$result);
    }
}