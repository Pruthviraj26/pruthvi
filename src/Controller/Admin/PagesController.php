<?php
  namespace App\Controller\Admin;
  use App\Controller\AppController;
	use Cake\Event\Event;
	use Cake\ORM\TableRegistry;
  class PagesController extends AppController{
	
	public function beforeFilter(Event $event){
		 $this->Auth->allow(['login','logout']);
		 parent::beforeFilter($event);
		
	}
  
	public function home(){
				$Users = TableRegistry::get('Users');
				$counterUsers = $Users->find()->select(['count' => $Users->find()->func()->count('Users.id'),'Users.status'])->where(['Users.type'=>'USER'])->group('Users.status')->toArray();
				
				$totalActiveUsers  = isset($counterUsers[0])?$counterUsers[0]['count']:0;
				$totalInactiveUsers  = isset($counterUsers[1])?$counterUsers[1]['count']:0;
		
				$Post = TableRegistry::get('Post');
		
		
				/*$counterPost = $Post->find()->select(['count' => $Users->find()->func()->count('Post.id'),'Post.post_type'])->order('Post.post_type ASC')->group('Post.post_type')->toArray();*/
		
			//pr($counterPost);
				$this->set('totalActiveUsers',$totalActiveUsers);
				$this->set('totalInactiveUsers',$totalInactiveUsers);
		
		
		
	}
   
}