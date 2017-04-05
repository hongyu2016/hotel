<?php
namespace app\admin\model;

use think\Model;
//文件命名对应着admin表
/*
 *左侧菜单 读取数据库
 * */
class Menu extends Model
{
    public static function menu(){
       //$menuTop= Menu::where('pid','0')->select();
        $menuTop=Menu::order('pid')->select();
        $menu=getTree($menuTop,0);
        return $menu;
    }
}