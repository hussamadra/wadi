<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\User;
use App\Models\UserSession;
use Illuminate\Http\Request;

class UserReportController extends Controller
{

    public function userReport(Request $request)
    {
        if (!auth()->user()->can('user_sessions.report')) {
            abort(403);
        }
        $data['route'] = 'report/users';
        $data['page'] = 'تقرير المستخدمين';

        if ((auth()->user()->getRoleNames()->first() == 'مدير تقني') or (auth()->user()->getRoleNames()->first() == 'مدير عام')) {
            $data['branches'] = Branch::all();
            $data['all_users'] = User::all();
        } else {
            $data['all_users'] = User::where('id', auth()->user()->id)->get();
            $user = User::find(auth()->id());
            $data['branches'][] = $user->branch;

        }

        if (($request->user_id) and ($request->branch_id)) {

            if ((auth()->user()->getRoleNames()->first() == 'مدير تقني') or (auth()->user()->getRoleNames()->first() == 'مدير عام')) {

                $data['users'] = UserSession::where('user_id', $request->user_id)->whereHas('user', function ($q) {

                    $q->where('branch_id', \request()->branch_id);

                })->with('user')->get();

            } else {

                $data['users'] = UserSession::where('user_id', auth()->user()->id)->with('user')->get();

            }


        } elseif (($request->user_id)) {

            if ((auth()->user()->getRoleNames()->first() == 'مدير تقني') or (auth()->user()->getRoleNames()->first() == 'مدير عام')) {

                $data['users'] = UserSession::where('user_id', $request->user_id)->with('user')->get();

            } else {

                $data['users'] = UserSession::where('user_id', auth()->user()->id)->with('user')->get();

            }



        } elseif ($request->branch_id) {



            $data['users'] = UserSession::whereHas('user', function ($q) {

                $q->where('branch_id', \request()->branch_id);

            })->with('user')->get();



        } else {

            if ((auth()->user()->getRoleNames()->first() == 'مدير تقني') or (auth()->user()->getRoleNames()->first() == 'مدير عام')) {

                $data['users'] = UserSession::with('user')->get();

            } else {

                $data['users'] = UserSession::where('user_id', auth()->user()->id)->with('user')->get();

            }


        }

        return view('reports.user_sessions', $data);
    }

}
