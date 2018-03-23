<?php
namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;
use Request;
use Input;
use App\Http\Model\Shop;//购物车
use App\Http\Model\Member_address;//快递地址信息

class DetailsController extends Controller
{
    //产品详情
    public function details($id){
        // 导航栏
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        foreach($list as $k=>$v){
            $pid=$v->id;
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }

        //产品-5图
        $product = DB::table('goods')->where('goods.id',$id)->get();

        //价格--查询
        foreach($product as $k => $v){
            $pru_pr[] = DB::table('goods_spec')
                ->where('pid',$v->id)
                ->orderBy('price', 'desc')
                ->first();
        }

        //规格
        $spec = DB::table('goods_spec')->where('pid',$id)->get();

        //相关产品
        $type = DB::table('goods')->where('id',$id)->first();
        // dd($type);
        $about = DB::table('goods')
            ->where('type','=',$type->type)
            ->take(8)
            ->get();
        // dd($about);
        //遍历--查询相关产品的价格
        foreach($about as $k => $v){
            $pru[] =DB::table('goods_spec')
            ->where('pid','=',$v->id)
            ->orderBy('price', 'desc')
            ->first();
        }
        // dd($pru);

        // 热销产品
        $sell = DB::table('goods')
             ->where('is_hot','=',1)
             ->orderBy('updated_at','desc')
             ->take(6)
             ->get();
         // dd($sell);
        //遍历--查询热销产品的价格
        foreach ($sell as $k => $v) {
            $pru_se[] = DB::table('goods_spec')
            ->where('pid','=',$v->id)
            ->orderBy('price', 'desc')
            ->first();
        }
        // dd($pru_se);

        // 新品发布
        $recommend = DB::table('goods')
            ->where('is_new','=',1)
             ->orderBy('updated_at','desc')
             ->take(6)
             ->get();

        // 产品详情-编辑器
        $list1 = DB::table('circums')->where('cir_id',$id)->get();

        //产品详情-和-规格
        $info = DB::table('circums_order')->where('cir_ord_id',$id)->get();

        //评论--评价总数-有图-追评
        // 产品评价
        $comment = DB::table('commentary')
            ->join('member', 'commentary.user_id', '=', 'member.id')
            ->join('goods_spec', 'commentary.pro_id', '=', 'goods_spec.pid')
            ->select('member.*','goods_spec.spec','commentary.*')
            ->where('commentary.pro_id',$id)
            ->where('commentary.is_use','1')
            ->paginate(20);
        $nu = Db::table('commentary')->where('pro_id',$id)->where('is_use',"1")->orderBy('id','desc')->get();
        $num = 0;//评论条数(全部)
        $show = 0;//图片数
        $supper1 = 0;//追加
        foreach($nu as $k =>$v){
            $num+=1;
            if($v->show1){
                $show+=1;
            }
            if ($v->supper1) {
                $supper1+=1;
            }
        }

        //=========================================================
        //用户浏览记录--信息记录
        //获取当前登录的用户
        $name = session('member');
        //根据当前用户查询到当前用户的id
        $list111 = DB::table('member')->where('name',$name)->first();
        //对象转化成数组的方法
        function object_to_array($obj) {
            $obj = (array)$obj;
            foreach ($obj as $k => $v) {
                if (gettype($v) == 'resource') {
                    return;
                }
                if (gettype($v) == 'object' || gettype($v) == 'array') {
                    $obj[$k] = (array)object_to_array($v);
                }
            }
            return $obj;
        }
        //转成数组
        $list111 = object_to_array($list111);
        if($list111){
            //取到当前登录用户的id
            $userid = $list111['id'];
            //查询用户记录表有没有记录
            $list222 = DB::table('member_record')->where('userid',$userid)->first();
            //如果为空就添加一条空的记录
            if($list222 === null){
                DB::table('member_record')->insert(['userid' => $userid]);
            }
            //根据当前登陆用户查询
            $list222 = DB::table('member_record')->where('userid',$userid)->first();
            //转化成数组
            $list222 = object_to_array($list222);
            //判断用户浏览记录的字段是否为空
            if($list222['footprint']){
                //把值赋给$footprint
                $footprint = $list222['footprint'];
                //拼接当前的商品id
                $footprint = $footprint.",".$id;
                //修改用户记录表footprint字段
                DB::table('member_record')
                    ->where('userid',$userid)
                    ->update(['footprint' => $footprint]);
            }else{
                //如果为空他就等于空
                $footprint = "";
                //用.号拼接当前商品id
                $footprint = $footprint.$id;
                //将记录更新到数据库中
                DB::table('member_record')
                    ->where('userid',$userid)
                    ->update(['footprint' => $footprint]);
            }
        }
        //=========================================================

        //返回至页面
        return view('wyyx/details',['list'=>$list,'list2'=>$list2,'product'=>$product,'pru_pr'=>$pru_pr,'spec'=>$spec,'about'=>$about,'pru'=>$pru,'sell'=>$sell,'pru_se'=>$pru_se,'recommend'=>$recommend,'list1'=>$list1,'info'=>$info,'comment'=>$comment,'num'=>$num,'show'=>$show,'supper1'=>$supper1,]);
    }

    //评论分类查询
    public function comment()
    {

        if(Request::ajax()){

            // 接收数据
            $data = Input::all();

            // 分隔$data['arr']
            $arr = explode('-',$data['arr']);
            // return $arr;
            // // 类别条件
            $id = $data['pro_id'];

            // 判断获取到的data数字的类型 10是全部,20是有图,30是追评,40是默认排序,50是时间排序

            if($arr['0'] == '10'){
                $condition = "pro_id={$id} and is_use='1'";
            }

            if($arr['0'] == '20'){
                $condition = "pro_id={$id} and is_use='1' and show1 is not null";
            }

            if($arr['0'] == '30'){
                $condition = "pro_id={$id} and is_use='1' and supper1 is not null";
            }


            if($arr['1'] == '40'){
                $order = " order by commentary.show1 desc";
            }

            if($arr['1'] == '50'){
                $order = " order by commentary.created_at desc";
            }


            $list = DB::select("select commentary.*,goods_spec.spec as spec,member.username as username,member.img as img from commentary left join goods_spec on commentary.pro_id = goods_spec.pid left join member on commentary.user_id = member.id where {$condition} group by commentary.id{$order}");

            return $list;
        }
    }


    public function shopNum()
    {
        if(Request::ajax()){
            // 购物车商品数量
            $data = Input::all();
            $card = $data['card'];
            $sql = DB::table('shop')
                ->where('shop.username',$card)
                ->get();
            //定义一个默认值
            $shopNum = 0;
            //遍历
            foreach ($sql as $k => $v) {
                //每次加1
                $shopNum+=1;
            }
            return $shopNum;
        }
    }


    //加入购物车
    public function goshop()
    {
        if(Request::ajax()){
            $data= Input::except('_token');
            //查询当前用户是否拥有此产品
            $exist = DB::table('shop')->where('username',$data['username'])->where('name',$data['name'])->get();
            if($exist != null){
                //有的话返回--已有
                return "have";
            }
            $shop = new Shop;
            $shop -> name = $data['name'];//产品名
            $shop -> price = $data['price'];//售价
            $shop -> spec = $data['spec'];//规格
            $shop -> count = $data['num'];//数量
            $shop -> image = $data['img'];//图片
            $shop -> username = $data['username'];//用户名
            //获取产品的id
            $id = DB::table('goods')->where('name',$data['name'])->lists('id');
            $shop -> pid = $id['0'];
            //将数据存入数据库
            $info = $shop -> save();
            //验证是否成功
            if($info){
                return 'yes';
            }else{
                die("<script>alert('数据添加失败')</script>");
            }
        }
    }



    //个人中心--收藏--单个删除
    public function mylist_fs_del()
    {
        if(Request::ajax()){
            $data = Input::all();
            $id = $data['id'];//id
            // 当前用户名
            $username = $data['username'];
            // 获取用户id
            $userid = DB::table('member')->where('name',$username)->lists('id');
            // 根据用户id查浏览记录
            $foot = DB::table('member_record')->where('userid',$userid)->lists('collection');


            //拆分字符串成数组
            $str1 = explode(",",$foot['0']);

            // //删除空
            for($i=0;$i<count($str1);$i++){
                if(empty($str1[$i])){
                    unset($str1[$i]);
                }
            }

            // //去除重复的值
            $str11 = array_unique($str1);
            // 将$str11转化为数组
            foreach ($str11 as $k => $v) {
                $bb[] = $v;
            }
            //在数组中搜索给定的值，如果成功则返回相应的键名
            $key = array_search($id, $bb);
            if ($key !== false){
                //删除该id
                array_splice($bb, $key, 1);
            }
            // // 数组拼接为字符串
            $str = implode(',',$bb);
            // // 修改表
            $db = DB::table('member_record')->where('userid',$userid)->update(['collection'=>$str]);
            if($db){
                return "yes";
            }else{
                return "no";
            }
        }
    }


    //个人中心--收藏--全部删除
    public function mylist_fs_all_del()
    {
        if(Request::ajax()){
            $data = Input::all();
            // 当前用户名
            $username = $data['username'];
            // 获取用户id
            $userid = DB::table('member')->where('name',$username)->lists('id');

            $db = DB::table('member_record')->where('userid',$userid)->update(['collection'=>null]);
            if($db){
                return "yes";
            }else{
                return "no";
            }
        }
    }


    //个人中心--足迹--单个删除
    public function mylist_ft_del()
    {
        if(Request::ajax()){
            $data = Input::all();
            $id = $data['id'];//id
            // 当前用户名
            $username = $data['username'];
            // 获取用户id
            $userid = DB::table('member')->where('name',$username)->lists('id');
            // 根据用户id查浏览记录
            $foot = DB::table('member_record')->where('userid',$userid)->lists('footprint');


            //拆分字符串成数组
            $str1 = explode(",",$foot['0']);

            // //删除空
            for($i=0;$i<count($str1);$i++){
                if(empty($str1[$i])){
                    unset($str1[$i]);
                }
            }

            // //去除重复的值
            $str11 = array_unique($str1);
            // 将$str11转化为数组
            foreach ($str11 as $k => $v) {
                $bb[] = $v;
            }
            //在数组中搜索给定的值，如果成功则返回相应的键名
            $key = array_search($id, $bb);
            if ($key !== false){
                //删除该id
                array_splice($bb, $key, 1);
            }
            // // 数组拼接为字符串
            $str = implode(',',$bb);
            // // 修改表
            $db = DB::table('member_record')->where('userid',$userid)->update(['footprint'=>$str]);
            if($db){
                return "yes";
            }else{
                return "no";
            }
        }
    }

    //个人中心--收藏--全部删除
    public function mylist_ft_all_del()
    {
        if(Request::ajax()){
            $data = Input::all();
            // 当前用户名
            $username = $data['username'];
            // 获取用户id
            $userid = DB::table('member')->where('name',$username)->lists('id');

            $db = DB::table('member_record')->where('userid',$userid)->update(['footprint'=>null]);
            if($db){
                return "yes";
            }else{
                return "no";
            }
        }
    }



    //订单详情
    public function content()
    {
        if(Request::ajax()){
            $data = Input::all();
            //获取订单的id
            $order_id = $data['id'];
            //查询订单所关联的产品
            $pro = DB::table('gl_order')->where('order_id',$order_id)->get();
            return $pro;
        }
    }

    //查看商品的库存
    public function prosel()
    {
        if(Request::ajax()){
            $data = Input::all();
            $name = $data['name']; //产品名
            $type = $data['type']; //类型
            $spec = $data['spec']; //规格
            //查询此产品的id
            $list = DB::table('goods')->where('name',$name)->where('type',$type)->lists('id');
            //查询规格表里的库存
            $list1 = DB::table('goods_spec')->where('pid',$list['0'])->where('spec',$spec)->lists('count');
            if($list1['0'] < 1){
                return 1;
            }
        }
    }







}
?>