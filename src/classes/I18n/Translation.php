<?php namespace Tlr\I18n;

use Illuminate\Database\Eloquent\Model as Eloquent;

abstract class Translation extends Eloquent {

	/**
	 * Get the model that this is a translation of
	 * @return BelongsTo
	 */
	public function parent()
	{
		$class = str_replace('Local', '', get_class($this));

		return $this->belongsTo( $class, snake_case(class_basename($class . 'Id')) );
	}

	/**
	 * The language of this translation
	 * @return BelongsTo
	 */
	public function language()
	{
		return $this->belongsTo('Tlr\I18n\Language', 'in_language');
	}

}
