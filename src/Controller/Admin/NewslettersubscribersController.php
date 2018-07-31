<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Routing\Router;


class NewslettersubscribersController extends AppController
{
		public function index(){
			parent::index();
			$this->set('viewTitle','NEWSLETTER SUBSCRIBERS');
		}
	

}