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
		
		"username" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter email."
			),
			
			"email" => array (
				"rule" => "email",
				"message" => "Please enter valid email."
			),
			
			"isunique" => array (
				"rule" => "isunique",
				"message" => "email is already in use."
			),
			
		),
		"password" => array (
		    "notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter Password."
				
			),
				
			"length" => array (
				"rule" => array ('between', 6, 20),
				"message" => "Your password must be between 6 and 20 characters."
			)
		),
		"confirm_password" => array(
            "notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter confirm Password."
				
			),
              "match"=>array(
              "rule" => "validate_password",
              "message" => "Passwords do not match"
      )
    ),
		
		
		"registration_type" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter Registration Type."
			)
		),
		"clientname" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter  client name."
			)
		),
		"clientsignature" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"filetype" => "jpg","png",
				"message" => "Please select signature."
			)
		)
		
	);
	
	function validate_password() {
		return (isset($this->data['User']['confirm_password']) && ($this->data['User']['password'] == $this->data['User']['confirm_password']))?true:false;
	}

}
