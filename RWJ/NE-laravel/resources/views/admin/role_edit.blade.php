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
                        <h5>权限--角色信息修改</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                        </div>
                    </div>
                    <div class="ibox-content">
                        @foreach ($list as $v)
                        <form role="form" class="form-horizontal m-t" action="{{url('role/list_update')}}">
                            <input type="hidden" name="id" value="{{$v->id}}">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">角色编号：</label>
                                <div class="col-sm-5">
                                    <input type="text" name="name" class="form-control" value="{{$v->name}}">
                                    <!-- <span class="help-block m-b-none">说明文字</span> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">角色：</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="namea" value="{{$v->display_name}}">
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class="col-sm-3 control-label">确认密码：</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="password2" placeholder="请输入密码">
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">角色描述：</label>
                                <div class="col-sm-5">
                                    <input type="text" name="content" style="width:280px; height:50px;" class="form-control" value="{{$v->description}}">
                                    <!-- <span class="help-block m-b-none">说明文字</span> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">角色权限:</label>

                                <div class="col-sm-5">
                                    @foreach($pers as $perm)
                                    <label class="checkbox-inline">
                                        <input type="checkbox" style="margin-top:3px;" name="pers[]" @if(in_array($perm->id,$ids)) checked @endif  value="{{$perm->id}}">{{$perm->display_name}}</label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-12 col-sm-offset-3">
                                    <button class="btn btn-primary" type="submit">保存内容</button>
                                    <a class="btn btn-white" href="{{url('admin/cancle')}}">取消</a>
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

    <script type="text/javascript" src="{{asset('jquery.js')}}"></script>
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
