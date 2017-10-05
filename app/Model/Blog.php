<?php
App::uses('AppModel', 'Model');
/**
 * Blog Model
 *
 * @property Language $Language
 */
class Blog extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';


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
		"title" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter title."
			)
		),
		"content" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter content."
			)
		),
		"meta_title" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter meta title."
			)
		),
		"meta_keyword" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter meta keyword."
			)
		),
		"url" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter url."
			)
		),
	);
}
