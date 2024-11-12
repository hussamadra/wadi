<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Branche;
use App\Models\ServiceRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index(){
        $data['route']='users';
        $data['page']='المستخدمين';
        $data['users']=User::all();
        return view('users.index',$data);
    }
    public function create(){
        $data['route']='users/create';
        $data['page']='اضافة مستخدم';
        $data['roles']=Role::select(['id','name'])->get();
        $data['branches']=Branche::all();
        return view('users.create',$data);
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'mobile'=>'required',
        ]);
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'password'=>Hash::make($request->password),
            'role_id'=>2,
            'branche_id'=>$request->branche_id,
        ]);
        $user->assignRole([$request->role]);
        return redirect()->route('users.index')->with(['success'=>'تم الاضافة بنجاح']);
    }

    public function edit(User $user){
        $data['route']='users/'.$user->id.'/';
        $data['page']='تعديل مستخدم';
        $data['user']=$user;
        $data['roles']=Role::select(['id','name'])->get();
        return view('users.edit',$data);
    }

    public function update(Request $request,User $user){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$user->id,
            'mobile'=>'required',
        ]);
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
        ]);
        if($request->password){
            $user->update([
            'password'=>Hash::make($request->password),
                ]);
        }
        
        $user->syncRoles([$request->role]);
        return redirect()->route('users.index')->with(['success'=>'تم التعديل بنجاح']);
    }
    public function destroy(User $user){
        $user->delete();
        return redirect()->route('users.index')->with(['success'=>'تم الحذف بنجاح']);



    }
}
