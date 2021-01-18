<?php

namespace App\Http\Controllers;

class Home extends Controller
{
    public function __invoke()
    {
        return redirect()->route('auth::login');
    }
}
