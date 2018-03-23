@extends('layouts.header')
@section('title', '购物车')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/buy.css')}}">
<!-- <link rel="stylesheet" type="text/css" href="{{asset('css/address.css')}}"> -->
<link rel="stylesheet" type="text/css" href="{{asset('css/buy_nad1.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/buy_nad2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
<script type="text/javascript" src="{{asset('js/shop3.js')}}"></script>
<script class="resources library" src="{{asset('js/area.js')}}" type="text/javascript"></script>
<script class="resources library" src="{{asset('js/area2.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/shop.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/shops.css')}}">
<script>
    // 全选


    // 如果有一个商品为false则全选为false
    if($(":checkbox").attr("checked") == false){
        $('.all-checkbox').attr('checked',false);
    }

    function fun(b){
        //获取input节点对象
        var input = $('input');
        for(var i in input){
            switch(b){
                case 1:input[i].checked=!input[i].checked;break;
            }

        }
    }


</script>
<style type="text/css">
    #hidde{
        display: none;
    }
    select.addrsnc{
        width:170px;
        font-size: 14px;
        line-height: 14px;
        border:1px solid #ddd;
        background: #fff;
        height:28px;
        color: #333;
        outline: none;
        margin-right: 10px;
        float: left;
    }
    .cl:after{
        content: "";
        height: 0;
        display: block;
        clear: both;
        overflow: hidden;
    }
</style>

<div class="g-bd f-margin-top-50">
    <div class="g-row">
        <div id="confirmRoot">
            <div>
                <div class="m-panel">
                <div class="w-panel g-panel">
                    <div class="hd f-fz14">
                        <span data-reactid=".2.0.0.0.0">收货信息</span>
                    </div>

                    <!-- 用户地址栏 -->
                    <div class="bd">
                        <div class="m-orderAddress" style="">

                            <!-- 默认地址 -->
                            <table width="100%" class="table">
                            @foreach($address as $ds)
                                <tr>
                                    <td>地址</td>
                                    <td>收货人</td>
                                    <td>联系电话</td>
                                    <td>操作</td>
                                </tr>
                                <tr>
                                    <td>{{$ds->province}}{{$ds->city}}{{$ds->county}}{{$ds->detailed}}</td>
                                    <td>{{$ds->consignee}}</td>
                                    <td>{{$ds->phone}}</td>
                                    <td><a href="{{url('/as')}}">修改地址</a></td>
                                </tr>
                            @endforeach
                            </table>

                        </div>
                    </div>
                    <div style="clear: both;">

                    </div>
                </div>
                </div>
                <div class="g-itemInfo" data-reactid=".2.3">

                    <div class="m-cart">
                    <div id="j-cart-body">
                        <div style="display: none;"></div>
                        <div style="display: block;">
                            <div class="tt" style="height: 46px">
                                <div class="w w1 left">
                                    <div class="w-chkbox">
                                        <!-- <input type="checkbox" data-reactid=".2.0.0.0.1.0.0.0.0"> -->
                                        <span class="all" data-reactid=".2.0.0.0.1.0.0.0.1">全选</span>
                  <!--                       <button onclick="fun(1)" class="all w-button" style="margin-top:-3px;">全选/全不选</button> -->
                                    </div>
                                </div>
                                <div class="w w2 left" data-reactid=".2.0.0.0.1.0.1">商品信息</div>
                                <div class="w w3" data-reactid=".2.0.0.0.1.0.2">单价</div>
                                <div class="w w4" data-reactid=".2.0.0.0.1.0.3">数量</div>
                                <div class="w w-2 w5" data-reactid=".2.0.0.0.1.0.4">小计</div>
                                <!-- <div class="w w-1 w6" data-reactid=".2.0.0.0.1.0.5">操作</div> -->
                            </div>
                        </div>
                        <div style="display: block">
                            <div class="cart-group">
                            <form action="{{url('wyyx/zhifu')}}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                @foreach($gs as $v)
                                <div class="cart-item f-cb cart-item-last" style="height: 142px">
                                    <div class="item w7">
                                        <div class="ck">
                                            <div class="w-chkbox">
                                                <input type="checkbox" disabled="" class="" title="" checked="" data-reactid=".2.0.0.0.2.$0.3:$c14470440.0.0.0.0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item w8">
                                        <div class="pic">
                                            <a href="" title="{{$v->name}}">
                                                <img src="{{url($v->image)}}" alt="{{$v->name}}">
                                            </a>
                                            <input type="hidden" name = "goods_name[]" value="{{$v->name}}">
                                        </div>
                                        <div class="nameCon f-word-break f-text-overflow">
                                            <a class="pname f-word-break f-text-overflow" href="{{url('wyyx/details',$v->pid)}}" target="_blank" data-reactid=".2.0.0.0.2.$0.3:$c14470440.1.1.0">{{$v->name}}</a>
                                            <div class="spec">
                                                <a href="javascript:;" title="">
                                                    <span>{{$v->spec}}</span>
                                                    <!-- <i class="w-icon-arrow arrow-down-hollow-gray-s" data-reactid=".2.0.0.0.2.$0.3:$c14470440.1.1.1.0.1"></i> -->
                                                    <input type="hidden" name="spec[]" value="{{$v->spec}}">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item item-1 w3">
                                        <p class="price">
                                            <span class="aprice">
                                                <span data-reactid=".2.0.0.0.2.$0.3:$c14470440.2:$0.0.0.0">¥</span>
                                                <span class="eprice" data-reactid=".2.0.0.0.2.$0.3:$c14470440.2:$0.0.0.0">{{$v->price}}.00</span>
                                            </span>
                                            <input type="hidden" value="{{$v->created_at}}" class="cerated_at">
                                            <input type="hidden" name="price[]" value="{{$v->price}}">
                                            <div class="preselldesc f-word-break f-text-overflow"></div>
                                        </p>
                                    </div>
                                    <div class="item item-2 w4">
                                        <div>
                                            <div class="u-selnum u-selnum-cart">
                                                <!-- <span class="j-reduce less z-dis"><i class="hx"></i></span> -->
                                                <input class="j-input" type="text" value="{{$v->count}}" name="num[]">
                                                <!-- <span class="j-add more">
                                                    <i class="hx"></i>
                                                    <i class="sx"></i>
                                                </span> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item item-3 w5">
                                        <p class="price sprice">
                                            <span class="lotprice" data-reactid=".2.0.0.0.2.$0.3:$c14470440.4.0.0">¥0.00</span>
                                        </p>
                                    </div>
                                    <!-- <div class="item item-5 w6">
                                        <div class="operate">
                                            <a href="javascript:void(0);" data-reactid=".2.0.0.0.2.$0.3:$c14470440.5.0.0">移入收藏夹</a>
                                        </div>
                                        <div class="operate" data-reactid=".2.0.0.0.2.$0.3:$c14470440.5.1"><a class="del" href="javascript:void(0);" data-reactid=".2.0.0.0.2.$0.3:$c14470440.5.1.0">删除</a></div>
                                    </div> -->
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <div class="cart-total">
                        <div class="w-chkbox">
                            <span>
                                <span>已选（</span>
                                <span class="has-checked">0</span>
                                <span>）</span>
                            </span>
                            <!-- <a class="mgl30" href="javascript:;" data-reactid=".2.0.0.1.0.2">批量删除</a>
                            <a class="mgl30" href="javascript:;" data-reactid=".2.0.0.1.0.3">清空失效商品</a> -->
                        </div>
                        <div class="info f-fr">
                            <button type="button" class="payment w-button w-button-xl w-button-primary" data-reactid=".2.0.0.1.1.0">支付</button>
                        </div>
                        <div class="info f-fr mgr25">
                            <div class="line">
                                <span class="mgr f-fr">
                                    <span class="label f-fl" data-reactid=".2.0.0.1.2.0.0.0">应付总额：</span>
                                    <span class="price f-fl">
                                        <span class="lastprice" data-reactid=".2.0.0.1.2.0.0.1.0">¥0.00</span>
                                    </span>
                                </span>
                                <div class="tip f-fr">
                                    <span class="item" data-reactid=".2.0.0.1.2.0.1.0">商品合计&nbsp;:&nbsp;</span>
                                    <span class="con mgr10">
                                        <span class="allprice" data-reactid=".2.0.0.1.2.0.1.1.0">¥0.00</span>
                                    </span>
                                    <span class="item" data-reactid=".2.0.0.1.2.0.1.2">活动优惠&nbsp;:&nbsp;</span>
                                    <span class="con">
                                        <span class="reduce" data-reactid=".2.0.0.1.2.0.1.3.0">-¥0.00</span>
                                    </span>
                                </div>
                            </div>
                            <div class="line line-1">
                                <a class="freight-tip" target="_blank" href="/cart/itemPool?promotionId=0&amp;priceRangeId=0" data-reactid=".2.0.0.1.2.1.0">已免邮&gt;</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="width: 1090px;margin:0 auto;height:50px;background: #f5f5f5;display: none;margin-top:-39px;" class="pass">
                    <input type="password" name="password" style="margin-left: 20px;width:30%;display: inline;margin-top: 8px;" placeholder="请输入支付密码" class="form-control">
                    <input type="submit" class="submit btn btn-default" value="提交" style="">
                    <span class="ttt"></span>
                </div>
                </form>

         <!--            <div class="m-agreement" data-reactid=".2.3.3">
                        <a class="w-link agreement" href="/help#agreement" data-reactid=".2.3.3.0">同意《严选平台服务协议》</a>
                        <div class="w-chkbox checkbox" data-reactid=".2.3.3.1">
                            <input type="checkbox" checked="" data-reactid=".2.3.3.1.0">
                        </div>
                    </div> -->


                </div>
            </div>
        </div>
    </div>
</div>
<!-- 地址切换 -->
<div id="all_adds" style="display: none;">
<div class="m-overlay m-overlay-ani" style="z-index: 9999999" id="all_add">
    <div class="w-mask w-mask-ani j-mask f-ani-mask"></div>
    <div class="contentWrap">
        <div class="m-pop f-scroll-y overlay-container-ani f-tlbr j-overlay-container m-pop-changeAddr f-ani-bouncein" style="display: block;width: 660px">
            <div class="j-w-dialog-body" style="left: 395.5px; top: 279px;">
                <div class="j-w-dialog-head">
                    <div class="w-close j-close-pop" id="add_hidde"></div>
                </div>
                <div class="popwin-bd j-w-dialog-content">
                    <div id="j-address-change-1510126636901">
                        <div>
                            <div class="w-tit-addr" data-reactid=".3.0">选择地址</div>
                            <div class="w-body-addr">
                            @foreach($address as $dr)
                                <div class="w-addr-warp j-addr">
                                    <div class="m-address">
                                        <p class="line">
                                            <label class="label" data-reactid=".3.1.$0.0.0.0">
                                                <span class="textLeft" data-reactid=".3.1.$0.0.0.0.0">收&nbsp;货&nbsp; 人：</span>
                                            </label>
                                            <span class="text" id="consign2" data-reactid=".3.1.$0.0.0.1">{{$dr->consignee}}</span>
                                        </p>
                                        <div style="clear: both;"></div>
                                        <p class="line" data-reactid=".3.1.$0.0.1">
                                            <label class="label" data-reactid=".3.1.$0.0.1.0">联系方式：</label>
                                            <span class="text" id="phon2" data-reactid=".3.1.$0.0.1.1">{{$dr->phone}}</span>
                                        </p>
                                        <div style="clear: both;"></div>
                                        <p class="line" data-reactid=".3.1.$0.0.2">
                                            <label class="label" data-reactid=".3.1.$0.0.2.0">收货地址：</label>
                                            <span class="text f-breakall" id="addre2" data-reactid=".3.1.$0.0.2.1">{{$dr->province}}{{$dr->city}}{{$dr->county}}{{$dr->detailed}}</span>
                                        </p>
                                        <br>
                                    </div>
                                    <i class="icon w-icon-normal icon-normal-spec-arrow" data-reactid=".3.1.$0.1"></i>
                                </div>
                            @endforeach
                            </div>
                            <div style="margin:31px 0 0 80px;position: relative;">
                                <button type="button" class="w-button w-button-primary w-button-l j-ok w-button-forbid" style="margin-left: 45px;">确定</button>
                                <button type="button" class="w-button w-button-l j-cancel" style="margin-left: 5px;">取消</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script>

    $(".payment").click(function(){
        $(".pass").show();

    })
    var aaa = '';
    $(".submit").mouseover(function(){
        var pass = $("input[name='password']").val();


        if(pass){
            var url =  "{{url('wyyx/buy_yz')}}";
            $.get(url,{pass:pass},function(data){
                if(data == 3){
                    $(".ttt").html("支付密码正确").css("color","green");
                    aaa = 1;
                }else{
                    $(".ttt").html("支付密码错误").css("color","red");
                    $("..submit").attr("disabled");
                    aaa = 2;
                }
            })
        }else{
            $(".ttt").html("请输入支付密码").css("color","red");
        }
    }).click(function(){
        if(aaa == 1){

        }else{
           return false;
        }

    })
</script>


@endsection