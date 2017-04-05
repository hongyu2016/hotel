<?php
namespace app\admin\controller;
use think\Db;
use think\Controller;
use think\Request;
use think\Session;

class News extends Controller{
    /*
     *
     * */
    public function addNews(){
        if (!session('ext_user')){
            header(strtolower("location: "."/admin/login"));
            exit();
        }
        $menu=\app\admin\model\Menu::menu();
        $this->assign('menu',$menu);
        return $this ->fetch();
    }
}