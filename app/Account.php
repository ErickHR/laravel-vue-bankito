<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    
    protected $fillable = [
        'account_number',
        'amount',
        'account_type_id',
        'person_id',
        'type',
        'range_degreet_credit',
        'degreet_credit',
        'request'
    ];

    public function card(){
        return $this->hasOne('App\Card');
    }

    public function account_type(){

        return $this->belongsTo('App\Account_type');
        
    }

    public function operation(){

        return $this->hasMany('App\Operation');
        
    }

    public function person(){

        return $this->belongsTo('App\Person');
        
    }

}
