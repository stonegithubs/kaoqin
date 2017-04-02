<?php
namespace app\index\controller;
use think\Db;

class Index extends BasicController
{
    public function index()
    {
        $infos=Db::name('adv')->where('isDel',0)->order('addTime desc')->paginate(3);
        $this->assign('adv',$infos);
        return view('index');
    }
}
