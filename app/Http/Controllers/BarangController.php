<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Resources\BarangResource;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::latest()->get();

        return BarangResource::collection($barangs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:barangs',
            'harga' => 'required|integer'
        ]);

        $barang = Barang::create($data);

        return response()->json([
            'status' => 'Success',
            'message' => 'Barang Created Successfully',
            'data' => new BarangResource($barang)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        return response()->json([
            'data' => new BarangResource($barang)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'harga' => 'required|integer'
        ]);

        $barang->update($data);

        return response()->json([
            'status' => 'Success',
            'message' => 'Barang Edited Successfully',
            'data' => new BarangResource($barang)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'Barang Deleted Successfully'
        ]);
    }
}
