<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
	public function cartes()
	{
		return $this->hasMany(Carte::class);
	}

	public function cartes_publiques()
	{
		return $this->hasMany(CartePublique::class);
	}
}
