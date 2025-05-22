<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Examen extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'module',
        'date',
        'heure',
        'duree',
        'salle',
        'filiere_id',
    ];
    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    // Relation avec les surveillants
    // public function surveillants()
    // {
    //     return $this->belongsToMany(Surveillant::class, 'examen_surveillant', 'examen_id', 'surveillant_id');
    // }
        public function surveillants()
{
    return $this->belongsToMany(Surveillant::class);
}
}
