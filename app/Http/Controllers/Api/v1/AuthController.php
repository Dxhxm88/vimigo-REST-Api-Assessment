<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(LoginFormRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages(['email' => 'Credentials are incorrect']);
        }

        return response()->json([
            'token' => $user->createToken('Auth Token')->accessToken
        ]);
    }

    public function register(RegisterFormRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User registered success',
            'data' => new UserResource($user),
        ], 201);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
    }
}
