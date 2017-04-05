<?php
namespace app\admin\model;

use think\Model;
//文件命名对应着admin表
/*
 *添加新闻
 * */
class News extends Model
{
    public static function addnews($data){
        $where['title']=$data['title'];
        //$user=Admin::where($where)->update(['admin_password'=>md5($newpassword)]);
        $news = new News; //实例化模型
        $news->data([
            'title'  =>  $data['title'],
            'content' =>  $data['content']
        ]);
        $news->save();
        if($news){
            return true;  //如果成功返回true 否则返回false
        }else{
            return false;
        }

    }
}