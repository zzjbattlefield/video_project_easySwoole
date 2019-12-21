<?php
namespace App\Lib\Upload;

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
    public function __construct($request){
        $this->request = $request;
        $files = $this->request->getSwooleRequest()->files;
        $types = array_keys($files);
        $this->type = $types[0];
        
    }

    public function upload(){
        if($this->type != $this->fileType){
            return false;
        }
        $videos = $this->request->getUploadedFile($this->type);
        $this->size = $videos->getSize();
        $this->checkSize();
        $fileName = $videos->getClientFileName();
        $this->clientMediaType = $videos->getClientMediaType();
        
        $this->checkMediaType($videos);

        $this->getFile($fileName);
    }

    public function getFile($fileName){
        $pathinfo = pathinfo($fileName);
        $extension = $pathinfo['extension'];
        $dir = EASYSWOOLE_ROOT . '/webroot/'.$this->type.'/'.date('Y').'/'.date('m');
        if(!is_dir($dir))
            mkdir($dir,0777,true);
        
    }

    /**
     * 检测上传文件类别
     * @param Request $videos
     * @return void
     * @Description
     */
    public function checkMediaType($videos){
        $mediaType =  explode('/',$videos->getClientMediaType());
        $mediaType = $mediaType[1] ?? '';
        if(empty($mediaType) || !in_array($mediaType,$this->fileExtTypes)){
            throw new \Exception("上传{$this->type}文件不合法");
        }
        return true;
    }

    public function checkSize(){
        if(empty($this->size)){
            return false;
        }
    }

}