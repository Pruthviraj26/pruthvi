<?php
namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Utility\Security;
use Cake\Auth\DefaultPasswordHasher;
class PagesController extends AppController
{
	 
		public function initialize(){
		
			  parent::initialize();			   
			$this->Auth->allow(['home','faq','terms','features','unauthorized']);
		}
	
		public function beforeFilter(Event $event){
			 
		//	$this->Auth->allow(['home']);
			parent::beforeFilter($event);
			
			
		}
		 public function faq(){
		 	$faqs = TableRegistry::get('faqs')->find('all')->where(['faqs.status'=>'ACTIVE'])->toArray();
			$this->apiResponse['data'] = $faqs;
			$this->apiResponse['status'] = "SUCCESS";	 						
			echo json_encode($this->apiResponse);			
		 }
		 
		 public function features(){
			 $features = TableRegistry::get('Features')->find('all')->where(['Features.status'=>'ACTIVE'])->toArray();
			$this->apiResponse['data'] = $features;
			$this->apiResponse['status'] = "SUCCESS";	 						
			echo json_encode($this->apiResponse);
		 }
	  public function home()
    {
			
			
			
			$today = date("Y-m-d");
			$cardConditions["Cards.created like"] = "$today%"; 
			$products = TableRegistry::get('Products')->find('all')->contain(['Cards'=>['conditions'=>$cardConditions]])->where(['Products.status'=>'ACTIVE'])->toArray();
		
			$this->set('products',$products);
			
			
			$Cards = TableRegistry::get('Cards');
			$card = $Cards->newEntity();
			$this->set('card',$card);

    }
	public function unauthorized(){		
			$this->apiResponse['msg'] = "login required";
			$this->apiResponse['status'] = "LOGIN_REQUIRED";	 		
			echo json_encode($this->apiResponse);
	}
	public function terms(){
		
	}
}
