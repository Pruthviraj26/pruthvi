<?php
namespace App\Controller\Api;

use App\Controller\AppController;

class ProductsController extends AppController
{
		public function initialize(){
		
			  parent::initialize();			   
			$this->Auth->allow(['getlist','googlelogin','facebooklogin','checklimit']);
		}
	
	
	
	
	public function googlelogin(){
			$this->Google->login();
	}
	public function facebooklogin(){
		
	}
	
	public function checklimit(){
		$this->autoRender = false;
		$params= $this->request->getParam(['pass']);
		$id = $params[0];
		$product = $this->Products->get($id);
		$data['product']['remaining_accept_card_per_day'] = $this->Products->checklimit($id);
		$data['product']['offer_percentage'] = $product->offer_percentage;		
		$this->apiResponse['data'] = $data;				
		$this->apiResponse['status'] = 'SUCCESS';				
		echo json_encode($this->apiResponse);
		die;
	}
	
	
	
	
	
}