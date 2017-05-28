<?php

use Carbon\Carbon;

class Rating extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ratings';

	protected $fillable = ['film_id', 'rating'];

	protected $rules = [
		'film_id'   => 'required|integer',
		'rating'	=> 'required|numeric|min:0|max:10'
	];

	protected $errors;

	
	public function isValid()
    {
        $validator = Validator::make($this->attributes, $this->rules);

        if ($validator->passes())
        {
            return true;
        }

        $this->setErrors($validator->messages());

        return false;
    }


	public function film()
	{
		return $this->belongsTo('Film');
	}


	public function save(array $options = array())
	{
		$this->attributes['user_id'] = Auth::id();
		$this->attributes['date'] = Carbon::now();
	    parent::save($options);

	}

	public function setErrors($errors)
	{
		$this->errors = $errors;
	}

	public function getErrors()
	{
		return $this->errors;
	}

}
