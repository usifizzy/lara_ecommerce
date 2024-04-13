<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            // if (Auth::guard('admin')->attempt($credentials)) {
            //     return redirect()->intended('dashboard');
            // }
            return redirect()->intended('store');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('store');
    }


    public function register(Request $request)
    {
        // // var_dump($request);
        // $validator = Validator::make($request->all(), [
        //     'email' => 'required|max:255|min:4|unique:users|email:rfc,dns',
        //     'password'  => 'required|max:5000|min:8',
        //     'address' => 'required|max:5000|min:2',
        //     'phone' => 'required|max:16|min:8',
        //     'name' => 'required|max:64|min:2',
        //     'password_confirmation' => 'required|max:16|min:8|confirmed',
        // ])->validate();

        
        // // if ($validator->fails()) {
        // //     echo 'invalid';
        // //     // return redirect('auth/register')
        // //     //             ->withErrors($validator)
        // //     //             ->withInput();
        // // }
        // // $validated = $validator->safe()->all();
        // $validated = $request->validated();
            
        //     // $user = new User();
        //     // $user->setPassword($validated['password']);

        //     var_dump($validated);


        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255|min:4|unique:users|email:rfc',
            'address' => 'required|max:5000|min:2',
            'phone' => 'required|max:16|min:8|unique:users',
            'name' => 'required|max:64|min:2',
            'password' => 'required|max:5000|min:8|confirmed',
            // 'password' => 'required|between:8,255|confirmed'
        ]);
        
        if ($validator->fails()) {
            // // Validation failed, handle errors
            return redirect()->back()->withErrors($validator)->withInput(); 
        }
        
        // Validation passed, retrieve validated data
        $validated = $validator->validated();

        try {
            User::create([
                'email' => $validated['email'],
                'address' => $validated['address'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'name' => $validated['name'],
                'password' => $validated['password'],
                'role' => 'User',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                ]);
                return redirect('auth/login');
        } catch (\Throwable $th) {
            throw $th;

            // $data['error_msg'] = 'Email of Phone already registered.';
            // return redirect('auth/register')
            //             ->withErrors($data)
            //             ->withInput();
        }
    }
}
