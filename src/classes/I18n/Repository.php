<?php namespace Tlr\I18n;

use Tlr\Support\Repository as SupportRepository;
use DB;

abstract class Repository extends SupportRepository {

	public $messages;

	public function fill()
	{
		$this->translation->fill( $this->data() );
	}

	/**
	 * Save the models
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
