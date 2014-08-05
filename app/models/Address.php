<?php

class Address extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'address' => 'required|unique:addresses',
		'spots' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['address', 'spots', 'reserved'];
}
