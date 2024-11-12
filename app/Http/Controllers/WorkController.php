<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Student;
use App\Models\Branche;

class WorkController extends Controller
{
    public function index(){
        $data['route']='workdocs';
        $data['page']='وثيقة دوام';
        $data['workdocs']=Work::all();
        return view('workdocs.index',$data);
    }

    public function create(Request $request){
        $data['route']='workdocs/create';
        $data['page']='وثيق دوام جديدة';
        // $data['students']=Student::all();
        $data['student']=Student::query()->find($request->id);
        $data['branches']=Branche::all();
        return view('workdocs.create',$data);
    }
    public function store(Request $request){
        $this->validate($request,[
            'student_id'=>'required',
        ]);
        $work=Work::create([
            'student_id'=>$request->student_id,
            'nation'=>$request->nation,
            'year'=>$request->year,
            'academic_year'=>$request->academic_year,
            'date'=>$request->date,
            'branch_name' => $request->branch_name,
            'milit_name' => $request->milit_name,
            'milit_number' => $request->milit_number,
        ]);
        return redirect()->route('students.show',['student'=>$request->student_id])->with(['success'=>'تم الاضافة نجاح']);
    }

    public function show(Work $workdoc){
        $data['route']='workdocs/'.$workdoc->id.'/';
        $data['page']='fff';
        $data['workdoc']=$workdoc;

        return view('workdocs.show',$data);
    }

    public function edit(Work $workdoc){
        $data['route']='workdocs/'.$workdoc->id.'/';
        $data['page']='تعديل وثيقة وام ';
        $data['workdoc']=$workdoc;
        $data['branches']=Branche::all();
        return view('workdocs.edit',$data);
    }

    public function update(Request $request,Work $workdoc){
        $this->validate($request,[
            'nation'=>'required',
        ]);
        $workdoc->update([
            'nation'=>$request->nation,
            'year'=>$request->year,
            'academic_year'=>$request->academic_year,
            'date'=>$request->date,
            'branch_name' => $request->branch_name,
            'milit_name' => $request->milit_name,
            'milit_number' => $request->milit_number,
        ]);

        return redirect()->route('students.show',['student'=>$workdoc->student_id])->with(['success'=>'تم التعديل بنجاح']);
    }

    public function destroy(Work $workdoc){
        $student_id=$workdoc->student_id;
        $workdoc->delete();
        return redirect()->route('students.show',['student'=>$student_id])->with(['success'=>'تم احف بنجاح']);
    }
}
