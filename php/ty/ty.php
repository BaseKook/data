<?php
/**
	* ty_get_jt00                        获取今天00:00
	* ty_get_jt24                        获取今天24:00
	* cjwjj                              创建文件夹
	* get_curr_time_section              判断某个时间是否在每天的某一时间区域内
	* isDiffDays                         判断两个时间是否是同一天
	* timeDiff                           计算两个时间戳之差 返回 天 小时 分钟
	* hqmyt															 两个时间格式之间的每一天的数组
	* decodeUnicode                      当使用json_encode 将数组转为json格式时会出现中文被编码问题，想要将编码转为中文，调用此函数
	* ty_fasong_post                     post 发送
	* ty_fasong_post_json                post 发送 json
	* ty_get_fs                          get 请求
	* ty_fs_dx                           发送短信接口
	* ty_fs_dx_xin             					 发送短信接口 没有echo
	* ty_fs_dx_xin_hz				                 发送短信接口 修改后缀
    * download_by_path                   $path_name文件路径  $save_name文件名
    * substr_count    					 传入名字串 加******号
    * ty_dycs                           调用测试
    * ty_fs_dx_xin_nohz               发送短信接口 不带后缀
 */
//获取今天00:00
function ty_get_jt00(){
	return $todaystart = strtotime(date('Y-m-d'.'00:00:00',time()));
}
//获取今天24:00
function ty_get_jt24(){
	return $todayend = strtotime(date('Y-m-d'.'00:00:00',time()+3600*24));
}
//创建文件夹 path 要创建的多级目录
function cjwjj($path){
	//判断目录存在否，存在给出提示，不存在则创建目录
	if (is_dir($path)){  
		return "对不起！目录 " . $path . " 已经存在！";
	}else{
		//第三个参数是“true”表示能创建多级目录，iconv防止中文目录乱码
		$res=mkdir(iconv("UTF-8", "GBK", $path),0777,true); 
		if ($res){
			return "目录 $path 创建成功";
		}else{
			return "目录 $path 创建失败";
		}
	}
}

/**判断某个时间是否在每天的某一时间区域内？比如： 9:00-18:00，是返回1 不是返回-1
	time  要判断的时间  时间戳格式
	kaishi  每一天的开始时间 格式如 9:00
	jieshu  每一天的结束时间 格式如 18:00
	调用示例 get_curr_time_section("1503532800","9:00","18:00");
*/
function get_curr_time_section($time,$kaishi,$jieshu)  
{  
    $checkDayStr = date('Y-m-d ',$time);  
    $timeBegin1 = strtotime($checkDayStr.$kaishi.":00");  
    $timeEnd1 = strtotime($checkDayStr.$jieshu.":00");  
     
    $curr_time = $time;  
     
    if($curr_time >= $timeBegin1 && $curr_time <= $timeEnd1)  
    {  
        return 1;  
    }  
      
    return -1;  
}  
//判断两个时间是否是同一天 参数为时间戳格式 是同一天返回true 不是返回 false
function isDiffDays($last_date,$this_date){
	$last_date=getdate($last_date);
	$this_date=getdate($this_date);
    if(($last_date['year']===$this_date['year'])&&($this_date['yday']===$last_date['yday'])){
        return TRUE;
    }else{
        return FALSE;
    }
}

/**
 * 计算两个时间戳之差 返回 天 小时 分钟
 * @param $begin_time
 * @param $end_time
 * @return array
 */
function timeDiff( $begin_time, $end_time ){
    if ( $begin_time < $end_time ) {
        $starttime = $begin_time;
        $endtime = $end_time;
    } else {
        $starttime = $end_time;
        $endtime = $begin_time;
    }
    $timediff = $endtime - $starttime;
    $days = intval( $timediff / 86400 );
    $remain = $timediff % 86400;
    $hours = intval( $remain / 3600 );
    $remain = $remain % 3600;
    $mins = intval( $remain / 60 );
    $secs = $remain % 60;
    $res = array( "day" => $days, "hour" => $hours, "min" => $mins, "sec" => $secs );
    return $res;
}
/**两个时间格式之间的每一天的数组 return 数组[2017-06-01,2017-06-02]
 *  
 */
function hqmyt($time1,$time2){
	 $time1_sjc=strtotime($time1);
	$time2_sjc=strtotime($time2);
	$time2_sjc=strtotime('+1 Day',$time2_sjc);
	//获取相差天数
	$cha=timeDiff($time1_sjc,$time2_sjc);
	$cha=$cha['day'];
	$fh=array();
	for($i=0;$i<$cha;$i++){
		array_push($fh,date('Y-m-d',$time1_sjc));
		$time1_sjc=strtotime('+1 Day',$time1_sjc);
	}
	return $fh;
}
//decodeUnicode(json_encode($arr))  当使用json_encode 将数组转为json格式时会出现中文被编码问题，想要将编码转为中文，调用此函数，其中的UTF-8 是当前文件的编码
function decodeUnicode($str)
{
    return preg_replace_callback('/\\\\u([0-9a-f]{4})/i',
        create_function(
            '$matches',
            'return mb_convert_encoding(pack("H*", $matches[1]), "UTF-8", "UCS-2BE");'
        ),
        $str);
}

//post 发送  $post_data post请求的参数 数组格式
function ty_fasong_post($url,$post_data){
  $ch = curl_init () ;
  curl_setopt($ch, CURLOPT_URL, $url);
    //设置头文件的信息作为数据流输出
    curl_setopt($ch, CURLOPT_HEADER, 0);
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //设置post方式提交
   curl_setopt($ch, CURLOPT_POST, 1);
   //设置post数据
   curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	$result = curl_exec ( $ch ) ;
	curl_close($ch);
  return $result;
}
//post 发送 json  $post_data post请求的参数 json格式
function ty_fasong_post_json($url,$post_data){
  $headers = array(
    "Content-type: application/json",
    "Accept: application/json",
    "Cache-Control: no-cache",
    "Pragma: no-cache"
   );
  $ch = curl_init () ;
  curl_setopt($ch, CURLOPT_URL, $url);
    //设置头文件的信息作为数据流输出
    curl_setopt($ch, CURLOPT_HEADER, 0);
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //设置post方式提交
   curl_setopt($ch, CURLOPT_POST, 1);
   //设置post数据
   curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
   //设置头
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
    $result = curl_exec ( $ch ) ;
    curl_close($ch);
    return $result;
}
//get 请求 $string  请求
function ty_get_fs($string){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $fanhui=curl_exec($ch);
    curl_close($ch);
    return $fanhui;
}
//发送时的加密 先base64 编码 再翻转字符串
function ty_fs_jm1($str){
    $arr_3=base64_encode($str);//base64 编码
    $arr_4=strrev($arr_3);//翻转字符串
    return $arr_4;
}
//发送加密2  取字符串的第六位到第十一位
function ty_fs_jm2($str){
    $a=substr(md5($str),5,6);
    return $a;
}

//发送时获取服务器时间  $dk  端口
function ty_get_fwq_time($ip,$dk){
    $str="http://".$ip.":".$dk."/t";
    $fh=ty_get_fs($str);
    $fh=iconv('GB2312', 'UTF-8', $fh);
    $fh=json_decode($fh,true);
    return $fh["t"];
}

//发送短信 $phone 手机号码(多个用，号隔开)，$data 短信内容
function ty_fs_dx($phone,$data){
    $dx_dk="20123";
    $dx_ip="115.28.211.147";
    $data=$data."【智慧云谷】";
    $D1="{'msg':'".$data."','p':'[".$phone."]'}";
    $D1=ty_fs_jm1($D1);
    $sj=ty_get_fwq_time($dx_ip,$dx_dk);//获取服务器时间

    $D2=ty_fs_jm1($sj);//对时间进行加密
    $D3=ty_fs_jm2($D1.$D2);
    $arr = array('data' => $D1, 't' => $D2, 'd' => $D3);
    $arr_json=json_encode($arr);//将数组转为json
    echo $arr_json;
    $url="http://".$dx_ip.":".$dx_dk."/";
    $fanhui=ty_fasong_post_json($url,$arr_json);
    $jx=json_decode($fanhui,true);//解析返回值
    echo "<br>";
    echo $jx["status"];
}

//发送短信 $phone 手机号码(多个用，号隔开)，$data 短信内容
function ty_fs_dx_xin($phone,$data){
    $dx_dk="20123";
    $dx_ip="115.28.211.147";
    $data=$data."【智慧云谷】";
    $D1="{'msg':'".$data."','p':'[".$phone."]'}";
    $D1=ty_fs_jm1($D1);
    $sj=ty_get_fwq_time($dx_ip,$dx_dk);//获取服务器时间

    $D2=ty_fs_jm1($sj);//对时间进行加密
    $D3=ty_fs_jm2($D1.$D2);
    $arr = array('data' => $D1, 't' => $D2, 'd' => $D3);
    $arr_json=json_encode($arr);//将数组转为json
    $url="http://".$dx_ip.":".$dx_dk."/";
    $fanhui=ty_fasong_post_json($url,$arr_json);
    $jx=json_decode($fanhui,true);//解析返回值
}

//发送短信 $phone 手机号码(多个用，号隔开)，$data 短信内容
function ty_fs_dx_xin_hz($phone,$data,$hz){
    $dx_dk="20123";
    $dx_ip="115.28.211.147";
    $data=$data.$hz;
    $D1="{'msg':'".$data."','p':'[".$phone."]'}";
    $D1=ty_fs_jm1($D1);
    $sj=ty_get_fwq_time($dx_ip,$dx_dk);//获取服务器时间

    $D2=ty_fs_jm1($sj);//对时间进行加密
    $D3=ty_fs_jm2($D1.$D2);
    $arr = array('data' => $D1, 't' => $D2, 'd' => $D3);
    $arr_json=json_encode($arr);//将数组转为json
    $url="http://".$dx_ip.":".$dx_dk."/";
    $fanhui=ty_fasong_post_json($url,$arr_json);
    $jx=json_decode($fanhui,true);//解析返回值
}

//发送短信 $phone 手机号码(多个用，号隔开)，$data 短信内容 不带后缀
function ty_fs_dx_xin_nohz($phone,$data){
    $dx_dk="20123";
    $dx_ip="115.28.211.147";
    $data=$data;
    $D1="{'msg':'".$data."','p':'[".$phone."]'}";
    $D1=ty_fs_jm1($D1);
    $sj=ty_get_fwq_time($dx_ip,$dx_dk);//获取服务器时间

    $D2=ty_fs_jm1($sj);//对时间进行加密
    $D3=ty_fs_jm2($D1.$D2);
    $arr = array('data' => $D1, 't' => $D2, 'd' => $D3);
    $arr_json=json_encode($arr);//将数组转为json
    $url="http://".$dx_ip.":".$dx_dk."/";
    $fanhui=ty_fasong_post_json($url,$arr_json);
    $jx=json_decode($fanhui,true);//解析返回值
    return $jx["status"];
}

//文件下载
function download_by_path($path_name, $save_name){
         ob_end_clean();
         $hfile = fopen($path_name, "rb") or die("Can not find file: $path_name\n");
         Header("Content-type: application/octet-stream");
         Header("Content-Transfer-Encoding: binary");
         Header("Accept-Ranges: bytes");
         Header("Content-Length: ".filesize($path_name));
         Header("Content-Disposition: attachment; filename=\"$save_name\"");
         while (!feof($hfile)) {
            echo fread($hfile, 32768);
         }
         fclose($hfile);
}
//将进行处理，中间用星号表示  
function substr_cut($user_name){  
  
  
        //获取字符串长度  
        $strlen = mb_strlen($user_name, 'utf-8');  
        //如果字符创长度小于2，不做任何处理  
        if($strlen<4){
        	$firstStr = mb_substr($user_name, 0, 1, 'utf-8');
            return $firstStr . str_repeat('*', mb_strlen($user_name, 'utf-8') - 1);  
        }else{  
            //mb_substr — 获取字符串的部分  
            $firstStr = mb_substr($user_name, 0, 3, 'utf-8');  
            $lastStr = mb_substr($user_name, -1, 1, 'utf-8');  
            //str_repeat — 重复一个字符串  
            return $strlen == 2 ? $firstStr . str_repeat('*', mb_strlen($user_name, 'utf-8') - 1) : $firstStr . str_repeat("*", $strlen - 2) . $lastStr;  
        }  
}
function md5_16a2($a){
   $b=substr(md5(substr(md5($a),8,16)),8,16); 
   return $b;
}
function ty_dycs(){
	die("aaaaa");
}
?>