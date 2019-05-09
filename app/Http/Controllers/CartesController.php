<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Matiere;
use App\Carte;
use Illuminate\Http\Request;

class CartesController extends Controller
{
	public function index()
	{
		$cartes = Auth::user()->cartes;
		
		return view('cartes.index')->with('cartes', $cartes);
	}
	
	public function afficher(Request $request)
	{
		$carte = Auth::user()->cartes()->where('id', $request->id)->first();
		abort_unless($carte, 404);
		
		return view('cartes.afficher')->with('carte', $carte);
	}
	
	public function creer()
	{
		$matieres = Matiere::all();
		
		return view('cartes.creer')->with('matieres', $matieres);
	}
	
	public function stocker(Request $request)
	{
		$carte = new Carte();
		$carte->user_id = Auth::user()->id;
		$carte->matiere_id = $request->matiere;
		$carte->recto = $request->recto;
		$carte->verso = $request->verso;
		$carte->prochaine_revision = now();
		$carte->derniere_revision = now();
		$carte->save();
		
		return redirect(route('cartes.index').'?sauvegardé');
	}
	
	public function editer(Request $request)
	{
		$matieres = Matiere::all();
		
		$carte = Auth::user()->cartes()->where('id', $request->id)->first();
		abort_unless($carte, 404);
		
		return view('cartes.editer')->with('carte', $carte)->with('matieres', $matieres);
	}
	
	
	public function sauvegarder(Request $request)
	{
		$carte = Auth::user()->cartes()->where('id', $request->id)->first();
		abort_unless($carte, 404);
		$carte->matiere_id = $request->matiere;
		$carte->recto = $request->recto;
		$carte->verso = $request->verso;
		$carte->save();
		return redirect(route('cartes.index').'?sauvegardé');
	}
	
	public function supprimer(Request $request)
	{
		$carte = Auth::user()->cartes()->where('id', $request->id)->first();
		abort_unless($carte, 404);
		
		$carte->delete();
		
		return redirect(route('cartes.index').'?supprimé');
	}
	
	public function publiques(Request $request)
	{
		$matieres = Matiere::all();
		
		return view('cartes.publiques')->with('matieres', $matieres);
	}
}
