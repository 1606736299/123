<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>H+ 后台主题UI框架 - Bootstrap Table</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">
    <!-- <link rel="shortcut icon" href="{{asset('favicon.ico')}}"> -->
    <link href="{{asset('css/bootstrap.min.css?v=3.3.6')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css?v=4.4.0')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/bootstrap-table/bootstrap-table.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css?v=4.1.0')}}" rel="stylesheet">
    <style>
        .enable-button{
            background-color: #1ab394;
            border:1px solid #1ab394;
            border-radius: 3px;
            color: #fff;
        }
        .enable-button:hover{

            background-color: #18a689;
            border:1px solid #18a689;
            color: #fff;
        }
        .disable-button{
            color: #fff;
            background-color: #c2c2c2;
            border:1px solid #c2c2c2;
            border-radius: 3px;
        }
        .disable-button:hover{
            color: #fff;
            background-color: #e6e6e6;
            border:1px solid #adadad;
            border-radius: 3px;
        }
    </style>

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <!-- Panel Style -->
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>订单列表</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
                <div class="input-group col-sm-3" style="float: right;position: relative;bottom:8px;">
                    <form action="{{url('order/search')}}" style="margin-right: 10px;display: inherit;" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="text" class="form-control" name="keywords">
                        <span class="input-group-btn">
                            <input type="submit" class="btn btn-primary" value="搜索">
                        </span>
                    </form>
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-primary" onclick="window.location.reload()">刷新</button>
                    </span>
                    <div style="width: 10px;"></div>
                </div>

            </div>
            <div class="ibox-content">
                <div class="row row-lg">
                    <div class="col-sm-12">
                        <!-- Example Classes -->
                        <div class="example-wrap">
                            <div class="example">
                                <table data-toggle="table" data-classes="table table-hover table-condensed" data-striped="true" data-mobile-responsive="true">
                                    <thead>
                                        <tr>
                                            <th data-field="1">ID</th>
                                            <th data-field="4">订单号</th>
                                            <th data-field="2">用户名</th>
                                            <th data-field="3">手机号</th>
                                            <th data-field="5">收货地址</th>
                                            <th data-field="8">添加时间</th>
                                            <th data-field="6">状态</th>
                                            <th data-field="10">操作</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($list as $v)
                                        <tr>
                                            <td>{{$v->id}}</td>
                                            <td>{{$v->order_sn}}</td>
                                            <td>{{$v->member}}</td>
                                            <td>{{$v->phone}}</td>
                                            <td>{{$v->address}}</td>
                                            <td>{{$v->created_at}}</td>
                                            @if ($v->status == 0)
                                                <td>未付款</td>
                                                <td>
                                                    <a href="{{url('order/order_fh',$v->id)}}">发货</a>&nbsp;&nbsp;&nbsp;
                                                    <a href="{{url('order/info',$v->id)}}">详情</a>
                                                </td>
                                            @elseif($v->status == 1)
                                                <td>待发货</td>
                                                <td>
                                                    <a href="{{url('order/order_fh',$v->id)}}">发货</a>&nbsp;&nbsp;&nbsp;
                                                    <a href="{{url('order/info',$v->id)}}">详情</a>
                                                </td>
                                            @elseif($v->status == 2)
                                                <td>待收货</td>
                                                <td>
                                                    <a href="javascript:;">无</a>&nbsp;&nbsp;&nbsp;
                                                    <a href="{{url('order/info',$v->id)}}">详情</a>
                                                </td>
                                            @elseif($v->status == 3)
                                                <td>待评价</td>
                                                <td>
                                                    <a href="javascript:;">无</a>&nbsp;&nbsp;&nbsp;
                                                    <a href="{{url('order/info',$v->id)}}">详情</a>
                                                </td>
                                            @elseif($v->status == 4)
                                                <td>订单完成</td>
                                                <td>
                                                    <a href="javascript:;">无</a>&nbsp;&nbsp;&nbsp;
                                                    <a href="{{url('order/info',$v->id)}}">详情</a>
                                                </td>
                                            @elseif($v->status == 5)
                                                <td>订单完成</td>
                                                <td>
                                                    <a href="javascript:;">无</a>&nbsp;&nbsp;&nbsp;
                                                    <a href="{{url('order/info',$v->id)}}">详情</a>
                                                </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if (isset($keywords))
                                    {!! $list->appends(['keywords' => "$keywords"])->render() !!}
                                @else
                                    {!! $list->render() !!}
                                @endif
                            </div>
                        </div>
                        <!-- End Example Classes -->
                    </div>


                    <div class="clearfix hidden-xs"></div>
                </div>
            </div>
        </div>
        <!-- End Panel Style -->
    </div>

    <!-- 全局js -->
    <script src="{{asset('js/jquery1.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js?v=3.3.6')}}"></script>

    <!-- 自定义js -->
    <script src="{{asset('js/content.js?v=1.0.0')}}"></script>


    <!-- Bootstrap table -->
    <script src="{{asset('js/plugins/bootstrap-table/bootstrap-table.min.js')}}"></script>
    <script src="{{asset('js/plugins/bootstrap-table/bootstrap-table-mobile.min.js')}}"></script>
    <script src="{{asset('js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js')}}"></script>

    <!-- Peity -->
    <script src="{{asset('js/demo/bootstrap-table-demo.js')}}"></script>

    <script>
        function del(){
            var msg = "您确定要删除吗?";
            if(confirm(msg)==true){
                return true;
            }else{
                return false;
            }
        }
        function stop(){
            var msg = "您确定要下架吗?";
            if(confirm(msg)==true){
                return true;
            }else{
                return false;
            }
        }
        function start(){
            var msg = "您确定要上架吗?";
            if(confirm(msg)==true){
                return true;
            }else{
                return false;
            }
        }
    </script>

</body>

</html>
