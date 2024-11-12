<?php

use App\Http\Controllers\ReceiptsController;
use App\Http\Controllers\RegisteringController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home1');
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('roles', \App\Http\Controllers\RoleController::class);
    Route::resource('permissions', \App\Http\Controllers\PermissionController::class);
});
Route::group(['middleware' => ['auth','role']], function () {
    Route::get('report/service/all', [\App\Http\Controllers\ServiceReportController::class, 'serviceReportData'])->name('services.report.data');
    Route::get('report/service/{id}', [\App\Http\Controllers\ServiceReportController::class, 'serviceReport'])->name('services.report');
    Route::get('report/supplier/{id}', [\App\Http\Controllers\ServiceReportController::class, 'supplierReport'])->name('suppliers.report');
    Route::get('report/users/{id}', [\App\Http\Controllers\ServiceReportController::class, 'userReport'])->name('users.report');
    Route::get('report/branch/{id}', [\App\Http\Controllers\ServiceReportController::class, 'branchReport'])->name('branches.report');
    Route::get('report/govers/{id}', [\App\Http\Controllers\ServiceReportController::class, 'goversReport'])->name('governorates.report');

    Route::get('report/user-sessions', [\App\Http\Controllers\UserReportController::class, 'userReport'])->name('user_sessions.report');
    Route::get('customers-charge/{id}', [\App\Http\Controllers\CustomerController::class,'chargeForm'])->name('customers.charge.form');
    Route::post('customers-charge/{id}', [\App\Http\Controllers\CustomerController::class,'charge'])->name('customers.charge');
    Route::get('customers-serve/{id}', [\App\Http\Controllers\CustomerController::class,'chooseService'])->name('customers.servc');
    Route::resource('services', \App\Http\Controllers\ServiceController::class);
//    Route::post('services/update',[\App\Http\Controllers\ServiceController::class,'updateRequest'])->name('services.update');


    Route::resource('branches', \App\Http\Controllers\BranchesController::class);
    Route::resource('specials', \App\Http\Controllers\SpecialsController::class);
    Route::resource('students', \App\Http\Controllers\StudentsController::class);
    Route::resource('registering', \App\Http\Controllers\RegisteringController::class);
    Route::resource('promises', \App\Http\Controllers\PromisesController::class);
    Route::resource('ides', \App\Http\Controllers\IdesController::class);
    Route::resource('receipts', \App\Http\Controllers\ReceiptsController::class);
    Route::resource('workdocs', \App\Http\Controllers\WorkController::class);


    /**
     * test
     */
    // Route::get('/jj',[ReceiptsController::class,'createForStudent']);

    Route::resource('subjects', \App\Http\Controllers\SubjectController::class);

    Route::get('/get-student', [\App\Http\Controllers\RegisteringController::class, 'getStudent'])->name('registering.getStudent');

    Route::resource('reservations', \App\Http\Controllers\ReservationController::class);



    Route::resource('/roles',\App\Http\Controllers\RoleController::class);
});

    Route::get('createForStudent/{id}',[\App\Http\Controllers\RegisteringController::class,'createFromStudent'])->name('createForStudent');

// Route::get('kk',[\App\Http\Controllers\RegisteringController::class,'createFromStudent']);


Route::get('/c-p',function(){
    Artisan::call('optimize:clear');
});

Route::get('/markAsRead', function(){

    auth()->user()->unreadNotifications->markAsRead();

    return redirect()->back();

})->name('mark');

Route::get('ReadNotification',function (){
    $userUnreadNotification = auth()->user()
        ->unreadNotifications
        ->where('id', request()->id)
        ->first();

    if($userUnreadNotification) {
        $userUnreadNotification->markAsRead();
    }
    return back();
})->name('ReadNotification');

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('optimize:clear');

    return 'done';
});
Route::get('/cache', function(){
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('optimize:clear');
    Artisan::call('route:cache');
    Artisan::call('route:clear');
    return 'done';

});
//composer dumpautoload -o

Route::get('/link-storage', function () {
    Artisan::call('storage:link');
  return 'done';
});

