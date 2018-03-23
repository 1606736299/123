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
                        <h5>添加产品</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                        </div>
                    </div>
                    <div class="ibox-content">
                        <form role="form" class="form-horizontal m-t" action="{{url('admin/product_insert')}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">所属类别：</label>
                                <div class="col-sm-2">
                                    <select class="form-control m-b" name="grade" id ="grade" required="">
                                        <option value="0">请选择类别</option>
                                        @foreach ($list as $v)
                                        <option value="{{$v->id}}" id="g">{{$v->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-sm-2">
                                    <select class="form-control m-b" name="classes" id="classes" required="">
                                        <option value="0">请选择类别</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">商品名：</label>
                                <div class="col-sm-3">
                                    <input type="text" name="name" class="form-control" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">简介：</label>
                                <div class="col-sm-3">
                                    <input type="text" name="goods_desc" class="form-control" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">品牌商：</label>
                                <div class="col-sm-3">
                                    <input type="text" name="maker" class="form-control" placeholder="非必填项">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">产品图片1：</label>
                                <div class="col-sm-3">
                                    <div id="file-pretty">
                                        <div class="form-group" style="margin-left:0;margin-right: 0;">
                                            <input type="file" class="form-control" name="goods_image1" style="height:auto;" required="">
                                        </div>
                                    </div>
                                </div>
                                <label class="col-sm-3 control-label" style="text-align: left;">建议图片尺寸为430*430</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">产品图片2：</label>
                                <div class="col-sm-3">
                                    <div id="file-pretty">
                                        <div class="form-group" style="margin-left:0;margin-right: 0;">
                                            <input type="file" class="form-control" name="goods_image2" style="height:auto;" required="">
                                        </div>
                                    </div>
                                </div>
                                <label class="col-sm-3 control-label" style="text-align: left;">建议图片尺寸为430*430</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">产品图片3：</label>
                                <div class="col-sm-3">
                                    <div id="file-pretty">
                                        <div class="form-group" style="margin-left:0;margin-right: 0;">
                                            <input type="file" class="form-control" name="goods_image3" style="height:auto;" required="">
                                        </div>
                                    </div>
                                </div>
                                <label class="col-sm-3 control-label" style="text-align: left;">建议图片尺寸为430*430</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">产品图片4：</label>
                                <div class="col-sm-3">
                                    <div id="file-pretty">
                                        <div class="form-group" style="margin-left:0;margin-right: 0;">
                                            <input type="file" class="form-control" name="goods_image4" style="height:auto;" required="">
                                        </div>
                                    </div>
                                </div>
                                <label class="col-sm-3 control-label" style="text-align: left;">建议图片尺寸为430*430</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">产品图片5：</label>
                                <div class="col-sm-3">
                                    <div id="file-pretty">
                                        <div class="form-group" style="margin-left:0;margin-right: 0;">
                                            <input type="file" class="form-control" name="goods_image5" style="height:auto;" required="">
                                        </div>
                                    </div>
                                </div>
                                <label class="col-sm-3 control-label" style="text-align: left;">建议图片尺寸为430*430</label>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">是否精品：</label>
                                <div class="col-sm-3">
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="1" name="is_best">
                                        <label for="inlineRadio1"> 是 </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <input type="radio" id="inlineRadio2" value="0" name="is_best" checked="">
                                        <label for="inlineRadio2"> 否 </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">是否新品：</label>
                                <div class="col-sm-3">
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="1" name="is_new">
                                        <label> 是 </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <input type="radio" id="inlineRadio2" value="0" name="is_new" checked="">
                                        <label> 否 </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">是否热销：</label>
                                <div class="col-sm-3">
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="1" name="is_hot">
                                        <label for="inlineRadio1"> 是 </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <input type="radio" id="inlineRadio2" value="0" name="is_hot" checked="">
                                        <label for="inlineRadio2"> 否 </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">是否低价促销：</label>
                                <div class="col-sm-3">
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="1" name="is_promote">
                                        <label for="inlineRadio1"> 是 </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <input type="radio" id="inlineRadio2" value="0" name="is_promote" checked="">
                                        <label for="inlineRadio2"> 否 </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">是否包邮：</label>
                                <div class="col-sm-3">
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="1" name="is_pinkage">
                                        <label for="inlineRadio1"> 是 </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <input type="radio" id="inlineRadio2" value="0" name="is_pinkage" checked="">
                                        <label for="inlineRadio2"> 否 </label>
                                    </div>
                                </div>
                            </div>
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

        // 类别Ajax
            $("#grade").change(function(){

                var objectModel = {};
                var value = $(this).val();          //获取第一类别的id
                // var type = $(this).attr('id');
                // objectModel[type] =value;

                // Ajax,获取该id对应的第二类别信息
                $.post('product_type_select',{'_token':'{{csrf_token()}}','grade':value},function(data){
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
