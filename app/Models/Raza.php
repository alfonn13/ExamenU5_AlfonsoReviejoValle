<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raza extends Model
{
    use HasFactory;

    protected $fillable = ['raza'];

    public function personajes()
    {
        return $this->hasMany(Personaje::class);
    }
}
