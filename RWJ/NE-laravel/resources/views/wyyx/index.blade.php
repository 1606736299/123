@extends('layouts.header')
@section('title','首页')
@section('content')
<script type="text/javascript" src="{{'../js/index.js'}}""></script>
	<article>
		<!-- 轮播图 -->
		<section id="sec-1">
			<div id="banner">
				<a href="javascript:;"><img src="{{asset('images/banner-1.jpg')}}" alt=""></a>
				<ol id="pager">
				@foreach ($banner as $v3)
					<li class="{{$v3->current}}"></li>
				@endforeach
				</ol>
				<span class="left"></span>
				<span class="right"></span>
			</div>
		</section>
		<!-- 品牌制造商 -->
		<section id="sec-2" class="g-row">
			<!-- 标题 -->
			<div class="caption clearfix">
				<div class="head-left">
					<a href="javascript:;"><h3>品牌制造商</h3></a>
					<span>工厂直达消费者,提出品牌溢价</span>
				</div>
				<div class="head-right">
					<!-- <a href="javascript:;">更多制造商></a> -->
				</div>
			</div>
			<!-- 内容 -->
			<div class="sec2-content">
				@foreach($make1 as $v1)
				<a class="large" href="javascript:;">
					<div class="text">
						<span>{{$v1->title}}</span>
					</div>
					<span class="price">{{$v1->content}}</span>
					<div class="img">
						<img src="{{url($v1->photo)}}" alt="">
					</div>
				</a>
				@endforeach
				@foreach($make2 as $v2)
				<a class="small" href="javascript:;">
					<div class="text">
						<span>{{$v2->title}}</span>
					</div>
					<span class="price">{{$v2->content}}</span>
					<div class="img">
						<img src="{{$v2->photo}}" alt="">
					</div>
				</a>
				@endforeach
			</div>
		</section>
		<section id="sec-3" class="g-row">
			<!-- 标题 -->
			<div class="caption clearfix">
				<div class="head-left">
					<a href="javascript:;"><h3>新品首发</h3></a>
					<span>周一周四上新,为你寻觅世间好物</span>
				</div>
				<div class="head-right">
					<!-- <a href="javascript:;">更多新品></a> -->
				</div>
			</div>
			<!-- 内容 -->
			<div class="sec3-content">
				<ul class="itemList" style="width:3270px;">
					@foreach($new as $v)
					<li class="item">
						<div class="hd">
							<a class="item-img" href="{{url('wyyx/details',$v->id)}}">
								<div class="white">
									<img src="{{url($v->goods_img1)}}" alt="">
								</div>
								<div class="scene">
									<img src="{{url($v->goods_img2)}}" alt="">
								</div>
							</a>
						</div>
						<div class="bd">
							<div class="tag">
								<span>爆品</span>
							</div>
							<h4 class="name">
								<a href="{{url('wyyx/details',$v->id)}}">{{$v->name}}</a>
							</h4>
							<p class="price">
								<span class="retailPrice">￥{{$v->price}}</span>
								<span class="tagName">{{$v->maker}}</span>
							</p>
						</div>
					</li>
					@endforeach
				</ul>

			</div>
			<span class="left btn"></span>
			<span class="right btn"></span>
		</section>
		<section id="sec-4">
			<div class="g-row">
				<!-- 标题 -->
				<div class="caption clearfix">
					<div class="head-left">
						<a href="javascript:;"><h3>人气推荐</h3></a>
						<ol>
							<li class="active">编辑推荐</li>
							<li>热销总榜</li>
						</ol>
					</div>
					<div class="head-right">
						<!-- <a href="javascript:;">更多推荐></a> -->
					</div>
				</div>
				<!-- 内容 -->
				<div class="sec4-content">
					<div class="container">
						@foreach($best as $v)
						<div class="popularItem">
							<div class="hd">
								<a class="item-img" href="{{url('wyyx/details',$v->id)}}">
									<div class="white">
										<img src="{{url($v->goods_img1)}}" alt="">
									</div>
								</a>
							</div>
							<div class="bd">
								<div class="tag">
									<span>冬季新品周</span>
								</div>
								<h4 class="name">
									<a href="{{url('wyyx/details',$v->id)}}">{{$v->name}}</a>
								</h4>
								<p class="price">
									<span class="retailPrice">￥{{$v->price}}</span>
								</p>
							</div>
						</div>
						@endforeach
					</div>
					<div style="display: none" class="container">
						@foreach($hot as $v)
						<div class="popularItem">
							<div class="hd">
								<a class="item-img" href="{{url('wyyx/details',$v->id)}}">
									<div class="white">
										<img src="{{url($v->goods_img1)}}" alt="">
									</div>
								</a>
							</div>
							<div class="bd">
								<div class="tag">
									<span>冬季新品周</span>
								</div>
								<h4 class="name">
									<a href="{{url('wyyx/details',$v->id)}}">{{$v->name}}</a>
								</h4>
								<p class="price">
									<span class="retailPrice">￥{{$v->price}}</span>
								</p>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</section>
		@for ($i = 0; $i < count($list3); $i++)
		<section id="sec-6" class="g-row pt58">
			<!-- 标题 -->
			<div class="caption clearfix">
				<div class="head-left">
					<a href="javascript:;"><h3>{{$list[$i]->name}}</h3></a>
				</div>
				<div class="head-right">
					<div class="CateList">
						@foreach ($list5[$i] as $k5 => $v5)
						<span>
							<a href="{{url('wyyx/Pillow',$list3[$i]->id)}}">{{$v5->name}}</a>
							<b>/</b>
						</span>
						@endforeach
					</div>
					<a href="{{url('wyyx/Pillow',$list3[$i]->id)}}">查看更多></a>
				</div>
			</div>
			<!-- 内容 -->
			<div class="sec-banner">
				<a href="javascript:;"><img src="{{url($list3[$i]->photo)}}" alt=""></a>
			</div>
			<div class="sec-itemList">
				<ul>
					@foreach ($list4[$i] as $k4 => $v4)
					<li class="item">
						<div class="hd">
							<a href="{{url('wyyx/details',$v4->pid)}}"><img src="{{url($v4->goods_img1)}}" alt=""></a>
							<!-- <div class="colorN">8色可选</div> -->
						</div>
						<div class="bd">
							<div class="Tags"></div>
							<h4 class="name"><a href="{{url('wyyx/details',$v4->id)}}">{{$v4->name}}</a></h4>
							<p>￥{{$v4->price}}</p>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
		</section>
		@endfor
		<!-- 甄选家 -->
		<section id="sec-15" class="g-row pt58">
			<!-- 标题 -->
			<div class="caption clearfix">
				<div class="head-left">
					<a href="javascript:;"><h3>甄选家</h3></a>
					<span>我们在寻找,对生活有态度的你</span>
				</div>
			</div>
			<!-- 内容 -->
			<div class="sec15-content clearfix">
				<a href="javascript:;"><div><img src="{{asset('images/sec-15-1.jpg')}}" alt=""></div></a>
				<a href="javascript:;"><div><img src="{{asset('images/sec-15-2.jpg')}}" alt=""></div></a>
				<a href="javascript:;"><div><img src="{{asset('images/sec-15-3.jpg')}}" alt=""></div></a>
			</div>
		</section>
		<!-- 大家都在说 -->
		<section id="sec-16">
			<div class="g-row pt58" style="padding-bottom: 60px;">
				<!-- 标题 -->
				<div class="caption clearfix">
					<div class="head-left">
						<a href="javascript:;"><h3>大家都在说</h3></a>
						<span>生活,没有统一标准</span>
					</div>
				</div>
				<!-- 内容 -->
				<div class="sec16-content clearfix">
					<ul>
						<div class="itemList">
							<div class="hide fadeDiv">
								<ol>
									<li class="on"></li>
									<li></li>
									<li></li>
									<li></li>
									<li></li>
									<li></li>
								</ol>
							</div>
							<!-- <span class="left btn"></span>
							<span class="right btn"></span> -->
							<div class="slick-list">
								@foreach ($comment as $v)
								<li class="item">
									<div class="m-product">
										<div class="hd">
											<a href="{{url('wyyx/details',$v->id)}}"><img src="{{url($v->picture)}}" alt="{{$v->username}}"></a>
										</div>
										<div class="bd">
											<p class="name">
												<span>{{$v->username}}</span>
												<span>{{$v->created_at}}</span>
											</p>
											<h4>{{$v->name}}<span>￥{{$v->price}}</span></h4>
											<p class="content">
												{{$v->content}}
											</p>
										</div>
									</div>
								</li>
								@endforeach
								<!-- <li class="item">
									<div class="m-product">
										<div class="hd">
											<a href=""><img src="{{'../images/sec-16-1.jpg'}}" alt=""></a>
										</div>
										<div class="bd">
											<p class="name">
												<span>i***n</span>
												<span>2017-10-09 13:25</span>
											</p>
											<h4>原态度红茶 2克*25袋<span>￥32</span></h4>
											<p class="content">
												老公是个土身土长的广东人，每天都要饮茶。“多饮茶有益健康，还能陶冶性情。”“我知道啦，听你的就是！”两个人在一起久了，好像连兴趣都会变得相近。
											</p>
										</div>
									</div>
								</li>
								<li class="item">
									<div class="m-product">
										<div class="hd">
											<a href=""><img src="{{'../images/sec-16-1.jpg'}}" alt=""></a>
										</div>
										<div class="bd">
											<p class="name">
												<span>i***n</span>
												<span>2017-10-09 13:25</span>
											</p>
											<h4>原态度红茶 2克*25袋<span>￥32</span></h4>
											<p class="content">
												老公是个土身土长的广东人，每天都要饮茶。“多饮茶有益健康，还能陶冶性情。”“我知道啦，听你的就是！”两个人在一起久了，好像连兴趣都会变得相近。
											</p>
										</div>
									</div>
								</li>
								<li class="item">
									<div class="m-product">
										<div class="hd">
											<a href=""><img src="{{'../images/sec-16-1.jpg'}}" alt=""></a>
										</div>
										<div class="bd">
											<p class="name">
												<span>i***n</span>
												<span>2017-10-09 13:25</span>
											</p>
											<h4>原态度红茶 2克*25袋<span>￥32</span></h4>
											<p class="content">
												老公是个土身土长的广东人，每天都要饮茶。“多饮茶有益健康，还能陶冶性情。”“我知道啦，听你的就是！”两个人在一起久了，好像连兴趣都会变得相近。
											</p>
										</div>
									</div>
								</li>
								<li class="item">
									<div class="m-product">
										<div class="hd">
											<a href=""><img src="{{'../images/sec-16-1.jpg'}}" alt=""></a>
										</div>
										<div class="bd">
											<p class="name">
												<span>i***n</span>
												<span>2017-10-09 13:25</span>
											</p>
											<h4>原态度红茶 2克*25袋<span>￥32</span></h4>
											<p class="content">
												老公是个土身土长的广东人，每天都要饮茶。“多饮茶有益健康，还能陶冶性情。”“我知道啦，听你的就是！”两个人在一起久了，好像连兴趣都会变得相近。
											</p>
										</div>
									</div>
								</li>
								<li class="item">
									<div class="m-product">
										<div class="hd">
											<a href=""><img src="{{'../images/sec-16-1.jpg'}}" alt=""></a>
										</div>
										<div class="bd">
											<p class="name">
												<span>i***n</span>
												<span>2017-10-09 13:25</span>
											</p>
											<h4>原态度红茶 2克*25袋<span>￥32</span></h4>
											<p class="content">
												老公是个土身土长的广东人，每天都要饮茶。“多饮茶有益健康，还能陶冶性情。”“我知道啦，听你的就是！”两个人在一起久了，好像连兴趣都会变得相近。
											</p>
										</div>
									</div>
								</li> -->

							</div>
						</div>
					</ul>
				</div>
			</div>
		</section>
	</article>
	@endsection
