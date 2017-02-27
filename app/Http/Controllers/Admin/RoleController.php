<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreRolePost;
use App\Http\Requests\UpdateRolePost;
use App\models\Permission;
use App\models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(2);
        return view('admin.role.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreRolePost|\Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolePost $request)
    {
        $role = new Role();
        $role->name = $request->get('name');
        $role->display_name = $request->get('display_name');
        $role->description = $request->get('description');
        if($role->save()){
            return redirect('/admin/role');
        }else{
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        if($role){
            $permissions = Permission::all();
            $permissions = $permissions->toArray();
            $permissions = getTree($permissions);
            $has = DB::table('permission_role')->where('role_id', 1)->pluck('permission_id')->toArray();
            return view('admin.role.edit', ['role' => $role, 'permissions' => $permissions, 'has' => $has]);
        }else{
            return back()->with('status', '未找到相关记录');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateRolePost|\Illuminate\Http\Request $request
     * @param  int                                                       $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolePost $request, $id)
    {
        $role = Role::find($id);
        if($role){
            $role->name = $request->get('name');
            $role->display_name = $request->get('display_name');
            $role->description = $request->get('description');
            if($role->save()){
                $role->perms()->sync($request->input('permissions'));
                return back()->with('status', '更新成功');
            }else{
                return back()->with('status', '更新失败');
            }
        }else{
            return back()->with('status', '未找到相关记录');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
//        $role = false;
        if($role){
            $role->delete();
            return back()->with('status', '删除成功');
        }else{
            return back()->with('status', '删除失败');
        }
    }
}
