<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\AssignProductController;
use App\Http\Controllers\EmployeeAllocationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ProductDestroyController;
use App\Http\Controllers\ProductReturnController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ServiceControlle;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\UniformAllocationController;
use App\Http\Controllers\UniformCollectionController;
use App\Http\Controllers\UniformDestroyController;
use App\Http\Controllers\WebsiteConroller;
use App\Http\Controllers\WorkingDaysController;
use App\Http\Livewire\Attendance\AttendanceComponent;
use App\Http\Livewire\BrandSettingComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\ClientSettingComponent;
use App\Http\Livewire\DesignationSettingComponent;
use App\Http\Livewire\Employee\Edit;
use App\Http\Livewire\EmployeeAllotmentComponent;
use App\Http\Livewire\EmployeeSettingComponent;
use App\Http\Livewire\PartnerRegistration;
use App\Http\Livewire\ProductSettingComponent;
use App\Http\Livewire\PurchaseSettingComponent;
use App\Http\Livewire\Salary\MakePaymentsComponent;
use App\Http\Livewire\Salary\SalaryComponent;
use App\Http\Livewire\ServiceRequestComponent;
use App\Http\Livewire\SupplierSettingComponent;
use App\Http\Livewire\TestComponent;
use App\Http\Livewire\UniformAllotmentComponent;
use App\Http\Livewire\UniformSettingComponent;
use App\Http\Livewire\Website\ServiceOrderComponent;
use App\Mail\RequestConfirmation;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
Route::redirect('/', '/de/homepage');


Route::get('/mail', function () {
    return new RequestConfirmation;

});
Route::get('/service_request_mail', function () {

    return new \App\Mail\ServiceRequest();

});

//Route::get('/', function () {
//    return view('index');
//
//})->middleware('auth');

Auth::routes();


Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {

    Route::get('/home', function () {
        return view('index');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('auth')->name('dashboard');

    Route::get('brand/settings', BrandSettingComponent::class)->name('brand');
    Route::get('designation/settings', DesignationSettingComponent::class)->name('designation');
    Route::get('uniform/settings', UniformSettingComponent::class)->name('uniform.settings');

    Route::get('/uniform/allotments', [UniformAllocationController::class, 'index'])->name('uniform.allotments');
    Route::post('/uniform/allotments', [UniformAllocationController::class, 'store'])->name('uniform.allotments.save');
    Route::post('/uniform/allotments/edit', [UniformAllocationController::class, 'edit'])->name('uniform.allotments.edit');
    Route::get('/uniform/allotments/update', [UniformAllocationController::class, 'update'])->name('uniform.allotments.update');
    Route::post('/uniform/allotments/delete/{id}', [UniformAllocationController::class, 'destroy'])->name('uniform.allotments.delete');

    Route::get('/uniform/collection', [UniformCollectionController::class, 'index'])->name('uniform.collection');
    Route::post('/uniform/return_to_stock/{id}', [UniformCollectionController::class, 'return_to_stock'])->name('uniform.return_to_stock');
    Route::post('/uniform/collection/get_product', [UniformCollectionController::class, 'get_product'])->name('uniform.get_product');
    Route::post('/uniform/collection/save', [UniformCollectionController::class, 'save_return_products'])->name('uniform.save_return_products');

    Route::get('/uniform/return_report_date', [UniformCollectionController::class, 'return_report_date'])->name('return_report_date');
    Route::post('/uniform/get_return_report_date', [UniformCollectionController::class, 'get_return_report_date'])->name('get_return_report_date');
    Route::post('/uniform/get_return_report_details', [UniformCollectionController::class, 'get_return_report_details'])->name('get_return_report_details');

    Route::get('/uniform/destroy', [UniformDestroyController::class, 'index'])->name('uniform.destroy');
    Route::post('/uniform/destroy/save', [UniformDestroyController::class, 'save_destroy_products'])->name('save_destroy_products');
    Route::get('/uniform/destroy/destroy_report_date', [UniformDestroyController::class, 'destroy_report_date'])->name('destroy_report_date');
    Route::post('/uniform/get_destroy_report_date', [UniformDestroyController::class, 'get_destroy_report_date'])->name('get_destroy_report_date');
    Route::post('/uniform/get_destroy_report_details', [UniformDestroyController::class, 'get_destroy_report_details'])->name('get_destroy_report_details');
    Route::post('/uniform/destroy/delete_destroy', [UniformDestroyController::class, 'delete_destroy'])->name('delete_destroy');

    Route::get('/product/allotments', [AssignProductController::class, 'index'])->name('product.allotments');
    Route::post('/product/allotments', [AssignProductController::class, 'store'])->name('product.allotments.save');
    Route::post('/product/allotments/edit', [AssignProductController::class, 'edit'])->name('product.allotments.edit');
    Route::get('/product/allotments/update', [AssignProductController::class, 'update'])->name('product.allotments.update');
    Route::post('/product/allotments/delete/{id}', [AssignProductController::class, 'destroy'])->name('product.allotments.delete');
    Route::post('/product/allotments/stock', [AssignProductController::class, 'stock'])->name('product.allotments.stock');

    Route::get('/product/return', [ProductReturnController::class, 'index'])->name('product.return');
    Route::post('/product/return_to_stock/{id}', [ProductReturnController::class, 'return_to_stock'])->name('product.return_to_stock');
    Route::post('/product/return/get_product', [ProductReturnController::class, 'get_product'])->name('product.get_product');
    Route::post('/product/return/save', [ProductReturnController::class, 'save_return_products'])->name('save_return_products');

    Route::get('/product/return_report_date', [ProductReturnController::class, 'return_report_date'])->name('product_return_report_date');
    Route::post('/product/get_return_report_date', [ProductReturnController::class, 'get_return_report_date'])->name('get_product_return_report_date');
    Route::post('/product/get_return_report_details', [ProductReturnController::class, 'get_return_report_details'])->name('get_product_return_report_details');

    Route::get('/product/destroy', [ProductDestroyController::class, 'index'])->name('product.destroy');
    Route::post('/product/destroy/save', [ProductDestroyController::class, 'save_destroy_products'])->name('save_product_destroy');
    Route::get('/product/destroy/destroy_report_date', [ProductDestroyController::class, 'destroy_report_date'])->name('product_destroy_report_date');
    Route::post('/product/get_destroy_report_date', [ProductDestroyController::class, 'get_destroy_report_date'])->name('get_product_destroy_report_date');
    Route::post('/product/get_destroy_report_details', [ProductDestroyController::class, 'get_destroy_report_details'])->name('get_product_destroy_report_details');
    Route::post('/product/destroy/delete_destroy', [ProductDestroyController::class, 'delete_destroy'])->name('product_delete_destroy');

    Route::get('/client/settings', ClientSettingComponent::class)->name('client.settings');
    Route::get('/employee/settings', EmployeeSettingComponent::class)->name('employee.settings');
    Route::get('/employee/allotments', [EmployeeAllocationController::class, 'index'])->name('employee.allotments');
    Route::post('/employee/allotments', [EmployeeAllocationController::class, 'store'])->name('employee.allotments.save');
    Route::post('/employee/allotments/edit', [EmployeeAllocationController::class, 'edit'])->name('employee.allotments.edit');
    Route::get('/employee/allotments/update', [EmployeeAllocationController::class, 'update'])->name('employee.allotments.update');
    Route::post('/employee/allotments/delete/{id}', [EmployeeAllocationController::class, 'destroy'])->name('employee.allotments.delete');

    Route::get('/product/settings', ProductSettingComponent::class)->name('product.settings');
    Route::get('/supplier/settings', SupplierSettingComponent::class)->name('supplier.settings');


    Route::get('/purchase', [PurchaseController::class, 'index'])->name('purchase');
    Route::post('/purchase/save', [PurchaseController::class, 'save_purchase_products'])->name('save_purchase_products');
    Route::post('/purchase/get_suppmemo', [PurchaseController::class, 'get_suppmemo'])->name('get_suppmemo');
    Route::get('/purchase/purchase_report_date', [PurchaseController::class, 'purchase_report_date'])->name('purchase_report_date');
    Route::post('/purchase/get_purchase_report_date', [PurchaseController::class, 'get_purchase_report_date'])->name('get_purchase_report_date');
    Route::post('/purchase/delete_purchase', [PurchaseController::class, 'delete_purchase'])->name('delete_purchase');
    Route::post('/purchase/get_purchase_invoice_details', [PurchaseController::class, 'get_purchase_invoice_details'])->name('get_purchase_invoice_details');

    Route::get('/purchase/return', [PurchaseController::class, 'return'])->name('purchase.return');
    Route::post('/purchase/return/save', [PurchaseController::class, 'save_return_products'])->name('save_return_products');
    Route::post('/purchase/return/get_sup_memo', [PurchaseController::class, 'get_sup_memo'])->name('get_sup_memo');
    Route::post('/purchase/return/get_sup_product', [PurchaseController::class, 'get_sup_product'])->name('get_sup_product');
    Route::post('/purchase/return/get_sup_product_price', [PurchaseController::class, 'get_sup_product_price'])->name('get_sup_product_price');

    Route::get('/purchase/return/purchase_return_report_date', [PurchaseController::class, 'purchase_return_report_date'])->name('purchase_return_report_date');
    Route::post('/purchase/return/get_purchase_return_report_date', [PurchaseController::class, 'get_purchase_return_report_date'])->name('get_purchase_return_report_date');
    Route::post('/purchase/return/get_purchase_return_details', [PurchaseController::class, 'get_purchase_return_details'])->name('get_purchase_return_details');
    Route::post('/purchase/return/delete_purchase_return', [PurchaseController::class, 'delete_purchase_return'])->name('delete_purchase_return');


//    service category
    Route::get('/category', CategoryComponent::class)->name('category');
    Route::get('/ServiceRequest', ServiceRequestComponent::class)->name('service_request');


    Route::get('/hold_service_request', [ServiceControlle::class, 'hold_request'])->name('hold_request');

//    service Status edit
    Route::get('/confirm_hold_request/{id}', [ServiceControlle::class, 'confirm_hold_request'])->name('confirm_hold_request');
    Route::get('/reject_request/{id}', [ServiceControlle::class, 'reject_request'])->name('reject_request');
    Route::get('/complete_request/{id}', [ServiceControlle::class, 'complete_request'])->name('complete_request');


    Route::get('/confirm_service_request', [ServiceControlle::class, 'confirm_request'])->name('confirm_request');

    Route::get('/Today"s_Service_Request', [ServiceControlle::class, 'today_request'])->name('today_Request');

    Route::get('/service_details/{id}', [ServiceControlle::class, 'service_details'])->name('service_details');

    Route::post('/service_details/{id}', [ServiceControlle::class, 'service_details_update'])->name('service_details_update');

//    partner

    Route::get('/partner_request', [EmployeeController::class, 'partner_request'])->name('partner_request');
    Route::get('/partner_request_accept/{id}', [EmployeeController::class, 'partner_request_accept'])->name('partner_request_accept');

    Route::get('/partner_allocate', [ServiceControlle::class, 'partner_allocate'])->name('partner_allocate');
    Route::post('/partner_allocate_save', [ServiceControlle::class, 'partner_allocate_save'])->name('partner_allocate_save');

    Route::get('/partner_allocate_remove/{service}/{emp}', [ServiceControlle::class, 'partner_allocate_remove'])->name('partner_allocate_remove');

    Route::get('/partner_allocate_list', [ServiceControlle::class, 'partner_allocate_list'])->name('partner_allocate_list');

    Route::get('/remove_partner', [ServiceControlle::class, 'remove_partner'])->name('remove_partner');

//    partner_bill
    Route::get('/partner_bill', [ServiceControlle::class, 'partner_bill'])->name('partner_bill');



//    service report

    Route::get('/employee_bill/{id}',[EmployeeController::class,"employee_bill"])->name('employee_bill');
    Route::get('/service_done_report/{id}',[ServiceControlle::class,"service_done_report"])->name('services_request_done');
    Route::get('/service_done/{id}',[ServiceControlle::class,"service_done_report_without_voucher"])->name('service_done_report_without_voucher');




//\App\Models\GeneralSettings::

    Route::get('/general_settings',[AdminPanelController::class,"general_settings"])->name('general_settings');
    Route::post('/general_settings_save',[AdminPanelController::class,"general_settings_save"])->name('general_settings_save');

});
Route::get('/calender', function () {
    return view('test');
});


Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('/department', function () {
        return view('livewire.department.index');
    })->name('department');



    Route::view('/employees', 'employees.index')->name("employee_list");

    Route::view('/employees/create', 'employees.create')->name('employee_create');

    Route::get('/employees/{employee}/edit', Edit::class);

    Route::get('/employees/{employee}', [EmployeeController::class, 'show']);
    Route::get('/employees_delete/{employee}', [EmployeeController::class, 'delete'])->name('employee.delete');

    Route::get('/print_user/{employee}', [EmployeeController::class, 'print_user'])->name('print_user');





});

Route::redirect('/', '/de/homepage');
Route::redirect('/home', '/de/all_services');


//website -------------------------------------------------------------------------------------

Route::group([ 'prefix' => '{language}'], function () {


    Route::get('/homepage', function () {
        $all_service = \App\Models\Service::all();
        return view('website.homepage',compact('all_service'));
    })->name('page.homepage');

    Route::get('/contact_us', function () {
        return view('website.contact_us');
    })->name('contact_us');


    Route::get('/terms_of_services', function () {
        return view('website.terms_of_services');
    })->name('page.terms');
    Route::get('/privacy_policy', function () {
        return view('website.privacy_policy');
    })->name('privacy_policy');

    Route::get('/all_services', [ServiceControlle::class, 'all_services'])->name('all_services');

//    Route::get('/partner_registration',PartnerRegistration::class )->name('partner_registration');

    Route::get('/partner_registration',[WebsiteConroller::class,'partner_registration'] )->name('partner_registration');
    Route::post('/partner_registration_save',[WebsiteConroller::class,'partner_registration_save'] )->name('partner_registration_save');

//   blog
    Route::view('/office_cleaning','website.office_cleaning')->name('office_cleaning');
    Route::view('/home_cleaning','website.home_cleaning' )->name('home_cleaning');
    Route::view('/craftsman_services','website.craftsman_services' )->name('craftsman_services');

//    Route::view('/office_cleaning', 'dir.page');
});


Route::group(['prefix' => '{language}', 'middleware' => ['auth','customer']], function () {


    Route::get('/services_request/{id?}', ServiceOrderComponent::class)->name('services_request');

    Route::get('/services_request_confirm', function () {
        return view('website.request_confirmation');
    })->name('services_request_confirm');
    Route::get('/Impressum', function () {
        return view('website.Impressum');
    })->name('Impressum');


    Route::get('/customer_dashboard', [ WebsiteConroller::class,'customer_dashboard'])->name('customer_dashboard');


    Route::get('/customer_profile', [ WebsiteConroller::class,'customer_profile'])->name('customer_profile');
    Route::post('/customer_profile_update', [ WebsiteConroller::class,'customer_profile_update'])->name('customer_profile_update');



});

Route::get('stripe', [StripePaymentController::class, 'stripe']);
//Route::get('stripe', [StripePaymentController::class, 'stripe']);
Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');

// Route::get('/calculate', function () {
//     return view('calculate');
// })->name('calculate');
Route::post('/calculate', [ WebsiteConroller::class,'calculate'])->name('calculate');



// Employee Dashboard --------------------------------------------------------------------

Route::group(['middleware' => ['auth', 'employee'], 'prefix' => 'employee'], function () {


    Route::get('/employee_dashboard', function () {
        return view('employee_dashboard.employee_dashboard');
    })->name('employee_dashboard');

    Route::get('/services_request_list',[EmployeeController::class,'services_request_list'])->name('services_request_list');
    Route::get('/accept_service_request/{id}',[EmployeeController::class,'accept_service_request'])->name('accept_service_request');
    Route::get('/today_service_list',[EmployeeController::class,'today_service_list'])->name('today_service_list');
    Route::get('/complete/{id}',[EmployeeController::class,'complete'])->name('complete');

    Route::get('/service_details_emp/{id}', [EmployeeController::class, 'service_details'])->name('service_details_emp');

    Route::post('/service_details_emp/{id}', [ServiceControlle::class, 'service_details_update_emp'])->name('service_details_update_emp');

    Route::get('/employee_calender', [EmployeeController::class, 'employee_calender'])->name('employee_calender');
    Route::get('/bill', [EmployeeController::class, 'employee_bill_total'])->name('employee_bill_total');


});

Route::get('/reject_request/{id}', [ServiceControlle::class, 'reject_request'])->name('reject_request');

