<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'user_type' => 'required |string',
            'phone' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $user = User::create([
            'name' => $request->name, //'name' db field name  ;  request->name : 'name' url parameter
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request -> user_type,
            'phone' => $request -> phone,
            'location' => $request -> location,
        ]);

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('token-name')->plainTextToken,
        ], 201);
    }

    function login(Request $request){
        //ensure its formatted as email and password
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['credentials are incorrect.'],
            ]);
        }

        return response()->json([
            'Status' => 'Logged in',
            'user' => $user,
            'token' => $user->createToken('token-name')->plainTextToken,
        ]);
    }
}
