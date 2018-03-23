<?php
namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input;
use App\Http\Model\Shop;//购物车
use App\Http\Model\Member_record;//用户浏览信息--购物车

class ShopController extends Controller
{

    //购物车
    public function shop(Request $request)
    {
        //导航栏--顶级分类
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        //子分类
        foreach ($list as $k => $v) {
            $pid = $v->id;
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        //判断是否登录
        if($request->session()->has('member')){
            //获取登录用户名
            $value = $request -> session() -> get('member');
            //查询用户是否有商品
            $shop = DB::table('shop')->where('username',$value)->get();
            if(empty($shop)){
                //商品为空的页面
                return view('wyyx/shop',['list'=>$list,'list2'=>$list2,'shop'=>$shop]);
            }else{
                //如果不为空的话
                return view('wyyx/shopping',['list'=>$list,'list2'=>$list2,'shop'=>$shop]);
            }
        }else{
            //返回至页面
            return view('wyyx/shop',['list'=>$list,'list2'=>$list2]);
        }
    }


    public function shopping()
    {
        // 导航栏
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        foreach($list as $k=>$v){
            $pid=$v->id;
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        return view('wyyx/shopping',['list'=>$list,'list2'=>$list2]);
    }



    //全局搜索--首页的搜索
    public function search(Request $request)
    {
        //接收所有传值
        $input = $request->all();
        // dd($input);
        $name = $input['name'];
        //查询
        $search = DB::table("goods")
            ->join("goods_spec","goods.id","=","goods_spec.pid")
            ->select("goods.*","goods_spec.price","goods_spec.pid")
            ->where('goods.is_putaway','1')
            ->where('goods.name','like',"%{$name}%")
            ->groupBy('goods_spec.pid')
            ->orderBy('goods.id','asc')
            ->get();
        // dd($search);
        //类名
        $arr['0'] = $name;
        // 导航栏
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        foreach($list as $k=>$v){
            $pid=$v->id;
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        return view('wyyx/search',['search'=>$search,'arr'=>$arr,'list'=>$list,'list2'=>$list2]);
    }


    // 删除订单--商品
    public function del(Request $request)
    {
        // 接收数据
        $data = Input::all();
        $list = DB::table('shop')->where('id',$data['id'])->delete();
        if($list){
            return "success";
        }
    }


    //查看当前用户是否收藏此产品
    public function select(Request $request)
    {
        //接受传值
        $id = $request->id;
        // 用户名
        $member = $request->session()->get('member');
        // 用户id
        $user_id = DB::table('member')->where('name',$member)->lists('id');
        //查询用户是否收藏次产品
        $list = DB::table('member_record')->where('userid',$user_id)->get();
        $collection = $list['0']->collection;
        $newid = $id.',';
        if(strstr($collection,$newid)){
            return 1;
        }else{
            return 2;
        }
    }

    //订单中--收藏
    public function collect(Request $request)
    {
        // 接收数据
        $data = Input::all();
        $id = $data['id'];
        // 用户名
        $member = $request->session()->get('member');
        // 用户id
        $user_id = DB::table('member')->where('name',$member)->lists('id');
        // 查询该id用户是否有详情信息
        $list = DB::table('member_record')->where('userid',$user_id)->get();
        // 如果没有,则添加信息
        if($list == null){
            $details = new Member_record;
            $details->userid = $user_id;
            $details->collection = $id.',';
            $up = $details->save();
        }else{
            // 如果有,则更新信息
            $details = new Member_record;
            $details = $details->where('userid',$user_id)->first();
            $collection = $list['0']->collection;
            $details->collection = $collection.$id.',';
            $up = $details->save();
        }
    }

    //取消收藏
    public function delcollect(Request $request)
    {
        //接受数据
        $data = Input::all();
        $id = $data['id'];
        // 用户名
        $member = $request->session()->get('member');
        // 用户id
        $user_id = DB::table('member')->where('name',$member)->lists('id');
        // 查询该id用户是否有详情信息
        $list = DB::table('member_record')->where('userid',$user_id)->select('collection')->get();
        //如果有则删除
        $li = $list['0']->collection;
        $newid = $id.',';
        //清除
        $info = str_replace($newid, '', $li);
        //从新写入表中
        $details = new Member_record;
        $details = $details->where('userid',$user_id)->update(['collection'=>$info]);
    }




}
?>