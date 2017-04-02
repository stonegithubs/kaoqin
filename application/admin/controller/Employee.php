<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/13
 * Time: 15:55
 */
namespace app\admin\controller;

use controller\BasicAdmin;
use think\Cache;
use think\Db;
use think\Exception;
use think\Request;

class Employee extends BasicAdmin{

    //职员列表
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
        $data = Db::name('Employee')->alias('e')
            ->join('dept d ','e.dId = d.dId','left')
            ->where($where)->paginate(3,false,['query'=>$select]); //分页
        $depts = Db::name('dept')->where(array('isDel'=>0))->select();
        $this->assign("depts",$depts);
        $this->assign('data',$data);
        $this->assign('select',$select);
        return view();
    }


    //删除资源
    public function del(){

        $post = $this->request->post();
        $eId = $post['eId'];
        try{
            Db::name('employee')->where('eId',$eId)->setField(array('isDel'=>1,'delTime'=>getCurrTime()));
            return array('status'=>3,"msg"=>'删除成功！');
        }catch(Exception $e){
            return array('status'=>0,"msg"=>'删除失败！');
        }
    }

    //添加一个密码为123456的新职员
    public function addOne(){
        $r = Db::name('employee')->insert(array('password'=>md5('123456')));
        if($r)
            return array('status'=>1,"msg"=>'新增成功！');
        else
            return array('status'=>0,"msg"=> '操作失败！');
    }

}