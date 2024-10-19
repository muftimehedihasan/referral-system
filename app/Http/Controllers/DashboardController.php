<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Here you can add any logic or data you want to pass to the view
        return view('dashboard'); // Make sure you have this view in resources/views/dashboard.blade.php
    }
}

