<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>网易严选 - @yield('title')</title>
	<link rel="stylesheet" href="{{asset('/css/header.css')}}">
	<link rel="stylesheet" href="{{asset('/css/login.css')}}">
	<link rel="stylesheet" href="{{asset('/css/mylist.css')}}">
	<link rel="stylesheet" href="{{asset('/css/tou.css')}}">
	<link rel="stylesheet" href="{{asset('/css/amazeui.min.css')}}">
	<link rel="stylesheet" href="{{asset('/css/amazeui.cropper.css')}}">
	<link rel="stylesheet" href="{{asset('/css/custom_up_img.css')}}">
	<script type="text/javascript" src="{{asset('/js/jquery.js')}}"></script>
	<script type="text/javascript" src="{{asset('/js/header.js')}}"></script>
	<style>
		body{
			font: 12px/1.5 "Microsoft Yahei","微软雅黑",verdana;
		}
		.right{
			position: relative;
		}
		.exitlogin{
			width: 80px;
			height: 30px;
			border: 1px solid green;
			position: absolute;
			background: #333;
			color: #fff;
			top: 35px;
			left: 0;
			z-index: 90;
			text-align: center;
			line-height: 30px;
			display: none;
		}
	</style>
	<script>
		$(function(){
			var test = window.location.href;
			if(test == 'http://ne.com/news'){
				$('.wy-news-news').css('color','#b4a078');
			}else if(test == 'http://ne.com/in'){
				$('.wy-in-in').css('color','#b4a078');
			}else if(test == 'http://ne.com/or'){
				$('.wy-or-or').css('color','#b4a078');
			}else if(test == 'http://ne.com/as'){
				$('.wy-as-as').css('color','#b4a078');
			}else if(test == 'http://www.wyyx.com/cn'){
				$('.wy-cn-cn').css('color','#b4a078');
			}else if(test == 'http://www.wyyx.com/red'){
				$('.wy-red-red').css('color','#b4a078');
			}else if(test == 'http://www.wyyx.com/pe'){
				$('.wy-pe-pe').css('color','#b4a078');
			}else if(test == 'http://www.wyyx.com/gs'){
				$('.wy-gs-gs').css('color','#b4a078');
			}else if(test == 'http://ne.com/fs'){
				$('.wy-fs-fs').css('color','#b4a078');
			}else if(test == 'http://www.wyyx.com/cg'){
				$('.wy-cg-cg').css('color','#b4a078');
			}else if(test == 'http://ne.com/ft'){
				$('.wy-ft-ft').css('color','#b4a078');
			}else if(test == 'http://ne.com/ay'){
				$('.wy-ay-ay').css('color','#b4a078');
			}
		})
	</script>
</head>
<body>
	<!-- 头部 -->
		<!-- 黑色顶部 -->
		<div class="m-siteNav">
			<div class="g-row">
				<a class="declare" href="">好的生活，没那么贵</a>
				<div class="right">
					@if (session('member'))
						<a class="login topNav" id="member" href="{{url('/news')}}">{{Session::get('member')}}</a>
							<a href="{{url('wyyx/login')}}" id="exitlogin" class="exitlogin">退出登陆</a>
						<a class="register j-topRegister topNav" href="{{url('/news')}}">消息</a>
						<input type="hidden" id="hide_username" value="{{Session::get('member')}}">
						<div class="split topNav"></div>
						<a class="attitude topNav" href="{{url('or')}}">我的订单</a>
					@else
						<a class="login topNav" href="{{url('wyyx/login')}}">登录</a>
						<a class="register j-topRegister topNav" href="{{url('wyyx/register')}}">注册</a>
						<div class="split topNav"></div>
						<a class="attitude topNav" href="{{url('wyyx/login')}}">我的订单</a>
					@endif
					<div class="split topNav"></div>
					<a class="attitude topNav" href="javascript:;">严选会员</a>
					<div class="split topNav"></div>
					<a class="attitude topNav" href="javascript:;">企业采购</a>
					<div class="split topNav"></div>
					<div class="custmService w-dropdown topNav">
						<a class="customerText topNav" href="">
							客户服务
							<i class="w-icon-arrow arrow-up-hollow"></i>
						</a>
						<div class="jq-dropdown">
							<nav class="jq-dropdown-menu dropdownMenu">
								<a class="item" href="javascript:;">帮助中心</a>
								<a class="item" href="javascript:;">在线客服</a>
								<div class="itemHover">
									<div class="item">
										<span class="itemText">
											电话客服
											<span class="triangle"></span>
										</span>
									</div>
									<div class="panel">
										<div class="servicePhoNum">400-0368-163</div>
										<div class="serviceTime">9:00-22:00</div>
									</div>
								</div>
								<a class="item" href="javascript:;">商务合作</a>
								<a class="item" href="javascript:;">开放平台</a>
							</nav>
						</div>
					</div>
					<div class="split topNav"></div>
					<div class="m-dropdown topNav m-hdAppDownload">
						<a class="trigger j-downloadlink" href="javascript:;">
							<i class="icon w-icon-phone"></i>
							<span class="txt topNav">下载APP</span>
						</a>
						<div class="bd">
							<div class="wrap">
								<div class="QRcode">
									<img src="../images/index.png" alt="">
								</div>
								<span>下载领1000元新人礼包</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- 搜索导航 -->
		<div id="js-funcTabWrap" style="height: 204px;">
			<div class="m-funcTab" id="m-funcTab">
				<div class="g-row">
					<a class="tab-logo-activity" title="网易严选" href="{{url('/')}}">
						<img src="../images/logo.gif" alt="">
					</a>
					<a class="tab-logo-fixed" title="网易严选" href="{{url('/')}}"></a>
					<div class="tab-inner">
						<div class="m-search">
							<a class="w-button-cart j-button-cart" href="{{url('wyyx/shop')}}">
								<i class="w-icon-cart cart-blackcart"></i>
								@if (session('member'))
								<i class="shopNum w-icon-normal icon-normal-barde" data-reactid="{{Session::get('member')}}">0</i>
								@else
								<i class="w-icon-normal icon-normal-barde">0</i>
								@endif
								<script type="text/javascript">
									var card = $('.shopNum').attr('data-reactid');
									$.ajax({
										url: '/shop/shopNum',
										type: "get",
										data: {'card':card},
										success: function(data){
											$('.icon-normal-barde').html(data);
										}

									});
								</script>
							</a>

							<div class="yx-cp-fixed-login">
								@if (session('member'))
									<a class="user" href="{{url('/news')}}">
										<i class="user-icon"></i>
									</a>
								@else
									<a class="login" href="{{url('wyyx/login')}}">登录</a>
									<a class="register j-topRegister" href="{{url('wyyx/register')}}">注册</a>
								@endif
							</div>
							<div id="j-search" class="m-searchInput">
								<form action="{{url('wyyx/search')}}" method="post">
									<input class="w-searchInput" name="name" type="text" maxlength="100" autocomplete="off" placeholder="可搜索商品名称">
									<input type="hidden" name="_token" value="">
									<button>
										<div class="w-button-search">
											<i class="w-icon-header header-search"></i>
										</div>
									</button>

								</form>
							</div>
						</div>
						<!-- 导航栏 -->
						<ul class="tab-nav">
							<li class="nav-item active first">
								<a class="topLevel" title="首页" href="{{url('/')}}">首页</a>
							</li>
							@for ($i = 0; $i < count($list); $i++)
							<li class="j-nav-item nav-item">
								<a class="topLevel" title="{{$list[$i]->name}}" href="{{url('wyyx/Pillow',$list[$i]->id)}}">{{$list[$i]->name}}</a>
								<div class="j-nav-dropdown nav-dropdown">
									<div class="j-nav-cateCard nav-cateCard">
										<ul class="card-list">
											@foreach ($list2[$i] as $k2 => $v2)
											<li class="item">
												<a class="nav-subCate" href="{{url('wyyx/Pillow',$list[$i]->id)}}" title="{{$v2->name}}">
													<img src="{{url($v2->icon)}}" alt="{{$v2->name}}">
													<p>{{$v2->name}}</p>
												</a>
											</li>

											@endforeach
										</ul>
									</div>
								</div>
							</li>
							@endfor
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div class="yx-bd">
		<div class="yx-bd-c">
			<!-- 左侧导航 -->
			<div class="yx-bd-c-l">
				<div class="yx-bd-c-l-t">
					<div class="mask">
						<div>
							@foreach ($info as $i)
								<img src="{{$i->img}}" alt="" style="width: 100px;height: 100px;">
							@endforeach
						</div>
						<div id="tou_bt">
						</div>
					</div>
					<div class="w-nickname">{{Session::get('member')}}</div>
					<div class="levelname">普通用户</div>
					<div style="display: block;" class="w-button"><a style="color:#333;" href="{{url('wyyx/login')}}">切换账号</a></div>
				</div>
				<div class="yx-bd-c-l-b">
					<a href="{{url('/news')}}" class="wy-news-news">消息</a>
					<a href="{{url('/in')}}" class="wy-in-in">个人信息</a>
					<a href="{{url('/or')}}" class="wy-or-or">订单管理</a>
					<a href="{{url('/as')}}" class="wy-as-as">收货地址</a>
					<a href="{{url('/fs')}}" class="wy-fs-fs">收藏夹</a>
					<a href="{{url('/ft')}}" class="wy-ft-ft">我的足迹</a>
					<a href="{{url('/ay')}}" class="wy-ay-ay">账号安全</a>
				</div>
			</div>
			<!-- 右侧内容 -->
			<div class="yx-bd-c-r">
				@yield('content')
			</div>
		</div>
	</div>
	<!-- 侧边栏 -->
	<div class="fixed">
		<ul>
			<li>
				<p></p>
				新人有礼
			</li>
			<li>
				<p></p>
				下载APP
				<!-- 鼠标悬停显示 -->
				<div class="DownloadApp">
					<div class="yx-main">
						<div class="yx-top">
							<span class="yx-unitf-fz20">￥</span>
							<span class="yx-account">1000</span>
							<div class="yx-tagyx-f-fz14">新人</div>
							<p class="yx-txt1yx-f-fz18">现金礼</p>
						</div>
						<div class="yx-bottom">
							<div class="yx-img">
								<img src="{{'images/下载.png'}}" alt="">
							</div>
							<div class="yx-f-left">
								<p class="yx-txt3yx-f-fz20">立即扫码</p>
								<p class="yx-txt4yx-fz14">下载APP领取</p>
							</div>
						</div>
					</div>
					<!-- 右边小箭头 -->
					<div class="yx-cp-icon-yxfixedtool"></div>
				</div>
			</li>

			<li>
				<p></p>
				在线客服
			</li>

		</ul>
		<div class="goTop">
			<i></i>
			<p>回顶部</p>
		</div>
	</div>
	<!-- 底部 -->
	<footer class="g-ft">
		<div class="m-ft1 clearfix">
			<div class="g-row">
				<div class="item">
					<div class="m-serviceTel">
						<h4 class="hd">客服电话</h4>
						<p class="phone">400-0368-163</p>
						<p class="datetime">9:00-22:00</p>
						<a class="w-button btn feedbackBtn" href="javascript:;">用户反馈</a>
						<a class="w-button btn kefuBtn" href="javascript:;">在线客服</a>
					</div>
				</div>
				<div class="item">
					<div class="m-whatIsYX">
						<h4 class="hd">何为严选</h4>
						<p class="desc">网易原创生活类电商品牌，秉承网易一贯的严谨态度，我们深入世界各地，从源头全程严格把控商品生产环节，力求帮消费者甄选到优质的商品</p>
						<div class="m-followUs">
							<p class="title">关注我们 :</p>
							<div class="m-focusList">
								<div class="m-dropdown m-dropdown-2d f-left">
									<i class="w-icon-sns sns-yixin"></i>
									<div class="bd">
										<div class="wrap">
											<img src="../images/code-yixin.png" alt="严选易信">
											<i class="icon"></i>
										</div>
									</div>
								</div>
								<div class="m-dropdown m-dropdown-2d f-left">
									<i class="w-icon-sns sns-weixin"></i>
									<div class="bd">
										<div class="wrap">
											<img src="../images/code-weixin.png" alt="严选微信">
											<i class="icon"></i>
										</div>
									</div>
								</div>
								<a class="f-left" href="javascript:;">
									<i class="w-icon-sns sns-weibo"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="m-ftAppDownload">
						<h4 class="hd">扫码下载严选APP</h4>
						<div class="m-qrcode j-qrcode">
							<img src="../images/index.png" alt="">
						</div>
						<div class="tip">下载领1000元新人礼包</div>
					</div>
				</div>
			</div>
		</div>
		<!-- 黑色底部 -->
		<div class="m-ft2">
			<div class="g-row">
				<ul class="m-siteEnsure clearfix">
					<li class="item">
						<div class="inner">
							<i class="icon w-icon-foot foot-ft1"></i>
							<p class="text">30天无忧退换货</p>
						</div>
					</li>
					<li class="item">
						<div class="inner">
							<i class="icon w-icon-foot foot-ft2"></i>
							<p class="text">满88元免邮费</p>
						</div>
					</li>
					<li class="item">
						<div class="inner">
							<i class="icon w-icon-foot foot-ft3"></i>
							<p class="text">网易品质保证</p>
						</div>
					</li>
				</ul>
				<div class="yx-cp-hr"></div>
				<div class="m-siteInfo">
					<nav class="nav">
						<a class="text" href="javascript:;">关于我们</a>
						<span class="split">|</span>
						<a class="text" href="javascript:;">帮助中心</a>
						<span class="split">|</span>
						<a class="text" href="javascript:;">售后服务</a>
						<span class="split">|</span>
						<a class="text" href="javascript:;">配送与验收</a>
						<span class="split">|</span>
						<a class="text" href="javascript:;">商务合作</a>
						<span class="split">|</span>
						<a class="text" href="javascript:;">企业采购</a>
						<span class="split">|</span>
						<a class="text" href="javascript:;">开放平台</a>
						<span class="split">|</span>
						<a class="text" href="javascript:;">搜索推荐</a>
						<span class="split">|</span>
						<a class="text" href="javascript:;">友情链接</a>
					</nav>
					<p class="copyright">网易公司版权所有 © 1997-2017   食品经营许可证：JY13301080111719</p>
					<a class="businessAdmin" href="javascript:;">
						<img src="../images/businessAdmin.gif" alt="">
					</a>
				</div>
			</div>
		</div>
	</footer>

	<div id="tou_hidd">
		<center>
			<div class="up-img-cover"  id="up-img-touch" >
				<img class="am-circle" alt="" src="" data-am-popover="{content: '点击上传', trigger: 'hover focus'}" >
			</div>
		</center>
		<div><a style="text-align: center;"  id="pic"></a></div>

		<!--图片上传框-->
		<form class="form-horizontal required-validate" action="{{url('wyyx/toux')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data"  onsubmit="return iframeCallback(this, pageAjaxDone)">
				        <input type="hidden" name="_token" value="{{csrf_token()}}">
				        <input type="hidden" name=" id">
		<div class="am-modal am-modal-no-btn up-frame-bj " tabindex="-1" id="doc-modal-1">
		  <div class="am-modal-dialog up-frame-parent up-frame-radius">
			<div class="am-modal-hd up-frame-header">
			   <label>修改头像</label>
			  <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
			</div>
			<div class="am-modal-bd  up-frame-body">
			  <div class="am-g am-fl">
				<div class="am-form-group am-form-file">
				  <div class="am-fl">
					<button type="button" class="am-btn am-btn-default am-btn-sm">
					  <i class="am-icon-cloud-upload"></i> 选择要上传的文件</button>
				  </div>
				  	<input type="file" id="inputImage" name="file">
				  	<!-- <input type="file" id="" name="file"> -->
				</div>
			  </div>
			  <div class="am-g am-fl" >
				<div class="up-pre-before up-frame-radius">
					<img alt="" src="" id="image" >
				</div>
				<div class="up-pre-after up-frame-radius">
				</div>
			  </div>
			  <div class="am-g am-fl">
				<div class="up-control-btns">
					<span class="am-icon-rotate-left"  onclick=""></span>
					<span class="am-icon-rotate-right" onclick=""></span>
					<span class="am-icon-check" id="up-btn-ok" url=""></span>
				</div>
			  </div>

			</div>
			<button type="">上传</button>
		  </div>
		</div>
		</form>
	</div>
	<script src="{{'js/tou/jquery-1.8.3.min.js'}}"></script>
	<script src="{{'js/tou/amazeui.min.js'}}" charset="utf-8"></script>
	<script src="{{'js/tou/cropper.min.js'}}" charset="utf-8"></script>
	<script src="{{'js/tou/custom_up_img.js'}}" charset="utf-8"></script>
	<script>
	    $(function(){
	    	$('#tou').click(function(){
	    		$('#hidd').css('display','block');
	    	})
	    	$('#show').click(function(){
	    		$('#hidd').css('display','none');
	    	})
	    })
	</script>
</body>
</html>
