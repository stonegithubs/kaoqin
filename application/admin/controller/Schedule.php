<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/17
 * Time: 9:46
 */
namespace app\admin\controller;

use controller\BasicAdmin;
use think\Cache;
use think\Db;
use think\Request;

//排班考勤控制器
class Schedule extends BasicAdmin{

    //职员今天的出勤记录
    public function index(){
        $name = Request::instance()->param('name');
        $dId = Request::instance()->param('dId');
        $select['name'] = $name;
        $select['dId'] = $dId;
        if($select['name']){
            $where['e.name'] = array('like','%'.$name.'%');
        }
        if( !empty($select['dId']) &&  $select['dId'] != -1 ){
            $where['e.dId'] = $select['dId'];
        }elseif($select['dId'] === '0'){
            $select['dId'] = 0;
            $where['e.dId'] = 0;
        } else{
            $select['dId'] = -1;
        }

        $where['e.isDel'] = 0;
        $employees = Db::name('employee')->alias('e')
            ->join('dept d','d.dId=e.dId','left')
            ->where($where)->paginate(6,false,['query'=>$select]);
        $page = $employees->render();
        $eArr = $employees->items();
        foreach($eArr as $k => $item){
            $schedule = Db::name('schedule')->where(array('eId'=>$item['eId'],'date'=>date('Y-m-d'),'isDel'=>0))->find();//当天的排班记录
            if($schedule){
                $record = Db::name('scheduleRecord')->where('sId',$schedule['sId'])->order('type asc')->select(); //当天的打卡记录
                $times = count($record);
                switch($times){
                    case 0:
                        $eArr[$k]['record'] = 0;
                        $eArr[$k]['isTravel'] = $schedule['isTravel'];
                        $eArr[$k]['isLevel'] = $schedule['isLevel'];
                        break;
                    case 1:
                        $eArr[$k]['record'] = 1;
                        $eArr[$k]['morning'] = $record[0];
                        break;
                    case 2:
                        $eArr[$k]['record'] = 2;
                        $eArr[$k]['morning'] = $record[0];
                        $eArr[$k]['night'] = $record[1];
                        break;
                    default:
                        $eArr[$k]['record'] = 0;
                        break;
                }
                $eArr[$k]['isSchedule'] = 1;
            }else{
                $eArr[$k]['isSchedule'] = 0;
            }
        }
        $this->assign('employees',$eArr);
        $this->assign('page',$page);

        $depts = Db::name('dept')->where(array('isDel'=>0))->select();
        $this->assign("depts",$depts);
        $this->assign('select',$select);
        return view();
    }

    //职员的排班表
    public function scheduleList(){
        //获得查询条件
        $name = Request::instance()->param('name');
        $dId = Request::instance()->param('dId');
        $select['name'] = $name;
        $select['dId'] = $dId;
        if($select['name']){
            $where['e.name'] = array('like','%'.$name.'%');
        }
        if( !empty($select['dId']) &&  $select['dId'] != -1 ){
            $where['e.dId'] = $select['dId'];
        }elseif($select['dId'] === '0'){
            $select['dId'] = 0;
            $where['e.dId'] = 0;
        } else{
            $select['dId'] = -1;
        }
        $where['e.isDel'] = 0;
        $employees = Db::name('employee')->alias('e')
            ->join('dept d','d.dId=e.dId','left')
            ->where($where)->paginate(6,false,['query'=>$select]);
        //获得分页和数据
        $page = $employees->render();
        $eArr = $employees->items();
        $week = date('w'); //周末为0，周一：1....
        if($week == 0){
            //本周
            $startTime = date('Y-m-d',strtotime('-6 day'));
            $endTime = date('Y-m-d');
            //下周
            $startTimeNext  = date('Y-m-d',strtotime('+1'.' day'));
            $endTimeNext    = date('Y-m-d',strtotime('+7'.' day'));
        }else{
            //本周
            $day = 7-$week;
            $startTime  = date('Y-m-d',strtotime('-'.($week-1).' day'));
            $endTime    = date('Y-m-d',strtotime('+'.$day.' day'));
            //下周
            $startTimeNext  = date('Y-m-d',strtotime('+'.($day+1).' day'));
            $endTimeNext    = date('Y-m-d',strtotime('+'.($day+7).' day'));
        }

        foreach($eArr as $k => $item){
            //取出本周排班记录
            $schedules = Db::name('schedule')->where(array('isTravel'=>0,'isLevel'=>0,'eId'=>$item['eId'],'isDel'=>0,'date'=>array('between',array($startTime,$endTime))))->order('date asc')->select();//当天的排班记录
            if($schedules){
                $eArr[$k]['isSchedule'] = 1;
                $temp = [];
                foreach($schedules as $i=>$schedule){
                    $schedules[$i]['week'] = getWeek($schedule['date']);
                    $weekStatus = getWeek($schedule['date']);
                    if($schedule['isTravel']){
                        $weekStatus .= '出差';
                    }else if($schedule['isLevel']){
                        $weekStatus .= '请假';
                    }
                    $temp[] = $weekStatus;
                }
                $eArr[$k]['schedules'] = $schedules;
                $eArr[$k]['weeks'] = implode('、',$temp);
            }else{
                $eArr[$k]['isSchedule'] = 0;
            }
            //取出下周排班记录
            $schedules = Db::name('schedule')->where(array('eId'=>$item['eId'],'isDel'=>0,'date'=>array('between',array($startTimeNext,$endTimeNext))))->order('date asc')->select();//当天的排班记录
            if($schedules){
                $eArr[$k]['nextSchedule'] = 1;
                $temp = [];
                foreach($schedules as $i=>$schedule){
                    $schedules[$i]['week'] = getWeek($schedule['date']);
                    $weekStatus = getWeek($schedule['date']);
                    if($schedule['isTravel']){
                        $weekStatus .= '出差';
                    }else if($schedule['isLevel']){
                        $weekStatus .= '请假';
                    }
                    $temp[] = $weekStatus;
                }
                $eArr[$k]['nextSchedules'] = $schedules;
                $eArr[$k]['nextWeeks'] = implode('、',$temp);
            }else{
                $eArr[$k]['nextSchedule'] = 0;
            }

        }
        if($week == 0){
            $week = 7;
        }

        $this->assign('employees',$eArr);
        $this->assign('page',$page);
        $depts = Db::name('dept')->where(array('isDel'=>0))->select();//取得部门数据
        $this->assign("depts",$depts);
        $this->assign('select',$select);
        $this->assign('week',$week);
        return view();
    }

    //为职员添加排班
    public function add(){
        //eId => 排班职员ID time => 本周还是下周排班 1为本周，2为下周  day => 排班时间
        $eId = $this->request->post('eId');
        $time = $this->request->post('time');
        $days = $this->request->post('day/a');
        $week = date('w'); //周末为0，周一：1....
        if(empty($days))
            return array('status'=>0,'msg'=>'请选择排班日期！');
        if($time == 2){//下周
            if($week != 0)
                $week = $week- 7;
        }
        foreach($days as $day){
            if($day == 0){
                $day = 7;
            }
            $date =date('Y-m-d',strtotime(($day-$week).' day'));
            //查询是否存在排班，不存在则插一条记录
            $r = Db::name('schedule')->where(array('eId'=>$eId,'date'=>$date))->find();
            if(!$r){
                Db::name('schedule')->insert(array('eId'=>$eId,'date'=>$date));
                //是否有出差记录
                $travel = Db::name('travel')->where(array('eId'=>$eId,'startTime'=>array('egt',$date),'endTime'=>array('elt',$date),'isDel'=>0))->find();
                $data = [];
                if($travel)
                    $data['isTravel'] = 1;
                //是否有请假记录
                $level = Db::name('level')->where(array('eId'=>$eId,'startTime'=>array('egt',$date),'endTime'=>array('elt',$date),'isDel'=>0))->find();
                if($level)
                    $data['isLevel'] = 1;
                if($data){
                    Db::name('schedule')->where(array('eId'=>$eId,'date'=>$date))->setField($data);
                }
            }elseif($r['isDel']){
                //存在记录，但是为删除状态（不排班）
                Db::name('schedule')->where('sId',$r['sId'])->setField(array('isDel'=>0));
                //是否有出差记录
                $travel = Db::name('travel')->where(array('eId'=>$eId,'startTime'=>array('egt',$date),'endTime'=>array('elt',$date),'isDel'=>0))->find();
                $data = [];
                if($travel)
                    $data['isTravel'] = 1;
                //是否有请假记录
                $level = Db::name('level')->where(array('eId'=>$eId,'startTime'=>array('egt',$date),'endTime'=>array('elt',$date),'isDel'=>0))->find();
                if($level)
                    $data['isLevel'] = 1;
                if($data){
                    Db::name('schedule')->where('sId',$r['sId'])->setField($data);
                }
            }
        }
        $count = count($days);
        return array('status'=>1,'msg'=>'排班'.$count.'天成功！');
    }

    //修改排班
    public function edit(){
        //eId => 排班职员ID type => 排班还是不排班 1排班，null为不排班  day => 排班时间
        $eId = $this->request->post('eId');
        $status = $this->request->post('status');
        $day = $this->request->post('day');
        if( strtotime($day) < time()){
            return array('status'=>0,'msg'=>'时间必须大于今天！');
        }
        $schedule = Db::name('schedule')->where(array('eId'=>$eId,'date'=>$day))->find();
        if($schedule){
            //存在记录则修改
            if($status)
                $r = Db::name('schedule')->where('sId',$schedule['sId'])->setField(array('isDel'=>0));
            else
                $r = Db::name('schedule')->where('sId',$schedule['sId'])->setField(array('isDel'=>1,'delTime'=>getCurrTime()));
        }else{
            if($status){
                $data['eId'] = $eId;
                $data['date'] = $day;
                //是否有出差记录
                $travel = Db::name('travel')->where(array('eId'=>$eId,'startTime'=>array('egt',$day),'endTime'=>array('elt',$day),'isDel'=>0))->find();
                if($travel)
                    $data['isTravel'] = 1;
                //是否有请假记录
                $level = Db::name('level')->where(array('eId'=>$eId,'startTime'=>array('egt',$day),'endTime'=>array('elt',$day),'isDel'=>0))->find();
                if($level)
                    $data['isLevel'] = 1;
                $r = Db::name('schedule')->insert($data);
            }else{
                $r = true;
            }
        }
        if($r === false)
            return array('status'=>0,'msg'=>'操作失败！');
        else
            return array('status'=>1,'msg'=>'修改成功！' );
    }


}