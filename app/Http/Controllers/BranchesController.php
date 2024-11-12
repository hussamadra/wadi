<?php

namespace App\Http\Controllers;

use App\Models\CustomerCart;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\Branche;
use App\Models\User;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BranchesController extends Controller
{
    public function index(){
        $data['route']='branches';
        $data['page']='الفروع';
        $data['branches']=Branche::all();
        return view('branches.index',$data);
    }

    public function create(){
        $data['route']='branches/create';
        $data['page']='اضافة فرع جديد';
        return view('branches.create',$data);
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'amount'=>'required',
        ]);
        $branche=Branche::create([
            'name'=>$request->name,
            'amount'=>$request->amount,
        ]);
        return redirect()->route('branches.index')->with(['success'=>'تم الاضافة بنجاح']);
    }

    public function edit(Branche $branch){
        $data['route']='branches/'.$branch->id.'/';
        $data['page']='تعديل مستخدم';
        $data['branche']=$branch;
        return view('branches.edit',$data);
    }

    public function update(Request $request,Branche $branch){
        $this->validate($request,[
            'name'=>'required',
            'amount'=>'required',
            
        ]);
        $branch->update([
            'name'=>$request->name,
            'amount'=>$request->amount,
        ]);
        
        return redirect()->route('branches.index')->with(['success'=>'تم التعديل بنجاح']);
    }
    public function destroy(Branche $branch){
        $branch->delete();
        return redirect()->route('branches.index')->with(['success'=>'تم الحذف بنجاح']);



    }
    
}
