<?php

namespace Tests\Feature;

use App\Transfer;
use App\Wallet;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransferTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPostTransfer()
    {
        $wallet = factory(Wallet::class)->create();

        //Creao una transfer en memoria para despues mandar en el post
        $transfer = factory(Transfer::class)->make();

        $response = $this->json('POST', '/api/transfer',[
            'description'   => $transfer->description,
            'amount'        => $transfer->amount,
            'wallet_id'     => $wallet->id
        ]);

        //Validamos la estructura
        $response->assertJsonStructure([
            'id',
            'description',
            'amount',
            'wallet_id'
        ])->assertStatus(201);

        //Validamos que existan los datos en las transferencias
        $this->assertDatabaseHas('transfers',[
            'description'   => $transfer->description,
            'amount'        => $transfer->amount,
            'wallet_id'     => $wallet->id
        ]);


        $this->assertDatabaseHas('wallets',[
            'id'    => $wallet->id,
            'money' => $wallet->money + $transfer->amount 
        ]);
        
    }
}
