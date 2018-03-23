@extends('layouts.mylist')
@section('title', '账号安全')
@section('content')
<link rel="stylesheet" href="{{'css/mylist-ay.css'}}">
<style>
/*	.wy-ay {
	    width: 140px;
	    height: 33px;
	    border: 0 ;
	}*/
	label{
		margin-bottom: 0;
	}
</style>
<script type="text/javascript" src="{{'js/jquery.js'}}"></script>

<!-- 内容部分 -->
<div class="wy-ay">
@foreach($info as $v)
	<div>
		<label for="">您当前的账号</label>
		<span>{{$v->name}}</span>
	</div>
	<div>
		<label for=""><i></i>登录密码</label>
		<span>建议您定期更换密码，设置安全性高的密码可以使帐号更安全</span>
		<a href="{{url('/modify')}}">修改</a>
	</div>
	<div>
		<label for=""><i></i>绑定手机</label>
		@if($v->phone)
		<span>绑定手机：<span style="margin-left:0;">{{$v->phone}}</span>，若手机丢失或停用，请及时更换</span>
<!-- 		绑定手机号码，如果绑定或者用手机号码注册就显示更换手机
		如果没有绑定就显示绑定手机号码 -->
		<a href="{{url('/replace')}}">更换</a>
		@else
		<span>绑定手机若手机丢失或停用，请及时更换</span>
<!-- 		绑定手机号码，如果绑定或者用手机号码注册就显示更换手机
		如果没有绑定就显示绑定手机号码 -->
		<a href="{{url('pn1')}}">绑定手机号码</a>
		@endif;
	</div>
	<div>
		@if($v->payment)
			<label for=""><i style="background-position: 0 -5897px;"></i>支付密码</label>
			<span>建议您定期更换密码，可以使帐号更安全</span>
			<a href="{{url('payupdate')}}">&nbsp;&nbsp;忘记密码</a><a href="{{url('modifypay')}}">修改&nbsp;&nbsp;</a>
		@else
			<label for="" ><i></i>支付密码</label>
			<span>支付密码启用后，将作为您帐号资产使用时的身份证明</span>
			<a href="{{url('setup')}}">立即设置</a>
		@endif
	</div>
	<div style="margin-left: 20px;margin-bottom: 10px;height:90px;">
		<div class="title">安全服务提示</div>
		<p>• 确认您登录的是网易严选网址,注意防范进入钓鱼网站，不要轻信各种即时通讯工具发送的商品或支付链接，谨防网购诈骗</p>
		<p>• 建议您安装杀毒软件，并定期更新操作系统等软件补丁，确保帐号及交易安全</p>
	</div>
@endforeach
</div>
@endsection

