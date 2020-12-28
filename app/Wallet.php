<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    //Relaciones
    public function transfers(){
        return $this->hasMany(Transfer::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
