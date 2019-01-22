<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/22
 * Time: 22:27
 */
namespace app\lib;
use EasySwoole\Core\AbstractInterface\Singleton;
class Config {
    use Singleton;

    private $ENV = "dev";

    function __construct()
    {
        $this->ENV = "dev";
    }

    public function get($key)
    {
        try{
            $result = \Yaconf::get($key);
        }catch(\Exception $e){
            throw new \Exception("conf 不存在");
        }
        return $result[$this->ENV];
    }
}