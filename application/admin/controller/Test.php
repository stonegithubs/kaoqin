<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/13
 * Time: 15:24
 */
namespace app\admin\controller;

use library\PHPExcel;
use think\Controller;
use think\Db;

class test extends Controller{
    public function test(){
        $week = date('w');
        echo $week;

    }

    public function addLevel(){
        $data['eId'] = 10001;
        $data['startTime']  = '2017-03-22';
        $data['endTime']    = '2017-03-23';
        $data['remark']     = '测试添加！';
        $data['addTime']    = getCurrTime();
        Db::name('level')->insert($data);
    }

}