<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2017/4/1
 * Time: 15:50
 */

namespace app\index\controller;
use think\Db;
use think\image\Exception;
use think\Request;
/**
 * Class Sign
 * @package app\index\controller
 * 打卡
 */
class Sign extends BasicController
{
    public function sign(){
        //判断今天是否需要打卡，是否在排班时间内，是否请假，是否出差
            $eId = session('emp')['eId'];
            $where['eId']=$eId;
            $where['date']=date('Y-m-d');
            $where['isDel']=0;
            $where['isLevel']=['eq',0];
            $where['isTravel']=['eq',0];
            $request = Request::instance();
            $current_time=date('H:i:s');
            if (!empty($eId)) {
                $schedule = Db::name('schedule')->where($where)->find();//当天的排班记录
                if(!empty($schedule)){
                    //今天有排班记录可以打卡，判断当前时间段,大于09:30标记为迟到
                    //判断现在时间之前是是否已有记录
                    //上午时间段
                    if($current_time>'12:00:00' && $current_time<'14:00:00'){
                        $map['addTime']=['<',date("Y-m-d H:i:s")];
                        $map['sId']=$schedule['sId'];
                        $count=Db::name('scheduleRecord')->where($map)->count();
                        if($count!=0){
                            return array('status'=>0,'msg'=>'你已经打过卡了！');
                        }
                        try{
                            //插入记录
                            Db::name('scheduleRecord')->insert([
                                    'sId'=>$schedule['sId'],
                                    'ip'=>$request->ip(),
                                ]
                            );
                            return array('status'=>1,'msg'=>'打卡成功！');
                        }catch (\think\Exception $e){
                            return array('status'=>2,'msg'=>'插入失败！');
                        }
                        //下午时间段
                    }else if($current_time>'14:00:00'){
                        $map['addTime']=['<',date("Y-m-d H:i:s")];
                        $map['addTime']=['>',date("Y-m-d H:i:s",strtotime('14:00:00'))];
                        $map['sId']=$schedule['sId'];
                        $count=Db::name('scheduleRecord')->where($map)->count();
                        if($count!=0){
                            return array('status'=>0,'msg'=>'你已经打过卡了！');
                        }
                        try{
                            //插入记录
                            Db::name('scheduleRecord')->insert([
                                    'sId'=>$schedule['sId'],
                                    'ip'=>$request->ip(),
                                ]
                            );
                            return array('status'=>1,'msg'=>'打卡成功！');
                        }catch (\think\Exception $e){
                            return array('status'=>2,'msg'=>'插入失败！');
                        }
                    }else{
                        return array('status'=>4,'msg'=>'这个时间不能打卡，请联系管理员补打！');
                    }

                }else{
                    return array('status'=>3,'msg'=>'今天不用打卡哦！');
                }

            } else {
                $this->error("获取session失败！");
            }
        }


}