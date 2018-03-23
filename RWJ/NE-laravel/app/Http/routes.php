<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//默认初始页
// Route::get('/', function () {
//     return view('welcome');
// });

//前台首页
Route::any('/','IndexController@index');
//前台注册--账号
Route::any('wyyx/register','IndexController@register');
//验证账号状态(ajax)
Route::any('register/index','HomeController@index');
//验证码图片验证码(ajax)
Route::any('register/tpyzm','HomeController@tpyzm');
//验证手机号状态(ajax)
Route::any('register/number','HomeController@number');
//短信验证码(ajax)
Route::any('register/sms','HomeController@sms');
//校验验证码(ajax)
Route::any('register/yzm','HomeController@yzm');
//注册到数据库
Route::any('register/register','HomeController@register');


// 前台登录页面
Route::any('wyyx/login','HomeController@login');
//前台登陆验证
Route::any('wyyx/login/vn','HomeController@vn');
//登陆成功到前台首页
Route::any('wyyx/index','HomeController@vnindex');


//找回密码页面
Route::any('wyyx/czmm',function(){
    return view('wyyx/password');
});
//找回密码验证账号和手机号码是否一致(ajax)
Route::any('wyyx/zhsjyz','HomeController@zhsjyz');
//找回密码重设密码页面
Route::any('wyyx/password','HomeController@password');
//设置成功跳转
Route::any('wyyx/rpassword','HomeController@newpassword');


//列表页
Route::any('wyyx/Pillow/{id}','IndexController@Pillow');
// 列表页-分类查询(ajax)
Route::any('wyyx/Pillow2','IndexController@Pillow2');


// 前台 - 全局搜索
Route::any('wyyx/search','ShopController@search');
//全局搜索(search页面)->点击搜索(ajax)
Route::any('wyyx/research','IndexController@research');


// 产品详情页
Route::any('wyyx/details/{id}','DetailsController@details');
// 产品评价-查询-排序
Route::any('wyyx/comment','DetailsController@comment');


//立即购买--并把信息输出到页面
Route::any('wyyx/buy_now','MemberController@buy_now');
//支付--验证
Route::any('wyyx/buy_yz','HomeController@buy_yz');
//支付
Route::any('wyyx/zhifu','MemberController@zhifu');
// 产品详情-加入购物车
Route::any('details/goshop','DetailsController@goshop');
//查看商品的库存
Route::any('product/select','DetailsController@prosel');


//统计商品数量
Route::any('shop/shopNum','DetailsController@shopNum');
//购物车--商品为空的话返回值shop页面，不为空的话返回至shopping页面
Route::any('wyyx/shop','ShopController@shop');
Route::any('wyyx/shopping','ShopController@shopping');
//购物车--下单
Route::any('wyyx/shoptobuy','MemberController@shoptobuy');
// 购物车-下单-删除
Route::any('shop/del','ShopController@del');
//查看用户是否收藏产品
Route::any('shop/select','ShopController@select');
// 购物车-下单-收藏
Route::any('shop/collect','ShopController@collect');
// 购物车-下单-取消收藏
Route::any('shop/delcollect','ShopController@delcollect');


//个人中心头像更换
Route::any('wyyx/toux','TouController@tx');

//个人中心--消息
Route::any('/news','MylistController@mylist_news');

//个人中心--个人信息
Route::any('/in','MylistController@mylist_in');
//个人中心更改信息
Route::any('/in-update/{id}','MylistController@inupdate');

//个人中心--订单管理
Route::any('/or','MylistController@mylist_or');
//取消订单方法
Route::any('cancel/{id}','MylistController@mylist_or_cancel');
//订单-确认收货---验证支付密码
Route::any('mylist_yzpay','MylistController@mylist_yzpay');
//订单-确认收货
Route::any('confirmreceipt','MylistController@confirmreceipt');
//订单-商品评价
Route::any('commodity','MylistController@commodity1');
//订单-追加评论
Route::any('commodity-cm','MylistController@commodity_cm');
//订单详情
Route::any('content','DetailsController@content');


//个人中心--收货地址管理
Route::any('/as','MylistController@addas');
//添加地址
Route::any('/nd','MylistController@addnd');
//删除收货地址
Route::any('/asdel/{id}','MylistController@adddel');
//修改收货地址
Route::any('/asedit','MylistController@addedit');
Route::any('/asupdate','MylistController@asupdate');
//设为默认收货地址
Route::any('/setadd/{id}','MylistController@setadd');


//个人中心--收藏夹
Route::any('/fs','MylistController@mylist_fs');
//收藏夹--单个删除(ajax)
Route::any('/fs/del','DetailsController@mylist_fs_del');
//收藏夹--全部删除(ajax)
Route::any('/fs/all_del','DetailsController@mylist_fs_all_del');


//个人中心--我的足迹
Route::any('/ft','MylistController@mylist_ft');
//收藏夹--单个删除(ajax)
Route::any('/ft/del','DetailsController@mylist_ft_del');
//收藏夹--全部删除(ajax)
Route::any('/ft/all_del','DetailsController@mylist_ft_all_del');


//账号安全
Route::any('/ay','MylistController@ayshow');
//账号安全修改登录密码--验证身份信息页面
Route::any('/modify','MylistController@aymodify');
//重新输入密码页面
Route::any('/modify1','MylistController@aymodify1');
//密码修改成功页面
Route::any('/modify2','MylistController@aymodify2');

//更换手机号码
//1  身份确认   (手机短信验证)
//2  更换手机号码 (手机短信验证)
//3  更换成功
Route::any('/replace','MylistController@replace');
//修改绑定手机-输入新手机号码页面
Route::any('/replace1','MylistController@replace1');
//绑定成功
Route::any('/replace2','MylistController@replace2');

//账号安全修改支付密码--验证身份信息页面
Route::any('/modifypay','MylistController@modifypay');
//验证原支付密码(ajax)
Route::any('yzpay','MylistController@yzpay');
//重新输入支付密码页面
Route::any('/modifypay1','MylistController@modifypay1');
//支付密码修改成功页面
Route::any('/modifypay2','MylistController@modifypay2');

//账号安全找回支付密码--验证身份信息页面
Route::any('/payupdate','MylistController@payupdate');
//重新设置支付密码页面
Route::any('/payupdate1','MylistController@payupdate1');
//支付密码找回成功成功页面
Route::any('/payupdate2','MylistController@payupdate2');

















//后台登陆页
Route::get('admin/login','AdminController@login');
//后台登录验证
Route::any('admin/store','AdminController@store');
//退出登录
Route::any('admin/loginout','AdminController@loginout');


// 后台-主页
Route::any('admin/index','AdminController@index');
// 后台-主页-展示页
Route::any('admin/show','AdminController@show');


//后台头像--上传
Route::any('admin/tou','AdminController@tou');
//头像修改
Route::any('admin/form_advanced','AdminController@form_advanced');


// 后台-管理员列表
Route::any('admin/list','AdminController@adminlist');
// 后台-管理员添加
Route::any('admin/adminlist_add','AdminController@adminlist_add');
Route::any('admin/adminlist_insert','AdminController@adminlist_insert');
// 后台-管理员列表-修改
Route::any('admin/adminlist_edit/{id}','AdminController@adminlist_edit');
Route::any('admin/adminlist_update','AdminController@adminlist_update');
// 后台-管理员删除
Route::any('admin/adminlist_del/{id}','AdminController@adminlist_del');


//权限管理
//权限列表
Route::any('permission/list','PermissionController@permission');
//权限列表--添加
Route::any('permission/list_add','PermissionController@permission_add');
Route::any('permission/list_insert','PermissionController@permission_insert');
//权限列表--修改
Route::any('permission/list_edit/{id}','PermissionController@permission_edit');
Route::any('permission/list_update','PermissionController@permission_update');
//权限列表--删除
Route::any('permission/list_del/{id}','PermissionController@permission_del');


//角色管理
//角色列表
Route::any('role/list','RoleController@role');
//角色列表--添加
Route::any('role/list_add','RoleController@role_add');
Route::any('role/list_insert','RoleController@role_insert');
//角色列表--修改
Route::any('role/list_edit/{id}','RoleController@role_edit');
Route::any('role/list_update','RoleController@role_update');
//角色列表--删除
Route::any('role/list_del/{id}','RoleController@role_del');


// 取消按钮
Route::any('admin/cancle','AdminController@cancle');


// 后台-会员
Route::any('admin/member_list','AdminController@member_list');
// 后台-会员列表-启用
Route::any('admin/member_start/{id}','AdminController@member_start');
// 后台-会员列表-禁用
Route::any('admin/member_stop/{id}','AdminController@member_stop');


// 后台-产品分类
Route::any('admin/product_type','AdminController@product_type');
// 后台-产品类别搜索
Route::any('admin/product_type_search','AdminController@product_type_search');
//后台产品添加分类
Route::any('admin/product_type_append','AdminController@product_type_append');
Route::any('admin/product_type_insert2','AdminController@product_type_insert2');
//后台产品添加子类
Route::any('admin/product_type_add/{id}','AdminController@product_type_add');
Route::any('admin/product_type_insert','AdminController@product_type_insert');
// 后台-产品修改分类
Route::any('admin/product_type_edit/{id}','AdminController@product_type_edit');
Route::any('admin/product_type_update','AdminController@product_type_update');
// 后台-产品删除分类
Route::any('admin/product_type_del/{id}','AdminController@product_type_del');


// 后台-产品列表
Route::any('admin/product','AdminController@product');
// 产品列表-上架
Route::any('admin/product_start/{id}','AdminController@product_start');
// 产品列表-下架
Route::any('admin/product_stop/{id}','AdminController@product_stop');
// 后台-产品添加
Route::any('admin/product_add','AdminController@product_add');
//查找pid下的子类
Route::post('admin/product_type_select','AdminController@product_type_select');
Route::any('admin/product_insert','AdminController@product_insert');
// 后台-产品修改
Route::any('admin/product_edit/{id}','AdminController@product_edit');
Route::any('admin/product_update','AdminController@product_update');
// 后台-产品规格添加
Route::any('admin/product_spec_add/{id}','AdminController@product_spec_add');
Route::any('admin/goods_spec_insert','AdminController@goods_spec_insert');
// 后台-产品删除
Route::any('admin/product_del/{id}','AdminController@product_del');
// 后台-产品搜索
Route::any('admin/product_search','AdminController@product_search');


// 后台-产品详情
Route::any('admin/product_details','AdminController@product_details');
// 后台-产品详情添加
Route::any('admin/product_details_add','AdminController@product_details_add');
Route::any('admin/product_details_insert','AdminController@product_details_insert');
// 后台-产品类型联动
Route::any('admin/product_details_type_select','AdminController@product_details_type_select');
// 后台-产品详情修改
Route::any('admin/product_details_edit/{cir_id}','AdminController@product_details_edit');
Route::any('admin/product_details_update','AdminController@product_details_update');
// 后台-产品详情删除
Route::any('admin/product_details_datel/{id}','AdminController@product_details_datel');
// 后台-产品信息查看
Route::any('admin/product_details_info/{cir_id}','AdminController@product_details_info');
Route::any('admin/product_details_info_insert','AdminController@product_details_info_insert');
// 后台-产品详情搜索
Route::any('admin/product_details_search','AdminController@product_details_search');


// 后台-评论
Route::any('admin/details','AdminController@details');
// 后台-评论删除
Route::any('admin/details_del/{id}','AdminController@details_del');
// 后台-评论禁用启用
Route::any('admin/details_start/{id}','AdminController@details_start');
Route::any('admin/details_stop/{id}','AdminController@details_stop');
// 后台-评论查询
Route::any('admin/details_search','AdminController@details_search');
//后台用户评论--回复
Route::any('admin/comment/{id}','AdminController@comment');
Route::any('admin/comment_add','AdminController@comment_add');


// 后台轮播
Route::any('banner/index','BannerController@Banindex');
// 后台-图片禁用启用
Route::any('banner/start/{id}','BannerController@start');
Route::any('banner/stop/{id}','BannerController@stop');
// 后台-添加轮播图片
Route::any('banner/add','BannerController@add');
Route::any('banner/insert','BannerController@insert');
// 后台-修改轮播图片
Route::any('banner/edit/{id}','BannerController@edit');
Route::any('banner/update','BannerController@update');
// 后台-删除图片
Route::any('banner/del/{id}','BannerController@del');
// 后台-轮播搜索
Route::any('banner/search','BannerController@search');


// 后台-订单管理
Route::any('order/index','OrderController@orderindex');
// 发货
Route::any('order/order_fh/{id}','OrderController@order_fh');
//订单详情--查看购买的商品
Route::any('order/info/{id}','OrderController@orderinfo');
//订单查询
Route::any('order/search','OrderController@ordersearch');