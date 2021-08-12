<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\people;

class PeopleController extends Controller
{
    public function index(){
    	return people::where('user_id', null)->get();
    }

    public function show($id){
    	return people::find($id);
    }

    public function store(Request $request){
        try{
            $arraypeople = array('name' => $request->name, 'whats' => $request->whats);
            $people = people::create($arraypeople);
            return response()->json($people);
        } catch(Exception $e){
            return response()->json($e);
        }
    }

    public function delete($id){
    	$people = people::findOrFail($id);
    	$people->delete();
    }

    public function findname($name){
        return people::where("name", "like", "%".$name."%")->where("user_id", null)->get();
    }
}
