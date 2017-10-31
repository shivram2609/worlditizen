<?php
App::uses('AppModel', 'Model');
/**
 * EmailTemplate Model
 *
 * @property Language $Language
 */
class EmailTemplate extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Language' => array(
			'className' => 'Language',
			'foreignKey' => 'language_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		
         );

	public $validate = array (
		
		"email_from" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter email_from."
			),
			"email"=>array (
				"rule" =>"email",
				"message"=>"please enter valid email."
			)
		),
		
		"content" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter content."
			)
		),
	);
	
}
