@extends('layouts.mylist')
@section('title', '消息中心 - 网易严选')
@section('content')
<link rel="stylesheet" href="{{'/css/mylist-news.css'}}">
<script type="text/javascript" src="{{'/js/jquery.js'}}"></script>
<script>
	 $(function(){
		 $('.tab').find('li').click(function(){
			 var index = $(this).index();
			 $(this).addClass('active').siblings().removeClass('active');
			 $('.content').find('li').eq(index).show().siblings().hide();
		 })
	 })
</script>
<!-- 右侧内容 -->
 <ul class="tab">
	 <li class="active">严选活动</li>
	 <li>我的资产</li>
	 <li>通知消息</li>
	 <li>物流助手</li>
	 <li>互动消息</li>
 </ul>
 <ul class="content">
	 <li style="display: block;">
		<div></div><p>当前无此类消息</p>
	 </li>
	 <li>
		<div></div><p>当前无此类消息</p>
	 </li>
	 <li>
		<div></div><p>当前无此类消息</p>
	 </li>
	 <li>
		<div></div><p>当前无此类消息</p>
	 </li>
	 <li>
		<div></div><p>当前无此类消息</p>
	 </li>
 </ul>
@endsection

