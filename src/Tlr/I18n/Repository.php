<?php namespace Tlr\I18n;

use Repository as SupportRepository;
use DB;

abstract class Repository extends SupportRepository {

	public $messages;

	public function fill()
	{
		$this->translation->fill( $this->data() );
	}

	/**
	 * Save the models
	 * @author Stef Horner (shorner@wearearchitect.com)
	 */
	public function save()
	{
		DB::transaction(function()
		{
			$this->model->save();
			$this->model->translations()->save($this->translation);
		});
	}

}
