<?php

namespace App\Http\Controllers;

use App\Models\BonusHistory;
use Illuminate\Support\Facades\Auth;

class UserAllBonus extends Controller
{
    function daily()
    {
        $data = BonusHistory::where("user_id", Auth::user()->id)->where('bonus_type', 'daily')->get();
        return view('user.allbonus.daily', [
            'dailys' => $data
        ]);
    }
    function refferal()
    {
        $data = BonusHistory::where("user_id", Auth::user()->id)->where('bonus_type', 'refferal')->get();
        return view('user.allbonus.refferal', [
            'refferals' => $data
        ]);
    }
    function generation()
    {
        $data = BonusHistory::where("user_id", Auth::user()->id)->where('bonus_type', 'generation')->get();
        return view('user.allbonus.generation', [
            'generations' => $data
        ]);
    }
    function matching()
    {
        $data = BonusHistory::where("user_id", Auth::user()->id)->where('bonus_type', 'matching')->get();
        return view('user.allbonus.matching', [
            'matchings' => $data
        ]);
    }
}
