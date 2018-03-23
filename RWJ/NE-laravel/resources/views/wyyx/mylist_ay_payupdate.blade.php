@extends('layouts.mylist')
@section('title', '账号安全 - 网易严选')
@section('content')
<link rel="stylesheet" href="{{'css/mylist-ay-pn.css'}}">
<script type="text/javascript" src="{{'js/jquery.js'}}"></script>
<script>
	$(function(){
			//倒计时
			var wait=60;
			function time(o) {
			  if (wait == 0) {
			   o.removeAttribute("disabled");   
			   o.value="重新获取";
			   wait = 60;
			  } else { 
			 
			   o.setAttribute("disabled", true);
			   o.value="重新发送(" + wait + ")";
			   wait--;
			   setTimeout(function() {
			    time(o)
			   },
			   1000)
			  }
			 }


			//发送验证码
			$('.ip7').click(function(){
				time(this);
				var url =  "{{url('register/sms')}}";
				var sms = $('.phone').html();
				$.get(url,{ sms : sms },function(data){
					if(data.Message = "OK"){
						alert('验证码发送成功');
					}else{
						alert('验证码发送失败');
					}
				});
				return false;
			})

			//验证码输入是否正确
			var a = ""; 
			$('.xyb').mouseover(function(){
				var qrmm = $('.qrmm').val();
				var url =  "{{url('register/yzm')}}";
				$.get(url,{ qrmm : qrmm },function(data){
					if(data == '1'){
						$('.xyb').css('background','rgb(192, 174, 138)');
						$('.ts').html('');
						a = 1;
					}else{
						$('.ts').html('验证码错误').css('color','red');
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
	<p>找回支付密码</p>
	<div>
		<div>&nbsp;&nbsp;&nbsp;1</div>
		<div style="text-align: center;">2</div>
		<div style="text-align: center;">3</div><br>
		<span>身份验证</span>
		<span>输入新的支付密码</span>
		<span>完成</span>
	</div>
	@foreach($info as $v)
	<div><span>已绑定的手机</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="phone">{{$v->phone}}</span></div>
	@endforeach
	<div>
		<input type="text" placeholder="&nbsp;&nbsp;&nbsp;请输入验证码" class="qrmm">
		<input style="width:98px;" type="submit" value="获取验证码" class="ip7">
		<p class="ts"></p>
	</div>
		
	<div>
		<a href="{{url('/payupdate1')}}" class="xyb">下一步</a>
	</div>
	<div class="wy-ay-foot">
		<div class="title">温馨提醒</div>
		<p>• 为保障您的帐号安全，变更重要信息需要身份验证</p>
		<p>• 若有疑问请联系在线客服或拨打400-0368-163（9:00-22:00）</p>
	</div>
</div>
@endsection

