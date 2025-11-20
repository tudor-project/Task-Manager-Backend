<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\V1\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->validated();

        if(!Auth::attempt($credentials)) {
            return response()->json(['email' => 'The provided credentials do not match our records!']);
        }
        $user = Auth::user();
        return response()->json([
            'message' => 'Authentication succeeded!',
            'user' => new UserResource($user),
            'token' => $user->createToken('auth_token')->plainTextToken
        ]);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
    }
}
