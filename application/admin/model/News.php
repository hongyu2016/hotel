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
        $news = new News; //实例化模型
        $carousel=$data['carousel'];
        if (empty($carousel)){
            $carousel=0;
        }
        $news->data([
            'title'  =>  $data['title'],
            'content' =>  $data['content'],
            'push_time' =>  getTime(),  //转换时间 在common.php 中
            'author' =>'admin',
            'source' => '水研人才库',
            'carousel'=>$carousel
        ]);
        $news->save();
        if($news){
            return true;  //如果成功返回true 否则返回false
        }else{
            return false;
        }

    }
    public static function newslist(){
        $newslist=News::paginate(10);
        return $newslist;
    }

}