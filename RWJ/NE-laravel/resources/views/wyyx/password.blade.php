<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>网易账号中心</title>
	<link rel="stylesheet" href="{{'../css/password.css'}}">
	<script type="text/javascript" src="{{'../js/jquery.js'}}"></script>
	<link href="{{'../css/bootstrap.min.css'}}" rel="stylesheet">
	<script src="{{'../js/jquery.min.js'}}"></script>
	<script src="{{'../js/bootstrap.min.js'}}"></script>

	<script>
			$(function(){
				//获取焦点时
				$('.zh').focus(function(){
					var zh = $('.zh').val();
					if(zh == ""){
						$('.zhangh').html('请输入要找回的账号').css('color','red');
					}
				}).blur(function(){
					var url =  "{{url('register/index')}}";
					var zh = $('.zh').val();
					if(zh){
						$.get(url,{ name : zh },function(data){
						// alert('11');

							if (data === 'null'){
							    $('.zhangh').html('账号不存在').css("color","red");
							}else if(data === '1'){
								$('.zhangh').html('请输入手机号或者邮箱账号').css("color","red");
							}else{
								$('.zhangh').html('账号填写成功').css("color","green");
							}
						});
					}else{
						$('.zhangh').html('请输入手机号或者邮箱账号').css("color","red");
					}
				});

				$('.sj').focus(function(){
					var name = $('.zh').val();
					var pattern = /^1[34578]\d{9}$/;
					if(pattern.test(name)){
						$('.sj').val(name);
						$('.mim').html('手机号码输入正确').css('color','green');
					}else{
						$('.mim').html('请输入手机号码').css('color','green');
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
				$('.hq').mouseover(function(){
					var number = $('.sj').val();//手机号
					var zh = $('.zh').val();//账号
					if(number){
						var pattern = /^1[34578]\d{9}$/;
						if(pattern.test(number)){
							var url =  "{{url('wyyx/zhsjyz')}}";
							//传递到后台
							$.get(url,{number:number,zh:zh},function(data){
								if(data == '1'){
									$('.mim').html('手机号输入正确').css("color","green");
								}else{
									$('.mim').html('账号与手机号码不符').css("color","red");

								}
							});
						}else{
							$('.mim').html('手机号输入错误').css("color","red");
						}
					 }else{
					 	$('.mim').html('请输入手机号码').css("color","red");
					 }
				}).click(function(){
					time(this);
					var url =  "{{url('register/sms')}}";
					var sms = $('.sj').val();
					if(sms){
						$.get(url,{ sms : sms },function(data){
							if(data.Message = "OK"){
								$('.fsyzm').html('验证码发送成功').css("color","green");
							}else{
								$('.fsyzm').html('验证码发送失败').css("color","red");
							}
						});
					}else{
						$('.fsyzm').html('请输入手机号码').css("color","red");
					}


					return false;
				})

				//判断手机短信验证码是否正确
				$('.yzm').focus(function(){
					if($('.fsyzm').html() == '验证码发送成功'){
						$('.fsyzm').html('请输入验证码').css("color","green");
					}else{
						$('.fsyzm').html('请获取验证码').css("color","red");
					}
				}).blur(function(){

				})


				$('.xyb').mouseover(function(){
					var qrmm = $('.yzm').val();
					if(qrmm){
							var url =  "{{url('register/yzm')}}";
							$.get(url,{ qrmm : qrmm },function(data){
								if(data === '1'){
									$('.fsyzm').html('验证码正确').css('color','green');
								}else{
									$('.fsyzm').html('验证码错误').css('color','red');
								}
							});
					}else{
						$('.fsyzm').html('请输入验证码').css('color','red');
					}
				}).click(function(){
					if($('.fsyzm').html() == '验证码正确'){
						var zh = $('.zh').val();
						var sj = $('.sj').val();
						if(zh && sj){
							if($('.zhangh').html() != '账号填写成功' && $('.mim').html() != '手机号输入正确' && $('.fsyzm').html() != '验证码正确'){
								return false;
							}else{

							}
						}else{
							return false;
						}
					}else{
						return false;
					}
				})
			})
	</script>
</head>
<body>
	<div class="head">
		<div>
			<div class="left">
				<a href=""></a>
				<a href="">重置密码</a>
			</div>
			<div class="right">
				<a href="">帮助中心</a>
			</div>
		</div>
	</div>
	<div class="body">
		<div>
			<div class="left">
				<div>安全验证</div>
				<div>
					<form action="{{url('wyyx/password')}}" method="post" class="bs-example bs-example-form">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="d1 input-group">
							<span class="sp1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;账号 :  </span><input type="text" placeholder="请输入要找回的账号" class="zh" name="name">
							<span class="zhangh" ></span>
						</div>
						<div class="d2 input-group">
							<span class="sp2">&nbsp;&nbsp;&nbsp;手机号码 : </span>
							<input type="text" placeholder="请输入手机号" class="sj" name="phone">
							<span class="mim"></span>
						</div>
						<div class="d3 input-group">
							<span class="sp3">短信验证码 : </span>
							<input type="text" placeholder="输入短信验证码" class="yzm">
							<input type="submit" value="获取验证码" class="hq">
							<span class="fsyzm"></span>
						</div>
						<div>
							<input type="submit" value="下一步" class="xyb">
						</div>
					</form>
				</div>
			</div>
			<div class="right"></div>
		</div>
	</div>
	<div class="foot">
		<div>
			<ul>
				<li><a href="">公司简介 </a> &nbsp;|</li>
				<li><a href="">网易账号中心 </a> &nbsp;|</li>
				<li><a href="">账号中心公众号 </a> &nbsp;|</li>
				<li><a href="">网易账号管家 </a> &nbsp;|</li>
				<li><a href="">网易靓号 </a> &nbsp;|</li>
				<li><a href="">网易帮助中心 </a></li>

			</ul>
			<p>网易公司版权所有  © 1997-2017</p>
		</div>
	</div>
</body>
</html>