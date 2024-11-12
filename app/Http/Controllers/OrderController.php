<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Governorate;
use App\Models\ServiceRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function index(){
        $data['route']='governorates';
        $data['page']='المحافظات';
        $data['governorates']=Governorate::all();
        return view('governorates.index',$data);
    }
    public function create(){
        $data['route']='governorates/create';
        $data['page']='اضافة محافظة';
        return view('governorates.create',$data);
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
        ]);
        Governorate::create([
            'name'=>$request->name,
        ]);
        return redirect()->route('governorates.index')->with(['success'=>'تم الاضافة بنجاح']);
    }

    public function edit(Governorate $governorate){
        $data['route']='governorates/'.$governorate->id.'/';
        $data['page']='تعديل محافظة';
        $data['governorate']=$governorate;
        return view('governorates.edit',$data);
    }

    public function update(Request $request,Governorate $governorate){
        $this->validate($request,[
            'name'=>'required',
        ]);
        $governorate->update([
            'name'=>$request->name,
        ]);

        return redirect()->route('governorates.index')->with(['success'=>'تم الاضافة بنجاح']);
    }
    public function destroy(Governorate $governorate){
        $branches=Branch::select(['id','gov_id','image'])->where('gov_id',$governorate->id);
        $branchesIds=$branches->pluck('id');
        $branches=$branches->get();
        foreach ($branches as $branch){
            Storage::delete($branch->image);
        }
        Branch::whereIn('id',$branchesIds)->delete();
        $users=User::select(['id','branch_id','image'])->whereIn('branch_id',$branchesIds);
        $usersIds=$users->pluck('id');
        $users=$users->get();
        ServiceRequest::whereIn('user_id',$usersIds)->delete();
        foreach ($users as  $user){
            Storage::delete($user->image);
        }
        User::whereIn('id',$usersIds)->delete();
        $governorate->delete();
        return redirect()->route('governorates.index')->with(['success'=>'تم الحذف بنجاح']);



    }
}
