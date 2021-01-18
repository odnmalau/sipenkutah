<?php

namespace App\Http\Controllers;

class Dashboard extends Controller
{
    public function __invoke()
    {
        return view('dashboard');
    }
}
