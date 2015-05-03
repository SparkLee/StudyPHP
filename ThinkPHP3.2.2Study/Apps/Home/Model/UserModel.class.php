<?php
/**
 * 多层模型之数据层。Model是默认的模型层
 * @author admin
 *
 */
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
    public function getUserName() {
        echo "my name is sparklee";
    }
}
