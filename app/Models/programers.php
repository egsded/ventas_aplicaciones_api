<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programers extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function people(){
    	return $this->morphMany('App\Models\people');
    }

    public function programs(){
    	return $this->morphMany('App\Models\programs', 'programs_has_programers');
    }
}
