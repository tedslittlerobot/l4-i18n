<?php namespace Tlr\Territorial;

use Tlr\I18n\Language as Eloquent;

class Language extends Eloquent {

	public function territories()
	{
		return $this->belongsToMany('Tlr\Territorial\Territory');
	}

}
