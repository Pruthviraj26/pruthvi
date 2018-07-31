<?php
namespace App\Model\Table;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;
use Cake\Utility\Security;

class TermsTable extends Table{
	public function initialize(array $config){
		parent::initialize($config);
		$this->table('terms');
		 $this->addBehavior('Tree');
		$this->displayField('name');		
		$this->primaryKey('id');
 
			
      $this->addBehavior('Timestamp', [
      'events' => [
        'Model.beforeSave' => [
          'created' => 'new',
          'modified' => 'always'
          ]
        ]

      ]);

	
			$this->hasMany('Cards');
			$this->belongsTo('Parent', ['className' => 'Terms','foreignKey'=>'parent_id']);
			$this->hasMany('child', ['className' => 'Terms','foreignKey'=>'parent_id']);
			$this->belongsTo('Creator', ['className' => 'Users','foreignKey'=>'created_by']);
      $this->belongsTo('Modifier', ['className' => 'Users','foreignKey'=>'modified_by']);
		
   

    }

	 public function beforeSave($event, $entity, $options){
	
    }
  }