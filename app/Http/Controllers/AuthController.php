<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function logIn(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        
        if($request->remember){
            Cookie::queue('mycookie', $request->email, 15);
        }else{
            Cookie::queue(Cookie::forget('mycookie'));
        }
        
        if(Auth::attempt($credentials, true)){
            
            return redirect('/');
        }
        return back()->withErrors("Email or password is incorrect, or still not Registered", "sign-in");
    }

    public function register(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        
        if($request->password != $request->confirm){
            return back()->withErrors("Password does not match", 'register');
        }

        $user->save();

        return redirect('/');
    }

    public function logOut(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function showProfile(){
        return view('profile');
    }

    public function updateProfile(){
        return view('update-profile');
    }

    public function saveProfile(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed|min:6',
            'phone' => 'required'
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;

        $user->save();

        return redirect('/profile')->with('success_update', "Profile has been updated");
    }
}
