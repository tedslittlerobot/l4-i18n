<?php namespace Tlr\I18n;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Tlr\I18n\Language;

abstract class Translatable extends Eloquent {

	/**
	 * A translation cache
	 * @var array
	 */
	protected $_translationCache = array();

	/**
	 * Get a translation in the given language. If no language is given,
	 * return the first translation made
	 * @param  Language $language
	 * @param  boolean  $fail     whether or not to fail if there are none
	 * @return Translation
	 */
	public function translate( Language $language = null, $fail = true )
	{
		$key = $language ? $language->slug : 'first';

		// if it has already been cached, load dat cache!
		if ( array_key_exists( $key, $this->_translationCache ) )
		{
			return $this->_translationCache[ $key ];
		}

		// start the query
		$query = $this->translations();

		if ( ! is_null( $language ) )
		{
			$query->where( 'in_language', $language->id );
		}

		// cache dat shit, then return it
		return $_translationCache[ $key ] = $fail ? $query->firstOrFail() : $query->first();
	}

	/**
	 * Get the model's translations
	 * @return HasMany
	 */
	public function translations()
	{
		return $this->hasMany( $this->getTranslationName() );
	}

	/**
	 * Generate the name for the translation class
	 * @return string
	 */
	protected function getTranslationName()
	{
		$class = explode('\\', get_class($this));
		$class[ count($class) - 1 ] = 'Local' . class_basename( $this );

		return implode('\\', $class);
	}

	public function routeParams( Language $language, $extras = array() )
	{
		$params = $this->parent->routeParams($language);
		$params[snake_case(class_basename($this))] = $this->translate($language)->slug;

		return array_merge($params, $extras);
	}

}
