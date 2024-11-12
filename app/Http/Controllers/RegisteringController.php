<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\Student;
use App\Models\Special;
use App\Models\Branche;
use GuzzleHttp\Psr7\Uri;
use Monolog\Registry;

class RegisteringController extends Controller
{
    public function index(){
        $data['route']='registering';
        $data['page']='طلبات التسجيل';
        $data['registering']=Register::all();
        return view('registerOrders.index',$data);
    }

    public function createFromStudent($id)
    {
        $data['route']='registering/create';
        $data['page']='طلب تسجيل جديد';
        $data['students']=Student::query()->find($id);
        $data['specials']=Special::all();
        $data['branches']=Branche::all();
      return view('registerOrders.create',$data);
    }

    public function create(){
        $data['route']='registering/create';
        $data['page']='طلب تسجيل جديد';
        $data['students']=Student::all();
        $data['specials']=Special::all();
        $data['branches']=Branche::all();
        return view('registerOrders.create',$data);
    }
    public function store(Request $request){
        $this->validate($request,[
            'certificate'=>'required',
        ]);

        $branch = auth()->user()->branche->name;
        $branch_symbol = auth()->user()->branche->name_a;

        $kid = $request->kid;
        // $kid_symbol = Branche::find($kid->id);
        $kid_symbol = Branche::query()->where('id',$kid)->first();
        $kid_symbol=Branche::query()->where('id',$kid)->first();


        $register=Register::create([
            'student_id'=>$request->student_id,
            'type'=>$request->type,
            'certificate'=>$request->certificate,
            'certificate_type'=>$request->certificate_type,
            'certificate_date'=>$request->certificate_date,
            'sum'=>$request->sum,
            'en'=>$request->en,
            'fr'=>$request->fr,
            'langs'=>$request->langs,
            'skill'=>$request->skill,
            'know'=>$request->know,
            'register'=>$request->register,
            'register_date'=>$request->register_date,
            'military'=>$request->military,
            'military_no'=>$request->military_no,
            'amount'=>$request->amount,
            'branch' => $branch,
            'branch_symbol' => $branch_symbol,
            // 'kid'=>$request->kid->name,
            'kid_symbol' =>  $kid_symbol->name_a,
            'special'=>$request->special,
            'gender'=>$request->gender,
        ]);
        return redirect()->route('students.show',['student'=>$request->student_id])->with(['success'=>'تم الاضافة بنجاح']);
    }

    public function show(Register $register, $id){
        $data['route']='registering/'.$id.'/';
        $data['page']='fff';
        $data['register']=Register::where('id', $id)->first();

        if($register->type === 'دبلوم في العلوم السياحية'){
            return view('registerOrders.show',$data);
        } else {
            return view('registerOrders.show2',$data);
        }
    }

    public function edit($register){
        $data['route']='registering/'.$register.'/';
        $data['page']='تعديل طلب تسجيل';
        $data['register']=Register::query()->find($register);
        return view('registerOrders.edit',$data);
    }

    public function update(Request $request,$register_id){

        $oldRegister=Register::query()->find($register_id);
        $student=$oldRegister->student;


        $this->validate($request,[
            'type'=>'required',

        ]);
        $oldRegister->update([
            'type'=>$request->type,
            'certificate'=>$request->certificate,
            'certificate_type'=>$request->certificate_type,
            'certificate_date'=>$request->certificate_date,
            'sum'=>$request->sum,
            'en'=>$request->en,
            'fr'=>$request->fr,
            'langs'=>$request->langs,
            'skill'=>$request->skill,
            'know'=>$request->know,
            'register'=>$request->register,
            'register_date'=>$request->register_date,
            'military'=>$request->military,
            'military_no'=>$request->military_no,
            'amount'=>$request->amount,
        ]);

        $oldRegister->save();
        return redirect()->route('students.show',['student'=>$student->id])->with(['success'=>'تم التعديل بنجاح']);
    }

    public function destroy($id){
        // $register->delete();
        $register=Register::query()->find($id);
        $student_id=$register->student_id;
        $register->delete();
        return redirect()->route('students.show',['student'=>$student_id])->with(['success'=>'تم الحذف بنجاح']);
    }

    public function get_kid($id)
    {
        $data = Branche::find($id);
        return $data;
    }



}
