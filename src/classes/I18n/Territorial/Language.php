<?php namespace Tlr\I18n\Territorial;

use Tlr\I18n\Language as Eloquent;

class Language extends Eloquent {

	public function territories()
	{
		return $this->belongsToMany('Tlr\I18n\Territorial\Territory');
	}

}
