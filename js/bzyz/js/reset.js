//主页的tab切换
$(function () {
	//	主页,货源发布,车源发布的切换
	$('.index_tab li').click(function () {
		var i=$('.index_tab li').index(this)
		$(this).addClass('index_tab_blue').siblings().removeClass('index_tab_blue')
		$('.index_content .index_content1').eq(i).show().siblings().hide()
	})	
	//	消息页面,系统消息,活动消息的切换
	$('.news_tab div').click(function () {
		var i=$('.news_tab div').index(this)
		$(this).addClass('tab_atem').siblings().removeClass('tab_atem')
		$('.news_outer .news_inner').eq(i).show().siblings().hide()
	})
	$('.tab_atem1').click(function () {
		$('.tab_atem1 img').attr('src','../img/news/xiao2.png')
		$('.tab_atem2 img').attr('src','../img/news/huo1.png')
	})
	$('.tab_atem2').click(function () {
		$('.tab_atem1 img').attr('src','../img/news/xiao1.png')
		$('.tab_atem2 img').attr('src','../img/news/huo2.png')
	})
	//	未读消息,已读消息的切换
	$('.news_con1 ol li').click(function () {
		var i=$('.news_con1 ol li').index(this)
		$(this).addClass('news_con_atem').siblings().removeClass('news_con_atem')
		$('.news_coner .news_in').eq(i).show().siblings().hide()
	})
	//页码的点击
	$('.newin_bottom2 var').click(function () {
		$(this).addClass('blue').siblings().removeClass('blue')
	})

	//  车辆和物流车队的查找tab切换
	$('.news_con1 ul li').click(function () {
		var i=$('.news_con1 ul li').index(this)
		$(this).addClass('lookup_blue').siblings().removeClass('lookup_blue')
		$('.lookupup .news_in').eq(i).show().siblings().hide()
	})
})


//未登录的提示居中问题

//var login=document.getElementById('not_logged');
// login.style.top=(document.documentElement.clientHeight-login.offsetHeight)/2+"px";
// login.style.left=(document.documentElement.clientWidth-login.offsetWidth)/2+"px";
//login.style.display = 'block';
