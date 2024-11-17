<?php

namespace App\Http\Controllers\avi_dveri\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(){
        if (Auth::check()){
            if (Auth::user()['is_admin']){
                return redirect(route('admin'));
            }
        }
        return view('avi-dveri.admin.login&registration.registration');
    }

    public function registration(UserRequest $request){
        if (Auth::check()){
            if (Auth::user()['is_admin']) {
                return redirect(route('admin'));
            }
        }
        if (User::where('email', $request->all()['email'])->exists()){
            return redirect(route('registration'));
        }
        $user = User::create($request->all());
        if ($user){
            if (Auth::user()['is_admin']) {
                Auth::login($user);
                return redirect(route('admin'));
            }
        }
        return redirect(route('login'))->withInput();
    }
}
