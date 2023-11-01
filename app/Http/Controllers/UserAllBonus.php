<?php

namespace App\Http\Controllers;

use App\Models\BonusHistory;
use Illuminate\Support\Facades\Auth;

class UserAllBonus extends Controller
{
    function daily()
    {
        $data = BonusHistory::with('package')->where("user_id", Auth::user()->id)->where('bonus_type', 'daily')->get();
        // dd($data->package);
        return view('user.allbonus.daily', [
            'dailys' => $data
        ]);
    }
    function refferal()
    {
        return view('user.allbonus.refferal');
    }
    function generation()
    {
        return view('user.allbonus.generation');
    }
    function matching()
    {
        return view('user.allbonus.matching');
    }
}
