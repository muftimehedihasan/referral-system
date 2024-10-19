<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the incoming request
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Create the new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // If there's a referral code, handle the referral
        if ($request->has('refer')) {
            $referralCode = $request->input('refer');

            // Find the referral based on the referral code
            $referral = \App\Models\Referral::where('referral_code', $referralCode)->first();

            if ($referral && !$referral->is_registered) {
                // Mark the referral as successful
                $referral->is_registered = true;
                $referral->save();

                // Increment the referrer's successful referral count
                $referral->referrer->increment('referrals_count');
            }
        }

        // Fire the Registered event and log in the new user
        event(new Registered($user));
        Auth::login($user);

        // Redirect the user to the dashboard
        return redirect(route('dashboard', absolute: false));
    }

}
