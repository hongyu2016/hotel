<?php
namespace app\index\controller;

use app\common\controller\HomeBase;
use think\Db;

class Index extends HomeBase
{
    public function index()
    {
        return $this->fetch();
    }
    public function index2(){
        return json(['status'=>1, 'msg'=>'xxxx']);
    }
}
