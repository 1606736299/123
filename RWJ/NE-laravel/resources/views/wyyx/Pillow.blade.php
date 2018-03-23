@extends('layouts.header')
@section('title', '列表')
<link rel="stylesheet" href="{{asset('/css/Pillow.css')}}">
<link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
<script src="{{asset('/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/jquery.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/pillow.js')}}"></script>
@section('content')
<!-- 内容部份 -->
    <content>
        <div class="Content-bj">
            <div class="Content-row">
                <div class="Content-title">
                    <a href="/" style="color:#333;">首页</a>
                    <span class="ct-span">></span>
                    @foreach($info as $v)
                    <span>{{$v->name}}</span>
                    @endforeach
                </div>

                <div id="myCarousel" class="carousel slide">
                       <!-- 轮播（Carousel）指标 -->
                       <ol class="carousel-indicators">
                            @foreach($banner as $v)
                            <li data-target="#myCarousel" data-slide-to="0" class="{{$v->current}}"></li>
                            @endforeach
                       </ol>
                       <!-- 轮播（Carousel）项目 -->
                       <div class="carousel-inner">
                            @foreach($banner as $v)
                            <div class="item {{$v->current}}">
                                <img src="{{url($v->photo)}}" alt="First slide">
                            </div>
                            @endforeach
                       </div>
                       <!-- 轮播（Carousel）导航 -->
                       <a class="carousel-control left" href="#myCarousel"
                          data-slide="prev">&lsaquo;</a>
                       <a class="carousel-control right" href="#myCarousel"
                          data-slide="next">&rsaquo;</a>
                </div>
                <!-- 商品部分 -->
                <!-- 分类查询 -->
                <div class="Content-shop">
                <div class="con-top">
                    <div class="con-category">
                        <span class="first-sp">分类:</span>
                        <div class="categoryGroup">
                            <a href="javascript:;" class="active type_research" data-reactid="10">全部</a>
                            @foreach($type as $v)
                            <a href="javascript:;" class="type_research" data-reactid="20">{{$v->name}}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="con-area">
                        <span class="first-sp">排序:</span>
                        <div class="categoryGroup">
                            <a href="javascript:;" data-reactid="30" class="type_research active">默认</a>
                            <a href="javascript:;" data-reactid="40" class="type_research order_price">价格</a>
                            <!-- <div class="icon">
                                <i class="icon-t icon-top"></i>
                                <i class="icon-down icon-t"></i>
                            </div> -->
                            <a href="javascript:;" data-reactid="50" class="type_research">时间</a>
                            <!-- <i class="icon-t icon-r"></i> -->
                        </div>
                    </div>
                    </div>
                    <div id="content">
                        @foreach($type as $k=>$v)
                        <!-- 商品logo -->
                        <div class="cn-shop">
                            <div class="bz-logo">
                                <p class="logo-p">
                                <img src="{{url($v->icon)}}" alt="" style="float: left;margin-right: 10px;height: 44px;width: 44px;">
                                <span>{{$v->name}}</span>
                                </p>
                            </div>
                            <!-- 商品排列 -->
                            <ul class="shop-con"><!-- 在li中加a标签（只有此ul） -->
                                @foreach($content[$k] as $v1)
                                <li>
                                    <a href="{{url('wyyx/details',$v1->pid)}}">
                                        <div class="hd-mj">
                                            <div class="hd">
                                                <img src="{{url($v1->goods_img1)}}" alt="" style="" class="pic">
                                            </div>
                                            <div class="sp-time">
                                                <div class="sptime-text">
                                                    @if(($v1->is_best) == 1){
                                                        <p>精品</p>
                                                    }
                                                    @elseif(($v1->is_hot) == 1){
                                                        <p>热销</p>
                                                    }
                                                    @elseif(($v1->is_new) == 1){
                                                        <p>新品</p>
                                                    }
                                                    @elseif(!empty($v1->maker)){
                                                        <p>{{$v1->maker}}</p>
                                                    }
                                                    @endif
                                                </div>
                                                <h4>{{$v1->name}}</h4>
                                                <p style="color: #d4282d;">￥{{$v1->price}}.00</p>
                                                <div class="jk-rd">
                                                    <hr><p>{{$v1->goods_desc}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>

                            <div style="clear: both;"></div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </content>
    <!-- <a href="{{url('stu/fun')}}?a=1&b={{old('b')}}&c={{old('c')}}">1</a> -->
    <script>
    $(function(){
        //价格
        $(".order_price").toggle(
            function () {
                $(this).attr('data-reactid','41');
            },
            function () {
                $(this).attr('data-reactid','40');
            }
        );
        //时间--价格--默认
        $('.type_research').click(function(){
            // 获取两个查询条件,通过data-reactid属性
            var arr1 = $(".con-category a[class*='active']").attr('data-reactid');//分类--全部
            var arr2 = $(".con-area a[class*='active']").attr('data-reactid');//排序--默认
            var arr = arr1+'-'+arr2;
            if(arr1 == '10' && (arr2 == '30')){
                window.location.reload();
                return;
            }
            // 获取类别
            var name = $(".Content-title span:last-child").html();
            $.ajax({
                url: '/wyyx/Pillow2',
                type: "post",
                data: {'data':arr, 'type':$(".con-category a[class*='active']").html(), 'name':name, '_token': '{{csrf_token()}}'},
                success: function(data){
                     // alert(data);
                    console.log(data);
                    // 判断是否回到初始状态

                    // 获取数据的长度
                    var length = data.length;
                    var html = "";
                    // 循环遍历数据
                    for(var i=0;i<length;i++){
                        html =  html+
                            '<li>'+
                                '<a href="{{url('wyyx/details')}}/'+data[i].pid+'">'+
                                    '<div class="hd-mj">'+
                                        '<div class="hd">'+
                                            '<img src="'+data[i].goods_img1+'" alt="" style="" class="pic">'+
                                        '</div>'+
                                        '<div class="sp-time">'+
                                            '<div class="sptime-text">'+
                                                '@if(('+data[i].is_best+') == 1){'+
                                                    '<p>精品</p>'+
                                                '}'+
                                                '@elseif(('+data[i].is_hot+') == 1){'+
                                                    '<p>热销</p>'+
                                                '}'+
                                                '@elseif(('+data[i].new+') == 1){'+
                                                    '<p>新品</p>'+
                                                '}'+
                                                '@elseif(!empty('+data[i].maker+')){'+
                                                    '<p>'+data[i].maker+'</p>'+
                                                '}'+
                                                '@endif'+
                                            '</div>'+
                                            '<h4>'+data[i].name+'</h4>'+
                                            '<p style="color: #d4282d;">￥'+data[i].price+'.00</p>'+
                                            '<div class="jk-rd">'+
                                                '<hr><p>'+data[i].goods_desc+'</p>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</a>'+
                            '</li>';
                    }
                    // 拼接html
                    var task = '<ul class="shop-con clearfix mt25">'+html+'</ul>';
                    // 写入
                    $("#content").html(task);


                }
            });



        })
    })

    </script>
@endsection
