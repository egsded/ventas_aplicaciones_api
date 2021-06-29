<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\people;

class PeopleController extends Controller
{
    public function index(){
    	return people::all();
    }

    public function show($id){
    	return people::find($id);
    }

    public function store(Request $request){
    	try {
    		$people = people::create($request->all());
    		return response()->json($people);
    	} catch (Exception $e) {
    		return response()->json($e);
    	}
    }

    public function delete($id){
    	$people = people::findOrFail($id);
    	$people->delete();
    }
}
