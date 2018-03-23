 <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">


    <title>H+ 后台主题UI框架 - 基础表格</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link href="{{asset('css/bootstrap.min.css?v=3.3.6')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css?v=4.4.0')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/bootstrap-table/bootstrap-table.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css?v=4.1.0')}}" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>权限--角色信息</h5>
                <div class="ibox-tools">

                    <!-- <a href="{{url('admin/user_add')}}" style="margin-right: 20px;">添加管理员</a> -->
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
                 <div class="input-group col-sm-3" style="float: right;position: relative;bottom:8px;">

                    <div style="width: 10px;"></div>
                    <span class="input-group-btn">
                        <a href="{{url('role/list_add')}}" class="btn btn-primary" style="margin-right: 20px;">添加</a>
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
                                        <th>编号</th>
                                        <th>角色编号</th>
                                        <th>角色</th>
                                        <th>角色描述</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $v)
                                    <tr>
                                        <td>{{$v->id}}</td>
                                        <td>{{$v->name}}</td>
                                        <td>{{$v->display_name}}</td>
                                        <td>{{$v->description}}</td>
                                        <td><a href="{{url('role/list_edit',$v->id)}}">修改</a> | <a href="{{url('role/list_del',$v->id)}}" onclick="javascript:return del()">删除</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                                {!! $list->render() !!}
                            </div>
                        </div>
                        <!-- End Example Classes -->
                    </div>

                    <div class="clearfix hidden-xs"></div>
                </div>
            </div>
        </div>
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
    </script>

</body>

</html>
