@extends('layouts.mylist')
@section('title', '修改登录密码')
@section('content')
<link rel="stylesheet" href="{{'css/mylist-ay-pn.css'}}">
<script type="text/javascript" src="{{'js/jquery.js'}}"></script>
<style>
	.ts{
		width: 200px;
		height: 20px;
		/*border: 1px solid red;*/
	}
</style>
<script>
	$(function(){

			//验证码输入是否正确
			var a = ""; 
			$('.xyb').mouseover(function(){
				var pay = $('.qrmm').val();
				var url =  "{{url('yzpay')}}";
				$.get(url,{ pay : pay },function(data){
					if(data == '1'){
						$('.xyb').css('background','rgb(192, 174, 138)');
						$('.ts').html('');
						a = 1;
					}else{
						$('.ts').html('支付密码错误').css('color','red');
					}
				});
			}).click(function(){
				if(a == 1){

				}else{
					return false;
				}
			})
	})
</script>
<!-- 内容部分 -->
<div class="wy-ay-pn1">
	<p>修改支付密码</p>
	<div>
		<div>&nbsp;&nbsp;&nbsp;1</div>
		<div style="text-align: center;">2</div>
		<div style="text-align: center;">3</div><br>
		<span>身份验证</span>
		<span>输入新的支付密码</span>
		<span>完成</span>
	</div>
	@foreach($info as $v)
	<div><span>已绑定的手机&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="phone">{{$v->phone}}</span></div>
	@endforeach
	<div>
		<input type="password" placeholder="&nbsp;&nbsp;&nbsp;请输入原支付密码" class="qrmm">
		<!-- <input type="submit" value="获取验证码" class="ip7"> -->
		<p class="ts"></p>
	</div>
		
	<div>
		<a href="{{url('/modifypay1')}}" class="xyb">下一步</a>
	</div>
	<div class="wy-ay-foot">
		<div class="title">温馨提醒</div>
		<p>• 为保障您的帐号安全，变更重要信息需要身份验证</p>
		<p>• 若有疑问请联系在线客服或拨打400-0368-163（9:00-22:00）</p>
	</div>
</div>
@endsection

