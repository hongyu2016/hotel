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
    /*
     * 根据编辑页面传过来的id值获取该新闻
     * */
    public static function newsdetail($id){
        $detail=News::where('id',$id)->find();
        return $detail;
    }
    /*
     * 编辑更新新闻
     * */
    public static function editnews($data,$id){
        $edit=new News();
        $carousel=$data['carousel'];
        if (empty($carousel)){  //如果为null则赋值为0
            $carousel=0;
        }
        $edit->save([
            'title'  =>  $data['title'],
            'content' =>  $data['content'],
            'push_time' =>  getTime(),  //转换时间 在common.php 中
            'author' =>'admin',
            'source' => '水研人才库',
            'carousel'=>$carousel
        ],['id' => $id]);  // save方法第二个参数为更新条件
        if($edit){
            return true;  //如果成功返回true 否则返回false
        }else{
            return false;
        }
    }

}