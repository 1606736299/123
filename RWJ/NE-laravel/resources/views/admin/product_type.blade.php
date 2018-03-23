<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>H+ 后台主题UI框架 - Bootstrap Table</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link href="{{asset('css/bootstrap.min.css?v=3.3.6')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css?v=4.4.0')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/bootstrap-table/bootstrap-table.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css?v=4.1.0')}}" rel="stylesheet">
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


</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <!-- Panel Style -->
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>产品分类</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
                <div class="input-group col-sm-3" style="float: right;position: relative;bottom:8px;">
                    <form action="{{url('admin/product_type_search')}}" style="margin-right: 10px;display: inherit;" method="post">
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
                        <a href="{{url('admin/product_type_append')}}" class="btn btn-primary" style="margin-right: 20px;">添加顶级分类</a>
                    </span>
                </div>
            </div>
            <div class="ibox-content x-body">
                <table data-toggle="table" data-classes="table table-hover table-condensed" data-striped="true" data-mobile-responsive="true">
                    <thead>
                        <tr>
                            <th data-field="id">ID</th>
                            <th data-field="name">类别名称</th>
                            <th data-field="pid">父级ID</th>
                            <th data-field="path">路径</th>
                            <th data-field="icon">icon</th>
                            <th data-field="Score">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $v)
                        <tr>
                            <td>{{$v->id}}</td>
                            <td>{{$v->nbsp}}{{$v->name}}</td>
                            <td>{{$v->pid}}</td>
                            <td>{{$v->path}}</td>
                            @if(!empty($v->icon))
                                <td><img style="width: 44px;height:44px;" src="{{url($v->icon)}}" alt=""></td>
                            @else
                                <td>无</td>

                            @endif
                            <td><a href="{{url('admin/product_type_add',$v->id)}}">添加子类</a> | <a href="{{url('admin/product_type_edit',$v->id)}}">修改</a> | <a href="{{url('admin/product_type_del',$v->id)}}" onclick="javascript:return del()">删除</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if (isset($keywords))
                    {!! $list->appends(['keywords' => "$keywords"])->render() !!}
                @else
                    {!! $list->render() !!}
                @endif
                <div class="clearfix hidden-xs"></div>
            </div>
        </div>
        <!-- End Panel Style -->
    </div>


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
