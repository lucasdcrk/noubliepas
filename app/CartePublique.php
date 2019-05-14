<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartePublique extends Model
{
    protected $table = 'cartes_publiques';

	public function matiere()
	{
		return $this->belongsTo(Matiere::class);
	}
}
