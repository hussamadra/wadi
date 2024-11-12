<?php

namespace App\Listeners;

use App\Models\UserSession;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
//        $user_session=UserSession::where('created_at','like','%'.Carbon::now()->format('Y-m-d').'%')->first();
//        if(!$user_session){
            UserSession::create([
               'user_id'=>auth()->user()->id,
                'in'=>0.0,
                'out'=>0.0,
            ]);
//        }
    }
}
