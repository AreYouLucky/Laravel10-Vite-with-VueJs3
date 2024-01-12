<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    public function ___construct(){

    }


    public function index(){
        return view('home.login');
    }

    public function login(Request $request){

        $credentials = $request->validate(
            [
                'email'=>['required'],
                'password'=>['required'],
            ]
            );

            if(Auth::attempt($credentials)){ 
                $request->session()->regenerate();
                $user = Auth::user();
                return $user;
                if($user->role == 'ADMIN'){
                    return view('admin.dashboard')
                    ->with('user',$user);
                }
                // elseif($user->role == 'SELLER')
                // {
                //     return redirect('/seller-dashboard');
                // }
                // elseif($user->role == 'BUYER'){
                //     return redirect('/buyer-dashboard');
                // }
                
            }
            return response()->json([
                'errors' => [
                    'username' =>['Invalid Credentials']
                ]
                ], 422);
    }

    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();

        $req->session()->regenerateToken();

        return redirect('/');
    }


}
