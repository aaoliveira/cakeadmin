<?php
App::uses('AdminAppModel', 'Admin.Model');
/**
 * Privilege Model
 *
 */
class Privilege extends AdminAppModel {

	public function actions($controller){
        $parentClassMethods = get_class_methods(get_parent_class(Inflector::camelize($controller).'Controller'));
        $subClassMethods    = get_class_methods(Inflector::camelize($controller).'Controller');
        $classMethods       = array_diff($subClassMethods,$parentClassMethods);

        foreach($classMethods as $method) {
            if($method{0} <> "_") {
                $classMethodsCleaned[] = $method;
            }
        }
		return $classMethodsCleaned;
	}

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'group_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'controller' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'action' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
