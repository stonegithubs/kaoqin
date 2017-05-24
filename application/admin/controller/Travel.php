<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/16
 * Time: 18:00
 */
namespace app\admin\controller;

use controller\BasicAdmin;
use think\Cache;
use think\Db;
use think\Exception;
use think\Request;

//出差控制器
class Travel extends BasicAdmin{

    //出差列表
    public function index(){
        //获取查询条件
        $name = Request::instance()->param('name');
        $status = Request::instance()->param('status');
        $select['name'] = $name;
        $select['status'] = $status;
        if($select['name']){
            $where['e.name'] = array('like','%'.$name.'%');
        }
        if( !empty($select['status']) &&  $select['status'] != -1 ){
            $where['t.status'] = $select['status'];
        }elseif($select['status'] === '0'){
            $select['status'] = 0;
            $where['t.status'] = 0;
        } else{
            $select['status'] = -1;
        }
        $where['t.isDel'] = 0;
        $employees = Db::name('employee')->where('isDel',0)->field('eId,name')->select();
        $data = Db::name('travel')->alias('t')
            ->join('employee e','e.eId=t.eId','left')
            ->where($where)
            ->paginate(10,false,['query'=>$select]); //分页查询
        $this->assign('travels',$data);
        $this->assign('employees',$employees);
        $this->assign('select',$select);
        return view();

    }

    //添加或更新一个出差记录
    public function add(){
        $post = $this->request->post();
        $tId = $post['tId'];
        $eId = $post['eId'];
        $startTime = $post['startTime'];
        $endTime = $post['endTime'];
        if( strtotime($startTime) > strtotime($endTime)){
            return array('status'=>0,"msg"=>'起始时间要大于结束时间！');
        }
        if( strtotime($startTime) < time()){
            return array('status'=>0,"msg"=>'起始时间要大于今天！');
        }
        $times = ceil((strtotime($endTime)-strtotime($startTime))/(60*60*24))+1;
        $days = Db::name('schedule')->where(array('eId'=>$eId,'date'=>array('between',array($startTime,$endTime))))->count();
        if($times > $days){
            return array('status'=>0,"msg"=>'请确定出差期间已有排班！');
        }
        if($tId){
            //更新
            Db::startTrans();
            $travel = Db::name('travel')->where('tId',$tId)->find();
            Db::name('schedule')->where(array('eId'=>$eId,'date'=>array('between',array($travel['startTime'],$travel['endTime']))))->setField(array('isTravel'=>0));
            $r = Db::name('travel')->update($post);
            Db::name('schedule')->where(array('eId'=>$eId,'date'=>array('between',array($startTime,$endTime))))->setField(array('isTravel'=>1));

            if($r){
                Db::commit();
                return array('status'=>1,"msg"=>'更新成功！');
            } else{
                Db::rollback();
                return array('status'=>0,"msg"=>'操作失败！');
            }
        }else{
            //添加
            Db::startTrans();
            $post['adminId'] = $this->adminId;
            $r = Db::name('travel')->insert($post);
            Db::name('schedule')->where(array('eId'=>$eId,'date'=>array('between',array($startTime,$endTime))))->setField(array('isTravel'=>1));
            if($r){
                Db::commit();
                return array('status'=>1,"msg"=>'添加成功！');
            }
            else{
                $post['addTime'] = getCurrTime();
                Db::rollback();
                return array('status'=>0,"msg"=>'操作失败！');
            }

        }
    }

    //删除出差记录
    public function del(){
        //获取要删除那个记录Id
        $post = $this->request->post();
        $tId = $post['tId'];
        try{
            //isDel置1表示删除
            Db::name('travel')->where('tId',$tId)->setField(array('isDel'=>1,'delTime'=>getCurrTime()));
            return array('status'=>3,"msg"=>'删除成功！');
        }catch(Exception $e){
            return array('status'=>0,"msg"=>'删除失败！');
        }
    }

}