<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    
    protected $fillable = [
        'amount',
        'type',
        'emitter',
        'receptor',
        'account_id'
    ];

    protected function account(){
        return $this->belongsTo('App\Account');
    }

}
