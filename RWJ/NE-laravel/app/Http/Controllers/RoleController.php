<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Role;
use App\Http\Model\Permission;
use Carbon\Carbon;

class RoleController extends Controller
{

    //权限
    public function __construct()
    {
        //超级管理员
        $this->middleware('ability:Boss,role',['only'=>['role']]);
        //后台角色管理
        $this->middleware('ability:role,role',['only'=>['role']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //角色列表
    public function role()
    {
        //查询数据表并遍历到前台
        $list = DB::table('roles')->paginate(5);
        return view('admin/role',['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 管理员添加
    public function role_add()
    {
        //获取登录的人员昵称
        // $name = session('username');
        //查询登录人员的信息
        // $list = DB::table('adminuser')->where('name',$name)->get();
        //遍历
        // foreach($list as $v){

        // }
        //实例化权限数据库
        $per = new Permission;
        //查询所有
        $pers = $per->get();
        //将结果遍历到前台
        return view('admin/role_add',['pers'=>$pers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function role_insert(Request $request)
    {
        //实例化角色数据库
        $use = new Role;
        //获取传过来的值
        $use->name = $request->name;//角色编号
        $use->display_name = $request->namea;//角色
        $use->description = $request->content;//详情
        //判断是否添加成功并且权限选项不为空--权限和角色表关联添加
        if($use->save() && !empty($request->input('pers'))){

             $use->perms()->sync($request->input('pers'));
            //$use->attachPermission();
        }

        return redirect()->action('RoleController@role');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function role_edit($id)
    {
        //查询
        $list = DB::table('roles')->where('id',$id)->get();
        $per = new Permission;
        //查询所有
        $perms = $per->get();
        //dd($pers);
        // dd($perms);
        //查询当前修改的角色所拥有的权限--id(将permission-role表里的数据查询出来)
        $roles = Role::find($id)->perms()->select('id')->get()->toArray();
        //定义一个空数组
        $ids = [];
        //遍历--将查询出的数据放入数组中
        foreach($roles as $v){
            $ids[] = $v['id'];
        }
        //遍历到页面
        return view('admin/role_edit',['list'=>$list,'pers'=>$perms,'ids'=>$ids]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function role_update(Request $request)
    {
        //实例化角色表
        $use = new Role;
        //获取全部提交过来的数据
        $input = $request->all();
        //给$use赋一个id(修改permisssion_role表时用到)
        $use->id=$input['id'];
        //dd($input);
        // 修改
        DB::table('roles')
                ->where('id',$input['id'])
                ->update(['name' => $input['name'],'display_name' => $input['namea'],'description' => $input['content']]);
        //判断是权限选项不为空--权限和角色表关联添加
        if(!empty($request->input('pers'))){
            //修改permission_role表
             $use->perms()->sync($request->input('pers'));
        }

        return redirect()->action('RoleController@role');

    }

    //角色删除
    public function role_del($id){
        //删除role表的数据
        $list = DB::table('roles')->where('id',$id)->delete();
        //删除permission_role表里的关联数据
        $list2 = DB::table('permission_role')->where('role_id',$id)->delete();
        //判断
        if(!$list && !$list2){
            die("<script>alert('删除失败');javascript:history.go(-1);</script>");
        }
        return redirect()->action('RoleController@role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
