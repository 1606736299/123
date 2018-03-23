<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Model\Goods_order;
use App\Http\Controllers\Controller;

class OrderController extends Controller{

    //权限
    public function __construct()
    {
        //超级管理员
        $this->middleware('ability:Boss,orderindex',['only'=>['orderindex']]);
        //后台管理员管理
        $this->middleware('ability:orderindex,orderindex',['only'=>['orderindex']]);
    }

    //订单
	public function orderindex()
	{
        //查询
		$list  = DB::table('goods_order')->paginate(5);
		return view('admin/order',['list'=>$list]);
	}

    //修改订单--状态
	public function order_fh($id)
    {
        //修改订单状态为2
        DB::table('goods_order')
            ->where('id', $id)
            ->update(['status' => 2]);
        return redirect()->action('OrderController@orderindex');
    }

    //查看订单--详情
    public function orderinfo($id)
    {
        //根据id查询
        $list = DB::table('gl_order')->where('order_id',$id)->get();
        return view('admin/order_info',['list'=>$list]);
    }

    //订单查询
    public function ordersearch(Requests $request)
    {
        //获取信息
        $keywords = $request->keywords;
        //查询
        $list = DB::table('goods_order')->where('id','like',"%{$keywords}%")->orWhere('order_sn','like',"%{$keywords}%")->orWhere('member','like',"%{$keywords}%")->orWhere('phone','like',"%{$keywords}%")->orWhere('address','like',"%{$keywords}%")->orderBy('id','desc')->paginate(5);
        return view('admin/order',['list'=>$list,'keywords'=>$keywords]);
    }
}