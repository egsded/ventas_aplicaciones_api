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

    public function makeUser(Request $r){
        try{
            $people_id = people::where('user_id',$r->people_id)->first();
            $arrayuser = array('gituser' => $r->gituser, 'people_id' => $people_id->id);
            $githubuser = programers::create($arrayuser);
            return response()->json($githubuser);
        }catch(Exception $e){
            return response()->json($e);
        }
    }
}
