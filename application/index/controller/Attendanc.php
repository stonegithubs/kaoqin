<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2017/4/1
 * Time: 18:30
 */

namespace app\index\controller;

use think\Db;
/**
 * Class attendanc
 * @package app\index\controller
 * 出勤记录
 */
class Attendanc extends BasicController
{
    public function index(){
        //取出打卡记录，标记缺勤，早退，迟到
        $eId=session('emp')['eId'];
        if(!empty($eId)){
            $where['eId']=$eId;
            $where['isDel']=['eq',0];
            $res=Db::name('schedule')->where($where)->select();
            $today=time();
            foreach ($res as $key=>$re){
                $res[$key]['day']=ceil((strtotime($re['date'])-$today)/86400);
                $record=Db::name('scheduleRecord')->where('sId',$re['sId'])->order('addTime asc')->select();
                //查找到记录
                if(!empty($record)){
                    if(count($record)==2){
                        $signTime1=date('H:i:s',strtotime($record[0]['addTime']));
                        $signTime2=date('H:i:s',strtotime($record[1]['addTime']));
                    }else if(count($record)==1){
                        $signTime1=date('H:i:s',strtotime($record[0]['addTime']));
                    }
                    // 设置打卡记录状态
                    $res[$key]['isrecord']=1;
                    switch (count($record)){
                        case 1:
                            if($signTime1>'09:30:00'){
                                    $res[$key]['title']='你上班迟到了!';
                            }else{
                                $res[$key]['title']='正常上班!';
                            }
                            break;
                        case 2:
                            if($signTime1>'09:30:00'){
                                $res[$key]['title']='你上班迟到了!';
                            }else{
                                $res[$key]['title']='正常上班!';
                            }
                            if($signTime2<'18:00:00'){
                                    $res[$key]['title'].='你下班早退哦';
                            }else{
                                    $res[$key]['title'].='正常下班';
                            }
                            break;
                        default:break;
                    }
                }
                else{
                    // 设置没有打卡记录状态
                    $res[$key]['isrecord']=0;
                }
            }
            //取出打卡记录，标记缺勤，早退，迟到
            $this->assign('days',$res);
            return view();
        }else{
            $this->error("获取用户session错误！");
        }
        return view();
    }

}