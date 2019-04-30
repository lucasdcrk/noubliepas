<?php

namespace App\Http\Controllers;

use App\Matiere;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RevisionController extends Controller
{
    public function choix_matiere() {
        $matieres = Matiere::all();

        return view('reviser.choix_matiere', ['matieres' => $matieres]);
    }

    public function reviser_tout() {
        $cartes = Auth::user()->cartes()->where('prochaine_revision', '<=', Carbon::now())->get();

        if (count($cartes) === 0) {
            return redirect(route('reviser.choix_matiere').'?vide');
        }

        $carte = $cartes[random_int(0, count($cartes)-1)];

        return view('reviser.afficher_carte')->with('carte', $carte);
    }

    public function reviser_matiere(Request $request)
    {
        $matiere = Matiere::findOrFail($request->id);
    }

    public function je_savais(Request $request)
    {

        return redirect(back());
    }
}
