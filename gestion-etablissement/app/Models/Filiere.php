<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Filiere extends Model
{
    use HasFactory;

    
    protected $fillable = ['nom', 'niveau'];

    public function examens()
    {
        return $this->hasMany(Examen::class);
    }
}
