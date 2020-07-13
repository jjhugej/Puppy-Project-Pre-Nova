<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    public function users(){
        return $this->belongsToMany('App\User','pet_user', 'pet_id', 'user_id');
    }
}
