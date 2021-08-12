<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\programs as Program;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    public function getOrders($id){
        $programs = DB::select('select programs.id, programs.name as name_program, programs.description as description_program, people.name as client, orders.debt from programs inner join people on people.id = programs.people_id inner join orders on orders.programs_id = programs.id inner join programs_has_programers as php on php.programs_id = programs.id inner join programers on programers.id = php.programers_id inner join people as peoplep on peoplep.id = programers.people_id where peoplep.user_id = '.$id);
        return $programs;
    }
}
