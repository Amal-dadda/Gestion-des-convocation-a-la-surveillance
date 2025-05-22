<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Surveillant extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'email'];

    public function examens()
    {
        return $this->belongsToMany(Examen::class);
    }
    // Relation avec les examens
    // public function examens()
    // {
    //     return $this->belongsToMany(Examen::class, 'examen_surveillant', 'surveillant_id', 'examen_id');
    // }
    

}