<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JenisLayananResource extends JsonResource
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
            'barang_id' => $this->barang_id,
            'barang' => $this->barang->name,
            'jenis_cuci' => $this->jenis_cuci,
            'waktu' => $this->waktu,
            'berat' => $this->berat
        ];
    }
}
