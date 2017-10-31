<?php
App::uses('AppModel', 'Model');
/**
 * CmsPage Model
 *
 * @property Language $Language
 */
class CmsPage extends AppModel {


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
		"content" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter content."
			)
		),
		"slug" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter slug."
			)
		),
		"seo_url" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter url."
			)
		),
		"header" => array (
			"notempty" => array (
				"rule" => "notBlank",
				"message" => "Please enter url."
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
		
	);
}


