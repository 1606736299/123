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
            <div class="col-sm-12 col-sm-offset">
                <div class="ibox float-e-margins" style="margin:0 auto;">
                    <div class="ibox-title">
                        <h5>添加产品信息</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                        </div>
                    </div>
                    <div class="ibox-content">
                        <form role="form" class="form-horizontal m-t" action="{{url('admin/product_details_info_insert')}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="cir_ord_id" value="{{$cir_id}}">
                        @foreach ($cir_name as $n)
                            <div class="form-group">
                                <label class="col-sm-3 control-label">产品号：</label>
                                <div class="col-sm-7">
                                    <input type="text" name="cir_id" class="form-control" placeholder="{{$n->name}}&nbsp;&nbsp;&nbsp;&nbsp;{{$cir_id}}" disabled="">
                                </div>
                            </div>
                        @endforeach

                            @foreach ($order as $v)
                            <div class="form-group" style="position: relative; margin-bottom: 35px;">
                                    <label class="col-sm-3 control-label">产品规格：</label>
                                    <div class="col-sm-8" id="all_group1">
                                        <div class="row mb_10 mb1" style="">
                                            <div class="col-sm-4 del_group1" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="尺寸">
                                                <input class="form-control" name="size" type="text" placeholder="尺寸" value="{{$v->size}}">
                                            </div>
                                            <div class="col-sm-4 del_group1" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="数量">
                                                <input class="form-control" name="number" type="text" placeholder="数量" value="{{$v->number}}">
                                            </div>
                                            <div class="col-sm-4 del_group1" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="深度">
                                                <input class="form-control" name="depth" type="text" placeholder="深度" value="{{$v->depth}}">
                                            </div>
                                            <div class="col-sm-4 del_group1" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="重量">
                                                <input class="form-control" name="weight" type="text" placeholder="重量" value="{{$v->weight}}">
                                            </div>
                                        </div>
                                    </div>


                                    <label class="col-sm-3 control-label">产品质量：</label>
                                    <div class="col-sm-8" id="all_group2">
                                        <div class="row mb_10 mb2" style="">
                                            <div class="col-sm-4 del_group2" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="材质">
                                                <input class="form-control" name="texture" type="text" placeholder="材质" value="{{$v->texture}}">
                                            </div>
                                            <div class="col-sm-4 del_group2" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="面料">
                                                <input class="form-control" name="plus" type="text" placeholder="面料" value="{{$v->plus}}">
                                            </div>
                                            <div class="col-sm-4 del_group2" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="填充物">
                                                <input class="form-control" name="fill" type="text" placeholder="填充物" value="{{$v->fill}}">
                                            </div>
                                        </div>
                                    </div>


                                    <label class="col-sm-3 control-label">产品适用：</label>
                                    <div class="col-sm-8" id="all_group3">
                                        <div class="row mb_10 mb3" style="">
                                            <div class="col-sm-4 del_group3" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="适应环境">
                                                <input class="form-control" name="environment" type="text" placeholder="适应环境" value="{{$v->environment}}">
                                            </div>
                                            <div class="col-sm-4 del_group3" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="功能">
                                                <input class="form-control" name="functionn" type="text" placeholder="功能" value="{{$v->functionn}}">
                                            </div>
                                            <div class="col-sm-4 del_group3" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="颜色">
                                                <input class="form-control" name="color" type="text" placeholder="颜色" value="{{$v->color}}">
                                            </div>
                                            <div class="col-sm-4 del_group3" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="风格">
                                                <input class="form-control" name="style" type="text" placeholder="风格" value="{{$v->style}}">
                                            </div>
                                        </div>
                                    </div>


                                    <label class="col-sm-3 control-label">产品服务：</label>
                                    <div class="col-sm-8" id="all_group4">
                                        <div class="row mb_10 mb4" style="">
                                            <div class="col-sm-4 del_group4" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="是否安装">
                                                <input class="form-control" name="is_assemble" type="text" placeholder="是否安装" value="{{$v->is_assemble}}">
                                            </div>
                                            <div class="col-sm-4 del_group4" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="安装方式">
                                                <input class="form-control" name="assemble" type="text" placeholder="安装方式" value="{{$v->assemble}}">
                                            </div>
                                            <div class="col-sm-4 del_group4" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="产地">
                                                <input class="form-control" name="place" type="text" placeholder="产地" value="{{$v->place}}">
                                            </div>
                                        </div>
                                    </div>


                                    <label class="col-sm-3 control-label">产品后台：</label>
                                    <div class="col-sm-8" id="all_group5">

                                        <div class="row mb_10 mb5" style="">
                                            <div class="col-sm-4 del_group5" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="执行标准">
                                                <input class="form-control" name="criterion" type="text" placeholder="执行标准" value="{{$v->criterion}}">
                                            </div>
                                            <div class="col-sm-4 del_group5" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="安全类型">
                                                <input class="form-control" name="security" type="text" placeholder="安全类型" value="{{$v->security}}">
                                            </div>
                                            <div class="col-sm-4 del_group5" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="温馨提示">
                                                <input class="form-control" name="prompt" type="text" placeholder="温馨提示" value="{{$v->prompt}}">
                                            </div>
                                            <div class="col-sm-4 del_group5" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="特别提醒">
                                                <input class="form-control" name="attention" type="text" placeholder="特别提醒" value="{{$v->attention}}">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            @endforeach
                            <div class="form-group" style="position: relative; margin-bottom: 35px;">
                                    <label class="col-sm-3 control-label">产品规格：</label>
                                    <div class="col-sm-8" id="all_group1">
                                        <div class="row mb_10 mb1" style="">
                                            <div class="col-sm-4 del_group1" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="尺寸">
                                                <input class="form-control" name="size" type="text" placeholder="尺寸" value="">
                                            </div>
                                            <div class="col-sm-4 del_group1" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="数量">
                                                <input class="form-control" name="number" type="text" placeholder="数量" value="">
                                            </div>
                                            <div class="col-sm-4 del_group1" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="深度">
                                                <input class="form-control" name="depth" type="text" placeholder="深度" value="">
                                            </div>
                                            <div class="col-sm-4 del_group1" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="重量">
                                                <input class="form-control" name="weight" type="text" placeholder="重量" value="">
                                            </div>
                                        </div>
                                    </div>


                                    <label class="col-sm-3 control-label">产品质量：</label>
                                    <div class="col-sm-8" id="all_group2">
                                        <div class="row mb_10 mb2" style="">
                                            <div class="col-sm-4 del_group2" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="材质">
                                                <input class="form-control" name="texture" type="text" placeholder="材质" value="">
                                            </div>
                                            <div class="col-sm-4 del_group2" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="面料">
                                                <input class="form-control" name="plus" type="text" placeholder="面料" value="">
                                            </div>
                                            <div class="col-sm-4 del_group2" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="填充物">
                                                <input class="form-control" name="fill" type="text" placeholder="填充物" value="">
                                            </div>
                                        </div>
                                    </div>


                                    <label class="col-sm-3 control-label">产品适用：</label>
                                    <div class="col-sm-8" id="all_group3">
                                        <div class="row mb_10 mb3" style="">
                                            <div class="col-sm-4 del_group3" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="适应环境">
                                                <input class="form-control" name="environment" type="text" placeholder="适应环境" value="">
                                            </div>
                                            <div class="col-sm-4 del_group3" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="功能">
                                                <input class="form-control" name="functionn" type="text" placeholder="功能" value="">
                                            </div>
                                            <div class="col-sm-4 del_group3" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="颜色">
                                                <input class="form-control" name="color" type="text" placeholder="颜色" value="">
                                            </div>
                                            <div class="col-sm-4 del_group3" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="风格">
                                                <input class="form-control" name="style" type="text" placeholder="风格" value="">
                                            </div>
                                        </div>
                                    </div>


                                    <label class="col-sm-3 control-label">产品服务：</label>
                                    <div class="col-sm-8" id="all_group4">
                                        <div class="row mb_10 mb4" style="">
                                            <div class="col-sm-4 del_group4" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="是否安装">
                                                <input class="form-control" name="is_assemble" type="text" placeholder="是否安装" value="">
                                            </div>
                                            <div class="col-sm-4 del_group4" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="安装方式">
                                                <input class="form-control" name="assemble" type="text" placeholder="安装方式" value="">
                                            </div>
                                            <div class="col-sm-4 del_group4" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="产地">
                                                <input class="form-control" name="place" type="text" placeholder="产地" value="">
                                            </div>
                                        </div>
                                    </div>


                                    <label class="col-sm-3 control-label">产品后台：</label>
                                    <div class="col-sm-8" id="all_group5">

                                        <div class="row mb_10 mb5" style="">
                                            <div class="col-sm-4 del_group5" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="执行标准">
                                                <input class="form-control" name="criterion" type="text" placeholder="执行标准" value="">
                                            </div>
                                            <div class="col-sm-4 del_group5" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="安全类型">
                                                <input class="form-control" name="security" type="text" placeholder="安全类型" value="">
                                            </div>
                                            <div class="col-sm-4 del_group5" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="温馨提示">
                                                <input class="form-control" name="prompt" type="text" placeholder="温馨提示" value="">
                                            </div>
                                            <div class="col-sm-4 del_group5" style="margin-bottom: 10px;margin-right: 10px; padding:0;" title="特别提醒">
                                                <input class="form-control" name="attention" type="text" placeholder="特别提醒" value="">
                                            </div>
                                        </div>
                                    </div>
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
                $('#add_group1').click(function(){
                    // $(".mb20:first").clone().appendTo('#all_group').show();
                    $('<div class="row mb_10 mb1" style=""><div class="col-sm-2 del_group" style="margin-bottom: 10px;margin-right: 10px; padding:0;"><input class="form-control" name="size" type="text" placeholder="尺寸" value="" required=""></div><div class="col-sm-2 del_group" style="margin-bottom: 10px;margin-right: 10px; padding:0;"><input class="form-control" name="numbe" type="text" placeholder="数量" value="" required=""></div><div class="col-sm-2 del_group" style="margin-bottom: 10px;margin-right: 10px; padding:0;"><input class="form-control" name="depth" type="text" placeholder="深度" value="" required=""></div><div class="col-sm-2 del_group" style="margin-bottom: 10px;margin-right: 10px; padding:0;"><input class="form-control" name="weight" type="text" placeholder="重量" value="" required=""></div><a class="btn del_group btn-circle" title="删除" onclick="del_group()" style=""><i class="fa fa-times" ></i></a></div>').appendTo('#all_group1').show();
                });
                $('#add_group2').click(function(){
                    // $(".mb20:first").clone().appendTo('#all_group').show();
                    $('<div class="row mb_10 mb2" style=""><div class="col-sm-2 del_group" style="margin-bottom: 10px;margin-right: 10px; padding:0;"><input class="form-control" name="texture" type="text" placeholder="材质" value="" required=""></div><div class="col-sm-2 del_group" style="margin-bottom: 10px;margin-right: 10px; padding:0;"><input class="form-control" name="plus" type="text" placeholder="面料" value="" required=""></div><div class="col-sm-2 del_group" style="margin-bottom: 10px;margin-right: 10px; padding:0;"><input class="form-control" name="fill" type="text" placeholder="填充物" value="" required=""></div><a class="btn del_group btn-circle" title="删除" onclick="del_group()" style=""><i class="fa fa-times" ></i></a></div>').appendTo('#all_group2').show();
                });
                $('#add_group3').click(function(){
                    // $(".mb20:first").clone().appendTo('#all_group').show();
                    $('<div class="row mb_10 mb3" style=""><div class="col-sm-2 del_group" style="margin-bottom: 10px;margin-right: 10px; padding:0;"><input class="form-control" name="texture" type="text" placeholder="材质" value="" required=""></div><div class="col-sm-2 del_group" style="margin-bottom: 10px;margin-right: 10px; padding:0;"><input class="form-control" name="plus" type="text" placeholder="面料" value="" required=""></div><div class="col-sm-2 del_group" style="margin-bottom: 10px;margin-right: 10px; padding:0;"><input class="form-control" name="fill" type="text" placeholder="填充物" value="" required=""></div><a class="btn del_group btn-circle" title="删除" onclick="del_group()" style=""><i class="fa fa-times" ></i></a></div>').appendTo('#all_group3').show();
                });
                $('#add_group4').click(function(){
                    // $(".mb20:first").clone().appendTo('#all_group').show();
                    $('<div class="row mb_10 mb4" style=""><div class="col-sm-2 del_group" style="margin-bottom: 10px;margin-right: 10px; padding:0;"><input class="form-control" name="is_assemble" type="text" placeholder="是否安装" value="" required=""></div><div class="col-sm-2 del_group" style="margin-bottom: 10px;margin-right: 10px; padding:0;"><input class="form-control" name="assemble" type="text" placeholder="安装方式" value="" required=""></div><div class="col-sm-2 del_group" style="margin-bottom: 10px;margin-right: 10px; padding:0;"><input class="form-control" name="place" type="text" placeholder="产地" value="" required=""></div><a class="btn del_group btn-circle" title="删除" onclick="del_group()" style=""><i class="fa fa-times" ></i></a></div>').appendTo('#all_group4').show();
                });
                $('#add_group5').click(function(){
                    // $(".mb20:first").clone().appendTo('#all_group').show();
                    $('<div class="row mb_10 mb5" style=""><div class="col-sm-2 del_group" style="margin-bottom: 10px;margin-right: 10px; padding:0;"><input class="form-control" name="criterion" type="text" placeholder="执行标准" value="" required=""></div><div class="col-sm-2 del_group" style="margin-bottom: 10px;margin-right: 10px; padding:0;"><input class="form-control" name="security" type="text" placeholder="安全类型" value="" required=""></div><div class="col-sm-2 del_group" style="margin-bottom: 10px;margin-right: 10px; padding:0;"><input class="form-control" name="prompt" type="text" placeholder="温馨提示" value="" required=""></div><div class="col-sm-2 del_group" style="margin-bottom: 10px;margin-right: 10px; padding:0;"><input class="form-control" name="attention" type="text" placeholder="特别提醒" value="" required=""></div><a class="btn del_group btn-circle" title="删除" onclick="del_group()" style=""><i class="fa fa-times" ></i></a></div>  ').appendTo('#all_group5').show();
                });

            // 删除规格
            function del_group(){
                var index = $('.del_group1').parent().index();
                // alert(index);
                $(".mb1").eq(index).remove();
            }
            function del_group(){
                var index = $('.del_group2').parent().index();
                // alert(index);
                $(".mb2").eq(index).remove();
            }
            function del_group(){
                var index = $('.del_group3').parent().index();
                // alert(index);
                $(".mb3").eq(index).remove();
            }
            function del_group(){
                var index = $('.del_group4').parent().index();
                // alert(index);
                $(".mb4").eq(index).remove();
            }
            function del_group(){
                var index = $('.del_group5').parent().index();
                // alert(index);
                $(".mb5").eq(index).remove();
            }

            // 图片删除
            $('.bg a').click(function(){
                $('<input type="file" class="form-control" name="picture[]" style="height:auto;">').replaceAll('.pic');
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
