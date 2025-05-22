<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Etudiant;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $filieres = Filiere::orderBy('nom')->orderBy('niveau')->get();
        return view('notes.filieres', compact('filieres'));
    }

    public function showEtudiants($filiere_id)
    {
        $filiere = Filiere::findOrFail($filiere_id);
        $etudiants = $filiere->etudiants;
        return view('notes.etudiants', compact('etudiants', 'filiere'));
    }

    public function showNotes($etudiant_id)
    {
        $etudiant = Etudiant::findOrFail($etudiant_id);
        return view('notes.notes', compact('etudiant'));
    }

    public function store(Request $request, $etudiant_id)
    {
        $request->validate([
            'module' => 'required',
            'note' => 'required|numeric|min:0|max:20',
        ]);

        Note::create([
            'etudiant_id' => $etudiant_id,
            'module' => $request->module,
            'note' => $request->note,
        ]);

        return redirect()->back()->with('success', 'Note ajoutée');
    }

    public function destroy($note_id)
    {
        $note = Note::findOrFail($note_id);
        $note->delete();
        return back()->with('success', 'Note supprimée');
    }
}