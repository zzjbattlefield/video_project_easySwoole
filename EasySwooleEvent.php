<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/1/9
 * Time: 下午1:04
 */

namespace EasySwoole;

use \EasySwoole\Core\AbstractInterface\EventInterface;
use \EasySwoole\Core\Swoole\ServerManager;
use \EasySwoole\Core\Swoole\EventRegister;
use \EasySwoole\Core\Http\Request;
use \EasySwoole\Core\Http\Response;
use \EasySwoole\Core\Component\Di;
use \App\Lib\Redis\Redis;
use \EasySwoole\Core\Utility\File;
Class EasySwooleEvent implements EventInterface {

    public static function frameInitialize(): void
    {
        // TODO: Implement frameInitialize() method.
        self::loadConf(EASYSWOOLE_ROOT . '/Config');
        date_default_timezone_set('Asia/Shanghai');
    }

    private static function loadConf($ConfPath)
    {
        $Conf  = Config::getInstance();
        $files = File::scanDir($ConfPath);
        foreach ($files as $file) {
            $data = require_once $file;
            $Conf->setConf(strtolower(basename($file, '.php')), (array)$data);
        }
    }

    public static function mainServerCreate(ServerManager $server,EventRegister $register): void
    {
        Di::getInstance()->set('MYSQL',\MysqliDb::class,Array (
            'host' => '127.0.0.1',
            'username' => 'root',
            'password' => 'j7535024491',
            'db'=> 'imooc_video',
            'port' => 3306,
            'charset' => 'utf8')
        );
        Di::getInstance()->set('REDIS',Redis::getInstance());
        // TODO: Implement mainServerCreate() method.
    }

    public static function onRequest(Request $request,Response $response): void
    {
        // TODO: Implement onRequest() method.
    }

    public static function afterAction(Request $request,Response $response): void
    {
        // TODO: Implement afterAction() method.
    }
}