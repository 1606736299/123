@extends('layouts.mylist')
@section('title', '订单管理 - 网易严选')
@section('content')
<link rel="stylesheet" href="{{'css/mylist-or.css'}}">
<link rel="stylesheet" href="{{'css/mylist-or.css'}}">
<link href="{{asset('css/plugins/bootstrap-table/bootstrap-table.min.css')}}" rel="stylesheet">
<link href="{{asset('css/animate.css')}}" rel="stylesheet">
<link href="{{asset('css/style.css?v=4.1.0')}}" rel="stylesheet">
<script type="text/javascript" src="{{'js/jquery.js'}}"></script>
<script type="text/javascript" src="{{'/layer/layer.js'}}"></script>
<style>
	table{
		width:100%;
		border: 1px solid #ccc;
		border-collapse: collapse;
	}
	table tr th{
		font-size: 12px;
		font-weight: 100;
	}
	table img{
		margin-top: 0px;
	}
	.spm{
		/*line-height: 100px;*/
		color:#333;
		margin-left: 0px;
	}
	.spm:hover{
		color:#b4a078;
	}
	.yx-bd-c{
		height: 850px;
	}
	.back{
		width:100%;
		height:1500px;
    	background: rgba(0,0,0,.8);
    	position: absolute;
    	top: 0;
    	left: 0;
    	z-index: 200;
    	display: none;
	}
	.back > div{
		width: 500px;
		height: 274px;
		background: #fff;
		margin: 250px auto;
		position: relative;
	}
	.back > div > div{
		width: 305px;
		height: 50px;
		border: 1px solid #ccc;
		margin: 0 auto;
	}
	.back > div > div input{
		width: 50px;
		height: 50px;
		border: 0;
		border-right: 1px solid #ccc;
		margin-left: 0;
		outline: none;
		float: left;
		font-size: 60px;
		color: #ccc;
		text-align: center;
	}

	.back1{
		width:100%;
		height:1500px;
    	background: rgba(0,0,0,.8);
    	position: absolute;
    	top: 0;
    	left: 0;
    	z-index: 200;
    	display: none;
	}
	.back1 > div{
		width: 500px;
		height: 204px;
		background: #fff;
		margin: 250px auto;
		position: relative;
	}
	.back1 > div p{
		text-align:center;
		color:#000;
		font-size:16px;
		padding:10px;
	}
	.back1 > div > div{
		width: 305px;
		height: 50px;
		border: 1px solid #ccc;
		margin: 0 auto;
	}
	.back1 > div > div input{
		width: 305px;
		height: 48px;
		border: 0;
		border-right: 1px solid #ccc;
		margin-left: 0;
		outline: none;
		float: left;
		font-size: 60px;
		color: #ccc;
		text-align: center;
	}
	.shi,.shi1{
		width: 150px;
		height: 40px;
		border: 1px solid #ccc;
		text-align: center;
		line-height: 40px;
		float: left;
		margin-top: 30px;
		margin-left: 60px;
	}
	.fou,.fou1{
		width: 150px;
		height: 40px;
		border: 0;
		margin-top: 30px;
		margin-left: 70px;
	}
	.back2{
		width:100%;
		height:1500px;
    	background: rgba(0,0,0,.8);
    	position: absolute;
    	top: 0;
    	left: 0;
    	z-index: 200;
    	display: none;
	}
	.back2 > div{
		width: 500px;
		height: 274px;
		background: #fff;
		margin: 250px auto;
		position: relative;
	}
	.back2 > div span{
		line-height: 5;
		margin-left: 30px;
	}
	.back2 > div input{
		width: 300px;
		height: 100px;
	}
	.back2 > div button{
		width: 100px;
		height: 40px;
		border: 0;
		margin-left: 250px;
		position: absolute;
		top: 165px;
	}



	.back3{
		width:100%;
		height:1500px;
    	background: rgba(0,0,0,.8);
    	position: absolute;
    	top: 0;
    	left: 0;
    	z-index: 200;
    	display: none;
	}
	.back3 > div{
		width: 500px;
		height: 274px;
		background: #fff;
		margin: 250px auto;
		position: relative;
	}
	.back3 > div span{
		line-height: 5;
		margin-left: 30px;
	}
	.back3 > div input{
		width: 300px;
		height: 100px;
	}
	.back3 > div button{
		width: 100px;
		height: 40px;
		border: 0;
		margin-left: 250px;
		position: absolute;
		top: 165px;
	}
	form{
		position: relative;
	}

	.ibox-content{
    	display:none;
	}

</style>
<script>
	 $(function(){
	 	var a = "";
		 $('.tab').find('li').click(function(){
			 var index = $(this).index();
			 $(this).addClass('active').siblings().removeClass('active');
			 $('.content').find('li').eq(index).show().siblings().hide();
		 })

		 //提醒商家发货
		 $('.tx').click(function(){
		 	alert('已提醒商家发货');
		 	return false;
		 })

		 //详情
		 $('.xq').on('click',function(){
		 	if($('.ibox-content').css('display','none')){
	 			$(".table tbody tr").nextAll().remove();//移出.detail .xu之后的所有元素
	 		}
		 	layer.open({
		 		type:1,
		 		skin:'layui-layer-seaing',
		 		area: ['820px', '460px'],
		 		content: $('#ibox-content')
		 	});
		 	var id = $(this).attr('data-data');
		 	$.ajax({
		 		url: "content",
		 		type: "post",
		 		data: {'id':id,'_token': '{{csrf_token()}}'},
		 		success: function(data){
		 			//获取数据的长度
		 			var length = data.length;
		 			var html = "";
		 			//循环遍历
		 			for(var i=0;i<length;i++){
		 				html = '<td style="text-align:center;">'+
		 							'<a href="{{url('wyyx/details')}}/'+data[i].goods_id+'" title="">'+data[i].name+'</a>'+
	 							'</td>'+
		 					   '<td style="text-align:center;">'+
		 					   		'<img style="height:44px;text-align:center;"; src="'+data[i].image+'">'+
		 					   '</td>'+
		 					   '<td style="text-align:center;">'+data[i].type+'</td>'+
		 					   '<td style="text-align:center;">'+data[i].spec+'</td>'+
		 					   '<td style="text-align:center;">'+data[i].price+'</td>'+
		 					   '<td style="text-align:center;">x'+data[i].count+'</td>'+
		 					   '<td style="text-align:center;">'+data[i].created_at+'</td>';
		 			}
		 			$(".table tbody tr").after(html);//添加查询到的元素
		 		}
		 	});
		 });



		 //去评价
		 $('.qpj').click(function(){
		 	$('.back2').css('display','block');
		 	var id = $(this).attr('data-data');
		 	$('.hiddenid').val(id);
		 	return false;
		 })
		 $('.fou2').click(function(){
		 	$('.back2').css('display','none');
		 })


		 //追加评论
		 $('.qpz').click(function(){
		 	$('.back3').css('display','block');
		 	var id = $(this).attr('data-data');
		 	$('.hiddenids').val(id);
		 	return false;
		 })
		 $('.fou3').click(function(){
		 	$('.back3').css('display','none');
		 })



		 //确认收货
		 $('.qrsh').click(function(){
		 	$('.back1').css('display','block');
		 	var id = $(this).attr('data-data');
		 	$('.shid').val(id);
		 	$('.m11').focus();
		 })
		 $('.fou1').click(function(){
		 	$('.back1').css('display','none');
		 })
		 var aaa ="";
	 	$('.m11').keyup(function(){
			 var m11 = $('.m11').val();
			 var payment = m11;
			 var url =  "{{url('mylist_yzpay')}}";
			 $.get(url,{payment:payment},function(data){
				if(data == 1){
					a = 1;
					$('.payts1').html('');
				}else{
					$('.payts1').html('支付密码错误').css('color','red');
					a = 2;
				}
			 })
	 	})

		 	$('.shi1').click(function(){
		 		if(a == 1){

		 		}else{
		 			return false;
		 		}
		 	})

		 $('.fenye ul').removeClass('pagination');
		 $('.fenye ul li').removeClass('active');
		 $('.fenye ul li').removeClass('disabled');


// <ul class="">
// 	<li class="disabled" style="display: list-item;">
// 		<span>«</span>
// 	</li>
// 	<li class="" style="display: none;">
// 		<span>1</span>
// 	</li>
// 	<li style="display: none;">
// 		<a href="http://www.wyyx.com/or?page=2">2</a>
// 	</li>
// 	<li style="display: none;">
// 		<a href="http://www.wyyx.com/or?page=2" rel="next">»</a>
// 	</li>
// </ul>
	 })
</script>
<!-- 内容部分 -->
<div class="or-head">
	 <ul class="tab">
		 <li class="active">全部订单</li>
		 <li>待付款</li>
		 <li>待发货</li>
		 <li>已发货</li>
		 <li>待评价</li>
	 </ul>
	 <!-- <div class="or-ss">
		 <form action="">
		 	<input style="width:238px;" type="text" placeholder="输入商品名称或订单号搜索" class="or-text">
		 	<button>搜索</button>
		 </form>
 	 </div> -->
</div>
 <ul class="content">
 	 @if($list111)
		 <li style="display: block;">
			<table class="tb1">
			 @foreach($list111 as $v)
				<tr style="background-color: #f5f5f5;height:43px;">
					<th colspan="4">下单时间：{{$v->created_at}}</th>
					<th colspan="90">订单号：{{$v->order_sn}}</th>

				</tr>
			  	<tr style="height:100px;">
			  		<td colspan="80" style="border-right:1px solid #f5f5f5;height:100px;">
						<img src="{{url('images/qb.png')}}" alt="" style="width:80px;margin-left:20px;float:left;">
					</td>
					<td style="width:200px;overflow: hidden;">
						<a href="javascript:;" class="spm">&nbsp;&nbsp;{{$v->phone}}(联系方式)</a>
					</td>
					<td style="width:110px;margin-left: 80px;">
						@if($v->status == 0)
							<span style=" color: #f33;">未付款</span>
						@elseif($v->status == 1)
							<span style="color: #f33;">已付款,待发货</span>
						@elseif($v->status == 2)
							<span style="color: #f33;">已发货,待确认收货</span>
						@elseif($v->status == 3)
							<span style="color: #f33;">已确认收获,待评价</span>
						@elseif($v->status == 4)
							<span style="color: green;">订单完成</span>
						@endif
					</td>
					<td colspan="10" style="text-align: center">
						@if($v->status == 0)
							<a href="{{url('paymentmethod',$v->id)}}" style="width:90px;height: 28px;display: block;margin: -10px auto;line-height: 28px;border-radius: 4px;color:#fff; background-color: #b4a078" class="qfk" data-data="{{$v->id}}">去付款</a><br>
						@elseif($v->status == 1)
							<a href="" style="width:90px;height: 28px;display: block;margin: -10px auto;line-height: 28px;border-radius: 4px;color:#fff; background-color: #b4a078" class="tx">提醒商家发货</a><br>
						@elseif($v->status == 2)
							<a style="width:90px;height:28px;display: block;cursor:pointer;margin: -10px auto;line-height: 28px;border-radius: 4px;color:#fff; background-color: #b4a078" class="qrsh" data-data="{{$v->id}}">确认收货</a><br>
						@elseif($v->status == 3)
							<a href="" style="width:90px;height: 28px;display: block;margin: -10px auto;line-height: 28px;border-radius: 4px;color:#fff; background-color: #b4a078" class="qpj" data-data="{{$v->id}}">去评价</a><br>
						@elseif($v->status == 4)
							<a style="width:90px;height: 28px;display: block;margin: -10px auto;line-height: 28px;border-radius: 4px;color:#fff; background-color: #b4a078">订单完成</a><br>
							<a href="" class="qpz" data-data="{{$v->id}}">追加评论</a><br>
						@elseif($v->status == 5)
						<a style="width:90px;height: 28px;display: block;margin: -10px auto;line-height: 28px;border-radius: 4px;color:#fff; background-color: #b4a078">订单完成</a><br>
						@endif
						<a class="xq" href="javascript:;" data-data="{{$v->id}}" style="color: #69c">查看详情</a><br>
					</td>

			  	</tr>
	 		  @endforeach
			</table>
		 </li>
 	 @else
		 <li style="display: block;">
		 	<div></div><p>还没有任何订单呢</p>
		 	<p><a href="">去挑选好物></a></p>
		 </li>
 	 @endif

 	<!-- 代付款 -->
 	@if($list222)
		 <li style="display: none;">
			<table class="tb1">
			 @foreach($list222 as $v)
				<tr style="background-color: #f5f5f5;height:43px;">
					<th colspan="4">下单时间：{{$v->created_at}}</th>
					<th colspan="90">订单号：{{$v->order_sn}}</th>

				</tr>
			  	<tr style="height:100px;">
			  		<td colspan="80" style="border-right:1px solid #f5f5f5;height:100px;">
						<img src="{{url('images/fk.png')}}" alt="" style="width:80px;margin-left:20px;float:left;">
					</td>
					<td style="width:200px;overflow: hidden;">
						<a href="javascript:;" class="spm">&nbsp;&nbsp;{{$v->phone}}(联系方式)</a>
					</td>
					<td style="width:110px;margin-left: 80px;">
						<span style=" color: #f33;">未付款</span>
					</td>
					<td colspan="10" style="text-align: center">
						<a href="{{url('paymentmethod',$v->id)}}" style="width:90px;height: 28px;display: block;cursor:pointer;margin: -10px auto;line-height: 28px;border-radius: 4px;color:#fff; background-color: #b4a078" class="qfk" data-data="{{$v->id}}">去付款</a><br>
						<a class="xq" href="javascript:;" data-data="{{$v->id}}" style="color: #69c">查看详情</a><br>
						<a href="{{url('cancel',$v->id)}}" onclick="javascript:return del()"" data-date="{{$v->id}}" data-date="{{$v->id}}" style="color: #69c">取消订单</a>
					</td>

			  	</tr>
	 		  @endforeach
			</table>
		 </li>
 	 @else
		 <li style="display:none;">
		 	<div></div><p>还没有任何订单呢</p>
		 	<p><a href="">去挑选好物></a></p>
		 </li>
 	 @endif

	<!-- 待发货 -->
	@if($list333)
		 <li style="display: none;">
			<table class="tb1">
			 @foreach($list333 as $v)
				<tr style="background-color: #f5f5f5;height:43px;">
					<th colspan="4">下单时间：{{$v->created_at}}</th>
					<th colspan="90">订单号：{{$v->order_sn}}</th>

				</tr>
			  	<tr style="height:100px;">
			  		<td colspan="80" style="border-right:1px solid #f5f5f5;height:100px;">
						<img src="{{url('images/fh.png')}}" alt="" style="width:80px;margin-left:20px;float:left;">
					</td>
					<td style="width:200px;overflow: hidden;">
						<a href="javascript:;" class="spm">&nbsp;&nbsp;{{$v->phone}}(联系方式)</a>
					</td>
					<td style="width:110px;margin-left: 80px;">
						<span style="color: #f33;">已付款,待发货</span>
					</td>
					<td colspan="10" style="text-align: center">
						<a href="" style="width:90px;height: 28px;display: block;cursor:pointer;margin: -10px auto;line-height: 28px;border-radius: 4px;color:#fff; background-color: #b4a078" class="tx">提醒商家发货</a><br>
						<a href="javascript:;" class="xq" data-data="{{$v->id}}" style="color: #69c">查看详情</a><br>
						<a href="{{url('cancel',$v->id)}}" onclick="javascript:return del()"" data-date="{{$v->id}}" data-date="{{$v->id}}" style="color: #69c">取消订单</a>
					</td>

			  	</tr>
	 		  @endforeach
			</table>
		 </li>
 	 @else
		 <li style="display: none;">
		 	<div></div><p>还没有任何订单呢</p>
		 	<p><a href="">去挑选好物></a></p>
		 </li>
 	 @endif

	 <!-- 已发货 -->
	 @if($list444)
		 <li style="display: none;">
			<table class="tb1">
			 @foreach($list444 as $v)
				<tr style="background-color: #f5f5f5;height:43px;">
					<th colspan="4">下单时间：{{$v->created_at}}</th>
					<th colspan="90">订单号：{{$v->order_sn}}</th>

				</tr>
			  	<tr style="height:100px;">
			  		<td colspan="80" style="border-right:1px solid #f5f5f5;height:100px;">
						<img src="{{url('images/sh.png')}}" alt="" style="width:80px;margin-left:20px;float:left;">
					</td>
					<td style="width:200px;overflow: hidden;">
						<a href="javascript:;" class="spm">&nbsp;&nbsp;{{$v->phone}}(联系方式)</a>
					</td>
					<td style="width:110px;margin-left: 80px;">
						<span style="color: #f33;">已发货,待确认收货</span>
					</td>
					<td colspan="10" style="text-align: center">
						<a style="width:90px;height: 28px;display: block;cursor:pointer;margin: -10px auto;line-height: 28px;border-radius: 4px;color:#fff; background-color: #b4a078" class="qrsh" data-data="{{$v->id}}">确认收货</a><br>
						<a href="javascript:;" class="xq" data-data="{{$v->id}}" style="color: #69c">查看详情</a><br>
						<a href="{{url('cancel',$v->id)}}" onclick="javascript:return del()" data-date="{{$v->id}}" style="color: #69c">取消订单</a>
					</td>

			  	</tr>
	 		  @endforeach
			</table>
		 </li>
 	 @else
		 <li style="display: none;">
		 	<div></div><p>还没有任何订单呢</p>
		 	<p><a href="">去挑选好物></a></p>
		 </li>
 	 @endif

	 <!-- 待评价 -->
	 @if($list555)
		 <li style="display: none;">
			<table class="tb1">
			 @foreach($list555 as $v)
				<tr style="background-color: #f5f5f5;height:43px;">
					<th colspan="4">下单时间：{{$v->created_at}}</th>
					<th colspan="90">订单号：{{$v->order_sn}}</th>

				</tr>
			  	<tr style="height:100px;">
			  		<td colspan="80" style="border-right:1px solid #f5f5f5;height:100px;">
						<img src="{{url('images/pj.png')}}" alt="" style="width:80px;margin-left:20px;float:left;">
					</td>
					<td style="width:200px;overflow: hidden;">
						<a href="javascript:;" class="spm">&nbsp;&nbsp;{{$v->phone}}(联系方式)</a>
					</td>
					<td style="width:110px;margin-left: 80px;">
						<span style="color: #f33;">已确认收获,待评价</span>
					</td>
					<td colspan="10" style="text-align: center">
						<a href="" style="width:90px;height: 28px;display: block;margin: -10px auto;line-height: 28px;border-radius: 4px;color:#fff; background-color: #b4a078" class="qpj" data-data="{{$v->id}}">去评价</a><br>
						<a href="javascript:;" class="xq" data-data="{{$v->id}}" style="color: #69c">查看详情</a><br>
					</td>

			  	</tr>
	 		  @endforeach
			</table>
		 </li>
 	 @else
		 <li style="display: none;">
		 	<div></div><p>还没有任何订单呢</p>
		 	<p><a href="">去挑选好物></a></p>
		 </li>
 	 @endif
 </ul>

 <!-- 去付款 -->
<div class="back">
	<div>
		<div>
			<input type="password" class="m1" autofocus="autofocus">
			<input type="password" class="m2">
			<input type="password" class="m3">
			<input type="password" class="m4">
			<input type="password" class="m5">
			<input type="password" class="m6" style="border:0;">
		</div>
		<span class="payts" style="margin-left: 100px;"></span><br>
		<a href="" class="shi" >支付</a>
		<button class="fou">取消</button>
	</div>
</div>
<!-- 确认收货 -->
<div class="back1">
	<div>
		<p>请输入密码</p>
		<div>
			<input type="password" class="m11" autofocus="autofocus">
		</div>
		<span class="payts1" style="margin-left: 100px;"></span><br><br/>
		<!-- <a href="" class="shi1" >确认</a> -->
		<form action="{{url('confirmreceipt')}}" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="id" value="" class="shid" style="color: #333;">
			<button class="shi1">确认</button>
		</form>
		<button class="fou1">取消</button>
	</div>
</div>

<!-- 去评价 -->
<div class="back2">
	<div>
		<form action="{{url('commodity')}}" method="post">
			<input type="hidden" name="id" value="" class="hiddenid" style="color: #333;">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<span>评价商品</span>
			<input type="text" name="text" style="margin-top: 20px;">
			<input type="submit" value="提交评论" class="tjpl" style=" width:100px;height:40px;border:0;margin-top:40px;margin-left: 80px;">
		</form>
		<button class="fou2">否</button>
	</div>
</div>


<!-- 去评价 -->
<div class="back3">
	<div>
		<form action="{{url('commodity-cm')}}" method="post">
			<input type="hidden" name="id" value="" class="hiddenids" style="color: #333;">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<span>评价商品</span>
			<input type="text" name="text" style="margin-top: 20px;">
			<input type="submit" value="提交评论" class="tjpl" style=" width:100px;height:40px;border:0;margin-top:40px;margin-left: 80px;">
		</form>
		<button class="fou3">否</button>
	</div>
</div>

<!-- 订单详情 -->
<div class="ibox-content" id="ibox-content">
	<div class="row row-lg">
		<div class="col-sm-">
			<div class="example-wrap">
				<div class="example">
					<div class="bootstrap-table">
						<div class="fixed-table-toolbar"></div>
						<div class="fixed-table-container" style="padding-bottom:0px;">
							<div class="fixed-table-body">
								<table class="table table-hover table-condensed table-string" data-toggle="table" data-classes="table table-condensed" data-striped="true" data-mobile-responsive="true">
									<thead>
										<tr>
											<th style="" data-field="2" tabindex="0">
												<div class="th-inner" style="text-align:center;">商品名称</div>
												<div class="fht-cell"></div>
											</th>
											<th style="" data-field="3" tabindex="0">
												<div class="th-inner" style="text-align:center;">缩略图</div>
												<div class="fht-cell"></div>
											</th>
											<th style="" data-field="5" tabindex="0">
												<div class="th-inner" style="text-align:center;">分类</div>
												<div class="fht-cell"></div>
											</th>
											<th style="" data-field="6" tabindex="0">
												<div class="th-inner" style="text-align:center;">规格</div>
												<div class="fht-cell"></div>
											</th>
											<th style="" data-field="6" tabindex="0">
												<div class="th-inner" style="text-align:center;">单价</div>
												<div class="fht-cell"></div>
											</th>
											<th style="" data-field="7" tabindex="0">
												<div class="th-inner" style="text-align:center;">数量</div>
												<div class="fht-cell"></div>
											</th>
											<th style="" data-field="7" tabindex="0">
												<div class="th-inner" style="text-align:center;">添加时间</div>
												<div class="fht-cell"></div>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr data-index="0">

										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="aaa"></div>
 <script>
        function del(){
            var msg = "您确定要删除吗?";
            if(confirm(msg)==true){
                return true;
            }else{
                return false;
            }
        }

 </script>
@endsection


