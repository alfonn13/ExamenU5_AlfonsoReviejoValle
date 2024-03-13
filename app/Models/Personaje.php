<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personaje extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'clase',
        'habilidad',
        'imagen',
        'raza_id',
        'user_id'
    ];

    public function raza()
    {
        return $this->belongsTo(Raza::class);
    }
}
