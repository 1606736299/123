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
    <link href="{{asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.all.min.js')}}"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/lang/zh-cn/zh-cn.js')}}"></script>
    <script type="text/javascript">
        var ue = UE.getEditor('editor');
    </script>

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

        .form-group{

        }
        .cl:after{
            content: "";
            display: block;
            height: 0;
            overflow: hidden;
            clear: both;
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
                        <h5>添加产品详情</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                        </div>
                    </div>
                    <div class="ibox-content">
                        <form role="form" class="form-horizontal m-t" action="{{url('admin/product_details_insert')}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <div class="form-group">
                                <label class="col-sm-3 control-label">产品号：</label>
                                <div class="col-sm-3">
                                    <input type="text" name="cir_id" class="form-control" required="" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">类别号：</label>
                                <div class="col-sm-2">
                                    <select class="form-control m-b" name="grade" id ="grade" required="">
                                        <option value="0">请选择类别</option>
                                        @foreach ($ins as $ns)
                                        <option value="{{$ns->id}}" id="g">{{$ns->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-sm-2">
                                    <select class="form-control m-b" name="classes" id="classes" required="">
                                        <option value="0">请选择类别</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group cl">
                                <label class="col-sm-3 control-label">产品详情图：</label>
                                <div class="col-sm-3">
                                   <script id="editor" name="cir_img" type="text/plain" style="width:600px;height:300px; border:1px solid #ddd;"></script>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group cl">
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

            // 类别Ajax
            $("#grade").change(function(){
                var objectModel = {};
                var value = $(this).val();          //获取第一类别的id
                // var type = $(this).attr('id');
                // objectModel[type] =value;

                // Ajax,获取该id对应的第二类别信息
                $.post('product_details_type_select',{'_token':'{{csrf_token()}}','grade':value},function(data){
                    $("#classes").empty();
                    var i = 0;
                    var b="";
                    // 获取的data为对象数组,eval()计算解析
                    var json = eval('(' + data + ')');
                    var count = json.length;
                    // 循环添加下拉选项
                    for(var i=0;i<count;i++){
                        b += "<option value='"+json[i].name+"'>"+json[i].name+"</option>";
                    }
                    // 输出
                    $("#classes").append(b);
                })
            });

    </script>

    <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>


</body>

</html>
