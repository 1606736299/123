@extends('layouts.mylist')
@section('title', '我的收藏 - 网易严选')
@section('content')
<link rel="stylesheet" href="{{'/css/mylist-ft.css'}}">
<script type="text/javascript" src="{{'/js/jquery.js'}}"></script>
<script>
	$(function(){
		$(".fs_del").click(function(){
			var id = $(this).attr("data-reactid");
			var li = $(this).parents("li");
			var username = $('#hide_username').val();
			$.ajax({
				url: '/fs/del',
				type: "post",
				data: {'id':id, 'username':username, '_token': '{{csrf_token()}}'},
				success: function(data){
					console.log(data);
					if(data == 'yes'){
						li.remove();
					}
				}
			})
		})
		$(".all_del").click(function(){
			var username = $('#hide_username').val();
			$.ajax({
				url: '/fs/all_del',
				type: "post",
				data: {'username':username, '_token': '{{csrf_token()}}'},
				success: function(data){
					if(data == 'yes'){
						$(".ul_list > li").remove();
					}
				}
			})
		})
	})

</script>
<!-- 内容部分 -->
<div class="wy-ft">
	<div>
		<span>我的足迹</span>
		<i></i>
		<span><a href="javascript:;" class="all_del">全部删除</a></span>
	</div>
	<!-- <div>
		<span>今天</span>
		<span>2017.10.24</span>
		<div></div>
	</div> -->
	<ul class="ul_list">
	@if($str1 != null)
	@foreach($list333 as $l3)
		<li>
			<div style="width: 193px;">
				<a href="{{url('wyyx/details',$l3->id)}}"><img src="{{url($l3->goods_img1)}}" alt="" style="width:100%;"></a>
			</div>
			<span><a href="{{url('wyyx/details',$l3->id)}}">{{$l3->name}}</a></span>
			<span>￥{{$l3->price}}.00</span>
			<div class="fs_del" data-reactid="{{$l3->id}}" style="cursor:pointer;"></div>
			<!-- <a href="">找相似</a> -->
		</li>
	@endforeach
	@else
		<div style="color:red;"><p>您的收藏夹为空!</p></div>
	@endif
<!-- 		<li>
			<div><img src="{{url('images/9ca9e9156647b1c7ab758b8a91d81ffd.png')}}" alt=""></div>
			<span><a href="">黑凤梨 便携手持风扇</a></span>
			<span>¥99.00</span>
			<div></div>
			<a href="">找相似</a>
		</li>
		<li>
			<div><img src="{{url('images/9ca9e9156647b1c7ab758b8a91d81ffd.png')}}" alt=""></div>
			<span><a href="">黑凤梨 便携手持风扇</a></span>
			<span>¥99.00</span>
			<div></div>
			<a href="">找相似</a>
		</li>
		<li>
			<div><img src="{{url('images/9ca9e9156647b1c7ab758b8a91d81ffd.png')}}" alt=""></div>
			<span><a href="">黑凤梨 便携手持风扇</a></span>
			<span>¥99.00</span>
			<div></div>
			<a href="">找相似</a>
		</li>
		<li>
			<div><img src="{{url('images/9ca9e9156647b1c7ab758b8a91d81ffd.png')}}" alt=""></div>
			<span><a href="">黑凤梨 便携手持风扇</a></span>
			<span>¥99.00</span>
			<div></div>
			<a href="">找相似</a>
		</li>
		<li>
			<div><img src="{{url('images/9ca9e9156647b1c7ab758b8a91d81ffd.png')}}" alt=""></div>
			<span><a href="">黑凤梨 便携手持风扇</a></span>
			<span>¥99.00</span>
			<div></div>
			<a href="">找相似</a>
		</li> -->
	</ul>
</div>
@endsection

