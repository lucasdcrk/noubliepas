<?php

namespace App\Http\Controllers;

use App\CartePublique;
use Illuminate\Http\Request;
use App\Carte;
use App\Matiere;

class CartesPubliquesController extends Controller
{
	// Affichage des matières
    public function index()
	{
		$matieres = Matiere::all();
		
		return view('cartes_publiques.choix_matiere')->with('matieres', $matieres);
	}

	// Affichage des cartes au sein d'une matière
	public function matiere(Request $request)
	{
		$matiere = Matiere::findOrFail($request->id);

		if (count($matiere->cartes_publiques) === 0) {
		    return redirect(route('cartes-publiques.index').'?vide');
        }

		return view('cartes_publiques.matiere')->with('matiere', $matiere);
	}
	
	// Affichage d'une carte 
	public function afficher(Request $request)
	{
		$carte = CartePublique::where('id', $request->id)->first();
		abort_unless($carte, 404);
		
		return view('cartes-publiques.afficher')->with('carte', $carte);
	}
	
	// Copiage d'une carte
	public function copier(Request $request)
	{
		$carte = CartePublique::where('id', $request->id)->first();
		abort_unless($carte, 404);
		
		$ma_carte = new Carte();
		$ma_carte->matiere_id = $carte->matiere_id;
		$ma_carte->recto = $carte->recto;
		$ma_carte->verso = $carte->verso;
		$ma_carte->save();
		
		return redirect(route('cartes-publiques.index'));
	}
}
