<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    
    protected $fillable = [
        'document_type',
        'document_number',
        'name',
        'father_last_name',
        'mother_last_name',
        'gender',
        'country_birth',
        'date_of_birth',
        'nationality',
        'civil_status',
        'degree_of_study',
        'cell',
        'email',
        'address',
        'employment',
        'salary'
    ];

    public function request_card(){
        return $this->hasMany('App\RequestCard');
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
