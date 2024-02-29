<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Http\Resources\PelangganResource;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggans = Pelanggan::latest()->get();

        return PelangganResource::collection($pelanggans);
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

        $pelangganData['user_id'] = $user->id;
        $pelanggan = Pelanggan::create($pelangganData);

        return response()->json([
            'status' => 'Success',
            'message' => 'Pelanggan Created Successfully',
            'data' => new PelangganResource($pelanggan)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        return response()->json([
            'data' => new PelangganResource($pelanggan)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $user = User::findOrFail($pelanggan->user_id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'nullable|string'
        ]);

        $user->update($data);

        return response()->json([
            'status' => 'Success',
            'message' => 'Pelanggan Edited Successfully',
            'data' => new PelangganResource($pelanggan)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $user = User::findOrFail($pelanggan->user_id);

        $pelanggan->delete();
        $user->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'Pelanggan Deleted Successfully'
        ]);
    }
}
