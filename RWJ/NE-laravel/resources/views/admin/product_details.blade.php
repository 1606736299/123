 <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">


    <title>H+ 后台主题UI框架 - 基础表格</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <style type="text/css">
        *{
            margin:0;
            padding:0;
        }
        .ibox-content .table{
            border:1px solid #f9f9f9;
        }
        .ibox-content .table td{
            padding: 9px 15px;
            /*min-height: 20px;*/
            /*font-size: 14px;*/
           line-height: 20px;
           /*height:100px;*/
        }
    </style>

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>基本</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <!-- <a class="dropdown-toggle" data-toggle="dropdown" href="table_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="table_basic.html#">选项1</a>
                                </li>
                                <li><a href="table_basic.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>-->
                        </div>
                        <div class="input-group col-sm-3" style="float: right;position: relative;bottom:8px;">
                            <form action="{{url('admin/product_details_search')}}" style="margin-right: 10px;display: inherit; position: relative;" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                               <!--  <input type="text" class="form-control" name="keywords1" placeholder="产品号"  style="position: absolute; right: 190px; width: 124px;">  -->
                                <input type="text" class="form-control" name="keywords2" placeholder="产品号"  style="">
                                <span class="input-group-btn">
                                    <input type="submit" class="btn btn-primary" value="搜索">
                                </span>
                            </form>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary" onclick="window.location.reload()">刷新</button>
                            </span>
                            <div style="width: 10px;"></div>
                            <span class="input-group-btn">
                                <a href="{{url('admin/product_details_add ')}}" class="btn btn-primary" style="margin-right: 20px;">添加</a>
                            </span>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <table class="table text-center">
                                <tr>
                                    <td>编号</td>
                                    <td>产品号</td>
                                    <td>产品名</td>
                                    <td>类别号</td>
                                    <td style="width: 200px;">产品详情图</td>
                                    <td>添加时间</td>

                                    <td>操作</td>
                                    <td>产品信息</td>
                                </tr>
                                @foreach ($details as $v)
                                <tr style="height:100px;">
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->cir_id}}</td>
                                    <td>{{$v->name}}</td>
                                    <td>{{$v->cir_ty}}</td>
                                    <td class="cir_img">{{$v->cir_img}}</td>
                                    <td>{{$v->created_at}}</td>


                                    <td>
                                    <a  href="{{url('admin/product_details_edit',$v->cir_id)}}">修改</a>
                                    | <a  href="{{url('admin/product_details_datel',$v->id)}}" onclick="del(); ">删除</a></td>
                                    <td><a href="{{url('admin/product_details_info',$v->cir_id)}}">详情</a></td>
                                </tr>
                                @endforeach
                        </table>
                        {!! $details->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>


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

