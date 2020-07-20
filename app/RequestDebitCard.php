<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestDebitCard extends Model
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
