<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\people;
use App\Models\programs;

class programers extends Model
{
    use HasFactory;
    protected $table = 'programers';
    public $timestamps = false;
    protected $fillable = ['gituser','people_id'];

    public function people(){
    	return $this->hasOne(people::class);
    }

    public function php(){
        return $this->belongsToMany(programs::class, 'programs_has_programers', 'programers_id', 'programs_id');
    }
}
