<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carte extends Model
{
    protected $dates = ['prochaine_revision', 'derniere_revision'];
	
	public function auteur()
	{
		return $this->belongsTo(User::class);
	}
	
	public function matiere()
	{
		return $this->belongsTo(Matiere::class);
	}
}
