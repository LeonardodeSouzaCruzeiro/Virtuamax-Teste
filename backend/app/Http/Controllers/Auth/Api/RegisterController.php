<?php

namespace App\Http\Controllers\Auth\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
	public function register(Request $request,User $user){
		$request->validate([
	        'name' => 'required',
	        'email' => 'required|email',
	        'password' => 'required',
    	]);

		$userData=$request->only('name' ,'email','password');
		$userData['password']=bcrypt($userData['password']);
		if(!$user = $user->create($userData))
			throw ValidationException::withMessages([
				abort(500 , 'Error ao criar novo Usuario')
		]);

		return response()->json([
							'data'=>[
								'user'=>$user
							]
		]);
	}
}