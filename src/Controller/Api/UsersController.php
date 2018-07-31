<?php
namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;

class UsersController extends AppController
{
	public function initialize(){		
			parent::initialize();			   
			$this->Auth->allow(['googlelogin','facebooklogin','twitterlogin','addOrUpdate','logout']);
	}
	public function login(){
	 	
	}
	public function googlelogin(){
			$data = $this->Google->getloginUrl();
			if($data){
				$this->apiResponse['data'] = $data;
				$this->apiResponse['status'] = "SUCCESS";	 		
			}else{
				$this->apiResponse['status'] = "ERROR";	
			}
			
			echo json_encode($this->apiResponse);
		
	}
	public function twitterlogin(){
		$this->autoRender = false;
		$this->Twitter->login();
	}
	
	public function addOrUpdate(){
		$postData = $this->request->data;
		
			if($postData['loginType']=="fb"){
						$postData['facebook_id'] = $postData['id'];	
					unset($postData['id']);
			}
				$social_id = 'facebook_id';
		
			if($postData['loginType']=="google"){
					$postData['gender'] = strtoupper($postData['gender']);
				
			}
				
		
					
	
		
		
			$user = $this->Users->find()->where(['email'=>$postData['email']])->limit(1)->toArray();

			if(count($user)){
				$user = $this->Users->get($user[0]->id);
				$this->Auth->setUser($user);
				
			}else{
				$user = $this->Users->newEntity();
				$user = $this->Users->patchEntity($user,$postData);
				$this->Auth->setUser($user);	
				$user = $this->Users->save($user);
			}
		
			$user->login = date("Y-m-d H:i:s");
			$this->Users->save($user);	
			
		
		
		if($this->Auth->user()){
			$this->apiResponse['data'] = $this->Auth->user();				
			$this->apiResponse['status'] = 'SUCCESS';
		}else{
			$this->apiResponse['status'] = 'FAIL';			
		}
				
		
		echo json_encode($this->apiResponse);
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
	
	public function getAuthUser(){
		$this->apiResponse['data'] = $this->Auth->user();				
		$this->apiResponse['status'] = 'SUCCESS';
		echo json_encode($this->apiResponse);
	}
	
	public function logout(){
		$this->Auth->logout('Auth.User');
	}
	
	

}