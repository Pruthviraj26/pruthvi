<?php
namespace App\Controller\Admin;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;

class SeoController extends AppController
{

		public function initialize(){		
			  parent::initialize();			   							
		}
	
		public function geturl(){
			$this->autoRender = false;
			$requestData = $this->request->data;
			if($requestData['title']){
				$url = $this->getUniqueUrl($requestData['title']);			
				$this->apiResponse['data']['url'] = $url;
				$this->apiResponse['status'] = "SUCCESS";
			}else{
				$this->apiResponse['status'] = "FAIL";
				$this->apiResponse['msg'] = "SOMETHING IS WRONG";
			}
			

			echo json_encode($this->apiResponse);
		}
	
	
	public function getkeywords(){
			$this->autoRender = false;
			$requestData = $this->request->data;
			if($requestData['content']){	
				
				if(str_word_count($requestData['content'])>1)
					$keyword = $this->General->getKeywords($requestData['content']);
				else
					$keyword = $requestData['content'];
				
				$this->apiResponse['data']['keyword'] = implode($keyword,',') ;
				$this->apiResponse['status'] = "SUCCESS";
			}else{
				$this->apiResponse['status'] = "FAIL";
				$this->apiResponse['msg'] = "SOMETHING IS WRONG";
			}
			

			echo json_encode($this->apiResponse);
		}
	
		public function getUniqueUrl($text){
			while(true){
				$url = $this->General->getSEOfriendlyUrl($text);
				$found = $this->Seo->find()->where(['seo.url'=>$url])->toArray();
				if($found){
					$text = $text.' '.$this->General->generateRandomString(5);
				}else{
					return $url;	
				}	
			}
		}
	
	
}
