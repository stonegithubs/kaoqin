<?php
namespace app\index\controller;
use think\Db;
use think\Request;
use think\Exception;
class Employee extends BasicController
{
    /**
     * 个人基本信息
     */
    public function index(){
        $user=session('emp');
        if(!empty($user['eId'])){
            $info=Db::name('employee')->where('eId',$user['eId'])->select();
            $this->assign('emp',$info[0]);
            return view('index');
        }
    }

    /**
     * @return array
     * 修改个人信息
     */
    public function updateinfo(){
        $user_id=session('emp')['eId'];
        $POST=Request::instance()->post();
        //匹配生日的格式
        if($POST['birthday']!=null && !preg_match('/([0-9]{4})-([0-9]{2})-([0-9]{2})/',$POST['birthday'])){
            return array('status'=>0,'msg'=>'生日格式不对');
        }
        //匹配手机号码
        if($POST['tel']!=null && !preg_match('/^0{0,1}(13[0-9]|15[7-9]|153|156|18[7-9])[0-9]{8}$/',$POST['tel'])){
            return array('status'=>2,'msg'=>'手机格式不对');
        }
        //匹配邮件
        if($POST['mail']!=null && !preg_match('/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/',$POST['mail'])){
            return array('status'=>3,'msg'=>'邮件格式不对');
        }
        try{
            Db::name('employee')->where('eId',$user_id)->update([
                    'name'=>$POST['name'],
                    'gender'=>$POST['gender'],
                    'place'=>$POST['place'],
                    'birthday'=>$POST['birthday'],
                    'degree'=>$POST['degree'],
                    'special'=>$POST['special'],
                    'address'=>$POST['address'],
                    'tel'=>$POST['tel'],
                    'mail'=>$POST['mail'],
                ]
            );
        }catch(Exception $e){
            return array('status'=>4,"msg"=>'修改失败！');
        }

        return array('status'=>1,'msg'=>"修改成功");
    }

    /**
     * 修改密码
     */
    public function editpasswd(){
        if (Request::instance()->isGet()){
            return view('editpasswd');
        }
        $user_passwd=session('emp')['password'];
        $POST=Request::instance()->post();
        if(!empty($user_passwd)){
            if (md5($POST['password'])!=$user_passwd){
                return array('status'=>0,'msg'=>"旧密码输入错误！");
            }
            $re=Db::name('employee')->where('eId',session('emp')['eId'])->update(['password'=>md5($POST['newpassword'])]);
            if($re==1){
                return array('status'=>1,'msg'=>"修改成功");
            }
            return array('status'=>2,'msg'=>"异常");
        }



    }
}