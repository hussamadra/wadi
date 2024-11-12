<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Governorate;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    public function index()
    {
        $data['route'] = 'tickets';
        $data['page'] = 'الفروع';
        $data['branches'] = Branch::with('gov')->get();
        return view('branches.index', $data);
    }

    public function create()
    {
        $data['route'] = 'tickets/create';
        $data['page'] = 'تبليغ عن مشكلة ';
        $data['services'] = Service::all();
        return view('tickets.create', $data);
    }

    public function store(Request $request)
    {
        $valid = $this->validate($request, [
            'relationship_owner' => 'required',
            'service_id' => 'required',
            'description' => 'required',
        ]);
        Ticket::create($valid);

        return back()->with(['success' => 'تم الاضافة بنجاح']);
    }

//    public function edit(Branch $branch){
//        $data['route']='branches/'.$branch->id.'/';
//        $data['page']='تعديل فرع';
//        $data['branch']=$branch;
//        $data['govs']=Governorate::all();
//        return view('branches.edit',$data);
//    }
//
//    public function update(Request $request,Branch $branch){
//        $this->validate($request,[
//            'name'=>'required',
//            'gov_id'=>'required',
//            'image'=>'nullable|image|mimes:jpg,jpeg,png,bmp|max:20000',
//        ]);
//        $branch->update([
//            'ar_name'=>$request->name,
//            'gov_id'=>$request->gov_id,
//        ]);
//
//        if ($request->hasFile('image')){
//            Storage::delete($branch->image);
//            $branch->update([
//                'image'=>$request->image->store('branches')
//            ]);
//        }
//        return redirect()->route('branches.index')->with(['success'=>'تم الاضافة بنجاح']);
//    }
//    public function destroy(Branch $branch){
//        $users=User::select(['id','branch_id','image'])->where('branch_id',$branch->id)->pluck('id');
//        ServiceRequest::whereIn('user_id',$users)->delete();
//        foreach ($users as  $user){
//            Storage::delete($user->image);
//        }
//        Storage::delete($branch->image);
//        User::where('branch_id',$branch->id)->delete();
//        $branch->delete();
//        return redirect()->route('branches.index')->with(['success'=>'تم الحذف بنجاح']);
//    }

}
