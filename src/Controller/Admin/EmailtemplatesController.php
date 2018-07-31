<?php
	namespace App\Controller\Admin;
  use App\Controller\AppController;
	use Cake\Event\Event;
use Cake\ORM\TableRegistry;
  class EmailtemplatesController extends AppController{
	
	public function beforeFilter(Event $event){
		 $this->Auth->allow();
		parent::beforeFilter($event);
	}
  	public function add(){
			parent::add();			
		
			if($this->request->is(['PUT']) or $this->request->is(['POST'])){			
				$this->redirect(ADMIN_URL.'/emailtemplates/');			 	
			}
		}
	
		public function index(){			
			
		//	$type = $this->request->getParam(['type']);
		//	$this->paginate['conditions']['AND'][] = ['Emailtemplates.type'=>$type];
			$this->paginate['order'] = [$this->name.'.id'=>'asc'];
			parent::index();
			$this->set('viewTitle','EMAIL TEMPLATES');
		}
		public function initialize(){		
			  parent::initialize();			   							
		}
   
}