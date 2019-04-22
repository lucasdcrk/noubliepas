<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carte extends Model
{
	use SoftDeletes;

    protected $dates = ['prochaine_revision'];
	
	public function auteur()
	{
		return $this->belongsTo(User::class);
	}
	
	public function matiere()
	{
		return $this->belongsTo(Matiere::class);
	}
}
