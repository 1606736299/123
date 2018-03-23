@extends('layouts.mylist')
@section('title', '个人信息 - 网易严选')
@section('content')
<link rel="stylesheet" href="{{url('css/mylist-in.css')}}">
<script type="text/javascript" src="{{url('js/jquery.js')}}"></script>

<!-- 内容部分 -->
<script>
	 // $(function(){
		//  $('.tab1').find('li').click(function(){
		// 	 var index = $(this).index();
		// 	 $(this).addClass('active').siblings().removeClass('active');
		// 	 $('.content1').find('li').eq(index).show().siblings().hide();
		//  })

		//  $('.opt').click(function(){
		//  	alert('11');
		//  })
	 // })
</script>
<!-- 右侧内容 -->
 <ul class="tab1">
	 <li class="active">基本分类</li>
<!-- 	 <li>感兴趣的分类</li> -->
 </ul>
 <ul class="content1">
	 <li style="display: block;" class="c-l1">
	 	<div class="wx-cn" style="top:-50px;">
	 	@foreach($user as $v)
			<form action="{{url('/in-update',$v->id)}}" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<input type="hidden" name="id" value="{{$v->id}}">
				<div class="zh">
					<label class="">用户 ID</label>
					<span>{{$v->id}}</span>
				</div>
				<div class="zh">
					<label class="">帐　　号</label>
					<span>{{$v->name}}</span>
				</div>
				<div class="zh">
					<label class="">昵　　称</label>
					<span><input type="text" value="{{$v->username}}" style="height:30px;outline:none;" name="username"></span>
				</div>
				<div class="zh">
					<label class="">姓　　别</label>
					<span>
					@if ($v->sex == '未知')
						<input type="radio" name="sex" value="女">女
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="sex" value="男">男
					@elseif ($v->sex == '男')
						<input type="radio" name="sex" value="女">女
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="sex"checked="checked" value="男">男
					@else
						<input type="radio" name="sex" checked="checked" value="女">女
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="sex"  value="男">男
					@endif
					</span>
				</div>
				<div class="zh">
					<label class="">手机号码</label>
						@if ($v -> phone)
							<span>{{$v -> phone}}</span>
						@else
							<span><a href="" style="color:#69c;">绑定手机号码</a></span>
						@endif

				</div>

				<!-- <div class="zh">
					<label class="">在线大学生</label>
					<span><a href="">未认证</a> <a href="">什么是学生特权</a></span>
				</div>	 -->
				<div class="wy-line">

				</div>
				<div class="zh">
					<!-- <label class="">帐　　号</label> -->
					<button class="wy-submit">保存</button>
				</div
			</form>
		@endforeach
	 	</div>
	 </li>
	 <li class="c-l2">
	 	<div class="zdd">
	 		<p>多选几个，小选会推荐地更精准哦！</p>
	 		<!-- 总的内容15个 -->
	 		<div class="spd">
	 			<!-- 每个商品 -->
	 			<div id="wy-sp-on">
	 				<div>
	 					<img src="{{'images/d105860d3db3107c514cf5cd8ff10290.png'}}" alt="">
	 				</div>
	 				<div class="wy-sp-show">
	 					<img src="{{'images/453d496b477bd9b10700e0db3ba78ed1.png'}}" alt="">
	 				</div>
	 				<div>
	 					<input type="checkbox">
	 					<span>床品被枕</span>
	 				</div>
	 			</div>
	 			<div id="wy-sp-on">
	 				<div>
	 					<img src="{{'images/yQgcA4fAFeD5G8f8fwFfpy2LnQtJVAAAAABJRU5ErkJggg==.png'}}" alt="">
	 				</div>
	 				<div class="wy-sp-show">
	 					<img src="{{'images/453d496b477bd9b10700e0db3ba78ed1.png'}}" alt="">
	 				</div>
	 				<div>
	 					<input type="checkbox">
	 					<span>餐厨用品</span>
	 				</div>
	 			</div>
	 			<div id="wy-sp-on">
	 				<div>
	 					<img src="{{'images/A3Q7IFg2Z3TRN9f8Db5T6CqgmonwAAAAASUVORK5CYII=.png'}}" alt="">
	 				</div>
	 				<div class="wy-sp-show">
	 					<img src="{{'images/453d496b477bd9b10700e0db3ba78ed1.png'}}" alt="">
	 				</div>
	 				<div>
	 					<input type="checkbox">
	 					<span>居家神器</span>
	 				</div>
	 			</div>
	 			<div id="wy-sp-on">
	 				<div>
	 					<img src="{{'images/C90WT8gmRoXmAAAAAElFTkSuQmCC.png'}}" alt="">
	 				</div>
	 				<div class="wy-sp-show">
	 					<img src="{{'images/453d496b477bd9b10700e0db3ba78ed1.png'}}" alt="">
	 				</div>
	 				<div>
	 					<input type="checkbox">
	 					<span>家具家饰</span>
	 				</div>
	 			</div>
	 			<div id="wy-sp-on">
	 				<div>
	 					<img src="{{'images/wPN2+PYnu24PgAAAABJRU5ErkJggg==.png'}}" alt="">
	 				</div>
	 				<div class="wy-sp-show">
	 					<img src="{{'images/453d496b477bd9b10700e0db3ba78ed1.png'}}" alt="">
	 				</div>
	 				<div>
	 					<input type="checkbox">
	 					<span>鞋靴外搭</span>
	 				</div>
	 			</div>
	 			<div id="wy-sp-on">
	 				<div>
	 					<img src="{{'images/VQAAAABJRU5ErkJggg==.png'}}" alt="">
	 				</div>
	 				<div class="wy-sp-show">
	 					<img src="{{'images/453d496b477bd9b10700e0db3ba78ed1.png'}}" alt="">
	 				</div>
	 				<div>
	 					<input type="checkbox">
	 					<span>内衣裤袜</span>
	 				</div>
	 			</div>
	 			<div id="wy-sp-on">
	 				<div>
	 					<img src="{{'images/kLkQAAAABJRU5ErkJggg==.png'}}" alt="">
	 				</div>
	 				<div class="wy-sp-show">
	 					<img src="{{'images/453d496b477bd9b10700e0db3ba78ed1.png'}}" alt="">
	 				</div>
	 				<div>
	 					<input type="checkbox">
	 					<span>箱包差旅</span>
	 				</div>
	 			</div>
	 			<div id="wy-sp-on">
	 				<div>
	 					<img src="{{'images/v9vrtQnQzjY8QAAAABJRU5ErkJggg==.png'}}" alt="">
	 				</div>
	 				<div class="wy-sp-show">
	 					<img src="{{'images/453d496b477bd9b10700e0db3ba78ed1.png'}}" alt="">
	 				</div>
	 				<div>
	 					<input type="checkbox">
	 					<span>洗护用品</span>
	 				</div>
	 			</div>
	 			<div id="wy-sp-on">
	 				<div>
	 					<img src="{{'images/JNaM7HYmwyj0lvAWmw9R3pqEq5NpY1xcWrTOUMoi9OH5b5f35YsEQJ9TS+AMHAAv6aFXzlQAAAABJRU5ErkJggg==.png'}}" alt="">
	 				</div>
	 				<div class="wy-sp-show">
	 					<img src="{{'images/453d496b477bd9b10700e0db3ba78ed1.png'}}" alt="">
	 				</div>
	 				<div>
	 					<input type="checkbox">
	 					<span>办公文具</span>
	 				</div>
	 			</div>
	 			<div id="wy-sp-on">
	 				<div>
	 					<img src="{{'images/x9ta5ISrV3ZdwAAAABJRU5ErkJggg==.png'}}" alt="">
	 				</div>
	 				<div class="wy-sp-show">
	 					<img src="{{'images/453d496b477bd9b10700e0db3ba78ed1.png'}}" alt="">
	 				</div>
	 				<div>
	 					<input type="checkbox">
	 					<span>零点零食</span>
	 				</div>
	 			</div>
	 			<div id="wy-sp-on">
	 				<div>
	 					<img src="{{'images/D482Ej0MBHskAAAAAElFTkSuQmCC.png'}}" alt="">
	 				</div>
	 				<div class="wy-sp-show">
	 					<img src="{{'images/453d496b477bd9b10700e0db3ba78ed1.png'}}" alt="">
	 				</div>
	 				<div>
	 					<input type="checkbox">
	 					<span>宠物用品</span>
	 				</div>
	 			</div>
	 			<div id="wy-sp-on">
	 				<div>
	 					<img src="{{'images/sAAAAAElFTkSuQmCC.png'}}" alt="">
	 				</div>
	 				<div class="wy-sp-show">
	 					<img src="{{'images/453d496b477bd9b10700e0db3ba78ed1.png'}}" alt="">
	 				</div>
	 				<div>
	 					<input type="checkbox">
	 					<span>运动音乐</span>
	 				</div>
	 			</div>
	 			<div id="wy-sp-on">
	 				<div>
	 					<img src="{{'images/x9SerTLZPH3lQAAAABJRU5ErkJggg==.png'}}" alt="">
	 				</div>
	 				<div class="wy-sp-show">
	 					<img src="{{'images/453d496b477bd9b10700e0db3ba78ed1.png'}}" alt="">
	 				</div>
	 				<div>
	 					<input type="checkbox">
	 					<span>母婴用品</span>
	 				</div>
	 			</div>
	 			<div id="wy-sp-on">
	 				<div>
	 					<img src="{{'images/B0u9ymkeN9ObAAAAAElFTkSuQmCC.png'}}" alt="">
	 				</div>
	 				<div class="wy-sp-show">
	 					<img src="{{'images/453d496b477bd9b10700e0db3ba78ed1.png'}}" alt="">
	 				</div>
	 				<div>
	 					<input type="checkbox">
	 					<span>车载用品</span>
	 				</div>
	 			</div>
	 			<div id="wy-sp-on">
	 				<div>
	 					<img src="{{'images/3RXhawVOYkwAAAAAElFTkSuQmCC.png'}}" alt="">
	 				</div>
	 				<div class="wy-sp-show">
	 					<img src="{{'images/453d496b477bd9b10700e0db3ba78ed1.png'}}" alt="">
	 				</div>
	 				<div>
	 					<input type="checkbox">
	 					<span>智能硬件</span>
	 				</div>
	 			</div>
	 		</div>
	 		<div class="wy-tj-zl">提交</div>
	 	</div>
	 </li>
 </ul>
 <script language="javascript">
    (function($){
    $.extend({
    ms_DatePicker: function (options) {
                var defaults = {
                    YearSelector: "#sel_year",
                    MonthSelector: "#sel_month",
                    DaySelector: "#sel_day",
                    FirstText: "--",
                    FirstValue: 0
                };
                var opts = $.extend({}, defaults, options);
                var $YearSelector = $(opts.YearSelector);
                var $MonthSelector = $(opts.MonthSelector);
                var $DaySelector = $(opts.DaySelector);
                var FirstText = opts.FirstText;
                var FirstValue = opts.FirstValue;

                // 初始化
                var str = "<option value=\"" + FirstValue + "\">" + FirstText + "</option>";
                $YearSelector.html(str);
                $MonthSelector.html(str);
                $DaySelector.html(str);

                // 年份列表
                var yearNow = new Date().getFullYear();
                var yearSel = $YearSelector.attr("rel");
                for (var i = yearNow; i >= 1900; i--) {
                    var sed = yearSel==i?"selected":"";
                    var yearStr = "<option value=\"" + i + "\" " + sed+">" + i + "</option>";
                    $YearSelector.append(yearStr);
                }

                // 月份列表
                var monthSel = $MonthSelector.attr("rel");
                for (var i = 1; i <= 12; i++) {
                    var sed = monthSel==i?"selected":"";
                    var monthStr = "<option value=\"" + i + "\" "+sed+">" + i + "</option>";
                    $MonthSelector.append(monthStr);
                }

                // 日列表(仅当选择了年月)
                function BuildDay() {
                    if ($YearSelector.val() == 0 || $MonthSelector.val() == 0) {
                        // 未选择年份或者月份
                        $DaySelector.html(str);
                    } else {
                        $DaySelector.html(str);
                        var year = parseInt($YearSelector.val());
                        var month = parseInt($MonthSelector.val());
                        var dayCount = 0;
                        switch (month) {
                            case 1:
                            case 3:
                            case 5:
                            case 7:
                            case 8:
                            case 10:
                            case 12:
                                dayCount = 31;
                                break;
                            case 4:
                            case 6:
                            case 9:
                            case 11:
                                dayCount = 30;
                                break;
                            case 2:
                                dayCount = 28;
                                if ((year % 4 == 0) && (year % 100 != 0) || (year % 400 == 0)) {
                                    dayCount = 29;
                                }
                                break;
                            default:
                                break;
                        }

                        var daySel = $DaySelector.attr("rel");
                        for (var i = 1; i <= dayCount; i++) {
                            var sed = daySel==i?"selected":"";
                            var dayStr = "<option value=\"" + i + "\" "+sed+">" + i + "</option>";
                            $DaySelector.append(dayStr);
                        }
                    }
                }
                $MonthSelector.change(function () {
                    BuildDay();
                });
                $YearSelector.change(function () {
                    BuildDay();
                });
                if($DaySelector.attr("rel")!=""){
                    BuildDay();
                }
            } // End ms_DatePicker
    });
    })(jQuery);
</script>
<script language="javascript">
    $(function() {
        $.ms_DatePicker({
            YearSelector: "#select_year",
            MonthSelector: "#select_month",
            DaySelector: "#select_day"
        });

    });
</script>
@endsection

