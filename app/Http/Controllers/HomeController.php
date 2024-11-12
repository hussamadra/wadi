<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\Supplier;
use App\Models\User;
use App\Models\UserSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['route'] = '/';
        $data['page'] = 'الرئيسية';


//        (Auth::user()->hasRole("مشرف مراكز")) || (Auth::user()->hasRole("مدير عام")) || (Auth::user()->hasRole("مدير تقني"))) {
            
            
            $data['sessions'] = UserSession::orderBy('id', 'desc')->take(5)->get();

        if ((Auth::user()->hasRole("مشرف مركز")) or (Auth::user()->hasRole("مشرف مركز مشترك"))) {

//            $data['pendings'] = ServiceRequest::where('status', 0)->orderBy('id', 'desc')->whereHas('user', function ($user) {
//                $user->whereHas('branch', function ($branch) {
//                    $branch->where('id', Auth::user()->branch_id);
//                });
//            })->take(5)->get();

            $data['dones'] = ServiceRequest::where('status', 1)->orderBy('id', 'desc')->whereHas('user', function ($user) {
                $user->whereHas('branch', function ($branch) {
                    $branch->where('id', Auth::user()->branch_id);
                });
            })->
            take(5)->get();

            $data['branches'] = Branch::where('id', Auth::user()->branch_id)->first();
        } elseif(Auth::user()->hasRole("موظف تسديد خلفي") || Auth::user()->hasRole("موظف تسديد امامي") ) {
            $data['dones'] = ServiceRequest::where('status', 1)->orderBy('id', 'desc')->whereHas('user', function ($user) {
                $user->where('id',Auth::id());
            })->
            take(5)->get();
        }elseif (Auth::user()->hasRole('dybak')){
            $data['pendings'] = ServiceRequest::where('status', 0)->orderBy('id', 'desc')->whereHas('user', function ($user) {
                $user->where('id',Auth::id());
            })->
            take(5)->get();
            $data['dones'] = ServiceRequest::where('status', 1)->orderBy('id', 'desc')->whereHas('user', function ($user) {
                $user->where('id',Auth::id());
            })->
            take(5)->get();
            $data['service_requests'] = ServiceRequest::where('user_id',Auth::id())->where('status',1)->where( DB::raw('MONTH(created_at)'), '=', date('n') )->pluck('id');
        }

        return view('home', $data);

    }
}
