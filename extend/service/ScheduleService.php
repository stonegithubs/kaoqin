<?php
/**
 * Created by PhpStorm.
 * User: alan_bear
 * Date: 2017/3/20
 * Time: 19:59
 */

namespace service;

use think\Db;

class ScheduleService{
    private static $_instance;

    public static function getIns(){
        if( (self::$_instance instanceof self) == false){
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    //获得某段时间内的排班表
    function getCurrSchedule($eId=0,$startTime=0,$endTime=0){
        Db::name('schedule')->where(array('eId'=>$eId,'date'=>array('between',array($startTime,$endTime))))->select();
    }

}