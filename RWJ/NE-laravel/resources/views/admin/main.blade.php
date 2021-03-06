<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>H+ 后台主题UI框架 - 首页示例三</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico"> <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">

    <!-- Morris -->
    <link href="{{asset('css/plugins/morris/morris-0.4.3.min.css')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <style type="text/css" media="screen">
        #can{
            display: none;
        }
    </style>
</head>

<body class="gray-bg sidebar-content">
<canvas id="can" width="400" height="400" style="background: Black;"></canvas>
<button type="" onclick="go()" id="can"><a id="kai">开始</a></button>
    <script>
       function go(){
         var sn = [ 42, 41 ], dz = 43, fx = 1, n, ctx = document.getElementById("can").getContext("2d");
        function draw(t, c) {
            ctx.fillStyle = c;
            ctx.fillRect(t % 20 * 20 + 1, ~~(t / 20) * 20 + 1, 18, 18);
        }
        document.onkeydown = function(e) {
            fx = sn[1] - sn[0] == (n = [ -1, -20, 1, 20 ][(e || event).keyCode - 37] || fx) ? fx : n
        };
        !function() {
            sn.unshift(n = sn[0] + fx);
            if (sn.indexOf(n, 1) > 0 || n<0||n>399 || fx == 1 && n % 20 == 0 || fx == -1 && n % 20 == 19)
                return alert("GAME OVER");
            draw(n, "Lime");
            if (n == dz) {
                while (sn.indexOf(dz = ~~(Math.random() * 400)) >= 0);
                draw(dz, "Yellow");
            } else
                draw(sn.pop(), "Black");
                setTimeout(arguments.callee, 130);
        }();
       }
    </script>

    <div class="sidebard-panel">
        <div>
            <h4>消息 <span class="badge badge-info pull-right">{{count($list2)}}</span></h4>
            <!-- <div class="feed-element">
                <a href="index_3.html#" class="pull-left">
                    <img alt="image" class="img-circle" src="img/a1.jpg">
                </a>
                <div class="media-body">
                    跑步呐，最重要的是要有动力
                    <br>
                    <small class="text-muted">今天 4:21</small>
                </div>
            </div> -->
            <!-- <div class="feed-element">
                <a href="index_3.html#" class="pull-left">
                    <img alt="image" class="img-circle" src="img/a2.jpg">
                </a>
                <div class="media-body">
                    V信已经提前恢复，也算是个好消息吧
                    <br>
                    <small class="text-muted">昨天 2:45</small>
                </div>
            </div> -->

            @foreach($num as $v)
            <p>登陆次数:{{$v->num}}</p>
            @endforeach

            @foreach($users as $v3)
            <div class="feed-element">
                <a href="index_3.html#" class="pull-left">
                    <img alt="image" class="img-circle" src="{{$v3->img}}">
                </a>
                <div class="media-body">
                    {{$v3->content}}
                    <br>
                    <small class="text-muted">{{$v3->created_at}}</small>
                </div>
            </div>
            @endforeach
            <!-- <div class="feed-element">
                <a href="index_3.html#" class="pull-left">
                    <img alt="image" class="img-circle" src="img/a4.jpg">
                </a>
                <div class="media-body">
                    发布了一篇文章
                    <br>
                    <small class="text-muted">星期一 8:37</small>
                </div>
            </div> -->
        </div>
    </div>
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div>
                            <span class="pull-right text-right">
                                        <small>在过去销售额最高的地区： <strong>{{$zuiduo}}</strong></small>
                                            <br/>
                                            共销售：{{$cc}}
                                        </span>
                            <h1 class="m-b-xs">￥{{$gg}}</h1>
                            <h3 class="font-bold no-margins">
                                            产品销售额
                                        </h3>
                            <small>市场部</small>
                        </div>

                        <div class="flot-chart" style="height: 140px">
                            <div class="flot-chart-content" id="flot-chart3">
                                <img src="" alt="">
                            </div>
                        </div>

                        <div class="m-t-md">
<!--                             <small class="pull-right">
                                        <i class="fa fa-clock-o"> </i>
                                        最后更新：2014.11.11
                                    </small>
                            <small>
                                       <strong>销售分析：</strong> 该值已随时间发生变化，上个月达到的水平超过50,000元。
                                   </small> -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>用户产品列表</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <table class="table table-hover no-margins">
                                    <thead>
                                        <tr>
                                            <th>状态</th>
                                            <th>日期</th>
                                            <th>用户</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list1 as $v1)
                                        <tr>
                                        @if($v1->status==0)
                                            <td><small>未付款</small></td>
                                            @elseif($v1->status==1)
                                            <td><small>已付款</small></td>
                                             @elseif($v1->status==2)
                                            <td><small>待发货</small></td>
                                             @elseif($v1->status==3)
                                            <td><small>已发货</small></td>
                                             @elseif($v1->status==4)
                                            <td><small>待评价</small></td>
                                             @elseif($v1->status==5)
                                            <td><small>完成</small></td>
                                            @endif
                                            <td><i class="fa fa-clock-o"></i>{{$v1->created_at}}</td>
                                            <td>{{$v1->member}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        <div class="row">

            <div class="col-sm-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right">全部</span>
                        <h5>用户数量</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{count($list)}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right">全部</span>
                        <h5>商品数量</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{count($count)}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-warning pull-right">全部</span>
                        <h5>商品总价</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">￥{{$specs}}</h1>
                    </div>
                </div>
            </div>
        </div>


    <!-- 全局js -->
    <script src="{{asset('js/jquery1.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>



    <!-- Flot -->
    <script src="{{asset('js/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('js/plugins/flot/jquery.flot.spline.js')}}"></script>
    <script src="{{asset('js/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('js/plugins/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('js/plugins/flot/jquery.flot.symbol.js')}}"></script>
    <script src="{{asset('js/plugins/flot/curvedLines.js')}}"></script>

    <!-- Peity -->
    <script src="{{asset('js/plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{asset('js/demo/peity-demo.js')}}"></script>

    <!-- 自定义js -->
    <script src="{{asset('js/content.js')}}"></script>


    <!-- jQuery UI -->
    <script src="{{asset('js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <!-- Jvectormap -->
    <script src="{{asset('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

    <!-- EayPIE -->
    <script src="{{asset('js/plugins/easypiechart/jquery.easypiechart.js')}}"></script>

    <!-- Sparkline -->
    <script src="{{asset('js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Sparkline demo data  -->
    <script src="{{asset('js/demo/sparkline-demo.js')}}"></script>

    <script>

        $(document).ready(function () {
            $('.chart').easyPieChart({
                barColor: '#f8ac59',
                //                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            $('.chart2').easyPieChart({
                barColor: '#1c84c6',
                //                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            var d1 = [
                [1262304000000, 1],
                [1264982400000, 100],
                [1267401600000, 1],
                [1270080000000, 200],
                [1272672000000, 1],
                [1275350400000, 100],
                [1277942400000, 1],
                [1280620800000, 300]
            ];
            var d2 = [
                [1262304000000, 100],
                [1264982400000, 1],
                [1267401600000, 150],
                [1270080000000, 1],
                [1272672000000, 230],
                [1275350400000, 1],
                [1277942400000, 150],
                [1280620800000, 10]
            ];

            var data3 = [
                {
                    label: "Data 1",
                    data: d1,
                    color: '#23c6c8'
                },
                {
                    label: "Data 2",
                    data: d2,
                    color: '#1ab394'
                }
            ];
            $.plot($("#flot-chart3"), data3, {
                xaxis: {
                    tickDecimals: 0
                },
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 1
                            }, {
                                opacity: 1
                            }]
                        },
                    },
                    curvedLines: {
                        active: true,
                        fit: true,
                        apply: true
                    },
                    points: {
                        width: 0.1,
                        show: false
                    },
                },
                grid: {
                    show: false,
                    borderWidth: 0
                },
                legend: {
                    show: false,
                }
            });


            var mapData = {
                "US": 298,
                "SA": 200,
                "DE": 220,
                "FR": 540,
                "CN": 120,
                "AU": 760,
                "BR": 550,
                "IN": 200,
                "GB": 120,
            };

            $('#world-map').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 0.9,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 0
                    }
                },

                series: {
                    regions: [{
                        values: mapData,
                        scale: ["#1ab394", "#22d6b1"],
                        normalizeFunction: 'polynomial'
                    }]
                },
            });
        });
    </script>

    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
    <!--统计代码，可删除-->

</body>

</html>
