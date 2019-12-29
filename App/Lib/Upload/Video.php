<?php
namespace App\Lib\Upload;

class Video extends Base{
    public $fileType = 'video';
    //单位：M
    public $maxSize = 3;
    /**
     * 文件后缀的medaiType
     * @var array
     */
    public $fileExtTypes = [
        'mp4',
        'x-flv',
    ];
}