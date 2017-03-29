<?php
namespace app\admin\model;

use think\Model;
//文件命名对应着admin表
class Admin extends Model
{
    public static function login($name,$password){
        $where['admin_name']=$name;
        $where['admin_password']=md5($password);//md5加密与数据库中的对比
        $user=Admin::where($where)->find();
        if ($user){
            unset($user['password']);
            session('ext_user',$user);
            return true;
        }else{
            return false;
        }
    }
    //退出登录
    public static function logout(){
        session('ext_user',NULL);
        return;
    }
}