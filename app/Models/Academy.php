<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{
    protected $fillable = ['name', 'user_name', 'email', 'images', 'time_slots', 'phone', 'description', 'latitude', 'longitude'];

    public function tag(){
    	return $this->belongsToMany('App\Models\Tag');
    }

}
