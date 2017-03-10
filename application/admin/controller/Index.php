<?php
namespace app\admin\controller;
use controller\BasicAdmin;
use think\Db;
use Exception;
use think\Request;
use think\response\Json;

class Index extends BasicAdmin
{
    public function index()
    {
        return view('index');
    }

    public function userlist()
    {
        $user = Db::name('SystemUser')->where('status', 1)->paginate(3);
        $this->assign('users', $user);
        return view("userlist");
    }

    public function useradd()
    {
        $request = Request::instance();
        $res = $request->post();
        array_splice($res, 2, 1);
        //加密密码
        $res['password'] = md5($res['password']);
        try {
            Db::name('SystemUser')->insert($res);
            echo 1;
        } catch (Exception $e) {
            echo 0;
        }
    }

    public function userdel()
    {
        $request = Request::instance();
        $id = $request->post()['id'];
        //查询是当前登录的用户?
        $id_session = session('user')['id'];
        if ($id_session == $id) {
            echo 2;
        } else {
            try {
                Db::name('SystemUser')->where('id', $id)->update(['is_deleted' => '1', 'status' => '0']);
                echo 1;
            } catch (Exception $e) {
                echo 0;
            }
        }
    }

    public function useredit()
    {
        $request = Request::instance();
        $type = $request->post()['type'];
        $id = $request->post()['id'];
        if ($type) {
            $res = Db::name('SystemUser')->where('id', $id)->select();
            $ress['res'] = json_encode($res);
            return $ress;
        }
    }

    public function useredited()
    {
        $request = Request::instance();

        $data = $request->post();
        array_splice($data, 2, 1);
        $id=$data['id'];
        $data['password'] = md5($data['password']);
        try {
            Db::name('SystemUser')->where('id', $id)->update($data);
            echo 2;
        } catch (Exception $e) {
            echo 3;
        }

    }
}
