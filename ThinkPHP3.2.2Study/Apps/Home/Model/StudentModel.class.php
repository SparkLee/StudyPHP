<?php
namespace Home\Model;
use Think\Model;
class StudentModel extends Model {
    public function select() {
        echo "yes, it is selecting.";
    }
}