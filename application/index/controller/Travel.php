<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2017/3/30
 * Time: 13:53
 */

namespace app\index\controller;


use think\Db;

/**
 * Class Travel
 * @package app\index\controller
 *出差
 */
class Travel extends BasicController
{
    public function travellist(){
        $id=session('emp')['eId'];
        $re=Db::name('travel')->where('eId',$id)->order('addTime desc')->paginate(3);
        $this->assign('lists',$re);
        return view('list');
    }

}