@extends('layouts.header')
@section('title', '购物车')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('/css/shop.css')}}">
<script type="text/javascript" src="{{asset('/js/jquery.js')}}"></script>
<content>
    <div class="g-row">
        <div class="m-cart">
            <div class="j-cart-body">
                <div style="display: none;">
                    <div class="cart-empty">
                        <div class="warp warp-1">
                            <img src="" alt="">
                        </div>
                    </div>
                </div>
                <div style="display: block;">
                    <div class="cart-empty">
                        <div class="eggContainer" style="left:-116px">
                            <div data-reactid=".2.0.0.0.4.0.0.0">
                                <div class="egg">
                                    <span class="text" data-reactid=".2.0.0.0.4.0.0.0.0.0"></span>
                                </div>
                                <div class="nestMask" data-reactid=".2.0.0.0.4.0.0.0.1"></div>
                                    <div class="nest" data-reactid=".2.0.0.0.4.0.0.0.2"></div>
                            </div>
                        </div>
                        <div class="warp">
                        <i class="w-icon-cart cart-emptycart" data-reactid=".2.0.0.0.4.0.1.0"></i>
                        <p class="text" data-reactid=".2.0.0.0.4.0.1.1">购物车还是空滴</p>
                        <p class="btnLine" data-reactid=".2.0.0.0.4.0.1.2"><a class="w-button w-button-ghost" href="/" data-reactid=".2.0.0.0.4.0.1.2.1">继续逛</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</content>
<script>
    $(function(){
        $('#bt-left').click(function(){
            $('.slick-track').animate({"left":'-960px'},500);
        })
        $('#bt-right').click(function(){
            $('.slick-track').animate({"left":'0'},500);
        })
    })
</script>

@endsection