/**
	* isPositiveInteger   是否为正整数
	* danxuankuang        获取单选框的选中值
	* yzxssr              验证小时
	* yzfzsr              验证分钟
	* checkString         超出省略
	* get_xq              根据时间戳获取星期
	* getNowtime          将时间戳转为日期格式
	* ajax_php_fn         js与php有回调的通信
	* ltrim               去左空格
	* rtrim               去右空格
	* trim                去左右空格
	* randomNum           生成从minNum到maxNum的随机数
 */

//是否为正整数 是正整数 返回true 不是 返回false
function isPositiveInteger(s){
   var re = /^[0-9]+$/ ;
   return re.test(s)
} 
//获取单选框的选中值
function danxuankuang(str){
	var xz;
	var obj2 = document.getElementsByName(str);
    for(var i=0; i<obj2.length; i ++){
        if(obj2[i].checked){
           xz=obj2[i].value;
        }
    }
    return xz;
}
//验证小时 符合返回true
function yzxssr(s){
	var re = /^[0-9]+$/ ;
	if(!re.test(s)){
	 return false;
	}
	if(s>=24){
	 return false;
	}
	return true;
}
//验证分钟  符合返回true
function yzfzsr(s){
	var re = /^[0-9]+$/ ;
	if(!re.test(s)){
	 return false;
	}
	if(s>=60){
	 return false;
	}
	return true;
}
//超出省略 s 字符串 l 规定长度 tag 省略符
function checkString(s,l,tag){  
    if(s.length>l){  
        return s.substring(0,l)+tag;  
    }  else{
    	return s;
    }
}  
//根据时间戳获取星期
function get_xq(times){
  var newDate = new Date();
  newDate.setTime(times * 1000);
  var day;
  if(newDate.getDay()==0) day = " 星期日"
  if(newDate.getDay()==1) day = " 星期一"
  if(newDate.getDay()==2) day = " 星期二"
  if(newDate.getDay()==3) day = " 星期三"
  if(newDate.getDay()==4) day = " 星期四"
  if(newDate.getDay()==5) day = " 星期五"
  if(newDate.getDay()==6) day = " 星期六"
  return day;
}
//将时间戳转为日期格式
function getNowtime(times){
              var newDate = new Date();
              newDate.setTime(times * 1000);
              Date.prototype.format = function(format) {
                     var date = {
                            "M+": this.getMonth() + 1,
                            "d+": this.getDate(),
                            "h+": this.getHours(),
                            "m+": this.getMinutes(),
                            "s+": this.getSeconds(),
                            "q+": Math.floor((this.getMonth() + 3) / 3),
                            "S+": this.getMilliseconds()
                     };
                     if (/(y+)/i.test(format)) {
                            format = format.replace(RegExp.$1, (this.getFullYear() + '').substr(4 - RegExp.$1.length));
                     }
                     for (var k in date) {
                            if (new RegExp("(" + k + ")").test(format)) {
                                   format = format.replace(RegExp.$1, RegExp.$1.length == 1
                                          ? date[k] : ("00" + date[k]).substr(("" + date[k]).length));
                            }
                     }
                     return format;//使用var shijian=newDate.format('yyyy-MM-dd');来获取对应的时间格式
              }
              var shijian=newDate.format('yyyy-MM-dd hh:mm:ss');
              return shijian;
}

//js与php有回调的通信
function ajax_php_fn(path,fn){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}else{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4&&xmlhttp.status==200){
				date=xmlhttp.responseText;
				if(fn){
					fn(date);
				}	
			}
		}
		//alert(path);
		xmlhttp.open("POST",path,true);
		xmlhttp.send()
} 
//去左空格;
function ltrim(s){
    return s.replace(/(^\s*)/g, "");
}
//去右空格;
function rtrim(s){
    return s.replace(/(\s*$)/g, "");
}
//去左右空格;
function trim(s){
    return s.replace(/(^\s*)|(\s*$)/g, "");
}

//生成从minNum到maxNum的随机数
function randomNum(minNum,maxNum){ 
    switch(arguments.length){ 
        case 1: 
            return parseInt(Math.random()*minNum+1,10); 
        break; 
        case 2: 
            return parseInt(Math.random()*(maxNum-minNum+1)+minNum,10); 
        break; 
            default: 
                return 0; 
            break; 
    } 
} 