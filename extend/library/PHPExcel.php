<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/13
 * Time: 15:28
 */
namespace library;

class PHPExcel{
    public function __construct() // 初始化类，用于引入需要的类文件
     {
         vendor('PHPExcel.PHPExcel');
         vendor('PHPExcel.PHPExcel.IOFactory');
         vendor('PHPExcel.PHPExcel.Writer.Excel5');
         vendor('PHPExcel.PHPExcel.Writer.Excel2007');
     }

     /**
22      * 数据导出
23      * @param string $fileName  文件名
24      * @param array $headArr    表头数据（一维）
25      * @param array $data       列表数据（二维）
26      * @param int   $width      列宽
27      * @return bool
28      */
     public function push($fileName="", $headArr=array(), $data=array(), $width=20)
     {

         if (empty($headArr) && !in_array($headArr) && empty($data) && !in_array($data)) { // 判断传进来的数据
                     return false;
         }

         $date = date("Y_m_d",time());
         $fileName .= "_{$date}.xls"; // 表名的后缀处理

         $objPHPExcel = new \PHPExcel();

         //设置表头
         $key = ord("A");
         foreach($headArr as $v){
                     $colum = chr($key);
             $objPHPExcel->getActiveSheet()->getColumnDimension($colum)->setWidth($width); // 列宽
             $objPHPExcel->getActiveSheet()->getStyle($colum)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // 垂直居中
             $objPHPExcel->getActiveSheet()->getStyle($colum.'1')->getFont()->setBold(true); // 字体加粗
             $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
             $key += 1;
         }

         $column = 2;
         $objActSheet = $objPHPExcel->getActiveSheet();

         $border_end = 'A1'; // 边框结束位置初始化
         // 写入内容
         foreach($data as $key => $rows){ //行写入
                     $span = ord("A");
             foreach($rows as $keyName=>$value){// 列写入
                             $j = chr($span);
                 $objActSheet->setCellValue($j.$column, $value);
                 $border_end = $j.$column;
                 $span++;
             }
             $column++;
         }
         $objActSheet->getStyle("A1:".$border_end)->getBorders()->getAllBorders()->setBorderStyle(\PHPExcel_Style_Border::BORDER_THIN); // 设置边框


         $fileName = iconv("utf-8", "gb2312", $fileName);

         //重命名表
         //$objPHPExcel->getActiveSheet()->setTitle('test');

         //设置活动单指数到第一个表
         $objPHPExcel->setActiveSheetIndex(0);
         ob_end_clean();//清除缓冲区,避免乱码
         header('Content-Type: application/vnd.ms-excel');
         header("Content-Disposition: attachment;filename=\"$fileName\"");
         header('Cache-Control: max-age=0');

         $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
         $objWriter->save('php://output'); //文件通过浏览器下载
         exit;
     }
}