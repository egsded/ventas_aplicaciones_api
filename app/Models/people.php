<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\programers;

class people extends Model
{
    use HasFactory;
    protected $table = 'people';
    public $timestamps = false;
    protected $fillable = ['name', 'whats', 'user_id'];

    public function programers(){
    	return $this->hasOne(programers::class);
    }
}
