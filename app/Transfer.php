<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    //Relaciones
    public function wallet(){
        return $this->belongsTo(Wallet::class);
    }
}
