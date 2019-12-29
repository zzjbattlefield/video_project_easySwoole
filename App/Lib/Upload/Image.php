<?php

namespace App\Lib\Upload;

class Image extends Base{
    public $fileType = 'image';
    public $maxSize = 3;
    /**
     * 文件后缀的medaiType
     * @var array
     */
    public $fileExtTypes = [
        'png',
        'gif',
        'jpeg',
        'jpg'
    ];
}