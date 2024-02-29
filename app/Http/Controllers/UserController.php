<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->get();

        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'passwordConfirmation' => 'required|same:password',
            'role' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'nullable|string'
        ]);

        $user = User::create($userData);

        return response()->json([
            'status' => 'Success',
            'message' => 'User Created Successfully',
            'data' => new UserResource($user)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json([
            'data' => new UserResource($user)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'nullable|string'
        ]);

        $user->update($data);

        return response()->json([
            'status' => 'Success',
            'message' => 'User Edited Successfully',
            'data' => new UserResource($user)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'User Deleted Successfully'
        ]);
    }
}
