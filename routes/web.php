<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AttendanceController;
// use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('front.home');
Route::get('/employ-details',[HomeController::class,'employ'])->name('front.employ');
Route::get('/projects',[HomeController::class,'project'])->name('front.project');
Route::get('/notices',[HomeController::class,'notice'])->name('front.notice');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/add-user',[UserController::class,'create'])->name('admin.createUser');
    Route::post('/create-user',[UserController::class,'store'])->name('admin.home.create');
    Route::get('/manage-user',[UserController::class,'index'])->name('admin.home.manage');
    Route::get('/show-user/{id}',[UserController::class,'show'])->name('admin.home.show');
    Route::get('/edit-user/{id}',[UserController::class,'edit'])->name('admin.home.edit');
    //attendance
    Route::get('/show_attendance/{id}',[UserController::class,'attendance'])->name('admin.home.userAttendance');
    Route::post('/add_remark/{id}',[UserController::class,'storeRemark'])->name('admin.home.remark_add');

    Route::post('/update-user/{id}',[UserController::class,'update'])->name('admin.home.update');
    Route::get('/destory-user/{id}',[UserController::class,'destroy'])->name('admin.home.delete');
    // Promotion
    Route::post('/promotion-user/{id}',[UserController::class,'action'])->name('admin.home.promotion');
    //promotion-mail
    Route::post('/promotion-mail',[UserController::class,'action'])->name('admin.home.promotionMail');
    // modal_edit
    // Route::get('/modal_edit/{id}',[UserController::class,'modal'])->name('admin.home.edit_modal');

    //user-type
    Route::get('/add-userType',[UserTypeController::class,'create'])->name('admin.userType.create-userType');
    Route::post('/create-user-type',[UserTypeController::class,'store'])->name('admin.userType.add-userType');
    Route::get('/manage_user_type',[UserTypeController::class,'index'])->name('admin.userType.manage_user_type');
    Route::get('/edit_user_type/{id}',[UserTypeController::class,'edit'])->name('admin.userType.edit_user_type');
    Route::post('/update_user_type/{id}',[UserTypeController::class,'Update'])->name('admin.userType.update_user_type');
    Route::get('/delete_user_type/{id}',[UserTypeController::class,'destroy'])->name('admin.userType.delete_user_type');

    //Designation
    Route::get('/add_designation',[DesignationController::class,'create'])->name('admin.desination.add_designation');
    Route::post('/designation_create',[DesignationController::class,'store'])->name('admin.designation.create_designation');
    Route::get('/designation_manage',[DesignationController::class,'index'])->name('admin.designation.manage_designation');
    Route::get('/designation_edit/{id}',[DesignationController::class,'edit'])->name('admin.designation.edit_designation');
    Route::post('/designation_update/{id}',[DesignationController::class,'update'])->name('admin.designation.update_designation');
    Route::get('/delete-designation/{id}',[DesignationController::class,'destroy'])->name('admin.designation.delete_designation');

    //Project
    Route::get('/project_create',[ProjectController::class,'create'])->name('admin.project.create_project');
    Route::post('/project_add',[ProjectController::class,'store'])->name('admin.project.add_project');
    Route::get('/project_manage',[ProjectController::class,'index'])->name('admin.project.manage_project');
    Route::get('/project_edit/{id}',[ProjectController::class,'edit'])->name('admin.project.edit_project');
    Route::post('/project_update/{id}',[ProjectController::class,'update'])->name('admin.project.update_project');
    Route::get('/project_delete/{id}',[ProjectController::class,'destroy'])->name('admin.project.delete');
    //show manager-employee ajax
    Route::get('/view-project',[ProjectController::class,'show'])->name('admin.project.view_project');
    Route::get('/fetch-data',[ProjectController::class,'fetchData'])->name('fetch.data');


    //Attendance
    Route::get('/attendance-user',[AttendanceController::class,'create'])->name('admin.attendance.attendance');
    Route::post('/attendance-add',[AttendanceController::class,'store'])->name('admin.attendance.attendance_add');
    Route::get('/attendance-show',[AttendanceController::class,'index'])->name('admin.attendance.show_attendance');


});
