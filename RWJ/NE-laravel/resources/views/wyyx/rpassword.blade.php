<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>网易账号中心</title>
	<link rel="stylesheet" href="{{'../css/password.css'}}">
	<script type="text/javascript" src="{{'../js/jquery.js'}}"></script>
	<style>
		.sp1{
			text-indent:30px;
		}
		.mm,.xmm{
			width: 340px;
			height: 42px;
			border: 1px solid #f4f4f4;
			float: right;
		}
		.d4,.d5{
			position: relative;
		}
		.d4 span:last-child,.d5 span:last-child{
			width: 150px;
			height: 15px;
			position: absolute;
			right: -160px;
			font-size: 12px;
			top: 0;
			text-align: left;
		}
	</style>
	<script>
		$(function(){
			//第一次输入密码
			$('.mm').focus(function(){
				// alert('11');
				var mm = $('.mm').val();
				if(mm == ""){
					$('.mmspan').html('请输入密码').css('color','red');
				}
			}).blur(function(){
				var mm = $('.mm').val();
				var pattern = /^[\w_-]{6,16}$/;
				if(!pattern.test(mm)){
					$('.mmspan').html('密码由6-16位组成').css('color','red');
				}else{
					$('.mmspan').html('密码输入正确').css('color','green');
				}
			})

			//再次输入密码
			$('.xmm').focus(function(){
				var xmm = $('.xmm').val();
				if(xmm == ""){
					$('.xmmspan').html('请再次输入密码').css('color','red');
				}
			}).blur(function(){
				var mm = $('.mm').val();
				var xmm = $('.xmm').val();
				if(mm == xmm){
					$('.xmmspan').html('两次密码输入一致').css('color','green');
				}else{
					$('.xmmspan').html('两次密码输入不一致').css('color','red');
				}
			})

			//确定按钮
			$('.xyb').click(function(){
				if($('.xmmspan').html() != '两次密码输入一致' || $('.mmspan').html() != '密码输入正确'){
					alert('请填写信息');
					return false;
				}else{

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
					<form action="{{url('wyyx/rpassword')}}" method="post">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div>
							<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;登录名:</span>
							<span class="sp1">{{$zhanghao}}</span>
						</div>
						<input type="hidden" name="name" value="{{$zhanghao}}">
						<div class="d4"><span class="sp2">设置新密码:</span>
							<input type="password" placeholder="请输入新密码" class="mm">
							<span class="mmspan"></span>
						</div>
						<div class="d5">
							<span class="sp3"></span>
							<input type="password" placeholder="请再次输入密码" class="xmm" name="password">
							<span class="xmmspan"></span>
						</div>
						<div><input type="submit" value="确定" class="xyb"></div>
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