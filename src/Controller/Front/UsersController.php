<?php
namespace App\Controller\Front;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
class UsersController extends AppController
{
	public function initialize(){		
			parent::initialize();			   
			$this->Auth->allow(['googlelogin','facebooklogin','twitterlogin']);
	}
	public function login(){
	 	
	}
	public function googlelogin(){
			$this->Google->login();
	}
	public function twitterlogin(){
		$this->autoRender = false;
		$this->Twitter->login();
	}
	public function facebooklogin(){
		
	}
	public function profile(){
		$user = $this->Users->get($this->authUser['id']);	
		if($this->request->is('post')){
			$data = $this->request->data;							
			unset($data['image']);
			$this->Users->patchEntity($user,$data);
			$this->apiResponse['data'] = $this->Users->save($user);
			$this->uploadImg('image');
			

			
				
		}
		$this->set('user',$user);
		
	}
	public function cards(){
		$Cards = TableRegistry::get('cards');
		$user_id = $this->authUser['id'];
		$cards = $Cards->find('all')->contain(['Product'])->where(['cards.user_id'=>$user_id])->order(['cards.id'=>'desc'])->toArray();	
		$this->set('cards',$cards);
	}
	
	

}