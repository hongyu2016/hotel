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
    //查询用户信息
    public static function search($name){
        $where['admin_name']=$name;
        $user=Admin::where($where)->find();  //查出admin_name的所有信息
        //$user=Admin::where($where)->column('admin_password');  //查出admin_name的密码字段
        return $user;
    }
    //更改密码
    public static function updatepsw($name,$newpassword){
        $where['admin_name']=$name;
        $user=Admin::where($where)->update(['admin_password'=>md5($newpassword)]);
        if($user){
            return true;  //如果成功返回true 否则返回false
        }else{
            return false;
        }
    }
}