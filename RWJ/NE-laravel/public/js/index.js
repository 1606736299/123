$(function(){
	//轮播图
		var oBa=document.getElementById("banner");
		var oImg=oBa.getElementsByTagName("img")[0];
		var oPager=document.getElementById("pager");
		var oLi=oPager.getElementsByTagName("li");
		// alert(oLi.length);
		var num=1;
	//自动轮播（由定时器完成）
	function autoplay(){
		if(num == oLi.length){
			num=1;
		}else{
			num++;
		}
		oImg.src="images/banner-"+num+".jpg";
		//图片对应的每个li也要同时轮播
		for(var i=0;i<oLi.length;i++){
			if(i==num-1){
				oLi[i].className="current";
			}else{
				oLi[i].className="";
			}
		}
	}
	function autoplayLeft(){
		if(num==1){
			num=oLi.length;
		}else{
			num--;
		}
		oImg.src="../images/banner-"+num+".jpg";
		//图片对应的每个li也要同时轮播
		for(var i=0;i<oLi.length;i++){
			if(i==num-1){
				oLi[i].className="current";
			}else{
				oLi[i].className="";
			}
		}
	}
	var intervalld= setInterval(autoplay,3000);

	// 手动轮播图
	for(var i=0;i<oLi.length;i++){
		oLi[i].onclick=function(){
			for(var j=0;j<oLi.length;j++){
				if(oLi[j]==this){
					oLi[j].className="current";
					oImg.src="../images/banner-"+(j+1)+".jpg";
					num=j+1;
				}else{
					oLi[j].className="";
				}
			}
		}
	}
	// 左右轮播
	$('#banner .left').click(function(){
		autoplayLeft();
	})
	$('#banner .right').click(function(){
		autoplay();
	})
	//当鼠标移入轮播图停止播放
	oBa.onmouseover=function(){
		clearInterval(intervalld);
	}
	//当鼠标移出时开启定时器
	oBa.onmouseout=function(){
		intervalld=setInterval(autoplay,1000);
	}

	// 新品首发
	var liW=0;
	var liNum = $(".sec3-content .itemList .item").size();
	var pageNum = Math.ceil(liNum/4);
	// 判断左右箭头是否隐藏的方法
	function ifhide(){
		if(liW == 0){
			$('#sec-3 .left').hide();
		}else{
			$('#sec-3 .left').show();
		}
		if(liW == pageNum-1){
			$('#sec-3 .right').hide();
		}else{
			$('#sec-3 .right').show();
		}
	}
	ifhide();
	$('#sec-3 .right').click(function(){
		liW++;
		$('.sec3-content .itemList').animate({"left":-(1090*liW)},500);
		ifhide();
	})
	$('#sec-3 .left').click(function(){
		liW--;
		$('.sec3-content .itemList').animate({"left":-(1090*liW)},500);
		ifhide();
	})

	// 人气推荐
	$("#sec-4 .caption ol li").click(function(){
		var index = $(this).index();
		$(this).addClass('active').siblings().removeClass('active');
		$("#sec-4 .sec4-content .container").eq(index).show().siblings().hide();
	})

	// 限购
    getMyTime();
	//前补0
    function p(n){
        return n<10?'0'+n:n;
    }
    //2.倒计时
    function getMyTime(){
        var startDate=new Date();
        var endDate=new Date('2017/10/21 11:11:11');
        var countDown=(endDate.getTime()-startDate.getTime())/1000;
        var day=parseInt(countDown/(24*60*60));
        var h=parseInt(countDown/(60*60)%24);
        var m=parseInt(countDown/60%60);
        var s=parseInt(countDown%60);

		$('.hour').empty();
		$('.minute').empty();
		$('.second').empty();
		$('.hour').append(p(h));
		$('.minute').append(p(m));
		$('.second').append(p(s));

        setTimeout(getMyTime,1000);

    }

    // 大家都在说

    //获取任意一个ul里面li的宽度
    var liW1  = $('.sec16-content ul .item').eq(0).width();
    // 获取li的数量
    var liN = $('.sec16-content ul .item').size();


    //获取ul的宽度
	var ulW  = $('.sec16-content .slick-list').eq(0).width();
	var ulbt = -(ulW-(3*liW1))+"px";

	// alert(-(ulW-(3*liW1)));
    //index1控制小图标
	var index1 = 0;
	//index2控制图片移动
	var index2 = 0;
	var timeId = null;

   	// //手动轮播
    // $('#sec-16 .sec16-content .left').click(function(){
    // 	slideLeft();
    // })
    // $('#sec-16 .sec16-content .right').click(function(){
    // 	slide();
    // })

    //自动轮播的实现
    $('#sec-16 .slick-list').html($('#sec-16 .slick-list').html()+$('#sec-16 .slick-list').html());
    $('#sec-16 .slick-list').css("width",(liN+3)*liW1);
	function slide(){
		if(index1==$('.fadeDiv ol li').length-1){
			//把第一张图片定位到最后一张图片的后面
			$('#sec-16 .slick-list .item').eq(0).css({'position':'relative','left':ulW});
            index1 = 0;
		}else{
           index1++;
		}
		index2++;
		//自动轮播的时候，ol里面的每个li加上on类，其他的同级元素移除on类
       $(".fadeDiv ol li").eq(index1).addClass('on').siblings().removeClass('on');
        //ul根据下标*li的宽度移动位置，函数加在后面是ul移动位置之后，再去执行函数里面的
       $('#sec-16 .slick-list').animate({'left':-(index2*liW1)},500,function(){
       	 if(index1 == 0){
       	  //当显示移动后的第一张图片的时候，第一张图片回归之前的位置
           $('#sec-16 .slick-list .item').eq(0).css('position','static');
           //ul距离左边的距离为0
           $('#sec-16 .slick-list').css('left','0px');
           //index2的值设置为0
           index2 = 0;
         }
       });
	}
	timeId = setInterval(slide,2000);
	// function slideLeft(){
	// 	if(index1==0){
	// 		index1 == $('.fadeDiv ol li').length-1;
	// 		//把第一张图片定位到最后一张图片的后面
	// 		$('#sec-16 .slick-list .item').eq(index1).css({'position':'relative','left':-ulW});
	// 	}else{
 //           index1--;
	// 	}
	// 	index2--;
	// 	//自动轮播的时候，ol里面的每个li加上on类，其他的同级元素移除on类
 //       $(".fadeDiv ol li").eq(index1).addClass('on').siblings().removeClass('on');
 //        //ul根据下标*li的宽度移动位置，函数加在后面是ul移动位置之后，再去执行函数里面的
 //       $('#sec-16 .slick-list').animate({'left':-(index2*liW1)},500,function(){
 //       	 if(index1 == $('.fadeDiv ol li').length-1){
 //       	  //当显示移动后的第一张图片的时候，第一张图片回归之前的位置
 //           $('#sec-16 .slick-list .item').eq(index1).css('position','static');
 //           //ul距离左边的距离为-3303px
 //           $('#sec-16 .slick-list').css('left',ulbt);
 //           //index2的值设置为index1
 //           index2 = index1;
 //         }
 //       });
	// }

	//鼠标移入暂停
	$('.sec16-content').mouseover(function(){
        clearInterval(timeId);
        //鼠标移除继续
	}).mouseout(function(){
        timeId = setInterval(slide,2000);
	})
})