<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function index(){
//        if(!auth()->user()->can('roles.show')){
//            abort(403);
//        }
        $data['active']='roles';
        $data['route']='roles';
        $data['page']='الصلاحيات';
        $data['roles']=Role::select(['id','name'])->get();
        return view('roles.index',$data);
    }

    public function create(){
//        if(!auth()->user()->can('roles.create')){
//            abort(403);
//        }
        $data['active']='roles';
        $data['route']='roles/create';
        $data['page']='اضافة صلاحية';
        $data['permissions']=Permission::whereNull('deleted_at')->groupBy('group')->get();
        return view('roles.create',$data);
    }

    public function store(Request $request){
        if(!auth()->user()->can('roles.create')){
            abort(403);
        }
        $this->validate($request,[
            'name'=>'required|max:45'
        ]);
        $request->request->add(['guard_name'=>'web']);
        $role = Role::create($request->only(['name','guard_name']));
        $role->syncPermissions($request->permissions);
        return redirect()->route('roles.index')->with('success', 'تم الإضافة بنجاح');
    }

    public function edit($id){

//        if(!auth()->user()->can('roles.edit')){
//            abort(403);
//        }
        $data['route']='roles/'.$id.'/edit';
        $data['active']='roles';
        $data['page']='تعديل صلاحية';
        $data['role']=Role::findOrFail($id);
        $data['permissions']=Permission::whereNull('deleted_at')->groupBy('group')->get();
        return view('roles.edit',$data);
    }


    public function update(Request $request,$id){
//        if(!auth()->user()->can('roles.edit')){
//            abort(403);
//        }
        $this->validate($request,[
            'name'=>'required|max:45'
        ]);
        $role=Role::findOrFail($id);
        $role->update($request->only(['name']));
        $role->syncPermissions($request->permissions);
        return redirect()->route('roles.index')->with('success', 'تم التعديل بنجاح');
    }

    public function destroy($id){
        if(!auth()->user()->can('roles.edit')){
            abort(403);
        }
        $role=Role::findOrFail($id);
        $role->syncPermissions([]);
        $role->delete();
        return back()->with('success', 'تم الحذف بنجاح');
    }

}
