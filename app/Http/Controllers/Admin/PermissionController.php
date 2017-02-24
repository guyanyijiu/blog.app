<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StorePermissionPost;
use App\Http\Requests\UpdatePermission;
use App\models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @internal param \Illuminate\Http\Request $request
     *
     */
    public function index()
    {
        $permissions = Permission::where('pid', 0)->select('id', 'name', 'display_name', 'description')->get();
        return view('admin.permission.index', ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::where('pid', 0)->select('id', 'display_name')->get();
        return view('admin.permission.create', ['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StorePermissionPost|\Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionPost $request)
    {
        $permission = new Permission();
        $permission->name = $request->input('name');
        $permission->pid = $request->input('pid');
        $permission->display_name = $request->input('display_name');
        $permission->description = $request->input('description');
        if($permission->save()){
            return redirect('/admin/permission');
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
        $permissions = Permission::where('pid', $id)->select('id', 'pid', 'name', 'display_name', 'description')->get();
        return view('admin.permission.show', ['permissions' => $permissions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
        $permissions = Permission::where('pid', 0)->where('id', '!=', $id)->get();
        return view('admin.permission.edit', ['permission' => $permission, 'permissions' => $permissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdatePermission|\Illuminate\Http\Request $request
     * @param  int                                                         $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermission $request, $id)
    {
        $permission = Permission::find($id);
        if($permission){
            $permission->name = $request->input('name');
            $permission->pid = $request->input('pid');
            $permission->display_name = $request->input('display_name');
            $permission->description = $request->input('description');
            if($permission->save()){
                return back()->with('status', '更新成功');
            }
        }
        return back()->with('status', '更新失败');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);
        if($permission){
            $permission->delete();
            return back()->with('status', '删除成功');
        }else{
            return back()->with('status', '删除失败');
        }
    }
}
