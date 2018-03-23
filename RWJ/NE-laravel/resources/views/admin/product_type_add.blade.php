<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>H+ 后台主题UI框架 - Bootstrap3 表单构建器</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico">
    <link href="{{asset('css/bootstrap.min.css?v=3.3.6')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css?v=4.4.0')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/summernote/summernote.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css?v=4.1.0')}}" rel="stylesheet">



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
            <div class="col-sm-5 col-sm-offset-3">
                <div class="ibox float-e-margins" style="margin:0 auto;">
                    <div class="ibox-title">
                        <h5>添加产品分类</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                        </div>
                    </div>
                    <div class="ibox-content">
                        <form role="form" class="form-horizontal m-t" action="{{url('admin/product_type_insert')}}" method="post" enctype="multipart/form-data">
                            @foreach ($list as $v)
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="pid" value="{{$v->id}}">
                            <input type="hidden" name="path" value="{{$v->path}}">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">所属类别：</label>
                                <div class="col-sm-7">
                                    <input type="text" disabled="" class="form-control" value="{{$v->name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">类别名称：</label>
                                <div class="col-sm-7">
                                    <input type="text" name="name" class="form-control" placeholder="请输入类别名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">图片上传：</label>
                                <div class="col-sm-7">
                                    <div id="file-pretty">
                                        <div class="form-group" style="margin-left:0;margin-right: 0;">
                                            <input type="file" class="form-control" name="photo" style="height:auto;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-12 col-sm-offset-5">
                                    <button class="btn btn-primary" type="submit">添加</button>
                                    <a href="{{url('admin/cancle')}}" class="btn btn-white">取消</a>
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
    <script type="text/javascript">
        $(function(){
            $("input[name='password2']").focus(function(){
                $(this).next("span").remove();
                $("<span>请输入正确的账号</span>").css("color","#666").insertAfter(this);
            }).blur(function(){
                $(this).next("span").remove();
                var xx=$(this);
                var v=xx.val();
                var a = $("input[name='password']").val();
                if(a === v){
                    $(this).next("span").remove();
                }else{
                    $("<span>两次密码不同</span>").css("color","red").insertAfter(xx);
                }
            })
        });
    </script>
</body>

</html>
