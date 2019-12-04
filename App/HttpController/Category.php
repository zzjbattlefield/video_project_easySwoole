<?php

namespace App\HttpController;

use EasySwoole\Core\Http\AbstractInterface\Controller;

/**
 * Class Category
 * @package App\HttpController
 */
class Category extends Controller
{
    /**
     * 首页方法
     * @author : evalor <master@evalor.cn>
     */
    public function index()
    {
        $data  = [
            'id' => 1,
            'name' => 'zzj'
        ];
        return $this->writeJson(200,'ok',$data);
    }
}