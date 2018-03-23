@extends('layouts.header')
@foreach ($product as $v1)
@section('title',$v1->name)
@endforeach
<link rel="stylesheet" type="text/css" href="{{asset('/css/details.css')}}">
<script type="text/javascript" src="{{asset('/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/details.js')}}"></script>
@section('content')
	<section style="margin:0 auto;">
		@foreach ($product as $v1)
		<div id="details-hd">
			<span><span>首页</span><i></i></span>
			<span><span>居家</span><i></i></span>
			<span class="type"><span>{{$v1->type}}</span><i></i></span>
			<span class="goodsname"><span>{{$v1->name}}</span><i></i></span>
		</div>
		@endforeach
		<div id="content">
		<!-- 显示 -->
			@foreach ($product as $v1)
			<div id="reveal_img" class="cl">

				<div class="left_img" id="left_img">
					<div class="larger">
						<img src="{{url($v1->goods_img1)}}" alt="">
					</div>
					<div class="litter_img">
						<ul>
							<li class="active"><a href="javascript:;"><img class="imgs" src="{{url($v1->goods_img1)}}" alt=""></a></li>
							<li><a href="javascript:;"><img class="imgs" src="{{url($v1->goods_img2)}}" alt=""></a></li>
							<li><a href="javascript:;"><img class="imgs" src="{{url($v1->goods_img3)}}" alt=""></a></li>
							<li><a href="javascript:;"><img class="imgs" src="{{url($v1->goods_img4)}}" alt=""></a></li>
							<li><a href="javascript:;"><img class="imgs" src="{{url($v1->goods_img5)}}" alt=""></a></li>
						</ul>
					</div>
				</div>
				<div class="right_info">
				<form action="{{url('wyyx/buy_now')}}" method="post">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="info_hd">
						<div class="name">{{$v1->name}}</div>
						<input type="hidden" name = "goods_name" value="{{$v1->name}}">
						@if ($v1->is_new == 1)
						<div class="detail"><a href="javascript:;">新品</a></div>
						@elseif($v1->is_best == 1)
						<div class="detail"><a href="javascript:;">精品</a></div>
						@elseif($v1->is_hot == 1)
						<div class="detail"><a href="javascript:;">热销</a></div>
						@elseif(!empty($v1->maker))
						<div class="detail"><a href="javascript:;">{{$v1->maker}}</a></div>
						@endif
						<div class="desc">{{$v1->goods_desc}}</div>
					</div>
					<div class="info_price">
						<a href="#comment_active">
							<div>
								<span class="f-fz18">{{$num}}</span>
								<br>
								<span class="f-fz13">用户评价</span>
							</div>
						</a>
						<div class="price shou">
							<span class="label label-1">售价</span>
							<span class="rp">
								<span class="rmb">¥</span>
								@foreach ($pru_pr as $pri)
								@if ($pri->pid == $v1->id)
								<span class="num">{{$pri->price}}</span>
								<input type="hidden" name="price" value="{{$pri->price}}">
								@endif
								@endforeach
							</span>
						</div>
						<div class="price sale">
							<span class="label label-2">促销</span>
							<div class="saleLine">
								<a class="link" href="javascript:;">
									<div class="activityType">冬季新品</div>
									<span >券后仅售¥289，再赠59元福袋</span>
								</a>
							</div>
						</div>
						<div class="price server">
							<span class="label">服务</span>
							<div class="sItem policyPop ">
								<span>·&nbsp;30天无忧退换货&nbsp;&nbsp;&nbsp;&nbsp;</span>
								<span>·&nbsp;48小时快速退款&nbsp;&nbsp;&nbsp;&nbsp;</span>
								<span>·&nbsp;满88元免邮费&nbsp;&nbsp;&nbsp;&nbsp;</span>
								<span>·&nbsp;网易自营品牌&nbsp;&nbsp;&nbsp;&nbsp;</span>
							</div>
						</div>
					</div>
					<div class="info_model">
						<div class="paramp cl">
							<span style="display: block;">规格</span>
							<ul class="cl">
								@foreach ($spec as $pri)
								@if ($pri->pid == $v1->id)
								<li class="clickspec">{{$pri->spec}}</li>
								@endif
								@endforeach
								<input type="hidden" name="spec" value="">
							</ul>
						</div>
						<div class="number cl">
							<span>数量</span>
							<div class="num">
								<span class="less z-dis"><i class="hx"></i></span>
								<input type="text" class="dis" name="num" value='1' disabled="">
								<span class="more z-dis"><i class="hx"></i><i class="sx"></i></span>
							</div>

						</div>
					</div>
					<div class="info_sum">
						<button class="ghost"><span>立即购买</span></button>
						<a class="primary" href="javascript:;"><i></i><span>加入购物车</span></a>
						<div class="collect" title='点击收藏' data-reactid="{{$v1->id}}">
							<div class="top"><span></span></div>
							<div class="bottom"><p>收藏</p></div>
						</div>
					</div>
					<p class="over-pro" style="width:150px;line-height:50px;font-size:16px;color:#999;margin-top:10px;margin-left:7px;display:none;">此物已经售完!</p>
				</form>
			</div>
			@endforeach
			<!-- 相关 -->
			<div id="analogy">
				<div class="analogy_hd">
					<span>大家都在看</span>
				</div>
				<div class="analogy_con">
					<div id="recommend">
						<div class="recommend_content">
							<ul class='recommend_list'>
								<div class="slick">
									<div class="slick_list clearfix">
									@foreach ($about as $v2)
										<li>
											<div class="item slick_slide">
												<div class="prodect">
													<a href="{{url('wyyx/details',$v2->id)}}">
														<img class="img" src="{{url($v2->goods_img1)}}" alt="">
														<!-- <span class="colorNum">5色可选</span> -->
													</a>
												</div>
												<div class="prodect_desc">

													<div class="tags">>
													@if ($v2->is_hot)
														<span>爆品</span>
													@elseif($v2->is_new)
														<span>新品</span>
													@endif
													</div>

													<h4 class="name">
														<a href="{{url('wyyx/details',$v2->id)}}">{{$v2->name}}</a>
													</h4>
													<p class="price">
													@foreach ($pru as $pri)
													@if($pri->pid==$v2->id)
														<span>￥{{$pri->price}}.00</span>
													@endif
													@endforeach
													</p>
												</div>
											</div>
										</li>
										@endforeach
									</div>
								</div>
							</ul>
						</div>
						<div class="w_icon slick_left"></div>
						<div class="w_icon slick_right"></div>
					</div>
				</div>
			</div>

			<!-- about -->
			<div id="about" class="cl">
				<div class="about_left cl">
					<div class="hd">
						<ul>
							<li class="active"><a href="javascript:;">
								<span>详情</span>
							</a></li>
							<li><a href="javascript:;">
								<span>评价</span>
								<span class="num"></span>
							</a></li>
						</ul>
					</div>
					<!-- 详情 -->
					<div class="con">
						@include('wyyx.details_explicit')
					</div>
					<!-- 评价 -->
					<div id="comment_active" class="con" style="display: none;padding-top:0;">
						@include('wyyx.details_commentary')
					</div>
				</div>
				<div class='about_right'>
					<div class="host_sell">
						<div class="sell_hd">24小时热销榜</div>
						<div class="sell_con">
							<ul>
							<!-- ?  -->
								@foreach ($sell as $se)
								<li><a href="{{url('wyyx/details',$se->id)}}">
									<div class="img">
										<img src="{{url($se->goods_img1)}}" style="width: 250px;height: 250px;">
										<!-- <span class="colorNum">5色可选</span> -->
									</div>
									<div class="content">
										<div class="title">
											<span class="item_name">{{$se->name}}</span>
										</div>
										@foreach ($pru_se as $pri)
										@if($pri->pid==$se->id)
										<div class="price">￥{{$pri->price}}</div>
										@endif
										@endforeach
									</div>
								</a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="topic">
						<div class="sell_hd">新品推荐</div>
						<div class="topic_con">
							<ul>
								@foreach($recommend as $v)
								<li>
									<a href="{{url('wyyx/details',$v->id)}}">
										<img src="{{url($v->goods_img2)}}" alt="">
										<div>{{$v->goods_desc}}</div>
									</a>
								</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
	<script>
		$(function(){
			$('.primary').click(function(){
				if($('.paramp .tab-spa').html() == undefined){
					alert("请选择商品规格");
					return;
				}
				var name = $('.info_hd .name').html();//产品名
				var price = $('.price .num').html();//售价
				var spec = $('.paramp .tab-spa').html();//规格
				var num = $('.number input').val();//数量
				var img = $('.larger img').attr('src');//图片
				if($('#hide_username')){
					var username = $('#hide_username').val();
				}else{
					alert("请登录");
				}

				$.ajax({
					url: '/details/goshop',
					type: "post",
                    cache: false,
					data: {'name':name, 'price':price, 'spec':spec, 'num':num, 'img':img, 'username':username, '_token': '{{csrf_token()}}'},
					success: function(data){
						console.log(data);
						// alert(data);
						if(data == "have"){
							alert("商品已在购物车");
						}else if(data == "yes"){
							var count = $('#js-funcTabWrap .m-search .w-icon-normal').html();
							if(data == 'yes'){
								$('#js-funcTabWrap .m-search .w-icon-normal').html(parseInt(count)+parseInt(num));
							}
						}
					},
					error: function(){
						alert('请登录!');
					}
	  			});

			})

			//查看是否收藏
			var id  = $('.collect').attr("data-reactid");
			var eee = $('.collect').children('.top').children('span');
			var url = "{{url('/shop/select')}}";
			$.get(url,{id:id},function(data){
				if(data == 1){
					eee.addClass('full');
				}else{
					eee.addClass();
				}
			})


			// 收藏--取消收藏
			   $('.top,.bottom').click(function(){
					var eee = $('.collect').children('.top').children('span');
					var id = $('.collect').attr("data-reactid");
			        if($('#hide_username').html() == undefined){
			        	alert("请登录");
					}
					//获取元素下的class名
					var e = $('.collect').children('.top').children('span').attr('class');
					if(e == undefined || e == ''){
						$.ajax({
				            url: '/shop/collect',
				            type: 'get',
				            data: {'id':id},
				            success: function(data){
				                eee.addClass('full');
				            }
				        });
					}else if(e == 'full'){
						$.ajax({
				            url: '/shop/delcollect',
				            type: 'get',
				            data: {'id':id},
				            success: function(data){
				                eee.removeClass('full');
				            }
				        });
					}

			    })


			// 立即购买
			$('.ghost').click(function(){
				if($('.paramp .tab-spa').html() == undefined){
					alert("请选择商品规格");
					return;
				}
			})


			$('.clickspec').click(function(){
			var type = $('#details-hd .type span').html();
			var name = $('#details-hd .goodsname span').html();
			var spec = $(this).html();
			$.ajax({
		            url: '/product/select',
		            type: 'get',
		            data: {'type':type,'name':name,'spec':spec},
		            success: function(data){
		                if(data == 1){
		                	$('.info_sum').css('display','none');
		                	$('.over-pro').css('display','block');
		                }else{
		                	$('.info_sum').css('display','block');
		                	$('.over-pro').css('display','none');
		                }
		            }
		        });
			})


		})

	</script>
	<script type="text/javascript">
		$('.paramp li').click(function(){
			var spec = $(this).html();
			$("input[name='spec']").val(spec);
		})
	</script>
@endsection