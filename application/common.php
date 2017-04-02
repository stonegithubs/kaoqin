<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Db;
// 应用公共文件

function getCurrTime($time = 0){
    if($time){
        return date('Y-m-d H:i:s',$time);
    }else{
        return date('Y-m-d H:i:s',time());
    }
}

function strTimeToStr($strTime,$str = 'Y-m-d'){
    return date($str,strtotime($strTime));
}
//获取部门名
function getDeptName($deptId){
    $deptName=Db::name('dept')->where('dId',$deptId)->value('dName');
    return $deptName;
}

function getOption($name){
    $option = Db::name('option')->where('name',$name)->find();
    return $option;
}

function getWeek($time){
    $weeks = ['周日','周一','周二','周三','周四','周五','周六'];
    $week = date('w',strtotime($time));
    return $weeks[$week];
}
//返回用户请假状态
function getLeaveState($code){
    $arr=array('审核中','通过','不通过');
    return $arr[$code];
}
//格式化日期
function dateFormat($time){
    return date('Y-m-d',strtotime($time));
}
/**
 * 字符串截取，支持中文和其他编码
 * static
 * access public
 * @param string $str 需要转换的字符串
 * @param string $start 开始位置
 * @param string $length 截取长度
 * @param string $charset 编码格式
 * @param string $suffix 截断显示字符
 * return string
 */
function msubstr($str, $start=0, $length=20, $charset="utf-8") {
    $str=strip_tags($str);
   if(strlen($str)>$length){
       if(function_exists("mb_substr"))
           $slice = mb_substr($str, $start, $length, $charset);
       elseif(function_exists('iconv_substr')) {
           $slice = iconv_substr($str,$start,$length,$charset);
           if(false === $slice) {
               $slice = '';
           }
       }else{
           $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
           $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
           $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
           $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
           preg_match_all($re[$charset], $str, $match);
           $slice = join("",array_slice($match[0], $start, $length));
       }
       return $slice.'...';
   }else{
       return  $str;
   }


}
//获取出差信息
function getTravelState($code){
    $arr=array('审核中','确定','出差中');
    return $arr[$code];
}