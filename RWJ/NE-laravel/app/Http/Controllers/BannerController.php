<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Model\Banner;
use App\Http\Controllers\Controller;

class BannerController extends Controller{

     //权限
    public function __construct()
    {
        //超级管理员
        $this->middleware('ability:Boss,Banindex',['only'=>['Banindex']]);
        //后台管理员管理
        $this->middleware('ability:Banindex,Banindex',['only'=>['Banindex']]);
    }

    /*获取轮播信息放置后台页面*/
    public function Banindex()
    {
        //查询
        $list = DB::table('banner')->orderBy('id','desc')->paginate(10);
        return view('admin/banner',['list'=>$list]);
    }

    // 图片是否显示
    public function start($id)
    {
        $list = DB::table('banner')->where('id',$id)->update(['status'=>'1']);
        return redirect()->action('BannerController@Banindex');
    }
    // 图片是否隐藏
    public function stop($id)
    {
        $list = DB::table('banner')->where('id',$id)->update(['status'=>'0']);
        return redirect()->action('BannerController@Banindex');
    }

    /*添加轮播图片到后台*/
    public function add()
    {
        return view('admin/banner_add');
    }
    public function insert(Request $request)
    {
        //接受所有前台传过来的数据
        $input = $request->all();
        // dd($input);
        //实例化数据表
        $banner = new Banner;
        $banner -> title = $input['title'];// 标题
        $banner -> content = $input['content'];// 描述
        $banner -> banner_type = $input['banner_type'];//类型
        //判断是否选择类型
        if($input['banner_type'] == "0"){
            die("<script>alert('请选择一个类别');javascript:history.go(-1);</script>");
        }
        //获取一下每个类型最后一张的order字段
        $order = DB::table('banner')->where('banner_type',$input['banner_type'])->orderBy('order','desc')->lists('order');
        //判断
        if(empty($order)){
            $banner-> order = 0;
        }else{
            $banner -> order = $order[0]+1;
        }
        //如果图片为空，提示
        if(empty($input['photo'])){
            die("<script>alert('请上传1张图片');javascript:history.go(-1);</script>");
        }
        //图片接收
        $file = $input['photo'];
        //限制图片类型
        $allowed_extensions = ["png", "jpeg", "jpg", "gif"];
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            die("<script>alert('只允许上传png, jpg, jpeg 或 gif格式');javascript:history.go(-1);</script>");
        }
        // 图片保存路径
        $destinationPath = 'images/'; //public 文件夹下面的images文件夹
        // 图片后缀
        $extension = $file->getClientOriginalExtension();
        //图片名
        if($banner['banner_type'] == '首页'){
            $fileName = 'banner-'.$banner['order'].'.'.$extension;
        }elseif($banner['banner_type'] == '列表页'){
            $fileName = 'list-'.$banner['order'].'.'.$extension;
        }else{
            $fileName =str_random(10).".".$extension;
        }
        // 储存图片
        $file->move($destinationPath, $fileName);
        // 拼接图片路径+图片名
        $filePath = $destinationPath.$fileName;

        $banner -> photo = $filePath;                                   //图片名
        // 将数据存入数据库
        $info = $banner ->save();
        // 验证是否成功
        if($info){
            return redirect()->action('BannerController@Banindex');
        }else{
            die("<script>alert('添加失败');javascript:history.go(-1);</script>");
        }
    }

    // 修改图片
    public function edit($id)
    {
        $list = DB::table('banner')->where('id',$id)->get();
        return view('admin/banner_edit',['list'=>$list]);
    }

    public function update(Request $request)
    {
        // 接收数据
        $input = $request->all();
        $banner = new banner;
        $banner = $banner::find($input['id']);

        $banner -> title = $input['title'];                         // 标题
        $banner -> content = $input['content'];                         // 描述

        if(!empty($input['photo'])){
            // 图片接收
            $file = $input['photo'];

            // 限制文件类型
            $allowed_extensions = ["png", "jpeg", "jpg", "gif"];
            if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
                die("<script>alert('只允许上传png, jpg, jpeg 或 gif格式');javascript:history.go(-1);</script>");
            }
            // 图片保存路径
            $destinationPath = 'images/';   //public 文件夹下面的images文件夹
            // 图片后缀
            $extension = $file->getClientOriginalExtension();
            // 图片名
            if($banner['banner_type'] == '首页'){
                $fileName = 'banner-'.$banner['order'].'.'.$extension;
            }elseif($banner['banner_type'] == '列表页'){
                $fileName = 'list-'.$banner['order'].'.'.$extension;
            }else{
                $fileName =str_random(10).".".$extension;
            }


            // 删除原图片
            $filename = $banner['photo'];   //获取图片地址
            $pathd = 'E:/phpStudy/WWW/RWJ/RUWEIJIAN--TWO/NE-laravel/public/'.$filename;//拼接路径
            if(file_exists($pathd))      //检查图片文件是否存在
            {
              unlink($pathd);
            }
            // 储存图片
            $file->move($destinationPath, $fileName);
            // 拼接图片路径+图片名
            $filePath = asset($destinationPath.$fileName);
            $banner -> photo = $filePath;                                   //图片名
        }
        // 将数据存入数据库
        $info = $banner ->update();
        // 验证是否成功
        if($info){
            return redirect()->action('BannerController@Banindex');
        }else{
            die("<script>alert('添加失败');javascript:history.go(-1);</script>");
        }
    }
    // 图片删除
    public function del($id)
    {
        $banner = new Banner;
        $banner = $banner::find($id);   //查找图片
        $filename = $banner['photo'];   //获取图片地址
        $pathd = 'E:/phpStudy/WWW/RWJ/RUWEIJIAN--TWO/NE-laravel/public/'.$filename;//拼接路径
        // dd(file_exists($pathd));
        //检查图片文件是否存在
        if(file_exists($pathd))
        {
          unlink($pathd);
        }else{
            echo ("<script>alert('文件不存在或路径有误!');javascript:history.go(-1);</script>");
        }
        $banner->delete();
        if($banner){
            return redirect()->action('BannerController@Banindex');
        }else{
            die("<script>alert('删除失败');javascript:history.go(-1);</script>");
        }
    }
    // 搜索
    public function search(Request $request)
    {
        $keywords = $request->keywords;
        $list = DB::table('banner')->where('banner_type', 'like', "%{$keywords}%")->orWhere('title', 'like', "%{$keywords}%")->orWhere('content', 'like', "%{$keywords}%")->orderBy('id','desc')->paginate(10);
        return view('admin/banner',['list'=>$list,'keywords'=>$keywords]);
    }
}