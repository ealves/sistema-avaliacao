<?php
App::uses('AppModel', 'Model');
/**
 * QuestionaryQuestion Model
 *
 * @property Questionary $Questionary
 * @property Question $Question
 */
class QuestionaryQuestion extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'questionary_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'question_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Questionary' => array(
			'className' => 'Questionary',
			'foreignKey' => 'questionary_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'Question' => array(
            'className' => 'Question',
            'foreignKey' => 'question_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )

	);

   /* public $hasMany = array(
        'Question' => array(
            'className' => 'Question',
            'foreignKey' => 'question_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );*/
}
