<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\normalUserController;
use App\Http\Controllers\RoleController;
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
Route::get('/get/product', [AdminController::class,'Getproduct'])->name('getproduct');
Route::post('/update/product',[AdminController::class,'UpdateInventory'])->name('update.inventory');
Route::get('/all/products',[AdminController::class,'Allproducts'])->name('allproducts');
Route::get('/price',[AdminController::class,'Getprice'])->name('getprice');
Route::get('/getquantity',[AdminController::class,'getQuantity'])->name('getquantity');
Route::post('/add/orders',[AdminController::class,'Addorder'])->name('addorder');

Route::get('/all/productdata',[AdminController::class,'ProductData'])->name('product.data');
Route::post('/add/sales',[AdminController::class,'AddSales'])->name('add.sales');
Route::get('/delete/sale/{id}',[AdminController::class,'Deletesale'])->name('delete.sale');
Route::get('/system/users',[AdminController::class,'Systemusers'])->name('system.users');
Route::post('/add/users',[AdminController::class,'Adduser'])->name('add.admin');
Route::get('/edit/users',[AdminController::class,'Editusers'])->name('edit.users');


//roles and permission
Route::get('all/permission',[RoleController::class,'Allpermission'])->name('all.permission');
Route::post('add/permission',[RoleController::class,'Addpermission'])->name('add.permission');

Route::get('delete/permission/{id}',[RoleController::class,'Deletepermission'])->name('delete.permission');
Route::get('get/permission/',[RoleController::class,'Getpermission'])->name('get.permission');

Route::get('all/roles',[RoleController::class,'AllRoles'])->name('all.roles');
Route::post('add/role',[RoleController::class,'Addrole'])->name('add.role');
Route::get('delete/role/{id}',[RoleController::class,'Deleterole'])->name('delete.role');
Route::get('add/roles&permissions',[RoleController::class,'Addrolespermission'])->name('add.roles&permissions');
Route::post('store/role/permission',[RoleController::class,'Storerolepermission'])->name('store.permission.role');
Route::get('all/roles&permission',[RoleController::class,'Allrolespermission'])->name('all.roles&permisssion');

Route::get('edit/permissionrole/{id}',[RoleController::class,'Editpermissionrole'])->name('edit.permissionrole');
Route::post('update/role/permission/{id}',[RoleController::class,'Updaterolepermission'])->name('update.permission.role');

Route::get('delete/permissionrole/{id}',[RoleController::class,'Deletepermissionrole'])->name('delete.permissionrole');









});


Route::middleware(['auth','role:user'])->group(function(){
    Route::get('/user/dashboard', [normalUserController::class, 'userDashboard'])->name('user.dashboard');
    

});