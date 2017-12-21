<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class AuthController extends Controller
{

	protected $redirectTo = '/articles';
    
	public function login() {

		$this->validate(request(), [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);

    	if (! auth()->attempt(request(['email', 'password']))) {

    		return back();

    	}

    	return redirect($this->redirectTo);

	}

	public function showLogin() {

		return view('auth.login'); 
		
	}

	public function register() {

		$validatation = $this->validate(request(), [
			'name' => 'required|min:2|string',
    		'email' => 'required|email|unique:users',
    		'password' => 'required|min:6|string'
    	]);

    	$user = User::create([
    		'name' => request('name'), 
    		'email' => request('email'),
    		'password' => bcrypt(request('password'))
    	]);

    	auth()->login($user);

    	return redirect($this->redirectTo);
		
	}

	public function showRegister() {

		return view('auth.register'); 
		
	}

	public function logout() {

		Auth()->logout();

    	return redirect($this->redirectTo);

	}

}
