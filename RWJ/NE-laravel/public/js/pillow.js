$(function(){
    // /*放大效果*/
    // $w = $('.pic').width();
    // $h = $('.pic').height();
    // $w2 = $w + 10;
    // $h2 = $h + 10;

    // $('.pic').hover(function(){
    //      $(this).stop().animate({height:$h2,width:$w2,left:"-5px",top:"-5px"},500);
    // },function(){
    //      $(this).stop().animate({height:$h,width:$w,left:"0px",top:"0px"},500);
    // });


    /*鼠标悬停效果*/
    $('.categoryGroup a').click(function(){
        $(this).addClass('active').siblings().removeClass('active');
    });


    var i,left,right,box,boxli,boxleng,width,dot,first,last,IsAuto;

    i = 0;

    left = $(".lb-left");

    right = $(".lb-right");

    box = $(".fadeDiv ol");

    boxli = $(".fadeDiv ol li");

    dotbox = $(".lb-ul");

    dot = $(".lb-ul").find("li");

    dot.eq(0).addClass(".fadeDiv .bt-st");

    boxleng = boxli.length;

    IsAuto = true;

    left.click(function(){
        if(box.is(":animated")){return}
        i--;
        if(i<0){i=boxleng-1};
        boxanimate();

    })

    right.click(function(){
        if(box.is(":animated")){return}
        i++;
        boxanimate();
    })

    function boxanimate(){
        if(i>boxleng-1){i=0}
        setTimeout(function(){
           /* boxli.stop().animate({opacity:0,"z-index":"1"},500).eq(i).stop().animate({opacity:1,"z-index":boxleng},500);
            bannerdot(i)*/
            boxli.eq(i).fadeIn(500).siblings().fadeOut(500);
        },400)
    }
    function bannerdot(i){
        if(i>boxleng-1){i=0}
        dot.removeClass("cur").eq(i).addClass("cur");
    }
})
