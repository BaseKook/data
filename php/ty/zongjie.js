	/*
		
		buquan          	字符串补全

		arrayMax			求出数组中最大植

		isCon				判断数组中是否存在值

		ajax_php			xmlxmlhttp

		Page 				AJAX

		sygd				过滤DOM生成的点击函数

















	 */

//补全
		function buquan(num,length){
		    var numstr = num.toString();
		    var l=numstr.length;
		    if (numstr.length>=length) {return numstr;}
		      
		    for(var  i = 0 ;i<length;i++){
		      numstr = numstr + "0";  
		     }
		    return numstr; 
		}
//求出数组中最大植
		function arrayMax(arrs) {
		    var max = arrs[0];
		    for(var i = 1,ilen = arrs.length; i < ilen; i++) {
		        if(arrs[i] > max) {
		            max = arrs[i];
		        }
		    }
		    return max;
		}
//判断数组中是否存在值
function isCon(arr, val){
	for(var i=0; i<arr.length; i++){
	if(arr[i] == val)
	return true;
	}
	return false;
}

//AJAX
function ajax_php(path){
	var fanhui;
		if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}else{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4&&xmlhttp.status==200){
				date=xmlhttp.responseText
				fanhui=date;			
							
			}
		}
		//alert(path);
		xmlhttp.open("POST",path,false);
		xmlhttp.send();
		retur
		}
//ajax
function Page(pages,page,pageurl,lmid,U_LoginID,tzlx){
    $.ajax({     
      url:'index.php?f=tongzhi_page',
      timeout:5000, 
      data:{
        "pages":pages,
        "page":page,
        "lmid":lmid,
        "U_LoginID":U_LoginID,
        "tzlx":tzlx
      },
      type:'get',
      cache:false,
      async:false,
      success:function(result){
        var pagelist=document.getElementById("pagelist");
        pagelist.innerHTML=result;                   
      },
      error:function(){
        alert("数据异常");
      },
        complete:function(XMLHttpRequest,status){ 
        if(status=='timeout'){
          ajaxTimeoutTest.abort();
            alert("超时");
        }
    }
    });
} 


//过滤DOM生成的点击函数
// 在dom省成点击函数时候会自动执行采用此函数
function sygd(f_name,cs){
	
	a=function (){
		eval(f_name+"("+cs+")");
	};
	return a;
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// 字符串会自动生成id需要转换获取
gdiv.getAttribute('id');


//php循环拆分二维数组 并转成字符串
//
	$name = array();
	$zong = array();
	for ($i=0; $i < count($sjtj) ; $i++) { 
		$name[$i]=$sjtj[$i][0];
		$zong[$i]=$sjtj[$i][1];
	}
	$name=implode("|",$name);
	$zong=implode("|",$zong);
// php数组转js数组
$ysjs=implode("|",$sjqsts);
var jieshou
riyue = riyue.split("|");



//正则6-20位可带符号不能有汉字
$('.xia2').click(function () {
		var pwd1=$('#pwd1').val()
		var pwd2=$('#pwd2').val()
		var reg= /[\u4e00-\u9fa5]/;
		if (reg.test(pwd1)) {
			console.log(youhanzi);
		} else {
			console.log(meiyouhanzi);
		}
	})
//元素没追加元素
// <body>
// 		<div id="box">
// 			<p class="d">1</p>
// 		</div>
// 		<button id="btn">添加</button>
// 	</body>
	<script>
		var box=document.getElementById('box');
		var btn=document.getElementById('btn');
		var aa='<p class="d">1</p>';
		btn.onclick=function () {
    		box.innerHTML = box.innerHTML+aa;
		}
//解决跨域问题
	<script>
	document.domain = '网址';
// 调子ifarme
	name.window.函数();
	// 子iframe变量
	name.window.$a=?;

//禁用鼠标右键
onclick="hiddenMenu()" onkeydown="DocKeyDown();" onLoad="" onselectstart="return false;" ondragstart="return false;" oncontextmenu="return false;"
//js调父级页面函数  变量
window.parent.aa();//调取aa函数
window.parent.bb;//调取bb变量
// 、jQuery 父、子页面之间页面元素的获取，方法的调用：
// 1. 父页面获取子页面元素：
    格式：$("#iframe的ID").contents().find("#iframe中的控件ID").click(); 
    实例：$("#ifm").contents().find("#iBtnOk").click(); // ifm 为 <iframe> 标签 id; iBtnOk 为子页面按钮 id
 
//2. 父页面调用子页面方法：
    格式：$("#iframe的ID")[0].contentWindow.iframe方法(); 
    实例：$("#ifm")[0].contentWindow().iClick(); // ifm 为 <iframe> 标签 id; iClick为子页面 js 方法

// 3. 子页面获取父页面元素：
    格式：$("#父页面元素id" , parent.document);
    实例：$("#pBtnOk" , parent.document).click(); 
// pBtnOk 为父页面标签 id


// 二、原生 js 父页面元素的获取，方法的调用：
// 1. 子页面调用父页面方法：
    格式：parent.父页面方法
    实例：parent.pClick(); // pClick 为父页面 js 方法

// 2. 子页面获取父页面元素：
    格式：window.parent.document.getElementById("父窗口元素ID");
    实例：window.parent.document.getElementById("pBtnOk");// pBtnOk为父页面标签
// 删除div
$("div#ID").remove();
//选择到当前元素
"<p onclick=a(event.target)>5656</p>"
// 多个样式这么搞
e.style.cssText='color:red;background-color:orange;';

//input 失去焦点执行
onblur=alert("可以关掉aaaaaaa!");
