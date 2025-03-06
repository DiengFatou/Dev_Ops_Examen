<?php

namespace App\Http\Controllers;
use App\Models\Cours;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\EditPostRequest;
class CoursController extends Controller
{
    /**
     * Liste toutes les classes.
     */
    public function index()
    {
        try {
            $cours = Cours::all();
            return view('index', compact('cours'));
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'status_message' => 'Erreur lors de la recuperation des cours',
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Affiche le formulaire pour ajouter une nouveau cours.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Ajoute une nouveau cours dans la base de donnees.
     */
    public function store(CreatePostRequest $request)
    {
        try {
            $cours = Cours::create([
                'nom' => $request->nom,
                'volume_horire' => $request->volume_horire,
                'id_prof' => $request->id_prof,
            ]);

            return redirect()->route('cours.index')->with('success', 'cours ajoutee avec succes');
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'status_message' => 'Erreur lors de l\'ajout du cours',
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Affiche le formulaire pour modifier un cours.
     */
    public function edit($id)
    {
        $cours = Cours::findOrFail($id);
        return view('edit', compact('cours'));
    }

    /**
     * Met à jour un cours existante.
     */
    public function update(EditPostRequest $request, $id)
    {
        try {
            $cours = Cours::findOrFail($id);
            $cours->update([
                'nom' => $request->nom,
                'volume_horire' => $request->volume_horire,
                'id_prof' => $request->id_prof,
            ]);

            return redirect()->route('cours.index')->with('success', 'cours mise a jour avec succes');
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'status_message' => 'Erreur lors de la mise a jour du cours',
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Supprime une classe.
     */
    public function destroy($id)
    {
        try {
            $cours = Cours::findOrFail($id);
            $cours->delete();

            return redirect()->route('cours.index')->with('success', 'Classe supprimee avec succes');
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'status_message' => 'Erreur lors de la suppression du cours',
                'error' => $e->getMessage()
            ]);
        }
    }
}
