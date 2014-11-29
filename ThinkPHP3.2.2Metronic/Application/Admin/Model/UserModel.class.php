<?php
/**
 * 用户自定义模型
 * @author admin
 *
 */
namespace Admin\Model;
use Think\Model\RelationModel;
class UserModel extends RelationModel {
    protected $_link = array(
        'Role' => array(
            'mapping_type'      =>  self::MANY_TO_MANY,
            'foreign_key'       =>  'user_id',
            'relation_foreign_key'  =>  'role_id',
            'relation_table'    => '__ROLE_USER__',
        ),
    );
}