<?php
namespace app\admin\controller;
use think\Db;
use think\Controller;
use think\Request;
use think\Session;

class Index extends Controller{
    /*
     * 首页
     * */
    public function index(){
        $row=Db::name('user')->select();
        //dump($row);
        //$this->assign('')
        //return '<h1>这是后台入口</h1>';
       //$session=Session::get('ext_user.admin_name');  //获取session 若session不存在，跳转到登录页
        if (!session('ext_user')){
            //$this->redirect('Login/index');
            header(strtolower("location: "."/admin/login"));
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
    /*
     * 退出登录
     * */
    public function logout(){
        \app\admin\model\Admin::logout();  //调用model退出登录方法
        if(!session('ext_user')){
            //$this->redirect('Login/index');
            header(strtolower("location: "."/admin/login"));
            exit();
        }
        return NULL;
    }
    /*
     * 修改密码
     * */
    public function changepsw(){
        if (!session('ext_user')){
           // $this->redirect('Login/index');
            header(strtolower("location: "."/admin/login"));
            exit();
        }
       return $this->fetch();
    }
}