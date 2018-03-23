@extends('layouts.mylist')
@section('title', '修改登录密码')
@section('content')
<link rel="stylesheet" href="{{'css/mylist-ay-pn.css'}}">
<script type="text/javascript" src="{{'js/jquery.js'}}"></script>
<style>
	form{
		position: relative;
	}
	.tj{
		position: absolute;
		top: 73px;
		left:75px;
		width: 150px;
		height: 43px;
		border: 0;
		background: #a69370;
		color: #fff;
	}
	.ts{
		margin-left: 50px;
	}
	.wy-ay-pn2 > div:nth-child(4) input:nth-child(2){
		width: 300px;
		height: 43px;
		margin-left: 0;
		background: #fff;
		color: #333;
	}
</style>
<script>
	$(function(){
		$('.tj').click(function(){
			var mm = $('.mm').val();
			var xmm = $('.xmm').val();
			if(mm && xmm){
				if(mm != xmm){
					$('.ts').html('两次密码输入不一致').css('color','red');
					return false;
				}else{
					var pattern = /^[\w_-]{6,16}$/;
					if(!pattern.test(mm)){
						$('.ts').html('密码至少6-16位').css('color','red');
						return false;
					}else{

					}
				}
			}else{
				$('.ts').html('密码不能为空').css('color','red');
				return false;
			}
		})
	})
</script>
<!-- 内容部分 -->
<div class="wy-ay-pn2">
	<p>修改支付密码</p>
	<div>
		<div>&nbsp;&nbsp;&nbsp;1</div>
		<div style="text-align: center;">2</div>
		<div style="text-align: center;">3</div><br>
		<span>身份验证</span>
		<span>输入新的支付密码</span>
		<span>完成</span>
	</div>
	<div><input type="password" placeholder="&nbsp;&nbsp;&nbsp;请输入密码" class="mm"></div>
	<div>
		<form action="{{url('/modifypay2')}}" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="password" placeholder="&nbsp;&nbsp;&nbsp;请确认密码" class="xmm" name="password">
			<input type="submit" value="提交" class="tj" style="width:150px;">
		</form>
	</div>
	<span class="ts"></span>
	<div style="display: none;">
		<a></a>
	</div>
	<div class="wy-ay-foot">
		<div class="title">温馨提醒</div>
		<p>• 为保障您的帐号安全，变更重要信息需要身份验证</p>
		<p>• 若有疑问请联系在线客服或拨打400-0368-163（9:00-22:00）</p>
	</div>
</div>
@endsection
