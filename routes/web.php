<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\Theme\DashboardController;

   Route::get('/cache-clear',function(){
      Artisan::call('config:cache');
      Artisan::call('cache:clear');
      return 'Cache is cleared';
   });

   // Route::get('/pass',[LoginController::class,'pass'])->name('pass');

   Route::get('/',[LoginController::class,'adminLoginIndex'])->name('admin.login.form');
   Route::get('/logout',[LoginController::class,'logout'])->name('admin.login.logout');


   Route::group(['prefix' => 'admin'],function(){
      //----- Admin Auth -----
      Route::get('/login',[LoginController::class,'adminLoginIndex'])->name('admin.login.form');
      Route::post('/login',[LoginController::class,'adminLogin'])->name('adminLogin');
     
      Route::group([
         'middleware' => ['admin_auth']
      ],function(){
         Route::get('dashboard',[DashboardController::class,'dashboard']);
         // Route::get('/logout',[LoginController::class,'adminLogout']);
         
         //----- Category -----
         Route::get('category',[CategoryController::class,'index'])->name('indexCategory');
         Route::get('category/add',[CategoryController::class,'indexAddCategory'])->name('indexAddCategory');
         Route::post('category/store',[CategoryController::class,'storeCategory'])->name('storeCategory');
         Route::get('category/edit/{id}',[CategoryController::class,'indexEditCategory']);
         Route::post('category/update',[CategoryController::class,'updateCategory'])->name('updateCategory');
      //    Route::get('category/status',[CategoryController::class,'status'])->name('categoryStatus');
         Route::get('category/delete/{id}',[CategoryController::class,'destroyCategory'])->name('deleteCategory');

            //----- Sub-Category -----
         Route::get('sub-category',[SubCategoryController::class,'index'])->name('indexSubCategory');
         Route::get('sub-category/add',[SubCategoryController::class,'indexAddSubCategory'])->name('indexAddSubCategory');
         Route::post('sub-category/store',[SubCategoryController::class,'storeSubCategory'])->name('storeSubCategory');
         Route::get('sub-category/edit/{id}',[SubCategoryController::class,'indexEditSubCategory']);
         Route::post('sub-category/update',[SubCategoryController::class,'updateSubCategory'])->name('updateSubCategory');
         Route::get('sub-category/delete/{id}',[SubCategoryController::class,'destroySubCategory'])->name('deleteSubCategory');
         Route::get('sub-category-by-category',[SubCategoryController::class,'subcategoryByCategory'])->name('indexSubCategoryByCategory');

            //Product
         Route::get('product', [ProductController::class,'index'])->name('indexProduct');
         Route::get('product/add', [ProductController::class,'indexAddProduct'])->name('indexAddProduct');
         Route::post('product/store', [ProductController::class,'storeProduct'])->name('storeProduct');
         Route::get('product/edit/{id}',[ProductController::class,'indexEditProduct']);
         Route::post('product/update', [ProductController::class,'updateProduct'])->name('updateProduct');
         Route::get('product/delete/{id}', [ProductController::class,'productDelete'])->name('deleteProduct');
         Route::get('product-by-sub-category', [ProductController::class,'productBySubCategory'])->name('productBySubCategory');

         //Stock-Product
         Route::get('/add-stock', [StockController::class,'viewAddStock'])->name('viewAddStock');
         Route::get('/remove-stock', [StockController::class,'viewRemoveStock'])->name('viewRemoveStock');
         Route::post('/store-stock', [StockController::class,'storeStock'])->name('storeStock');
         Route::get("/product-stock", [StockController::class, 'showCurrentStock'])->name('showCurrentStock');
         Route::get("/product-stock-history", [StockController::class, 'showProductStockHistory'])->name('showProductStockHistory');
         Route::get("/product-stock-history-by-date", [StockController::class, 'showProductStockHistoryByDate'])->name('showProductStockHistoryByDate');
         Route::get("/stock/print", [StockController::class, 'printStock'])->name('printStock');
      });
   });


Route::prefix('theme')->group(function(){
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('theme.dashboard');
});
