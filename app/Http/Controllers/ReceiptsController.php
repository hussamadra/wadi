<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receipt;
use App\Models\Student;
use App\Models\Branche;

class ReceiptsController extends Controller
{
    public function index(){
        $data['route']='receipts';
        $data['page']='ايصال دفع';
        $data['receipts']=Receipt::all();
        return view('receipts.index',$data);
    }

    // public function createForStudent()
    // {
    //     return view('receipts.creteForStudent');
    // }

    public function create(Request $id=null){
        $student=Student::query()->find($id)->first();
        $data['route']='receipts/create';
        $data['page']='يصال دفع جديد';
        // $data['students']=Student::all();
        $data['students']=Student::query()->find($id);
        $data['branches']=Branche::all();
        return view('receipts.create',$data,['student'=>$student]);
    }



    public function store(Request $request){
        $this->validate($request,[
            'amount'=>'required',
        ]);
        $receipt=Receipt::create([
            'student_id'=>$request->id,
            'branch_name' =>$request->branch_name,
            'amount'=>$request->amount,
            'date'=>$request->date,
        ]);
        return redirect()->route('students.show',['student'=>$request->id])->with(['success'=>'م الاافة بنجاح']);
    }



    public function show(Receipt $receipt){
        $data['route'] = 'receipts/edit';
        $data['page'] = '';
        $data['receipt'] = Receipt::where('id', $receipt->id)->first();
        return view('receipts.show', $data);
    }

    public function edit(Receipt $receipt){
        $data['route']='receipts/'.$receipt->id.'/';
        $data['page']='تعيل ايصل دفع';
        $data['receipt']=$receipt;
        $data['branches']=Branche::all();
        return view('receipts.edit',$data);
    }

    public function update(Request $request,Receipt $receipt){
        $this->validate($request,[
            'amount'=>'required',
        ]);
        $receipt->update([
            'branch_name' => Auth()->user()->branch,
            'amount'=>$request->amount,
            'date'=>$request->date,
        ]);

        return redirect()->route('students.show',['student'=>$receipt->student_id])->with(['success'=>'تم التعديل بنجاح']);
    }

    public function destroy(Receipt $receipt){
        $student_id=$receipt->student_id;
        $receipt->delete();
        return redirect()->route('students.show',['student'=>$student_id])->with(['success'=>'تم الحذف بنجاح']);
    }
}
