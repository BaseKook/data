//<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
var UI=function(){
	var BtnObj=function (src,w,h,x,y,f,v,s,txt){//按钮
		var Div=document.createElement("div");//动态生成div层
		var dis=0;
		var ishide=1;
		with(Div){
			name="Btn";
			innerHTML=txt;
			style.textAlign="center";
			style.lineHeight=h+"px";
			style.position="absolute";
			style.border="none";
			style.width=w+"px";
			style.height=h+"px";
			style.top=y+"px";
			style.left=x+"px";
			if(!v){style.visibility="hidden";}
			style.backgroundImage="url("+src+")";
			style.backgroundRepeat="no-repeat";
			style.backgroundPosition="0px 0px";
			style.cursor="pointer";
		}

		if(s!=null&&s>=2){//按钮背景图切换
			Div.onmouseover=function(){
				if(dis==0){
					var N=-w;
					this.style.backgroundPosition=N+"px 0px";
				}
			};
			Div.onmouseout=function(){
				if(dis==0){
					this.style.backgroundPosition="0px 0px";
				}
			};
		}
		if(s!=null&&s==3){
			Div.onmousedown=function(){
				if(dis==0){
					var N=-w*2;this.style.backgroundPosition=N+"px 0px";
				}
			};
			Div.onmouseup=function(){
				if(dis==0){
					var N=-w;this.style.backgroundPosition=N+"px 0px";
				}
			};
		}
		document.body.appendChild(Div);
		var SetX=function(dx){Div.style.left=dx+"px";};
		var SetY=function(dy){Div.style.top=dy+"px";};
		var SetXY=function(dx,dy)
		{
			Div.style.left=dx+"px";
			Div.style.top=dy+"px";
		};
		var SetClick=function(_f){
			if(_f){Div.onclick=_f;}
		};
		var remove=function(){document.body.removeChild(Div);};
		SetClick(f);
		var Hide=function(){Div.style.visibility="hidden";ishide=1;};
		var Show=function(){Div.style.visibility="visible";ishide=0;};
		var Disable=function(){
			dis=1;
			//if(ishide==0){
				var N=-w*3;
				Div.style.backgroundPosition=N+"px 0px";
			//}
		};
		var Enable=function(){
			dis=0;
			//if(ishide==0){
				var N=-w*1;
				Div.style.backgroundPosition=N+"px 0px";
			//}
		};
		var GetState=function(){return dis;};
		return {Div:Div,SetX:SetX,SetY:SetY,SetXY:SetXY,SetClick:SetClick,remove:remove,Hide:Hide,Show:Show,Disable:Disable,Enable:Enable,GetState:GetState};
	};//BtnObj
	
	var Clock=function(t,x,y,fback,auto){//时钟
		var Top=y==null?0:y;
		var Left=x==null?0:x;
		var Second=t==null?30:t;
		var CallBack=fback;
		var IsAuto=auto==null?true:auto;
		var Time=0;
		var IsEnd=false;
		var Div=document.createElement("div");
		var x1=0;x2=0;x3=4;x4=0;y1=0;y2=0;y3=0;y4=0;
		//eval("div"+num+"=document.createElement('div')");
		//alert(div1);
		var timer;
		with(Div){
			style.position="absolute";name="Clock";className='Clock';style.top=Top+"px";style.left=Left+"px";style.display='none';
			innerHTML=Second;
		}
		document.body.appendChild(Div);
		
		var Once=function(){//倒计时
			if(!IsEnd)return;
			Div.innerHTML=(Second-Time);
			
			if(Time==Second){
				if(CallBack)CallBack();
				End();
			}else{
				clearTimeout(timer);
				timer=setTimeout(function (){Once();},1000);
				//timer=setInterval(function (){Once();},1000);
				//clearInterval
				timer;
			}
			Time++;
		};
	
		var Show=function(fn,xy){
			if(fn)CallBack=fn;
			Div.style.display='';
			if(xy==1){
				Div.style.top=y1+"px";Div.style.left=x1+"px";
			}
			if(xy==2){
				Div.style.top=y2+"px";Div.style.left=x2+"px";
			}
			if(xy==3){
				Div.style.top=y3+"px";Div.style.left=x3+"px";
			}
			if(xy==4){
				Div.style.top=y4+"px";Div.style.left=x4+"px";
			}
			if(IsAuto)Stat();
		};
		var Stat=function(){
			Time=0;
			IsEnd=true;
			Once();
		};
		var End=function(){
			IsEnd=false;
			Div.style.display='none';
			//clearTimeout(timer);
		};
		var xy1=function(x,y){
			x1=x;y1=y;
		};
		var xy2=function(x,y){
			x2=x;y2=y;
		};
		var xy3=function(x,y){
			x3=x;y3=y;
		};
		var xy4=function(x,y){
			x4=x;y4=y;
		};
		return {Show:Show,Stat:Stat,End:End,xy1:xy1,xy2:xy2,xy3:xy3,xy4:xy4};
	};//Clock

	var DivObj=function(css,txt,fx,fy){//文本框,参数:1:css样式,2:文本,3:x坐标,4:y坐标
		var Div=document.createElement("div");
		Div.className=css;
		if(fx!=""||fy!=""){
			Div.style.position="absolute";
		}
		if(fx)Div.style.left=fx+"px";
		if(fy)Div.style.top=fy+"px";
		Div.style.display='none';
		if(txt){Div.innerHTML=txt;}
		document.body.appendChild(Div);
		var SetClick=function(_f){
			if(_f){Div.onclick=_f;}
		};
		var SetXY=function(dx,dy){Div.style.left=dx+"px";Div.style.top=dy+"px";};
		var Show=function(text){if(text){Div.innerHTML=text;}Div.style.display='';};
		var Hide=function(){Div.style.display='none';};
		var SetC=function(css){Div.className=css;};
		var remove=function(){document.body.removeChild(Div);};
		var SetSize=function(size){Div.style.fontSize=size+"px";};
		var SetW=function(w){Div.style.width=w+"px";};
		var SetHeight=function(height,a){//当a==1时，加上行高的设置
			Div.style.height=height+"px";
			if(a==1){
				Div.style.lineHeight=height+"px";
			}
		};
		var Background=function (src,x,y) {
			Div.style.backgroundImage="url("+src+")";
			Div.style.backgroundPosition="-"+x+"px "+"-"+y+"px";
		}
		var Background2=function (src,w,n) {
			Div.style.backgroundImage="url("+src+")";
			var x=w*(n-1);
			Div.style.backgroundPosition="-"+x+"px "+"0px";
		}
		var pmgd=function(){//相对与屏幕固定
			Div.style.position="fixed";
		}
		return {pmgd:pmgd,SetXY:SetXY,Show:Show,Hide:Hide,remove:remove,SetSize:SetSize,SetHeight:SetHeight,SetClick:SetClick,SetC:SetC,SetW:SetW,Background:Background,Background2:Background2};
	};//DivObj
	
	var DivObj2=function(css,txt,fx,fy,w,h,f,iid){//文本框,参数:1:css样式,2:文本,3:x坐标,4:y坐标,5:宽度,6:高度,7:点击函数
		var Div=document.createElement("div");
		Div.className=css;
		if(fx!=""||fy!=""){
			Div.style.position="absolute";
		}
		if(fx)Div.style.left=fx+"px";
		if(fy)Div.style.top=fy+"px";
		if(w)Div.style.width=w+"px";
		if(h)Div.style.height=h+"px";
		if(iid)Div.id=iid;
		Div.style.display='none';
		if(txt){Div.innerHTML=txt;}
		var SetClick=function(_f){
			if(_f){Div.onclick=_f;}
		};
		SetClick(f);
		document.body.appendChild(Div);
		var SetXY=function(dx,dy){Div.style.left=dx+"px";Div.style.top=dy+"px";};
		var Show=function(text){if(text){Div.innerHTML=text;}Div.style.display='';};
		var Hide=function(){Div.style.display='none';};
		var remove=function(){document.body.removeChild(Div);};
		var SetC=function(css){Div.className=css;};
		var SetSize=function(size){Div.style.fontSize=size+"px";};
		var SetHeight=function(height,a){//当a==1时，加上行高的设置
			Div.style.height=height+"px";
			if(a==1){
				Div.style.lineHeight=height+"px";
			}
		};
		var Background=function (src,x,y) {
			Div.style.backgroundImage="url("+src+")";
			Div.style.backgroundPosition="-"+x+"px "+"-"+y+"px";
		}
		var Background2=function (src,w,n) {
			Div.style.backgroundImage="url("+src+")";
			var x=w*(n-1);
			Div.style.backgroundPosition="-"+x+"px "+"0px";
		}
		var Biaodan=function (biaodan){
			document.body.removeChild(Div);
			document.getElementById(biaodan).appendChild(Div);
		}
		var qknr=function (){//清空内容
			Div.innerHTML="";
		}
		var pmgd=function(){//相对与屏幕固定
			Div.style.position="fixed";
		}
		var GetH=function(){
			return Div.offsetHeight;
		}
		var GetW=function(){
			return Div.offsetWidth;
		}
		return {GetW:GetW,GetH:GetH,pmgd:pmgd,SetXY:SetXY,Show:Show,Hide:Hide,remove:remove,SetC:SetC,SetSize:SetSize,SetClick:SetClick,SetHeight:SetHeight,Background:Background,Biaodan:Biaodan,Background2:Background2,qknr:qknr};
	};//DivObj2
	
	var Div2Obj=function(css,txt,fx,fy,f,iid,name,move,out,biaodan){//按钮,参数:1:css样式,2:文本,3:x坐标,4:y坐标,5:点击函数,6:id,7:name,8:鼠标移上,9:鼠标移开,10:上层的id
		var Div=document.createElement("div");
		Div.className=css;
		if(fx!=""||fy!=""){
			Div.style.position="absolute";
		}
		if(fx)Div.style.left=fx+"px";
		if(fy)Div.style.top=fy+"px";
		if(name)Div.name=name;
		if(iid)Div.id=iid;
		if(move)Div.onmousemove=move;
		if(out)Div.onmouseout=out;
		
		Div.style.display='none';
		if(txt){Div.innerHTML=txt;}
		if(biaodan){
			document.getElementById(biaodan).appendChild(Div);
		}else {
			document.body.appendChild(Div);
		}
		var SetClick=function(_f){
			if(_f){Div.onclick=_f;}
		};
		SetClick(f);
		var SetXY=function(dx,dy){Div.style.left=dx+"px";Div.style.top=dy+"px";};
		var Show=function(text){if(text){Div.innerHTML=text;}Div.style.display='';};
		var Hide=function(){Div.style.display='none';};
		var remove=function(){document.body.removeChild(Div);};
		var SetC=function(css){Div.className=css;};
		var SetSize=function(size){Div.style.fontSize=size+"px";};
		var SetW=function(w){Div.style.width=w+"px";};
		var SetHeight=function(height,a){//当a==1时，加上行高的设置
			Div.style.height=height+"px";
			if(a==1){
				Div.style.lineHeight=height+"px";
			}
		};
		return {SetXY:SetXY,Show:Show,Hide:Hide,remove:remove,SetC:SetC,SetHeight:SetHeight,SetSize:SetSize,SetW:SetW};
	};//DivObj
	
	var AObj=function(css,txt,fx,fy,iid,dizhi,targets){//房间的a标签,参数:1:css样式,2:文本,3:x坐标,4:y坐标,5:id,6:href,7:target
		var Div=document.createElement("a");
		Div.className=css;
		if(fx!=""||fy!=""){
			Div.style.position="absolute";
		}
		Div.target = targets;
		Div.href=dizhi;
		if(fx)Div.style.left=fx+"px";
		if(fy)Div.style.top=fy+"px";
		if(iid)Div.id="room"+iid;
		
		Div.style.display='none';
		if(txt){Div.innerHTML=txt;}
		document.body.appendChild(Div);
		var SetXY=function(dx,dy){Div.style.left=dx+"px";Div.style.top=dy+"px";};
		var Show=function(text){if(text){Div.innerHTML=text;}Div.style.display='';};
		var Hide=function(){Div.style.display='none';};
		var remove=function(){document.body.removeChild(Div);};
		var SetHeight=function(height,a){//当a==1时，加上行高的设置
			Div.style.height=height+"px";
			if(a==1){
				Div.style.lineHeight=height+"px";
			}
		};
		return {SetXY:SetXY,Show:Show,Hide:Hide,remove:remove,SetHeight:SetHeight};
	};//
	
		var AObj2=function(css,txt,fx,fy,iid,dizhi,targets,dianji,biaodan){//普通的a标签,参数:1:css样式,2:文本,3:x坐标,4:y坐标,5:id,6:href,7:target,8:点击函数
		var Div=document.createElement("a");
		Div.className=css;
		if(fx!=""||fy!=""){
			Div.style.position="absolute";
		}
		Div.href=dizhi;
		if(targets)Div.target = targets;
		if(fx)Div.style.left=fx+"px";
		if(fy)Div.style.top=fy+"px";
		if(iid)Div.id=iid;
		
		Div.style.display='none';
		if(txt){Div.innerHTML=txt;}
		if(biaodan){
			document.getElementById(biaodan).appendChild(Div);
		}else {
			document.body.appendChild(Div);
		}
		var SetClick=function(_f){
			if(_f){Div.onclick=_f;}
		};
		SetClick(dianji);
		var SetXY=function(dx,dy){Div.style.left=dx+"px";Div.style.top=dy+"px";};
		var Show=function(text){if(text){Div.innerHTML=text;}Div.style.display='';};
		var Hide=function(){Div.style.display='none';};
		var remove=function(){document.body.removeChild(Div);};
		var SetHref=function(dizhi){Div.href=dizhi;};
		return {SetXY:SetXY,Show:Show,Hide:Hide,remove:remove,SetClick:SetClick,SetHref:SetHref};
	};//AObj2
	
	var IframeObj=function(css,fx,fy,w,h,srcs,iid,name){//iframe标签,参数:1:css样式,2:x坐标,3:y坐标,4:宽度,5:高度,6:src
		var Div=document.createElement("iframe");
		
		Div.style.position="absolute";
		
		Div.className=css;
		Div.name = name;
		Div.id = iid;

		//Div.style.border="0";
		if(srcs)Div.src=srcs;
		if(fx)Div.style.left=fx+"px";
		if(fy)Div.style.top=fy+"px";
		if(w)Div.style.width=w+"px";
		if(h)Div.style.height=h+"px";
		Div.frameBorder="0";
		Div.style.display='none';
		document.body.appendChild(Div);
		
		var SetXY=function(dx,dy){Div.style.left=dx+"px";Div.style.top=dy+"px";};
		var Show=function(srcs){
			if(srcs)Div.src=srcs;
			setTimeout(function(){Div.style.display=''},200);
		};
		var Hide=function(){Div.style.display='none';};
		var remove=function(){document.body.removeChild(Div);};
		var SetSrc=function(text){Div.src=text;};
		var Biaodan=function (biaodan){
			document.body.removeChild(Div);
			document.getElementById(biaodan).appendChild(Div);
		}
		var SetHeight=function(height){//当a==1时，加上行高的设置
			Div.style.height=height+"px";
		};
		return {SetXY:SetXY,Show:Show,Hide:Hide,remove:remove,SetSrc:SetSrc,Biaodan:Biaodan,SetHeight:SetHeight};
	};//IframeObj
	
	var ImgObj=function(css,fx,fy,w,iid,name,dianji,srcs,biaodan){//Img标签,参数:1:css样式,2:x坐标,3:y坐标,4:宽度,5:id,6:name,7:点击函数,8:图片路径,9:上层id
		var Div=document.createElement("img");
		if(fx!=""||fy!=""){
			Div.style.position="absolute";
		}
		Div.className=css;
		if(name)Div.name = name;
		if(iid)Div.id = iid;
		if(srcs)Div.src=srcs;
		if(fx)Div.style.left=fx+"px";
		if(fy)Div.style.top=fy+"px";
		if(w)Div.width=w;
		
		Div.style.display='none';
		if(biaodan){
			document.getElementById(biaodan).appendChild(Div);
		}else {
			document.body.appendChild(Div);
		}
		var SetClick=function(_f){
			if(_f){Div.onclick=_f;}
		};
		SetClick(dianji);
		var SetXY=function(dx,dy){Div.style.left=dx+"px";Div.style.top=dy+"px";};
		var Show=function(){Div.style.display='';};
		var Hide=function(){Div.style.display='none';};
		var remove=function(){document.body.removeChild(Div);};
		var Setsrcs=function(srcs){Div.src=srcs;};
		var Setan=function(a){//定义按下按钮时的图标切换
			Div.onmousedown=function (){
				alert(a);
				Div.src=a;
				setTimeout("1000",function (){
					Div.src=srcs;
				});
			};
		}
		var SetW=function (w){
			Div.width=w;
		}
		return {SetXY:SetXY,Show:Show,Hide:Hide,remove:remove,SetClick:SetClick,Setsrcs:Setsrcs,Setan:Setan,SetW:SetW};
	}//ImgObj
	
	
	var InputObj=function(css,fx,fy,iid,name,dianji,type,txt,biaodan){//Input标签,1:css样式,2:x坐标,3:y坐标,4:id,5:name,6:点击函数,7:type的值,8:value的值,9:要插入的表单
		var Div=document.createElement("input");
		if(fx!=""||fy!=""){
			Div.style.position="absolute";
		}
		Div.className=css;
		Div.name = name;
		Div.id = iid;
		Div.type=type;
		if(txt)Div.value=txt;
		if(fx)Div.style.left=fx+"px";
		if(fy)Div.style.top=fy+"px";
		if(dianji)Div.onclick=dianji;
		
		Div.style.display='none';
		if(biaodan==""){
			document.body.appendChild(Div);
		}else {
			document.getElementById(biaodan).appendChild(Div);
		}
		
		var SetXY=function(dx,dy){Div.style.left=dx+"px";Div.style.top=dy+"px";};
		var Show=function(text){if(text){Div.value=text;}Div.style.display='';};
		var Hide=function(){Div.style.display='none';};
		var SetTxt=function(text){Div.value=text;};
		var remove=function(){document.body.removeChild(Div);};
		var SetSize=function(size){Div.style.fontSize=size+"px";};
		var SetW=function(w){Div.style.width=w+"px";};
		var SetHeight=function(height,a){//当a==1时，加上行高的设置
			Div.style.height=height+"px";
			if(a==1){
				Div.style.lineHeight=height+"px";
			}
		};
		var SetReadonly=function(w){
			if(w==1){
				Div.readOnly=true;
			}else{
				Div.readOnly=false;
			}
		}
		//失去焦点时触发函数
		var JiaoDian=function(jd_f){
			if(jd_f){Div.onblur=jd_f;}
		}
		//获取焦点事件
		var SetOnfocus=function(jd_f){
			if(jd_f){Div.onfocus=jd_f;}
		}
		//获取value 值
		var Hvalue=function(){
			return Div.value;
		}
		//设置value 值
		var SetValue=function(v){
			if(v){
				Div.value=v;
			}else{
				Div.value="";
			}
		}
		//设置是否选中
		var Setcheckbox=function(a){
			Div.checked=a;
		}
		//输入字段预期值的提示信息
		var Setplaceholder=function(a){
			Div.placeholder=a;
		}
		//change 事件内容改变事件
		var Setoninput=function (f){
			Div.oninput=f;
		}
		//真正的onchange事件
		var Setonchange=function(f){
			Div.onchange=f;
		}
		//输入字段预期值的提示信息 另一种写法 lx 0 文本 1 密码
		var Setmrts=function (str,lx){
			Div.value=str;
			if(lx==1){
				Div.type="text";
			}
			SetOnfocus(function (){
				if(Div.value==str){
					Div.value="";
					if(lx==1){
						Div.type="password";
					}
				}

			});
			JiaoDian(function (){
				if(Div.value==""){
					Div.value=str;
					if(lx==1){
						Div.type="text";
					}
				}
			});
		}
		return {SetXY:SetXY,Show:Show,Hide:Hide,remove:remove,SetTxt:SetTxt,SetSize:SetSize,SetW:SetW,JiaoDian:JiaoDian,Hvalue:Hvalue,SetValue:SetValue,Setcheckbox:Setcheckbox,SetReadonly:SetReadonly,SetOnfocus:SetOnfocus,Setplaceholder:Setplaceholder,SetHeight:SetHeight,Setoninput:Setoninput,Setmrts:Setmrts,Setonchange:Setonchange};
	}//ImgObj
	
	//多选或单选框 带内容
	//DdxkObj标签,1:input css样式,2:div 样式,3:x坐标,4:y坐标,5:id,6:name,7:input 宽度,8:多选或单选框之后的文本,
	//9:类型,10:点击事件,11:间隔,12:要插入的表单,
	var DdxkObj=function(css1,css2,fx,fy,iid,name,w,neirong,type,dianji,jiange,biaodan,value){
		//input 部分 
		var Div=document.createElement("input");
		if(fx!=""||fy!=""){
			Div.style.position="absolute";
		}
		Div.className=css1;
		Div.name = name;
		Div.id = iid;
		Div.type=type;
		Div.value=value;
		if(fx)Div.style.left=fx+"px";
		if(fy)Div.style.top=fy+"px";
		if(dianji)Div.onclick=dianji;
		if(w)Div.style.width=w+"px";
		
		
		Div.style.display='none';
		if(biaodan==""){
			document.body.appendChild(Div);
		}else {
			document.getElementById(biaodan).appendChild(Div);
		}
		
		//div 部分
		var Div_2=document.createElement("div");
		if(fx!=""||fy!=""){
			Div_2.style.position="absolute";
		}
		Div_2.className=css2;
		var Div_2_l=parseInt(w)+parseInt(fx)+parseInt(jiange);
		// console.log(Div_2_l);
		if(fx)Div_2.style.left=Div_2_l.toString()+"px";
		if(fy)Div_2.style.top=fy+"px";
		if(neirong){Div_2.innerHTML=neirong;}
		Div_2.style.display='none';
		if(biaodan==""){
			document.body.appendChild(Div_2);
		}else {
			document.getElementById(biaodan).appendChild(Div_2);
		}

		var SetXY=function(dx,dy){
			Div.style.left=dx+"px";Div.style.top=dy+"px";
			var Div_2_l=parseInt(w)+parseInt(fx)+parseInt(jiange);
			Div_2.style.left=Div_2_l.toString()+"px";Div_2.style.top=dy+"px";
		};
		var Show=function(text){if(text){Div_2.innerHTML=text;}Div.style.display='';Div_2.style.display='';};
		var Hide=function(){Div.style.display='none';Div_2.style.display='none';};
		var SetTxt=function(text){Div_2.innerHTML==text;};
		var remove=function(){document.body.removeChild(Div);document.body.removeChild(Div_2);};
		var SetSize=function(size){Div.style.fontSize=size+"px";Div_2.style.fontSize=size+"px";};
		var Xuanzong=function(){
			Div.checked = true;
		}
		return {SetXY:SetXY,Show:Show,Hide:Hide,remove:remove,SetTxt:SetTxt,SetSize:SetSize,Xuanzong:Xuanzong};
	}
	
	var SelectObj=function(css,fx,fy,iid,name,neirong,biaodan,moren){//Select标签,1:css样式,2:x坐标,3:y坐标,4:id,5:name,6:文本和值 格式 文本1,值1,文本2,值2,7:要插入的表单,8:默认的value
		var Div=document.createElement("Select");
		if(fx!=""||fy!=""){
			Div.style.position="absolute";
		}
		Div.className=css;
		Div.name = name;
		Div.id = iid;
		if(fx)Div.style.left=fx+"px";
		if(fy)Div.style.top=fy+"px";
		
		Div.style.display='none';
		//obj.options.add(new Option("text","value"));
		if(neirong){
			neirongs=neirong.split(",");
			var nn=0;
			var mm;
			for(i=0;i<neirongs.length;i=i+2){
				var op=new Option(neirongs[i],neirongs[i+1]);
				Div.options.add(op);
				if(moren){
					if(moren==neirongs[i+1]){
						mm=nn;
					}
				}
				nn++;
			}
			if(moren){
				Div.options[mm].selected = true; 
			}
		}
		if(biaodan==""){
			document.body.appendChild(Div);
		}else {
			document.getElementById(biaodan).appendChild(Div);
		}
		
		var SetXY=function(dx,dy){Div.style.left=dx+"px";Div.style.top=dy+"px";};
		var Show=function(text){if(text){Div.value=text;}Div.style.display='';};
		var Hide=function(){Div.style.display='none';};
		var SetTxt=function(text){Div.value=text;};
		var remove=function(){document.body.removeChild(Div);};
		var SetSize=function(size){Div.style.fontSize=size+"px";};
		var SetW=function(w){Div.style.width=w+"px";};
		var Setnr=function(d){
			neirongs=d.split(",");
			for(i=0;i<neirongs.length;i=i+2){
				
				var op=new Option(neirongs[i],neirongs[i+1]);
				Div.options.add(op);
			}
		}
		
		//获取value 值
		var Hvalue=function(){
			var index=Div.selectedIndex; //序号，取当前选中选项的序号  
			var val = Div.options[index].value;  
			return val;
		}
		//change 事件
		var Setchange=function (f){
			Div.onchange=f;
		}
		var SetHeight=function(height,a){//当a==1时，加上行高的设置
			Div.style.height=height+"px";
			if(a==1){
				Div.style.lineHeight=height+"px";
			}
		};
		return {SetXY:SetXY,Show:Show,Hide:Hide,remove:remove,SetTxt:SetTxt,SetSize:SetSize,SetW:SetW,Hvalue:Hvalue,Setchange:Setchange,Setnr:Setnr,SetHeight:SetHeight};
	}
	
	var OptionObj=function(css,fx,fy,iid,name,v,txt,moren,biaodan){//Option标签,1:css样式,2:x坐标,3:y坐标,4:id,5:name,6:value,7文本,8:默认,9:要插入的表单
		var Div=document.createElement("option");
		if(fx!=""||fy!=""){
			Div.style.position="absolute";
		}
		if(css)Div.className=css;
		if(name)Div.name = name;
		if(iid)Div.id = iid;
		if(txt)Div.value=v;
		if(fx)Div.style.left=fx+"px";
		if(fy)Div.style.top=fy+"px";
		if(txt){Div.innerHTML=txt;};
		if(moren){Div.selected=true};
		
		
		Div.style.display='none';
		if(biaodan==""){
			document.body.appendChild(Div);
		}else {
			document.getElementById(biaodan).appendChild(Div);
		}
		
		var SetXY=function(dx,dy){Div.style.left=dx+"px";Div.style.top=dy+"px";};
		var Show=function(text){if(text){Div.value=text;}Div.style.display='';};
		var Hide=function(){Div.style.display='none';};
		var SetTxt=function(text){Div.value=text;};
		var remove=function(){document.body.removeChild(Div);};
		
		return {SetXY:SetXY,Show:Show,Hide:Hide,remove:remove,SetTxt:SetTxt};
	}
	
	var OnlineObj=function(x,y){
		var Top=y==null?0:y;
		var Left=x==null?0:x;
		var Width=160;
		var div=document.createElement("div");
		with(div){
			style.position="absolute";name="online";className="online";style.top=Top+"px";
			style.left=Left+"px";style.display='';
		}
		document.body.appendChild(div);
		var Show=function(text){div.style.display='';if(text){div.innerHTML=text;}};
		var Hide=function(){div.style.display='none';};
		return{Show:Show,Hide:Hide};
	};//OnlineObj
    
	var CardObj=function(data,x,y,v,type,inx,bk,bk2){//牌
		var Ind=inx;
		var val=data;
		var X=x;
		var Y=y;
		var IsTop=false;
		var T=0;
		var N=0;
		var CallBack=bk;
		var CallBack2=bk2;
		if(val[0]==0){N=-923;T=-188;}
		else if(val[0]==16){N=-923;T=0;}
		else if(val[0]==17){N=-923;T=-94;}else{
			T=-94*val[1];
			//N=(-71*val[1])+71;
			var Md=val[0]>13?val[0]-13:val[0];
			N=(-71*Md)+71;
		}
		var Div=document.createElement("div");
		with(Div){
			style.position="absolute";name="Card";className='Card';style.width="71px";style.height="94px";style.top=Y+"px";style.left=X+"px";
			if(!v){style.visibility="hidden";}
			//style.backgroundImage="url(Card.gif)";
			style.backgroundRepeat="no-repeat";
			style.backgroundPosition=N+"px "+T+"px";
			if(type!=null&&type==1){
				style.cursor="pointer";
				onclick=function(){
					if(!IsTop){
						var A=Y-17;
						this.style.top=A+"px";
						IsTop=true;
					}else{
						var A=Y;
						this.style.top=A+"px";
						IsTop=false;
					}
					if(CallBack){
						CallBack();
					}else{
						//alert(CallBack);
					}
				};
				ondblclick=function(){
					if(CallBack2){
						CallBack2();
					}else{
						//alert(CallBack2);
					}
				};
			}
		}
		document.body.appendChild(Div);  
		var SetTop=function(V){if(V){var A=Y-17;Div.style.top=A+"px";IsTop=true;}else{var A=Y;Div.style.top=A+"px";IsTop=false;}};
		var GetIsTop=function(){return IsTop;};
		var SetV=function(V){if(V){Div.style.visibility="visible";}else {Div.style.visibility="hidden";}};
		var SetXY=function(dx,dy){X=dx;Y=dy;var A=Y;if(IsTop){A=Y-17;}Div.style.left=X+"px";Div.style.top=A+"px";};
		var remove=function(){document.body.removeChild(Div);};
		return {val:val,IsTop:IsTop,SetTop:SetTop,SetV:SetV,SetXY:SetXY,remove:remove,GetIsTop:GetIsTop};
	};//CardObj

	var CardGroup=function(datas,mx,my,sp,hv,type,v,snb){ //数组(牌),坐标x,坐标y,牌距,横竖
		var CardImgs=new Array();
		var CardArr=datas;
		var MX=mx;
		var MY=my;
		var SP=sp;
		var H=0;
		var W=0;
		var X=0;
		var Y=0;
		var T=type;
		var V=v;
		var HV=hv;
		var Snb=snb==null?false:true;
		var bk=null;
		var bk2=null;
		var Init=function(){
			if(CardArr==null) return;
			var Len=CardArr.length;
			if(Len>0){
				if(HV==1){W=(Len-1)*SP+71;H=94;}else {H=(Len-1)*SP+94;W=71;}
				X=parseInt(MX-(W/2));
				Y=parseInt(MY-(H/2));
				for(var i=0;i<Len;i++){
					//alert(CardArr[i]);
					if(HV==1){
						var fx=X+(i*SP);
						if(Snb){
							CardImgs.push(new CardObj([0,0],fx,Y,V,T,i,bk,bk2));
						}else{
							CardImgs.push(new CardObj(CardArr[i],fx,Y,V,T,i,bk,bk2));
						}
					}else{
						var fy=Y+(i*SP);
						if(Snb){
							CardImgs.push(new CardObj([0,0],X,fy,V,T,i,bk,bk2));
						}else{
							CardImgs.push(new CardObj(CardArr[i],X,fy,V,T,i,bk,bk2));
						}
					}
				}
			}
		};
		
		var DelCard=function(){
			var Clen=CardImgs.length;
			for(var i=0;i<Clen;i++){
				if(CardImgs[i]){CardImgs[i].remove();}
			}
			CardImgs.length=0;
		};
		var Clean=function(){
			CardArr=null;
			DelCard();
		};
		var Update=function(Arr,back,back2){
			bk=back;
			bk2=back2;
			if(Arr)CardArr=Arr;
			DelCard();
			Init();
		};
		var ShowDonw=function(){
			Snb=!Snb;
			Update();
		};
		var SetPx=function(){
			// CardArr=AI.PxList(CardArr).Ars;
			//Update();
		};
		var GetTop=function() {
			var SelectArr=new Array();
			var Clen=CardImgs.length;
			//alert(Clen.toString());
			for(var i=0;i<Clen;i++){
				if(CardImgs[i]&&CardImgs[i].GetIsTop()==true){
					SelectArr.push(CardImgs[i].val);
				}
			}
			return SelectArr;
		};
		var SetTop=function(Ar){
			  var TLen=Ar.length;
			  var SLen=CardImgs.length;
			  for(var j=0;j<SLen;j++){CardImgs[j].SetTop(false);}
			  for(var i=0;i<TLen;i++){
				  for(var j=0;j<SLen;j++){
					  if(Ar[i][0]==CardImgs[j].val[0]&&Ar[i][1]==CardImgs[j].val[1])
						  CardImgs[j].SetTop(true);
				  }
			  }
		};
		Init();
		return {SetPx:SetPx,Update:Update,Clean:Clean,GetTop:GetTop,ShowDonw:ShowDonw,SetTop:SetTop};
	};//CardGroup
	
	
	
	return {CardObj:CardObj,CardGroup:CardGroup,BtnObj:BtnObj,Clock:Clock,DivObj:DivObj,OnlineObj:OnlineObj,Div2Obj:Div2Obj,AObj:AObj,IframeObj:IframeObj,DivObj2:DivObj2,ImgObj:ImgObj,InputObj:InputObj,AObj2:AObj2,SelectObj:SelectObj,DdxkObj:DdxkObj,OptionObj:OptionObj};
}();