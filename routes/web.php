<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\WebsiteController;
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

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/admin', [UserAuthController::class, 'index'])->name('home');
Route::post('login', [UserAuthController::class, 'login'])->name('login');

Route::middleware([UserAuth::class])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('home', [AdminController::class, 'index'])->name('admin.home');
        Route::get('logout', [UserAuthController::class, 'logout'])->name('logout');
        Route::get('patient-list', [AdminController::class, 'getpatient'])->name('patient.list');
        Route::post('store-patient', [AdminController::class, 'storePatient'])->name('store.patient');
        Route::put('update-patient/{id}', [AdminController::class, 'updatePatient'])->name('update.patient');
        Route::get('trash-patient/{id}', [AdminController::class, 'trashPatient'])->name('trash.patient');
        Route::get('trash', [AdminController::class, 'trashList'])->name('trash.list');
        Route::get('destroy-patient/{id}', [AdminController::class, 'destroyPatient'])->name('destroy.patient');
        Route::get('restore-patient/{id}', [AdminController::class, 'restorePatient'])->name('restore.patient');
        //Doctor Routes...
        Route::get('doctor-list', [AdminController::class, 'getdoctor'])->name('doctor.list');
        Route::post('store-doctor', [AdminController::class, 'storeDoctor'])->name('store.doctor');
        Route::put('update-doctor/{id}' , [AdminController::class, 'updateDoctor'])->name('update.doctor');
        Route::get('trash-doctor/{id}',[AdminController::class, 'trashDoctor'])->name('trash.doctor');
        Route::get('restore-doctor/{id}', [AdminController::class, 'restoreDoctor'])->name('restore.doctor');
        Route::get('destroy-doctor/{id}', [AdminController::class, 'destroyDoctor'])->name('destroy.doctor');
        //Appointment Routes...
        Route::get('appointments', [AdminController::class, 'getAppointments'])->name('appointment.list');
        Route::post('store-appointments', [AdminController::class, 'storeAppointments'])->name('store.appointment');
        Route::put('update-appointment/{id}', [AdminController::class, 'updateAppointment'])->name('update.appointment');
        Route::get('trash-appointment/{id}', [AdminController::class, 'trashAppointment'])->name('trash.appointment');
        Route::get('restore-appointment/{id}', [AdminController::class, 'restoreAppointment'])->name('restore.appointment');
        Route::get('destroy-appointment/{id}', [AdminController::class, 'destroyAppointment'])->name('destroy.appointment');
        Route::get('appointment-patient/{id}', [AdminController::class, 'ShowAppointmentPatient'])->name('show.appointment.patient');

        Route::get('my-profile',[AdminController::class,'showProfile'])->name('show.profile');
        Route::put('update-account/{id}',[AdminController::class,'updateAccount'])->name('update.account');
    });
});


// Doctor side...
Route::get('user-login',[UserAuthController::class, 'ShowUserLogin'])->name('show.user.login');
Route::post('doctor-login',[UserAuthController::class, 'doctorLogin'])->name('doctor.login');
// Route::middleware([UserAuth::class])->group(function(){
    Route::prefix('doctor')->group(function(){
        Route::get('home', [DoctorController::class, 'index'])->name('doctor.home');
        Route::get('appointment-list', [DoctorController::class, 'getAppointment'])->name('doctor.appointment');
        Route::post('store-appointment',[DoctorController::class, 'storeAppointment'])->name('doctor.store.appointment');
        Route::put('update-appointment/{id}',[DoctorController::class, 'updateAppointment'])->name('update.doctor.appointment');
        Route::get('trash-appointment/{id}',[DoctorController::class, 'destroyAppointment'])->name('destroy.doctor.appointment');
        Route::get('request-list', [DoctorController::class, 'getRequests'])->name('doctor.request.list');
        Route::put('store-response/{id}', [DoctorController::class, 'storeResponse'])->name('doctor.store.response');
        Route::get('doctor-profile', [DoctorController::class, 'doctorProfile'])->name('doctor.profile');
        Route::get('doctor-logout',[DoctorController::class, 'DocLogout'])->name('doctor.logout');
        Route::get('appointment-patient/{id}',[DoctorController::class,'appointmentPatient'])->name('appointment.patient');
        Route::put('update-account/{id}',[DoctorController:: class,'updateDocAccount'])->name('update.doctor.account');
    });
// });

// Patient Side...
Route::post('patient-login',[UserAuthController::class, 'patientLogin'])->name('patient.login');
// Route::middleware([UserAuth::class])->group(function(){
    Route::prefix('patient')->group(function(){
        Route::get('home', [PatientController::class, 'index'])->name('patient.home');
        Route::get('doctor-list', [PatientController:: class, 'getDoctor'])->name('patient.doctor.list');
        Route::post('request/{id}', [PatientController:: class, 'setRequest'])->name('patient.set.request');
        Route::get('appointment-list', [PatientController:: class, 'getAppointments'])->name('patient.get.appointments');
        Route::get('set-appointment/{id}', [PatientController:: class, 'setAppointment'])->name('patient.set.appointment');
        Route::get('my-appointment', [PatientController:: class, 'getMyAppointment'])->name('patient.my.appointment');
        Route::get('my-request', [PatientController:: class, 'getRequest'])->name('patient.get.request');
        Route::post('store-request', [PatientController:: class, 'storeRequest'])->name('patient.store.request');
        Route::put('update-request/{id}', [PatientController:: class, 'updateRequest'])->name('patient.update.request');
        Route::get('destroy-request/{id}', [PatientController:: class, 'destroyRequest'])->name('patient.destroy.request');
        Route::get('patient-profile',[PatientController:: class, 'patientProfile'])->name('patient.profile');
        Route::put('update-account/{id}',[PatientController:: class, 'updatePaAccount'])->name('update.patient.account');
        Route::get('patient-logout',[PatientController::class, 'patientLogout'])->name('patient.logout');
    });
// });

