<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>H+ 后台主题UI框架 - Bootstrap3 表单构建器</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico"> <link href="{{asset('css/bootstrap.min.css?v=3.3.6')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css?v=4.4.0')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/summernote/summernote.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css?v=4.1.0')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">

    <style>
        .droppable-active {
            background-color: #ffe !important;
        }

        .tools a {
            cursor: pointer;
            font-size: 80%;
        }

        .form-body .col-md-6,
        .form-body .col-md-12 {
            min-height: 400px;
        }

        .draggable {
            cursor: move;
        }
/*        .pic{
            width: 60px;
            height: 60px;
            margin-right: 10px;
            position: relative;
            float: left;
        }*/
        .mb20{
            margin-bottom: 20px;
        }
        .pic{
            width: 44px;
            height: 44px;
            position: relative;
        }
        .pic .bg{
            width: 44px;
            height: 44px;
            background: rgba(0,0,0,.5);
            display: none;
            position: relative;
            top: -44px;
        }
        .pic .bg a{
            position: absolute;
            right: 8px;
            top:8px;
            color: #fff;
            display: block;
            width: 20px;
            height: 20px;
            font-size: 20px;
        }
        .pic:hover .bg{
            display:block;
        }
    </style>

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content">

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins" style="margin:0 auto;">
                    <div class="ibox-title">
                        <h5>图片信息修改</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        @foreach ($list as $v)
                        <form role="form" class="form-horizontal m-t" action="{{url('banner/update')}}" enctype="multipart/form-data" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="id" value="{{$v->id}}">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">图片类别：</label>
                                <div class="col-sm-5">
                                    <input type="text" name="banner_type" class="form-control" value="{{$v->banner_type}}" disabled="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">图片标题：</label>
                                <div class="col-sm-5">
                                    <input type="text" name="title" class="form-control" value="{{$v->title}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">图片描述：</label>
                                <div class="col-sm-5">
                                    <input type="text" name="content" class="form-control" value="{{$v->content}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">图片：</label>
                                <div class="col-sm-5">
                                    <div id="file-pretty">
                                        <div class="form-group" style="margin-left:0;margin-right: 0;">
                                            <div class="pic">
                                                <img style="height:44px;" src="{{$v->photo}}" alt="">
                                                <div class="bg">
                                                   <a href="javascript:;">×</a>
                                                </div>
                                                <input type="file" class="form-control hide" name="photo" style="height:auto;" value="{{$v->photo}}">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- <label class="col-sm-3 control-label" style="text-align: left;">建议图片尺寸为430*430</label> -->

                            </div>


                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-12 col-sm-offset-3">
                                    <button class="btn btn-primary" type="submit">保存内容</button>
                                    <a href="{{url('admin/cancle')}}" class="btn btn-white">取消</a>
                                </div>
                            </div>
                        </form>
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- 全局js -->
    <script src="{{asset('js/jquery1.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js?v=3.3.6')}}"></script>

    <!-- 自定义js -->
    <script src="{{asset('js/content.js?v=1.0.0')}}"></script>

    <!-- jQuery UI -->
    <script src="{{asset('js/jquery-ui-1.10.4.min.js')}}"></script>

    <!-- From Builder -->
    <script src="{{asset('js/plugins/beautifyhtml/beautifyhtml.js')}}"></script>

    <script>
        $(document).on("click", ".edit-link", function (ev) {
            var $el = $(this).parent().parent();
            var $el_copy = $el.clone();

            var $edit_btn = $el_copy.find(".edit-link").parent().remove();

            var $modal = get_modal(html_beautify($el_copy.html())).modal("show");
            $modal.find(":input:first").focus();
            $modal.find(".btn-success").click(function (ev2) {
                var html = $modal.find("textarea").val();
                if (!html) {
                    $el.remove();
                } else {
                    $el.html(html);
                    $edit_btn.appendTo($el);
                }
                $modal.modal("hide");
                return false;
            })
        });

        $(document).on("click", ".remove-link", function (ev) {
            $(this).parent().parent().remove();
        });
    </script>

    <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
    <script type="text/javascript">
         // 图片删除
        function replace(){
            $('.pic').hide();
            $('.mb20').removeClass('hide');
            $("a:contains('全部替换')").hide();
        }
        // 图片删除
        $('.bg a').click(function(){
            $('<input type="file" class="form-control" name="photo" style="height:auto;" required="">').replaceAll('.pic');
        });
    </script>
</body>

</html>
