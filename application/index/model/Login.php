<?php
namespace app\index\model;
use think\Model;
class Login extends LoginModel{
    protected $table = "admin";

    protected $auto = ['state'];
    protected function getStatusAttr($value){
        $state = [0 => '禁用' , 1 => '启用'];
        return $state[$value];
    }
 }
?>