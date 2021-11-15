<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 					[App\Http\Controllers\Frontend\IndexController::class, 'index'])->name('home');
Route::get('/service-categories', 	[App\Http\Controllers\Frontend\IndexController::class, 'serviceCategories'])->name('home.service.categories');
Route::get('/service-categories/{slug}', 	[App\Http\Controllers\Frontend\IndexController::class, 'servicesByCategory'])->name('home.servicesbycategories');
Route::get('/service-details/{slug}', 	    [App\Http\Controllers\Frontend\IndexController::class, 'servicesDetails'])->name('home.service.details');


Route::get('/employees', 	    [App\Http\Controllers\Frontend\EmployeeController::class, 'employees'])->name('home.employees');


Route::get('/autocomplete',     [App\Http\Controllers\Frontend\IndexController::class, 'autocomplete'])->name('autocomplete');
Route::post('/search',          [App\Http\Controllers\Frontend\IndexController::class, 'searchService'])->name('searchService');


Route::get('/login', 			[App\Http\Controllers\Frontend\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login', 			[App\Http\Controllers\Frontend\Auth\LoginController::class, 'login_go'])->name('login_go');
Route::get('/logout', 			[App\Http\Controllers\Frontend\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/registration', 	[App\Http\Controllers\Frontend\Auth\RegisterController::class, 'register'])->name('register');
Route::post('/registration', 	[App\Http\Controllers\Frontend\Auth\RegisterController::class, 'register_go'])->name('register_go');


// SSLCOMMERZ Start
//Route::get('/payment/{slug}',      [App\Http\Controllers\SslCommerzPaymentController::class, 'exampleEasyCheckout'])->name('payment');
Route::get('/example1',            [App\Http\Controllers\SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/payment/{slug}',      [App\Http\Controllers\SslCommerzPaymentController::class, 'exampleHostedCheckout'])->name('payment');
//Route::get('/example2',      [App\Http\Controllers\SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay',          [App\Http\Controllers\SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [App\Http\Controllers\SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success',      [App\Http\Controllers\SslCommerzPaymentController::class, 'success']);
Route::post('/fail',         [App\Http\Controllers\SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel',       [App\Http\Controllers\SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn',          [App\Http\Controllers\SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


Route::prefix('provider')->group(function () {
    Route::group(['middleware' => ['auth']], function(){

        Route::prefix('profiles')->group(function(){
            Route::get('/index', 			[App\Http\Controllers\Provider\ProfileController::class, 'index'])->name('profiles.index');
            Route::get('/create', 			[App\Http\Controllers\Provider\ProfileController::class, 'create'])->name('profiles.create');
            Route::post('/store', 			[App\Http\Controllers\Provider\ProfileController::class, 'store'])->name('profiles.store');
            Route::get('/edit/{id}', 		[App\Http\Controllers\Provider\ProfileController::class, 'edit'])->name('profiles.edit');
            Route::post('/update/{id}', 	[App\Http\Controllers\Provider\ProfileController::class, 'update'])->name('profiles.update');
            Route::get('/destroy/{id}', 	[App\Http\Controllers\Provider\ProfileController::class, 'destroy'])->name('profiles.destroy');
            Route::get('/status_update', 	[App\Http\Controllers\Provider\ProfileController::class, 'status_update'])->name('profiles.status_update');
        });
        
    });
});

Route::prefix('customer')->group(function () {
    Route::group(['middleware' => ['auth']], function(){

        Route::prefix('orders')->group(function(){
            Route::get('/index', 		[App\Http\Controllers\Customer\OrderController::class, 'index'])->name('customer.orders.index');
            Route::get('/view/{id}', 	[App\Http\Controllers\Customer\OrderController::class, 'view'])->name('customer.orders.view');
        });

    });
});

Route::prefix('admin')->group(function () {

    Route::get('/login', 					[App\Http\Controllers\Auth\LoginController::class, 'login'])->name('admin.login');
	Route::post('/login', 					[App\Http\Controllers\Auth\LoginController::class, 'login_go'])->name('admin.login_go');
    Route::get('/logout', 					[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('admin.logout');

    Route::get('forget-password', 			[App\Http\Controllers\Auth\ForgotPasswordController::class, 'index'])->name('admin.forgot.password');
	Route::post('forget-password', 			[App\Http\Controllers\Auth\ForgotPasswordController::class, 'submitForgetPasswordEmail'])->name('admin.submit.forgot.password'); 

	Route::get('reset-password/{token}', 	[App\Http\Controllers\Auth\ForgotPasswordController::class, 'ResetPasswordIndex'])->name('admin.reset.password');
	Route::post('reset-password', 			[App\Http\Controllers\Auth\ForgotPasswordController::class, 'ResetPasswordSubmit'])->name('admin.reset.password.submit');

    // Admin Authenticated Routes
	Route::group(['middleware' => ['auth']], function(){

		Route::get('/dashboard', 			[App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        Route::prefix('orders')->group(function(){
            Route::get('/index', 		[App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.orders.index');
            Route::get('/view/{id}', 	[App\Http\Controllers\Admin\OrderController::class, 'view'])->name('admin.orders.view');
            Route::get('/edit/{id}', 	[App\Http\Controllers\Admin\OrderController::class, 'edit'])->name('admin.orders.edit');
            Route::post('/update/{id}', [App\Http\Controllers\Admin\OrderController::class, 'update'])->name('admin.orders.update');
            Route::get('/destroy/{id}', [App\Http\Controllers\Admin\OrderController::class, 'destroy'])->name('admin.orders.destroy');
        });

        Route::prefix('slides')->group(function(){
            Route::get('/index', 			[App\Http\Controllers\Admin\SliderController::class, 'index'])->name('slides.index');
            Route::get('/create', 			[App\Http\Controllers\Admin\SliderController::class, 'create'])->name('slides.create');
            Route::post('/store', 			[App\Http\Controllers\Admin\SliderController::class, 'store'])->name('slides.store');
            Route::get('/edit/{id}', 		[App\Http\Controllers\Admin\SliderController::class, 'edit'])->name('slides.edit');
            Route::post('/update/{id}', 	[App\Http\Controllers\Admin\SliderController::class, 'update'])->name('slides.update');
            Route::get('/destroy/{id}', 	[App\Http\Controllers\Admin\SliderController::class, 'destroy'])->name('slides.destroy');
            Route::get('/status_update', 	[App\Http\Controllers\Admin\SliderController::class, 'status_update'])->name('slides.status_update');
        });

        Route::prefix('servicecategories')->group(function(){
            Route::get('/index', 			[App\Http\Controllers\Admin\ServiceCategoryController::class, 'index'])->name('servicecategories.index');
            Route::get('/create', 			[App\Http\Controllers\Admin\ServiceCategoryController::class, 'create'])->name('servicecategories.create');
            Route::post('/store', 			[App\Http\Controllers\Admin\ServiceCategoryController::class, 'store'])->name('servicecategories.store');
            Route::get('/edit/{id}', 		[App\Http\Controllers\Admin\ServiceCategoryController::class, 'edit'])->name('servicecategories.edit');
            Route::post('/update/{id}', 	[App\Http\Controllers\Admin\ServiceCategoryController::class, 'update'])->name('servicecategories.update');
            Route::get('/destroy/{id}', 	[App\Http\Controllers\Admin\ServiceCategoryController::class, 'destroy'])->name('servicecategories.destroy');
            Route::get('/status_update', 	[App\Http\Controllers\Admin\ServiceCategoryController::class, 'status_update'])->name('servicecategories.status_update');
        });

        Route::prefix('services')->group(function(){
            Route::get('/index', 			[App\Http\Controllers\Admin\ServiceController::class, 'index'])->name('services.index');
            Route::get('/create', 			[App\Http\Controllers\Admin\ServiceController::class, 'create'])->name('services.create');
            Route::post('/store', 			[App\Http\Controllers\Admin\ServiceController::class, 'store'])->name('services.store');
            Route::get('/edit/{id}', 		[App\Http\Controllers\Admin\ServiceController::class, 'edit'])->name('services.edit');
            Route::post('/update/{id}', 	[App\Http\Controllers\Admin\ServiceController::class, 'update'])->name('services.update');
            Route::get('/destroy/{id}', 	[App\Http\Controllers\Admin\ServiceController::class, 'destroy'])->name('services.destroy');
            Route::get('/status_update', 	[App\Http\Controllers\Admin\ServiceController::class, 'status_update'])->name('services.status_update');
        });

        Route::prefix('cmscategories')->group(function(){
            Route::get('/index', 			[App\Http\Controllers\Admin\CmsCategoryController::class, 'index'])->name('cmscategories.index');
            Route::get('/create', 			[App\Http\Controllers\Admin\CmsCategoryController::class, 'create'])->name('cmscategories.create');
            Route::post('/store', 			[App\Http\Controllers\Admin\CmsCategoryController::class, 'store'])->name('cmscategories.store');
            Route::get('/edit/{id}', 		[App\Http\Controllers\Admin\CmsCategoryController::class, 'edit'])->name('cmscategories.edit');
            Route::post('/update/{id}', 	[App\Http\Controllers\Admin\CmsCategoryController::class, 'update'])->name('cmscategories.update');
            Route::get('/destroy/{id}', 	[App\Http\Controllers\Admin\CmsCategoryController::class, 'destroy'])->name('cmscategories.destroy');
            Route::get('/status_update', 	[App\Http\Controllers\Admin\CmsCategoryController::class, 'status_update'])->name('cmscategories.status_update');
        });

        Route::prefix('cmspages')->group(function(){
            Route::get('/index', 			[App\Http\Controllers\Admin\CmsController::class, 'index'])->name('cms.index');
            Route::get('/create', 			[App\Http\Controllers\Admin\CmsController::class, 'create'])->name('cms.create');
            Route::post('/store', 			[App\Http\Controllers\Admin\CmsController::class, 'store'])->name('cms.store');
            Route::get('/edit/{id}', 		[App\Http\Controllers\Admin\CmsController::class, 'edit'])->name('cms.edit');
            Route::post('/update/{id}', 	[App\Http\Controllers\Admin\CmsController::class, 'update'])->name('cms.update');
            Route::get('/destroy/{id}', 	[App\Http\Controllers\Admin\CmsController::class, 'destroy'])->name('cms.destroy');
            Route::get('/status_update', 	[App\Http\Controllers\Admin\CmsController::class, 'status_update'])->name('cms.status_update');
        });

        Route::prefix('users')->group(function(){
            Route::get('/index', 			[App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
            Route::get('/create', 			[App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
            Route::post('/store', 			[App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');
            Route::get('/edit/{id}', 		[App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users.edit');
            Route::post('/update/{id}', 	[App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');
            Route::get('/destroy/{id}', 	[App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');
            Route::get('/status_update', 	[App\Http\Controllers\Admin\UserController::class, 'status_update'])->name('users.status_update');
        });

        Route::prefix('roles')->group(function(){
            Route::get('/index', 			[App\Http\Controllers\Admin\RoleController::class, 'index'])->name('roles.index');
            Route::get('/create', 			[App\Http\Controllers\Admin\RoleController::class, 'create'])->name('roles.create');
            Route::post('/store', 			[App\Http\Controllers\Admin\RoleController::class, 'store'])->name('roles.store');
            Route::get('/edit/{id}', 		[App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('roles.edit');
            Route::post('/update/{id}', 	[App\Http\Controllers\Admin\RoleController::class, 'update'])->name('roles.update');
            Route::get('/destroy/{id}', 	[App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('roles.destroy');
            Route::get('/status_update', 	[App\Http\Controllers\Admin\RoleController::class, 'status_update'])->name('roles.status_update');
        });

        Route::prefix('permissions')->group(function(){
            Route::get('/index', 			[App\Http\Controllers\Admin\PermissionController::class, 'index'])->name('permissions.index');
            Route::get('/create', 			[App\Http\Controllers\Admin\PermissionController::class, 'create'])->name('permissions.create');
            Route::post('/store', 			[App\Http\Controllers\Admin\PermissionController::class, 'store'])->name('permissions.store');
            Route::get('/edit/{id}', 		[App\Http\Controllers\Admin\PermissionController::class, 'edit'])->name('permissions.edit');
            Route::post('/update/{id}', 	[App\Http\Controllers\Admin\PermissionController::class, 'update'])->name('permissions.update');
            Route::get('/destroy/{id}', 	[App\Http\Controllers\Admin\PermissionController::class, 'destroy'])->name('permissions.destroy');
            Route::get('/status_update', 	[App\Http\Controllers\Admin\PermissionController::class, 'status_update'])->name('permissions.status_update');
        });

        Route::prefix('currencies')->group(function(){
            Route::get('/index', 			[App\Http\Controllers\Admin\CurrencyController::class, 'index'])->name('currencies.index');
            Route::get('/create', 			[App\Http\Controllers\Admin\CurrencyController::class, 'create'])->name('currencies.create');
            Route::post('/store', 			[App\Http\Controllers\Admin\CurrencyController::class, 'store'])->name('currencies.store');
            Route::get('/edit/{id}', 		[App\Http\Controllers\Admin\CurrencyController::class, 'edit'])->name('currencies.edit');
            Route::post('/update/{id}', 	[App\Http\Controllers\Admin\CurrencyController::class, 'update'])->name('currencies.update');
            Route::get('/destroy/{id}', 	[App\Http\Controllers\Admin\CurrencyController::class, 'destroy'])->name('currencies.destroy');
            Route::get('/status_update', 	[App\Http\Controllers\Admin\CurrencyController::class, 'status_update'])->name('currencies.status_update');
        });

        Route::prefix('settings')->group(function(){
            Route::get('/file-manager/index', 	[App\Http\Controllers\Admin\FileManagerController::class, 'index'])->name('filemanager.index');

            Route::prefix('site-settings')->group(function(){
                Route::get('/edit', 		    [App\Http\Controllers\Admin\SettingController::class, 'edit'])->name('settings.website.edit');
                Route::post('/update/{id}', 	[App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.website.update');
            });
            
        });

    });
});
