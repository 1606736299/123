@extends('layouts.header')
@section('title', '购物车')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/shop.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/shops.css')}}">
<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/shop.js')}}"></script>
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

    function validate(){
        // alert("结算");          //复选框的name='od'
        // $("input[name='check']").each(function(){
        //     if($(this).attr("checked")== 'checked'){                //是选中
        //         $("form").submit();
        //     }else{              //       td       tr
        //         $(this).parent().parent().find("input").removeAttr("name");
        //     }
        // });
        for (var i = 0; i < $("input[name='check[]']").length; i++) {


            if($("input[name='check[]']").eq(i).attr("checked") == 'checked'){                //是选中

                var pname = $("input[name='goods_name[]']").eq(i).next('a').html();
                var pspec = $("input[name='spec[]']").eq(i).next('span').html();
                var pprice = $("input[name='price[]']").eq(i).next('span').html();
                var pnum = $("input[name='num[]']").eq(i).next('input').val();

                $("input[name='goods_name[]']").eq(i).val(pname);
                $("input[name='spec[]']").eq(i).val(pspec);
                $("input[name='price[]']").eq(i).val(pprice);
                $("input[name='num[]']").eq(i).val(pnum);


                $("form").submit();
                // console.log(i);

            }
        }
    }


    $(function(){
        //查看是否收藏
        var id1 = $('.collect').attr("data-reactid");
        var ccc = $('.collect');
        var url = "{{url('/shop/select')}}";
        $.get(url,{id:id1},function(data){
            if(data == 1){
                ccc.html("移出收藏夹");
            }else{
                ccc.html("移入收藏夹");
            }
        })
    })

</script>
<content>
    <div id="j-cartPage">
        <div class="g-bd">
            <div class="g-row">
                <div class="m-cart">
                 <form action="{{url('wyyx/shoptobuy')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div id="j-cart-body">
                        <div style="display: none;"></div>
                        <div style="display: block;">
                            <div class="tt" style="height: 46px">
                                <div class="w w1 left">
                                    <div class="w-chkbox">
                                        <!-- <input  type="checkbox" class="all-checkbox" data-reactid=".2.0.0.0.1.0.0.0.0" checked=""> -->
                                        <a onclick="fun(1)" class="all w-button" style="margin-top:-3px;">全选/全不选
                                        </a>
                                    </div>
                                </div>
                                <div class="w w2 left" data-reactid=".2.0.0.0.1.0.1">商品信息</div>
                                <div class="w w3" data-reactid=".2.0.0.0.1.0.2">单价</div>
                                <div class="w w4" data-reactid=".2.0.0.0.1.0.3">数量</div>
                                <div class="w w-2 w5" data-reactid=".2.0.0.0.1.0.4">小计</div>
                                <div class="w w-1 w6" data-reactid=".2.0.0.0.1.0.5">操作</div>
                            </div>
                        </div>

                        <div style="display: block">
                            <div class="cart-group">
                                @foreach($shop as $k=>$v)
                                <div class="cart-item f-cb cart-item-last" style="height: 142px">
                                    <div class="item w7">
                                        <div class="ck">
                                            <div class="w-chkbox">
                                                <input type="checkbox" name="check[]" checked="" value="{{$v->name}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item w8">
                                        <div class="pic">
                                            <a href="" title="{{$v->name}}">
                                                <img src="{{url($v->image)}}" alt="{{$v->name}}">
                                            </a>
                                        </div>
                                        <div class="nameCon f-word-break f-text-overflow">
                                            <input type="hidden" name = "goods_name[]" value="">
                                            <a class="pname f-word-break f-text-overflow" href="{{url('wyyx/details',$v->pid)}}" target="_blank" data-reactid=".2.0.0.0.2.$0.3:$c14470440.1.1.0">{{$v->name}}</a>

                                            <div class="spec">
                                                <a href="" title="">
                                                    <input type="hidden" name="spec[]" value="">
                                                    <span>{{$v->spec}}</span>

                                                    <!-- <i class="w-icon-arrow arrow-down-hollow-gray-s" data-reactid=".2.0.0.0.2.$0.3:$c14470440.1.1.1.0.1"></i> -->
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item item-1 w3">
                                        <p class="price">
                                            <span class="aprice">
                                                <span data-reactid=".2.0.0.0.2.$0.3:$c14470440.2:$0.0.0.0">¥</span>
                                                <input type="hidden" name="price[]" value="">
                                                <span class="eprice" data-reactid=".2.0.0.0.2.$0.3:$c14470440.2:$0.0.0.0">{{$v->price}}</span>
                                            </span>

                                            <input type="hidden" value="{{$v->created_at}}" class="cerated_at">
                                            <div class="preselldesc f-word-break f-text-overflow"></div>
                                        </p>
                                    </div>
                                    <div class="item item-2 w4">
                                        <div>
                                            <div class="u-selnum u-selnum-cart">
                                                <span id="j-reduce" class="j-reduce less z-dis"><i class="hx"></i></span>
                                                <input type="hidden" name="num[]" value="">
                                                <input id="j-input" class="j-input" type="text" value="{{$v->count}}">
                                                <span id="j-add" class="j-add more">
                                                    <i class="hx"></i>
                                                    <i class="sx"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item item-3 w5">
                                        <p class="price sprice">
                                            <span class="lotprice" data-reactid=".2.0.0.0.2.$0.3:$c14470440.4.0.0">¥0.00</span>
                                        </p>
                                    </div>
                                    <div class="item item-5 w6">
                                        <div class="operate">
                                            <a class="collect" href="javascript:;" data-reactid="{{$v->id}}">移入收藏夹</a>
                                        </div>
                                        <div class="operate">
                                            <a class="del" href="javascript:;" data-reactid="{{$v->id}}">删除</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>

                    </div>
                    <div class="cart-total">
                        <div class="w-chkbox">
                            <!-- <input type="checkbox" checked="" data-reactid=".2.0.0.1.0.0"> -->
                            <span>
                                <span>已选（</span>
                                <span class="has-checked">0</span>
                                <span>）</span>
                            </span>
                            <!-- <a class="mgl30" href="javascript:;" data-reactid=".2.0.0.1.0.2">批量删除</a> -->
                            <!-- <a class="mgl30" href="javascript:;" data-reactid=".2.0.0.1.0.3">清空失效商品</a> -->
                        </div>
                        <div class="info f-fr">
                            <!-- <button type="button" class="w-button w-button-xl w-button-primary" data-reactid=".2.0.0.1.1.0">下单</button> -->
                            <input type="submit" class="w-button w-button-xl w-button-primary" value="下单" onclick="validate()">
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
                                <a class="freight-tip" target="_blank" href="javascript:;" data-reactid=".2.0.0.1.2.1.0">已免邮&gt;</a>
                            </div>
                        </div>
                    </div>
                  </form>
                </div>
                <div class="m-slickWarp">

                </div>
            </div>
        </div>
    </div>
</content>
<div style="clear: both">

</div>
<script>

</script>

@endsection