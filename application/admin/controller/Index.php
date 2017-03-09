<?php
namespace app\admin\controller;
use controller\BasicAdmin;
use think\Db;
use think\Request;
class Index extends BasicAdmin
{
    public function index()
    {
        return view('index');
    }
    public function userlist(){
        $user = Db::name('SystemUser')->where('status',1)->paginate(3);
        $this->assign('users',$user);
        return view("userlist");
    }
    public function useradd(){
        $request = Request::instance();
        $res=$request->post();
        array_splice($res, 2, 1);
        try{
            Db::name('SystemUser')->insert($res);
            $this->redirect('userlist');
        }catch(\Exception $e){
            $this->error('该用户名已经被占用！');
        }

    }
    public function userdel(){
        $request = Request::instance();
        var_dump($request->get());
        die;
    }
}
