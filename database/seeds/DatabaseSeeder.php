<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $matieres = [
            'Anglais - Notions',
            'Anglais - Vocabulaire',
            'Mathématiques',
            'Physique',
            'Chimie',
            'Histoire',
            'Géographie',
            'Allemand',
            'Espagnol'
        ];

        foreach($matieres as $m) {
            $matiere = new \App\Matiere();
            $matiere->nom = $m;
            $matiere->save();
        }

    }
}
