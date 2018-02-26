<?php 
///////////////////////////////////////////////////////
///
	append();
	//向页面输出
	// 点击button向页面发送一局话
	$("button").click(function(){
  		$("p").append(" <b>Hello world!</b>");
	});
	<button>按钮 </button>
	//点击按钮后会在页面p标签后添加这个b标签及内容
///
	getvalue();
	//获取页面中某个数值;获取button按钮的值
	<input type="button"  value="abc" onclick="getValue(this.value)"/>
	<script>
    function getValue(val){
        alert(val);
    }
	</script>
///
	strlen();
	//统计字符串的长度
	// 作为计数器的工作，它从内存的某个位置（可以是字符串开头，中间某个位置，甚至是某个不确定的内存区域）开始扫描，
	// 直到碰到第一个字符串结束符'\0'为止，然后返回计数器值(长度不包含“\0”)。
	// 摆摊宽度+10
	his.NameWinW = strlen(this.stallTitle) * charW + 10; 








/// 
	getobject();





///
	//清除
	remove();

	// 当人物离开时有啥清啥
	// 清除函数
	this.RealseRole = function() {
		MoveTime.del(this.NUM); // 从移动程序中删除该人物的移动
		GameTime.Delete(this.EventHandle);
		$("#roleN" + this.NUM).remove(); // 名字
		$("#rol" + this.NUM).remove(); // 人物层
		$("#maskrol" + this.NUM).remove(); // 遮照层，
		$("#talkB" + this.NUM).remove(); // 说话层
		if (getObject("roleN" + this.NUM)) { // alert(this.Name+" 人物离开 时图层
												// roleN"+this.NUM+"没有删除");
			// ;
		}
		window.clearInterval(this.Times);
		this.StopImitate();
		this.Times = null;
	};
/// ////////////////////////////////////////
	// try{
		//要执行的语句 
	// }catch(e){

	// 当执行出现错误的语句
		
	// }
<script>
try{
		clearInterval(linkTryHandle);
		init();
	//}catch(e){
		if(times < 0){								//如果
			times = 10;
			tryTimce--;
			loadInfo.innerText="服务器连接失败...，重试中"+tryTimce;
			clearInterval(linkTryHandle);
			if(tryTimce>0){
				 setTimeout(function(){
					frames["f1"].location=SocketUrl+'/ch?uid='+userid+"&uname="+username;
				 	linkTryHandle=setInterval(linkJudge,300);},2000);
			}else{
				loadInfo.innerText="=_=\"  服务器连接失败！";
			}
		}
	}
</script>


//////////////////
//动作调用
//js中写函数 
function  fnOpenHelp() {
	window.open("这是一个跳转函数");
}
//在php调用 onclick调用函数
<img src="<?php echo $sysImg; ?>images/new/help.png"  width="70" height="70" onclick="fnOpenHelp();" style="cursor:pointer;z-index:999" />




//////////////////////////////////////
//复制到剪切板
clipboardData();//函数


// 使用try判断
	try{
		window.clipboardData.setData('text',html);
		disSysMSG("提示内容");
	// }catch(e){
		disSysMSG("没有复制上的提示内容");
	}

//////////////////////////////////////
// 一个判断判断vip的语句
//VIP是否到期
	$vipflag = 0;
	list($viptype,$viptime) = $db->GetRow("select viptype,viptime from ".$prefix."_shuxing where userid=".$userid);
	// 从数据库查询出vip的时间和类型
	if($viptype){//如果有vip 判断vip是否到期
		$mytime = mytime();
		if($viptype==6){//一个月
			if((intval($viptime)+3600*24*31) < $mytime){
				$vipflag = 1;
			}else{
				$vipflag = 2;
			}
		}else if($viptype==7){//三个月
			if((intval($viptime)+3600*24*31*3) < $mytime){
				$vipflag = 1;
			}else{
				$vipflag = 2;
			}
		}else if($viptype==8){//一年
			if((intval($viptime)+3600*24*31*12) < $mytime){
				$vipflag = 1;
			}else{
				$vipflag = 2;
			}
		}
		//如果时间小于当前时间 就表示已经过期然后更新数据库
		if($vipflag==1){
			$db->Execute("update ".$prefix."_shuxing set viptype=0,viptime=0 where userid=$userid");
		}
	}
///////////////////////////////////////////////////////////////
///通过list来进行从数据库查出字段内容进行分配
list($mapW,$mapH,$pointA,$pointB,$pointC)=$db->GetRow("select width,height,pointA,pointB,pointC from ".$prefix."_map where mapid=$mapid");//
///////////////////////////////////////////////////////////////////
///当从数据库查出内容是进行遍历
$tishiArr=$db->GetArray("select tipid,content,reward from ".$prefix."_tishi order by tipid asc ");
		//定义一个空数组
		$arrTips = "";
		//进行遍历前台接受
		foreach($tishiArr as $val){
			list($tipid,$content,$reward) = $val;
			$arrTips .= $tipid."|".$content."|".$reward."#";
		}
/////////////////////////////////////////////////////////
with(){};

// with对象只能使用属性，而不能改变属性。
// 例子
	function Lakers() {  
       this.name = kobe bryant;  
       this.age = 28;  
       this.gender = boy;  
	}  <span style="font-family:">//使用函数容器创建对象
	</span>

	var people=new Lakers();  
	with(people)  
	{  
	       var str = 姓名:  + name + 
	;  
	       str += 年龄： + age + 
	;  
	       str += 性别： + gender;  
	       document.write(str);  
	}
//输出结果
	// 姓名: kobe bryant
	// 年龄：28
	// 性别：boy


// 也可以用来定css样式
	var t=document.getElementById(dd);

	t.style.cssText=width:200px;height:300px;

	还可以

	with(t.style){

	width='300px';

	height='300px';

	}

//但是with如果不影响性能，确实是非常霸气的存在
//进行压力测试 使用with与不使用with相差100倍
//在Google JavaScript 编码规范指南中是禁用with的，所以建议用它
//////////////////////////////////////////////////////////////////////
///在网页中提示文字
	disSysMSG("该人不在线或不在该地图中！");

//js向上取整
math.ceil();
//当数字为5.3时他就会出现6，向上取整。

//js的四舍五入
math.round()
//四舍五入
math.round(1.3)=1;
//floor() 方法执行的是向下取整计算，它返回的是小于或等于函数参数，并且与之最接近的整数。
math.floor();
//例子
document.write(Math.floor(0.60) + "<br />") //结果0
document.write(Math.floor(0.40) + "<br />") //结果0
document.write(Math.floor(5) + "<br />") //结果5
document.write(Math.floor(5.1) + "<br />") //结果5
document.write(Math.floor(-5.1) + "<br />") //结果-6
document.write(Math.floor(-5.9)) //结果-6

//判断文件目录是否存在
file_exists();
//常用于文件是否被传输
//当没有人物信息时就需要要从新跳转到创建人物界面
if(!file_exists($pic_url)){			//防止传输丢失文件  再次请求  发送头信息s
		header("location: ".$sysurl."/index.php?op=user&file=zhuce&action=touxiang");	//如果人物不存在 （人物图片丢失） 从新选择
		exit();
	}



//intval函数：变量转成整数类型；
intval();

//substr()函数 返回字符串的一部分

echo substr("Hello world",6);

  
//输出值就是 world


// explode() 函数把字符串打散为数组。
// 例子
$str = "Hello world. I love Shanghai!";
print_r (explode(" ",$str));
Array ( [0] => Hello [1] => world. [2] => I [3] => love [4] => Shanghai! )


//offset() 方法返回或设置匹配元素相对于文档的偏移（位置）。
//y语法
$(selector).offset();
//例子



// <html>
// <head>
// <script type="text/javascript" src="/jquery/jquery.js"></script>
// <script type="text/javascript">
// $(document).ready(function(){
//   $("button").click(function(){
//     x=$("p").offset();
//     $("#span1").text(x.left);
//     $("#span2").text(x.top);
//   });
// });
// </script>
// </head>
// <body>
// <p>本段落的偏移是 <span id="span1">unknown</span> left 和 <span id="span2">unknown</span> top。</p>
// <button>获得 offset</button>
// </body>
// </html>
// 



 
//获取数据
 xmlHttp.open("GET", myurl, );
 // get一般不需要传参数
 xmlHttp.send(null);
 //false就是等待有返回数据的时候再继续往下走，还没有得到数据的时候就会卡在那里，直到获取数据为止。
 // true就是不等待,直接返回，这就是所谓的异步获取数据！
 
//post提交
xmlhttp.open("post",url,true);
//传递参数 
xmlhttp.send("data=data&data2=data2");
 

 //eavl（）
 eval()//是Javascript内置函数，用于计算字符串表达式的值。例如eval("2+3") 返回的是5。
// setTimeout("javascript语句", 毫秒)
 setTimeout()// 方法用于在指定的毫秒数后调用函数或计算表达式。





//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// 地图：
 	1.在秘境游戏的地图中 首先得需要一张地图 从后台进行上传(gk.kehui.net/wiscity/admin)点击上传地图.需要的上传尺寸 尺寸是大图的尺寸(也就是你需要裁剪的尺寸整个地图背景的尺寸);

 	2.美工裁剪背景地图,按设定好的尺寸进行裁剪(宽512,长344),裁剪后把背景地图按比例缩小 10 倍留做导航图.通过ftp上传到wiscity/images/scenes/地图文件夹(这个文件夹是你上传地图的id自动生成文件夹并把上传的图片放入) 在这文件夹中创建CT和CC文件夹,CT是放地图的覆盖图层, 把裁剪完的地图放入地图文件夹中 图层放入CT一问已经是写好的代码. 

 	3.地图坐标:使用游戏内写好的坐标生成代码文件.wiscity/mapedit.php?action=cross 只需把里面的代码改掉就可以$mapid="地图文件文件名";在地图中自动提取地图你的裁剪好的地图放入网页中你只需要做的是点击坐标生成坐标文件。
 		注释：首先你得在wiscity/scenes/下创建跟你地图文件夹相同的文件夹。里面需要包含 若文件夹为51 那么需要的是51_cross.txt地图生成坐标的文件  MC.data是地图遮蔽图的坐标
 		例如：8800|4583|1.png|124  分别设宽度 高度 地图遮蔽层的图片名  和index
 		MD.js 是不可以移动的坐标 也就是你点击地图不移动的坐标  当生成地图坐标文件_cross.txt  你需要把里面的代码复制到 MD.js中 在里面写个var blockp={把复制的代码放入这里面};

 	4.把缩小十倍的地图放入地图文件夹中改名为bg_s.jpg 因为在页面中







































 ?>