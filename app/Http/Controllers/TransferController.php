<?php

namespace App\Http\Controllers;

use App\Transfer;
use App\Wallet;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function store(Request $request){
        $wallet = Wallet::where('id',$request->wallet_id)->first();
        $wallet->money = $wallet->money + $request->amount;
        $wallet->update();

        $data = request()->validate([
            'description'        => 'required',
            'amount'   => 'required|integer',
        ]);

        $transfer = new Transfer();

        $transfer->description = $request->description;
        $transfer->amount = $request->amount;
        $transfer->wallet_id = $request->wallet_id;
        $transfer->save();

        return response()->json($transfer, 201);
    }

    public function show(Transfer $transfer)
    {
        return response()->json($transfer, 200);
    }
}
