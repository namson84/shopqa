<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\TypeaheadAutocompleteController;
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

Route::get('/', function () {
    return view('welcome');
});
// Read 
Route::get('/', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('/khachhang/forgetpass', function(){
    return view('khachhang.forgetpass');
});
Route::post('/khachhang/forgetpass', [App\Http\Controllers\KhachHangController::class, 'forgetpass']);

//cuahang

Route::get('/cuahang', [App\Http\Controllers\ProductController::class, 'shop']);
Route::get('/cuahang/{key}', [App\Http\Controllers\ProductController::class, 'shop2']);

// goi y timkiem
Route::get('/action', [ProductController::class, 'action'])->name('action');
Route::get('/cuahang/action', [ProductController::class, 'action'])->name('cuahang.action');
Route::get('/chitiet/action', [ProductController::class, 'action'])->name('chitiet.action');

//login admin
Route::get('admin/login', function () {
    $message = null;
    return view('admin.login', compact('message'));   
});
Route::post('/admin/login', [App\Http\Controllers\ProductController::class, 'login']);
Route::get('/admin/logout', [App\Http\Controllers\ProductController::class, 'logout']);
Route::get('/admin/khachhang/delete/{MaKH}', [App\Http\Controllers\ProductController::class,'deleteKH']);
Route::get('/admin/comment/delete/{MaCMT}', [App\Http\Controllers\ProductController::class,'deleteCMT']);

//chitiet
Route::get('/chitiet/{MaSP}', [App\Http\Controllers\ProductController::class, 'chitiet']);

//Create
Route::get('/admin/create', [App\Http\Controllers\ProductController::class, 'create']);
Route::post('/admin/create', [App\Http\Controllers\ProductController::class, 'store']);
//admin
Route::get('admin', [App\Http\Controllers\ProductController::class, 'admin']);
// Update 
Route::get('/admin/update/{MaSP}', [App\Http\Controllers\ProductController::class, 'edit']);
Route::post('/admin/update/{MaSP}', [App\Http\Controllers\ProductController::class, 'update']);
// Delete 
Route::get('/admin/delete/{MaSP}', [App\Http\Controllers\ProductController::class, 'delete']);

//KHACH HANG
Route::get('/khachhang/dangky', function () {  
    return view('khachhang.dangky');   
});
//d??ng k??
Route::post('/khachhang/dangky', [App\Http\Controllers\KhachHangController::class, 'dangky']);
Route::get('/khachhang/xacnhan', function () {  
    return view('khachhang.xacnhan'); 
});
Route::post('/khachhang/xacnhan', [App\Http\Controllers\KhachHangController::class, 'xacnhan']);
//dang nhap
Route::post('/', [App\Http\Controllers\KhachHangController::class, 'dangnhap']);


Route::get('/khachhang/changepass/{MaKH}', [App\Http\Controllers\KhachHangController::class, 'changepass']);
Route::post('/khachhang/changepass/{MaKH}', [App\Http\Controllers\KhachHangController::class, 'update_pass']);

Route::get('/khachhang/dangxuat', [App\Http\Controllers\KhachHangController::class, 'dangxuat']);
//info
Route::get('/khachhang/info/{MaKH}', [App\Http\Controllers\KhachHangController::class, 'info']);
Route::post('/khachhang/update/{MaKH}', [App\Http\Controllers\KhachHangController::class, 'update_info']);

//Li??n h???
Route::get('/lienhe', function () {
    return view('lienhe');
});

//COMMENT
Route::post('/chitiet/{MaSP}&{MaKH}', [App\Http\Controllers\KhachHangController::class, 'add_cmt']);

// gio hang
Route::get('/khachhang/giohang', [App\Http\Controllers\KhachHangController::class, 'giohang']);
Route::get('/khachhang/giohang/{MaSP}', [App\Http\Controllers\KhachHangController::class, 'muahang']);
Route::get('/khachhang/giohang/delete', [App\Http\Controllers\KhachHangController::class, 'delete']);