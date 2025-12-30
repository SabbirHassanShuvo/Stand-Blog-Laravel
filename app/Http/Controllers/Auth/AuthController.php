<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ResetPassword;
use Illuminate\Support\Carbon;
use App\Mail\ResetPasswordEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;

class AuthController extends Controller
{
    // User Register 
    public function User_Register()
    {
        return view('register');
    }

    public function User_create(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:8',
        ]);

        // Create the user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_role' => 'user',
        ]);
        // You can send an email here
        $user = User::where('email', $request->email)->first();
        $data = [
            'user' => $user,
            'mailSubejct' => 'Welcom To Stand Blog.'
        ];
        Mail::to($request->email)->send(new WelcomeEmail($data));
        // Redirect or respond as needed
        return redirect()->route('login')->with('success', 'User registered successfully');
    }

    // User login 
    public function Show_login()
    {
        return view('login');
    }

    public function user_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->has('rememberMe');
        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            // Email does not exist
            return redirect()->back()->with('error', 'The User email does not match our records.');
        } else {
            if (Auth::attempt($credentials, $remember)) {
                // Authentication passed
                return redirect()->route('home');
            } else {
                // Password is incorrect
                return redirect()->back()->with('error', 'The User password is incorrect.');
            }
        }
    }

    // User Logout
    public function logout(Request $request)
    {
        // Log the user out
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        // Optionally, clear any cache related to the user
        Cache::flush();

        // Redirect to the login page with a success message
        return redirect()->route('login');
    }

    // Forget Password 
    public function show_forget()
    {
        return view('forgetpassword');
    }
    public function process_forget(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $hasToken = ResetPassword::where('email', $request->email)->first();
        if ($hasToken) {
            $hasToken->delete();
        }
        $token = Str::random(30);

        // Create a new reset password record
        $restpassword = ResetPassword::create([
            'email' => $request->email,
            'token' => $token,
        ]);

        // You can send an email here
        $user = User::where('email', $request->email)->first();
        $formdata = [
            'token' => $token,
            'user' => $user,
            'mailSubejct' => 'You have to requested to reset password'
        ];
        Mail::to($request->email)->send(new ResetPasswordEmail($formdata));

        return redirect()->route('login')->with('success', 'Please check you inbox to reset password');
    }
    public function reset_password($token)
    {
        // Check if the token exists
        $tokenExist = ResetPassword::where('token', $token)->first();

        // If the token does not exist, you may want to redirect back or show an error
        if (!$tokenExist) {
            return redirect()->route('forgetpassword')->with('error', 'Invalid token!');
        }

        // Pass the token to the view
        return view('resetpassword', ['token' => $token]);
    }
    public function processResetPassword(Request $request)
    {
        $token = $request->token;

        // Check if the token exists
        $resetPasswordRecord = ResetPassword::where('token', $token)->first();
        if (!$resetPasswordRecord) {
            return redirect()->route('forgetpassword')->with('error', 'Invalid token!');
        }

        // Get the user by email
        $user = User::where('email', $resetPasswordRecord->email)->first();
        if (!$user) {
            return redirect()->route('forgetpassword')->with('error', 'User not found!');
        }

        // Validate the request
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        // Update the user password
        $user->password = Hash::make($request->password);
        $user->save();

        // Delete the password reset token after a successful reset
        $resetPasswordRecord->delete();

        return redirect()->route('login')->with('success', 'Password reset successfully!');
    }
}
