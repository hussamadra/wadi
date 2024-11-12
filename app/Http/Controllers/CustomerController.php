<?php

namespace App\Http\Controllers;

use App\Models\CustomerCart;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\Customer;
use App\Models\User;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function index(){
        $data['route']='customers';
        $data['page']='الزبائن';
        $data['customers']=Customer::all();
        return view('customers.index',$data);
    }
    public function create(){
        $data['route']='customers/create';
        $data['page']='اضافة زبون';
        return view('customers.create',$data);
    }
    public function store(Request $request){
        $this->validate($request,[
           'name'=>'required',
           'company_name'=>'required',
           'email'=>'required|email|unique:customers,email',
           'mobile'=>'required|unique:customers,mobile',
           'type'=>'required',
           'amount'=>'required',
            'image'=>'required|image|mimes:jpg,jpeg,png,bmp|max:20000',
        ]);
//        $user=User::create([
//           'name'=>$request->name,
//            'email'=>$request->email,
//            'password'=>Hash::make('123456789'),
//            'mobile'=>$request->mobile,
//            'role_id'=>3,
//        ]);

        $customer=Customer::create([
            'name'=>$request->name,
            'company_name'=>$request->company_name,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'type'=>$request->type,
            'image'=>$request->image->store('customers')
        ]);
        CustomerCart::create([
            'customer_id'=>$customer->id,
            'amount'=>$request->amount,
            'type'=>1
        ]);
        return redirect()->route('customers.index')->with(['success'=>'تم الاضافة بنجاح']);
    }

    public function edit(Customer $customer){
        $data['route']='customers/'.$customer->id.'/';
        $data['page']='تعديل زبون';
        $data['customer']=$customer;
        return view('customers.edit',$data);
    }

    public function show(Customer $customer){
        $data['route']='customers/'.$customer->id.'/';
        $data['page']='تفاصيل زبون';
        $data['customer']=$customer;
        $data['in']=CustomerCart::where('customer_id',$customer->id)->where('type',1)->sum('amount');
        $data['out']=CustomerCart::where('customer_id',$customer->id)->where('type',2)->sum('amount');
        $data['current']=$data['in']-$data['out'];
        $data['carts']=CustomerCart::where('customer_id',$customer->id)->get();
        return view('customers.show',$data);
    }

    public function update(Request $request,Customer $customer){
        $this->validate($request,[
            'name'=>'required',
            'company_name'=>'required',
            'email'=>'required|email|unique:customers,email,'.$customer->id,
            'mobile'=>'required|unique:customers,mobile,'.$customer->id,
            'type'=>'required',
            'image'=>'nullable|image|mimes:jpg,jpeg,png,bmp|max:20000',
        ]);
//        $customer->user->update([
//            'name'=>$request->name,
//            'email'=>$request->email,
//            'mobile'=>$request->mobile
//        ]);
        $customer->update([
            'name'=>$request->name,
            'company_name'=>$request->company_name,
            'mobile'=>$request->mobile,
            'email'=>$request->email,
            'type'=>$request->type,
        ]);

        if ($request->hasFile('image')){
            Storage::delete($customer->image);
            $customer->update([
                'image'=>$request->image->store('customers')
            ]);
        }
        return redirect()->route('customers.index')->with(['success'=>'تم التعديل بنجاح']);
    }
    public function destroy(Customer $customer){

//        $services=Service::select(['id','customer_id','image'])->where('customer_id',$customer->id)->pluck('id');

//        ServiceRequest::whereIn('service_id',$services)->delete();
//        foreach ($services as  $service){
//            Storage::delete($service->image);
//        }
        Storage::delete($customer->image);
//        Service::where('customer_id',$customer->id)->delete();
        $customer->delete();
        return redirect()->route('customers.index')->with(['success'=>'تم الحذف بنجاح']);



    }

    public function chargeForm($id){
        $data['route']='customers-charge/'.$id.'/';
        $data['page']='شحن رصيد';
        $data['customer']=$customer=Customer::findOrFail($id);
        return view('customers.charge',$data);
    }

    public function charge(Request $request,$id){

        $customer=Customer::findOrFail($id);
        $this->validate($request,[
           'amount'=>'required'
        ]);
        CustomerCart::create([
            'customer_id'=>$customer->id,
            'amount'=>$request->amount,
            'type'=>1
        ]);
        return redirect()->route('customers.index')->with(['success'=>'تمت العملية بنجاح']);
    }

    public function chooseService($id){
        $data['route']='services';
        $data['page']='الخدمات';
        \session(['customer_id'=>$id]);
        $data['services']=Service::all();
        return view('services.index',$data);
    }
}
