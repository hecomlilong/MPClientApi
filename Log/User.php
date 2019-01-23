<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/23
 * Time: 22:49
 */

namespace App\Model\User;
use EasySwoole\Core\Component\Spl\SplBean;
class Bean extends SplBean
{
    protected $goodsId;
    protected $goodsName;
    protected $addTime;
    protected function initialize()
    {
        // TODO: Implement initialize() method.
        $this->addTime = time();
    }

}

namespace App\Model\Goods;


use EasySwoole\Core\Component\Di;

class User
{
    protected $db;
    protected $tableName = 'user';
    function __construct()
    {
        $db = Di::getInstance()->get("MYSQL");
        if($db instanceof \MysqliDb){
            $this->db = $db;
        }
    }

    function add(Bean $bean){
        return $this->db->insert($this->tableName,$bean->toArray($bean::FILTER_TYPE_NOT_NULL));
    }
}