<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>H+ 后台-图片添加</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico">
    <link href="{{asset('css/bootstrap.min.css?v=3.3.6')}}" rel="stylesheet">
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

    </style>

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content">

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins" style="margin:0 auto;">
                    <div class="ibox-title">
                        <h5>回复内容</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                        </div>
                    </div>
                    <div class="ibox-content">
                        <form role="form" class="form-horizontal m-t" action="{{url('admin/comment_add')}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            @foreach($list as $v)
                            <input type="hidden" name="id" value="{{$v->id}}">
                            @endforeach
                            <textarea style="display: block;margin-left:200px;width: 600px;height: 200px;text-align: left;padding:0" name="file">

                            </textarea>


                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-12 col-sm-offset-5">
                                    <button class="btn btn-primary" type="submit">添加</button>
                                    <a href="{{url('admin/details')}}" class="btn btn-white">取消</a>
                                </div>
                            </div>
                        </form>
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

</body>

</html>
