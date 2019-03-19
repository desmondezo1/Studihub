<?php

namespace Studihub\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Studihub\Http\Controllers\AdminBaseController;
use Studihub\Models\Permission;
use Studihub\Models\Role;

class AdminRoleController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $roles = Role::with('permissions')->get();
        return view('admin.pages.admins.roles.index',compact('roles'));
    }


    public function show(Role $role){
        return view('admin.pages.admins.roles.show',compact('role'));
    }

    public function edit(Role $role){
        $permissions = Permission::pluck('display_name','id');
        return view('admin.pages.admins.roles.edit',compact('role','permissions'));
    }

    public function create(){
        $permissions = Permission::pluck('display_name','id');
        return view('admin.pages.admins.roles.create',compact('role','permissions'));
    }

    public function store(Request $request){
        $data = request()->validate([
            'name' => 'required|string|max:255|unique:roles',
            'display_name' => 'required|string|max:255',
            'description' => 'required',
        ]);
        $role = Role::create($data);
        //dd($role->id != null);
        if ($role->id != null){
            $role->permissions()->attach(request()->input('permissions'));
            flash()->success('success', $role->display_name .' Role Created');
            return redirect()->route('admin.roles.index');
        }
        flash()->error('error', ' Could not create role');
        return back();
    }

    public function update(Role $role,Request $request){
        $data = request()->validate([
            'name' => 'nullable|string|max:255',
            'display_name' => 'nullable|string|max:255',
            'description' => 'nullable',
        ]);
        $updated = $role->update($data);
        //dd(request()->input('permissions'));
        if ($updated){
            $role->permissions()->sync([]);
            $role->permissions()->attach(request()->input('permissions'));
            flash()->success('success', $role->display_name .' Role Updated');
            return redirect()->route('admin.roles.index');
        }
        flash()->error('error', ' Could not Update role');
        return back();
    }

    public function destroy(Role $role){
        $role->permissions()->sync([]);
        $delete = $role->delete();
        if($delete){
            return response()->json(['success' => "Role Deleted successfully."]);
        }
        return response()->json(['error' => "Role Deleted successfully."]);
    }

}
