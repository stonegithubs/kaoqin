<?php
namespace app\index\controller;
use library\Data;
use think\Controller;
use think\Db;
use think\db\Query;
/**
 * Class BasicController
 * @package app\index\controller
 * 前台控制器的权限控制器
 */

class BasicController extends Controller
{
    /**
     * 默认检查用户登录状态
     * @var bool
     */
    protected $checkLogin = true;
    /**
     * 后台权限控制初始化方法
     */
    public function _initialize() {
        # 用户登录状态检查
        if ($this->checkLogin) {
            //首页不用检验登录状态
            if($this->request->action()!='index'){
                if (!$this->_isLogin()) {
                    return array('status'=>7,'msg'=>'你还没登录！');
                    $this->redirect('@Index/login/index');
                }
            }
            $user=session("emp");
            $this->assign("user",$user);






        }
    }
    /**
     * 判断用户是否登录
     * @return bool
     */
    protected function _isLogin() {
        $user = session('emp');
        if (empty($user) || empty($user['eId'])) {
            return false;
        }
        return true;
    }

}