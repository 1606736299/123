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
                <h5>产品列表</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
                <div class="input-group col-sm-3" style="float: right;position: relative;bottom:8px;">
                    <form action="{{url('admin/product_search')}}" style="margin-right: 10px;display: inherit;" method="post">
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
                        <a href="{{url('admin/product_add')}}" class="btn btn-primary" style="margin-right: 20px;">添加产品</a>
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
                                            <th data-field="1">ID</th>
                                            <th data-field="2">商品名称</th>
                                            <th data-field="3">缩略图</th>
                                            <th data-field="6">货号</th>
                                            <th data-field="12">分类</th>
                                            <th data-field="7">上架时间</th>
                                            <th data-field="8">更新时间</th>
                                            <th data-field="13">精品</th>
                                            <th data-field="14">新品</th>
                                            <th data-field="15">热销</th>
                                            <th data-field="16">低价促销</th>
                                            <th data-field="10">上/下架</th>
                                            <th data-field="11">操作</th>
                                            <th data-field="17">规格设置</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $v)
                                        <tr>
                                            <td>{{$v->id}}</td>
                                            <td>{{$v->name}}</td>
                                            <td><img style="width: 44px;height:44px;" src="{{url($v->goods_img1)}}" alt=""></td>
                                            <td>{{$v->goods_sn}}</td>
                                            <td>{{$v->type}}</td>
                                            <td>{{$v->created_at}}</td>
                                            <td>{{$v->updated_at}}</td>
                                            <td>{{$v->is_best == '1'?'是':'否'}}</td>
                                            <td>{{$v->is_new == '1'?'是':'否'}}</td>
                                            <td>{{$v->is_hot == '1'?'是':'否'}}</td>
                                            <td>{{$v->is_promote == '1'?'是':'否'}}</td>
                                            <td>
                                                @if ($v->is_putaway == 1)
                                                <a class="btn enable-button" href="{{url('admin/product_stop',$v->id)}}" onclick="javascript:return stop()">已上架</a>
                                                @elseif($v->is_putaway == 0)
                                                <a class="btn disable-button" href="{{url('admin/product_start',$v->id)}}" onclick="javascript:return start()">已下架</a>
                                                @endif
                                            </td>
                                            <td><a href="{{url('admin/product_edit',$v->id)}}">修改</a> | <a href="{{url('admin/product_del',$v->id)}}" onclick="javascript:return del()">删除</a>
                                            </td>
                                            <td><a href="{{url('admin/product_spec_add',$v->id)}}">设置规格</a></td>
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
