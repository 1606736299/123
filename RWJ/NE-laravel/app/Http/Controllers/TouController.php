<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Image;
use App\Http\Model\Goods;
use App\Http\Model\Adminuser;

class TouController extends Controller
{
    //前台用户设置头像
    public function tx(Request $request)
    {
        //获取当前登录用户
        $ses = $request->session()->get('member');
        //接受所有数据
        $input = $request->all();
        //图片接收
        $file = $input['file'];
        //限制图片格式
        $allowed_extensions = ["png","jpg","gif"];
        //判断是否符合
        if($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(),$allowed_extensions)){
            die("<script>alert('只允许上传png, jpg 或 gif格式');javascript:history.go(-1);</script>");
        }
        // 图片保存路径
        $destinationPath = 'images/'; //public 文件夹下面的images文件夹
        // 图片后缀
        $extension = $file->getClientOriginalExtension();
        //随机数字为图片名字
        $fileName = str_random(10).'.'.$extension;
        // 储存图片
        $file->move($destinationPath, $fileName);
         // 拼接图片名
        $filePath = asset($destinationPath.$fileName);
        //删除原来的图片
        $filen =DB::table('member')
            ->where('name',$ses)
            ->select('img')
            ->first();
        //图片名
        $filen1 = $filen->img;
        $path = substr($filen1,13);   //截取图片地址
        $pathd = 'E:\phpStudy\WWW\RWJ\RUWEIJIAN--TWO\NE-laravel\public'.$path;//拼接路径
        if(file_exists($pathd))      //检查图片文件是否存在
            {
              unlink($pathd);
            }
        //删除图片之后执行修改
        $bb = DB::table('member')
                ->where('name',$ses)
                ->update(["img"=>$filePath]);
          return redirect()->action('MylistController@mylist_news');
    }
}


?>