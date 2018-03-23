@extends('layouts.mylist')
@section('title', '账号安全 - 网易严选')
@section('content')
<link rel="stylesheet" href="{{'css/mylist-ay-pn.css'}}">
<script type="text/javascript" src="{{'js/jquery.js'}}"></script>
<!-- 内容部分 -->
<div class="wy-ay-pn3">
	<p>找回支付密码</p>
	<div>
		<div>&nbsp;&nbsp;&nbsp;1</div>
		<div style="text-align: center;">2</div>
		<div style="text-align: center;">3</div><br>
		<span>身份验证</span>
		<span>输入新的支付密码</span>
		<span>完成</span>
	</div>
	<div>
		<img src="{{url('images/2345截图20171024215908.jpg')}}" alt="">
		<span>恭喜你找回支付密码成功</span>
		<a style="text-decoration:none;float:left;margin-left:30px;margin-top:10px;font-size:16px;color:#b3a07a;" href="{{url('/ay')}}">返回</a>
	</div>
	<div class="wy-ay-foot">
		<div class="title">温馨提醒</div>
		<p>• 为保障您的帐号安全，变更重要信息需要身份验证</p>
		<p>• 若有疑问请联系在线客服或拨打400-0368-163（9:00-22:00）</p>
	</div>
</div>
@endsection
