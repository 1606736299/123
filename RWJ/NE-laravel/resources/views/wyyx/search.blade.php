@extends('layouts.header')
@section('title', '列表')
<link rel="stylesheet" href="{{asset('/css/Pillow.css')}}">
<link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
<script src="{{asset('/js/jquery.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/jquery.js')}}"></script>
<script src="{{asset('/js/pillow.js')}}"></script>
@section('content')
<!-- 内容部份 -->
    <content>
        <div class="Content-bj">
            <div class="Content-row">
                <div class="Content-title">
                    <a href="/" style="color:#333;">首页</a>
                    <span class="ct-span">></span>
                    @foreach($arr as $k=>$v)
                    <span>{{$v}}</span>
                    @endforeach
                </div>
                <!-- 商品部分 -->
                <!-- 分类查询 -->
                <div class="Content-shop" style="top:0;">
                <div class="con-top" style="margin-top:0;">

                    <div class="con-area" style="border:none;">
                        <span class="first-sp">排序:</span>
                        <div class="categoryGroup">
                            <a href="javascript:;" data-reactid="30" class="type_research active">默认</a>
                            <a href="javascript:;" data-reactid="40" class="type_research order_price">价格</a>
                            <a href="javascript:;" data-reactid="50" class="type_research">时间</a>
                        </div>
                    </div>
                    </div>
                    <div id="content">

                        <div class="cn-shop">
                            <!-- 商品排列 -->
                            <ul class="shop-con"><!-- 在li中加a标签（只有此ul） -->
                                @foreach($search as $v)
                                <li>
                                    <a href="{{url('wyyx/details',$v->pid)}}">
                                        <div class="hd-mj">
                                            <div class="hd">
                                                <img src="{{url($v->goods_img1)}}" alt="" style="" class="pic">
                                            </div>
                                            <div class="sp-time">
                                                <div class="sptime-text">
                                                    @if(($v->is_best) == 1){
                                                        <p>精品</p>
                                                    }
                                                    @elseif(($v->is_hot) == 1){
                                                        <p>热销</p>
                                                    }
                                                    @elseif(($v->is_new) == 1){
                                                        <p>新品</p>
                                                    }
                                                    @elseif(!empty($v->maker)){
                                                        <p>{{$v->maker}}</p>
                                                    }
                                                    @endif
                                                </div>
                                                <h4>{{$v->name}}</h4>
                                                <p style="color: #d4282d;">￥{{$v->price}}.00</p>
                                                <div class="jk-rd">
                                                    <hr><p>{{$v->goods_desc}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>

                            <div style="clear: both;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </content>
    <script>
    $(function(){
        $(".order_price").toggle(
            function () {
                $(this).attr('data-reactid','41');
            },
            function () {
                $(this).attr('data-reactid','40');
            }
        );
        $('.type_research').click(function(){
            // 获取两个查询条件,通过data-reactid属性

            var arr = $(".con-area a[class*='active']").attr('data-reactid');
            var name = $('.Content-title span:last-child').html();
            // alert(name);
            $.ajax({
                url: '/wyyx/research',
                type: "get",
                data: {'arr':arr,'name':name},
                success: function(data){
                    console.log(data);

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
                                                    '@elseif(('+data[i].hot+') == 1){'+
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
