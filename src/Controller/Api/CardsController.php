<?php
namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;

class CardsController extends AppController
{
	public function initialize(){		
			  parent::initialize();		
				$this->Auth->allow(['getProductAndCurrencyList']);
		}
	
	 public function add()
    {	
		 	parent::add();
		 
			 if($this->apiResponse['status']=='SUCCESS' and isset($this->authUser['email'])){
				
			
				
				 
				$variables['product_name'] = TableRegistry::get('Products',['Cards'])->get($this->apiResponse['data']['product_id'])->title;				 
				$variables['currency_name']= TableRegistry::get('Currency')->get($this->apiResponse['data']['currency_id'])->title;			
				$variables['card_no'] = $this->apiResponse['data']['card_no'];
				$variables['wallet_address']= $this->apiResponse['data']['wallet_address'];
							 		
				$emailTemplates = TableRegistry::get('Emailtemplates');

				$emailTemplates->sendEmail($this->authUser['email'],'ON_CARD_APPLY_USER',$variables,$this->siteconfig,$this->authUser);
				$emailTemplates->sendEmail($this->siteconfig->email,'ON_CARD_APPLY_ADMIN',$variables,$this->siteconfig,$this->authUser);
				 
				 
			 }else{
			 	
			 }
		 	echo json_encode($this->apiResponse);

    }
	
	public function getCurrencyList(){
		
		
		if(count($currencies)){
		 		$this->apiResponse['data']['currencies'] = $currencies;	
		 		$this->apiResponse['status'] = 'SUCCESS';	
		 	}else{
		 		$this->apiResponse['msg'] = "Not found";	
		 		$this->apiResponse['status'] = 'FAIL';	
		 	}
			
			echo json_encode($this->apiResponse);
		
	}
	 public function getProductAndCurrencyList(){
		 	
		 	$Currency = TableRegistry::get('Currency');
		 	$Product = TableRegistry::get('Products');
			$currencies = $Currency->find('all')->where(['Currency.status'=>'ACTIVE'])->toArray();
			$products = 	$Product->find()->where(['Products.status'=>'ACTIVE'])->toArray();	
		 
		 $selectedProductId = 0;
		 foreach($products as $product){
		 		$limit = $Product->checklimit($product->id);
			 	if($limit>0){
			 		$selectedProductId = $product->id;
			 		break;
			 	}
			 	
		 }
		 		
			 
		 	$this->apiResponse['status'] = 'FAIL';	
		 
		 	if(count($currencies)){
		 		$this->apiResponse['data']['currencies'] = $currencies;	
		 		$this->apiResponse['status'] = 'SUCCESS';	
		 	}
		 
		 	if(count($products)){
		 		$this->apiResponse['data']['products'] = $products;	
				$this->apiResponse['data']['selecte_product_id'] = $selectedProductId;
		 		$this->apiResponse['status'] = 'SUCCESS';	
		 	}
		 
		 $this->apiResponse['data']['authUser'] = $this->Auth->user();	
		 
			echo json_encode($this->apiResponse);
   }
	
	public function changestatus(){
			$id = $this->request->getParam('id');
			echo $status = $this->request->getParam('status');

			$entity  =  $this->Cards->get($id,['contain'=>['User','Product','Currency']]);			
			$status = $entity->status = strtoupper($status);
			$card = $this->Cards->save($entity);
			
		
		
			$variables['product_name'] = $card->product->title;				 
			$variables['currency_name']= $card->currency->title;			
			$variables['card_no'] = $card->card_no;
			$variables['wallet_address']= $card->wallet_address;
			$variables['offer_balance'] = $card->balance_from_admin; 
			$variables['accept_offer_link'] = "<a href='".SITE_URL."/cards/'>View Cards</a>";			
			
			
			if($status=='ACCEPTED')
				$template = 'ON_CARD_ACCEPT';
			if($status=='REJECTED')
				$template = 'ON_CARD_REJECT';
								
			$emailTemplates = TableRegistry::get('Emailtemplates');
			$emailTemplates->sendEmail($this->siteconfig->email,$template,$variables,$this->siteconfig,$this->authUser);
	
			$this->redirect($_SERVER['HTTP_REFERER']);	
	}
	
	public function delete(){
		$card_id = $this->request->getParam(['id']);
		$card = $this->Cards->get($card_id);
		$this->Cards->delete($card);
		$this->redirect($_SERVER['HTTP_REFERER']);
	}
	
		
}