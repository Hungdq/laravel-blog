<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\Welcome;
use App\Mail\WelcomeAgain;
use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    public function create()
    {
    	return view('registration.create');
    }

    public function store(RegistrationRequest $request)
    {
    	// validate the form

    	// create and save the user
    	$user = new User;
    	$user->name = request('name');
    	$user->email = request('email');
    	$user->password = bcrypt(request('password'));
    	$user->save();

    	// sign them in
    	auth()->login($user);

        \Mail::to($user)->send(new WelcomeAgain());

        session()->flash('message', 'Thanks so much for registering');

    	// redirect to homepage
    	return redirect()->home();
    }
}
