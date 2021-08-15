<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\programs as Program;
use App\Models\people as P;
use App\Models\orders as O;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    public function getOrders($id){
        $programs = DB::select('select programs.id, programs.name as name_program, programs.description as description_program, people.name as client, orders.debt from programs inner join people on people.id = programs.people_id inner join orders on orders.programs_id = programs.id inner join programs_has_programers as php on php.programs_id = programs.id inner join programers on programers.id = php.programers_id inner join people as peoplep on peoplep.id = programers.people_id where peoplep.user_id = '.$id);
        return $programs;
    }

    public function allOfProyect($id){
        $programs = DB::select('select programs.id as program_id, programs.name as program_name, programs.description as program_description, programs.instalation_date, programs.price, programs.database, programs.repository, programs.type, orders.debt, orders.order_date, orders.order_date_finished, people.name as customer, people.whats from programs inner join orders on orders.programs_id = programs.id inner join people on people.id = programs.people_id where programs.id = '.$id.';');
        return $programs;
    }

    public function editOrder(Request $r){
        try{
            $program = program::find($r->proyect_id);
            $program->name = $r->proyect_name;
            $program->description = $r->proyect_description;
            $program->instalation_date = $r->instalation_date;
            $program->price = $r->price;
            $program->database = $r->database;
            $program->repository = $r->repository;
            $program->type = $r->type;
            $program->save();
        }catch(Exception $e){
            return response()->json('programa');
        }

        try{
            $people = P::find($program->people_id);
            $people->name = $r->customer;
            $people->whats = $r->whats;
            $people->save();
        }catch(Exception $e){
            return response()->json('people');
        }

        try{
            $orders = O::where('programs_id', $r->proyect_id)->first();
            $order = O::find($orders->id);
            $order->debt = $r->debt;
            $order->order_date = $r->order_date;
            $order->order_date_finished = $r->date_finished;
            $order->save();
        }catch(Exception $e){
            return response()->json('order');
        }

        return response()->json('succesfully');
    }
}
