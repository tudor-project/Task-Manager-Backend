<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\V1\UserCollection;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return new UserCollection(User::all());
    }
    public function show(User $user)
    {
        return new UserResource($user);
    }
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        return response()->json([
            "message" => "User Created!",
            "user" => $user,
            "token" => $user->createToken('auth_token')->plainTextToken
        ]);
    }
    public function update(StoreUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return response()->json("User updated!");
    }
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json('User deleted!');
    }
}
