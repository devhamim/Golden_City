<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ActivePackage;
use App\Models\Wallet;
use Calculate;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function user_dashboard()
    {
        $transaction = Wallet::with('user')->where('receiver_id', Auth::user()->id)->orWhere('sender_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        $activePackage = ActivePackage::where('user_id', Auth::user()->id)->get();
        return view('user.home.dashboard', [
            'balance'        => Calculate::Balance(),
            'transactions'   => $transaction,
            'packages'       => $activePackage,
        ]);
    }
}
