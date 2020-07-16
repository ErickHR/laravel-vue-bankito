<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    
    protected $fillable = [
        'name',
        'mother_last_name',
        'father_last_name',
        'dni',
        'address'
    ];

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
