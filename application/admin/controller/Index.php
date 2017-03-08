<?php
namespace app\admin\controller;
use controller\BasicAdmin;
class Index extends BasicAdmin
{
    public function index()
    {
        $user_name=session("user");
         $this->assign('username',$user_name['username']);
        return view('index');
    }
}
