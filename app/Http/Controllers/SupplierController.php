<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\Supplier;
use App\Models\User;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SupplierController extends Controller
{
    public function index(){
        $data['route']='suppliers';
        $data['page']='المزودين';
        $data['suppliers']=Supplier::all();
        return view('suppliers.index',$data);
    }
    public function create(){
        $data['route']='suppliers/create';
        $data['page']='اضافة مزود';
        return view('suppliers.create',$data);
    }
    public function store(Request $request){
        $this->validate($request,[
           'name'=>'required',
           'email'=>'required|email|unique:users,email',
           'mobile'=>'required|unique:users,mobile',
           'amount'=>'required',
            'image'=>'required|image|mimes:jpg,jpeg,png,bmp|max:20000',
        ]);
        $user=User::create([
           'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make('123456789'),
            'mobile'=>$request->mobile,
            'role_id'=>3,
        ]);
        UserCart::create([
           'user_id'=>$user->id,
            'amount'=>$request->amount,
            'type'=>1
        ]);
        Supplier::create([
            'ar_name'=>$request->name,
            'amount'=>$request->amount,
            'user_id'=>$user->id,
            'image'=>$request->image->store('suppliers')
        ]);
        return redirect()->route('suppliers.index')->with(['success'=>'تم الاضافة بنجاح']);
    }

    public function edit(Supplier $supplier){
        $data['route']='suppliers/'.$supplier->id.'/';
        $data['page']='تعديل مزود';
        $data['supplier']=$supplier;
        return view('suppliers.edit',$data);
    }

    public function update(Request $request,Supplier $supplier){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$supplier->user_id,
            'mobile'=>'required|unique:users,mobile,'.$supplier->user_id,
            'amount'=>'required',
            'image'=>'nullable|image|mimes:jpg,jpeg,png,bmp|max:20000',
        ]);
        $supplier->user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->mobile
        ]);
        $supplier->update([
            'ar_name'=>$request->name,
            'amount'=>$request->amount,
        ]);

        if ($request->hasFile('image')){
            Storage::delete($supplier->image);
            $supplier->update([
                'image'=>$request->image->store('suppliers')
            ]);
        }
        return redirect()->route('suppliers.index')->with(['success'=>'تم التعديل بنجاح']);
    }
    public function destroy(Supplier $supplier){

        $services=Service::select(['id','supplier_id','image'])->where('supplier_id',$supplier->id)->pluck('id');

        ServiceRequest::whereIn('service_id',$services)->delete();
        foreach ($services as  $service){
            Storage::delete($service->image);
        }
        Storage::delete($supplier->image);
        Service::where('supplier_id',$supplier->id)->delete();
        $supplier->delete();
        return redirect()->route('suppliers.index')->with(['success'=>'تم الحذف بنجاح']);



    }
}
