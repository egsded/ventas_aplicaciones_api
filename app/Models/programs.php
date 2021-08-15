<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\programers;

class programs extends Model
{
    use HasFactory;
    protected $table = 'programs';
    public $timestamps = false;
    protected $fillable = ['name','description', 'instalation_date', 'price', 'database', 'repository', 'type', 'people_id'];

    public function php(){
        return $this->belongsToMany(programers::class, 'programs_has_programers', 'programs_id', 'programers_id');
    }
}
