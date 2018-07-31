<?php
namespace App\Controller\Admin;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;

class MenuController extends AppController
{

		public function initialize(){		
			  parent::initialize();			   							
		}
	
		public function index(){
			
		}
	
		public function add(){
			$menuList = TableRegistry::get('Terms')->find()->where(['Terms.post_type'=>'menu']);
			$this->set('menuList',$menuList);

		}
	
	public function getMenuList(){
		$this->autoRender = false;
		//$term_id = 53;
		 $term_id = $this->request->data['term_id'];
		 $term_name = $this->request->data['term_name'];
		$menuPost = TableRegistry::get('Postterms')->find()->contain(['Post'])->where(['Postterms.term_id'=>$term_id])->first();

		if($menuPost){
		
			$this->apiResponse['data']['post'] = $menuPost->post;
		}else{
			$post['title'] = $term_name;
			$post['content'] = '';
			$this->apiResponse['data']['post']  = $post;
		}
		
		echo json_encode($this->apiResponse);
		die;
		
	}
		
	
	
}
