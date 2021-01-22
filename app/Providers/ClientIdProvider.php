<?php

namespace App\Providers;

use App\Models\Application;
use App\Models\Attendance;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Holiday;
use App\Models\LeaveCategory;
use App\Models\Loan;
use App\Models\SalaryInfo;
use App\Models\SalarySheet;
use App\Models\Service;
use App\Models\WorkingDay;
use Illuminate\Support\ServiceProvider;

class ClientIdProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        Attendance::creating(function ($model){
//            $model->user_id = auth()->user()->id;
//            $model->client_id = auth()->user()->client_id;
//        });
//
//
//        Department::creating(function($model){
//           $model->client_id = auth()->user()->client_id;
//           $model->user_id = auth()->user()->id;
//        });
//        Designation::creating(function($model){
//           $model->client_id = auth()->user()->client_id;
//           $model->user_id = auth()->user()->id;
//        });
//
//        WorkingDay::creating(function ($model){
//            $model->user_id = auth()->user()->id;
//            $model->client_id = auth()->user()->client_id;
//        });
//
//        Holiday::creating(function ($model){
//            $model->user_id = auth()->user()->id;
//            $model->client_id = auth()->user()->client_id;
//        });
//
//        LeaveCategory::creating(function ($model){
//            $model->user_id = auth()->user()->id;
//            $model->client_id = auth()->user()->client_id;
//        });
//
//        Employee::creating(function ($model){
//            $model->user_id = auth()->user()->id;
//            $model->client_id = auth()->user()->client_id;
//        });
//
//        SalaryInfo::creating(function ($model){
//            $model->user_id = auth()->user()->id;
//            $model->client_id = auth()->user()->client_id;
//        });
//
//        SalarySheet::creating(function ($model){
//            $model->user_id = auth()->user()->id;
//            $model->client_id = auth()->user()->client_id;
//        });
//
//        Application::creating(function ($model){
//            $model->user_id = auth()->user()->id;
//            $model->client_id = auth()->user()->client_id;
//        });
//
//        Loan::creating(function ($model){
//            $model->user_id = auth()->user()->id;
//            $model->client_id = auth()->user()->client_id;
//        });
//
////        Service::creating(function ($model){
////            $model->user_id = auth()->user()->id;
////            $model->client_id = auth()->user()->client_id;
////        });


    }
}
