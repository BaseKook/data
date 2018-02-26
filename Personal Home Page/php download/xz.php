<?php

if ( !defined('IN_KehuiCMS') ){
	die("Hacking attempt");
}
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


















?>