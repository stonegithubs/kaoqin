<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2017/3/25
 * Time: 23:43
 */
namespace app\index\controller;
use phpDocumentor\Reflection\Types\Null_;
use think\Db;
use think\Exception;
use think\Request;

class Leave extends BasicController
{
    public function index(){
        return view('index');
    }

    public function leavelist(){
        $eId=session('emp')['eId'];
        $lists=Db::name('level')->where('eId',$eId)->paginate(3);
        $this->assign('infos',$lists);
        return view('leavelist');
    }
    public function commit(){
        if(Request::instance()->method()=='POST'){
            $eId=session('emp')['eId'];
            if(!empty($eId)){
                $POST=Request::instance()->post();
                $stime=strtotime($POST['starttime']);
                $etime=strtotime($POST['endtime']);
                $count=round(($etime-$stime)/86400);
                //1.提交的结束不能小于起始
                if($etime<$stime){
                    return array('status'=>0,'msg'=>'结束时间不能小于开始时间！');
                }
                //2只能在用户往后的排班时间请假
                if($stime<time()){
                    return array('status'=>2,'msg'=>'请假只能未来时间段，不能包含今天！');
                }
                //3.请假最多只能请三天
                if($count>3){
                    return array('status'=>3,'msg'=>'请假最多只能3天！');
                }
                //查询是否在排班的范围内
                $st=$POST['starttime'];
                $et=$POST['endtime'];
                $map['eId']=$eId;
                $map['isTravel']=['eq',0];
                $map['isDel']=['eq',0];
                $map['date']=['between',[$st,$et]];
                $re=Db::name('schedule')->where($map)->count();
                if($re!=($count+1)){
                    return array('status'=>4,'msg'=>"不在可请假的时间段，请查询排班表！");
                }
                //开启事务，只有更改状态成功之后才能插入记录
                Db::startTrans();
                try{
                    //更改表状态
                    //构造请假的时间范围，并逐个更改字段状态
                    $where['date']=['between',[$st,$et]];
                    $where['eId']=$eId;
                    $where['isDel']=['eq',0];
                    //查询是否请过假
                    $select['date']=['between',[$st,$et]];
                    $select['eId']=$eId;
                    $select['isDel']=['eq',0];
                    $select['isLevel']=['neq',1];
                    $rr=Db::name('schedule')->where($select)->count();
                    if($rr==0){
                        return array('status'=>6,"msg"=>'你已经请过假了！');
                    }
                    Db::name('schedule')->where($where)->setField('isLevel',1);
                    //插入记录
                    Db::name('level')->insert(
                        [
                            'startTime'=>$POST['starttime'],
                            'endTime'=>$POST['endtime'],
                            'eId'=>session('emp')['eId'],
                            'remark'=>$POST['mark'],
                            'addTime'=>date('Y-m-d h:i:s',time()),
                        ]);
                    //事务提交
                    Db::commit();
                    return array('status'=>1,'msg'=>'提交成功！');
                }catch(Exception $e){
                    //事务回滚
                    Db::rollback();
                    return array('status'=>5,"msg"=>'提交失败！');
                }
            }

        }else{
            $this->error('禁止浏览器访问！');
        }



    }

}