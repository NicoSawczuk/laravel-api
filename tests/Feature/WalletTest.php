<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Wallet;
use App\Transfer;

class WalletTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetWallet()
    {

        //Creamos una wallet
        $wallet = factory(Wallet::class)->create();

        //Creamos transferrs (3 transfers)
        $transfers = factory(Transfer::class, 3)->create([
                'wallet_id' => $wallet->id
            ]);

        //Hacemos una request a nuestra API
        $response = $this->json('GET','/api/wallet');
        
        //El status sea el 200 (todo bien)
        $response->assertStatus(200)
                 //Validar la estructura del json que recibo
                 ->assertJsonStructure([
                    'id', 
                    'money', 
                    //Todo lo de transfers
                    'transfers' =>[
                        '*'=> [
                            'id',
                            'amount',
                            'description',
                            'wallet_id'
                        ]
                    ]
                 ]);

        //Controlamos la cantidad de transfers
        $this->assertCount(3, $response->json()['transfers']);

    }
}
