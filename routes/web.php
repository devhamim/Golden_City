<?php

use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\WithdrawController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

// member route start 
Route::get('/member/add', [MemberController::class, 'add_member'])->name('add.member');
Route::get('/member/packge/list', [MemberController::class, 'member_packge_list'])->name('member.packge.list');
Route::get('/banned/member', [MemberController::class, 'banned_member'])->name('banned.member');
Route::get('/member/account/verified', [MemberController::class, 'member_account_verified'])->name('member.account.verified');
Route::get('/member/bonus', [MemberController::class, 'member_bonus'])->name('member.bonus');
// member route end 

// deposit route start
Route::get('/admin/deposit', [DepositController::class, 'admin_deposit'])->name('admin.deposit');
Route::get('/deposite/request', [DepositController::class, 'deposite_request'])->name('deposite.request');
Route::get('/deposite/reject', [DepositController::class, 'deposite_reject'])->name('deposite.reject');
// deposit route end

// withdraw route start 
Route::get('/admin/withdraw', [WithdrawController::class, 'admin_withdraw'])->name('admin.withdraw');
Route::get('/admin/withdraw/request', [WithdrawController::class, 'admin_withdraw_request'])->name('admin.withdraw.request');
Route::get('/admin/withdraw/commission', [WithdrawController::class, 'admin_withdraw_commission'])->name('admin.withdraw.commission');
Route::get('/admin/withdraw/reject', [WithdrawController::class, 'admin_withdraw_reject'])->name('admin.withdraw.reject');
Route::get('/stop/withdraw', [WithdrawController::class, 'stop_withdraw'])->name('stop.withdraw');
Route::get('/stop/all/withdraw', [WithdrawController::class, 'stop_all_withdraw'])->name('stop.all.withdraw');
Route::get('/withdraw/vat/set', [WithdrawController::class, 'withdraw_vat_set'])->name('withdraw.vat.set');
// withdraw route end


// news route start
Route::get('/update/news', [NewsController::class, 'update_news'])->name('update.news'); 
Route::get('/news/promotion', [NewsController::class, 'news_promotion'])->name('news.promotion'); 
// news route end
