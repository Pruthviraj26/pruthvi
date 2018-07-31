<?php
namespace App\Model\Table;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;
use Cake\Utility\Security;

class SiteconfigsTable extends Table{
	public function initialize(array $config){
		parent::initialize($config);
		$this->table('siteconfigs');
		$this->displayField('title');		
		$this->primaryKey('id');
 		$this->addBehavior('Search.Search');
 		$this->searchManager()
            ->value('id')
            ->add('q', 'Search.Like', [
                'before' => true,
                'after' => true,
                'fieldMode' => 'OR',
                'comparison' => 'LIKE',
                'wildcardAny' => '*',
                'wildcardOne' => '?',
                'field' => ['title']
            ])
            ->add('foo', 'Search.Callback', [
                'callback' => function ($query, $args, $filter) {
                    // Modify $query as required
                }
            ]);
			
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
     

    }

	 public function beforeSave($event, $entity, $options){
	
    }
  }