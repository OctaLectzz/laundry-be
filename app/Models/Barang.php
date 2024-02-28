<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function jenisLayanans()
    {
        return $this->hasMany(JenisLayanan::class);
    }
    public function notas()
    {
        return $this->hasMany(Nota::class, 'nota_barangs', 'nota_id', 'barang_id');
    }
}
