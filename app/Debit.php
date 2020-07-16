<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debit extends Model
{
    
    protected $fillable = [
        'password',
        'card_id'
    ];

    public function card(){

        return $this->belongsTo('App\Card');
        
    }

}
