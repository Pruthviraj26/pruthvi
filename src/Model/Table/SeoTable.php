<?php
namespace App\Model\Table;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;
use Cake\Utility\Security;

class SeoTable extends Table{
	public function initialize(array $config){
		parent::initialize($config);
		$this->table('seo');
	
		$this->primaryKey('id');
 
			
      $this->addBehavior('Timestamp', [
      'events' => [
        'Model.beforeSave' => [
          'created' => 'new',
          'modified' => 'always'
          ]
        ]

      ]);

			$this->belongsTo('post');
    }

	 public function beforeSave($event, $entity, $options){
	
    }
  }