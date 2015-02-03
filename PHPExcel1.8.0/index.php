<?php
if ($_GET['export'] == 1) {
    $filename = "导出数据" . date("Ymd", time());
    $fileversion = "Excel2007";
    exportExcelDownload($filename, $fileversion);
}

/**
 * 导出Excel档-通过浏览器下载
 * @param unknown $filename：导出的Excel档的文件名
 * @param unknown $fileversion: Excel5->Excel 97格式，Excel2007->Excel 2007格式
 */
function exportExcelDownload($filename, $fileversion) {
    //错误Debug设置
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);
    
    //包括PHPExcel类库文件
    require dirname(__FILE__) . '/Classes/PHPExcel.php';
    
    //创建一个PHPExcel对象
    $objPHPExcel = new PHPExcel();
    
    //设置导出Excel档的属性（右击Excel档->属性->详细信息，注：Excel5和Excel2007有所不同）
    $objPHPExcel->getProperties()
        ->setCreator("我是创建人")
        ->setLastModifiedBy("我是最后修改者")
        ->setTitle("我是标题") //设置Excel档名称
        ->setSubject("我是主题")
        ->setDescription("我是备注")
        ->setKeywords("我是标记")
        ->setCategory("我是类别");
    
    //=================================================================================================================//
    // 设置单元格字体
    //=================================================================================================================//
    $objPHPExcel->getDefaultStyle()->getFont()->setName('Courier New');         //设置当前工作表默认字体
    $objPHPExcel->getDefaultStyle()->getFont()->setSize(10);                    //设置当前工作表默认字体大小
    $objPHPExcel->getDefaultStyle()->getFont()->setBold(false);                 //设置当前工作表默认字体加粗
    $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);   //设置某单元格字体加粗
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true); //设置某列字体大小自适应
    
    //=================================================================================================================//
    // 设置单元格对齐方式
    //=================================================================================================================//
    $objPHPExcel->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT); //设置当前工作表默认对齐方式
    
    //某个Excel单元格自动换行
    $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setWrapText(true);
    
    //设置某行高度
    $objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(50);
    
    //设置某列宽度
    $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn(0)->setWidth(50);
    
    //重命名当前工作表名称
    $objPHPExcel->getActiveSheet()->setTitle('我是工作表1');
    
    //将第一张工作表设置为当前工作表，以便打开Excel工作薄后默认定位到第一张工作表
    $objPHPExcel->setActiveSheetIndex(0);
    
    //=================================================================================================================//
    // 设置单元格边框
    //=================================================================================================================//
    $objPHPExcel->getActiveSheet()->getStyle('B2')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN); //全部边框
    $objPHPExcel->getActiveSheet()->getStyle('A3')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN); //上边框
    $objPHPExcel->getActiveSheet()->getStyle('A3')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN); //右边框
    $objPHPExcel->getActiveSheet()->getStyle('A3')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN); //下边框
    $objPHPExcel->getActiveSheet()->getStyle('A3')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN); //左边框
    $objPHPExcel->getActiveSheet()->getStyle('A3')->getBorders()->getTop()->getColor()->setRGB('cc0000'); //设置边框颜色
    
    //=================================================================================================================//
    // 设置单元格背景色/底纹图案
    //=================================================================================================================//
    $objPHPExcel->getActiveSheet()->getStyle('A3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); //底纹图案
    $objPHPExcel->getActiveSheet()->getStyle('A3')->getFill()->getStartColor()->setARGB('FFEEEEEE'); //背景色
    
    //=================================================================================================================//
    // 设置单元格内容
    //=================================================================================================================//
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', '第一行第一列的内容'); //数据类型：String-Simple
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', '第一行第二列的内容');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('0', '2', "第二行第一列的内容");
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A3', 'I love my country.');
    
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A4', 10);    //数据类型：Number-Integer（根据填充内容自动判断单元格数据类型  ）
    
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5', 34.56); //数据类型：Number-Float
    
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A6', -7.89); //数据类型：Number-Negative
    
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A7', true);  //数据类型：Boolean-True
    
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A8', false); //数据类型：Boolean-False
    
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A9', NULL);  //数据类型：NULL
    
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A10', PHPExcel_Shared_Date::PHPToExcel( time() )); //数据类型：Date/Time-Date
    $objPHPExcel->getActiveSheet()->getStyle('A10')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDD2);
    
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A11', PHPExcel_Shared_Date::PHPToExcel( time() )); //数据类型：Date/Time-Time
    $objPHPExcel->getActiveSheet()->getStyle('A11')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_TIME4);
    
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A12', PHPExcel_Shared_Date::PHPToExcel( time() )); //数据类型：Date/Time-Date and Time
    $objPHPExcel->getActiveSheet()->getStyle('A12')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DATETIME);
    
    $objRichText = new PHPExcel_RichText();
    $objRichText->createText('你好 ');
    $objPayable = $objRichText->createTextRun('中国');
    $objPayable->getFont()->setBold(true);
    $objPayable->getFont()->setItalic(true);
    $objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_DARKGREEN ) );
    $objRichText->createText(', I love u.');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A13', $objRichText); //数据类型：富文本
    
    $objPHPExcel->getActiveSheet()->setCellValue('A14', '=SUM(A4:A5)');      //单元格内容类型：公式 
    
    $objPHPExcel->getActiveSheet()->setCellValueExplicit('A15', '847475847857487584', PHPExcel_Cell_DataType::TYPE_STRING); //数据类型：指定单元格数据类型
    
    
    // 将输出重定向到客户端web浏览器
    header('Cache-Control: max-age=0');
    // 如果使用IE9浏览器访问，可能需要下述代码
    header('Cache-Control: max-age=1');
    
    // 如果使用IE浏览器并通过SSL访问，下可能需要述代码
    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header ('Pragma: public'); // HTTP/1.0
    
    switch ($fileversion) {
        case "Excel5":
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $filename. '.xls"');
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            break;
        case "Excel2007":
            header('Content-Disposition: attachment;filename="' . $filename. '.xlsx"'); //Excel2007
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); //Excel2007
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            break;
    }
    $objWriter->save('php://output');
    exit;
}
?>
<!-- 下述测试用的HTML代码只能放在文件底部，否则导出的Excel档会出现内容格式错误  -->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
</head>
<a href="?export=1">导出Excel档</a>
</html>
