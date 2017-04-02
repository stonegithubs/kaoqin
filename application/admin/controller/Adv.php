<?php
/**
 * Created by PhpStorm.
 * User: alan_bear
 * Date: 2017/3/25
 * Time: 11:45
 */
namespace app\admin\controller;

use controller\BasicAdmin;
use think\Db;
use think\Exception;

class Adv extends BasicAdmin{

    //公告列表
    public function index(){
        $advs = Db::name('adv')->where('isDel',0)->order('addTime desc')->paginate(10);
        $this->assign('advs',$advs);
        return view();
    }

    //公告详情
    public function detail(){
        $advId = $this->request->get('advId');
        if($advId){
            $adv = Db::name('adv')->where('advId',$advId)->find();
            $this->assign('adv',$adv);
        }else
            $this->assign('adv','');
        return view();
    }

    //添加或者更新一个公告
    public function add(){
        $post = $this->request->post();
        $advId = $this->request->post('advId');
        unset($post['_wysihtml5_mode']);
        if($advId){
            try{
                Db::name('adv')->where('advId',$advId)->update($post);
                return array('status'=>2,"msg"=>'保存成功！');
            }catch(Exception $e){
                return array('status'=>0,"msg"=>'保存失败！');
            }
        }else{
            try{
                $post['addTime'] = getCurrTime();
                Db::name('adv')->insert($post);
//                return Db::name('adv')->getLastSql();
                return array('status'=>2,"msg"=>'新增成功！');
            }catch(Exception $e){
                return array('status'=>0,"msg"=>Db::name('adv')->getLastSql());
            }
        }
    }

    //删除公告
    public function del(){
        $post = $this->request->post();
        $advId = $post['advId'];
        try{
            Db::name('adv')->where('advId',$advId)->setField(array('isDel'=>1,'delTime'=>getCurrTime()));
            return array('status'=>3,"msg"=>'删除成功！');
        }catch(Exception $e){
            return array('status'=>0,"msg"=>'删除失败！');
        }
    }
}