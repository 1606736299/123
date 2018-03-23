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
            min-height: 20px;
            font-size: 14px;
           line-height: 20px;
           height:100px;
        }
        .ibox-content img{
            width:40px;
        }
        .ibox-content .table p{
           height: 80px;
           display: block;
           text-overflow: ellipsis;
           overflow: hidden;
        }
        table td,th{
            border:1px solid #e7eaec;
            text-align: center;
        }
        .con{
            width:250px;
        }
    </style>
    <script type="text/javascript">
        $(function(){
            $("#use").click(function(){
                if($(this).hasClass('active')){
                    $(this).removeClass('active').html("禁用");
                }else{
                    $(this).addClass('active').html("启用");
                }
            })
        })
    </script>
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
                            <form action="{{url('admin/details_search')}}" style="margin-right: 10px;display: inherit; position: relative;" method="post">
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
                      <!--       <span class="input-group-btn">
                                <a href="{{url('admin/product_type_append')}}" class="btn btn-primary" style="margin-right: 20px;">添加</a>
                            </span> -->
                        </div>
                    </div>
                    <div class="ibox-content">

                        <!-- <table class="table text-center" data-classes="table table-hover table-condensed"> -->
                        <table data-toggle="table" data-classes="table table-hover table-condensed" data-striped="true" data-mobile-responsive="true" class="table text-center">
                        <thead>
                                <tr>
                                    <th style="">编号</th>
                                    <th style="">产品号</th>
                                    <th style="">用户号</th>
                                    <th style="">订单号</th>
                                    <th style="">内容</th>
                                    <th style="">回复</th>
                                    <th style="">追评内容</th>
                                    <th style="">时间</th>
                                    <th style="">追评时间</th>
                                    <th style="width:150px;">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($comment as $v)
                                    <tr>
                                        <td>{{$v->id}}</td>
                                        <td>{{$v->pro_id}}</td>
                                        <td>{{$v->user_id}}</td>
                                        <td>{{$v->order_id}}</td>
                                        <!-- 追评 -->
                                        <td class="con">{{$v->content}}</td>
                                        <td class="con">{{$v->supper}}</td>
                                        <td class="con">{{$v->supper1}}</td>
                                        <td style="">{{$v->created_at}}</td>
                                        @if ($v->supper1)
                                        <td>{{$v->time2}}</td>
                                        @else
                                            <td></td>
                                        @endif



                                        <td>
                                        @if ($v->is_use == 0)
                                            <a id="use" class="layui-btn layui-btn-normal layui-btn-min i" href="{{url('admin/details_start',$v->id)}}" onclick="javascript:return start()">禁用</a>
                                        @elseif($v->is_use == 1)
                                            <a id="use" class="layui-btn layui-btn-normal layui-btn-mini" href="{{url('admin/details_stop',$v->id)}}" onclick="javascript:return stop()">启用</a>
                                        @endif
                                        | <a  href="{{url('admin/details_del',$v->id)}}">删除</a> | <a  href="{{url('admin/comment',$v->id)}}">回复</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                        </table>
                        {!! $comment->render() !!}
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

    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>
