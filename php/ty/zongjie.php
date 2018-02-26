<?php
	//查询数据库中字段最大的十条数据
	select * from kehui_ms_gjc order by gjcsl desc limit 10
	//一条数据中的字段数据相加
	select name,(m1+m2+m3+m4+m5+m6+m7+m8+m9+m10+m11+m12) as sum from js_yfbfl

	// php过滤地址中传入的值
	//取得浏览器提交的信息,数字:type=i ， 字串:type=c
	function get_input($name,$type='c'){
	if($type=="c"){
		$val=$_REQUEST[$name];
		//StripSlashes() 该函数用于清理从数据库或 HTML 表单中取回的数据
		$val=StripSlashes($val);
		$val=str_replace("'","''",$val);
		$val=str_replace("<?","&lt;?",$val);
		$val=str_replace("?>","?&gt;?",$val);
		return $val;
	}else{
		return preg_replace("/[^\d]/i","",$_POST[$name]);
	}
	}

//$path_name 绝对路径及文件名文件名    $save_name 保存文件的名字
		$a=intval($_REQUEST["a"]);
		$b=$_REQUEST["b"];
		$url = $_SERVER['DOCUMENT_ROOT']."/home".$a."/images/".$b;
				download_by_path($url,$b);
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



*PHP正则提取图片img标记中的任意属性*/  
$str = '<center><img src="/uploads/images/20100516000.jpg" height="120" width="120"><br />PHP正则提取或更改图片img标记中的任意属性</center>';  
  
//1、取整个图片代码  
preg_match('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i',$str,$match);  
echo $match[0];  
  
//2、取width  
preg_match('/<img.+(width=\"?\d*\"?).+>/i',$str,$match);  
echo $match[1];  
  
//3、取height  
preg_match('/<img.+(height=\"?\d*\"?).+>/i',$str,$match);  
echo $match[1];  
  
//4、取src  
preg_match('/<img.+src=\"?(.+\.(jpg|gif|bmp|bnp|png))\"?.+>/i',$str,$match);  
echo $match[1];  
  
/*PHP正则替换图片img标记中的任意属性*/  
//1、将src="/uploads/images/20100516000.jpg"替换为src="/uploads/uc/images/20100516000.jpg")  
print preg_replace('/(<img.+src=\"?.+)(images\/)(.+\.(jpg|gif|bmp|bnp|png)\"?.+>)/i',"\${1}uc/images/\${3}",$str);  
echo "<hr/>";  
  
//2、将src="/uploads/images/20100516000.jpg"替换为src="/uploads/uc/images/20100516000.jpg",并省去宽和高  
print preg_replace('/(<img).+(src=\"?.+)images\/(.+\.(jpg|gif|bmp|bnp|png)\"?).+>/i',"\${1} \${2}uc/images/\${3}>",$str);  




// 判断是否手机访问
function is_mobile_request(){
	    $_SERVER['ALL_HTTP'] = isset($_SERVER['ALL_HTTP']) ? $_SERVER['ALL_HTTP'] : '';
	    $mobile_browser = '0';
	    if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom)/i', strtolower($_SERVER['HTTP_USER_AGENT'])))     $mobile_browser++;    if((isset($_SERVER['HTTP_ACCEPT'])) and (strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') !== false))     
	    $mobile_browser++;
	    if(isset($_SERVER['HTTP_X_WAP_PROFILE']))     
	    $mobile_browser++;    
	    if(isset($_SERVER['HTTP_PROFILE']))     
	    $mobile_browser++;    
	    $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));    
	    $mobile_agents = array(       
	    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',       
	    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',       
	    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',       
	    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',       
	    'newt','noki','oper','palm','pana','pant','phil','play','port','prox',       
	    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',       
	    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',       
	    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',       
	    'wapr','webc','winw','winw','xda','xda-'     );    
	    if(in_array($mobile_ua, $mobile_agents))     
	    $mobile_browser++;    
	    if(strpos(strtolower($_SERVER['ALL_HTTP']), 'operamini') !== false)     
	    $mobile_browser++;    
	    // Pre-final check to reset everything if the user is on Windows    
	    if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows') !== false)     
	    $mobile_browser=0;    
	    // But WP7 is also Windows, with a slightly different characteristic    
	    if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows phone') !== false)     
	    $mobile_browser++;    
	    if($mobile_browser>0)     
	    return true;    
	    else   
	    return false; 
}

//将用户名进行处理，中间用星号表示  
function substr_cut($user_name){  
  
  
        //获取字符串长度  
        $strlen = mb_strlen($user_name, 'utf-8');  
        //如果字符创长度小于2，不做任何处理  
        if($strlen<2){  
            return $user_name;  
        }else{  
            //mb_substr — 获取字符串的部分  
            $firstStr = mb_substr($user_name, 0, 3, 'utf-8');  
            $lastStr = mb_substr($user_name, -1, 1, 'utf-8');  
            //str_repeat — 重复一个字符串  
            return $strlen == 2 ? $firstStr . str_repeat('*', mb_strlen($user_name, 'utf-8') - 1) : $firstStr . str_repeat("*", $strlen - 2) . $lastStr;  
        }  
}  









?>