<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/22
 * Time: 22:07
 */
namespace app\lib;
use EasySwoole\Core\AbstractInterface\Singleton;
class Redis {
    use Singleton;

    public $redis="";

    private function __construct()
    {
        if(!extension_loaded('redis')){
            throw new \Exception("redis.so文件不存在");
        }
        try{
            $this->redis = new \Redis();
            $config = Config::getInstance();
            $result = $this->redis->connect($config['host'],$config['port']);
            if(!empty($config['password'])){
                $this->redis->auth($config['password']);
            }
        }catch(\Exception $e){
            throw new \Exception("redis服务异常");
        }

        if($result === false){
            throw new \Exception("redis 连接失败");
        }
    }
}