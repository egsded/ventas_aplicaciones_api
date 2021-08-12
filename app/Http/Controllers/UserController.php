<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\people;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    public function authenticate(Request $request){
    	$credentials = $request->only('email','password');
    	try{
    		if (!$token = JWTAuth::attempt($credentials)) {
    			return response()->json(['error'=>'invalid credentials'], 400);
    		}
    	}catch(JWTException $e){
    		return response()->json(['error'=>'could_not_create_token'], 500);
    	}
    	return response()->json(compact('token'));
    }

    public function getAuthenticatedUser(){
    	try {
    		if (!$user=JWTAuth::parseToken()->authenticate()) {
    			return response()->json(['user_not_found'],404);
    		}
    	} catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
    		return response()->json(['token_expired'], $e->getStatusCode());
    	} catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
    		return response()->json(['token_invalid'], $e->getStatusCode());
    	} catch (Tymon\JWTAuth\Exceptions\JWTException $e){
    		return response()->json(['token_absent'], $e->getStatusCode());
    	}
    	return response()->json(compact('user'));
    }

    public function register(Request $request){
    	$validator = Validator::make($request->all(), [
    		'name' => 'required|string',
    		'email' => 'required|string',
    		'password' => 'required|string',]);

    	if ($validator->fails()) {
    		return response()->json($validator->errors()->toJson(), 400);
    	}

    	$user = User::create([
    		'name' => $request->get('name'),
    		'email' => $request->get('email'),
    		'password' => Hash::make($request->get('password')),]);

    	$token = JWTAuth::fromUser($user);
        $people = array('name' => $user->name, 'whats'=> $request->whats, 'user_id' => $user->id);
        people::create($people);

    	return response()->json(compact('user','token'),201);
    }
}
