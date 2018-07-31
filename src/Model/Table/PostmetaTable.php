<?php

  namespace App\Model\Table;
  use Cake\ORM\Query;
  use Cake\ORM\RulesChecker;
  use Cake\ORM\Table;
  use Cake\Validation\Validator;
	use Search\Manager;
	use Cake\ORM\TableRegistry;
  class PostmetaTable extends Table{

    public function initialize(array $config){

      parent::initialize($config);

      $this->table('postmeta');
			    $this->primaryKey(['id']);
           
      $this->belongsTo('post', ['className' => 'Post','foreignKey'=>'post_id']);
	

    }

    public function beforeSave($event, $entity, $options){
			
    }
	

  }