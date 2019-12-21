<?php
namespace App\Lib\Upload;

class Video extends Base{
    public $fileType = 'video';
    public $maxSize = '102';
    /**
     * 文件后缀的medaiType
     * @var array
     */
    public $fileExtTypes = [
        'mp4',
        'x-flv',
    ];
}