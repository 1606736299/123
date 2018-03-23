<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>网易严选 - @yield('title')</title>
	<link rel="stylesheet" href="{{asset('/css/index.css')}}">
	<link rel="stylesheet" href="{{asset('/css/header.css')}}">
	<script type="text/javascript" src="{{asset('/js/jquery.js')}}"></script>
	<script type="text/javascript" src="{{asset('/js/header.js')}}"></script>
	<!-- <script type="text/javascript" src="{{asset('js/login.js')}}"></script> -->
	<link rel="stylesheet" href="{{asset('/css/login_home.css')}}">
	<style>

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
</head>
<body>
	<!-- 头部 -->
	<header id="header">
		<!-- 黑色顶部 -->
		<div class="m-siteNav">
			<div class="g-row">
				<a class="declare">好的生活，没那么贵</a>
				<div class="right" style="position: relative;">
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
					<a href="javascript:;" class="attitude topNav">严选会员</a>
					<div class="split topNav"></div>
					<a href="javascript:;" class="attitude topNav">企业采购</a>
					<div class="split topNav"></div>
					<div class="custmService w-dropdown topNav">
						<a href="javascript:;" class="customerText topNav">
							客户服务
							<i class="w-icon-arrow arrow-up-hollow"></i>
						</a>
						<div class="jq-dropdown">
							<nav class="jq-dropdown-menu dropdownMenu">
								<a href="javascript:;" class="item">帮助中心</a>
								<a href="javascript:;" class="item">在线客服</a>
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
								<a href="javascript:;" class="item">商务合作</a>
								<a href="javascript:;" class="item">开放平台</a>
							</nav>
						</div>
					</div>
					<div class="split topNav"></div>
					<div class="m-dropdown topNav m-hdAppDownload">
						<a class="trigger j-downloadlink">
							<i class="icon w-icon-phone"></i>
							<span class="txt topNav">下载APP</span>
						</a>
						<div class="bd">
							<div class="wrap">
								<div class="QRcode">
									<img src="{{asset('images/index.png')}}" alt="">
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
						<img src="{{asset('images/logo.gif')}}" alt="">
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

								<!-- <div class="j-showDefaultWord showDefaultWord">可搜索商品名称</div> -->
								<form action="{{url('wyyx/search')}}" method="post">
									<input class="w-searchInput" name="name" type="text" maxlength="100" autocomplete="off" placeholder="可搜索商品名称">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<button>
										<div class="w-button-search">
											<i class="w-icon-header header-search"></i>
										</div>
									</button>
								</form>
								<!-- 热门搜索 -->
								<!-- <div class="m-ppnl">
									<div class="j-ssContent">
										<ul class="m-list">
											<li class="top-itemHot">
												<span class="top-item-txt">大家都在搜</span>
											</li>
											<li class="hl-item hightlight">
												<span class="hl-item-txt">蚕丝被直减300</span>
											</li>
											<li class="hl-item hightlight">
												<span class="hl-item-txt">Armani制造商秋款家居服直降100元起</span>
											</li>
											<li class="hl-item">
												<span class="hl-item-txt">牛仔裤</span>
											</li>
											<li class="hl-item hightlight">
												<span class="hl-item-txt">电器</span>
											</li>
											<li class="hl-item hightlight">
												<span class="hl-item-txt">APP下单限时特惠</span>
											</li>
										</ul>
									</div>
								</div> -->
							</div>
						</div>
						<!-- 导航栏 -->
						<ul class="tab-nav">
							<li class="nav-item active first">
								<a class="topLevel" title="首页" href="">首页</a>
							</li>
							@foreach($list as $k => $v)
							<li class="j-nav-item nav-item">
								<a class="topLevel" title="{{$v->name}}" href="{{url('wyyx/Pillow',$v->id)}}">{{$v->name}}</a>
								<div class="j-nav-dropdown nav-dropdown">
									<div class="j-nav-cateCard nav-cateCard">
										<ul class="card-list">
											@foreach ($list2[$k] as $k2 => $v2)
											<li class="item">
												<a class="nav-subCate" href="{{url('wyyx/Pillow',$list[$k]->id)}}" title="{{$v2->name}}">
													<img src="{{url($v2->icon)}}" alt="{{$v2->name}}">
													<p>{{$v2->name}}</p>
												</a>
											</li>
											@endforeach
										</ul>
									</div>
								</div>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>
	@yield('content')
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
											<img src="{{asset('images/code-yixin.png')}}" alt="严选易信">
											<i class="icon"></i>
										</div>
									</div>
								</div>
								<div class="m-dropdown m-dropdown-2d f-left">
									<i class="w-icon-sns sns-weixin"></i>
									<div class="bd">
										<div class="wrap">
											<img src="{{asset('images/code-weixin.png')}}" alt="严选微信">
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
							<img src="{{asset('images/index.png')}}" alt="">
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
						<img src="{{asset('images/businessAdmin.gif')}}" alt="">
					</a>
				</div>
			</div>
		</div>
	</footer>

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
								<img src="{{asset('images/下载.png')}}" alt="">
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
		<a class="goTop" href="#header">
			<i></i>
			<p>回顶部</p>
		</a>
	</div>
</body>
</html>