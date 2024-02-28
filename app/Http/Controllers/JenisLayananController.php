<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use Illuminate\Http\Request;
use App\Http\Resources\JenisLayananResource;
use App\Models\Barang;

class JenisLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenislayanans = Jenislayanan::latest()->get();

        return JenislayananResource::collection($jenislayanans);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'barang' => 'required',
            'jenis_cuci' => 'required|string|max:255',
            'waktu' => 'required|string|max:255',
            'berat' => 'required|string|max:255'
        ]);

        // Barang
        $barang = Barang::where('name', $request->barang)->first();
        $data['barang_id'] = $barang->id;

        $jenislayanan = Jenislayanan::create($data);

        return response()->json([
            'status' => 'Success',
            'message' => 'Jenislayanan Created Successfully',
            'data' => new JenislayananResource($jenislayanan)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenislayanan $jenislayanan)
    {
        return response()->json([
            'data' => new JenislayananResource($jenislayanan)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jenislayanan $jenislayanan)
    {
        $data = $request->validate([
            'barang' => 'required',
            'jenis_cuci' => 'required|string|max:255',
            'waktu' => 'required|string|max:255',
            'berat' => 'required|string|max:255'
        ]);

        // Barang
        $barang = Barang::where('name', $request->barang)->first();
        $data['barang_id'] = $barang->id;

        $jenislayanan->update($data);

        return response()->json([
            'status' => 'Success',
            'message' => 'Jenislayanan Edited Successfully',
            'data' => new JenislayananResource($jenislayanan)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jenislayanan $jenislayanan)
    {
        $jenislayanan->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'Jenislayanan Deleted Successfully'
        ]);
    }
}
