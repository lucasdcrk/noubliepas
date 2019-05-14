<?php

namespace App\Http\Controllers;

use App\Matiere;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RevisionController extends Controller
{
    // Affichage de la page de séléction des matières à réviser
    public function choix_matiere() {
        // Création d'une variable avec toutes les matières
        $matieres = Matiere::all();

        // Affichage de la page
        return view('reviser.choix_matiere', ['matieres' => $matieres]);
    }

    // Tirer un carte au hasard parmis toutes les matières
    public function reviser_tout() {
        // Récupération des cartes appartenant à l'utilisateur 
        $cartes = Auth::user()->cartes();

        // On prends uniquement les cartes qui n'ont pas étés révisées
        $cartes = $cartes->where('prochaine_revision', '<=', Carbon::now())->get();

        // Affichage d'un message si il n'y a aucune carte à réviser
        if (count($cartes) === 0) {
            return redirect(route('reviser.choix_matiere').'?vide');
        }

        // On prends une carte au hasard parmis les cartes à réviser
        $carte = $cartes[random_int(0, count($cartes)-1)];

        // Affichage de la page
        return view('reviser.afficher_carte')->with('carte', $carte);
    }

    // Tirer une carte au hasard parmis une matière précise
    public function reviser_matiere(Request $request)
    {
        // Recherche de la matière, erreur si elle n'existe pas
        $matiere = Matiere::findOrFail($request->id);

        // Récupération des cartes de l'utilisateur
        $cartes = Auth::user()->cartes();
        
        // On prends uniquement les cartes dans la matière choisie
        $cartes = $cartes->where('matiere_id', $matiere->id);
        

        // On prends uniquement les cartes qui n'ont pas étés révisées
        $cartes = $cartes->where('prochaine_revision', '<=', Carbon::now())->get();
        
         // Affichage d'un message si il n'y a aucune carte à réviser
        if (count($cartes) === 0) {
            return redirect(route('reviser.choix_matiere').'?vide');
        }

        // On prends une carte au hasard parmis les cartes à réviser
        $carte = $cartes[random_int(0, count($cartes)-1)];

        // Affichage de la page
        return view('reviser.afficher_carte')->with('carte', $carte);
    }

    // La carte est sue, prochaine révision dans plus longtemps
    public function je_savais(Request $request)
    {
        // Récupération de la carte en question
        $carte = Auth::user()->cartes()->where('id', $request->id)->first();

        // On incrémente le nombre de révisions réussies
        $carte->increment('niveau');

        // On utilise la fonction e^x/4 pour déterminer le
        // nombre de jours avant la prochaine révision
        $jours_avant_revision = round(exp($carte->niveau)/4);

        $carte->prochaine_revision = Carbon::now()->addDays($jours_avant_revision);
        $carte->derniere_revision = now();
        $carte->save();

        // On redirige l'utilisateur vers la page précédente
        return redirect(back());
    }

    // La carte n'est pas sue, prochaine révision dans pas longtemps
    public function je_ne_savais_pas(Request $request)
    {
        $carte = Auth::user()->cartes()->where('id', $request->id)->first();

        // Comme l'utilisateur à oublié, on met le nombre
        // de révisions à sa valeur de départ
        $carte->niveau = 1;
        $carte->derniere_revision = now();
        $carte->prochaine_revision = now();
        $carte->save();

        // On redirige l'utilisateur vers la page précédente
        return redirect(back());
    }
}
