<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programs extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function people(){
    	return $this->morphOne('App\Models\people');
    }

    public function programers(){
    	return $this->morphMany('App\Models\programers', 'programs_has_programers');
    }
}
