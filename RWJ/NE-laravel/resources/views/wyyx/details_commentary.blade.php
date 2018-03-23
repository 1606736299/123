<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>产品评论</title>
	<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
	<style type="text/css">
		.con .page .pagination{
			background: #fff;
			display: inline-block;
			margin-bottom: 80px;
			margin-top:20px;
			float: right;
			font-size: 14px;
		}
		.con .page .pagination li{
			margin-right: 0;
			float: left;
			display: inline;
		}

		.con .page .pagination li a,.con .page .pagination li span{
			display: inline-block;
			overflow: hidden;
			vertical-align: top;
			font-size: 12px;
			word-spacing: normal;
			letter-spacing: normal;
			line-height: 24px;
			border:1px solid #e6e6e6;
			padding: 7px 12px;
			border-left: 0;
			margin: 0;
		}
		.con .page .pagination li:first-child a,.con .page .pagination li:first-child span{
			border-left: 1px solid #e6e6e6;
		}
		.con .page .pagination li.active{
			background: #b4a078;
			border: #b4a078;
			color: #fff;
		}
		.con .page .pagination li.active span{
			border:1px solid #b4a078;
			color: #fff;
		}
	</style>
</head>
<body>
	<div class="detail">
		<ul>
			<div class="lv">
				<!-- <div class="label">好评率</div>
				<div class="goodRate">97.1%</div> -->
				<div class="start">
					<div></div>
				</div>
			</div>
			<li class="speak">
				<div class="speak_con">
					<div class="title">大家都在说：</div>
					<div class="label" id="label">
						<a class="activela type_research all" href="javascript:;" data-reactid="10">全部{{$num}}</a>
						<a class="type_research havepic" href="javascript:;" data-reactid="20">有图{{$show}}</a>
						<a class="type_research review" href="javascript:;" data-reactid="30">追评{{$supper1}}</a>
					</div>
				</div>
			</li>
			<div class="xu">
				<div class="xu_con">
					<span class="name">排序：</span>
					<a href="javascript:;" class="active type_research approve" data-reactid="40">默认</a>
					<a href="javascript:;" class="type_research uptime" data-reactid="50">评价时间<i></i></a>
				</div>
			</div>
			@foreach ($comment as $list)
			<li class="item cl evaluate">
				<div class="item_img">
					<div class="item_top">
						<img src='{{url($list->img)}}' alt="">
					</div>
					<div class="item_desc">
						<a href=""></a>
						<div class="name">{{$list->name}}</div>
					</div>
				</div>
				<div class="item_con">
					<div class="start">
						<a href="javascript:;"></a>
					</div>
					<div class="info">
						<span>规格：{{$list->spec}}</span>
					</div>
					<div class="content">{{$list->content}}</div>
					<ul class="cl">
						@if ($list->show1)
						   <li class="show">
								<div class="before"></div>
								<img src='{{url($list->show1)}}' alt="">
							</li>
						@else
						    <li></li>
						@endif

						@if ($list->show2)
							<li class="show">
								<div class="before"></div>
								<img src='{{url($list->show2)}}' alt="">
							</li>
						@else
						    <li></li>
						@endif

						@if ($list->show3)
							<li class="show">
								<div class="before"></div>
								<img src='{{url($list->show3)}}' alt="">
							</li>
						@else
						    <li></li>
						@endif
					</ul>
					<div class="time">{{$list->created_at}}</div>
					@if ($list->supper)
					<div class="item_user">
						<div class="server_name">小选回复：</div>
						<div class="server_content">{{$list->supper}}</div>
					</div>
					@endif
				</div>
				<div class="item_img"></div>
				<div class="item_con item_supper">
					<div class="content">
						@if ($list->supper1)
						<span>[追评]</span>{{$list->supper1}}
						@endif
					</div>
					<div class="pic">
						<ul class="cl">
							@if ($list->pic1)
							   <li class="show">
									<div class="before"></div>
									<img src='{{url($list->pic1)}}' alt="">
								</li>
							@else
							    <li></li>
							@endif

							@if ($list->pic2)
								<li class="show">
									<div class="before"></div>
									<img src='{{url($list->pic2)}}' alt="">
								</li>
							@else
							    <li></li>
							@endif

							@if ($list->pic3)
								<li class="show">
									<div class="before"></div>
									<img src='{{url($list->pic3)}}' alt="">
								</li>
							@else
							    <li></li>
							@endif
						</ul>
					</div>
					@if ($list->supper1)
					<div class="time">{{$list->time2}}</div>
					@endif
				</div>
			</li>
			@endforeach
		</ul>
	</div>
	<div class="page">
		{!! $comment->render() !!}
	</div>

</body>
</html>
<script type="text/javascript">
	$('.speak_con a').click(function(){
		$(this).addClass("activela").siblings().removeClass("activela");
	})
	$('.xu_con a').click(function(){
		$(this).addClass("active").siblings().removeClass("active");
	})
	$('.type_research').click(function(){
        // 获取两个查询条件,通过data-reactid属性
        var arr1 = $(".speak_con a[class*='activela']").attr('data-reactid');
        var arr2 = $(".xu_con a[class*='active']").attr('data-reactid');
        // console.log(arr1);
        // console.log(arr2);
        var arr = arr1+'-'+arr2;

        // 获取商品名
        var pro_id = $('.collect').attr('data-reactid');

        $.ajax({
            url: '/wyyx/comment',
            type: "post",
            data: {'arr':arr, 'pro_id':pro_id, '_token': '{{csrf_token()}}'},
            success: function(data){
                 // alert(data);

                // 获取数据的长度
                var length = data.length;
                var html = "";

                console.log(length);
                // 循环遍历数据
                for(var i=0;i<length;i++){
                    html1 = '<li class="item cl evaluate">'+
							'<div class="item_img">'+
								'<div class="item_top">'+
									'<img src="'+data[i].img+'" alt="">'+
								'</div>'+
								'<div class="item_desc">'+
									'<a href=""></a>'+
									'<div class="name">'+data[i].username+'</div>'+
								'</div>'+
							'</div>'+
							'<div class="item_con">'+
								'<div class="start">'+
									'<a href="javascript:;"></a>'+
								'</div>'+
								'<div class="info">'+
									'<span>规格：'+data[i].spec+'</span>'+
								'</div>'+
								'<div class="content">'+data[i].content+'</div>'+
								'<ul class="cl">';

					if(data[i].show1 == null){
                		html2 = '<li></li>';
                	}else{
                		html2 = '<li class="show">'+
									'<div class="before"></div>'+
									'<img src="'+data[i].show1+'" alt=""/>'+
								'</li>';
                	}
                	if(data[i].show2 == null){
                		html3 = '<li></li>';
                	}else{
                		html3 = '<li class="show">'+
									'<div class="before"></div>'+
									'<img src="'+data[i].show2+'" alt=""/>'+
								'</li>';
                	}
                	if(data[i].show3 == null){
                		html4 = '<li></li>';
                	}else{
                		html4 = '<li class="show">'+
									'<div class="before"></div>'+
									'<img src="'+data[i].show3+'" alt=""/>'+
								'</li>';
                	}

					html5 =
						'</ul>'+
						'<div class="time">'+data[i].created_at+'</div>';

					if(data[i].supper == null){
                		html6 = '</div>'+
                			'<div class="item_img"></div>';

                	}else{
                		html6 = '<div class="item_user">'+
									'<div class="server_name">小选回复：</div>'+
									'<div class="server_content">'+data[i].supper+'</div>'+
								'</div>'+
							'</div>'+
							'<div class="item_img"></div>';

                	}

                	if(data[i].supper1 == null){
						html7 = '<div class="item_con item_supper">'+
							'<div class="content">'+
						'</div>'+
						'<div class="pic">'+
								'<ul class="cl">';
                	}else{

						html7 = '<div class="item_con item_supper">'+
							'<div class="content">'+
							'<span>[追评]</span>'+data[i].supper1+
						'</div>'+
						'<div class="pic">'+
							'<ul class="cl">';
                	}

					if(data[i].pic1 == null){
						html8 = '<li></li>';
					}else{
						html8 = '<li class="show">'+
							'<div class="before"></div>'+
							'<img src="'+data[i].pic1+'" alt="">'+
						'</li>';
					}
					if(data[i].pic2 == null){
						html9 = '<li></li>';
					}else{
						html9 = '<li class="show">'+
							'<div class="before"></div>'+
							'<img src="'+data[i].pic2+'" alt="">'+
						'</li>';
					}
					if(data[i].pic3 == null){
						html10 = '<li></li>'+
								'</ul>'+
							'</div>';
					}else{
						html10 = '<li class="show">'+
									'<div class="before"></div>'+
									'<img src="'+data[i].pic3+'" alt="">'+
								'</li>'+
								'</ul>'+
							'</div>';
					}

					if(data[i].supper1 == null){
						html11 = '</div>'+
								'</li>';
					}else{
						html11 = '<div class="time">'+data[i].created_at+'</div>'+
								'</div>'+
							'</li>';
					}
					html += html1+html2+html3+html4+html5+html6+html7+html8+html9+html10+html11;

                }
                // 写入
              	$(".detail .xu").nextAll().remove();//移出.detail .xu之后的所有元素
              	$(".detail .xu").after(html);//添加查询到的元素

            }
        });



    })
</script>
