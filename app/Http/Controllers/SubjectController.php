<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Special;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index(){
        $data['route']='subjects';
        $data['page']='المواد الدراسية';
        $data['subjects']=Subject::all();
        return view('subjects.index',$data);
    }

    public function create(){
        $data['route']='subjects/create';
        $data['page']='اضافة مادة جديدة';
        $data['specials']=Special::all();
        return view('subjects.create',$data);
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
        ]);
        $subject=Subject::create([
            'name'=>$request->name,
            'special_id'=>$request->special_id,
            'year'=>$request->year,
            'semester'=>$request->semester,
            'mark'=>$request->mark,
        ]);
        return redirect()->route('subjects.index')->with(['success'=>'تم الاضافة بنجاح']);
    }
    
     public function edit(Subject $subject){
        $data['route']='subjects/'.$subject->id.'/';
        $data['page']='تعديل مادة';
        $data['specials']=Special::all();
        $data['subject']=$subject;
        return view('subjects.edit',$data);
    }

    public function update(Request $request,Subject $subject){
        $this->validate($request,[
            'name'=>'required',
        ]);
        $subject->update([
            'name'=>$request->name,
            'special_id'=>$request->special_id,
            'year'=>$request->year,
            'semester'=>$request->semester,
            'mark'=>$request->mark,
        ]);
        
        return redirect()->route('subjects.index')->with(['success'=>'تم التعديل بنجاح']);
    }

    public function destroy(Subject $subject){
        $subject->delete();
        return redirect()->route('subjects.index')->with(['success'=>'تم الحذف بنجاح']);
    }

}
