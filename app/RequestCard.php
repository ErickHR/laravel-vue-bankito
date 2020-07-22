<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestCard extends Model
{
    protected $fillable = [
        'person_id',
        'type',
        'request',
        'degree_credit',
        'status'
    ];

    public function person(){
        return $this->belongsTo('App\Person');
    }

}
