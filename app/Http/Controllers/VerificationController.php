<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Verified;
use Carbon\Carbon;

class VerificationController extends Controller
{
    public function verify(Request $request, $token)
{
    $user = User::where('verification_token', $token)->first();

    if (!$user) {
        abort(404);
    }

    Log::info('User before update:', ['user' => $user->toArray()]);

    $user->email_verified_at = Carbon::now();
    $user->verification_token = null;
    $user->save();

    Log::info('User after update:', ['user' => $user->toArray()]);

    event(new Verified($user));

    return redirect('/login')->with('success', 'Email verification successful. You can now log in.');
}
}
