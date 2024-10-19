<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReferralInviteMail;

class ReferralController extends Controller
{
    public function create()
    {
        return view('referrals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:referrals,email|unique:users,email',
        ]);

        // Check if user has sent 10 or more invites
        if (Referral::where('referrer_id', auth()->id())->count() >= 10) {
            return redirect()->back()->withErrors(['error' => 'You cannot send more than 10 invites.']);
        }

        // Create a new referral
        $referral = Referral::create([
            'referrer_id' => auth()->id(),
            'email' => $request->email,
            'referral_code' => Referral::generateReferralCode(),
        ]);

        // Send referral email
        Mail::to($request->email)->send(new ReferralInviteMail($referral));

        return redirect()->route('referrals.create')->with('success', 'Referral invitation sent.');
    }
}
