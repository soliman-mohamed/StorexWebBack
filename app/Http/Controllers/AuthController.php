<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('login')->with(['error'=> 'error', 'success' => 'success']);
    }

    public function makeLogin(LoginRequest $request){
        $username = $request->username;
        $password = $request->password;
        $credentials = [
            'password' => $password
        ];
        if(filter_var($username, FILTER_VALIDATE_EMAIL)){
            $credentials['email'] = $username;
        }elseif(is_numeric($username)){
            $credentials['phone'] = $username;
        }else{
            $credentials['username'] = $username;
        }

        $user = User::where(function($q) use ($username){
            $q->where('email', $username)
            ->orWhere('phone', $username)
            ->orWhere('username', $username);
        })->first();

        if (!$user || is_null($user)) {
            return back()->withErrors(['username' =>__('username is invalid')])->withInput();
        }else{
            if (Hash::check($password, $user->password)) {
                if (Auth::guard('web')->attempt($credentials)) {
                    return redirect(route('dashboard'))->with('success', __('welcome back') . ' ' . $user->name);
                } else {
                    return back()->withErrors(['username'=> __('unauthorized')])->withInput();
                }
            }else{
                return back()->withErrors(['password'=> __('password is invalid')])->withInput();
            }
        }

        return back()->with(['error'=> 'please try again'])->withInput();

    }
}
