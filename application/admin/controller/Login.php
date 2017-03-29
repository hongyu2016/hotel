<?php
namespace app\admin\controller;
use think\Controller;
use think\captcha\Captcha;
use think\Request;
class Login extends Controller
{
    public function index(){

        //return view();
        return $this->fetch();
    }
    public function logining(){
        $name=input('request.user-name');
        $password=input('request.password');
        $captcha=input('request.captcha');
        if(!captcha_check($captcha)){
            //验证码验证失败
            return $this->error('验证码错误');

        };

        $this->redirect("Index/index");
        exit();
    }

}