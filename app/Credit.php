<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected $fillable = [
        'interest',
        'payment_day',
        'password',
        'card_id'
    ];

    public function card(){

        return $this->belongsTo('App\Card');
        
    }

}
