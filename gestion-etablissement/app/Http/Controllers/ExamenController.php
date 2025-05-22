<?php

namespace App\Http\Controllers;



use App\Models\Examen;
use App\Models\Filiere;
use App\Models\Surveillant;
use Illuminate\Http\Request;
class ExamenController extends Controller
{

    public function index()
{
    $examens = Examen::with('surveillants')->latest()->get();
    return view('examens.index', compact('examens'));
}
    /**
     * Display a listing of the resource.
     */
 // 🔹 Affiche le formulaire d'ajout d'un examen
    public function create($filiere_id)
    {
        $filiere = Filiere::findOrFail($filiere_id);
        return view('examens.create', compact('filiere'));
    }

    // 🔹 Enregistre un nouvel examen
    public function store(Request $request)
    {
        $request->validate([
            'module' => 'required|string',
            'date' => 'required|date',
            'heure' => 'required',
            'duree' => 'required|integer',
            'salle' => 'required|string',
            'filiere_id' => 'required|exists:filieres,id'
        ]);

        Examen::create($request->all());

        return redirect()->route('filieres.examens', $request->filiere_id)->with('success', 'Examen ajouté avec succès');
    }

    // 🔹 Affiche le formulaire d'édition
    public function edit($id)
    {
        $examen = Examen::findOrFail($id);
        return view('examens.edit', compact('examen'));
    }

    // 🔹 Met à jour un examen
    public function update(Request $request, $id)
    {
        $request->validate([
            'module' => 'required|string',
            'date' => 'required|date',
            'heure' => 'required',
            'duree' => 'required|integer',
            'salle' => 'required|string'
        ]);

        $examen = Examen::findOrFail($id);
        $examen->update($request->all());

        return redirect()->route('filieres.examens', $examen->filiere_id)->with('success', 'Examen mis à jour');
    }

    // 🔹 Supprime un examen
    public function destroy($id)
    {
        $examen = Examen::findOrFail($id);
        $filiereId = $examen->filiere_id;
        $examen->delete();

        return redirect()->route('filieres.examens', $filiereId)->with('success', 'Examen supprimé');
    }

//survaillant
public function surveillants($id)
{
    $examen = Examen::with('surveillants')->findOrFail($id);

    // Cherche les surveillants non occupés à la même date/heure
    $disponibles = Surveillant::whereDoesntHave('examens', function ($query) use ($examen) {
        $query->where('date', $examen->date)->where('heure', $examen->heure);
    })->get();

    return view('examens.surveillants', compact('examen', 'disponibles'));
}

public function ajouterSurveillant(Request $request, $id)
{
    $request->validate([
        'surveillant_id' => 'required|exists:surveillants,id',
    ]);

    $examen = Examen::findOrFail($id);
    $surveillantId = $request->surveillant_id;

    // Vérifie si ce surveillant est déjà affecté à un autre examen au même moment
    $estOccupe = Examen::whereHas('surveillants', function ($query) use ($surveillantId) {
        $query->where('surveillant_id', $surveillantId);
    })->where('date', $examen->date)
      ->where('heure', $examen->heure)
      ->exists();

    if ($estOccupe) {
        return redirect()->route('examens.surveillants', $id)->with('error', 'Ce surveillant est déjà affecté à un autre examen à la même date et heure.');
    }

    $examen->surveillants()->attach($surveillantId);

    return redirect()->route('examens.surveillants', $id)->with('success', 'Surveillant ajouté avec succès.');
}


public function supprimerSurveillant($id, $surveillantId)
{
    $examen = Examen::findOrFail($id);
    $examen->surveillants()->detach($surveillantId);

    return redirect()->route('examens.surveillants', $id)->with('success', 'Surveillant supprimé.');
}

public function listeSurveillants($id)
{
    $examen = Examen::with('surveillants')->findOrFail($id);

    // Récupère les surveillants disponibles à cette date/heure
    $disponibles = Surveillant::whereDoesntHave('examens', function ($query) use ($examen) {
        $query->where('date', $examen->date)->where('heure', $examen->heure);
    })->get();

    return view('examens.surveillants', compact('examen', 'disponibles'));
}




//     // 🔹 Formulaire pour ajouter des surveillants
//     public function ajouterSurveillant($id)
//     {   
        
//         $examen = Examen::with('surveillants')->findOrFail($id);
//         $surveillantsDisponibles = Surveillant::whereDoesntHave('examens', function ($query) use ($examen) {
//             $query->where('date', $examen->date)->where('heure', $examen->heure);
//         })->get();

//         return view('examens.ajouter_surveillant', compact('examen', 'surveillantsDisponibles'));
//     }

//     // 🔹 Enregistrer les surveillants affectés à l'examen
//     public function storeSurveillant(Request $request, $id)
//     {
//         $examen = Examen::findOrFail($id);
//         $request->validate([
//             'surveillant_ids' => 'required|array'
//         ]);
//         $examen->surveillants()->attach($request->surveillant_ids);

//         return redirect()->route('filieres.examens', $examen->filiere_id)->with('success', 'Surveillants ajoutés');
//     }

//     //survaillant
//     public function surveillants($id)
// {
//     $examen = Examen::with('surveillants')->findOrFail($id);
//     return view('surveillants.index', compact('examen'));
// }


}



