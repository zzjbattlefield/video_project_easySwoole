<?php

namespace App\HttpController\Api;

use EasySwoole\Core\Http\AbstractInterface\Controller;

/**
 * Class Category
 * @package App\HttpController
 */
class Base extends Controller
{
    public function index()
    {
        
    }

    /**
     * 权限相关
     *
     * @param [type] $action
     * @return boolean|null
     * @Description
     */
    public function onRequest($action):?bool{
        return true;
    }

    /**
     * 返回错误
     *
     * @param \Throwable $throwable
     * @param [type] $actionName
     * @return json
     * @Description
     */
    public function onException(\Throwable $throwable,$actionName):void
    {
        $this->writeJson(400,'请求不合法');
    }
}