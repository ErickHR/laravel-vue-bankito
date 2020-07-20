<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    
    protected $fillable = [
        'name',
        'document_type',
        'document_number',
        'mother_last_name',
        'father_last_name',
        'dni',
        'cell',
        'address'
    ];

    public function request_credit_card(){
        return $this->hasOne('App\RequestDebitCard');
    }

    public function account(){
        return $this->hasOne('App\Account');
    }

    public function loan_line(){
        return $this->hasMany('App\Loan_line');
    }

    public function role(){
        return $this->belongsToMany('App\Role');
    }

}
