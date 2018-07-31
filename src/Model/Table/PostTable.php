<?php
namespace App\Model\Table;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;
use Cake\Utility\Security;

class PostTable extends Table{
	public function initialize(array $config){
		parent::initialize($config);
		$this->table('Post');
		 $this->addBehavior('Tree');
		$this->displayField('title');		
		$this->primaryKey('id');
 
			
      $this->addBehavior('Timestamp', [
      'events' => [
        'Model.beforeSave' => [
          'created' => 'new',
          'modified' => 'always'
          ]
        ]

      ]);

	
			
			$this->hasMany('postterms');
			$this->hasOne('seo', ['className' => 'Seo','foreignKey'=>'post_id']);
			$this->belongsTo('Creator', ['className' => 'Users','foreignKey'=>'created_by']);
      $this->belongsTo('Modifier', ['className' => 'Users','foreignKey'=>'modified_by']);
		
   

    }

	 public function beforeSave($event, $entity, $options){
	
    }
  }