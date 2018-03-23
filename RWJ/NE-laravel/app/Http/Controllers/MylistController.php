<?php
namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Mail;
use App\libs\sms\api_demo\SmsDemo;
use Session;
use App\Http\Model\Member;//用户表
use App\Http\Model\Member_address;//地址
use Validator;
use Input;
class MylistController extends Controller{

    //个人中心--消息
    public function mylist_news(Request $request)
    {
        // 导航栏
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        //遍历出二级导航
        foreach($list as $k=>$v){
            $pid=$v->id;
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        //登录用户信息
        $session = $request->session()->get('member');
        //查询
        $info = DB::table('member')->where('name',$session)->get();
        //加载到个人中心首页
        return view('wyyx/mylist_news',['list'=>$list,'list2'=>$list2,'info'=>$info]);
    }


    //个人中心--个人信息
    public function mylist_in(Request $request)
    {
        //导航栏
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        //遍历出二级导航
        foreach($list as $k=>$v){
            $pid=$v->id;
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        //从session中获取当前用户
        $name = $request->session()->get('member');
        //查询当前用户的所有信息
        $info[] = DB::table('member')->where('name',$name)->first();
        //加载到个人信息页面
        return view('wyyx/mylist_in',['list'=>$list,'list2'=>$list2,'user'=>$info,'info'=>$info]);
    }

    //个人中心信息修改
    public function inupdate(Request $request,$id)
    {
        //实例化数据表
        $member = new Member;
        $username = $member->username = $request->username;//呢称
        $sex = $member->sex = $request->sex;//性别
        $member->id = $id;
        $year = $member->year = $request->year;
        $month = $member->month = $request->month;
        $day = $member->day = $request->day;
        $birthday = $year.'-'.$month.'-'.$day;//生日
        //执行修改
        DB::table('member')
            ->where('id', $id)
            ->update(['username' => $username, 'sex'=> $sex,'birthday'=>$birthday]);

        //从session中获取当前登陆的账户
        $name = $request->session()->get('member');
        //查询当前用户的信息
        $info = DB::table('member')->where('name',$name)->first();
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
        $info = object_to_array($info);
        $str = $info['birthday'];
        $str1[] = (explode("-",$str));
        return redirect()->action('MylistController@mylist_in');
    }


    //个人中心--订单管理
    public function mylist_or(Request $request)
    {
        //导航栏
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        foreach($list as $k=>$v){
            $pid=$v->id;
            //二级导航
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        //获取当前登录人员
        $name = $request->session()->get('member');
        $info = DB::table('member')->where('name',$name)->get();
        //查询用户的所有订单
        $list111 = DB::table('goods_order')->where('member',$name)->take(5)->get();
        //查询未付款订单    状态status = 0
        $list222 = DB::table('goods_order')->where('status',0)->where('member',$name)->get();
        //查询待发货订单    状态status = 1
        $list333 = DB::table('goods_order')->where('status',1)->where('member',$name)->get();

        //查询已发货订单    状态status = 2
        $list444 = DB::table('goods_order')->where('status',2)->where('member',$name)->get();

        //查询待评价订单  状态status = 3
        $list555 = DB::table('goods_order')->where('status',3)->where('member',$name)->get();

        return view('wyyx/mylist_or',['list'=>$list,'list2'=>$list2,'list111'=>$list111,'list222'=>$list222,'list333'=>$list333,'list444'=>$list444,'list555'=>$list555,'info'=>$info]);
    }


    //取消订单
    public function mylist_or_cancel($id)
    {
        //取消订单
        DB::table('goods_order')->where('id',$id)->delete();
        //同时删除订单关联的产品
        DB::table('gl_order')->where('order_id',$id)->delete();
        return redirect()->action('MylistController@mylist_or');
    }

    //确认收货--ajax验证
    public function mylist_yzpay(Request $request)
    {
        //获取当前登陆用户
        $name = $request->session()->get('member');
        //接收前台支付密码
        $pay = md5($request->payment);
        //根据当前登陆用户查询
        $list = DB::table('member')->where('name',$name)->first();
        //对象转数组
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
        $list1 = object_to_array($list);
        if($pay == $list1['payment']){
            return 1;
        }else{
            //密码错误返回2 到前台
            return 2;
        }
    }

    //订单去确认收货
    public function confirmreceipt(Request $request)
    {
        //获取当前登陆用户
        $name = $request->session()->get('member');
        //获取id
        $id = $request->id;
        //修改状态
        DB::table('goods_order')
            ->where('id', $id)
            ->update(['status' => 3]);
        return redirect()->action('MylistController@mylist_or');
    }

    //订单--评价
    public function commodity1(Request $request)
    {
        //接收订单id
        $id = $request->id;
        //接收评论内容
        $content = $request->text;
        //获取当前时间
        $created_at = date("Y-m-d H:i:s",time());
        //获取当前登陆用户
        $name = $request->session()->get('member');
        $info1 = DB::table('member')->where('name',$name)->first();
        //根据订单id查询产品
        $pro = DB::table('gl_order')
            ->where('order_id',$id)
            ->select('goods_id')
            ->get();
        // $pro_id = $pro->goods_id;
        foreach ($pro as $k => $v) {
            $pro_id[] = $v->goods_id;
        }
        //统计id的数量
        $count = count($pro_id);

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
        //转化成数组
        $list = object_to_array($info1);
        $userid = $list['id'];
        $is_use = 0;
        //循环添加评论
        for ($i=0; $i < $count; $i++) {
            DB::table('commentary')->insert(
            ['pro_id' => $pro_id[$i],
            'content' => $content,
            'order_id' => $id,
            'created_at' => $created_at,
            'user_id' => $userid,
            'is_use' => $is_use]);
        }
        //改变订单的状态
        DB::table('goods_order')->where('id', $id)->update(['status' => 4]);
        return redirect()->action('MylistController@mylist_or');
    }

    //订单追评
    public function commodity_cm(Request $request)
    {
        //接受订单id
        $id = $request->id;
        //接收评论内容
        $content = $request->text;
        //获取当前时间
        $created_at = date("Y-m-d H:i:s",time());
        //获取当前登陆用户
        $name = $request->session()->get('member');
        $info1 = DB::table('member')->where('name',$name)->first();
        //根据订单id查询产品
        $pro = DB::table('gl_order')
            ->where('order_id',$id)
            ->select('goods_id')
            ->get();
        //遍历
        foreach ($pro as $k => $v) {
            $pro_id[] = $v->goods_id;
        }
        //统计id的数量
        $count = count($pro_id);


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
        $list = object_to_array($info1);
        $userid = $list['id'];
        //循环添加评论
        for ($i=0; $i < $count; $i++) {
            DB::table('commentary')->where('pro_id',$pro_id[$i])->update(
            ['supper1' => $content,
            'time2' => $created_at,]);
        }
        //改变订单的状态
        DB::table('goods_order')->where('id', $id)->update(['status' => 5]);
        return redirect()->action('MylistController@mylist_or');
    }


    //个人中心-收货地址信息
    public function addas(Request $request)
    {
        //获取当前登录的用户名
        $name = $request->session()->get('member');
        //查询用户的所有信息
        $info[] = DB::table('member')->where('name',$name)->first();
        //对象转数组
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
        //获取当前登陆账户的所有信息
        $list = DB::table('member')->where('name',$name)->first();
        $list1 = object_to_array($list);
        //获取当前登陆用户的id
        $userid = $list1['id'];
        //默认地址
        $info111 = DB::table('member_address')->where('userid',$userid)->orderBy('whether','desc')->paginate(5);
        //所有地址
        $info1 = DB::table('member_address')->where('userid',$userid)->get();
        $count = count($info1);

        // 导航栏
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        foreach($list as $k=>$v){
            $pid=$v->id;
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        return view('wyyx/mylist_as',['list'=>$list,'list2'=>$list2,'info111'=>$info111,'count'=>$count,'info'=>$info]);
    }


    //添加收货地址
    public function addnd(Request $request)
    {
        //实例化数据库
        $add = new Member_address;
        //查询用户信息
        $name = $request->session()->get('member');
        //对象转数组
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
        //获取当前登陆账户的所有信息
        $list = DB::table('member')->where('name',$name)->first();
        $list1 = object_to_array($list);
        //获取当前登陆用户的id
        $userid = $list1['id'];

        $userid = $add->userid = $userid;
        //获取省
        $add->province = $request->s_province;
        //市
        $add->city = $request->s_city;
        //区 县
        $add->county = $request->s_county;
        //详细地址
        $add->detailed = $request->detailed;
        //收货人
        $add->consignee = $request->consignee;
        //手机号码
        $add->phone = $request->phone;
        //默认收货地址
        $whether = $add->whether = $request->checkbox;
        //是否默认收货地址
        if($whether == null){
            $whether = $add->whether = null;
        }else{
            $whether = $add->whether = $request->checkbox;
        }
        $add->save();
        return redirect()->action('MylistController@addas');
    }

    //删除收货地址
    public function adddel($id,request $request){
        DB::table('member_address')->delete($id);
        return redirect()->action('MylistController@addas');
    }

    //跳转到修改收货地址
    public function addedit(request $request){
        $id = $request->id;
        $list = DB::table('member_address')-> where('id', $id)->first();
        //对象转数组
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
        $list1 = object_to_array($list);
        return $list1;
    }


    // 修改地址
    public function asupdate(request $request)
    {
        $add = new member_address();

        //获取当前登陆的用户
        $name = $request->session()->get('member');
        //对象转数组
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
        //获取当前登陆账户的所有信息
        $list = DB::table('member')->where('name',$name)->first();
        $list1 = object_to_array($list);
        //获取当前登陆用户的id
        $userid = $list1['id'];

        $add = member_address::find($request->id);

        $userid = $add->userid = $userid;
        //获取省
        $add->province = $request->s_province;
        //市
        $add->city = $request->s_city;
        //区 县
        $add->county = $request->s_county;
        //详细地址
        $add->detailed = $request->detailed;
        //收货人
        $add->consignee = $request->consignee;
        //手机号码
        $add->phone = $request->phone;
        //默认收货地址
        $whether = $add->whether = $request->checkbox;
        //是否默认收货地址
        if($whether == null){
            $whether = $add->whether = null;
        }else{
            $add->where('userid', $userid)->update(['whether' => ""]);
            $whether = $add->whether = $request->checkbox;
        }
        $info = $add->update();
        if($info){
            return redirect()->action('MylistController@addas');
        }else{
            die("<script>alert('修改失败');javascript:history.go(-1);</script>");
        }
    }

    //设置默认收货地址
    public function setadd($id){
        //实例化地址表
        $add = new member_address();
        //根据传过来的id查询用户id
        $list = DB::table('member_address')-> where('id', $id)->first();
        //对象转数组
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

        $list1[] = object_to_array($list);
        foreach ($list1 as $k) {
        }
        //查询到用户id
        $userid = $k['userid'];
        $add->where('id', $id)
            ->where('userid', $userid)
            ->update(['whether' => "on"]);
        DB::table('member_address')->where('userid',$userid)->where('id','<>',$id)->update(['whether'=>'']);
        return redirect()->action('MylistController@addas');
    }


    //个人中心--收藏
    public function mylist_fs(Request $request)
    {
        //查询顶级分类
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        //二级导航
        foreach($list as $k=>$v){
            $pid=$v->id;
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
         //获取用户
        $name = $request->session()->get('member');
        //头像
        $info[] = DB::table('member')->where('name',$name)->first();
        //获取当前登陆用户
        $list111 = DB::table('member')->where('name',$name)->first();
        //对象转数组
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
        //取到当前登陆用户的id
        $userid = $list111['id'];
        //查询该用户的收藏
        $list222 = DB::table('member_record')->where('userid',$userid)->first();
        if($list222){
            $list222 = object_to_array($list222);
            //获取收藏的字段
            $a = $list222['collection'];
        }else{
            //添加该用户id
            DB::table('member_record')->insert(['userid' => $userid]);
            $list222 = DB::table('member_record')->where('userid',$userid)->first();
            $list222 = object_to_array($list222);
            $a = $list222['collection'];
        }
        $list222 = object_to_array($list222);
        $a = $list222['collection'];
        //拆分成字符串
        $str = (explode(",",$a));
        //删除空
        for($i=0;$i<count($str);$i++){
            if(empty($str[$i])){
                unset($str[$i]);
            }
        }
        //去除重复
        $str1 = array_unique($str);
        //判断是否有值
        if($str1 == null){
            return view('wyyx/mylist_fs',['str1'=>$str1,'list'=>$list,'list2'=>$list2,'info'=>$info]);
        }else{
            foreach ($str1 as $k => $v) {
                $list333[] = DB::table('goods')
                    ->join('goods_spec','goods.id','=','goods_spec.pid')
                    ->select('goods.id','goods.name','goods.goods_img1','goods_spec.price')
                    ->where('goods_spec.pid',$v)
                    ->first();
                if($k == 6) break;
            }
             return view('wyyx/mylist_fs',['str1'=>$str1,'list333'=>$list333,'list'=>$list,'list2'=>$list2,'info'=>$info]);
        }
    }


    //个人中心--我的足迹
    public function mylist_ft(Request $request)
    {
        //查询顶级分类
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        //二级导航
        foreach($list as $k=>$v){
            $pid=$v->id;
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
         //获取用户
        $name = $request->session()->get('member');
        //头像
        $info[] = DB::table('member')->where('name',$name)->first();
        //获取当前登陆用户
        $list111 = DB::table('member')->where('name',$name)->first();
        //对象转数组
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
        //取到当前登陆用户的id
        $userid = $list111['id'];
        //查询该用户的收藏
        $list222 = DB::table('member_record')->where('userid',$userid)->first();
        if($list222){
            $list222 = object_to_array($list222);
            //获取收藏的字段
            $a = $list222['footprint'];
        }else{
            //添加该用户id
            DB::table('member_record')->insert(['userid' => $userid]);
            $list222 = DB::table('member_record')->where('userid',$userid)->first();
            $list222 = object_to_array($list222);
            $a = $list222['footprint'];
        }
        $list222 = object_to_array($list222);
        $a = $list222['footprint'];
        //拆分成字符串
        $str = (explode(",",$a));
        //删除空
        for($i=0;$i<count($str);$i++){
            if(empty($str[$i])){
                unset($str[$i]);
            }
        }
         //去除重复
        $str1 = array_unique($str);
        //判断是否有值
        if($str1 == null){
            return view('wyyx/mylist_ft',['str1'=>$str1,'list'=>$list,'list2'=>$list2,'info'=>$info]);
        }else{
            foreach ($str1 as $k => $v) {
                $list333[] = DB::table('goods')
                    ->join('goods_spec','goods.id','=','goods_spec.pid')
                    ->select('goods.id','goods.name','goods.goods_img1','goods_spec.price')
                    ->where('goods_spec.pid',$v)
                    ->first();
                if($k == 6) break;
            }
             return view('wyyx/mylist_ft',['str1'=>$str1,'list333'=>$list333,'list'=>$list,'list2'=>$list2,'info'=>$info]);
        }
    }

    //个人中心安全账号
    public function ayshow(Request $request)
    {
        //实例化数据库
        $member = new Member;
        //获取登录用户的信息
        $name = $request->session()->get('member');
        //查询用户的所有信息
        $info[] = DB::table('member')->where('name',$name)->first();
        // 导航栏
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        foreach($list as $k=>$v){
            $pid=$v->id;
            //二级导航
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        return view('wyyx/mylist_ay',['list'=>$list,'list2'=>$list2,'info' => $info]);
    }

    //账号安全--修改登录密码
    public function aymodify(Request $request){
        //获取当前用户信息
        $name = $request->session()->get('member');
        //查询用户信息
        $info[] = DB::table('member')->where('name',$name)->first();
        // 导航栏
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        foreach($list as $k=>$v){
            $pid=$v->id;
            //二级导航
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        //加载验证身份页面
        return view('wyyx/mylist_ay_modify',['list'=>$list,'list2'=>$list2,'info'=>$info]);
    }

    //加载到输入账号密码页面
    public function aymodify1(request $request){
        // 导航栏
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        foreach($list as $k=>$v){
            $pid=$v->id;
            //二级导航
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        $session = $request->session()->get('member');
        $info = DB::table('member')->where('name',$session)->get();
        return view('wyyx/mylist_ay_modify1',['list'=>$list,'list2'=>$list2,'info'=>$info]);
    }

    //密码修改成功页面
    public function aymodify2(request $request){
        //实例化用户表
        $member = new member();
        //获取当前登陆用户
        $name = $request->session()->get('member');
        $info[] = DB::table('member')->where('name',$name)->first();
        //接收密码
        $password = md5($request->password);
        // 修改密码
        $member->where('name', $name)->update(['password' => $password]);
        // 导航栏
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        foreach($list as $k=>$v){
            $pid=$v->id;
            //二级导航
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        return view('wyyx/mylist_ay_modify2',['list'=>$list,'list2'=>$list2,'info'=>$info]);
    }


    //修改绑定手机
    public function replace(request $request){
        //获取当前登陆用户
        $name = $request->session()->get('member');
        //查询用户的所有信息
        $info[] = DB::table('member')->where('name',$name)->first();
        // 导航栏
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        foreach($list as $k=>$v){
            $pid=$v->id;
            //二级导航
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        //加载验证身份页面
        return view('wyyx/mylist_ay_replace',['list'=>$list,'list2'=>$list2,'info'=>$info]);
    }

    public function replace1(request $request){
        // 导航栏
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        $name = $request->session()->get('member');
        $info[] = DB::table('member')->where('name',$name)->first();
        foreach($list as $k=>$v){
            $pid=$v->id;
            //二级导航
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        return view('wyyx/mylist_ay_replace1',['list'=>$list,'list2'=>$list2,'info'=>$info]);
    }

    //修改绑定手机成功页面
    public function replace2(request $request){
        //获取当前登陆用户
        $name = $request->session()->get('member');
        //接收新手机号码
        $phone = $request->phone;
        DB::table('member')->where('name', $name)->update(['phone' => $phone]);
        // 导航栏
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        foreach($list as $k=>$v){
            $pid=$v->id;
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        $info[] = DB::table('member')->where('name',$name)->first();
        return view('wyyx/mylist_ay_replace2',['list'=>$list,'list2'=>$list2,'info'=>$info]);
    }


    //个人中心修改支付密码页面-验证身份信息页面
    public function modifypay(request $request){
        //获取当前登陆用户
        $name = $request->session()->get('member');
        //查询用户的所有信息
        $info[] = DB::table('member')->where('name',$name)->first();
        // 导航栏
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        foreach($list as $k=>$v){
            $pid=$v->id;
            //二级导航
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        //加载验证身份页面
        return view('wyyx/mylist_ay_modifypay',['list'=>$list,'list2'=>$list2,'info'=>$info]);
    }

    //修改支付密码
    public function yzpay(Request $request)
    {
        //获取当前登陆用户
        $name = $request->session()->get('member');
        //接收前台支付密码
        $pay = md5($request->pay);
        //根据当前登陆用户查询
        $list = DB::table('member')->where('name',$name)->first();
        //对象转数组
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
        $list1 = object_to_array($list);
        if($pay == $list1['payment']){
            // return redirect()->action('IndexController@index');
            return 1;
        }else{
            //密码错误返回2 到前台
            return 2;
        }
    }

    //加载到输入支付密码页面
    public function modifypay1(request $request){
        // 导航栏
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        $name = $request->session()->get('member');
        $info[] = DB::table('member')->where('name',$name)->first();
        foreach($list as $k=>$v){
            $pid=$v->id;
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        return view('wyyx/mylist_ay_modifypay1',['list'=>$list,'list2'=>$list2,'info'=>$info]);
    }


    //密码修改成功页面
    public function modifypay2(request $request){
        //实例化用户表
        $member = new member();
        //获取当前登陆用户
        $name = $request->session()->get('member');
        $info[] = DB::table('member')->where('name',$name)->first();
        //接收密码
        $password = md5($request->password);
        // 修改密码
        $member->where('name', $name)->update(['payment' => $password]);
        // 导航栏
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        foreach($list as $k=>$v){
            $pid=$v->id;
            //二级导航
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        return view('wyyx/mylist_ay_modifypay2',['list'=>$list,'list2'=>$list2,'info'=>$info]);
    }

    //个人中心找回支付密码页面-验证身份信息页面
    public function payupdate(request $request){
        //获取当前登陆用户
        $name = $request->session()->get('member');
        //查询用户的所有信息
        $info[] = DB::table('member')->where('name',$name)->first();
       // 导航栏
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        foreach($list as $k=>$v){
            $pid=$v->id;
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        return view('wyyx/mylist_ay_payupdate',['list'=>$list,'list2'=>$list2,'info'=>$info]);
    }

    //设置支付密码页面
    public function payupdate1(request $request){
         // 导航栏
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        $name = $request->session()->get('member');
        $info[] = DB::table('member')->where('name',$name)->first();
        foreach($list as $k=>$v){
            $pid=$v->id;
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        return view('wyyx/mylist_ay_payupdate1',['list'=>$list,'list2'=>$list2,'info'=>$info]);
    }

    //设置支付密码成功
    public function payupdate2(Request $request)
    {
        //实例化用户表
        $member = new member();
        //获取当前登陆用户
        $name = $request->session()->get('member');
        //接收密码
        $password = md5($request->password);
        // 修改密码
        $member->where('name', $name)->update(['payment' => $password]);

        $name = $request->session()->get('member');
        $info[] = DB::table('member')->where('name',$name)->first();
        // 导航栏
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        foreach($list as $k=>$v){
            $pid=$v->id;
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        return view('wyyx/mylist_ay_payupdate2',['list'=>$list,'list2'=>$list2,'info'=>$info]);
    }




}

?>