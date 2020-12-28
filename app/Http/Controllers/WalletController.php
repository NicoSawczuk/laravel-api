<?php

namespace App\Http\Controllers;

use App\User;
use App\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function show(User $user){
        $wallet = Wallet::where('user_id', $user->id)->first();
        return response()->json($wallet->load('transfers'), 200);
    }

    public function store($user){
        $wallet = new Wallet();
        $wallet->money = 0.0;
        $wallet->user_id = $user;
        $wallet->save();
    }
    
}
