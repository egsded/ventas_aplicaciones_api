<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maintenance extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function programs(){
    	return $this->morphOne('App\Models\programs');
    }
}
