<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2017/3/30
 * Time: 12:58
 */

namespace app\index\controller;
use think\Db;

class Info extends BasicController
{
    public function detail($id){
        $re=Db::name('adv')->where('advId',$id)->select();
//        $re[0]['content']=strip_tags($re[0]['content']);
        $this->assign('info',$re[0]);
        return view('detail');
    }

}