<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'no_nota' => $this->no_nota,
            'pelanggan_id' => $this->pelanggan_id,
            'jenis_layanan_id' => $this->jenis_layanan_id,
            'barang_id' => $this->barang_id,
            'pelanggan' => $this->pelanggan->user->name,
            'barang' => $this->barang,
            'jenis_cuci' => $this->jenisLayanan->jenis_cuci,
            'waktu' => $this->waktu,
            'tanggal' => $this->tanggal,
            'total_harga' => $this->total_harga
        ];
    }
}
