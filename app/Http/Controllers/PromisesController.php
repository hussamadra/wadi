<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promise;
use App\Models\Student;

class PromisesController extends Controller
{
    public function index(){
        $data['route']='promises';
        $data['page']='تعهد';
        $data['promises']=Promise::all();
        return view('promises.index',$data);
    }

    public function create(Request $request){
        $data['route']='promises/create';
        $data['page']='تعهد جديد';
        // $data['students']=Student::all();
        // dd($request->id);
        $student=Student::query()->find($request->id);

        return view('promises.create',$data,['student'=>$student]);
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'date'=>'required',
        ]);
        $promise=Promise::create([
            'student_id'=>$request->id,
            'name'=>$request->name,
            'date'=>$request->date,
        ]);
        return redirect()->route('students.show',['student'=>$request->id])->with(['success'=>'تم الاضافة بنجاح']);
    }

    public function show(Promise $promise){
        $data['route'] = 'promises/edit';
        $data['page'] = '';
        $data['promise'] = $promise;
        return view('promises.show', $data);
    }

    public function edit(Promise $promise){
        $data['route']='promises/'.$promise->id.'/';
        $data['page']='تعديل مستخدم';
        $data['promise']=$promise;
        return view('promises.edit',$data);
    }

    public function update(Request $request,Promise $promise){


        $this->validate($request,[
            'date'=>'required',
        ]);
        $promise->update([
            'date'=>$request->date,
        ]);

        return redirect()->route('students.show',['student'=>$promise->student_id])->with(['success'=>'تم التعديل بنجاح']);
    }

    public function destroy(Promise $promise){

        $student_id=$promise->student_id;
        $promise->delete();
        return redirect()->route('students.show',['student'=>$student_id])->with(['success'=>'تم الحذف بنجاح']);
    }

    public function getStudentPromeces($id){
        $student=Student::query()->find($id);
        $promesses=$student->promeces()->get();

        $data['route']='promises';
        $data['page']='تعهد';
         $data['promises']=$promesses;
        return view('promises.index',$data);




    }
}
