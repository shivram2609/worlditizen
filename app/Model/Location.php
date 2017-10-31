<?php
App::uses('AppModel', 'Model');
/**
 * Location Model
 *
 */
class Location extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	
	public $validate = array (
		"name" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter location name."
			)
		),
		"short_code" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter short code."
			)
		),
		"currency" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter currency."
			)
		),
		"amount" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter amount."
			)
		),
	);
		

}
