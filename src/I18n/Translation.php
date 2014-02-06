<?php namespace Tlr\I18n;

use Illuminate\Database\Eloquent\Model as Eloquent;

abstract class Translation extends Eloquent {

	/**
	 * Get the model that this is a translation of
	 * @author Stef Horner (shorner@wearearchitect.com)
	 * @return BelongsTo
	 */
	public function parent()
	{
		$class = str_replace('Local', '', get_class($this));

		return $this->belongsTo( $class, snake_case(class_basename($class . 'Id')) );
	}

	/**
	 * The language of this translation
	 * @author Stef Horner (shorner@wearearchitect.com)
	 * @return BelongsTo
	 */
	public function language()
	{
		return $this->belongsTo('Tlr\I18n\Language', 'in_language');
	}

}
