<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">


    <title>H+ 后台主题UI框架 - 基础表格</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico">
    <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{asset('css/plugins/iCheck/custom.css')}}" rel="stylesheet">
        <link href="{{asset('css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <link href="{{asset('css/wy.css')}}" rel="stylesheet"  media="all">
        <style type="text/css" media="screen">
            .layui-table{
                width: 100%;
                margin: 10px 0;
                background-color: #fff;
            }
            thead{
                display: table-header-group;
                vertical-align: middle;
                border-color: inherit;
            }
            .layui-table thead tr{
                background-color: #f2f2f2;
                line-height:40px;
            }
            td{
                    padding: 9px 15px;
                    min-height: 20px;
                    line-height: 20px;
                    border: 1px solid #e2e2e2;
                    font-size: 14px;
            }
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
            th{
                border:1px solid #ddd;
                padding-left: 10px;
            }
        </style>

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>管理员列表</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                        <div class="input-group col-sm-3" style="float: right;position: relative;bottom:8px;">
                            <form action="{{url('banner/search')}}" style="margin-right: 10px;display: inherit;" method="post">
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
                            <span class="input-group-btn">
                                <a href="{{url('banner/add')}}" class="btn btn-primary" style="margin-right: 20px;">添加产品</a>
                            </span>
                        </div>
                    </div>
                    <div class="ibox-content x-body">
                        <table class="layui-table">
                            <thead>
                                <tr>
                                    <th data-field="1">
                                        ID
                                    </th>
                                    <th data-field="10">
                                        缩略图
                                    </th>
                                    <th data-field="100">
                                        类别
                                    </th>
                                    <th data-field="101">
                                        标题
                                    </th>
                                    <th data-field="1000">
                                        描述
                                    </th>
                                    <th data-field="00001">
                                        上传时间
                                    </th>
                                    <th data-field="10000">
                                        显示状态
                                    </th>
                                    <th data-field="001">
                                        操作
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="x-img">
                                @foreach($list as $v)
                                <tr>
                                    <td>
                                    {{$v->id}}
                                    </td>
                                    <td>
                                    <img src="{{url($v->photo)}}" alt="" height="44">
                                    </td>
                                    <td>
                                        {{$v->banner_type}}
                                    </td>
                                    <td>
                                        {{$v->title}}
                                    </td>
                                    <td>
                                        {{$v->content}}
                                    </td>
                                    <td>
                                        {{$v->updated_at}}
                                    </td>
                                    <td>
                                        @if ($v->status == 1)
                                            <a class="btn enable-button" href="{{url('banner/stop',$v->id)}}" onclick="javascript:return stop()">启用</a>
                                        @elseif($v->status == 0)
                                            <a class="btn disable-button" href="{{url('banner/start',$v->id)}}" onclick="javascript:return start()">禁用</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('banner/edit',$v->id)}}">修改</a> | <a href="{{url('banner/del',$v->id)}}" onclick="javascript:return del()">删除</a>
                                    </td>
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
            </div>
        </div>

    </div>

    <!-- 全局js -->
    <script src="{{asset('js/jquery1.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js?v=3.3.6')}}"></script>



    <!-- Peity -->
    <script src="{{asset('js/plugins/peity/jquery.peity.min.js')}}"></script>

    <!-- 自定义js -->
    <script src="{{asset('js/content.js')}}"></script>


    <!-- iCheck -->
    <script src="{{asset('js/plugins/iCheck/icheck.min.js')}}"></script>

    <!-- Peity -->
    <script src="{{asset('js/demo/peity-demo.js')}}"></script>
    <script src="{{asset('js/layui/layui.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/x-layui.js')}}" charset="utf-8"></script>

    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });

    </script>
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
            var msg = "您确定要禁用吗?";
            if(confirm(msg)==true){
                return true;
            }else{
                return false;
            }
        }
        function start(){
            var msg = "您确定要启用吗?";
            if(confirm(msg)==true){
                return true;
            }else{
                return false;
            }
        }
    </script>
</body>

</html>
