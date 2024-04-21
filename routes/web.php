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
use App\Http\Middleware\isCustomer;

// authentications
use App\Livewire\Authentication\Login;
use App\Livewire\Authentication\Logout as AuthenticationLogout;

// admin
use App\Livewire\Admin\Dashboard\Dashboard as AdminDashboard;
use App\Livewire\Admin\Orders\ProductOrders\ProductOrders  as AdminProductOrders; 
use App\Livewire\Admin\Products\Color\Color as AdminProductColor;
use App\Livewire\Admin\Products\Productlist\Productlist  as AdminProductlist;
use App\Livewire\Admin\Products\Sizes\Sizes as AdminProductSizes;
use App\Livewire\Admin\Profile\Profile\Profile as AdminProfile;
use App\Livewire\Admin\Services\Approvedservices\Approvedservices as AdminApprovedservices;
use App\Livewire\Admin\Services\Completedservices\Completedservices as AdminCompletedservices;
use App\Livewire\Admin\Services\Pendingservices\Pendingservices as AdminPendingservices;
use App\Livewire\Admin\Services\Servicelist\Servicelist as AdminServicelist;
use App\Livewire\Admin\Stocks\Stocklist\Stocklist as AdminStocklist;
use App\Livewire\Admin\Stocks\StockInRecords\StockInRecords as AdminStockInRecords;
use App\Livewire\Admin\Stocks\StockOutRecords\StockOutRecords as AdminStockOutRecords;
use App\Livewire\Admin\Transactions\Transactionrecords\Transactionrecords as AdminTransactionrecords;
use App\Livewire\Admin\Users\Admin\Admin as AdminUsers;
use App\Livewire\Admin\Users\Customers\Customers as AdminCustomers;
use App\Livewire\Admin\Users\Staff\Staff as AdminStaff;

// customer
use App\Livewire\Customer\Cart\Cart as CustomerCart;
use App\Livewire\Customer\Contact\Contact as CustomerContact;
use App\Livewire\Customer\Dashboard\Dashboard as CustomerDashboard;
use App\Livewire\Customer\OrderList\OrderList as CustomerOrderList;
use App\Livewire\Customer\Products\Products as CustomerProducts;
use App\Livewire\Customer\Profile\Profile as CustomerProfile;
use App\Livewire\Customer\Services\Services as CustomerServices;
use App\Livewire\Customer\TrackOrder\TrackOrder as CustomerTrackOrder;

// pages
use App\Livewire\Page\About\About;
use App\Livewire\Page\Contact\Contact;
use App\Livewire\Page\Homepage\Homepage; 
use App\Livewire\Page\Products\Products;
use App\Livewire\Page\Services\Services;
use App\Livewire\Page\LatestProduct\LatestProduct;

Route::middleware([CheckRoles::class])->group(function () {
    Route::get('/about',About::class)->name('page-about');
    Route::get('/contact',Contact::class)->name('page-contact');
    Route::get('/',Homepage::class)->name('page-homepage');
    Route::get('/products',Products::class)->name('page-products');
    Route::get('/services',Services::class)->name('page-services');
    Route::get('/product/latest',LatestProduct::class)->name('page-latest-product');
    
});

Route::get('/logout', AuthenticationLogout::class)->middleware(Logout::class)->name('logout');

Route::middleware([Authenticated::class])->group(function () {
    Route::get('/login', Login::class)->name('login');
});


Route::middleware([Unauthenticated::class,IsAdmin::class])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', AdminDashboard::class)->name('admin-dashboard');
        Route::get('profile', AdminProfile::class)->name('admin-profile');

        Route::prefix('stock')->group(function () {
            Route::get('stocklist', AdminStocklist::class)->name('admin-stocklist'); 
            Route::get('stockinrecords', AdminStockInRecords::class)->name('admin-stock-in-records'); 
            Route::get('stockoutrecords', AdminStockOutRecords::class)->name('admin-stock-out-records'); 
        });
        Route::prefix('products')->group(function () {
            Route::get('product-list', AdminProductlist::class)->name('admin-product-list'); 
            Route::get('product-size', AdminProductSizes::class)->name('admin-product-size'); 
            Route::get('product-color', AdminProductColor::class)->name('admin-product-color'); 
        });
        Route::prefix('user')->group(function () {
            Route::get('adminusers', AdminUsers::class)->name('admin-user-admin');
            Route::get('staffusers', AdminStaff::class)->name('admin-user-staff');
            Route::get('customerusers', AdminCustomers::class)->name('admin-user-customer');
        });

        Route::prefix('transactions')->group(function () {
            Route::get('transactionrecord',AdminTransactionrecords::class)->name('admin-transactionrecords');
        });

        Route::prefix('orders')->group(function () {
            Route::get('product-orders',AdminProductOrders::class)->name('admin-product-orders');
        });

        Route::prefix('services')->group(function () {
            Route::get('servicelist',AdminServicelist::class)->name('admin-servicelist');
            Route::get('pendingservices',AdminPendingservices::class)->name('admin-pendingservices');
            Route::get('approvedservices',AdminApprovedservices::class)->name('admin-approvedservices');
            Route::get('completedservices',AdminCompletedservices::class)->name('admin-completedservices');
        });

    });
});



Route::middleware([Unauthenticated::class,isStaff::class])->group(function () {
    Route::prefix('staff')->group(function () {
        Route::get('dashboard', AdminDashboard::class)->name('staff-dashboard');
        Route::get('profile', AdminProfile::class)->name('staff-profile');

    });
});

Route::middleware([Unauthenticated::class,isCustomer::class])->group(function () {
    Route::prefix('customer')->group(function () {
        Route::get('cart', CustomerCart::class)->name('customer-cart');
        Route::get('dashboard', CustomerDashboard::class)->name('customer-dashboard');
        Route::get('orderlist', CustomerOrderList::class)->name('customer-order-list');
        Route::get('products', CustomerProducts::class)->name('customer-product');
        Route::get('profile', CustomerProfile::class)->name('customer-profile');
        Route::get('services', CustomerServices::class)->name('customer-services');
        Route::get('trackorder', CustomerTrackOrder::class)->name('customer-track-order');
        Route::get('/contact',CustomerContact::class)->name('customer-contact');
    });
});

