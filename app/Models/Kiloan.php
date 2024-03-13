<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kiloan extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function notas()
    {
        return $this->hasMany(Nota::class);
    }
}
