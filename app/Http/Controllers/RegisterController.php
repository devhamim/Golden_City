<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    function store(Request $request)
    {
        //   dd($request->all());

        $request->validate([
            'fName'                 => 'required',
            'lName'                 => 'required',
            'username'              => 'required',
            'number'                => 'required',
            'email'                 => 'required|email',
            'password'              => 'required',
            'password_confirmation' => 'required',
        ]);

        $user = new User();
        $user->fName        = $request->fName;
        $user->lName        = $request->lName;
        $user->username     = $request->username;
        $user->number       = $request->number;
        $user->role         = 'user';
        $user->email        = $request->email;
        $user->password     =  bcrypt($request->password);


        if ($request->reference != '') {
            $parent = User::where('username', $request->reference)->first(); //Parent data
            if (!$parent) {
                return back()->with(['error' => 'Invalid reference']);
            }
            $user->parent_id = $parent->id;
            $user->save();

            //Checking Position
            if (is_null($parent->left_child_id)) {
                $parent->left_child_id = $user->id; //insert into left
            } elseif (is_null($parent->right_child_id)) {
                $parent->right_child_id = $user->id; //insert into right
            } elseif ($parent->left_child_id != null || $parent->right_child_id != null) {
                $side = $parent->totalDownlineCount('left') > $parent->totalDownlineCount('right') ? 'right' : 'left'; //Checking side length
                $lastUser = $parent->lastUserInDownline($side);
                if (is_null($lastUser->left_child_id)) {
                    $lastUser->left_child_id = $user->id;
                } else {
                    $lastUser->right_child_id = $user->id;
                }
                $lastUser->save();
            }

            $parent->save();
        }
        $user->save();
        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
