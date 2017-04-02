<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/16
 * Time: 17:42
 */
namespace app\admin\controller;

use controller\BasicAdmin;
use think\Cache;
use think\Db;
use think\Request;

class Level extends BasicAdmin{

    //请假列表
    public function index(){
        $name = Request::instance()->param('name');
        $status = Request::instance()->param('status');
        $select['name'] = $name;
        $select['status'] = $status;
        if($select['name']){
            $where['e.name'] = array('like','%'.$name.'%');
        }
        if( !empty($select['status']) &&  $select['status'] != -1 ){
            $where['l.status'] = $select['status'];
        }elseif($select['status'] === '0'){
            $select['status'] = 0;
            $where['l.status'] = 0;
        } else{
            $select['status'] = -1;
        }
        $where['l.isDel'] = 0;
        $data = Db::name('Level')->alias('l')
            ->join('employee e','e.eId=l.eId','left')
            ->where($where)->paginate(5,false,['query'=>$select]);//分页
        $this->assign('levels',$data);
        $this->assign('select',$select);
        return view();
    }

    //审核请假
    public function checkLevel(){
        $post = $this->request->post();
        if(!array_key_exists('lId',$post) || !array_key_exists('status',$post))
            return array('status'=>0,'msg'=>'参数错误！');
        $lId = $post['lId'];
        $status = $post['status'];
        if(!$lId || !$status){
            return array('status'=>0,'msg'=>'参数错误！');
        }
        if($status == 1)
            $msg = "审核通过！";
        else
            $msg = "审核不过！";
        $data['status'] = $status;
        $data['passTime'] = getCurrTime();
        $data['adminId']  = $this->adminId;
        //修改请假申请状态
        $r = Db::name('Level')->where(array('lId'=>$lId))->update($data);
        if($status){
            //如果通过则修改相关的排班记录
            $level = Db::name('Level')->where(array('lId'=>$lId))->find();
            Db::name('schedule')->where(array('eId'=>$level['eId'],'date'=>array('between',array($level['startTime'],$level['endTime']))))->setField(array('isLevel'=>1));
        }
        if($r){
            return array('status'=>1,'msg'=>$msg);
        }else{
            return array('status'=>0,'msg'=>'操作失败！');
        }
    }
}