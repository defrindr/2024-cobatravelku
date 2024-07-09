<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        \Log::info('Register method called', $request->all());

        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            \Log::info('Validation failed', $validator->errors()->toArray());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::listen(function ($query) {
            \Log::info("Query Executed: " . $query->sql, $query->bindings);
        });

        $user = $this->create($request->all());

        if ($user === null) {
            \Log::error('User creation failed');
            return redirect()->back()->with('error', 'User creation failed.');
        }

        \Log::info('User created', ['user_id' => $user->id]);

        // Login user
        $this->guard()->login($user);

        // Redirect back to the registration page with a success message
        return redirect()->route('register')->with('success', 'Registration successful! Please log in.');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        \Log::info('Creating user with data', $data);

        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            \Log::info('User created', ['user_id' => $user->id]);
        } catch (\Exception $e) {
            \Log::error('User creation exception', ['exception' => $e->getMessage()]);
            $user = null;  // Set $user to null if creation fails
        }

        return $user;
    }

    protected function guard()
    {
        return auth()->guard();
    }

    protected function redirectPath()
    {
        return '/home';
    }
}
