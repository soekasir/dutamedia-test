<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorect'],
            ]);
        }
        if (!(Hash::check($request->password, $user->password))) {
            throw ValidationException::withMessages([
                'password' => ['The provided credentials are incorect'],
            ]);
        }

        return response()->json([
            'token' => $user->createToken($request->email)->plainTextToken
        ]);        
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
    }

    public function me()
    {
        return response()->json(Auth::user());
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($validated) {
            try {
                $user = User::create([
                    'email' => $request->email,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    ]);
                return response()->json($user);
            } catch (QueryException $e) {
                $errorCode = $e->errorInfo[1];
                if ($errorCode == 7) {
                    // we have a duplicate entry problem
                    throw ValidationException::withMessages([
                        'error' => "email or username already exist "
                    ]);
                }
            }
        }
    }
}
