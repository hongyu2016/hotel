<?php
namespace app\admin\controller;
use think\Db;
use think\Controller;
use think\Request;
use think\Session;
/*class Index
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';

    }
}*/

class Index extends Controller{
    public function index(){
        $row=Db::name('user')->select();
        //dump($row);
        //$this->assign('')
        //return '<h1>这是后台入口</h1>';
       $session=Session::get('ext_user.admin_name');  //获取session 若session不存在，跳转到登录页
        if (!$session){
            $this->redirect('Login/index');
            exit();
        }
       return $this ->fetch();

        //return $this ->display();
        //return view('index',['name'=>'thinkphp']);

        //请求头信息
        /*$info = Request::instance()->header();
        dump ($info['accept']);
        dump ($info['accept-encoding']);
        dump ($info['user-agent']);
        dump ($info['host']);*/

       // return view('index');  //直接使用view助手函数渲染模板输出

    }

    public function test_1(){

        //$data = ['name'=>'thinkphp','url'=>'thinkphp.cn'];
        //return ['data'=>$data,'code'=>1,'message'=>'操作完成'];

        $data = ['name'=>'thinkphp','url'=>'thinkphp.cn'];
        // 指定json数据输出
        return json(['data'=>$data,'code'=>1,'message'=>'操作完成']);
        //return xml(['data'=>$data,'code'=>1,'message'=>'操作完成']);

    }
    //退出登录
    public function logout(){
        \app\admin\model\Admin::logout();
        if(!session('?ext_user')){
            $this->redirect('Login/index');
            exit();
        }
        return NULL;
    }
}