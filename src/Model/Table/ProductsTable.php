<?php

  namespace App\Model\Table;
  use Cake\ORM\Query;
  use Cake\ORM\RulesChecker;
  use Cake\ORM\Table;
  use Cake\Validation\Validator;
	use Search\Manager;
	use Cake\ORM\TableRegistry;
  class ProductsTable extends Table{

    public function initialize(array $config){

      parent::initialize($config);

      $this->table('products');
			
      $this->displayField('title');

      $this->primaryKey('id');
			$this->addBehavior('Search.Search');
 			$this->searchManager()
            ->value('id')
            // Here we will alias the 'q' query param to search the `Articles.title`
            // field and the `Articles.content` field, using a LIKE match, with `%`
            // both before and after.
            ->add('q', 'Search.Like', [
                'before' => true,
                'after' => true,
                'fieldMode' => 'OR',
                'comparison' => 'LIKE',
                'wildcardAny' => '*',
                'wildcardOne' => '?',
                'field' => ['title', 'description']
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
				],
			]);

      $this->belongsTo('Creator', ['className' => 'Users','foreignKey'=>'created_by']);
      $this->belongsTo('Modifier', ['className' => 'Users','foreignKey'=>'modified_by']);

			$this->hasMany('Cards');
			

    }

    public function beforeSave($event, $entity, $options){
			
    }
		
		public function checklimit($id)
		{
			$today = date("Y-m-d");
			$cardConditions["Cards.created like"] = "$today%"; 
			$product = $this->find('all')->contain(['Cards'=>['conditions'=>$cardConditions]])->where(['Products.id'=>$id])->first();
			//$product = $this->get($id);
			$cardsOftheday =  count($product->cards);
			$limit = $product->accept_card_per_day;
			
			return $limit - $cardsOftheday;
		}

  }