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
                <h5>订单详情</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
                <div class="input-group col-sm-3" style="float: right;position: relative;bottom:8px;">
                    <div style="width: 10px;"></div>
                    <span class="input-group-btn">
                        <a href="{{url('admin/cancle')}}" class="btn btn-primary" style="margin-right: 20px;">返回</a>
                    </span>
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
                                            <th data-field="2">商品名称</th>
                                            <th data-field="3">缩略图</th>
                                            <th data-field="5">分类</th>
                                            <th data-field="6">规格</th>
                                            <th data-field="8">单价</th>
                                            <th data-field="7">数量</th>
                                            <th data-field="9">添加时间</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($list as $v)
                                        <tr>
                                            <td>{{$v->name}}</td>
                                            <td><img style="height:44px;" src="{{url($v->image)}}" alt=""></td>
                                            <td>{{$v->type}}</td>
                                            <td>{{$v->spec}}</td>
                                            <td>{{$v->price}}</td>
                                            <td>×{{$v->count}}</td>
                                            <td>{{$v->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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

</body>

</html>
