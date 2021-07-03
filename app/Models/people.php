<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use User;

class people extends Model
{
    use HasFactory;
    protected $table = 'people';
    public $timestamps = false;
    protected $fillable = ['name','user_id'];

    public function user(){
    	return $this->hasOne(User::class);
    }
}
