<?php
namespace app\admin\controller;
use think\Controller;//

class Login extends Controller
{
    public function index(){

        //return view();
        return $this->fetch();
    }

}