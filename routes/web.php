<?php

use Illuminate\Support\Facades\Route;


//middlewares
use App\Http\Middleware\Authenticated;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsValid;
use App\Http\Middleware\Logout;
use App\Http\Middleware\Unauthenticated;
use App\Http\Middleware\CheckRoles;
use App\Http\Middleware\isStaff;

// authentications
use App\Livewire\Authentication\Login;
use App\Livewire\Authentication\Logout as AuthenticationLogout;

// admin
use App\Livewire\Admin\Dashboard\Dashboard as AdminDashboard;
use App\Livewire\Admin\Orders\ProductOrders\ProductOrders;
use App\Livewire\Admin\Products\Color\Color as ProductColor;
use App\Livewire\Admin\Products\Productlist\Productlist;
use App\Livewire\Admin\Products\Sizes\Sizes as ProductSizes;
use App\Livewire\Admin\Profile\Profile\Profile as AdminProfile;
use App\Livewire\Admin\Services\Approvedservices\Approvedservices;
use App\Livewire\Admin\Services\Completedservices\Completedservices;
use App\Livewire\Admin\Services\Pendingservices\Pendingservices;
use App\Livewire\Admin\Services\Servicelist\Servicelist;
use App\Livewire\Admin\Stocks\Stocklist\Stocklist;
use App\Livewire\Admin\Stocks\Stockrecords\Stockrecords;
use App\Livewire\Admin\Transactions\Transactionrecords\Transactionrecords;
use App\Livewire\Admin\Users\Admin\Admin as AdminUsers;
use App\Livewire\Admin\Users\Customers\Customers as AdminCustomers;
use App\Livewire\Admin\Users\Staff\Staff as AdminStaff;
// pages
use App\Livewire\Page\Homepage\Homepage; 

Route::middleware([CheckRoles::class])->group(function () {
    Route::get('/',Homepage::class)->name('homepage-homepage');
});

Route::get('/logout', AuthenticationLogout::class)->middleware(Logout::class)->name('logout');

Route::middleware([Authenticated::class])->group(function () {
    Route::get('/login', Login::class)->name('login');
});


Route::middleware([Unauthenticated::class,IsAdmin::class])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', AdminDashboard::class)->name('admin-dashboard');
        Route::get('profile', AdminProfile::class)->name('admin-profile');

        Route::prefix('user')->group(function () {
            Route::get('adminusers', AdminUsers::class)->name('admin-user-admin');
            Route::get('staffusers', AdminStaff::class)->name('admin-user-staff');
            Route::get('customerusers', AdminCustomers::class)->name('admin-user-customer');
        });
    });
});

Route::middleware([Unauthenticated::class,isStaff::class])->group(function () {
    Route::prefix('staff')->group(function () {
        Route::get('dashboard', AdminDashboard::class)->name('staff-dashboard');
        Route::get('profile', AdminProfile::class)->name('staff-profile');

    });
});

