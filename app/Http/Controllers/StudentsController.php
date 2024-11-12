<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;

class StudentsController extends Controller
{
    public function index()
    {
        $data['route'] = 'students';
        $data['page'] = 'الطلاب';
        $data['students'] = Student::all();
        return view('students.index', $data);
    }

    public function show($id)
    {
        $data['route'] = 'student';
        $data['page'] = 'الطالب';

        $student = Student::query()->find($id);

        $data['student'] = $student;


        $orders = $student->register()->get();


        $promesses = $student->promeces()->get();

        $repspects = $student->respects()->get();

        $ide=$student->ide;

        $work=$student->work;

        return view('students.show', $data, [
            'image' => $student->image,
            'orders' => $orders,
            'promesses' => $promesses,
            'receipts'=>$repspects ,
            'ide'=>$ide,
            'work'=>$work
        ]);
    }

    public function create()
    {
        $data['route'] = 'students/create';
        $data['page'] = 'اضافة طالب جديد';
        return view('students.create', $data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
        $student = Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'first_name_en' => $request->first_name_en,
            'last_name_en' => $request->last_name_en,
            'father_name' => $request->father_name,
            'father_name_en' => $request->father_name_en,
            'mother_name' => $request->mother_name,
            'mother_name_en' => $request->mother_name_en,
            'birthday' => $request->birthday,
            'nation_no' => $request->nation_no,
            'nation_no2' => $request->nation_no2,
            'nation_no3' => $request->nation_no3,
            'mobile1' => $request->mobile1,
            'phone1' => $request->phone1,
            'mobile2' => $request->mobile2,
            'phone2' => $request->phone2,
            'f_work' => $request->f_work,
            'm_work' => $request->m_work,
            'f_phone' => $request->f_phone,
            'm_phone' => $request->m_phone,
            'address' => $request->address,
            'email' => $request->email,
        ]);
        return redirect()->route('students.index')->with(['success' => 'تم الاضافة بنجاح']);
    }

    public function edit(Student $student)
    {
        $data['route'] = 'students/' . $student->id . '/';
        $data['page'] = 'تعديل مستخدم';
        $data['student'] = $student;


        return view('students.edit', $data);
    }

    public function update(Request $request, Student $student)
    {
        $this->validate($request, [
            'first_name' => 'required',

        ]);
        $student->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'first_name_en' => $request->first_name_en,
            'last_name_en' => $request->last_name_en,
            'father_name' => $request->father_name,
            'father_name_en' => $request->father_name_en,
            'mother_name' => $request->mother_name,
            'mother_name_en' => $request->mother_name_en,
            'birthday' => $request->birthday,
            'nation_no' => $request->nation_no,
            'nation_no2' => $request->nation_no2,
            'nation_no3' => $request->nation_no3,
            'mobile1' => $request->mobile1,
            'phone1' => $request->phone1,
            'mobile2' => $request->mobile2,
            'phone2' => $request->phone2,
            'f_work' => $request->f_work,
            'm_work' => $request->m_work,
            'f_phone' => $request->f_phone,
            'm_phone' => $request->m_phone,
            'address' => $request->address,
            'email' => $request->email,
        ]);

        return redirect()->route('students.index')->with(['success' => 'تم التعديل بنجاح']);
    }
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with(['success' => 'تم الحذف بنجاح']);
    }

    public function getStudentRegistringOrders($studentId) {}
}
