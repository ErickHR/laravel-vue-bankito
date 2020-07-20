<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestCreditCard extends Model
{
    protected $fillable = [
        'request',
        'person_id',
        'status'
    ];

    public function person(){
        return $this->belongsTo( 'App/Person' );
    }

}
