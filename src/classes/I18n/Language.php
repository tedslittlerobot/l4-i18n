<?php namespace Tlr\I18n;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Language extends Eloquent {

	/**
	 * The mass assignable properties
	 * @var array
	 */
	protected $fillable = ['name', 'iso'];

	/**
	 * Show the language's name and iso code
	 * @author Stef Horner (shorner@wearearchitect.com)
	 * @return string
	 */
	public function getDisplayNameAttribute()
	{
		return "{$this->name} ({$this->iso})";
	}

	/**
	 * Just show the iso code when casting to string
	 * @author Stef Horner (shorner@wearearchitect.com)
	 * @return string
	 */
	public function __toString()
	{
		return $this->iso;
	}

}
