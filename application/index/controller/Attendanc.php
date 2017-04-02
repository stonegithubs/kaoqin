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
                $res[$key]['day']=round((strtotime($re['date'])-$today)/86400)+1;
                $record=Db::name('scheduleRecord')->where('sId',$re['sId'])->select();
                //查找到记录
                if(!empty($record)){
                    if(count($record)==2){
                        $signTime1=date('H:i:s',strtotime($record[0]['addTime']));
                        $signTime2=date('H:i:s',strtotime($record[1]['addTime']));
                    }else{
                        $signTime1=date('H:i:s',strtotime($record[0]['addTime']));
                    }
                    $res[$key]['isrecord']=1;
                    switch (count($record)){
                        case 0:
                            $res[$key]['title']='你今天没有打卡，缺勤！';
                            break;
                        case 1:
                            //上午时间段打的
                            if($signTime1<'12:00:00'){
                                if($signTime1<'09:30:00'){
                                    $res[$key]['title']='早上正常出勤!';
                                    $res[$key]['title'].='下午没有打卡';
                                }else{
                                    $res[$key]['title']='早上迟到了！';
                                    $res[$key]['title'].='下午没有打卡';
                                }
                                //下午时间段打的
                            }else{
                                if($signTime1<'18:00:00'){
                                    $res[$key]['title']='早上没有打卡';
                                    $res[$key]['title']='你下午早退哦';
                                }else{
                                    $res[$key]['title']='早上没有打卡';
                                    $res[$key]['title'].='下午正常出勤!';
                                }
                            }
                            break;
                        case 2:
                            if($signTime1<'12:00:00'){
                                //上午时间段打的
                                if($signTime1<'09:30:00'){
                                    $res[$key]['title']='早上正常出勤!';
                                }else{
                                    $res[$key]['title']='早上迟到了！';
                                }
                                //下午时间段打的
                                if($signTime2<'18:00:00'){
                                    $res[$key]['title'].='你下午早退哦';
                                }else{
                                    $res[$key]['title'].='下午正常出勤!';
                                }
                            };
                            break;
                        default:break;

                    }
                }
                else{
                    $res[$key]['isrecord']=0;
                }
                //设置没有打卡记录状态


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