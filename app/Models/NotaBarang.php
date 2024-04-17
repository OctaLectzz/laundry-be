<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaBarang extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function nota()
    {
        return $this->belongsTo(Nota::class);
    }
}
