<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\normalUserController;
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

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';





//middleware 

Route::middleware(['auth','role:admin'])->group(function(){
Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/logout/admin',[AdminController::class,'Logout'])->name('admin.logout');
Route::get('/customer/orders',[AdminController::class,'Orders'])->name('customer.orders');
Route::get('/delete/orders/{id}',[AdminController::class,'Deleteorder'])->name('delete.order');
Route::get('/edit/orders', [AdminController::class, 'Editorder'])->name('orderdetails');
Route::post('/update/orders', [AdminController::class, 'UpdateOrder'])->name('updateorder');
Route::get('/poultry/customers', [AdminController::class, 'Customers'])->name('customers');
Route::get('/pending/orders', [AdminController::class, 'PendingOrders'])->name('pending.orders');
Route::get('/all/sales', [AdminController::class, 'Allsales'])->name('all.sales');
Route::get('/all/inventory', [AdminController::class, 'AllInventory'])->name('all.inventory');
Route::post('/add/inventory',[AdminController::class,'Addinventory'])->name('add.inventory');
Route::get('/delete/product/{id}', [AdminController::class,'Deleteproduct'])->name('delete.product');

});


Route::middleware(['auth','role:user'])->group(function(){
    Route::get('/user/dashboard', [normalUserController::class, 'userDashboard'])->name('user.dashboard');

});