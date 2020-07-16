<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account_type extends Model
{

    protected $fillable = [
        'name'
    ];

    public function accounts(){

        return $this->hasMany('App\Account');
        
    }

}
