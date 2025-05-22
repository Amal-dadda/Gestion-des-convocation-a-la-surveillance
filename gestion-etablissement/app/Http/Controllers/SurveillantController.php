<?php

namespace App\Http\Controllers;

use App\Models\Surveillant;
use Illuminate\Http\Request;

class SurveillantController extends Controller
{
    //   // Afficher la liste des surveillants
    // public function index()
    // {
    //     $surveillants = Surveillant::all();
    //     return view('surveillants.index', compact('surveillants'));
    // }

    // // Afficher le formulaire pour créer un surveillant
    // public function create()
    // {
    //     return view('surveillants.create');
    // }

    // // Enregistrer un nouveau surveillant
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nom' => 'required|string|max:255',
    //         'email' => 'required|email|unique:surveillants,email'
    //     ]);

    //     Surveillant::create($request->all());

    //     return redirect()->route('surveillants.index')->with('success', 'Surveillant ajouté avec succès');
    // }

    // // Afficher le formulaire d'édition d'un surveillant
    // public function edit($id)
    // {
    //     $surveillant = Surveillant::findOrFail($id);
    //     return view('surveillants.edit', compact('surveillant'));
    // }

    // // Mettre à jour un surveillant
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'nom' => 'required|string|max:255',
    //         'email' => 'required|email'
    //     ]);

    //     $surveillant = Surveillant::findOrFail($id);
    //     $surveillant->update($request->all());

    //     return redirect()->route('surveillants.index')->with('success', 'Surveillant modifié avec succès');
    // }

    // // Supprimer un surveillant
    // public function destroy($id)
    // {
    //     $surveillant = Surveillant::findOrFail($id);
    //     $surveillant->delete();

    //     return redirect()->route('surveillants.index')->with('success', 'Surveillant supprimé avec succès');
    // }


    public function index()
    {
        $surveillants = Surveillant::all();
        return view('surveillants.index', compact('surveillants'));
    }

    public function create()
    {
        return view('surveillants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:surveillants',
        ]);

        Surveillant::create($request->all());
        return redirect()->route('surveillants.index')->with('success', 'Surveillant ajouté');
    }

    public function destroy($id)
    {
        $surveillant = Surveillant::findOrFail($id);
        $surveillant->delete();
        return redirect()->route('surveillants.index')->with('success', 'Surveillant supprimé');
    }
}
