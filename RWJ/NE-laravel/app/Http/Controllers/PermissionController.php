<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Permission;
use Carbon\Carbon;

class PermissionController extends Controller
{

    //权限
    public function __construct()
    {
        //超级管理员
        $this->middleware('ability:Boss,permission',['only'=>['permission']]);
        //后台管理员管理
        $this->middleware('ability:permission,permission',['only'=>['permission']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //职位列表
    public function permission()
    {
        //查询数据表并遍历到前台
        $list = DB::table('permissions')->paginate(5);
        return view('admin/permission',['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 管理员添加
    public function permission_add()
    {
        //获取登录的人员昵称
        // $name = session('username');
        //查询登录人员的信息
        // $list = DB::table('adminuser')->where('name',$name)->get();
        //遍历
        // foreach($list as $v){

        // }
        return view('admin/permission_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function permission_insert(Request $request)
    {
        $use = new Permission;
        $use->name = $request->name;
        $use->display_name = $request->namea;
        $use->description = $request->content;
        $use->save();
        return redirect()->action('PermissionController@permission');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function permission_edit($id)
    {
        //获取登录的人员昵称
        // $name = session('username');
        //查询数据--根据id
        $list = DB::table('permissions')->where('id',$id)->get();
        //遍历到页面
        return view('admin/permission_edit',['list'=>$list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function permission_update(Request $request)
    {
        //获取全部数据
        $input = $request->all();
        // 修改
        DB::table('permissions')
            ->where('id',$input['id'])
            ->update(['name' => $input['name'],'display_name' => $input['namea'],'description' => $input['content']]);
        return redirect()->action('PermissionController@permission');

    }

    //删除权限
    public function permission_del($id){
        //根据id查询一下permission表里的id--执行删除
        $list = DB::table('permissions')->where('id',$id)->delete();
        if(!$list){
            die("<script>alert('删除失败');javascript:history.go(-1);</script>");
        }
        //返回至页面
        return redirect()->action('PermissionController@permission');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
