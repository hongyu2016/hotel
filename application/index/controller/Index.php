<?php
namespace app\index\controller;
use think\Db;
use think\Controller;

class Index extends Controller{
    public function index(){
        $row=Db::name('user')->select();
        //dump($row);
        return $this->fetch();
    }
}