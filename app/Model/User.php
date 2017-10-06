<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property UserDetail $UserDetail
 */
class User extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasOne = array(
		'UserDetail' => array(
			'className' => 'UserDetail',
			'foreignKey' => 'user_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	/* @var array
 */
	public $displayField = 'name';
	
	public $validate = array (
	"user_type_id" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter User Type."
			)
		),
		"name" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter Name."
			)
		),
		"username" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter User Name."
			)
		),
		"password" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter password."
			)
		),
		"registration_type" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter Registration Type."
			)
		),
		"password_token" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter Password Token."
			)
		),
	);

}
