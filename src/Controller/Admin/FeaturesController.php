<?php
namespace App\Controller\Admin;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;

class FeaturesController extends AppController
{

		public function initialize(){		
			  parent::initialize();			   							
		}
	
		public function add(){
			parent::add();			
			if($this->request->is(['PUT']) or $this->request->is(['POST'])){			
				$this->redirect(ADMIN_URL.'/features/');			 	
			}
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
