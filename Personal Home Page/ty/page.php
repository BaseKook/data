<?php
function Page($totalline=0,$maxthreads=10,$page=1,$url='',$miz){
		$nextpage="<div>";
		if($page==""){
			$page=1;
		}
		if($totalline>$maxthreads){
			$pagewei = 10;
			$offset = 2;
			$page1=$page-1;
			$page2=$page+1;
			$pages = ceil($totalline / $maxthreads);//总页数
			if($page>$pages){
				Header("Location:".$url."&page=".$pages."");
			}
			$from = $page - $offset;
			$to = $page + $pagewei - $offset - 1;
			if($pagewei > $pages) {
				$from = 1;
				$to = $pages;
			} else {
				if($from < 1) {
					$to = $page + 1 - $from;
					$from = 1;
					if(($to - $from) < $pagewei && ($to - $from) < $pages) {
						$to = $pagewei;
					}
				} elseif($to > $pages) {
					$from = $page - $pages + $to;
					$to = $pages;
					if(($to - $from) < $pagewei && ($to - $from) < $pages) {
						$from = $pages - $pagewei + 1;
					}
				}
			}
			if($page>1){
				$nextpage .="<a onclick=\"".$miz."(1)\" class=anniu >首页&nbsp;";
				$nextpage .="<a onclick=\"".$miz."($page1)\" class=anniu >上页</a>&nbsp;";
			}
			/*else{
			$nextpage .="首页&nbsp;";
			$nextpage .="上页";
			}*/
			for($i = $from; $i <= $to; $i++) {
				if($i != $page) {
					$nextpage .= "<a onclick=\"".$miz."($i)\">[$i]</a>&nbsp;";
				} else {
					$nextpage .='<a style=\"color:#ff0000;font-weight:bold;\">'.$i.'</a>&nbsp;';
				}
			}
			if($page2<=$pages){
				$nextpage.="<a onclick=\"".$miz."($page2)\" class=anniu>下页</a>&nbsp;";
				$nextpage.="<a onclick=\"".$miz."($pages)\" class=anniu>末页</a>&nbsp;";
			}
			/*else{
			$nextpage .="下页";
			$nextpage.="末页";
			}*/
			$nextpage.="</div>";
		}
		/*else{
		$nextpage="<div>共".$pages."页/".$totalline."条记录</div>";
		}*/
		return $nextpage;
	}
?>