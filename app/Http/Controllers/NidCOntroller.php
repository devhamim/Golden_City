<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserVerified;
use Illuminate\Http\Request;

class NidCOntroller extends Controller
{
    function nid_request(){
        $requests = UserVerified::all();
        return view('admin.verify.nid_request', compact('requests'));
    }
    function nid_request_status(Request $request){
        UserVerified::where('id', $request->id)->update([
            'status' => $request->status,
        ]);
        if ($request->status == 'confirm') {
            User::where('id', $request->user_id)->update([
                'verified_status' => '1',
            ]);
        }
        else{
            User::where('id', $request->user_id)->update([
                'verified_status' => '0',
            ]);
        }
        return back();
    }
    function nid_verified(){
        $requests = UserVerified::where('status', 'confirm')->get();
        return view('admin.verify.nid_verified', compact('requests'));
    }
    function nid_rejected(){
        $requests = UserVerified::where('status', 'cancel')->get();
        return view('admin.verify.nid_rejected', compact('requests'));
    }
}
