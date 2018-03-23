<?php
namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Mail;
use App\libs\sms\api_demo\SmsDemo;
use Session;
use App\Http\Model\Member;
use Validator;

class HomeController extends Controller{

    //注册验证号码的状态
    public function index(Request $request)
    {
        //接受前台账号信息
        $name = $request->name;
        //手机号码正则
        $reg1 = "/^1[34578]\d{9}$/";
        // 邮箱正则
        $reg2="/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/";
        //判断登陆账号是不是手机或者邮箱
        if(preg_match($reg1, $name) || preg_match($reg2,$name)){
            //查询账号是否存在
            $info = DB::table('member')->where('name',$name)->first();
            $info1 = DB::table('member')->where('phone',$name)->first();
            if($info == null && $info1 == null){
                //转为json格式
                return json_encode(null);
            }else{
                if($info && $info1){
                    $info = json_encode($info);
                    return $info;
                }elseif($info){
                    $info = json_encode($info);
                    return $info;
                }elseif($info1){
                    $info1 = json_encode($info1);
                    return $info1;
                }
            }
        }else{
            //如果不是手机或者邮箱就返回1到前台
            return 1;
        }
    }

    //图片验证码
    public function tpyzm(Request $request)
    {
        $rules = ['captcha' =>'required|captcha'];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return 2;
        }else{
            return 1;
        }
    }

    //注册验证手机号码状态
    public function number(Request $request){
        //接收前台手机号码信息
        $number = $request->number;
        // 查询手机号码是否存在
        $info = DB::table('member')->where('name',$number)->first();
        $info1 = DB::table('member')->where('phone',$number)->first();
        if($info == null && $info1 == null){
            //转为json格式
            return json_encode(null);
        }else{
            if($info && $info1){
                $info = json_encode($info);
                return $info;
            }elseif($info){
                $info = json_encode($info);
                return $info;
            }elseif($info1){
                $info1 = json_encode($info1);
                return $info1;
            }
        }

    }


    //发送手机验证码
    public function sms(Request $request){
        $phone = $request->sms;
        $demo = new SmsDemo(
            "LTAIovsuBsQpJvXg",//Access Key ID
            //Access Key Secret
            "orpsD097vsCJ0qHOpDyeExPJ01rIlp"
        );
        $code = mt_rand(100000,999999);
        $response = $demo->sendSms(
            "茹伟健", // 短信签名
            "SMS_121165336", // 短信模板编号
            "$phone", // 短信接收者
            Array(  // 短信模板中字段的值
                "code"=>"$code",
            )
        );
        $request->session()->put('code', $code);
        $response = json_encode($response);
        return $response;
    }

    //验证手机验证码
    public function yzm(request $request){
        //获取数据
        $qrmm = $request->qrmm;
        //获取session里的验证码
        $v = $request->session()->get('code');
        if($qrmm == $v){
            return 1;
        }else{
            return 2;
        }
    }

    //注册到数据库
    public function register(Request $request)
    {
        //实例化数据库
        $member = new Member;
        $name = $member -> name = $request->name;//用户名
        $member -> password = md5($request->password);//密码
        //手机号正则
        $reg = "/^1[34578]\d{9}$/";
        //判断登录账号是不是邮箱或者手机号
        if(preg_match($reg,$name)){
            $member -> phone = $name;//是的话存入phone字段
            $member -> email = "";//email字段存入空数据
        }else{
            $member -> phone = $request->tel;
            $member -> email = $name;
        }
        //执行添加
        $member ->save();
        return redirect()->action('HomeController@login');
    }

    //登陆页
    public function login(Request $request)
    {
        //导航栏--查询
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        // dd($list);
        foreach($list as $k=>$v){
            $pid=$v->id;
            //顶级分类下的子类
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }
        //清除session
        $request->session()->forget('member');
        return view('wyyx/login',['list'=>$list,'list2'=>$list2]);
    }

    //前台登录验证
    public function vn(Request $request)
    {
        //获取登录名和密码
        $name = $request->zh;
        $password = md5($request->mm);
        //根据登录名查询
        $list = DB::table('member')->where('name',$name)->where('status','1')->first();
        //dd($list->password);
        //判断--如果用户名不对，返回1
        if($list == ""){
            return 1;
        }else{
            if($password === $list->password){
                //密码正确返回3
                return 3;
            }else{
                //密码错误返回2
                return 2;
            }
        }
    }

    //登录验证成功之后进入主页并把session写进去
    public function vnindex(Request $request)
    {
        //将登录的账号写入session
        $name = $request->name;//账号
        $request->session()->put('member',$name);

        // 导航栏
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        foreach($list as $k=>$v){
            $pid=$v->id;
            $list2[$k] = DB::table('product_type')->where('pid',$pid)->orderBy('id','asc')->get();
        }

        //轮播图
        $banner = DB::table('banner')->where('banner_type','首页')->orderBy('order','asc')->get();
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
                ->orderBy('product_type.id','asc')
                ->get();
        //一级类别下的二级类别信息,商品信息
        foreach($list3 as $k4 => $v4){
            //获取id
            $id = $v4->id;//获取顶级分类的id
            //获取二级类别信息--顶级分类下的子类($list[$k4]==$list相当于一个数据->在前台遍历($list[0]))
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


    //找回密码是验证账号和手机号码是否一致
    public function zhsjyz(Request $request){
        //接收前台手机号码信息
        $number = $request->number;//手机号
        $zh = $request->zh;//账号
        //判断账号和手机号是否相同
        if($zh == $number){
            //查询
            $info = DB::table('member')->where('name',$zh)->first();//查询手机号和账号是否相同
            $info1 = DB::table('member')->where('phone',$number)->first();
            if($info == $info1){
                return 1;
            }else{
                return 2;
            }
            //否则
        }else{
            $info = DB::table('member')->where('name',$zh)->first();//账号
            $info1 = DB::table('member')->where('phone',$number)->first();//手机号
            if($info != "" && $info1 != ""){
                return 1;
            }else{
                return 2;
            }
        }

    }

    //重置密码--第一步(查询账号)
    public function password(Request $request)
    {
        $name = $request -> name;//账号
        $phone = $request -> phone;//手机号
        if($name == $phone){
            $info1 = DB::table('member')->where('name',$name)->first();
        }else{
            $info1 = DB::table('member')->where('email',$name)->first();
        }

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
        $zhanghao = $list['name'];

        //跳转到重设密码页面
        return view('wyyx/rpassword', ['zhanghao' => $zhanghao]);
    }

    //找回密码成功--写入数据库
    public function newpassword(Request $request)
    {
        $member = new Member;
        //接受用户名
        $name = $member -> name = $request->name;
        //加密
        $password = $member -> password = md5($request->password);
        $member -> where('name', $name)->update(['password' => $password]);
        return redirect()->action('IndexController@index');
    }


    //购物车支付验证
    public function buy_yz(Request $request)
    {
        //支付密码加密
        $password = md5($request->pass);
        //获取当前用户
        $name = $request->session()->get('member');
        //查询
        $list = DB::table('member')->where('name',$name)->where('status','1')->first();
        //判断是否存在
        if($list == ""){
            //账号不存在
            return 1;
        }else{
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
        }
        $list1 = object_to_array($list);
        if($password == $list1['payment']){
            return 3;
        }else{
            //密码错误返回2 到前台
            return 2;
        }
    }
}

?>