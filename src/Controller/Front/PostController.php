<?php
namespace App\Controller\Front;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Utility\Security;
use Cake\Auth\DefaultPasswordHasher;
class PostController extends AppController
{
	 
		public function initialize(){
		
			  parent::initialize();			   
			$this->Auth->allow(['home','index','faq','terms']);
		}
	
		public function home(){	

		
		}
	
	public function index(){
		$slug =  $this->request->getParam(['slug']);
		$seoPost = TableRegistry::get('Seo')->find()->where(['Seo.url'=>$slug])->contain(['Post'])->first();
		
		$this->set('seoPost',$seoPost);

		if($seoPost->post['post_type']=='pages'){
			$template = TableRegistry::get('Postterms')->find()->contain(['Term'])->where(['Postterms.texonomy'=>'templates'])->first();
			
			$template = $template->term['name'];
			$this->viewBuilder()->template($template);
		}else{
			$this->viewBuilder()->template('single');	
		}
	}
	
}
