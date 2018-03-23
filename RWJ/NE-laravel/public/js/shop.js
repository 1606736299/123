$(function(){
    $('#bt-left').click(function(){
        $('.slick-track').animate({"left":'-960px'},500);
    })
    $('#bt-right').click(function(){
        $('.slick-track').animate({"left":'0'},500);
    })



    // 已选--所有
    var has = $(':checkbox').length;
    // alert(has);
    $('.has-checked').html(has);


    // 发货时间
    for (var j = 0; j < $('.cerated_at').length; j++){
        var now = new Date();
        var hour = now.getHours();       //获取当前小时数(0-23)
        var month = now.getMonth()+1;
        var year = now.getFullYear();
        var day = now.getDate();

        // 判断时间是否超过晚上22点
        if(parseInt(hour) > 22){
            var arr1 = [1,3,5,7,8,10,12];
            var arr2 = [2];
            if($.inArray(month, arr1) != -1){
                if(day == 31){
                    day = 1;
                    month+1;
                }else{
                    day++;
                }
            }else if($.inArray(month, arr2) != -1){
                if(year%4 == 0){
                    if(day == 29){
                        day = 1;
                        month+1;
                    }else{
                        day++;
                    }
                }else{
                    if(day == 28){
                        day = 1;
                        month+1;
                    }else{
                        day++;
                    }
                }
            }else{
                if(day == 30){
                    day = 1;
                    month+1;
                }else{
                    day++;
                }
            }
        }else{
            var day = now.getDate();
        }
        if(month > 12){
            month = 1;
        }
        var info = '预计'+month+'月'+day+'日发货';
        $('.preselldesc').eq(j).html(info);
    }


     // 商品数量
   for(var h = 0;h < $('.j-input').length; h++){
        if($('.j-input').eq(h).val() == 1){
            $('.j-reduce').eq(h).addClass('z-dis');
        }else{
            $('.j-reduce').eq(h).removeClass('z-dis');
        }

    }

    // more
    $('.j-add').click(function(){
        // alert(value);
        var num = $(this).parent().children(".j-input").val();
        // console.log(num);
        $(this).parent().children(".j-input").val(parseInt(num)+1);
        $(this).parent().children(".j-reduce").removeClass('z-dis');
        $('.j-input').change();
        // if(num>2){
        //     $(this).parent().children(".j-reduce").removeClass('z-dis');
        // }
    })
    // less
    $('.j-reduce').click(function(){
        var num = $(this).parent().children(".j-input").val();
        if(num==1){
            $(this).addClass('z-dis');
        }else{
            $(this).parent().children(".j-input").val(parseInt(num)-1);
            $('.j-input').change();
        }
    })



    // 商品价格小计


    change();
    $('.j-input').change(change);

    // 监控多选框的变化,重新计算价格
    $(':checkbox').change(change);

    // 监控全选按钮,重新计算价格
    $('.all').click(change);

    // 计算价格方法
    function change(){
        // all为各商品总价
        var all = 0;
        for (var i = 0; i < $('.lotprice').length; i++) {
            // 商品价格
            var aprice = parseInt($('.eprice').eq(i).html());
            var acount = parseInt($('.j-input').eq(i).val());
            // console.log(acount);
            lotprice = '¥'+aprice*acount+'.00';
            $('.lotprice').eq(i).html(lotprice);
            // 获取总价
            if ($(':checkbox').eq(i).attr('checked')) {
                all+=aprice*acount;
            }
        }
        allprice = '¥'+all+'.00';
        $('.allprice').html(allprice);

        //获取优惠减价
        var re = $('.reduce').html();
        // 拆分获取价格
        var arr3 = re.split('.');
        arr4 = arr3[0].split('¥');

        // 得到应付总额
        var last = all-arr4[1];
        // console.log(last);
        lastprice = '¥'+last+'.00';
        $('.lastprice').html(lastprice);

        // input添加name
        // $("input[name='goods_name[]']").removeAttr('name');
    }

    // 删除
    $('.del').click(function(){
        var msg = "您确定要删除吗?";
        var qqq = $(this);
        if(confirm(msg)==true){
            var id = $(this).attr("data-reactid");
            $.ajax({
                url: '/shop/del',
                type: 'get',
                data: {'id':id},
                success: function(data){
                    qqq.parents(".cart-item").remove();
                    alert("删除成功");
                }

            });
        }else{
            return false;
        }
    })

    // 收藏
    $('.collect').click(function(){
        var eee = $(this);
        var id = $(this).attr("data-reactid");
        if(eee.html() == "移入收藏夹"){
            $.ajax({
                url: '/shop/collect',
                type: 'get',
                data: {'id':id},
                success: function(data){
                    eee.html("移出收藏夹");
                }
            });

        }else if(eee.html() == "移出收藏夹"){
            $.ajax({
                url: '/shop/delcollect',
                type: 'get',
                data: {'id':id},
                success: function(data){
                    eee.html("移入收藏夹");
                }
            });
        }

    })
})