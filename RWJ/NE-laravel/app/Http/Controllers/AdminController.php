<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Image;
use App\Http\Model\User;//后台管理员
use Carbon\Carbon;
use App\Http\Model\Role;//权限
use App\Http\Model\Goods;//产品列表
use App\Http\Model\Circums;//产品详情
use App\Http\Model\Circums_order;//产品详情--详情

class AdminController extends Controller
{

    //权限
    public function __construct()
    {
        //超级管理员
        $this->middleware('ability:Boss,member_list|adminlist|product_type|product|product_details|details',['only'=>['adminlist','member_list','product_type','product','product_details','details']]);
        //后台管理员管理
        $this->middleware('ability:adminlist,adminlist',['only'=>['adminlist']]);
        //会员管理
        $this->middleware('ability:member_list,member_list',['only'=>['member_list']]);
        //产品分类
        $this->middleware('ability:product_type,product_type',['only'=>['product_type']]);
        //产品列表
        $this->middleware('ability:product,product',['only'=>['product']]);
        //产品详情
        $this->middleware('ability:product_details,product_details',['only'=>['product_details']]);
        //评论管理
        $this->middleware('ability:details,details',['only'=>['details']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //登陆页
    public function login(){
        return view('admin/login');
    }

    //登录验证
    public function store(Request $request)
    {
        //获取输入部分的子集
        $input = $request->except('_token');
        //接受传过来的name
        $name = $request['username'];
        //把接受过来的密码加密
        $request['password'] = md5($request['password']);
        //存储session值
        session(['username'=>$name]);
        //表单验证--exists验证
        $rule = [
            //验证账号是否在表中存在，以及密码正确
            'username' => 'required|exists:users,name',
            'password' => "required|exists:users,password,name,$name"
            ];
        // 存放错误信息
        $message = [
            'username.exists' => '用户名不存在',
            'password.exists' => '密码错误'
            ];
        //如果验证通不过,输出信息
        $this->validate($request,$rule,$message);
        $list = DB::table('users')->where('name',$name)->get();
        //=======================================
        //存储session值,在ability权限验证中获取   =
        //=======================================
        session(['userInfo'=>$list[0]]);
        //获取当时时间
        $time = Carbon::now();
        //修改表里的登录时间--和登录次数
        $count = DB::table('users')->where('name',$name)->select('num')->first();
        $count1 = $count->num;
        $count1 += 1;
        DB::table('users')
            ->where('name',$name)
            ->update(['logintime'=>$time,'num'=>$count1]);
        //返回welcome页面
        return redirect()->action('AdminController@index');

    }

    // 退出登录
    public function loginout(Request $request)
    {
        session(['username'=>null]);
        return view('admin/login');
    }

    //后台首页
    public function index()
    {
        //单条查询数据库管理员类别
        $name = session('username');
        $list = DB::table('users')->where('name',$name)->get();


        if ($name) {
            $time = Carbon::now();
            $list = DB::table('users')->where('name',$name)->get();
                return view('admin/index',['list'=>$list]);
        }else{
            return view('admin/login');
        }
    }

    //后台首页展示页
    public function show()
    {
        //查询后台管理员数量
        $list = DB::table('users')->get();
        //查询商品数量
        $lists = DB::table('goods')->get();
        //订单表
        $list1 = DB::table('goods_order')->paginate(5);
        //评论表
        $list2 = DB::table('commentary')->lists('content');
        //获取当前用户
        $name = session('username');
        $num = DB::table('users')->where('name',$name)->get();
        //获取订单最多的地址
        $list3 = DB::table('member_address')
            ->lists('province');
        for ($i=0; $i < count($list3); $i++) {
            if(empty($list3[$i])){
                unset($list3[$i]);
            }
        }
        $a = array_count_values($list3);//统计订单最多的地方
        $zuida = 0;
        $zuiduo = null;//地址
        foreach($a as $k=>$v){
            if($v>$zuida){
                $zuida=$v;
                $zuiduo=$k;
            }
        }
        //销售额--订单数量
        $money = DB::table('gl_order')->get();
        $gg=0;//订单数量
        $cc=0;//额度
        foreach ($money as $k => $v) {
            $m1 = $v->price;
            $c1 = $v->count;
            $g = $m1*$c1;
            $gg+=$g;
            $cc+=$c1;
        }
        //商品数量
        $count = DB::table('goods')->get();
        //商品总价
        $specs = 0;
        $count1 = DB::table('goods_spec')->get();
        foreach ($count1 as $k => $v) {
            $spec_c = $v->count;
            $spec_s = $v->price;
            $s = $spec_c*$spec_s;
            $specs+=$s;
        }
        //用户评论
        $users = DB::table('commentary')
         ->leftJoin('member', 'commentary.user_id', '=', 'member.id')
         ->select('commentary.*', 'member.img')
         ->orderBy('commentary.created_at','desc')
         ->take(10)
         ->get();
        return view('admin.main',['list'=>$list,'lists'=>$lists,'list1'=>$list1,'list2'=>$list2,'name'=>$name,'num'=>$num,'zuiduo'=>$zuiduo,'gg'=>$gg,'cc'=>$cc,'count'=>$count,'specs'=>$specs,'users'=>$users]);
    }

    // 修改页面
    public function form_advanced(){
        //获取当前登录人员
        $name = session('username');
        //查询
        $list = DB::table('users')->where('name',$name)->get();
        //遍历到前台
        return view('admin/form_advanced',['list'=>$list]);
    }

    //后台头像修改--方法
    public function tou(Request $request){
        //获取当前登录人员
        $name = session('username');
        //实例化表
        $users = new User;
        $input = $request->all();
        //图片接受
        $file = $input['file'];
        //图片限制
        $allowed_extensions = ["png", "jpg", "gif"];
        //判断图片类型
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            die("<script>alert('只允许上传png, jpg 或 gif格式');javascript:history.go(-1);</script>");
        }
        //图片保存路径
        $destinationPath = 'images/';//public 文件夹下面的images文件夹
        //图片后缀
        $extension = $file->getClientOriginalExtension();
        //随机数字为图片名
        $fileName = str_random(10).'.'.$extension;
        //存储图片
        $file->move($destinationPath,$fileName);
        //拼接图片名
        $filePath = $destinationPath.$fileName;
        //数据库表存放的路径
        $users->file = $filePath;
        //放入表中
        $bb = DB::table('users')
            ->where("name",$name)
            ->update(["file"=>$users->file]);
        return redirect()->action('AdminController@form_advanced');
    }

    // 管理员列表
    public function adminlist()
    {
        //获取登录的人员昵称
        $name = session('username');
        //查询管理员表--users
        $list = DB::table('users')->paginate(5);
        //遍历到页面
        return view('admin/adminlist',['list'=>$list]);
    }

    // 管理员修改
    public function adminlist_edit($id)
    {
        //获取登录的人员昵称
        $name = session('username');
        //查询数据--根据id
        $list = DB::table('users')->where('id',$id)->get();

        //实例化角色表
        $per = new Role;
        //查询所有
        $perms = $per->get();
        //dd($pers);
        // dd($perms);
        //查询当前用户所拥有的角色--id(将permission-role表里的数据查询出来)
        $roles = User::find($id)->roles()->select('id')->get()->toArray();
        //定义一个空数组
        $ids = [];
        //遍历--将查询出的数据放入数组中
        foreach($roles as $v){
            $ids[] = $v['id'];
        }
        //遍历到页面
        return view('admin/adminlist_edit',['list'=>$list,'pers'=>$perms,'ids'=>$ids]);
    }

    public function adminlist_update(Request $request)
    {
        //获取全部数据
        $use = new User;
        $input = $request->all();
        $use->id = $input['id'];
        //如果没有修改密码，就还用之前的密码
        if(empty($input['passworsd'])){
            DB::table('users')
            ->where('id',$input['id'])
            ->update(['name' => $input['username'],'email' => $input['email'],'status' => $input['status']]);
        }else{
            $password = md5($input['password']);
            DB::table('users')
                ->where('id',$input['id'])
                ->update(['name' => $input['username'],'password' => $password,'phone' => $input['phone'],'status' => $input['status']]);
        }
        //判断是权限选项不为空--权限和角色表关联添加
        if(!empty($request->input('pers'))){
            //修改permission_role表
             $use->roles()->sync($request->input('pers'));
        }
        return redirect()->action('AdminController@adminlist');

    }

    // 管理员添加
    public function adminlist_add()
    {
        //获取登录的人员昵称
        $name = session('username');
        //查询登录人员的信息
        $list = DB::table('users')->where('name',$name)->get();
        //查询角色表
        $role = DB::table('roles')->get();
        //遍历
        foreach($list as $v){

        }
        return view('admin/adminlist_add',['role'=>$role]);
    }

    public function adminlist_insert(Request $request)
    {
        //实例化数据库
        $user = new User;
        //接受数据
        $user->name = $request->username;//呢称
        $user->email = $request->email;//邮箱
        $user->password = md5($request->password);//密码
        $user->status = $request->status;//身份
        if($user->save() && !empty($request->input('role'))){

            $user->roles()->sync($request->input('role'));
            //$use->attachPermission();
        }
        return redirect()->action('AdminController@adminlist');
    }

    //管理员删除
    public function adminlist_del($id)
    {
        //删除管理员
        $list = DB::table('users')->where('id',$id)->delete();
        //删除role_user表的关联数据
        $list2 = DB::table('role_user')->where('user_id',$id)->delete();
        //判断
        if(!$list && !$list2){
            die("<script>alert('删除失败');javascript:history.go(-1);</script>");
        }
        return redirect()->action('AdminController@adminlist');
    }

    //管理员取消按钮
    public function cancle(){
        return ("<script>javascript:history.go(-2);</script>");
    }

    // 会员列表
    public function member_list()
    {
        $list = DB::table('member')->paginate(5);
        return view('admin/member_list',['list'=>$list]);
    }

    // 会员是否启用
    public function member_start($id)
    {
        $list = DB::table('member')->where('id',$id)->update(['status'=>'1']);
        return redirect()->action('AdminController@member_list');
    }
    // 会员是否禁用
    public function member_stop($id)
    {
        $list = DB::table('member')->where('id',$id)->update(['status'=>'0']);
        return redirect()->action('AdminController@member_list');
    }

    // 产品分类
    public function product_type()
    {
        $list = DB::table('product_type')->orderBy('id','desc')->paginate(10);
        return view('admin/product_type',['list'=>$list]);
    }

    // 产品搜索
    public function product_type_search(Request $request){
        $keywords = $request->keywords;
        $list = DB::table('product_type')->where('name','like',"%{$keywords}%")->orderBy('id','desc')->paginate(10);
        return view('admin/product_type',['list'=>$list,'keywords'=>$keywords]);
    }

    // 产品添加分类
    public function product_type_append()
    {
        return view('admin/product_type_append');
    }

    public function product_type_insert2(Request $request)
    {
        //接受所有数据
        $input = $request->all();
        //执行添加
        $list = DB::table('product_type')->insert(['name'=>$input['name'],'pid'=>'0','path'=>'0,']);
        //判断
        if($list){
            return redirect()->action('AdminController@product_type');
        }else{
             die("<script>alert('添加失败');javascript:history.go(-1);</script>");
        }

    }

    // 产品添加子分类
    public function product_type_add($id)
    {
        //查询分类表
        $list = DB::table('product_type')->where('id',$id)->get();
        //遍历至前台
        return view('admin/product_type_add',['list'=>$list]);
    }

    static function product_type_insert(Request $request)
    {
        //接收数据
        $input = $request->all();
        //路径
        $path = $input['path'].$input['pid'].',';
        //计算字符串出现的次数
        $count = substr_count($input['path'],',');
        //表中nbsp的个数
        $strpad = str_repeat("-",$count*5);

        //图片接收
        $file = $input['photo'];
        //限制图片类型
        $allowed_extensions = ['png','jpg','gif'];
        //判断上传类型是否正确
        if($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(),$allowed_extensions)){
            die("<script>alert('只允许上传png, jpg 或 gif格式');javascript:history.go(-1);</script>");
        }
        //图片保存路径
        $destinationPath = "images/";//public 文件夹下面的images文件夹
        //图片后缀名
        $extension = $file->getClientOriginalExtension();
        //随机数字为图片名
        $fileName = str_random(10).'.'.$extension;
        //存储图片
        $file->move($destinationPath,$fileName);
        //拼接图片名
        $filePath = $destinationPath.$fileName;
        //存入数据库
        $info = DB::table('product_type')->insert(['name'=>$input['name'],'pid'=>$input['pid'],'path'=>$path,'num'=>$count,'nbsp'=>$strpad,'icon'=>$filePath]);
        //判断
        if($info){
            return redirect()->action('AdminController@product_type');
        }else{
            die("<script>alert('添加失败');javascript:history.go(-1);</script>");
        }
    }

    // 产品分类修改
    public function product_type_edit($id)
    {
        //根据id查询
        $list = DB::table('product_type')->where('id',$id)->get();
        //以list中的pid为id查询它的父级类别
        $list2 = DB::table('product_type')->where('id',$list[0]->pid)->get();
        return view('admin/product_type_edit',['list'=>$list,'list2'=>$list2]);
    }
    public function product_type_update(Request $request)
    {
        //获取数据
        $input = $request->all();
        //执行修改
        DB::table('product_type')->where('id',$input['id'])->update(['name'=>$input['name']]);
        return redirect()->action('AdminController@product_type');
    }

    //  产品分类删除
    public function product_type_del($id)
    {
        //查询该产品下是否有子类
        $list = DB::table('product_type')->where('pid',$id)->get();
        //判断
        if($list){
            die("<script>alert('删除失败!该类别下还有子类');javascript:history.go(-1);</script>");
        }else{
            //执行删除--先删除图片--再删除数据
           $img = DB::table('product_type')->where('id',$id)->get();
           //获取图片路径
           $pathd = $img[0]->icon;
           if($pathd == null){
                //删除数据
                DB::table('product_type')->where('id',$id)->delete();
                return redirect()->action('AdminController@product_type');
           }else{
                $pathde = "E:/phpStudy/WWW\RWJ/RUWEIJIAN--TWO/NE-laravel/public/".$pathd;//拼接路径
                //删除
               if(file_exists($pathde)){
                    unlink($pathde);
                    //删除数据
                    DB::table('product_type')->where('id',$id)->delete();
                    return redirect()->action('AdminController@product_type');
                }
           }
        }
    }

    // 产品列表
    public function product()
    {
        //查询
        $list = DB::table('goods')
            ->orderBy('id','desc')//倒序
            ->paginate(10);//分页
        return view('admin/product',['list'=>$list]);
    }

    // 产品是否上架
    public function product_start($id)
    {
        //修改状态
        $list = DB::table('goods')->where('id',$id)->update(['is_putaway'=>'1']);
        return redirect()->action('AdminController@product');
    }

    // 产品是否下架
    public function product_stop($id)
    {
        //修改状态
        $list = DB::table('goods')->where('id',$id)->update(['is_putaway'=>'0']);
        return redirect()->action('AdminController@product');
    }

    // 产品修改
    public function product_edit($id)
    {
        //查询
        $list = DB::table('goods')->where('id',$id)->get();
        return view('admin/product_edit',['list'=>$list]);
    }

    public function product_update(Request $request)
    {
        //接受全部数据
        $input = $request->all();
        $goods = new Goods;
        $goods = $goods::find($input['id']);
        //执行修改--赋值
        $goods -> name = $input['name'];                                // 商品名
        $goods -> goods_desc = $input['goods_desc'];                    // 商品描述
        $goods -> is_best = $input['is_best'];                          // 是否精品
        $goods -> is_new = $input['is_new'];                            // 是否新品
        $goods -> is_hot = $input['is_hot'];                            // 是否热销
        $goods -> is_promote = $input['is_promote'];                    // 是否低价促销
        $goods -> is_pinkage = $input['is_pinkage'];                    // 是否包邮
        if(!empty($input['goods_img1']) || !empty($input['goods_img2']) || !empty($input['goods_img3']) || !empty($input['goods_img4']) || !empty($input['goods_img5'])){
            for($i =1; $i<=5; $i++){
                //图片接收
                $file = $input['goods_img'.$i];
                // 限制文件类型
                $allowed_extensions = ["png", "jpg", "gif"];
                if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
                    die("<script>alert('只允许上传png, jpg 或 gif格式');javascript:history.go(-1);</script>");
                }
                //图片保存路径
                $destinationPath = 'images/goods/'; //public 文件夹下面的images文件夹
                //图片后缀
                $extension = $file->getClientOriginalExtension();
                //随机数为图片名
                $fileName = str_random(10).'.'.$extension;
                //=======================================
                //删除原来的图片
                $arr = $goods['goods_img'.$i];//找到图片路径
                $pathd = 'E:/phpStudy/WWW/RWJ/RUWEIJIAN--TWO/NE-laravel/public/'.$arr;//拼接路径
                if(file_exists($pathd))      //检查图片文件是否存在
                {
                  unlink($pathd);
                }
                //=======================================
                //存储图片
                $file->move($destinationPath,$fileName);
                //拼接图片路径+图片名
                $filePath = $destinationPath.$fileName;
                $arr1[] = $filePath;
            }
            // 获取图片名
            $goods -> goods_img1 = $arr1['0'];
            $goods -> goods_img2 = $arr1['1'];
            $goods -> goods_img3 = $arr1['2'];
            $goods -> goods_img4 = $arr1['3'];
            $goods -> goods_img5 = $arr1['4'];
        }
        // 将数据存入数据库
        $info = $goods -> update();
        // 验证是否成功
        if($info){
            return redirect()->action('AdminController@product');
        }else{
            die("<script>alert('修改失败');javascript:history.go(-1);</script>");
        }

    }

    //商品列表添加
    public function product_add()
    {
        $list = DB::table('product_type')->where('pid','0')->orderBy('id','asc')->get();
        return view('admin/product_add',['list'=>$list]);
    }
    //查询父类下的子类
    public function product_type_select()
    {
        //接受数据
        $grade=$_POST['grade'];
        //查询
        $classes=DB::table('product_type')->where("pid",$grade)->get(); //查询出来产品类型对应的产品类型
        //返回json数据格式
        return json_encode($classes,true);
    }
    // 产品添加
    static function product_insert(Request $request)
    {
        //接受数据
        $input = $request->all();
        //实例化数据库
        $goods = new Goods;

        $goods -> type = $input['classes'];                             // 商品类别
        $goods -> name = $input['name'];                                // 商品名
        $goods -> goods_desc = $input['goods_desc'];                    // 商品描述
        $goods -> is_best = $input['is_best'];                          // 是否精品
        $goods -> is_new = $input['is_new'];                            // 是否新品
        $goods -> is_hot = $input['is_hot'];                            // 是否热销
        $goods -> is_promote = $input['is_promote'];                    // 是否低价促销
        $goods -> is_pinkage = $input['is_pinkage'];                    // 是否包邮
        $goods -> goods_sn = uniqid();                                  // 货号
        $goods -> maker = $input['maker'];                              // 品牌商

        //循环接受五张图片
        for ($i=1; $i <= 5 ; $i++) {
            if(empty($input['goods_image'.$i])){
                die("<script>alert('请上传5张图片作为展示');javascript:history.go(-1);</script>");
            }
            //接收五张图片
            $file = $input['goods_image'.$i];
            //限制图片类型
            $allowed_extensions = ["png", "jpg", "gif"];
            if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
                    die("<script>alert('只允许上传png, jpg 或 gif格式');javascript:history.go(-1);</script>");
            }
            // 图片保存路径
            $destinationPath = 'images/goods/'; //public 文件夹下面的images文件夹
            //图片后缀名
            $extension = $file->getClientOriginalExtension();
            //随机数为图片名
            $fileName = str_random(10).'.'.$extension;
            //存储图片
            $file->move($destinationPath,$fileName);
            //拼接图片路径-图片名
            $filePath = $destinationPath.$fileName;
            //放入空数组中
            $arr[] = $filePath;
         }
         // 获取图片名
        $goods -> goods_img1 = $arr['0'];
        $goods -> goods_img2 = $arr['1'];
        $goods -> goods_img3 = $arr['2'];
        $goods -> goods_img4 = $arr['3'];
        $goods -> goods_img5 = $arr['4'];
        // 将数据存入数据库
        $info = $goods ->save();
        // 验证是否成功
        if($info){
            return redirect()->action('AdminController@product');
        }else{
            die("<script>alert('添加失败');javascript:history.go(-1);</script>");
        }
    }

    // 产品规格添加,修改
    public function product_spec_add($id)
    {
        $list2 = DB::table('goods_spec')->where('pid',$id)->get();
        if($list2){
            $list3 = DB::table('goods_spec')
            ->join('goods', 'goods_spec.pid', '=', 'goods.id')
            ->where('goods_spec.pid','=',$id)
            ->select('goods_spec.*', 'goods.name')
            ->orderBy('id','asc')
            ->get();
            $list = DB::table('goods')->where('id',$id)->get();
            return view('admin/product_spec_add',['list'=>$list,'list3'=>$list3]);
        }else{
            $list = DB::table('goods')->where('id',$id)->orderBy('id','asc')->get();
            return view('admin/product_spec_add',['list'=>$list]);
        }
    }

    //执行规格添加
    public function goods_spec_insert(Request $request)
    {
        // 接收数据
        $input = $request->all();
        //删除图片文件--查询路径
        $path = DB::table('goods_spec')->where('pid',$input['id'])->select('picture')->get();
        //统计数量
        $count = count($path);
        for($i = 0; $i< $count; $i++){
            $pathd = $path[$i]->picture;//获取路径
            $pathdel = 'E:/phpStudy/WWW/RWJ/RUWEIJIAN--TWO/NE-laravel/public/'.$pathd;//拼接路径
            if(file_exists($pathdel)){
                unlink($pathdel);
            }
        }
        // 先删除该pid的数据,再重新添加新数据
        $list1 = DB::table('goods_spec')->where('pid',$input['id'])->delete();
        // 循环添加数据
        for ($i=0; $i < count($input['spec']); $i++) {
            if(!empty($input['spec'][$i])){
                if(!empty($input['picture'][$i])){
                    // 图片接收
                    $file = $input['picture'][$i];
                    // 限制文件类型
                    $allowed_extensions = ["png", "jpg", "gif"];
                    if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
                        die("<script>alert('只允许上传png, jpg 或 gif格式');javascript:history.go(-1);</script>");
                    }
                    // 图片保存路径
                    $destinationPath = 'images/goods/'; //public 文件夹下面的images文件夹
                    // 图片后缀
                    $extension = $file->getClientOriginalExtension();
                    // 随机数字为图片名
                    $fileName = str_random(10).".".$extension;
                    // 储存图片
                    $file->move($destinationPath, $fileName);
                    // // 拼接图片路径+图片名
                    $filePath = $destinationPath.$fileName;
                }else{
                    $filePath = '';
                }
                $list2 = DB::table('goods_spec')->insert(['pid'=>$input['id'],'spec'=>$input['spec'][$i],'price'=>$input['price'][$i],'count'=>$input['count'][$i],'picture'=>$filePath]);
                // 判断是否添加成功
                if(!$list2){
                    die("<script>alert('添加失败!数据丢失,请重新添加.');javascript:history.go(-1);</script>");
                }
            }
        }
        return redirect()->action('AdminController@product');

    }

    //产品删除
    public function product_del($id)
    {
        //查找订单表是否有该产品的订单--有的话不能删除
        $nnn = DB::table("gl_order")->where('goods_id',$id)->get();
        //为空的话可以删除
        if($nnn == null){
            $goods = new Goods;//实例化产品列表
            $goods = $goods::find($id);
            //删除产品列表图片
            for ($i=1; $i <= 5 ; $i++) {
                $arr = $goods['goods_img'.$i];
                $pathd = 'E:/phpStudy/WWW/RWJ/RUWEIJIAN--TWO/NE-laravel/public/'.$arr;//拼接路径
                if(file_exists($pathd))      //检查图片文件是否存在
                {
                  unlink($pathd);//删除文件
                }
            }
            //删除产品规格的图片
            $del = DB::table('goods_spec')->where('pid',$id)->select('picture')->get();
            $count = count($del);
            for ($i=0; $i < $count ; $i++) {
                $im = $del[$i]->picture;    //获取文件路径
                // dd($imd);
                $lj = 'E:/phpStudy/WWW/RWJ/RUWEIJIAN--TWO/NE-laravel/public/'.$im;//拼接路径
                if(file_exists($lj))      //检查图片文件是否存在
                {
                  unlink($lj);//删除文件
                }
            }
            $list = DB::table('goods_spec')->where('pid',$id)->delete();//删除规格
            //执行删除
            $goods->delete();//删除产品
            $del = DB::table('circums')->where('cir_id',$id)->delete();//删除产品详情
            $del = DB::table('circums_order')->where('cir_ord_id',$id)->delete();//删除产品详情--详情
            if($goods){
                return redirect()->action('AdminController@product');
            }else{
                die("<script>alert('删除失败');javascript:history.go(-1);</script>");
            }
        }else{
            die("<script>alert('商品有未完成的订单,不能删除');javascript:history.go(-1);</script>");
        }
    }

    // 产品搜索
    public function product_search(Request $request){
        $keywords = $request->keywords;
        $list = DB::table('goods')->where('name', 'like', "%{$keywords}%")->orWhere('goods_desc', 'like', "%{$keywords}%")->orderBy('id','desc')->paginate(10);
        return view('admin/product',['list'=>$list,'keywords'=>$keywords]);
    }

    // 后台-产品详情
    public function product_details(){
        //查询
        $details = DB::table('circums')
            ->join('goods','circums.cir_id','=','goods.id')//联查
            ->select('circums.*','goods.name')//查询circums表中的所有数据和goods表中的name字段
            ->orderBy('circums.cir_id','desc')
            ->paginate(4);//分页
        return view('admin/product_details',['details'=>$details]);
    }

    //添加页面
    public function product_details_add(){
        //查询产品分类pid为0的分类
        $ins = DB::table('product_type')->where('pid',0)->orderBy('id','asc')->get();
        return view('admin/product_details_add',['ins'=>$ins]);
    }

    // 后台-产品详情添加
    public function product_details_insert(Request $request){
        // 接收数据
        $input = $request->all();
        $circums = new Circums;

        $circums -> cir_id = $input['cir_id'];//产品id
        $circums -> cir_ty = $input['classes'];//产品类别
        $circums -> cir_img = $input['cir_img'];//内容

        // 将数据存入数据库
        $info = $circums ->save();
        // 验证是否成功
        if($info){
            return redirect()->action('AdminController@product_details');
        }else{
            die("<script>alert('添加失败');javascript:history.go(-1);</script>");
        }
    }

    public function product_details_type_select()
    {
        $grade=$_POST['grade'];
        $classes=DB::table('product_type')->where("pid","=",$grade)->get(); //查询出来产品类型对应的产品类型
        //返回json数据
        return json_encode($classes,true);
    }

    //修改页面
    public function product_details_edit($cir_id){
        //查询
        $con = DB::table('circums')
            ->join('goods','circums.cir_id','=','goods.id')//联查
            ->select('circums.*','goods.name')//查询circums表中的所有数据和goods表中的name字段
            ->where('circums.cir_id',$cir_id)//条件
            ->get();
        //查询产品分类
        $ins = DB::table('product_type')->where('pid',0)->orderBy('id','asc')->get();
        return view('admin/product_details_edit',['con'=>$con,'ins'=>$ins,'cir_id'=>$cir_id]);
    }

    // 后台-产品详情修改
    public function product_details_update(Request $request){
        // 接收数据
        $input = $request->all();
        $circums = new Circums;

        $circums = $circums::find($input['id']);    //id
        $circums -> cir_img = $input['cir_img'];    // 详情图片

        // 将数据存入数据库
        $info = $circums ->save();
        // 验证是否成功
        if($info){
            return redirect()->action('AdminController@product_details');
        }else{
            die("<script>alert('添加失败');javascript:history.go(-1);</script>");
        }

    }

    // 后台-产品详情删除
    public function product_details_datel($id){
        $del = DB::table('circums')->where('id','=',$id)->delete();
        if ($del) {
            return redirect()->action('AdminController@product_details');
        }else{
            die("<script>alert('删除失败');javascript:history.go(-1);</script>");
        }
    }

    // 后台-产品信息拓展
    public function product_details_info($cir_id){
        //查询circums_order表
        $order = DB::table('circums_order')
            ->join('goods','circums_order.cir_ord_id','=','goods.id')
            ->select('circums_order.*','goods.id','goods.name')
            ->where('circums_order.cir_ord_id',$cir_id)
            ->get();
        $cir_name = DB::table('circums')
            ->join('goods','circums.cir_id','=','goods.id')
            ->select('circums.cir_id','goods.name','goods.id')
            ->where('circums.cir_id',$cir_id)
            ->get();
        //dd($cir_name);
        return view('admin/product_details_info',['cir_name'=>$cir_name,'order'=>$order,'cir_id'=>$cir_id]);
    }

    // 后台-产品信息添加
    public function product_details_info_insert(Request $request)
    {
        //接收数据
        $input = $request->all();
        //查询一下产品名
        $pne = DB::table('goods')->where('id',$input['cir_ord_id'])->get();
        $pnee = $pne[0]->name;
        // 先删除该pid的数据,再重新添加新数据
        $list1 = DB::table('circums_order')->where('cir_ord_id',$input['cir_ord_id'])->delete();

        if ($list1 || empty($list1)) {
            // 将数据存入数据库
            $list2 = DB::table('circums_order')->insert(['cir_ord_id'=>$input['cir_ord_id'],'cir_ty'=>$pnee,
                'size' => $input['size'], 'number' => $input['number'],'depth' => $input['depth'], 'weight' => $input['weight'], 'texture' => $input['texture'],'plus' => $input['plus'],'fill' => $input['fill'],'environment' => $input['environment'],'color' => $input['color'],'style' => $input['style'],'functionn' => $input['functionn'],'is_assemble' => $input['is_assemble'],'assemble' => $input['assemble'],'place' => $input['place'],'criterion' => $input['criterion'],'security' => $input['security'], 'prompt' => $input['prompt'],'attention' => $input['attention']]);
            // 判断是否添加成功
            if(!$list2){
                die("<script>alert('添加失败!数据丢失,请重新添加.');javascript:history.go(-1);</script>");
            }
            return redirect()->action('AdminController@product_details_info',[$input['cir_ord_id']]);
        }
    }

    // 后台-产品详情搜索
    public function product_details_search(Request $request){
        $keywords2 = $request->keywords2;
        //dd($keywords2);
        $details = DB::table('circums')
            ->join('goods','circums.cir_id','=','goods.id')//联查
            ->select('circums.*','goods.name')//查询circums表中的所有数据和goods表中的name字段
            ->where('circums.cir_id','like',"{$keywords2}%")//模糊查询
            ->orderBy('circums.cir_id','desc')
            ->paginate(4);//分页
        return view('admin/product_details',['details'=>$details]);
    }

    // 评论
    public function details(){
        //查询
        $comment = DB::table('commentary')->orderBy('id','desc')->paginate(4);
        // dd($comment);
        return view('admin/details',['comment'=>$comment]);
    }

    // 后台-评论删除
    public function details_del($id){
        $del = DB::table('commentary')->where('id',$id)->delete();
        if ($del) {
            die("<script>alert('删除失败');javascript:history.go(-1);</script>");
        }else{
            return redirect()->action('AdminController@details');
        }
    }

    // 后台-评论禁用启用
    public function details_stop($id){
        $list = DB::table('commentary')->where('id',$id)->update(['is_use'=>'0']);
        return redirect()->action('AdminController@details');
    }
    public function details_start($id){
        $list = DB::table('commentary')->where('id',$id)->update(['is_use'=>'1']);
        return redirect()->action('AdminController@details');
    }

    // 后台-评论查找
    public function details_search(Request $request){
        $keywords2 = $request->keywords2;
        $comment = DB::table('commentary')->where('pro_id', 'like', "%{$keywords2}%")
            ->orderBy('id','desc')->paginate(4);
        return view('admin/details',['comment'=>$comment]);
    }
    //后台用户评论及回复
    public function comment($id){
        $list = DB::table('commentary')->where('id',$id)->get();
        return view('admin/comment',['list'=>$list]);
    }

    //将回复的内容添加进数据库
    public function comment_add(Request $request){
        //接受数据
        $files =  $request->all();
        // dd($files);
        $id =  $files['id'];
        $file =  $files['file'];
        //执行修改
        $bb = DB::table('commentary')
                ->where("id",$id)
                ->update(["supper"=>$file]);
        return redirect()->action('AdminController@details');
    }























}
