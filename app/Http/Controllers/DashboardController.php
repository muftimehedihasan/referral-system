<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // // Check if the user is an admin and redirect accordingly
        // if ($user->role === 'admin') {
        //     // return redirect()->route('admin.dashboard');
        //     return redirect()->route('admin.referrals');
        // }

        // For regular users, continue with the normal dashboard view
        $referralCount = $user->referralCount();
        $invitedUsers = $user->invitedUsers();
        $registeredCount = $invitedUsers->where('status', 'registered')->count(); // Assuming you have a status column

        return view('dashboard', compact('referralCount', 'invitedUsers', 'registeredCount'));
    }
}
