<?php

namespace App\Http\Controllers;

use App\Models\CustomerCart;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\Special;
use App\Models\Branche;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SpecialsController extends Controller
{
    public function index(){
        $data['route']='specials';
        $data['page']='الاختصاصات';
        $data['specials']=Special::all();
        return view('specials.index',$data);
    }

    public function create(){
        $data['route']='specials/create';
        $data['page']='اضافة اختصاص جديد';
        $data['branches']=Branche::all();
        return view('specials.create',$data);
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
        ]);
        $special=Special::create([
            'name'=>$request->name,
            'branche_id'=>$request->branche_id,
            'year'=>$request->year,
            'amount'=>$request->amount,
        ]);
        return redirect()->route('specials.index')->with(['success'=>'تم الاضافة بنجاح']);
    }
    
    public function edit(Special $special){
        $data['route']='specials/'.$special->id.'/';
        $data['page']='تعديل اختصاص';
        $data['branches']=Branche::all();
        $data['special']=$special;
        return view('specials.edit',$data);
    }

    public function update(Request $request,Special $special){
        $this->validate($request,[
            'name'=>'required',
        ]);
        $special->update([
            'name'=>$request->name,
            'branche_id'=>$request->branche_id,
            'year'=>$request->year,
            'amount'=>$request->amount,
        ]);
        
        return redirect()->route('specials.index')->with(['success'=>'تم التعديل بنجاح']);
    }

    public function destroy(Special $special){
        $special->delete();
        return redirect()->route('specials.index')->with(['success'=>'تم الحذف بنجاح']);
    }
    
}
