<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
	public function cartes()
	{
		return $this->hasMany(Carte::class);
	}
}
