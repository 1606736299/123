<?php
namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\Member;//用户
use App\Http\Model\Good_de;//存储商品信息
use App\Http\Model\Goods_order;//订单
use App\Http\Model\Gl_order;//关联订单

class MemberController extends Controller
{
    //立即购买
    public function buy_now(Request $request)
    {
        // 导航栏
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        foreach($list as $k=>$v){
            $pid=$v->id;
            //二级分类
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        //接受所有数据
        $input = $request->all();
        //实例化数据表
        $good = new Good_de;
        //获取产品图片
        $image = DB::table('goods')->where('name',$input['goods_name'])->lists('goods_img1');
        //获取产品id
        $pid = DB::table('goods')->where('name',$input['goods_name'])->lists('id');

        //删除表里的数据
        DB::table('good_de')->delete();

        $good->name = $input['goods_name'];//产品名
        $good->spec = $input['spec'];//规格
        $good->price = $input['price'];//价格
        if(empty($input['num'])){
            die("<script>javascript:history.go(-1);</script>");
        }
        $good->count = $input['num'];//数量
        $good->image = $image['0'];//图片
        $good->pid = $pid['0'];//id

        //添加
        $good->save();
        $gs = DB::table('good_de')->get();

        //从session中获取当前用户
        $username = $request->session()->get('member');
        //查询用户id
        $userid =  DB::table('member')->where('name',$username)->lists('id');
        if($userid){
            $address = DB::table('member_address')->where('userid',$userid)->where('whether','on')->get();
            $shop = DB::table('shop')->where('username',$username)->get();
        }else{
            // 导航栏
            $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
            foreach($list as $k=>$v){
                $pid=$v->id;
                $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
            }
            return view('wyyx/login',['list2'=>$list2,'list'=>$list]);
        }
        return view('wyyx/buy_now',['list2'=>$list2,'list'=>$list,'address'=>$address,'gs'=>$gs]);
    }


    //购物车跳转订单页
    public function shoptobuy(Request $request)
    {
        // 导航栏
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        //遍历--查询二极分类
        foreach($list as $k=>$v){
            $pid=$v->id;
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        //获取所有值
        $input = $request->all();

        for($i=0; $i< count($input['goods_name']); $i++){
            //删除值为空的元素
            if($input['goods_name'][$i] == ''){
                unset($input['goods_name'][$i]);
            }
            if($input['spec'][$i] == ''){
                unset($input['spec'][$i]);
            }
            if($input['price'][$i] == ''){
                unset($input['price'][$i]);
            }
            if($input['num'][$i] == ''){
                unset($input['num'][$i]);
            }
        }
        //将键从零开始排序
        $input['goods_name'] = array_values($input['goods_name']);//商品名
        $input['spec'] = array_values($input['spec']);//规格
        $input['price'] = array_values($input['price']);//价格
        $input['num'] = array_values($input['num']);//数量

        //实例化
        $good = new Good_de;
        //删除表里的数据
        DB::table('good_de')->delete();
        //循环添加数据
        for ($j = 0; $j<count($input['goods_name']); $j++){
            //查询商品图片
            $image[$j] = DB::table('goods')->where('name',$input['goods_name'][$j])->lists('goods_img1');
            //查询商品id
            $goods_pid[$j] = DB::table('goods')->where('name',$input['goods_name'][$j])->lists('id');
            //执行添加
            $Good_de = DB::table('good_de')->insert(['name'=>$input['goods_name'][$j],'spec'=>$input['spec'][$j],'price'=>$input['price'][$j],'count'=>$input['num'][$j],'image'=>$image[$j]['0'],'pid'=>$goods_pid[$j]['0']]);
        }
        $gs = DB::table('good_de')->get();
         //从session中获取当前登陆的账户
        $username = $request->session()->get('member');
        $userid =  DB::table('member')->where('name',$username)->lists('id');
        if($userid){
            //查询该用户的地址
            $address = DB::table('member_address')->where('userid',$userid)->where('whether','on')->get();
            $shop = DB::table('shop')->where('username',$username)->get();
        }else{
            // 导航栏
            $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
            foreach($list as $k=>$v){
                $pid=$v->id;
                $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
            }
            return view('wyyx/login',['list2'=>$list2,'list'=>$list]);
        }

        return view('wyyx/buy_now',['list2'=>$list2,'list'=>$list,'address'=>$address,'gs'=>$gs]);
    }


    //支付
    public function zhifu(Request $request)
    {
        //实例化数据表
        $goods_order = new Goods_order;
         //随机一个订单号
        $order = str_random(10);
        $goods_order -> order_sn = $order;
        // 用户名
        $username = $request->session()->get('member');
        //查询地址
        $id = DB::table('member')->where('name',$username)->first();
        $address = DB::table('member_address')->where('userid',$id->id)->where('whether','on')->first();
        $goods_order -> member = $username;
        //手机号
        $goods_order -> phone = $address->phone;
        //地址
        $goods_order -> address = $address->detailed;
        // 状态
        $goods_order -> status = 1;
        //执行添加
        $goods_order ->save();

        //查询订单的id号
        $oid = DB::table('goods_order')->where('order_sn',$order)->lists('id');


        //获取所有信息
        $input = $request->all();
        //统计数量
        $counts = count($input['goods_name']);

        //删除shop表里的东西
        for ($i=0; $i < $counts; $i++) {
            DB::table('shop')->where('name',$input['goods_name'][$i])->delete();

            //查询该产品的id
            $pid = DB::table('goods')->where('name',$input['goods_name'][$i])->lists('id');
            $count = $input['num'][$i];//购买的数量
            //产品的总数量
            $count1 = DB::table('goods_spec')->where('pid',$pid['0'])->where('spec',$input['spec'][$i])->select('count')->first();
            $count2 = $count1->count;
            $count3 = $count2 - $count;
            DB::table('goods_spec')->where('pid',$pid['0'])->where('spec',$input['spec'][$i])->update(['count'=>$count3]);
        }

        $counts1 = count($input['goods_name']);
        for ($i = 0; $i < $counts1; $i++) {
            //实例化订单关联表
            $gl = new Gl_order;
            $gl -> order_id = $oid['0'];//关联id
            $gl -> name = $input['goods_name'][$i];//产品名
            $gl -> spec = $input['spec'][$i];//规格
            $gl -> price = $input['price'][$i];//价格
            $gl -> count = $input['num'][$i];//数量

            // 图片
            $image = DB::table('goods')->where('name',$input['goods_name'][$i])->lists('goods_img1');
            $gl -> image = $image['0'];
            // 类别
            $type = DB::table('goods')->where('name',$input['goods_name'][$i])->lists('type');
            $gl -> type = $type['0'];
            // goods_id
            $id = DB::table('goods')->where('name',$input['goods_name'][$i])->lists('id');
            $gl -> goods_id = $id['0'];
            $info = $gl -> save();
        }
        if($info){
            return redirect()->action('MylistController@mylist_or');
        }

    }



}




?>