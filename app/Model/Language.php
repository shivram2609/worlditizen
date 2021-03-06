<?php
App::uses('AppModel', 'Model');
/**
 * Language Model
 *
 * @property CmsPage $CmsPage
 */
class Language extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'CmsPage' => array(
			'className' => 'CmsPage',
			'foreignKey' => 'language_id',
			'dependent' => false,
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
	
	public $validate = array (
		"name" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter language name."
			)
		),
		"short_code" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter short code."
			)
		),
	);

}
