<?php

namespace App\Http\Controllers;

use App\Models\ActivePackage;
use App\Models\User;
use App\Models\UserVerified;
use App\Models\Wallet;
use Calculate;
use Illuminate\Http\Request;

class NidCOntroller extends Controller
{
    function nid_request()
    {
        $requests = UserVerified::where('status', 'pending')->get();
        return view('admin.verify.nid_request', compact('requests'));
    }
    function nid_request_status(Request $request)
    {
        UserVerified::where('id', $request->id)->update([
            'status' => $request->status,
        ]);
        if ($request->status == 'confirm') {
            User::where('id', $request->user_id)->update([
                'verified_status' => '1',
            ]);
        } else {
            User::where('id', $request->user_id)->update([
                'verified_status' => '0',
            ]);
        }
        return back();
    }
    function nid_verified()
    {
        $requests = UserVerified::where('status', 'confirm')->get();
        return view('admin.verify.nid_verified', compact('requests'));
    }
    function nid_rejected()
    {
        $requests = UserVerified::where('status', 'cancel')->get();
        return view('admin.verify.nid_rejected', compact('requests'));
    }

    function verified_member_profile($id){
        $user = User::find($id);

        $transaction = Wallet::with('user')->where('receiver_id', $id)->orWhere('sender_id', $id)->orderBy('id', 'desc')->get();
        
        $activePackage = ActivePackage::where('user_id', $id)->get();
        return view('admin.verify.verified_profile', [
            'user' => $user,
            'balance'        => Calculate::Balance(),
            'transactions'   => $transaction,
            'packages'       => $activePackage,
        ]);
    }
    function user_profile_status_update(Request $request){
       User::where('id', $request->id)->update([
        'verified_status' =>$request->status,
       ]);
       return back();
    }
    function user_profile_banned_status(Request $request){
        User::where('id', $request->id)->update([
            'banned' =>$request->status,
           ]);
           return back();
    }
    function user_profile_withdraw_status(Request $request){
        User::where('id', $request->id)->update([
            'withdraw' =>$request->status,
           ]);
           return back();
    }
}
