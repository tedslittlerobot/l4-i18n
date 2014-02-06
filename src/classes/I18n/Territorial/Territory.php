<?php namespace Tlr\I18n\Territorial;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Territory extends Eloquent {

	public function languages()
	{
		return $this->belongsToMany('Tlr\I18n\Territorial\Language');
	}
}
