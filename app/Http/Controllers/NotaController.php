<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Barang;
use App\Models\NotaBarang;
use Illuminate\Support\Str;
use App\Models\JenisLayanan;
use Illuminate\Http\Request;
use App\Http\Resources\NotaResource;
use App\Http\Resources\ChartResource;
use App\Http\Resources\PieResource;

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

    public function chart()
    {
        // Mengambil semua data nota
        $notas = Nota::all();

        // Mengelompokkan data nota berdasarkan bulan pembuatannya
        $groupedData = $notas->groupBy(function ($nota) {
            return $nota->created_at->format('M');
        });

        // Menghitung total pendapatan di setiap bulan
        $incomeData = $this->generateEmptyIncomeArray();

        foreach ($groupedData as $month => $data) {
            $totalIncome = $data->sum('jumlah');
            $incomeData[$month] = $totalIncome;
        }

        // Mengembalikan data dalam format yang sesuai untuk chart
        return new ChartResource($incomeData);
    }

    public function pie()
    {
        $barangs = Barang::all();

        $jumlahBarang = [];

        $notabarangs = NotaBarang::all();

        foreach ($barangs as $barang) {
            $jumlah = $notabarangs->where('barang', $barang->name)->count();

            $jumlahBarang[$barang->name] = $jumlah;
        }

        return new PieResource($jumlahBarang);
    }


    // Fungsi untuk menghasilkan array kosong untuk setiap bulan
    private function generateEmptyIncomeArray()
    {
        $months = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ];

        $emptyArray = [];

        foreach ($months as $month) {
            $emptyArray[$month] = 0;
        }

        return $emptyArray;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function storeSatuan(Request $request)
    {
        $data = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'jenis_layanan_id' => 'nullable|exists:jenis_layanans,id',
            'waktu' => 'required',
            'total_harga' => 'required',
            'diskon' => 'required|integer',
            'jumlah' => 'required'
        ]);
        $data['jenis'] = 'Barang Satuan';

        // No Nota
        $noNota = '#' . Str::upper(Str::random(3)) . Str::random(3);
        while (Nota::where('no_nota', $noNota)->exists()) {
            $noNota = '#' . Str::upper(Str::random(3)) . Str::random(3);
        }
        $data['no_nota'] = $noNota;

        $nota = Nota::create($data);

        return response()->json([
            'status' => 'Success',
            'message' => 'Nota Created Successfully',
            'data' => new NotaResource($nota)
        ]);
    }

    public function storeSatuanBarang(Request $request)
    {
        $data = $request->validate([
            'nota_id' => 'required',
            'barang' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'jumlah_barang' => 'required|integer|min:1',
            'total_harga' => 'required|numeric|min:0'
        ]);

        $NotaBarang = NotaBarang::create($data);
        $nota = Nota::findOrFail($NotaBarang->nota_id);

        return response()->json([
            'status' => 'Success',
            'message' => 'Nota Created Successfully',
            'data' => new NotaResource($nota)
        ]);
    }

    public function storeKiloan(Request $request)
    {
        $data = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'waktu' => 'required',
            'kiloan_id' => 'required|exists:kiloans,id',
            'berat' => 'required',
            'jenis_layanan_id' => 'required|exists:jenis_layanans,id',
            'total_harga' => 'required',
            'diskon' => 'required|integer',
            'jumlah' => 'required'
        ]);
        $data['jenis'] = 'Paket Kiloan';

        // No Nota
        $noNota = '#' . Str::upper(Str::random(3)) . Str::random(3);
        while (Nota::where('no_nota', $noNota)->exists()) {
            $noNota = '#' . Str::upper(Str::random(3)) . Str::random(3);
        }
        $data['no_nota'] = $noNota;

        $nota = Nota::create($data);

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
            'jenis' => 'required|string|max:255',
            'nama_pelanggan' => 'required|string|max:255',
            'barangs' => 'required|exists:barangs,name',
            'jenis_layanan' => 'nullable|exists:jenis_layanans,name',
            'kiloan_id' => 'nullable|exists:kiloans,id',
            'waktu' => 'required|string',
            'tanggal' => 'required|date',
            'total_harga' => 'required|integer'
        ]);

        // Jenis Layanan
        $jenisLayanan = JenisLayanan::where('jenis_cuci', $request->jenis_layanan)->first();
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
