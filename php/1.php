<?
//导出
if($action=="foutput"){
	header("Content-type: text/html;charset=utf-8");
	require_once KH_DIR . '/modules/admin1/PHPExcel/Classes/PHPExcel.php';
	require_once KH_DIR . '/modules/admin1/PHPExcel/Classes/PhpExcel/Writer/Excel5.php';
	include_once KH_DIR . '/modules/admin1/PHPExcel/Classes/PhpExcel/IOFactory.php'; 
	ini_set("date.timezone","Asia/Shanghai"); 
	date_default_timezone_set(PRC);
	$sbid=$_REQUEST['sbid'];
	$timea=$_REQUEST['timea'];
	$timeb=$_REQUEST['timeb'];
	$now=GetMkTime($timea." ".$timeb);
	$sql="select bad1,bad2,bad3,bad4,bad5,bad6,bad7,bad8,bad9,bad10,bad11,bad12,bad13,bad14,bad15,bad16,bad17,bad18,bad19,bad20,bad21,bad22,bad23,bad24 from zhanming_set where bshebeiid='$sbid'";
	//die($sql);
	//echo "<script>alert("$sql");</script>";
	$rsb=$db->GetRow($sql);
	//print_r($rsb);
	$jj=0;
	$sset=array();
	foreach ($rsb as $name=>$val){
		$sset[$jj]=split(",",$val);
		$jj++;
	}
	$objExcel = new PHPExcel(); 
	//表格第一排的列名
	$objExcel->getActiveSheet()->setCellValue('A1', "时间");
	// $sql="select a.name,a.shebeiid,a.ad1,a.ad2,a.ad3,a.ad4,a.ad5,a.ad6,a.ad7,a.ad8,a.ad9,a.ad10,
	// 	a.ad11,a.ad12,a.ad13,a.ad14,a.ad15,a.ad16,a.ad17,a.ad18,a.ad19,a.ad20,a.ad21,a.ad22,a.ad23,a.ad24,a.kg1,
	// 	a.kg2,a.kg3,a.kg4,a.kg5,a.kg6,a.kg7,a.kg8,a.kg9,a.kg10,a.kg11,a.kg12,a.bp1,a.bp2,a.bp3,a.bp4,a.bp5,a.bp6,
	// 	a.bp7,a.bp8,a.bpnum,b.bad1,b.bad2,b.bad3,b.bad4,b.bad5,b.bad6,b.bad7,b.bad8,b.bad9,b.bad10,b.bad11,
	// 	b.bad12,b.bad13,b.bad14,b.bad15,b.bad16,b.bad17,b.bad18,b.bad19,b.bad20,b.bad21,b.bad22,b.bad23,b.bad24
	// 	 from zhanming a left join zhanming_set b on b.bshebeiid=a.shebeiid where a.shebeiid='$sbid'";
	 // $rsa = $db->GetRow ( $sql );
	 $rsa = ["协管员","居委会","小区名称","楼号","单元号","户号","房屋性质","人员类别","女方姓名","女方身份证号码","婚姻状况","丈夫姓名","丈夫身份证号码","婚姻状况","结婚日期","现有男孩数","现有女孩数","头孩出生日期","头孩性别","二孩出生日期","二孩性别","末孩出生日期","末孩性别","末孩是否合法","避孕状况","避孕开始日期","联系电话","女方户籍地","女方工作单位"];
	$objExcel->getActiveSheet()->setCellValue('B1', $rsa[2]);
	$objExcel->getActiveSheet()->setCellValue('C1', $rsa[3]);
	$objExcel->getActiveSheet()->setCellValue('D1', $rsa[4]);
	$objExcel->getActiveSheet()->setCellValue('E1', $rsa[5]);
	$objExcel->getActiveSheet()->setCellValue('F1', $rsa[6]);
	$objExcel->getActiveSheet()->setCellValue('G1', $rsa[7]);
	$objExcel->getActiveSheet()->setCellValue('H1', $rsa[8]);
	$objExcel->getActiveSheet()->setCellValue('I1', $rsa[9]);
	$objExcel->getActiveSheet()->setCellValue('J1', $rsa[10]);
	$objExcel->getActiveSheet()->setCellValue('K1', $rsa[11]);
	$objExcel->getActiveSheet()->setCellValue('L1', $rsa[12]);
	$objExcel->getActiveSheet()->setCellValue('M1', $rsa[13]);
	$objExcel->getActiveSheet()->setCellValue('N1', $rsa[14]);
	$objExcel->getActiveSheet()->setCellValue('O1', $rsa[15]);
	$objExcel->getActiveSheet()->setCellValue('P1', $rsa[16]);
	$objExcel->getActiveSheet()->setCellValue('Q1', $rsa[17]);
	$objExcel->getActiveSheet()->setCellValue('R1', $rsa[18]);
	$objExcel->getActiveSheet()->setCellValue('S1', $rsa[19]);
	$objExcel->getActiveSheet()->setCellValue('T1', $rsa[20]);
	$objExcel->getActiveSheet()->setCellValue('U1', $rsa[21]);
	$objExcel->getActiveSheet()->setCellValue('V1', $rsa[22]);
	$objExcel->getActiveSheet()->setCellValue('W1', $rsa[23]);
	$objExcel->getActiveSheet()->setCellValue('X1', $rsa[24]);
	$objExcel->getActiveSheet()->setCellValue('Y1', $rsa[25]);
	$objExcel->getActiveSheet()->setCellValue('Z1', $rsa[26]);
	$objExcel->getActiveSheet()->setCellValue('AA1', $rsa[27]);
	$objExcel->getActiveSheet()->setCellValue('AB1', $rsa[28]);
	$objExcel->getActiveSheet()->setCellValue('AC1', $rsa[29]);
	// $objExcel->getActiveSheet()->setCellValue('AD1', $rsa[42]);
	// $objExcel->getActiveSheet()->setCellValue('AE1', $rsa[43]);
	// $objExcel->getActiveSheet()->setCellValue('AF1', $rsa[44]);
	// $objExcel->getActiveSheet()->setCellValue('AG1', $rsa[45]);
	
	// //剩余
	// $objExcel->getActiveSheet()->setCellValue('AH1', "瞬时流量");
	// $objExcel->getActiveSheet()->setCellValue('AI1', "总流量");
	// $objExcel->getActiveSheet()->setCellValue('AJ1', "入口温度");
	// $objExcel->getActiveSheet()->setCellValue('AK1', "出口温度");
	
	// $sql = "select dataa,bp1,bp2,bp3,bp4,bp5,bp6,bp7,bp8,ba1,ba2,ba3,lasttime from shujulog where shebeiid='$sbid' and lasttime<=$now and lasttime>($now-3600) ORDER BY lasttime desc";
	// //die($sql);
	// $rs = $db->Execute ( $sql ); // ,dataa,bp1,bp2,bp3,bp4,bp5,bp6,bp7,bp8,ba1

	// $rsarr=$rs->GetArray();
	// $num=count($rsarr);
	// for($i=2;$i < $num+2;$i++){
	// 	//时间
	// 	$bbb=date('H:i:s',$rsarr[$i-2][12]);
	// 	$objExcel->getActiveSheet()->setCellValue('A'.$i, $bbb);
	// 	$ad=split("-",$rsarr[$i-2][0]);
	// 	//取前三条记录,用作滤波
	// 	if($rsarr[$i-2+1][0] && $rsarr[$i-2+2][0] && $rsarr[$i-2+3][0]){
	// 		$ad2=split("-",$rsarr[$i-2+1][0]);
	// 		$ad3=split("-",$rsarr[$i-2+2][0]);
	// 		$ad4=split("-",$rsarr[$i-2+3][0]);
	// 	}
		
	// 	$objExcel->getActiveSheet()->setCellValue('B'.$i, js($rsb,$ad,$ad2,$ad3,$ad4,0));
		
	// 	$objExcel->getActiveSheet()->setCellValue('C'.$i, js($rsb,$ad,$ad2,$ad3,$ad4,1));
		
	// 	$objExcel->getActiveSheet()->setCellValue('D'.$i, js($rsb,$ad,$ad2,$ad3,$ad4,2));
		
	// 	$objExcel->getActiveSheet()->setCellValue('E'.$i, js($rsb,$ad,$ad2,$ad3,$ad4,3));
		
	// 	$objExcel->getActiveSheet()->setCellValue('F'.$i, js($rsb,$ad,$ad2,$ad3,$ad4,4));
		
	// 	$objExcel->getActiveSheet()->setCellValue('G'.$i, js($rsb,$ad,$ad2,$ad3,$ad4,5));
		
	// 	$objExcel->getActiveSheet()->setCellValue('H'.$i, js($rsb,$ad,$ad2,$ad3,$ad4,6));
		
	// 	$objExcel->getActiveSheet()->setCellValue('I'.$i, js($rsb,$ad,$ad2,$ad3,$ad4,7));
		
	// 	$objExcel->getActiveSheet()->setCellValue('J'.$i, js($rsb,$ad,$ad2,$ad3,$ad4,8));
		
	// 	$objExcel->getActiveSheet()->setCellValue('K'.$i, js($rsb,$ad,$ad2,$ad3,$ad4,9));
		
	// 	$objExcel->getActiveSheet()->setCellValue('L'.$i, js($rsb,$ad,$ad2,$ad3,$ad4,10));
		
	// 	$objExcel->getActiveSheet()->setCellValue('M'.$i, js($rsb,$ad,$ad2,$ad3,$ad4,11));
		
	// 	$objExcel->getActiveSheet()->setCellValue('N'.$i, js($rsb,$ad,$ad2,$ad3,$ad4,12));
		
	// 	$objExcel->getActiveSheet()->setCellValue('O'.$i, js($rsb,$ad,$ad2,$ad3,$ad4,13));
		
	// 	$objExcel->getActiveSheet()->setCellValue('P'.$i, js($rsb,$ad,$ad2,$ad3,$ad4,14));
		
	// 	$objExcel->getActiveSheet()->setCellValue('Q'.$i, js($rsb,$ad,$ad2,$ad3,$ad4,15));
		
	// 	$objExcel->getActiveSheet()->setCellValue('R'.$i, js($rsb,$ad,$ad2,$ad3,$ad4,16));
		
	// 	$objExcel->getActiveSheet()->setCellValue('S'.$i, js($rsb,$ad,$ad2,$ad3,$ad4,17));
		
	// 	$objExcel->getActiveSheet()->setCellValue('T'.$i, js($rsb,$ad,$ad2,$ad3,$ad4,18));
		
	// 	$objExcel->getActiveSheet()->setCellValue('U'.$i, js($rsb,$ad,$ad2,$ad3,$ad4,19));
		
	// 	$objExcel->getActiveSheet()->setCellValue('V'.$i, js($rsb,$ad,$ad2,$ad3,$ad4,20));
		
	// 	$objExcel->getActiveSheet()->setCellValue('W'.$i, js($rsb,$ad,$ad2,$ad3,$ad4,21));
		
	// 	$objExcel->getActiveSheet()->setCellValue('X'.$i, js($rsb,$ad,$ad2,$ad3,$ad4,22));
		
	// 	$objExcel->getActiveSheet()->setCellValue('Y'.$i, js($rsb,$ad,$ad2,$ad3,$ad4,23));
		
	// 	//变频器
	// 	list($pinlv1)=split("-",$rsarr[$i-2][1]);
	// 	$pinlv1=$pinlv1/100;
	// 	$objExcel->getActiveSheet()->setCellValue('Z'.$i, $pinlv1);
	// 	list($pinlv2)=split("-",$rsarr[$i-2][2]);
	// 	$pinlv2=$pinlv2/100;
	// 	$objExcel->getActiveSheet()->setCellValue('AA'.$i, $pinlv2);
	// 	list($pinlv3)=split("-",$rsarr[$i-2][3]);
	// 	$pinlv3=$pinlv3/100;
	// 	$objExcel->getActiveSheet()->setCellValue('AB'.$i, $pinlv3);
	// 	list($pinlv4)=split("-",$rsarr[$i-2][4]);
	// 	$pinlv4=$pinlv4/100;
	// 	$objExcel->getActiveSheet()->setCellValue('AC'.$i, $pinlv4);
	// 	list($pinlv5)=split("-",$rsarr[$i-2][5]);
	// 	$pinlv5=$pinlv5/100;
	// 	$objExcel->getActiveSheet()->setCellValue('AD'.$i, $pinlv5);
	// 	list($pinlv6)=split("-",$rsarr[$i-2][6]);
	// 	$pinlv6=$pinlv6/100;
	// 	$objExcel->getActiveSheet()->setCellValue('AE'.$i, $pinlv6);
	// 	list($pinlv7)=split("-",$rsarr[$i-2][7]);
	// 	$pinlv7=$pinlv7/100;
	// 	$objExcel->getActiveSheet()->setCellValue('AF'.$i, $pinlv7);
	// 	list($pinlv8)=split("-",$rsarr[$i-2][8]);
	// 	$pinlv8=$pinlv8/100;
	// 	$objExcel->getActiveSheet()->setCellValue('AG'.$i, $pinlv8);
	// 	//剩余
	// 	list($shunshi,$zongliuliang)=split("##",$rsarr[$i-2][9]);
	// 	$objExcel->getActiveSheet()->setCellValue('AH'.$i, round($shunshi,2));
	// 	$objExcel->getActiveSheet()->setCellValue('AI'.$i, $zongliuliang);
	// 	$objExcel->getActiveSheet()->setCellValue('AJ'.$i, $rsarr[$i-2][10]);
	// 	$objExcel->getActiveSheet()->setCellValue('AK'.$i, $rsarr[$i-2][11]);
		
	}
	//对报表进行命名
  $shijian=date("Y-m-d H-i");
  $sheetname=$shijian;
  $objExcel->getActiveSheet()->setTitle($sheetname);
  
  //上面设置了报表的名子就就可以下载了
  $filename=$sheetname.'.xls';
  $filenamea=$sheetname.'.xlsx';
 	//下载方式
  header("Content-type: text/csv");
  ob_end_clean();
  header('Content-Disposition: attachment;filename="'.$filename.'"');
  header('Cache-Control: must-revalidate, post-check=0,pre-check=0');
  header('Expires:0');
  header('Pragma:public');
  $objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel5');
  $objWriter->save('php://output');
}