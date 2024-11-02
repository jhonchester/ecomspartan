<?php

use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductAttribute;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Customer\CustomerMainController;
use App\Http\Controllers\MasterCategoryController;
use App\Http\Controllers\MasterSubCategoryController;
use App\Http\Controllers\Admin\StoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});




//adminroutes
Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function (){
        Route::controller(AdminMainController::class)->group(function(){
            Route::get('/admindashboard', 'index')->name('admindashboard');
            Route::get('/settings', 'setting')->name('admin.settings');
            Route::get('/manage/user', 'manage_user')->name('admin.manage.user');
            Route::get('/manage/store', 'manage_store')->name('admin.manage.store');
            Route::get('/cart/history', 'cart_history')->name('admin.cart.history');
            Route::get('/order/history', 'order_history')->name('admin.order.history');
        });

        Route::controller(CategoryController::class)->group(function(){
            Route::get('/category/create', 'index')->name('category.create');
            Route::get('/category/manage', 'manage')->name('category.manage');
        });

        Route::controller(SubCategoryController::class)->group(function(){
            Route::get('/subcategory/create', 'index')->name('subcategory.create');
            Route::get('/subcategory/manage', 'manage')->name('subcategory.manage');
        });

        Route::controller(ProductController::class)->group(function(){
            Route::get('/product/manage', 'index')->name('product.manage');
            Route::get('/product/review/manage', 'review_manage')->name('product.review.manage');
        });

        Route::controller(StoreController::class)->group(function(){
            Route::get('/store/create', 'index')->name('store.create'); // This is correct
            Route::get('/store/manage', 'storemanage')->name('store.manage'); 
            Route::post('/store/publish', 'store')->name('create.store'); // This is correct
        });
    
        Route::controller(ProductAttribute::class)->group(function(){
            Route::get('/productattribute/create', 'index')->name('productattribute.create');
            Route::get('/productattribute/manage', 'manage')->name('productattribute.manage');
            Route::post('/defaultattribute/create', 'createattribute')->name('attribute.create');
            Route::get('/defaultattribute/{id}', 'showattribute')->name('show.attribute');
            Route::put('/defaultattribute/update/{id}', 'updateattribute')->name('update.attribute');
            Route::delete   ('/defaultattribute/delete/{id}', 'deleteattribute')->name('delete.attribute');
        });
        Route::controller(MasterCategoryController::class)->group(function(){
            Route::post('/store/category', 'storecat')->name('store.cat');
            Route::get('/category/{id}', 'showcat')->name('show.cat');
            Route::put('/category/update/{id}', 'updatecat')->name('update.cat');
            Route::delete   ('/category/delete/{id}', 'deletecat')->name('delete.cat');
        });
        Route::controller(MasterSubCategoryController::class)->group(function(){
            Route::post('/store/subcategory', 'storesubcat')->name('store.subcat');
            Route::get('/subcategory/{id}', 'showsubcat')->name('show.subcat');
            Route::put('/subcategory/update/{id}', 'updatesubcat')->name('update.subcat');
            Route::delete   ('/subcategory/delete/{id}', 'deletesubcat')->name('delete.subcat');
        });

    });
});



//customerroutes
    Route::middleware(['auth', 'verified', 'rolemanager:user'])->group(function () {
        Route::prefix('user')->group(function (){
            Route::controller(CustomerMainController::class)->group(function(){
                Route::get('/dashboard', 'index')->name('dashboard');
                Route::get('/order/history', 'history')->name('customer.history');
                Route::get('/setting/payment', 'payment')->name('customer.payment');
            });
        });
    });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
