//60s倒计时
var wait=60;
function time(o) {  
    if (wait == 0) {  
        o.removeAttribute("disabled");            
        o.value="免费获取验证码"; 
        
        wait = 60;  
    } else { 
    	
        o.setAttribute("disabled", true);  
        o.value="重新发送(" + wait + ")";  
        wait--;  
        setTimeout(function() {  
            time(o)  
        },  
        1000)  
    }  
} 
document.getElementById('deal_btn2').onclick=function () {time(this);}

$(function () {
	//角色选择
	$('.dianji1').click(function () {
		$('.dianji1 p').addClass('borblue')
		$('.dianji1 p img').attr('src','../img/login/huozhu2.png')
		$('.dianji1 .duihao').show()
		$('.dianji1 li').addClass('blue')
		
		$('.dianji2 p').removeClass('borblue')
		$('.dianji2 p img').attr('src','../img/login/chengren.png')
		$('.dianji2 .duihao').hide()
		$('.dianji2 li').removeClass('blue')
	})
	
	$('.dianji2').click(function () {
		$('.dianji2 p').addClass('borblue')
		$('.dianji2 p img').attr('src','../img/login/chengren2.png')
		$('.dianji2 .duihao').show()
		$('.dianji2 li').addClass('blue')
		
		$('.dianji1 p').removeClass('borblue')
		$('.dianji1 p img').attr('src','../img/login/huozhu.png')
		$('.dianji1 .duihao').hide()
		$('.dianji1 li').removeClass('blue')
	})
	//注册人信息和注册公司信息
	$('.firm_tab p').click(function () {
		var a=$('.firm_tab p').index(this)
		$(this).addClass('xuanle').siblings().removeClass('xuanle')
		$('.firm_con .firm_con1').eq(a).show().siblings().hide()
	})
	$('.merchant_tab p').click(function () {
		var b=$('.merchant_tab p').index(this)
		$(this).addClass('xuanle').siblings().removeClass('xuanle')
		$('.merchant_con .merchant_con1').eq(b).show().siblings().hide()
	})
	$('.have_tab input').click(function () {
		var c=$('.have_tab input').index(this)
		$('.have_con .have_inner').eq(c).show().siblings().hide()
	})
	
	//	五个步骤的操作
	$('.xia1').click(function () {
		var shouji1=$('.shouji1').val()
		if(shouji1==''){
			$('.red').html('手机号码不能为空')
		} else if(!IsTel(shouji1)){			
			$('.red').html('您输入的手机号码格式不正确')
		} else  if($('.xieyiipt').is(':checked')){
			$('.zhuce1').hide()
			$('.zhuce2').show()
		}else {
			return false
		}
	
	})
	
	
	$('.xia2').click(function () {
		var pwd1=$('#pwd1').val()
		var pwd2=$('#pwd2').val()
		var reg= /[\u4e00-\u9fa5]/{6,12/};
		if (reg.test(pwd1)) {
			console.log(11);
		} else {
			console.log(22);
		}
//		$('.zhuce2').hide()
//		$('.zhuce3').show()
	})
	
	
	$('.tiaoguo').click(function () {
		$('.zhuce3').hide()
		$('.zhuce4').show()
	})
	$('.xia3').click(function () {				
		
		if($('.huo_zhu').hasClass('blue')){
			$('.zhuce3').hide()
			$('.zhuce4').show()
		} else {
			$('.zhuce3').hide()
			$('.zhuce42').show()
		}

	})
	$('.xiao4').click(function () {
		$('.zhuce4').hide()		
		$('.zhuce5').show()
	})
	
})
