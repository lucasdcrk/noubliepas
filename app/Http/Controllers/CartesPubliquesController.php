<?php

namespace App\Http\Controllers;

use App\CartePublique;
use Illuminate\Http\Request;

class CartesPubliquesController extends Controller
{
    public function index()
	{
		$cartes = CartePublique::all();
		
		return view('cartes-publiques.index')->with('cartes', $cartes);
	}
	
	public function afficher(Request $request)
	{
		$carte = CartePublique::where('id', $request->id)->first();
		abort_unless($carte, 404);
		
		return view('cartes-publiques.afficher')->with('carte', $carte);
	}
	
	public function creer()
	{
		$matieres = Matiere::all();
		
		return view('cartes-publiques.creer')->with('matieres', $matieres);
	}
	
	public function stocker(Request $request)
	{
		$carte = new CartePublique();
		$carte->user_id = Auth::user()->id;
		$carte->matiere_id = $request->matiere;
		$carte->recto = $request->recto;
		$carte->verso = $request->verso;
		$carte->save();
		
		return redirect(route('cartes-publiques.index').'?sauvegardé');
	}
	
	public function editer(Request $request)
	{
		$matieres = Matiere::all();
		
		$carte = CartePublique::where('id', $request->id)->first();
		abort_unless($carte, 404);
		
		return view('cartes-publiques.editer')->with('carte', $carte)->with('matieres', $matieres);
	}
	
	
	public function sauvegarder(Request $request)
	{
		$carte = CartePublique::where('id', $request->id)->first();
		abort_unless($carte, 404);
		$carte->matiere_id = $request->matiere;
		$carte->recto = $request->recto;
		$carte->verso = $request->verso;
		$carte->save();
		return redirect(route('cartes-publiques.index').'?sauvegardé');
	}
	
	public function supprimer(Request $request)
	{
		$carte = CartePublique::where('id', $request->id)->first();
		abort_unless($carte, 404);
		
		$carte->delete();
		
		return redirect(route('cartes-publiques.index').'?supprimé');
	}
	
	public function publiques(Request $request)
	{
		$matieres = Matiere::all();
		
		return view('cartes.publiques')->with('matieres', $matieres);
	}
}
