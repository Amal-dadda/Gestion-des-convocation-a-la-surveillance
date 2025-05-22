<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;
class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //Liste des filières
    public function index()
{
    $filieres = Filiere::orderBy('nom')->orderBy('niveau')->get();
    return view('filieres.index', compact('filieres'));

}

//Formulaire d’ajout
public function create()
{
    return view('filieres.create');
}


//selction que des filiere non selectionner
// public function create()
// {  // ****************************************
//     $toutesFilieres = [
//         'CP-1' => 'Année Préparatoire 1',
//         'CP-2' => 'Année Préparatoire 2',
//         'TDIA-1' => 'Transformation Digitale et Intelligence Artificielle 1',
//         'TDIA-2' => 'Transformation Digitale et Intelligence Artificielle 2',
//         'GI-1' => 'Génie Informatique 1',
//         'GI-2' => 'Génie Informatique 2',
//         'GI-3' => 'Génie Informatique 3',
//         'ID-1' => 'Ingénierie des données 1',
//         'ID-2' => 'Ingénierie des données 2',
//         'ID-3' => 'Ingénierie des données 3',
//         'GC-1' => 'Génie Civil 1',
//         'GC-2' => 'Génie Civil 2',
//         'GC-3' => 'Génie Civil 3',
//         'GEER-1' => 'Génie énergétique et énergies renouvelables 1',
//         'GEER-2' => 'Génie énergétique et énergies renouvelables 2',
//         'GEER-3' => 'Génie énergétique et énergies renouvelables 3',
//         'GEE-1' => 'Génie de Eau et Environnement 1',
//         'GEE-2' => 'Génie de Eau et Environnement 2',
//         'GEE-3' => 'Génie de Eau et Environnement 3',
//         'GM-1' => 'Génie Mécanique 1',
//         'GM-2' => 'Génie Mécanique 2',
//         'GM-3' => 'Génie Mécanique 3',
//     ];

//     $filieresExistantes = Filiere::pluck('nom')->toArray();

//     // Supprimer celles déjà utilisées
//     $filieresDisponibles = array_diff_key($toutesFilieres, array_flip($filieresExistantes));

//     return view('filieres.create', compact('filieresDisponibles'));
//     //************************************************** */
// }

//Enregistrer une filière
public function store(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'niveau' => 'required|string|max:255',
    ]);

    Filiere::create($request->only('nom', 'niveau'));

    return redirect()->route('filieres.index')->with('success', 'Filière ajoutée avec succès.');
}

//Formulaire de modification
public function edit($id)
{
    $filiere = Filiere::findOrFail($id);
    return view('filieres.edit', compact('filiere'));
}

//Enregistrer les modifications
public function update(Request $request, $id)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'niveau' => 'required|string|max:255',
    ]);

    $filiere = Filiere::findOrFail($id);
    $filiere->update($request->only('nom', 'niveau'));

    return redirect()->route('filieres.index')->with('success', 'Filière mise à jour.');
}


    
//Supprimer une filière
public function destroy($id)
{
    $filiere = Filiere::findOrFail($id);
    $filiere->delete();

    return redirect()->route('filieres.index')->with('success', 'Filière supprimée.');
}

public function examens($id)
{
    $filiere = Filiere::with('examens')->findOrFail($id);
    return view('examens.index', compact('filiere'));
}


}
