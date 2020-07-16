<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan_line extends Model
{
    
    protected $fillable = [
        'amount',
        'type',
        'interest',
        'person_id'
    ];

    public function person(){
        return $this->belongsTo('App\Person');
    }

}
