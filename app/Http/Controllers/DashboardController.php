<?php

// App\Http\Controllers\DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $referralCount = $user->referralCount();
        $invitedUsers = $user->invitedUsers();
        $registeredCount = $invitedUsers->where('status', 'registered')->count(); // Assuming you have a status column

        return view('dashboard', compact('referralCount', 'invitedUsers', 'registeredCount'));
    }
}
