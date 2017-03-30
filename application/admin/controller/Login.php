<?php
namespace app\admin\controller;
use think\Controller;
class Login extends Controller
{
    public function index(){
        return $this->fetch();
    }
    public function logining(){
        $name=input('request.user-name');
        $password=input('request.password');
        $captcha=input('request.captcha');

        if(!captcha_check($captcha)){  //captcha_check 为验证验证码的
            //验证码验证失败
            return $this->error('验证码错误');
        };

        $check=\app\admin\model\Admin::login($name,$password);  //引用Admin model
        if($check){
            $this->redirect("Index/index");
            exit();
        }else{
            return $this->error('用户名或密码错误');
        }

    }


}