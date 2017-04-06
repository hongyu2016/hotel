<?php
namespace app\admin\controller;
use think\Db;
use think\Controller;
use think\Request;
use think\Session;
class News extends Controller{
    /*
     *添加新闻
     * */
    public function addNews(){
        if (!session('ext_user')){
            header(strtolower("location: "."/admin/login"));
            exit();
        }
        //左边菜单
        $menu=\app\admin\model\Menu::menu();
        $this->assign('menu',$menu);

        return $this ->fetch();
    }
    /*
     * 添加新闻方法
     * */
    public function doaddnews(){
        $data=array();
        $data['title']=input('request.title');
        $data['content']=input('request.content');
        $data['carousel']=(int)input('request.carousel');
        if(!empty($data['title'])){
            $news=\app\admin\model\News::addnews($data);
            if($news){
                return $this->success('添加成功');
            }
        }
    }
    /*
     * 新闻列表
     * */
    public function newslist(){
        //左边菜单
        $menu=\app\admin\model\Menu::menu();
        $this->assign('menu',$menu);
        $newslist=\app\admin\model\News::newslist();
        //获取分页显示
        $page=$newslist->render();
        $this->assign('newslist',$newslist);
        $this->assign('page',$page);
        return $this ->fetch();

    }
}