<?php
namespace App\Lib\Upload;

use App\Lib\Utils;

class Base {

    /**
     * 上传文件的key值
     *
     * @var string
     * @Description
     */
    public $type;
    protected $request;
    protected $size;
    public function __construct($request,$type = null){
        $this->request = $request;
        $this->type = $type;
        if(empty($this->type)){
            $files = $this->request->getSwooleRequest()->files;
            //上传文件类型
            $types = array_keys($files);
            $this->type = $types[0];
        }
    }

    /**
     * 上传文件主方法
     *
     * @return void
     * @Description
     */
    public function upload(){
        if($this->type != $this->fileType){
            return false;
        }
        $videos = $this->request->getUploadedFile($this->type);
        $this->size = Utils::changeSize('m',$videos->getSize());
        // var_dump($this->size);die;
        $this->checkSize();
        $fileName = $videos->getClientFileName();
        $this->clientMediaType = $videos->getClientMediaType();
        
        $this->checkMediaType($videos);

        //获取存放路径
        $savePath = $this->getFile($fileName);
        $flag = $videos -> moveTo($savePath);
        if($flag)
            return $this->file;
    }

    /**
     * 获取保存文件的路径
     *
     * @param $fileName
     * @return string
     * @Description
     */
    public function getFile($fileName){
        $pathinfo = pathinfo($fileName);
        $extension = $pathinfo['extension'];
        $dirName = '/'.$this->type.'/'.date('Y').'/'.date('m');
        $dir = EASYSWOOLE_ROOT . '/webroot'.$dirName;
        if(!is_dir($dir))
            mkdir($dir,0777,true);
        $baseName = '/'.Utils::getFileKey($fileName).'.'. $extension;
        $this->file = $dirName.$baseName;
        return $dir.$baseName;
    }

    /**
     * 检测上传文件类别
     * @param Request $videos
     * @return void
     * @Description
     */
    protected function checkMediaType($videos){
        $mediaType =  explode('/',$videos->getClientMediaType());
        $mediaType = $mediaType[1] ?? '';
        if(empty($mediaType) || !in_array($mediaType,$this->fileExtTypes)){
            throw new \Exception("上传{$this->type}文件不合法");
        }
        return true;
    }

    /**
     * 检测上传文件大小
     *
     * @return void
     * @Description
     */
    protected function checkSize(){
        if(empty($this->size) || $this->size > $this->maxSize){
            throw new \Exception("上传{$this->type}文件大小不合法不能超过{$this->maxSize}M,上传文件的大小为：{$this->size}M");
        }
    }
}