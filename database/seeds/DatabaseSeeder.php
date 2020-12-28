<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Wallet;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $test = User::create([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => Hash::make('test'),
        ]);
        $test->save();

        $wallet = Wallet::create([
            'money' => 0.0,
            'user_id'   => $test->id
        ]);
        $wallet->save();
    }
}
