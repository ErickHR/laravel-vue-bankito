<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    
    protected $fillable = [
        'card_number',
        'expired_date',
        'CVC',
        'account_id'
    ];

    public function account(){
        return $this->belongsTo('App\Account');
    }

    protected function credit(){
        return $this->hasOne('App\Credit');
    }

    protected function debit(){
        return $this->hasOne('App\Debit');
    }

}
