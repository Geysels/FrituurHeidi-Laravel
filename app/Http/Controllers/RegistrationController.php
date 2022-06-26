<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.register-content');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'telephone' => 'required',
        ]);

        $user = User::create(request(['name', 'email', 'password', 'telephone']));

        auth()->login($user);

        return redirect()->route('home')->with('toast_success', 'Account succesvol aangemaakt!');
    }
}
