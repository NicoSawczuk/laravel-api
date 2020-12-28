<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required|min:6'
        ]);


        $user = User::create([
            'name' => $request->name, 
            'email' => $request->email, 
            'password' => bcrypt($request->password)
        ]);

        app('App\Http\Controllers\WalletController')->store($user->id);
        
        return response()->json($user);
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email', 
        'password' => 'required'
    ]);

    if( Auth::attempt(['email'=>$request->email, 'password'=>$request->password]) ) {
        $user = Auth::user();

        $token = $user->createToken($user->email.'-'.now());

        return response()->json([
            'token' => $token->accessToken
        ]);

    }else{
        return response()->json([
            'error' => 'Email or password incorrect'
        ]);
    }
    
}

public function logout()
{ 
    if (Auth::check()) {
       Auth::user()->AauthAcessToken()->delete();
       return response()->json([
        'status' => 'logout successfull'
    ]);
    }
}
}
