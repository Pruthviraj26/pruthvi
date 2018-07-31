<?php
	namespace App\Controller\Admin;
  use App\Controller\AppController;
	use Cake\Event\Event;
use Cake\ORM\TableRegistry;
  class UsersController extends AppController{
	
	public function beforeFilter(Event $event){
		 $this->Auth->allow(['login','logout']);
		parent::beforeFilter($event);
	}
  
		public function add(){
			$this->set('viewTitle','ADD ADMIN');
			
			parent::add();			
			if($this->request->is(['PUT']) or $this->request->is(['POST'])){			
				$this->redirect(ADMIN_URL.'/users/type/admins');			 	
			}
		}
		
		
		public function index(){
				$type = $this->request->getParam(['type']);
				$search = $this->request->getParam(['search']);
				$this->paginate['contain'][] = 'Cards';	
			
			if($type=='card_holders' || $type=='admins' || $search){
				$this->paginate['conditions']['AND']['Users.type'] = $type == 'card_holders'?'USER':'ADMIN';				 		
			}else{
				$this->redirect(ADMIN_URL.'/users/type/card_holders');	
			}
			
			parent::index();		
			
			$type = $type == 'card_holders'?'CARD HOLDERS':'ADMINS';
			$this->set('type',$type);
	}
	
		
		public function login(){
        if ($this->request->is('post')) {
					
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
							
							
							$user = $this->Users->get($user['id']);
							$user->login = date("Y-m-d H:i:s");
							$this->Users->save($user);							
              return $this->redirect(ADMIN_URL.'/home');
            }
					
            $this->Flash->error(__('Invalid username or password, try again'));
        }
			
			$this->set('viewTitle','Login');
    }
		
		public function cards(){
			if($this->request->getParam(['id'])){				
				$id = $this->request->getParam(['id']);				
				
				$user = $this->Users->get($id);
				$this->set('user',$user);
				$cards = TableRegistry::get('cards')->find('all')->contain(['Product','User'])->where(['cards.user_id'=>$id])->toArray();		
			
				$this->set('cards',$cards);
			
			}else{
				$this->redirect($_SERVER['HTTP_REFERER']);
			}
				
				
		}

   
}