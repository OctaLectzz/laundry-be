<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Http\Resources\KaryawanResource;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawans = Karyawan::latest()->get();

        return KaryawanResource::collection($karyawans);
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

        $karyawanData['user_id'] = $user->id;
        $karyawan = Karyawan::create($karyawanData);

        return response()->json([
            'status' => 'Success',
            'message' => 'Karyawan Created Successfully',
            'data' => new KaryawanResource($karyawan)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        return response()->json([
            'data' => new KaryawanResource($karyawan)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $user = User::findOrFail($karyawan->user_id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'nullable|string'
        ]);

        $user->update($data);

        return response()->json([
            'status' => 'Success',
            'message' => 'Karyawan Edited Successfully',
            'data' => new KaryawanResource($karyawan)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        $user = User::findOrFail($karyawan->user_id);

        $karyawan->delete();
        $user->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'Karyawan Deleted Successfully'
        ]);
    }
}
