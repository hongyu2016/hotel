<?php
namespace app\admin\controller;
use think\Controller;
use think\captcha\Captcha;

class Login extends Controller
{
    public function index(){

        //return view();
        return $this->fetch();
    }

}