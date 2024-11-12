<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Customer;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\Supplier;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ReportAllServicesController extends Controller
{
    public function all_services_report()
    {


        $data['route'] = 'services/report/all_services_report';
        $data['page'] = 'تقرير شامل';
        $data['suppliers'] = Supplier::all();
        $data['services'] = Service::all();
        $data['branches'] = Branch::all();
        $data['users'] = User::all();
        $data['customers'] = Customer::all();

        if (\request()->from || \request()->to){

            if ((\request()->from)&&( \request()->to)){
                $from = Carbon::parse(request()->from)->format('Y-m-d');
                $to = Carbon::parse(request()->to)->format('Y-m-d');
                $data['reports']= ServiceRequest::where('status', 1)
                    ->whereBetween('created_at',[ $from,$to])
                    ->select(['id','user_id','service_id','current_branch','created_at','updated_at'])
                    ->with(['user','service','additionalValues'])->get();
            }
            elseif (\request()->from){
                $from = Carbon::parse(request()->from)->format('Y-m-d');
                $data['reports']= ServiceRequest::where('status', 1)->where('created_at', '>=', $from)
                    ->select(['id','user_id','service_id','current_branch','created_at','updated_at'])
                    ->with(['user','service','additionalValues'])->get();
            }
            elseif(\request()->to){
                $to = Carbon::parse(request()->to)->format('Y-m-d');
                $data['reports']= ServiceRequest::where('status', 1)->where('created_at', '=<', $to)
                    ->select(['id','user_id','service_id','current_branch','created_at','updated_at'])
                    ->with(['user','service','additionalValues'])->get();
            }

        }else{
            $data['reports'] = array();
        }

        return view('reports.all_services', $data);
    }
}
