<?php
namespace app\index\controller;
use think\Request;
use think\Db;

class Login extends BasicController
{
    /**
     * 控制器基础方法
     */
    public function _initialize() {
        if ($this->_isLogin() && $this->request->action() !== 'out') {
            $this->redirect('@index');
        }
        $user=session('emp');
        $this->assign('user',$user);
    }
    /**
     * 用户登录
     * @return string
     */
    public function index() {

        return view('index');
    }

    /**
     * @return array
     * 用户登录验证
     */
   public function login(){
       $epId = $this->request->post('empId', '', 'trim');
       $password = $this->request->post('password', '', 'trim');
       $validte_code = $this->request->post('validte_code', '', 'trim');
       //验证验证码
       if(!captcha_check($validte_code)){
           return array('status'=>0,'msg'=>'验证码错误！');//验证码错误
       }
       $employ = Db::name('employee')->where('eId', $epId)->find();
       if(empty($employ) || $employ['password'] !== md5($password)){
           return array('status'=>2,'msg'=>'用户名或者密码错误！');
       }else{
           session('emp', $employ);
           return array('status'=>1,'msg'=>'登录成功！');
       }

   }

    /**
     * 退出登录
     */
    public function out() {
        if(session('emp')!=null){
            session('emp', null);
            $this->success('退出登录成功！', '@index/index');
        }else{
            $this->error('你还没有登录！');
        }

    }

}