<?php namespace Tlr\Territorial;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Territory extends Eloquent {

	public function languages()
	{
		return $this->belongsToMany('Tlr\Territorial\Language');
	}
}
