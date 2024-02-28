<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Pelanggan;
use App\Models\JenisLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Resources\NotaResource;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notas = Nota::latest()->get();

        return NotaResource::collection($notas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'pelanggan' => 'required|exists:pelanggans,email',
            'barangs' => 'required|exists:barangs,name',
            'jenis_layanan' => 'required|exists:jenis_layanans,id',
            'waktu' => 'required|string',
            'tanggal' => 'required|date',
            'total_harga' => 'required|integer'
        ]);

        // No Nota
        $noNota = '#' . Str::upper(Str::random(3)) . Str::random(3);
        while (Nota::where('no_nota', $noNota)->exists()) {
            $noNota = '#' . Str::upper(Str::random(3)) . Str::random(3);
        }
        $data['no_nota'] = $noNota;

        // Pelanggan
        $pelanggan = Pelanggan::where('email', $request->pelanggan)->first();
        $data['pelanggan_id'] = $pelanggan->id;

        // Jenis Layanan
        $jenisLayanan = JenisLayanan::where('id', $request->jenis_layanan)->first();
        $data['jenis_layanan_id'] = $jenisLayanan->id;

        $nota = Nota::create($data);
        $nota->barangs()->attach($request->barangs);

        return response()->json([
            'status' => 'Success',
            'message' => 'Nota Created Successfully',
            'data' => new NotaResource($nota)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Nota $nota)
    {
        return response()->json([
            'data' => new NotaResource($nota)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nota $nota)
    {
        $data = $request->validate([
            'pelanggan' => 'required|exists:pelanggans,email',
            'barangs' => 'required|exists:barangs,name',
            'jenis_layanan' => 'required|exists:jenis_layanans,id',
            'waktu' => 'required|string',
            'tanggal' => 'required|date',
            'total_harga' => 'required|integer'
        ]);

        // Pelanggan
        $pelanggan = Pelanggan::where('email', $request->pelanggan)->first();
        $data['pelanggan_id'] = $pelanggan->id;

        // Jenis Layanan
        $jenisLayanan = JenisLayanan::where('id', $request->jenis_layanan)->first();
        $data['jenis_layanan_id'] = $jenisLayanan->id;

        $nota->barangs()->sync($request->barangs);
        $nota->update($data);

        return response()->json([
            'status' => 'Success',
            'message' => 'Nota Edited Successfully',
            'data' => new NotaResource($nota)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nota $nota)
    {
        $nota->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'Nota Deleted Successfully'
        ]);
    }
}
