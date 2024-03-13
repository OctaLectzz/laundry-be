<?php

namespace App\Http\Controllers;

use App\Models\Kiloan;
use Illuminate\Http\Request;
use App\Http\Resources\KiloanResource;

class KiloanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kiloans = Kiloan::latest()->get();

        return KiloanResource::collection($kiloans);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'paket' => 'required|string|max:255',
            'harga' => 'required|integer',
            'description' => 'nullable|string'
        ]);

        $kiloan = Kiloan::create($data);

        return response()->json([
            'status' => 'Success',
            'message' => 'Kiloan Created Successfully',
            'data' => new KiloanResource($kiloan)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kiloan $kiloan)
    {
        return response()->json([
            'data' => new KiloanResource($kiloan)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kiloan $kiloan)
    {
        $data = $request->validate([
            'paket' => 'required|string|max:255',
            'harga' => 'required|integer',
            'description' => 'nullable|string'
        ]);

        $kiloan->update($data);

        return response()->json([
            'status' => 'Success',
            'message' => 'Kiloan Edited Successfully',
            'data' => new KiloanResource($kiloan)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kiloan $kiloan)
    {
        $kiloan->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'Kiloan Deleted Successfully'
        ]);
    }
}
