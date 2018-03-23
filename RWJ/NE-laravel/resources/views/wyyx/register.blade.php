<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>网易账号中心</title>
	<link rel="stylesheet" href="{{'../css/register.css'}}">
	<script type="text/javascript" src="{{'../js/jquery.js'}}"></script>
	<script>
		$(function(){
			var a="";
			var b="";
			var c="";
			var d="";
			var e="";
			var f="";
			//账号验证--当鼠标获取焦点时
			$('.ip1').focus(function(){
				var name = $('.ip1').val();
				//判断
				if(name == ""){
					$('.zhcw').html('请输入手机号或者邮箱账号').css("color","green");
				}
				//失去焦点时
			}).blur(function(){
				//传到后台去查询该昵称是否存在
				var url =  "{{url('register/index')}}";
				var name = $('.ip1').val();
				if(name){
					$.get(url,{ name : name },function(data){
						if (data === 'null'){
						    $('.zhcw').html('账号可以使用').css("color","green");
						    a = 1;
						}else if(data === '1'){
							$('.zhcw').html('请输入手机号或者邮箱账号').css("color","red");
						}else{
							$('.zhcw').html('账号已存在').css("color","red");
						}
					});
				}else{
					$('.zhcw').html('请输入手机号或者邮箱账号').css("color","red");
				}
			});

			//密码验证
			//第一次验证
			var $sign = "";
			$('.ip2').focus(function(){
				var name = $('.ip2').val();
				if(name == ""){
					$('.mmcw').html('请输入密码').css("color","green");
				}
			}).blur(function(){
				var pattern = /^[\w_-]{6,16}$/;
				var name = $('.ip2').val();
				if(name){
				 	if(!pattern.test(name)){
				 		$('.mmcw').html('请输入6-16位密码').css("color","red");
				 	}else{
				 		$('.mmcw').html('密码可以使用').css("color","green");
				 		$sign = 1;
				 		b = 1;
				 	}
				 }else{
				 	$('.mmcw').html('请输入密码').css("color","red");
				 }

			})
			//第二次验证
			$('.ip3').focus(function(){
				var name = $('.ip3').val();
				if(name == "" || name === ""){
					$('.zcsr').html('请确认密码').css('color','green');
				}
			}).blur(function(){
				var name1 = $('.ip2').val();
				var name2 = $('.ip3').val();
				if(name1 != name2){
					$('.zcsr').html('两次密码输入不一致').css('color','red');
				}else{
					if($sign == 1){
						$('.zcsr').html('密码确认成功').css('color','green');
						c = 1;
					}else{
						$('.mmcw').html('请先输入密码').css('color','red');
						$('.zcsr').html('');
					}
				}
			})



			//验证图片验证码
			$('.ip4').focus(function(){
				var captcha = $('.ip4').val();
				if(captcha == ''){
					$('.tpyzm').html('请输入验证码').css('color','green');
				}
				// alert('11');
			}).blur(function(){
				var captcha = $('.ip4').val();
				if(captcha){
					var url =  "{{url('register/tpyzm')}}";
					$.get(url,{ captcha : captcha },function(data){
						if(data == '1'){
							$('.tpyzm').html('验证码正确').css('color','green');
							d = 1;
						}else{
							$('.tpyzm').html('验证码错误').css('color','red');
						}
					});
				}else{
					$('.tpyzm').html('请输入验证码').css('color','red');
				}
			})



			//手机号码验证
			$('.ip5').focus(function(){
				var name = $('.ip1').val();
				var pattern = /^1[34578]\d{9}$/;
				if(pattern.test(name)){
					$('.ip5').val(name);
					$('.sjyzm').html('手机号码输入正确').css('color','green');
				}else{
					$('.sjyzm').html('请输入手机号码').css('color','green');
				}
			}).blur(function(){
				var url =  "{{url('register/number')}}";
				var number = $('.ip5').val();
				if(number){
					var pattern = /^1[34578]\d{9}$/;
					if(pattern.test(number)){
						var url =  "{{url('register/number')}}";
						$.get(url,{ number : number },function(data){
							if (data === 'null'){
							    $('.sjyzm').html('手机号码可以使用').css("color","green");
							    e = 1;

							}else{
								$('.sjyzm').html('手机号码已存在').css("color","red");
							}
						});
					}else{
						$('.sjyzm').html('手机号输入错误').css("color","red");
					}
				 }else{
				 	$('.sjyzm').html('请输入手机号码').css("color","red");
				 }
			})


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
				var sms = $('.ip5').val();
				$.get(url,{ sms : sms },function(data){
					if(data.Message = "OK"){
						$('.sjyzm').html('验证码发送成功').css("color","green");
					}else{
						$('.sjyzm').html('验证码发送失败').css("color","red");
					}
				});
				return false;
			})

			//判断验证码是否正确
			$('.ip6').focus(function(){
				$('.yzyzm').html('请输入验证码').css('color','green');
			}).blur(function(){

			})

			// 判断填写信息状态
			$('.ip8').mouseover(function(){
					var name = $('.ip1').val();
					var mima = $('.ip2').val();
					var rmima = $('.ip3').val();
					var captcha = $('.ip4').val();
					var sjh = $('.ip5').val();
					var sjyzm = $('.ip6').val();
					var qrmm = $('.ip6').val();
				if(qrmm){
						var url =  "{{url('register/yzm')}}";
						$.get(url,{ qrmm : qrmm },function(data){
							if(data === '1'){
								$('.yzyzm').html('验证码正确').css('color','green');
								f = 1;
							}else{
								$('.yzyzm').html('验证码错误').css('color','red');
							}
						});
				}else{
					$('.yzyzm').html('请输入验证码').css('color','red');
				}
			}).click(function(){
				if(a === 1 && b === 1 && c === 1 && d === 1 && e === 1 && f === 1){

				}else{
					return false;
				}

			})

		});
	</script>
</head>
<body>
	<!-- 头部 -->
	<div class="g-hd">
		<div class="g-hd-c">
			<div class="lg"></div>
			<div class="login">
				已有账号?去<a href="{{url('wyyx/login')}}">登录</a>
			</div>
		</div>
	</div>
	<!-- 中部注册 -->
	<div class="g-bd">
		<div class="g-bd-c">
			<div class="g-bd-c-t">
				<div>普通帐号注册</div>
			</div>
			<div class="g-bd-c-c">
				<div>
					<form method="post" action="{{url('register/register')}}">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;账号 :	<input type="text" placeholder=" &nbsp;&nbsp;手机号/其他邮箱" class="ip1" name="name" value="">
						<span class="zhcw"></span>
						<br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;密码: <input type="password" placeholder=" &nbsp;&nbsp;6-16位密码,区分大小写" class="ip2" name="password">
						<span class="mmcw"></span>
						<br>
						&nbsp;&nbsp;&nbsp;&nbsp;确认密码: <input type="password" placeholder=" &nbsp;&nbsp;再次输入密码" class="ip3" name="password_confirmation">
						<span class="zcsr"></span>
						<br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;验证码: <input type="text" placeholder=" &nbsp;&nbsp;验证码" class="ip4" name="captcha" >
						<img src="{{captcha_src()}}" onclick="this.src='{{captcha_src()}}?'+Math.random();" alt="" class="img1">
						<span class="tpyzm"></span>
						<br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;手机号: <input type="text" placeholder=" &nbsp;&nbsp;11位手机号" class="ip5" name="tel">
						<span class="sjyzm"></span>
						<br>
						<span class="text-pd">忘记密码时,可通过手机快速找回密码</span><br>
						<span class="text-vc">短信验证码: </span><input type="text" placeholder=" &nbsp;&nbsp;输入短信验证码" class="ip6">
						<span class="yzyzm"></span>
						<input type="button" class="ip7" value="获取验证码"><br>
						<input type="submit" value="注册" class='ip8'><br>
						<input type="checkbox" class="ip9" checked="checked" ><span class="text-ck">用户勾选即代表同意《<a href="">服务条款</a>》和《<a href="">网络游戏用户隐私保护和个人信息利用政策</a>》</span>
					</form>
				</div>
			</div>
			<div class="g-bd-c-b">
				<img src="{{'../images/reg2Fapp_xc_small_170402.png'}}" alt="">
			</div>
		</div>
	</div>
	<!-- 底部 -->
	<div class="g-ft">
		<div class="g-ft-c">
			<p>
				<a href="">About NetEase </a>
				 -
				<a href=""> 公司简介 </a>
				 -
				<a href=""> 联系方式 </a>
				 -
				<a href=""> OAuth2.0认证 </a>
				 -
				<a href=""> 招聘信息 </a>
				 -
				<a href=""> 客户服务 </a>
				 -
				<a href=""> 相关法律 </a>
				 -
				<a href=""> 网络营销</a>
			</p>
			<p>网易公司版权所有 ©1997-2017</p>
		</div>
	</div>
</body>
</html>