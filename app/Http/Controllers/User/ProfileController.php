<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    function profile()
    {
        $profile = Auth::user();
        return view('admin.profile.profile', compact('profile'));
    }
    function profile_update(Request $request)
    {
        $validated = $request->validate([
            'number' => 'max:11|min:11',
        ]);
        $password = $request->password;
        if ($request->image) {
            $image = $request->image;
            $image_name = Auth::user()->id . '.' . $request->user_name . '.' . $image->getClientOriginalExtension();
            if (Hash::check($password, Auth::user()->password)) {
                Image::make($image)->save(base_path('public/files/profile/' . $image_name));
                User::where('id', Auth::user()->id)->update([
                    'username' => $request->user_name,
                    'number' => $request->number,
                    'profile' => $image_name,
                ]);
                return redirect()->back()->with(['succ' => 'Profile Update Successfully']);
            } else {
                return redirect()->back()->with(['err' => 'Invalid Password']);
            }
        }
        else{
            if (Hash::check($password, Auth::user()->password)) {
                User::where('id', Auth::user()->id)->update([
                    'username' => $request->user_name,
                    'number' => $request->number,
                ]);
                return redirect()->back()->with(['succ' => 'Profile Update Successfully']);
            }
        }
        
    }
    function set_pin(Request $request)
    {
        $validated = $request->validate([
            'pin' => 'required|numeric',
        ]);
        $password = $request->password;
        if (Hash::check($password, Auth::user()->password)) {
            User::where('id', Auth::user()->id)->update([
                'pin' => $request->pin,
            ]);
            return back()->with(['succ' => 'Successful! Pin Added']);
        } else {
            return redirect()->back()->with(['err' => 'Oh! Password Not Matching']);
        }
    }
    function pin_update(Request $request)
    {
        $old_pin = $request->old_pin;
        if ($old_pin == Auth::user()->pin) {
            $password = $request->password;
            if (Hash::check($password, Auth::user()->password)) {
                User::where('id', Auth::user()->id)->update([
                    'pin' => $request->new_pin,
                ]);
                return back()->with(['succ' => 'Successful! Pin Added']);
            } else {
                return redirect()->back()->with(['err' => 'Oh! Password Not Matching']);
            }
        } else {
            return back()->with(['err' => 'Invalid Pin']);
        }
    }
    function change_password(Request $request)
    {
        $password = $request->password;
        if (Hash::check($password, Auth::user()->password)) {
            $validated = $request->validate([
                'password' => 'required',
                'new_password' => 'required|min:8',
            ]);
            if ($request->new_password == $request->password_confirmation) {
                User::where('id', Auth::user()->id)->update([
                    'password' => Hash::make($request->new_password),
                ]);
                return back()->with(['succ' => 'Successfully !!! Password Changed']);
            } else {
                return back()->with(['err' => 'Confirm Password Not Matching']);
            }
        } else {
            return back()->with(['err' => 'Invalid Password']);
        }
    }
}
