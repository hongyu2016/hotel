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
        if (!session('ext_user')){
            //$this->redirect('Login/index');
            header(strtolower("location: "."/admin/login"));
            exit();
        }
        $menu=\app\admin\model\Menu::menu();
        $this->assign('menu',$menu);
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
        $menu=\app\admin\model\Menu::menu();
        $this->assign('menu',$menu);
       return $this->fetch();
    }
    /*
     * 修改密码表单
     * */
    public function dochangepsw(){
        $oldpassword=md5(input('request.oldpassword'));
        $newpassword=input('request.newpassword');
        $repassword=input('request.repassword');
        $name=session('ext_user')['admin_name']; //取出session的用户名
        $changepsw=\app\admin\model\Admin::search($name);
        $password=$changepsw['admin_password'];  //取出原密码 因为$changepsw返回的是admin的所有数组
        if($password==$oldpassword){
            if ($newpassword==$repassword){
                $updatepassword=\app\admin\model\Admin::updatepsw($name,$newpassword);
                if ($updatepassword){
                    session('ext_user',null);
                    return $this->success('修改成功','/admin/login');
                }else{
                    return $this->error('修改密码失败');
                }
            }else{
                return $this->error('两次密码输入不一致');
            }
        }else{
            return $this->error('原密码输入错误');
        }
    }
}