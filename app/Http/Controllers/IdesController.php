<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ide;
use App\Models\Student;
use App\Models\Branche;
use App\Models\Special;
use App\Models\Register;

class IdesController extends Controller
{
    public function index(){
        $data['route']='ides';
        $data['page']='بطاقة طالب';
        $data['ides']=Ide::all();
        return view('ides.index',$data);
    }

    public function create(Request $request){
        $data['route']='ides/create';
        $data['page']='اضاف بطاقة طالب جديدة';
        // $data['students']=Student::all();
        $data['student']=Student::query()->find($request->id);
        $data['branches']=Branche::all();
        $data['specials']=Special::all();
        return view('ides.create',$data);
    }

    public function store(Request $request){
        $this->validate($request,[
            'branch'=>'required',
        ]);

        // dd($request->student_id);
        $ide=Ide::create([
            'branch'=>$request->branch,
            'date'=>$request->date,
            'deplom'=>$request->deplom,
            'student_id'=>$request->student_id,
            'year'=>$request->year,
            'special'=>$request->special,
        ]);
        return redirect()->route('students.show',['student'=>$request->student_id])->with(['success'=>'تم الاضافة بنجاح']);

    }

    public function show(Ide $ide, Request $request){
        $data['route'] = 'ides/'.$ide->id.'/';
        $data['page'] = '';
        $data['ide'] = $ide;
        $data['symbol'] = Register::where('student_id', $ide->student_id)->first();
        return view('ides.show', $data);
    }

    public function edit(Ide $ide){
        $data['route']='ides/'.$ide->id.'/';
        $data['page']='تعديل بطاقة الب';
        $data['ide']=$ide;
        $data['students']=Student::all();
        $data['branches']=Branche::all();
        $data['specials']=Special::all();
        return view('ides.edit',$data);
    }

    public function update(Request $request,Ide $ide){

            $oldId=Ide::query()->find($ide->id);

            $studnt=$oldId->student;

        $this->validate($request,[
            'branch'=>'required',
        ]);
        $ide->update([
            'branch'=>$request->branch,
            'date'=>$request->date,
            'deplom'=>$request->deplom,
            'year'=>$request->year,
            'special'=>$request->special,
        ]);

        return redirect()->route('students.show',['student'=>$studnt->id])->with(['success'=>'تم التعديل نجاح']);
    }

    public function destroy(Ide $ide){
        $ide->delete();
        $student=Student::query()->find($ide->student_id);
        return redirect()->route('students.show',['student'=>$student->id])->with(['success'=>'ت الحذ بنجاح']);
    }
}
