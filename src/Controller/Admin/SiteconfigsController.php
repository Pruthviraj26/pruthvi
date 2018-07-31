<?php
  namespace App\Controller\Admin;
  use App\Controller\AppController;
	use Cake\Event\Event;
  class SiteconfigsController extends AppController{
			  public function add()
    		{
					parent::add();
					if($this->apiResponse['data']!=null)
					$this->redirect(ADMIN_URL.'/');
				}
		public function uploadImg($field){
				$this->image_size = [];
        $item = []; $item['name'] = 'icon'; $item['width'] = 100; $item['height'] = 20;$item['dimention']='w'; 
        $this->image_size[] = $item;
				$item['name'] = 'thumbnail'; $item['width'] = 180; $item['height'] = 30;$item['dimention']='w';
        $this->image_size[] = $item;
				$item['name'] = 'medium'; $item['width'] = 256; $item['height'] = 41;$item['dimention']='w'; 
        $this->image_size[] = $item;
			
			parent::uploadImg($field);
		}
	}