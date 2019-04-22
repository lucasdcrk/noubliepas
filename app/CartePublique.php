<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartePublique extends Model
{
	public function matiere()
	{
		return $this->belongsTo(Matiere::class);
	}
}
