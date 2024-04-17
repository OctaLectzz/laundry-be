<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
            'jenis' => $this->jenis,
            'jenis_layanan_id' => $this->jenis_layanan_id,
            'kiloan_id' => $this->kiloan_id,
            'nama_pelanggan' => $this->nama_pelanggan,
            'berat' => $this->berat ? $this->berat : 0,
            'waktu' => Carbon::parse($this->waktu)->format('d-m-Y H:i'),
            'total_harga' => $this->total_harga,
            'diskon' => $this->diskon,
            'jumlah' => $this->jumlah,
            'jenis_layanan' => $this->jenisLayanan ? new JenisLayananResource($this->jenisLayanan) : null,
            'kiloan' => $this->kiloan ? new KiloanResource($this->kiloan) : null,
            'notabarangs' => $this->notabarangs ? NotaBarangResource::collection($this->notabarangs) : null,
            'created_at' => Carbon::parse($this->created_at)->format('d F Y H:i')
        ];
    }
}
