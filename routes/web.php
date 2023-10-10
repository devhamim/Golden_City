<?php

use App\Http\Controllers\Admin\AccessController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SetController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TreeController;
use App\Http\Controllers\Admin\WithdrawController;
use App\Http\Controllers\User\BalanceController;
use App\Http\Controllers\User\DepositController as UserDepositController;
use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\User\PackageController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\WithdrawController as UserWithdrawController;
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
Route::get('/fake/news', [NewsController::class, 'fake_news'])->name('fake.news');
// news route end

// set route start
Route::get('/daily/bonus/set', [SetController::class, 'daily_bonus_set'])->name('daily.bonus.set'); 
Route::get('/reference/bonus/set', [SetController::class, 'reference_bonus_set'])->name('reference.bonus.set');
Route::get('/transfer/vat/set', [SetController::class, 'transfer_vat_set'])->name('transfer.vat.set');
Route::get('/withdraw/vat/set', [SetController::class, 'withdraw_vat_set'])->name('withdraw.vat.set');
Route::get('/matching/bonus/set', [SetController::class, 'matching_bonus_set'])->name('matching.bonus.set');
// set route end

// tree soute start
Route::get('/tree/hide/show', [TreeController::class, 'tree_hide_show'])->name('tree.hide.show');
// tree soute end


// access route start
Route::get('user/tree/access', [AccessController::class, 'user_tree_access'])->name('user.tree.access'); 
Route::get('/user/bkash/access', [AccessController::class, 'user_bkash_access'])->name('user.bkash.access');
// access route end


// settings route start
Route::get('/account/setting', [SettingController::class, 'account_setting'])->name('account.setting'); 
Route::get('/password/change', [SettingController::class, 'password_change'])->name('password.change');
// settings route end



// user all route *****

Route::get('/user/dashboard', [UserHomeController::class, 'user_dashboard'])->name('user.dashboard');

// deposit route start
Route::get('/user/deposit', [UserDepositController::class, 'user_deposit'])->name('user.deposit');
// deposit route end

// withdraw route start
Route::get('/user/withdraw', [UserWithdrawController::class, 'user_withdraw'])->name('user.withdraw'); 
// withdraw route end

// package route start
Route::get('/active/package', [PackageController::class, 'active_package'])->name('active.package'); 
// package route end

// balance route start
Route::get('/balance/transfer', [BalanceController::class, 'balance_transfer'])->name('balance.transfer'); 
// balance route end

// route for user start
Route::get('/user/info', [UserController::class, 'user_info'])->name('user.info');
Route::get('/account/verified', [UserController::class, 'account_verified'])->name('account.verified');
Route::get('/upgrade/account', [UserController::class, 'upgrade_account'])->name('upgrade.account');
Route::get('/pin/code', [UserController::class, 'pin_code'])->name('pin.code');
Route::get('/password/change', [UserController::class, 'password_change'])->name('password.change');
Route::get('/user/profile', [UserController::class, 'user_profile'])->name('user.profile');
Route::get('/edit/user/profile', [UserController::class, 'edit_user_profile'])->name('edit.user.profile');
// route for user end