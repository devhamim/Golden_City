<?php

namespace App\Http\Controllers;

use App\Models\ActivePackage;
use App\Models\User;
use App\Models\Wallet;
use Calculate;
use Illuminate\Support\Facades\Auth;
use MLM;
use PhpParser\Node\Expr\CallLike;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(Calculate::MatchingIcome(1));

        //Test
        $transaction = Wallet::with('user')->where('receiver_id', Auth::user()->id)->orWhere('sender_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        $activePackage = ActivePackage::where('user_id', Auth::user()->id)->get();
        return view('admin.home.home', [
            'balance'        => Calculate::Balance(),
            'transactions'   => $transaction,
            'packages'       => $activePackage,
        ]);
        // return view('home');
        // return view('admin.home.home');
    }
}
