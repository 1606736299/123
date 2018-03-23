<?php
namespace App\Http\Controllers;
use Request;
use DB;
use App\Http\Controllers\Controller;
use Input;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //首页加载
    public function index(Request $request)
    {
        //导航栏--查询
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        // dd($list);
        //遍历$list--取到id
        foreach($list as $k => $v){
            //查询id
            $pid = $v->id;
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        //轮播图
        $banner = DB::table('banner')->where('banner_type','首页')->orderBy('order','asc')->get();
        // dd($banner);
        //品牌制造商--只获取两张图片
        $make1 = DB::table('banner')->where('banner_type','品牌商')->orderBy('order','asc')->take(2)->get();
        //skip--跳过两张只取两张
        $make2 = DB::table('banner')->where('banner_type','品牌商')->orderBy('order','asc')->skip(2)->take(2)->get();

        //新品首发
        $new = DB::table('goods')
                ->join('goods_spec','goods.id','=','goods_spec.pid')
                ->where('goods.is_new','1')
                ->select('goods.*','goods_spec.price')
                ->groupBy('goods_spec.pid')
                ->having('goods_spec.price','>','250')
                ->orderBy('goods.updated_at','desc')
                ->take(12)
                ->get();

        //人气推荐--编辑推荐
        $best = DB::table('goods')
                ->join('goods_spec','goods.id','=','goods_spec.pid')
                ->where('goods.is_best','1')
                ->select('goods.*','goods_spec.price')
                ->groupBy('goods_spec.pid')
                ->having('goods_spec.price','>','250')
                ->orderBy('goods.updated_at','desc')
                ->take(7)
                ->get();
        //人气推荐--热销总榜
        $hot = DB::table('goods')
                ->join('goods_spec','goods.id','=','goods_spec.pid')
                ->where('goods.is_hot','1')
                ->select('goods.*','goods_spec.price')
                ->groupBy('goods_spec.pid')
                ->having('goods_spec.price','>','250')
                ->orderBy('goods.updated_at','desc')
                ->take(7)
                ->get();

        //一级类别--顶级分类
        $list3 = DB::table('product_type')
                ->join('banner','product_type.name','=','banner.title')
                ->where('product_type.pid','0')
                ->where('banner.status','1')
                ->select('product_type.*','banner.photo')
                ->groupBy('product_type.id')
                ->orderBy('product_type.id','asc')
                ->get();
        //一级类别下的二级类别信息,商品信息
        foreach($list3 as $k4 => $v4){
            //获取id
            $id = $v4->id;//获取顶级分类的id
            //获取二级类别信息--顶级分类下的子类
            $list5[$k4] = DB::table('product_type')->where('pid',$id)->orderBy('id','asc')->get();
            // 获取二级类别名
            $type = DB::table('product_type')
                ->where('pid',$id)
                ->orderBy('pid')
                ->lists('name');
            // 获取各个类别下的商品信息,按上传时间排名,各4个
            $list4[$k4] = DB::table('goods')
                ->join('goods_spec','goods.id','=','goods_spec.pid')
                ->whereIn('goods.type',$type)//验证给定的值是否在$type中
                ->where('goods.is_putaway','1')
                ->groupBy('goods.type')
                ->havingRaw('MIN(goods.id)')
                ->orderBy('goods.updated_at','desc')
                ->take(4)
                ->get();
        }

        //大家都在说
        $comment = DB::table('commentary')
            ->join('member','commentary.user_id','=','member.id')
            ->join('goods_spec','commentary.pro_id','=','goods_spec.pid')
            ->join('goods','commentary.pro_id','=','goods.id')
            ->select('member.username','goods_spec.spec','goods_spec.price','goods_spec.picture','commentary.created_at','commentary.content','goods.name','goods.id')
            ->where('commentary.is_use','1')
            ->groupBy('goods.id')
            ->take(6)
            ->get();


        return view('wyyx/index',['list'=>$list,'list2'=>$list2,'banner'=>$banner,'make1'=>$make1,'make2'=>$make2,'new'=>$new,'best'=>$best,'hot'=>$hot,'list3'=>$list3,'list5'=>$list5,'list4'=>$list4,'comment'=>$comment]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 注册页
    public function register()
    {
        return view('wyyx/register');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //列表页
    public function Pillow($id)
    {
        //导航栏
        $list= DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        //顶级分类下的子分类
        foreach($list as $k => $v){
            //获取id
            $pid = $v -> id;
            //根据id查询子类
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        // 首页 > (居家)--查询产品类
        $info = DB::table('product_type')->where('id',$id)->get();
        foreach($info as $k1 => $v1){
            //查询该类的名字--查询banner图
            $name = $v1->name;
            //根据该类别查询banner图
            $banner = DB::table('banner')->where('banner_type','类别展示')->where('title',$name)->where('status','1')->orderBy('order','asc')->get();
            // echo "<pre>";
            // var_dump($banner);
        }

        //获取二级分类信息
        $type = DB::table('product_type')->where('pid',$id)->orderBy('id','asc')->get();
        //遍历
        foreach($type as $k => $v){
            //获取各个二级分类下的商品
            $content[$k] = DB::table('goods')
                ->join('goods_spec','goods.id','=','goods_spec.pid')
                ->where('goods.type',$v->name)
                ->where('goods.is_putaway','1')
                ->groupBy('goods_spec.pid')
                ->orderBy('goods.id','asc')
                ->get();
        }
        // dd($content);
        // dd($content);
        return view('wyyx/Pillow',['list'=>$list,'list2'=>$list2,'info'=>$info,'banner'=>$banner,'type'=>$type,'content'=>$content]);
    }

    //列表页--分类查询
    public function Pillow2(){

        if(Request::ajax()){
            //接受数据
            $dat = Input::all();
            //分割$dat
            $data = explode('-',$dat['data']);

            //类别条件查询
            $ddd = $dat['name'];
            $id = DB::table('product_type')->where('name',$ddd)->lists('id');//查询该顶级分类的id
            $name = DB::table('product_type')->where('pid',$id)->lists('name');//查询子类

            //拼接where条件--查询
            $uname = "";
            for($i=0;$i<count($name);$i++){
                $uname = $uname."'".$name[$i]."',";
            }
            //产品类别是否在查询出来的类别中
            $the_uname = "goods.type in($uname'')";

            //判断获取到的data数字的类型 10是全部,20是类别,30是默认,40是价格顺序,41是价格倒序,50是时间排序
            //查询所有
            if($data['0'] == '10' && ($data['1'] == '30')){
                return 'first';
            }

            //查询产品是否上架
            if($data['0'] == '10'){
                $condition = "goods.is_putaway='1'";
            }

            //查询产品类别
            if($data['0'] == '20'){
                $type = $dat['type'];
                $condition = "goods.is_putaway='1' and goods.type = '{$type}'";
            }

            //查询
            if($data['1'] == '30'){
                $order = "";
            }

            //价格倒序
            if($data['1'] == '41'){
                $order = " order by price desc";

            }

            //价格正序
            if($data['1'] == '40'){
                $order = " order by price asc";

            }

            //时间倒序
            if($data['1'] == '50'){
                $order = " order by goods.updated_at desc";
            }

            //查询
            $list = DB::select("select goods.*,goods_spec.price as price,goods_spec.pid from goods left join goods_spec on goods.id = goods_spec.pid where {$the_uname} and {$condition} group by goods_spec.pid{$order}");

            return $list;
        }

    }


    //全局搜索(search页面)->点击搜索(ajax)
    public function research()
    {
        if(Request::ajax()){
            //接收数据
            $data = Input::all();
            //默认
            if($data['arr'] == '30'){
                $order = " order by goods.id asc";
            }

            //价格--倒序
            if($data['arr'] == '41'){
                $order = " order by price desc";

            }

            //价格--正序
            if($data['arr'] == '40'){
                $order = " order by price asc";

            }

            //时间
            if($data['arr'] == '50'){
                $order = " order by goods.updated_at desc";
            }

            //类别
            $name = $data['name'];

            //查询
            $search = DB::select("select goods.*,goods_spec.price as price,goods_spec.pid from goods left join goods_spec on goods.id = goods_spec.pid where goods.is_putaway='1' and goods.name like '%{$name}%' group by goods_spec.pid{$order}");

            return $search;
        }
    }

}
