// 标签页面

// 标签页面-图片展示

$(function(){
	// 标签页面
	$('#left_img .litter_img li').mouseover(function(e){
		var index = $(this).index();
		var change = $('.imgs').eq(index).attr('src');
		$('#left_img .larger img').attr("src",change);
		// 小标签
		$(this).addClass("active").siblings('li').removeClass('active');
	})
})
// 标签页2-选项卡
$(function(){
	$('#about .about_left .hd li').click(function(){
		$(this).addClass('active').siblings('li').removeClass('active');
		var index = $(this).index();

		$('#about .about_left>.con').eq(index).show().siblings('.con').hide();
	})
})
// 小轮播-相关产品
$(function(){
	// $('#analogy .slick_left').click(function(){
	// 	var change = $('#analogy .recommend_list .slick_list').css('margin-left','-860px');
	// 	if(change){
	// 		$('#analogy .recommend_list .slick_list').css('margin-left','0px');
	// 		$(this).addClass('disabled_left');
	// 	}else{
	// 		$('#analogy .recommend_list .slick_list').css('margin-left','-860px');
	// 		$(this).removeClass('disabled_lfet');
	// 	}
	// })
	// $('#analogy .slick_right').click(function(){
	// 	var change1 = $('#analogy .recommend_list .slick_list').css('margin-left','0px');
	// 	if(change1){
	// 		$('#analogy .recommend_list .slick_list').css('margin-left','-960px');
	// 	}else{
	// 		$('#analogy .recommend_list .slick_list').css('margin-left','0px')
	// 	}

	// })


	// 新品首发
	var liW=0;
	var liNum = $('#analogy .recommend_list .slick_list li').size();
	var pageNum = Math.ceil(liNum/4);
	// 判断左右箭头是否隐藏的方法
	function ifhide(){
		if(liW == 0){
			$('#analogy .slick_left').hide();
		}else{
			$('#analogy .slick_left').show();
		}
		if(liW == pageNum-1){
			$('#analogy .slick_right').hide();
		}else{
			$('#analogy .slick_right').show();
		}
	}
	ifhide();
	$('#analogy .slick_right').click(function(){
		liW++;
		$('#analogy .recommend_list .slick_list').animate({"left":-(960*liW)},500);
		ifhide();	
	})
	$('#analogy .slick_left').click(function(){
		liW--;
		$('#analogy .recommend_list .slick_list').animate({"left":-(960*liW)},500);	
		ifhide();
	})
})




// 规格-数量
$(function(){

	// $.each('.info_model .paramp ul',function(){
	// 	var _this = $(this);
	// 	alter('aaa');
	// 	// pitch()
	// });
	var lion = $('.info_model .paramp ul li').length;
	for(var i=0;i<lion;i++){
		$('.info_model .paramp ul li').eq(i).toggle(pitch,cancel);
	}
	// 选中
	 function pitch() {
	    $(this).addClass('tab-spa').siblings().removeClass('tab-spa');
	    $(this).css('margin-right','10px');
	    $('.info_model .number .num .more').css('cursor','pointer');
		$('.info_model .number .num .more').removeClass('z-dis');
		var value = $('.info_model .number .num input').attr('value');

		// more
		$('.info_model .number .num .more').click(function(){
			value++;
			if(value>=2 ){
				$('.info_model .number .num .less').removeClass('z-dis');
				$('.info_model .number .num .less').css('cursor','pointer');
			}else{
				$('.info_model .number .num .less').addClass('z-dis');
				$('.info_model .number .num .less').css('cursor','not-allowed');
			}

			$('.info_model .number .num input').attr('value',value);
			
		})

		// less
		$('.info_model .number .num .less').click(function(){
			if(value==1){
				$(this).addClass('z-dis');
				$(this).css('cursor','not-allowed');
				$('.info_model .number .num input').attr('value',value);
			}else{
				$('.info_model .number .num input').attr('value',value);
				value--;
			}
		})
		

		$('.info_model .number .num input').removeClass('dis');
		$('.info_model .number .num input').removeAttr('disabled');


	  }
	  // 取消选择
	  function cancel() {
	    $(this).removeClass('tab-spa');
	    var value = $('.info_model .number .num input').attr('value');
		$('.info_model .number .num span').addClass('z-dis');
		$('.info_model .number .num .z-dis').css('cursor','not-allowed');
		// more
		$('.info_model .number .num .more').click(function(){
			value=1;
			$('.info_model .number .num .less').addClass('z-dis');
			$('.info_model .number .num input').attr('value',value);
			
		})

		// less
		$('.info_model .number .num .less').click(function(){
			value==1
			$(this).addClass('z-dis');
			$(this).css('cursor','not-allowed');
			
			$('.info_model .number .num input').attr('value',value);
		})
		$('.info_model .number .num input').addClass('dis');
		$('.info_model .number .num input.dis').attr({"value":"1"});
		$('.info_model .number .num input').prop('disabled',true);
	  }

	// 按钮提交
	$('.info_sum .ghost,.info_sum .primary').click(function(){
		if($('.info_model .number .num input').hasClass('dis')){
			$('.remind').animate({'display':'block',},1000,function(){
				$(this).removeClass('hide').addClass('show');
			})
			$('.remind').animate({'display':'none',},1000,function(){
				$(this).removeClass('show').addClass('hide');
			})
		}
	})
	
	
	
	
})