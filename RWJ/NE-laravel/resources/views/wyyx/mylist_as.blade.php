@extends('layouts.mylist')
@section('title', '地址管理 - 网易严选')
@section('content')
<script type="text/javascript" src="{{asset('/js/jquery.js')}}"></script>
<link rel="stylesheet" href="{{asset('/css/mylist-as.css')}}">
<!-- <link rel="stylesheet" href="{{'css/mylist-as-da.css'}}"> -->

<link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
<script src="{{asset('/js/jquery.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>

<style>
	.as-da-text a{
		font-size: 14px;
	    color: #69c;
	    float: right;
	}
	.yx-bd-c-r{
		position: relative;
		height: 750px;
	}
	.pagination{
		height: 20px;
		position: absolute;
		bottom: 100px;
		left: 360px;
	}
	.pagination li{
		float: left;
		margin: 0 auto;
		width: 20px;
		height: 20px;
		color: red;
	}
</style>
<script>
	$(function(){
		$('.add').click(function(){
			if($('.count').html() <= 0){
				alert('地址最多10条')
				return false;
			}
			$('.aa').css('display','block');
			$('.as-content1').removeClass('wy-yc');
			$(".as-content1 form").attr("action","{{'/nd'}}");
			$("input[name='detailed']").val("");
			$("input[name='consignee']").val("");
			$("input[name='phone']").val("");
		})
		$('.wy-xs').click(function(){
			$('.as-content1').addClass('wy-yc');
			$('.aa').css('display','none');

		})
		$('.wy-qx').click(function(){
			$('.as-content1').addClass('wy-yc');
			$('.aa').css('display','none');
			return false;
		})
		$('.asedit').click(function(){
			$('.aa').css('display','block');
			$('.as-content1').removeClass('wy-yc');
			var id = $(this).attr('data-reactid');
			var url =  "{{url('/asedit')}}";
			$.get(url,{id:id},function(data){
				console.log(data);
				$(".as-content1 form").attr("action","{{'/asupdate'}}");
				$("input[name='detailed']").val(data.detailed);
				$("input[name='consignee']").val(data.consignee);
				$("input[name='phone']").val(data.phone);
				$("input[name='id']").val(id);

				if(data.whether){
					$("input[name='checkbox']").attr('checked','checked');
				}else{
					$("input[name='checkbox']").removeAttr('checked');

				}

			})
		})

	})
</script>
<!-- 内容部分 -->
<div class="aa"></div>
<div class="yx-bd-c-r">
	@if($info111)
	<p class="as-da-text">
		<span>已保存收货地址(地址最多10条，还能保存<span class="count">{{10-$count}}</span>条)</span>
		<a class="add" style="cursor:pointer;">+新建地址</a>
	</p>
	<table class='table'>
		<thead>
			<tr>
				<th style="padding-left:5px;">收货人</th>
				<th>地址</th>
				<th>联系方式</th>
				<th>操作</th>
				<th>默认地址</th>
			</tr>
		</thead>
		<tbody>
	@foreach ($info111 as $v)
			<tr>
				<td>{{$v->consignee}}</td>
				<td>{{$v->province}}{{$v->city}}{{$v->county}}{{$v->detailed}}</td>
				<td class="phone">{{$v->phone}}</td>
				<td><a class="asedit" style="cursor:pointer;" data-reactid="{{$v->id}}" >编辑&nbsp;&nbsp;</a><a href="{{url('/asdel',$v->id)}}" onclick="javascript:return del()" style="cursor:pointer;">&nbsp;&nbsp;删除</a></td>
				@if($v->whether == 'on')
					<td>默认地址</td>
				@else
					<td><a href="{{url('/setadd',$v->id)}}" style="cursor:pointer;">设为默认地址</a></td>
				@endif

			</tr>
	@endforeach
	{!! $info111->render() !!}
		</tbody>
	</table>
	@else
		<!-- 没有收货地址时 -->
		<div class="as-content">
			<div></div>
			<p>您还没有收货地址</p>
			<p><a class="add" style="cursor:pointer;">+新建地址</a></p>
		</div>
	@endif


	<div class="as-content1 wy-yc">
		<div class="as-content1-1">
			<p>新建地址</p>
			<p class="wy-xs"></p>
			<form action="{{'/nd'}}" enctype="post">
				<div>
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<input type="hidden" name="id" value="">
					<span>所在地区:</span>
					<select id="s_province" name="s_province"></select>
					<select id="s_city" name="s_city" ></select>
					<select id="s_county" name="s_county"></select>
					<script class="resources library" src="{{asset('/js/area.js')}}" type="text/javascript"></script>
					<script type="text/javascript">_init_area();</script>
					<script type="text/javascript">
					  var Gid  = document.getElementById ;
					  var showArea = function(){
					  	Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" +
					  	Gid('s_city').value + " - 县/区" +
					  	Gid('s_county').value + "</h3>"
					  							}
					    Gid('s_county').setAttribute('onchange','showArea()');
					</script>
				</div>
				<div>
					<span>详细地址:</span>
					<input type="text" placeholder="详细地址,街道,门牌号等" name="detailed" class="detailed">
				</div>
				<div>
					<span>收货人:</span>
					<input type="text" name="consignee" class="consignee">
					<span>手机号码:</span>
					<input type="text" name="phone" class="phone">
				</div>
				<div>
					<input type="checkbox" name="checkbox" class="checkbox" checked="checked">
					<span>设为默认</span>
					<button>确定</button>
					<button class="wy-qx">取消</button>
				</div>
			</form>
		</div>
	</div>


</div>
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
