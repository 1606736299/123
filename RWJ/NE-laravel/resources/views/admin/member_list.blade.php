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
                <h5>会员列表</h5>
                <!-- <div class="ibox-tools">
                    <a href="{{url('admin/member_add')}}" style="margin-right: 20px;">添加会员</a>
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div> -->
               <!--  <div class="input-group col-sm-3" style="float: right;position: relative;bottom:8px;">

                    <div style="width: 10px;"></div>
                    <span class="input-group-btn">
                        <a href="{{url('admin/member_add')}}" class="btn btn-primary" style="margin-right: 20px;">添加会员</a>
                    </span>
                </div> -->
            </div>
            <div class="ibox-content">
                <div class="row row-lg">
                    <div class="col-sm-12">
                        <!-- Example Classes -->
                        <div class="example-wrap">
                            <div class="example">
                                <table data-toggle="table" data-classes="table table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th data-field="id">ID</th>
                                            <th data-field="name">昵称</th>
                                            <th data-field="username">用户名</th>
                                            <th data-field="sex">性别</th>
                                            <th data-field="phone">手机</th>
                                            <th data-field="email">邮箱</th>
                                            <th data-field="more">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($list as $v)
                                        <tr>
                                            <td>{{$v->id}}</td>
                                            <td>{{$v->name}}</td>
                                            <td>{{$v->username}}</td>
                                            <td>{{$v->sex}}</td>
                                            <td>{{$v->phone}}</td>
                                            <td>{{$v->email}}</td>
                                            <td>
                                                @if ($v->status == 1)
                                                    <a class="btn enable-button" href="{{url('admin/member_stop',$v->id)}}" onclick="javascript:return stop()">已启用</a>
                                                @elseif($v->status == 0)
                                                    <a class="btn disable-button" href="{{url('admin/member_start',$v->id)}}" onclick="javascript:return start()">已禁用</a>
                                                @endif
                                            </td>
                                            <!-- <td><a href="{{url('admin/member_list_del',$v->id)}}">删除</a></td> -->
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

    <script>
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
