<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use people;

class programers extends Model
{
    use HasFactory;
    protected $table = 'programers';
    public $timestamps = false;

    public function people(){
    	return $this->hasOne(people::class);
    }
}
