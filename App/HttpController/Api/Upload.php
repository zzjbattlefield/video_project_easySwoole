<?php
namespace App\HttpController\Api;

use App\Lib\ClassArr;
use App\Lib\Upload\Video;
/**
 * 文件上传 - 视频 文件
 * @package App\HttpController
 */
class Upload extends Base
{
    public function file(){
        $request = $this->request();
        $files = $request->getSwooleRequest()->files;
        //上传文件类型
        $types = array_keys($files);
        $type = $types[0];
        if(empty($type)){
            return $this->writeJson(400,'上传文件不合法');
        }
        try{
            $classObj = new ClassArr();
            $classStats = $classObj->uploadClassStat();
            $uploadObj = $classObj->initClass($type,$classStats,[$request,$type]);
            $file = $uploadObj->upload();
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