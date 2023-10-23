<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ActivePackage;
use App\Models\Package;
use App\Models\Wallet;
use Calculate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Floats;

class PackageController extends Controller
{
    function active_package()
    {
        return view('user.package.active_package');
    }

    function user_package_list()
    {
        $package = Package::where('status', 1)->get();
        return view('user.package.list', [
            'packages' => $package
        ]);
    }

    function user_package_purchase($id)
    {
        if (Package::find($id)->exists()) {
            $package = Package::find($id); //package

            $balance = Calculate::Balance(); //Balance
            $credit = $balance['credit'];

            if ($credit < (float) $package->price) {
                return back()->with(['err' => 'Insufficient balance']);
            }

            //active package
            $activePack = new ActivePackage();
            $activePack->user_id = Auth::user()->id;
            $activePack->package_id = $id;
            $activePack->price = $package->price;
            $activePack->target_price = $package->target_price;
            $activePack->duration = Carbon::now()->addDays($package->day);
            $activePack->save();

            //Purchase History
            $wallet = new Wallet();
            $wallet->sender_id = Auth::user()->id;
            $wallet->wallet_type = 'credit';
            $wallet->transaction_type = 'credit';
            $wallet->balance = (float)$package->price;
            $wallet->status = 'confirm';
            $wallet->save();


            return back()->with(['succ' => 'Package actived']);
        } else {
            return back()->with(['err' => 'Something is wrong, Try again later']);
        }
    }
}
