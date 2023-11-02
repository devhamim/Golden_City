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
use App\Http\Controllers\NidCOntroller;
use App\Http\Controllers\PaymentGatewayController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\DepositController as UserDepositController;
use App\Http\Controllers\User\PackageController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\WithdrawController as UserWithdrawController;
use App\Http\Controllers\UserAllBonus;
use App\Http\Controllers\VateSetController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // admin route
    Route::middleware(['isAdmin'])->group(function () {
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
        // member route start
        Route::get('/member/add', [MemberController::class, 'add_member'])->name('add.member');
        Route::get('/member/package/list', [MemberController::class, 'member_packge_list'])->name('member.packge.list');
        Route::post('/member/package/store', [MemberController::class, 'member_packge_store'])->name('member.packge.store');
        Route::get('/banned/member', [MemberController::class, 'banned_member'])->name('banned.member');
        // Route::get('/member/account/verified', [MemberController::class, 'member_account_verified'])->name('member.account.verified');
        Route::get('/member/bonus', [MemberController::class, 'member_bonus'])->name('member.bonus');

        // deposit route start
        Route::get('/admin/deposit', [DepositController::class, 'admin_deposit'])->name('admin.deposit');
        Route::get('/deposite/request', [DepositController::class, 'deposite_request'])->name('deposite.request');
        Route::post('/deposite/request/status', [DepositController::class, 'deposite_request_status'])->name('deposite.request.status');
        Route::get('/deposite/reject', [DepositController::class, 'deposite_reject'])->name('deposite.reject');

        // withdraw route start
        Route::get('/admin/withdraw', [WithdrawController::class, 'admin_withdraw'])->name('admin.withdraw');
        Route::get('/admin/withdraw/request', [WithdrawController::class, 'admin_withdraw_request'])->name('admin.withdraw.request');
        Route::get('/admin/withdraw/commission', [WithdrawController::class, 'admin_withdraw_commission'])->name('admin.withdraw.commission');
        Route::get('/admin/withdraw/reject', [WithdrawController::class, 'admin_withdraw_reject'])->name('admin.withdraw.reject');
        Route::get('/stop/withdraw', [WithdrawController::class, 'stop_withdraw'])->name('stop.withdraw');
        Route::get('/stop/all/withdraw', [WithdrawController::class, 'stop_all_withdraw'])->name('stop.all.withdraw');
        Route::get('/withdraw/vat/set', [WithdrawController::class, 'withdraw_vat_set'])->name('withdraw.vat.set');

        // news route start
        Route::get('/update/news', [NewsController::class, 'update_news'])->name('update.news');
        Route::get('/news/promotion', [NewsController::class, 'news_promotion'])->name('news.promotion');
        Route::get('/fake/news', [NewsController::class, 'fake_news'])->name('fake.news');

        // set route start
        Route::get('/daily/bonus/set', [SetController::class, 'daily_bonus_set'])->name('daily.bonus.set');
        Route::post('/daily/bonus/set/update', [SetController::class, 'daily_bonus_set_update'])->name('daily.bonus.set.update');
        Route::post('/set/update', [SetController::class, 'set_update'])->name('set.update');


        Route::get('/transfer/vat/set', [SetController::class, 'transfer_vat_set'])->name('transfer.vat.set');
        Route::get('/withdraw/vat/set', [SetController::class, 'withdraw_vat_set'])->name('withdraw.vat.set');

        // bonus set
        Route::get('/bonus/set', [SetController::class, 'bonus_set'])->name('bonus.set');

        // tree soute start
        Route::get('/tree/hide/show', [TreeController::class, 'tree_hide_show'])->name('tree.hide.show');
        Route::post('/tree/config', [TreeController::class, 'tree_config'])->name('tree.config');

        // access route start
        Route::get('/user/bkash/access', [AccessController::class, 'user_bkash_access'])->name('user.bkash.access');

        // settings route start
        Route::get('/account/setting', [SettingController::class, 'account_setting'])->name('account.setting');
        Route::get('/password/change', [SettingController::class, 'password_change'])->name('password.change');

        Route::get('nid/request', [NidCOntroller::class, 'nid_request'])->name('nid.request');
        Route::post('/nid/request/status', [NidCOntroller::class, 'nid_request_status'])->name('nid.request.status');
        Route::get('/nid/verified', [NidCOntroller::class, 'nid_verified'])->name('nid.verified');
        Route::get('/nid/rejected', [NidCOntroller::class, 'nid_rejected'])->name('nid.rejected');
        Route::get('/verified/member/profile/{id}', [NidCOntroller::class, 'verified_member_profile'])->name('verified.member.profile');
        Route::post('user/profile/status/update', [NidCOntroller::class, 'user_profile_status_update'])->name('user.profile.status.update');
        Route::post('user/profile/banned/status', [NidCOntroller::class, 'user_profile_banned_status'])->name('user.profile.banned.status');
        Route::post('user/profile/withdraw/status', [NidCOntroller::class, 'user_profile_withdraw_status'])->name('user.profile.withdraw.status');


        // all users withdraw stop
        Route::post('/all/withdraw/status', [WithdrawController::class, 'all_withdraw_status'])->name('all.withdraw.status');
    });

    // tree
    Route::get('user/tree/access', [AccessController::class, 'user_tree_access'])->name('user.tree.access');
    // user all route *****

    // Route::get('/user/dashboard', [UserHomeController::class, 'user_dashboard'])->name('user.dashboard');
    Route::get('/user/transfer/list', [UserWithdrawController::class, 'transfer_list'])->name('user.transfer.list');
    Route::post('/user/transfer/request', [UserWithdrawController::class, 'transfer_request'])->name('user.transfer.request');

    // deposit route start
    Route::get('/user/deposit', [UserDepositController::class, 'user_deposit'])->name('user.deposit');
    Route::post('/user/deposit/request', [UserDepositController::class, 'deposit_request'])->name('user.deposit.request');

    //  Payment Gateway route start
    Route::get('/admin/payment/gateway', [PaymentGatewayController::class, 'admin_payment_gateway'])->name('admin.payment.gateway');
    Route::post('/admin/payment/gateway/add', [PaymentGatewayController::class, 'admin_payment_gateway_add'])->name('admin.payment.gateway.add');
    Route::get('/payment/gateway/edit/{id}', [PaymentGatewayController::class, 'payment_gateway_edit'])->name('payment.gateway.edit');
    Route::post('/payment/gateway/upddate', [PaymentGatewayController::class, 'payment_gateway_upddate'])->name('payment.gateway.upddate');
    //  Payment Gateway route end
    
    //  Payment Gateway route start
    Route::get('/admin/vate/set', [VateSetController::class, 'admin_vate_set'])->name('admin.vate.set');
    Route::post('/admin/vate/set/add', [VateSetController::class, 'admin_vate_set_add'])->name('admin.vate.set.add');

    //  Payment Gateway route end

    // withdraw route start
    Route::get('/user/withdraw', [UserWithdrawController::class, 'user_withdraw'])->name('user.withdraw');
    Route::post('/user/withdraw/request', [UserWithdrawController::class, 'user_withdraw_request'])->name('user.withdraw.request');

    // package route start
    Route::get('/active/package', [PackageController::class, 'active_package'])->name('active.package');
    Route::get('/user/package/list', [PackageController::class, 'user_package_list'])->name('user.package.list');
    Route::get('/user/package/purchase/{id}', [PackageController::class, 'user_package_purchase'])->name('user.package.purchase');

    //tree
    // Route::get('user/tree/access', [AccessController::class, 'user_tree_access'])->name('user.tree.access');

    // account route start
    Route::get('/account/verified', [AccountController::class, 'account_verified'])->name('account.verified');
    Route::post('user/nid/store', [AccountController::class, 'user_nid_store'])->name('user.nid.store');

    // profile route start
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'profile_update'])->name('profile.update');
    Route::post('/set/pin', [ProfileController::class, 'set_pin'])->name('set.pin');
    Route::post('/pin/update', [ProfileController::class, 'pin_update'])->name('pin.update');
    Route::post('/change/password', [ProfileController::class, 'change_password'])->name('change.password');

    //All Bonus History
    Route::get('/user/daily/bonus', [UserAllBonus::class, 'daily'])->name('user.daily.bonus');
    Route::get('/user/refferal/bonus', [UserAllBonus::class, 'refferal'])->name('user.refferal.bonus');
    Route::get('/user/generation/bonus', [UserAllBonus::class, 'generation'])->name('user.generation.bonus');
    Route::get('/user/matching/bonus', [UserAllBonus::class, 'matching'])->name('user.matching.bonus');
});

//Registation
Route::post('/user/stores', [RegisterController::class, 'store']);
