<?php

class Film extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'films';

	public function ratings()
	{
		return $this->hasMany('Rating');
	}
}
