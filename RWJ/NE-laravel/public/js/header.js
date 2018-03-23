window.onload=function(){

	var goTop = document.getElementsByClassName('goTop')[0];
	var mTab = document.getElementById('m-funcTab');


	window.onresize=window.onscroll=window.onload=function(){
        var t =document.documentElement.scrollTop || document.body.scrollTop;
        		// 导航栏置顶
        		if(t>190){
	            	mTab.className="m-funcTab m-funcTab-fixed";

	            }else{
	            	mTab.className="m-funcTab";
	            }
	            // 回到顶部
	            if(t>900){
	            	goTop.style.display="block";

	            }else{
	            	goTop.style.display="none";
	            }
	}
}


$(function(){
	// 头部
	// 客户服务
	$(".custmService").mouseover(function(){
		$(".w-icon-arrow").css("background-position","0 -222px");
	}).mouseout(function(){
		$(".w-icon-arrow").css("background-position","0 -500px");
	})
	$(".itemHover").hover(function(){
		$(".panel").toggleClass("show");
	})

	//退出登录
	$(function(){
		$('#member').hover(function(){
			$('#exitlogin').toggle();
		})

		$('#exitlogin').hover(function(){
			$(this).toggle();
		})
	})

	// 热门搜索
	$(".m-searchInput .w-searchInput").focus(function(){
		$(".m-ppnl").show();
		// $(".m-ppnl").fadeTo(300,1);
	}).blur(function(){
		// $(".m-ppnl").fadeTo(300,0);
		$(".m-ppnl").hide();
	})

	// 导航
	$(".tab-inner .nav-item").mouseover(function(){
		var scw = $(window).width();
		// alert($(window).width());
		$(".tab-inner .nav-dropdown .nav-cateCard").css("width",scw).css("left",-scw/2);
		var index = $(this).index();
		$(".tab-inner .j-nav-item").eq(index-1).addClass("active").siblings(".j-nav-item").removeClass("active");
		// $(".tab-inner .j-nav-dropdown").eq(index-1).addClass("show");
	})



})

