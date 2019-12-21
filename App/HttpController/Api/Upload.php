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
        $obj = new Video($request);
        $obj->upload();
        // $videos = $request->getUploadedFile('file');
        // $flag = $videos->moveTo('/data/www/swoole/easyswoole/webroot/1.mp4');
        // $data = [
        //     'url' => '/1.mp4',
        //     'flag' => $flag
        // ];
        // if($flag){
        //     return $this->writeJson(200,'ok',$data);
        // }else{
        //     return $this->writeJson(400,'ok',$data);
        // }
    }
}