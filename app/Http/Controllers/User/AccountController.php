<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserVerified;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class AccountController extends Controller
{
    function account_verified()
    {
        return view('user.account.account_verified');
    }
    function user_nid_store(Request $request)
    {
        $image = $request->image;
        $image_name = Auth::user()->username . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save(base_path('public/files/nid/' . $image_name));
        UserVerified::insert([
            'user_id' => Auth::user()->id,
            'id_card' => $image_name,
            'created_at' =>Carbon::now(),
        ]);
        User::where('id', Auth::user()->id)->update([
            'verified_status' => '1',
        ]);
        return back();
    }
}
