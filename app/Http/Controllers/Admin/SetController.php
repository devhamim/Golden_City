<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BonusSets;
use App\Models\GenerationSet;
use App\Models\MatchingBonusSet;
use App\Models\ReferenceBonusSet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SetController extends Controller
{

    
    function bonus_set()
    {
        $requests = BonusSets::all();
        return view('admin.bonus_set.bonusset', compact('requests'));
    }


    // function daily_bonus_set()
    // {
    //     $daily_bonus = DailyBonusSet::first();
    //     // return $daily_bonus;
    //     return view('admin.set.daily_bonus_set', compact('daily_bonus'));
    // }
    function daily_bonus_set_update(Request $request)
    {
        $total_wallet = $request->c_wallet + $request->r_wallet + $request->s_wallet; //Count total

        if ($total_wallet > 101) { //checking limit
            // return 'Max wallet value is 100%';
            return back()->with(['err' => 'Max wallet value is 100%']);
        } else {
            $validated = $request->validate([
                'bonus_type'    => 'required',
                'bonus'         => 'required|max:99|numeric',
                'c_wallet'      => 'numeric',
                'r_wallet'      => 'numeric',
                's_wallet'      => 'numeric',
            ]);

            if (BonusSets::where('bonus_type', $request->bonus_type)->exists()) {
                return back()->with(['err' => 'You can not insert same item twice']);
            }

            $bonus = new BonusSets();
            $bonus->bonus_type  = $request->bonus_type;
            $bonus->bonus       = $request->bonus;
            $bonus->c_wallet    = $request->c_wallet;
            $bonus->r_wallet    = $request->r_wallet;
            $bonus->s_wallet    = $request->s_wallet;
            $bonus->save();
            return back()->with(['succ' => 'Bonus sets added']);
        }
    }
    
    function set_update(Request $request){
        $total_wallet = $request->c_wallet + $request->r_wallet + $request->s_wallet;
        if ($total_wallet > 101) { //checking limit
            return back()->with(['err' => 'Max wallet value is 100%']);
        } else {
            $validated = $request->validate([
                'bonus'         => 'required|max:99|numeric',
                'c_wallet'      => 'numeric',
                'r_wallet'      => 'numeric',
                's_wallet'      => 'numeric',
            ]);

            BonusSets::find($request->id)->update([
                'bonus'       => $request->bonus,
                'c_wallet'    => $request->c_wallet,
                'r_wallet'    => $request->r_wallet,
                's_wallet'    => $request->s_wallet,
            ]);
            return back()->with(['succ' => 'Bonus sets added']);
        }
    }

    function reference_bonus_set()
    {
        $reference_bonus_set = ReferenceBonusSet::first();
        return view('admin.set.reference_bonus_set', compact('reference_bonus_set'));
    }
    function reference_bonus_set_update(Request $request)
    {
        $total_wallet = $request->c_wallet + $request->r_wallet + $request->s_wallet;
        if ($total_wallet > 101) {
            return 'Max wallet value is 100%';
        } else {
            $validated = $request->validate([
                'bonus' => 'required|max:99|numeric',
                'c_wallet' => 'numeric',
                'r_wallet' => 'numeric',
                's_wallet' => 'numeric',
            ]);
            ReferenceBonusSet::where('id', $request->reference_bonus_set_id)->update([
                'bonus' => $request->bonus,
                'c_wallet' => $request->c_wallet,
                'r_wallet' => $request->r_wallet,
                's_wallet' => $request->s_wallet,
                'updated_at' => Carbon::now(),
            ]);
            return back();
        }
    }
    function generation_set()
    {
        $generation_set = GenerationSet::first();
        return view('admin.set.generation_set', compact('generation_set'));
    }
    function generation_set_update(Request $request)
    {
        $validated = $request->validate([
            'bonus' => 'required|max:99|numeric',
            'c_wallet' => 'numeric',
            'r_wallet' => 'numeric',
            's_wallet' => 'numeric',
        ]);
        $total_wallet = $request->c_wallet + $request->r_wallet + $request->s_wallet;
        $validated = $request->validate([
            'total_wallet' => 'max:100'
        ]);
        if ($total_wallet > 101) {
            return 'Max wallet value is 100%';
        } else {
            GenerationSet::where('id', $request->generation_set_id)->update([
                'bonus' => $request->bonus,
                'c_wallet' => $request->c_wallet,
                'r_wallet' => $request->r_wallet,
                's_wallet' => $request->s_wallet,
                'updated_at' => Carbon::now(),
            ]);
            return back();
        }
    }
    function transfer_vat_set()
    {
        return view('admin.set.transfer_vat_set');
    }
    function withdraw_vat_set()
    {
        return view('admin.set.withdraw_vat_set');
    }
    function matching_bonus_set()
    {
        $matching_bonus_set = MatchingBonusSet::first();
        return view('admin.set.matching_bonus_set', compact('matching_bonus_set'));
    }
    function matching_bonus_set_update(Request $request)
    {
        $total_wallet = $request->c_wallet + $request->r_wallet + $request->s_wallet;
        if ($total_wallet > 101) {
            return 'Max wallet value is 100%';
        } else {
            $validated = $request->validate([
                'bonus' => 'required|max:99|numeric',
                'c_wallet' => 'numeric',
                'r_wallet' => 'numeric',
                's_wallet' => 'numeric',
            ]);
            MatchingBonusSet::where('id', $request->matching_bonus_set_id)->update([
                'bonus' => $request->bonus,
                'c_wallet' => $request->c_wallet,
                'r_wallet' => $request->r_wallet,
                's_wallet' => $request->s_wallet,
                'updated_at' => Carbon::now(),
            ]);
            return back();
        }
    }
}
