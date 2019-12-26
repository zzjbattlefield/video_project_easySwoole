<?php
namespace App\HttpController\Api;

use App\Lib\Upload\Video;
/**
 * 文件上传 - 视频 文件
 * @package App\HttpController
 */
class Upload extends Base
{
    public function file(){
        $request = $this->request();
        try{
            $obj = new Video($request);
            $file = $obj->upload();
        }catch(\Exception $e){
            return $this->writeJson(400,$e->getMessage(),[]);
        }
        if(empty($file)){
            return $this->writeJson(400,"上传失败",[]);
        }else{
            $data = [
                'url' => $file
            ];
            return $this->writeJson(200,'OK',$data);
        }
    }
}