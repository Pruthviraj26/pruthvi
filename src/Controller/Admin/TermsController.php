<?php
namespace App\Controller\Admin;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;

class TermsController extends AppController
{

		public function initialize(){		
			  parent::initialize();			   							
		}
	
		public function add_and_view(){
			$texonomy = $this->request->getParam('texonomy');
			$posttype = $this->request->getParam('posttype');
			
			$this->set('posttype',$posttype);
			$this->set('texonomy',$texonomy);
			$this->paginate['contain'] = ['parent','child'];
			
			$this->paginate['conditions']['AND'][] = ['terms.texonomy'=>$texonomy,'terms.post_type'=>$posttype];
		
			parent::index();

				parent::add();			
				if($this->request->is(['PUT']) or $this->request->is(['POST'])){	
					$data = $this->request->data();
					
					if($this->request->getParam('posttype'))
						$posttype = $this->request->getParam('posttype');
					
					if(isset($data['post_type']))
						$posttype =  $data['post_type'];
					
					if(isset($data['texonomy']))
						$texonomy =  $data['texonomy'];
					
					$this->redirect($_SERVER['HTTP_REFERER']);			 			 	
				}
			
			
			
			
		}
	
		public function add(){
			$this->add_and_view();
		}	
		public function index(){
			$this->add_and_view();
		}
	
		public function uploadImg($field){
				$this->image_size = [];
        $item = []; $item['name'] = 'icon'; $item['width'] = 64; $item['height'] = 64;$item['dimention']='w'; 
        $this->image_size[] = $item;
				$item['name'] = 'thumbnail'; $item['width'] = 350; $item['height'] = 360;$item['dimention']='w';
        $this->image_size[] = $item;
				$item['name'] = 'medium'; $item['width'] = 500; $item['height'] = 510;$item['dimention']='w'; 
        $this->image_size[] = $item;
			
			parent::uploadImg($field);
		}
	
	
}
