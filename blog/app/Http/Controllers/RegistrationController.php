<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {

        // Validate the form
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        // Create the user and save
        $user = User::create(
            request(['name', 'email', 'password'])
        );

        // Sign them in
        auth()->login($user);

        \Mail::to($user)->send(new Welcome($user));

        //Redirect to homepage
        return redirect()->home();
    }
}
