<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/16
 * Time: 14:49
 */
namespace app\admin\controller;

use controller\BasicAdmin;
use think\Db;
use think\Exception;

class Dept extends BasicAdmin{

    //部门列表
    public function deptList(){
        $depts = Db::name('dept')->alias('d')
            ->join('employee e','e.dId=d.dId','left')
            ->where(array('d.isDel'=>0))
            ->field('d.dId,d.dName,d.description,count(e.eId) as sum')
            ->group('d.dId')
            ->paginate(5);//分页
        $this->assign('depts',$depts);
        return view();
    }

    //添加或修改一个部门
    public function add(){
        $post = $this->request->post();
        $dId = $post['dId'];
        if($dId){
            //更新
            try{
                Db::name('dept')->update($post);
//                $this->success('更新成功！');
                return array('status'=>2,"msg"=>'更新成功！');
            }catch(Exception $e){
//                $this->error('更新失败！');
                return array('status'=>0,"msg"=>'更新失败！');
            }

        }else{
            //添加
            try{
                $post['addTime'] = getCurrTime();
                Db::name('dept')->insert($post);
//                $this->success('添加成功！');
                return array('status'=>1,"msg"=>'添加成功！');
            }catch(Exception $e){
//                $this->error('添加失败！');
                return array('status'=>0,"msg"=>'添加失败！');
            }

        }
    }

    //删除，只有最高管理员可以
    public function del(){
        if(!$this->isAdmin)//非最高权限管理员
            return array('status'=>0,"msg"=>'用户权限不够，无法操作！');
        $post = $this->request->post();
        $dId = $post['dId'];
        try{
            Db::name('dept')->where('dId',$dId)->setField(array('isDel'=>1,'delTime'=>getCurrTime()));
            return array('status'=>3,"msg"=>'删除成功！');
        }catch(Exception $e){
            return array('status'=>0,"msg"=>'删除失败！');
        }
    }

}