@extends('layouts.mylist')
@section('title', '账号安全 - 网易严选')
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
	}
	.ts{
		width: 200px;
		height: 20px;
		float:left;
		margin-left: 90px;
		margin-top: -90px;
	}
	.wy-ay-pn2 > div:nth-child(4) input:nth-child(2){
		width: 300px;
		height: 43px;
		margin-left: 0;
		background: #fff;
		outline: none;
		color: #333;
	}
	.wy-ay-pn2 > div:nth-child(4) input:nth-child(3){
		width: 200px;
		height: 43px;
   	 	line-height: 43px;
    	font-size: 14px;
    	color: #333;
    	margin-top: 10px;
    	outline: none;
    	border: 1px solid #ccc;
    	background: #fff;
	}
	.wy-ay-pn2 > div:nth-child(4) input:nth-child(4){
		width: 90px;
		height: 43px;
		border: 0;
		background: #b4a078;
		margin-left: 210px;
		margin-top: -45px;
		color: #fff;
	}
	.wy-ay-pn2 > div:nth-child(4) input:last-child{
		width: 144px;
		height: 42px;
		border: 0;
		margin-left: 80px;
		margin-top: 30px;
	}
	.yzmcw{
		width: 200px;
		height: 20px;
		/*border: 1px solid red;*/
		float: left;
		margin-left: -220px;
	}
</style>
<script>
	$(function(){
		//手机号验证
		var b = "";
		$('.sjh').blur(function(){
			var url =  "{{url('register/index')}}";
			var name = $('.sjh').val();
			if(name){
				$.get(url,{ name : name },function(data){
					if (data === 'null'){
					    $('.ts').html('输入正确').css("color","green");
					    b = 1;
					}else if(data === '1'){
						$('.ts').html('请输入手机号或者邮箱账号').css("color","red");
					}else{
						$('.ts').html('账号已存在').css("color","red");
					}
				});
			}else{
				$('.ts').html('请输入手机号或者邮箱账号').css("color","red");
			}
		});
		

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
			$('.fs').click(function(){
				time(this);
				var url =  "{{url('register/sms')}}";
				var sms = $('.sjh').val();
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
				var qrmm = $('.yzm').val();
				var url =  "{{url('register/yzm')}}";
				$.get(url,{ qrmm : qrmm },function(data){
					if(data == '1'){
						$('.xyb').css('background','rgb(192, 174, 138)');
						$('.yzmcw').html('');
						a = 1;
					}else{
						$('.yzmcw').html('验证码错误').css('color','red');
					}
				});
			}).click(function(){
				if(a == 1 && b == 1){

				}else{
					return false;
				}
			})
	})
</script>
<!-- 内容部分 -->
<div class="wy-ay-pn2">
	<p>修改绑定手机</p>
	<div>
		<div>&nbsp;&nbsp;&nbsp;1</div>
		<div style="text-align: center;">2</div>
		<div style="text-align: center;">3</div><br>
		<span>身份验证</span>
		<span>输入新手机</span>
		<span>完成</span>
	</div>
	<div style="display: none;"><input type="text" placeholder="&nbsp;&nbsp;&nbsp;请输入手机号" class=""></div>
	<div>
		<form action="{{url('/replace2')}}" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}"> 
			<input type="text" placeholder="&nbsp;&nbsp;&nbsp;请输入手机号" class="sjh" name="phone">
			<input type="text" placeholder="&nbsp;&nbsp;&nbsp;请输入验证码" class="yzm">
			<input type="submit" value="发送验证码" class="fs">
			<input type="submit" value="提交" class="xyb">
		</form>
	</div>
	<span class="ts"></span>
	<span class="yzmcw"></span>
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
