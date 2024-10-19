<?php

namespace App\Http\Controllers;

use App\Models\Referral;

class AdminController extends Controller
{
    public function index()
    {
        $referrals = Referral::with('referrer')->get();
        return view('admin.referrals', compact('referrals'));
    }
}
