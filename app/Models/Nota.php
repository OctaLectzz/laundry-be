<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }
    public function notabarangs()
    {
        return $this->hasMany(NotaBarang::class);
    }
    public function kiloan()
    {
        return $this->belongsTo(Kiloan::class);
    }
    public function jenisLayanan()
    {
        return $this->belongsTo(JenisLayanan::class);
    }
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
}
