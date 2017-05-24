<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2017/4/1
 * Time: 13:32
 */

namespace app\index\controller;


use think\Db;

class Schedule extends BasicController
{
    public function index(){
        $eId=session('emp')['eId'];
        if(!empty($eId)){
            $where['eId']=$eId;
            $where['isDel']=['eq',0];
            $res=Db::name('schedule')->where($where)->select();
            $today=time();
            foreach ($res as $key=>$re){
               $res[$key]['day']=ceil((strtotime($re['date'])-$today)/86400);
            }
            $this->assign('days',$res);
            return view();
        }else{
            $this->error("获取用户session错误！");
        }

    }

}