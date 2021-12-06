<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nette\Schema\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request->validate([
            'email' => ['required', 'exists:users,email'],
            'password' => ['required']
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate(); // fixes session fixation attack
            return redirect('/')->with('success', 'Welcome Back!');
        }
        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified'
        ]);
//        return back()
//            ->withInput()
//            ->withErrors(['email' => 'Your provided credentials could not be verified.']);
    }


    public function destory()
    {
        auth()->logout();

        return redirect('/', "Goodbye!");
    }
}

