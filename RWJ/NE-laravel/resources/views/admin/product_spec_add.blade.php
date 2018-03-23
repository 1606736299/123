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
        .mb20,.mb_20{
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
                        <h5>产品规格设置</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <form role="form" class="form-horizontal m-t" action="{{url('admin/goods_spec_insert')}}" enctype="multipart/form-data" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            @foreach ($list as $v)
                            <input type="hidden" name="id" value="{{$v->id}}">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">商品名称：</label>
                                <div class="col-sm-5">
                                    <input type="text" name="name" class="form-control" value="{{$v->name}}" disabled="">
                                </div>
                            </div>
                            @endforeach
                            <div class="form-group" style="position: relative; margin-bottom: 35px;">
                                <label class="col-sm-3 control-label">规格：</label>
                                <div class="col-sm-8" id="all_group">
                                @if(isset($list3))
                                    @foreach ($list3 as $v3)
                                    <div class="row mb_20 mb">
                                        <div class="col-sm-3">
                                            <input class="form-control" name="spec[]" type="text" placeholder="请输入规格名" value="{{$v3->spec}}" required="">
                                        </div>
                                        <div class="col-sm-2">
                                            <input class="form-control" name="price[]" type="text" placeholder="请输入价格" value="{{$v3->price}}" required="">
                                        </div>
                                        <div class="col-sm-2">
                                            <input class="form-control" name="count[]" type="text" placeholder="请输入库存" value="{{$v3->count}}" required="">
                                        </div>
                                        <div class="col-sm-2">
                                            @if(empty($v3->picture))
                                            <input type="file" class="form-control" name="picture[]" style="height:auto;">
                                            @else
                                            <div class="form-group" style="margin-left:0;margin-right: 0;">
                                            <div class="pic">
                                                <img style="height:44px;" src="{{url($v3->picture)}}" alt="">
                                                <div class="bg">
                                                   <a href="javascript:;">×</a>
                                                </div>
                                                <input type="file" class="form-control hide" name="picture[]" style="height:auto;" value="{{$v3->picture}}">
                                            </div>

                                        </div>
                                            @endif
                                        </div>
                                        <a href="javascript:;" class="btn btn-warning btn-circle del_group" title="删除规格" onclick="del_group()">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                    @endforeach
                                @endif
                                    <div class="row mb20 mb">
                                        <div class="col-sm-3">
                                            <input class="form-control" name="spec[]" type="text" placeholder="请输入规格名" required="">
                                        </div>
                                        <div class="col-sm-2">
                                            <input class="form-control" name="price[]" type="text" placeholder="请输入价格" required="">
                                        </div>
                                        <div class="col-sm-2">
                                            <input class="form-control" name="count[]" type="text" placeholder="请输入库存" required="">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="file" class="form-control" name="picture[]" style="height:auto;" required="">
                                        </div>
                                        <a href="javascript:;" class="btn btn-warning btn-circle del_group" title="删除规格" onclick="del_group()">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>

                                </div>

                                <a href="javascript:;" id="add_group" class="open-small-chat" style="position: absolute;right: 50%;bottom:-25px;" title="添加规格">
                                    <i class="glyphicon glyphicon-plus"></i>
                                </a>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-12 col-sm-offset-3">
                                    <button class="btn btn-primary" type="submit">保存内容</button>
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

            // 添加规格
            $('#add_group').click(function(){

                // $(".mb20:first").clone().appendTo('#all_group').show();
                $('<div class="row mb20 mb"><div class="col-sm-3"><input class="form-control" name="spec[]" type="text" placeholder="请输入规格名"></div><div class="col-sm-2"><input class="form-control" name="price[]" type="text" placeholder="请输入价格"></div><div class="col-sm-2"><input class="form-control" name="count[]" type="text" placeholder="请输入库存"></div><div class="col-sm-2"><input type="file" class="form-control" name="picture[]" style="height:auto;"></div><a href="javascript:;" class="btn btn-warning btn-circle del_group" title="删除规格" onclick="del_group()"><i class="fa fa-times"></i></a></div>').appendTo('#all_group').show();

            });
            // 删除规格
            function del_group(){
                var index = $('.del_group').parent().index();
                // alert(index);
                $(".mb").eq(index).remove();
            }
            // 图片删除
            $('.bg a').click(function(){
                $('<input type="file" class="form-control" name="picture[]" style="height:auto;">').replaceAll('.pic');
            });
    </script>
</body>

</html>
