<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\programers;
use App\Models\people;
use App\Models\User;

class ProgramerController extends Controller
{
    public function index(){
    	return programers::all();
    }

    public function getProgramer($id){
    	$people = User::find($id)->people()->get();
    	$programer = people::find($people[0]->id)->programers()->get();
    	return response()->json($programer);
    }
}
