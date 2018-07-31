<?php
namespace App\Model\Table;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;
use Cake\Utility\Security;

class UsersTable extends Table{
	public function initialize(array $config){
		parent::initialize($config);
		$this->table('users');
		$this->displayField('username');
		
		$this->primaryKey('id');
 			
      $this->addBehavior('Timestamp', [
      'events' => [
        'Model.beforeSave' => [
          'created' => 'new',
          'modified' => 'always'
          ]
        ]

      ]);
		
			$this->addBehavior('CreatorModifier.CreatorModifier', [
				'events' => [
					'Model.beforeSave' => [
						'created_by' => 'new',
						'modified_by' => 'always'
					]
				]
			]);
		
			$this->belongsTo('Creator', ['className' => 'Users','foreignKey'=>'created_by']);
      $this->belongsTo('Modifier', ['className' => 'Users','foreignKey'=>'modified_by']);
			$this->hasMany('Cards');
    }

  /*  public function getActiveSlideList($conditions=null){      
      $conditions['AND'][] = ['Banner.status'=>'ACTIVE','Banner.type'=>'HOME PAGE SLIDE'];
      return $this->find()->where($conditions)->toArray();

    }

    public function getActiveSidebarAdList($conditions=null){      
      $conditions['AND'][] = ['Banner.status'=>'ACTIVE','Banner.type'=>'SIDEBAR AD'];
      return $this->find()->where($conditions)->toArray();

    }


    public function getActiveFooterAdList($conditions=null){      
      $conditions['AND'][] = ['Banner.status'=>'ACTIVE','Banner.type'=>'FOOTER AD'];
      return $this->find()->where($conditions)->toArray();

    }
*/
	
	 public function beforeSave($event, $entity, $options){
		 //	$entity->password = Security::hash($entity->password);
    }
  }