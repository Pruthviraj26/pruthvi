<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use App\Network\Session;
use Cake\Utility\Inflector;
use Cake\Network\Session\DatabaseSession;
use \Crud\Controller\ControllerTrait;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Core\Configure;
use Cake\I18n\Number;
use Cake\Mailer\Email;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */

class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
	  public $components = [
        'RequestHandler',
        'Image',
    ];
  	public $model;
		public $authUser = null;
    public $session;
		public $apiResponse;
		public $siteconfig;
		public $image_size;
    public function initialize()
    {
			
			 $this->session = $this->request->session();
			$this->model = $this->{$this->modelClass};  
			$siteconfigs = TableRegistry::get('Siteconfigs');
			$this->siteconfig = $siteconfigs->find('all')->first();	
		
			$this->set('siteconfig',$this->siteconfig);
			
			Number::defaultCurrency('USD');
			$this->session = $this->request->session();
		
				$this->image_size = [];
        $item = []; $item['name'] = 'icon'; $item['width'] = 64; $item['height'] = 64;$item['dimention']='w'; 
        $this->image_size[] = $item;
				$item['name'] = 'thumbnail'; $item['width'] = 260; $item['height'] = 165;$item['dimention']='w';
        $this->image_size[] = $item;
				$item['name'] = 'medium'; $item['width'] = 848; $item['height'] = 347;$item['dimention']='w'; 
        $this->image_size[] = $item;
			
				
				$this->loadComponent('General');
				$this->loadComponent('RequestHandler');
				$this->loadComponent('Flash');

				$this->loadComponent('Auth');
				if(isset($this->request->params['prefix']) and $this->request->params['prefix']=='admin'){				
						 $this->Auth->config(['storage' => ['className' => 'Session', 'key' => 'Auth.Admin']]);
						 $this->Auth->__set('sessionKey', 'Auth.Admin');		
					
						
						 $this->themeConfig = Configure::read('Theme');
			
						 $this->set('themeConfig',$this->themeConfig);

				}else if(isset($this->request->params['prefix']) and $this->request->params['prefix']=='api'){				
						  $this->Auth->config(['loginAction' => array('controller' => 'pages', 'action' => 'unauthorized')]);			

				} else {		
					
				
					
					$this->loadComponent('AkkaFacebook.Graph', [
					'app_id' => $this->siteconfig->facebook_app_id,
					'app_secret' => $this->siteconfig->facebook_app_secret,
					'app_scope' => 'email,public_profile',
					'redirect_url' => Router::url(['controller' => 'Users', 'action' => 'facebooklogin'], TRUE), // This should be enabled by default
					'post_login_redirect' => array('controller' => 'pages', 'action' => 'home'), 

					]);

					$google_client_id = $this->siteconfig->google_client_id;
					$google_client_secret = $this->siteconfig->google_client_secret;
					$this->loadComponent('Google',['google_client_id'=>$google_client_id,'google_client_secret'=>$google_client_secret]);

					$twitter_consumer_key = $this->siteconfig->twitter_consumer_key;
					$twitter_consumer_secret = $this->siteconfig->twitter_consumer_secret;
					$this->loadComponent('Twitter',['twitter_consumer_key'=>$twitter_consumer_key,'twitter_consumer_secret'=>$twitter_consumer_secret]);


				}

	
				$config = array(
					'host' => $this->siteconfig->smtp_host,
					'port' => $this->siteconfig->smtp_port,
					'username' => $this->siteconfig->smtp_email_id,
					'password' => $this->siteconfig->smtp_password,					
					'from' => $this->siteconfig->title,					
					'className' => 'Smtp');
			//	pr($config);
				Email::configTransport('gmail', $config);
			
			/*}else{
						Email::configTransport('gmail', [
						  'className' => 'Mail',
				       
				]);
	
			}	*/
			
		
			
				
			$this->set('form_templates', Configure::read('Templates'));
			
			
			parent::initialize();
			
			$this->authUser = $this->Auth->user();
			$this->set('authUser',$this->authUser);
        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
	  public function beforeRender(Event $event)
    {
				$prefix = $this->request->params['prefix'];
			
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
					   $this->viewBuilder()->layout('main');
		 	if($this->request->action=='login')
		   $this->viewBuilder()->layout('login');
			
			if(isset($this->request->params['paging'])){
				$pagination = $this->request->params['paging'][$this->model->alias()]; 
				$this->set('pagination',$pagination);	
				
					
			}
			
				 if(isset($this->request->params['prefix']) and $this->request->params['prefix']=='admin' ){	
				 
				 }else{
					 
							$site_config = TableRegistry::get('Siteconfigs')->find()->first();
							$front_theme = $site_config->front_theme;
							$this->set('front_theme',$front_theme);
							$this->viewBuilder()->theme($front_theme);
					 
				 		if($this->authUser){			 
		 				
							
						}else{
							// echo "<script>console.log('user generated')</script>";
							$twitterLoginUrl = $this->Twitter->getLoginUrl();
							$this->set('twitterLoginUrl',$twitterLoginUrl);

						}
				 }
			 
			
			
			
			
    }
	 public function beforeFilter(Event $event){
		  $this->Auth->allow(['errorReporting']);
		 	$this->Flash->clear = true;
		
		 
		 if($this->request->getParam(['page'])!==null){
			 	$this->paginate['limit'] = 10;
				$page = $this->request->getParam(['page']);			
				$this->paginate['page'] = $page; 	
		 }
		 
		 if(isset($this->request->params['prefix']) and $this->request->params['prefix']=='admin' ){	
							
				 if(isset($this->authUser['type']) and $this->authUser['type']!='ADMIN' ){			 
		 				$this->redirect(SITE_URL);	
		 		  }
			
			 	
			  $Users = TableRegistry::get('Users');
			 	$newUsers = TableRegistry::get('Users')->find('all')->where(['Users.created >'=>$this->authUser['logout']])->toArray();
			 	$this->set('newUsers',$newUsers);
			 
			 
			 
			 
		
		/*		$pendingCards = TableRegistry::get('Cards')->find('all')->contain(['Product','User'])->where(['Cards.status '=>'PENDING'])->toArray();
				$this->set('pendingCards',$pendingCards);
		
				$approvedCards = TableRegistry::get('Cards')->find('all')->contain(['Product','User'])->where(['Cards.status '=>'APPROVED'])->toArray();
				$this->set('approvedCards',$approvedCards);
		
				$acceptedCards = TableRegistry::get('Cards')->find('all')->contain(['Product','User'])->where(['Cards.status '=>'ACCEPTED'])->toArray();
				$this->set('acceptedCards',$acceptedCards);*/
			 
			 	  
			}
			
			else if(isset($this->request->params['prefix']) and $this->request->params['prefix']=='api' ){
				   $this->response->header('Access-Control-Allow-Origin','*');
        $this->response->header('Access-Control-Allow-Methods','*');
        $this->response->header('Access-Control-Allow-Headers','X-Requested-With');
        $this->response->header('Access-Control-Allow-Headers','Content-Type, x-xsrf-token');
        $this->response->header('Access-Control-Max-Age','172800');
				$this->autoRender = false;
			} else {
				
				
				// GLOBAL OBJECTS START
		
				
				$Terms = TableRegistry::get('Terms');
				$Postterms = TableRegistry::get('Postterms');
				$Post = TableRegistry::get('Post');

				$this->set('postByCategory',$Postterms);
				$this->set('Post',$Post);
				$this->set('Terms',$Terms);
				
				// GLOBAL OBJECTS END
				
			}
		
   	
		 
   
		  	$controller = Inflector::pluralize($this->name);
		 	$controller = strtoupper($controller);
		 	$viewTitle = $this->request->action!='index'?$this->request->action:'';
		 	$viewTitle =  strtoupper($viewTitle);
      $this->set("viewTitle",$viewTitle.' '.$controller);	
		 
	 }
	

		public function setSearchCondition($model,$searchInput){
			
			$table = TableRegistry::get(strtolower($model));
			
		
				
					$schema = $table->schema();
					$columns = $schema->columns();
					$searchColumns = $columns;					
					
					foreach($searchColumns as $column){	
						if(in_array($column,['name','title','description','expert'])){
							$this->paginate['conditions']['OR'][$model.'.'.$column.' like'] = '%'.$searchInput.'%';	
						}
						
					}
		}
	
		public function index(){
		$associated = 	$this->model->associations();
		foreach($associated as $m){
		 if(get_class($m) == 'Cake\ORM\Association\BelongsTo')
		 $belongsToModels[] = $m->getName();
		}

		if(!isset($this->paginate['order']))	
				$this->paginate['order'] = [$this->name.'.id'=>'desc'];
			$searchInput = isset($this->request->data['searchInput'])?$this->request->data['searchInput']:'';
			
		if($searchInput){

			$this->setSearchCondition($this->name,$searchInput);
			if(isset($this->paginate['contain'])){
				foreach($this->paginate['contain'] as $model){
					
					if(in_array($model,$belongsToModels))
					$this->setSearchCondition($model,$searchInput);
				}
			}
					
		}

		$data = $this->paginate($this->model)->toArray();		
		$controllerName = strtolower($this->name); // eg. ProductsController to products
		$this->set($controllerName,$data);
	}
	
	
	
   public function add()
	 {
		 	if(!isset($this->request->data['searchInput']) or $this->request->data['searchInput']==""){
			if($this->request->is(['PUT']) or $this->request->is(['POST'])){
				
					//Strat : check Add or Edit operation 
					$postData = $this->request->data;					
					if($this->request->is(['PUT'])){
						
						if($this->authUser)			 		 			
							$postData['modified_by'] = $this->authUser['id'];
						else
							$postData['modified_by'] = 0;
						
						$entity = $this->model->get($postData['id']);
						unset($postData['id']);
					}else{
						
						if($this->authUser)			 		 			
							$postData['created_by'] = $this->authUser['id'];
						else
							$postData['created_by'] = 0;
						
						$entity = $this->model->newEntity();
					}
					//End : check Add or Edit operation

				
					//Start : Removing all images fields from post data
					foreach($postData as $field=>$value){                      
									if(strpos($field,"image")!==false){										
										unset($postData[$field]);
									}
					}
				  //End  : Removing all images fields from post data
				
				
					//Start : Saving all postdata except images
				
					$patchEntity = $this->model->patchEntity($entity, $postData, ['associated' => []]);
					$data = $this->model->save($patchEntity);
					//End : Saving all postdata except images	
				
				
					if(isset($data)){
						$this->apiResponse['status'] = "SUCCESS";	 
						$this->apiResponse['msg'] = __("Record is Saved !");
						$this->apiResponse['data'] = $data;
					


						// Start : Upload and save all images if file is selected
						foreach($this->request->data as $field=>$value){   
							if(strpos($field,"image")!==false){									
								if($this->request->data[$field]['tmp_name'])
								$this->apiResponse['image'][] = $this->uploadImg($field);
							}
						}
						// End : Upload and save all images if file is selected
						
						
						$this->apiResponse['status'] = 'SUCCESS';
						$this->apiResponse['data'] = $data;
						$this->Flash->success('The '.Inflector::singularize($this->name).' has been saved', ['key' => 'positive']);
					}
					else {
							 $this->apiResponse['status'] = "FAIL";
							 $this->apiResponse['msg'] = __("Sorry, Something is wrong");	 
							$this->Flash->error('Something went wrong !', ['key' => 'negative']);
					}
				
				
			
				
				}
			}
		 
		 		if($this->request->getParam('id')){
						$id = $this->request->getParam('id');
						$entity = $this->model->get($id,['contain'=>['Creator','Modifier']]);
						$this->set('viewTitle',__('Edit ').$this->name);
				}else{
						$entity = $this->model->newEntity();						
				}
		 	
		 		$singulerControllerName = Inflector::singularize(strtolower($this->name));   // eg. ProductsController to product				
				$this->set($singulerControllerName,$entity);	
		 
		 
		 	
    }
	
	public function togglestatus(){
	 	$id = $this->request->getParam('id');
		$entity  =  $this->model->get($id);	
		
		if($entity->status == 'ACTIVE')
				$entity->status = 'INACTIVE';
		else
				$entity->status = 'ACTIVE';			
		 $this->model->save($entity);
		
		 $this->redirect($_SERVER['HTTP_REFERER']);	
	}
	
	public function changestatus(){
	 	$id = $this->request->getParam('id');
	 	echo $status = $this->request->getParam('status');

		$entity  =  $this->model->get($id);			
		$entity->status = strtoupper($status);
		$this->model->save($entity);
		$this->redirect($_SERVER['HTTP_REFERER']);	
	}
	
	
		public function remove(){
		 $id = $this->request->getParam('id');
		 $entity  =  $this->model->get($id);	 
		 $this->model->delete($entity);
		 $this->Flash->success('The '.Inflector::singularize($this->name).' has been removed', ['key' => 'positive']);
		 $this->redirect($_SERVER['HTTP_REFERER']);
   }
	
	
		public function deleteAll(){
			$data = $this->request->data;
			$ids = array_keys($data['ids']); 			
			$this->model->deleteAll([$this->modelClass.'.id in'=>$ids]);			
			$this->Flash->success(count($ids).' '.Inflector::singularize($this->name).' has been removed', ['key' => 'positive']);
			$this->redirect($_SERVER['HTTP_REFERER']);
		}
	

    public function uploadImg($field){

        $id = $this->apiResponse['data']['id'];
				if($id=="")
					return false;
        $image=$this->request->data[$field];
			
				$module = strtolower($this->modelClass);				
				$isDirectoryCreated = !is_dir("img/uploads/".$module)?mkdir("img/uploads/".$module):true;
				if($isDirectoryCreated){					
					$path_info = pathinfo(basename($image['name']));
        	        $ext = '.'.$path_info['extension'];
					$file_name = $field.'_'.$id.$ext;
					$default = $module.'/'.$file_name;
					if(move_uploaded_file($image['tmp_name'],"img/uploads/".$default)){
						$failedFiles = [];
						
						foreach($this->image_size as $size){
							$a = $b = false;
								$a = !is_dir('img/'.$size['name'])?mkdir('img/'.$size['name']):true;
								$b = !is_dir('img/'.$size['name'].'/'.$module)?mkdir('img/'.$size['name'].'/'.$module):true;
							if($a and $b){
								$this->Image->load("img/uploads/".$default);
        				        $this->Image->resize($size['width'],$size['height'],$size['dimention']);
								if(!$this->Image->save("img/".$size['name'].'/'.$default))
                                    $failedFiles[] = $size['name'];
							}
							
						}
						if(count($failedFiles)){
							$response['status']='info';
							$response['msg'] =  implode(",",$failedFiles).'could not uploaded !';
						}
				        $user = $this->Auth->user();	                       
        		         $entity = $this->model->get($id);
                         $patchEntity = $this->model->patchEntity($entity, [$field=>$default,'modified_by'=>$user['id']]);
                         $data = $this->model->save($patchEntity);
						 if($data){
						 	 $response['status']= isset($response['status'])?$response['status']:'success';
             		         $response['msg'] = isset($response['msg'])?$response['msg']:'File has been uploaded !';
						 }else{
							  $response['status'] = 'fail';
						 		$response['status'] = 'Record could not saved, Uploaded Image removed! !';	
						 }

					}else{
						$response['status'] = 'fail';
						$response['msg'] = __("Director for image couldn't moved to ".$module." directory !");
					}
					
				}else{
					$response['status'] = 'fail';
					$response['msg'] = __("Director for image couldn't created!");
				}
			
        return $response;


    }

		/*public function get(){
			  $id = $this->request->getParam('id');
			  $singulerControllerName = Inflector::singularize(strtolower($this->name)); 
				$data = [];
				
				$data[$singulerControllerName] = $this->model->find('all',['recursive' => 4])->where([$this->name.'.id'=>$id])->toArray();
			pr($data);
				$this->apiResponse['status'] = 'SUCCESS';
				$this->apiResponse['data'] = $data;
				echo json_encode($this->apiResponse);
			die;
				
		}*/
	
    public function changeOrder(){
         $id = $this->request->data['from']; 
         $order = $this->request->data['dropedOrder'];         
         $entiry = $this->model->get($id);         
         $patchEntity = $this->model->patchEntity($entiry,['order'=>$order]);
         $this->model->save($patchEntity);
         $id = $this->request->data['to']; 
         $order = $this->request->data['dragedOrder'];         
         $entiry = $this->model->get($id);         
         $patchEntity = $this->model->patchEntity($entiry,['order'=>$order]);
         $this->model->save($patchEntity);
         die;

      }
	 	public function logout(){
						$user = $this->Users->get($this->authUser['id']);
			$user->logout = date("Y-m-d H:i:s");
			$this->Users->save($user);		
				if(isset($this->request->params['prefix']) and $this->request->params['prefix']=='admin'){				
						  return $this->redirect($this->Auth->logout('Auth.Admin'));						 
				}else{	
					
				  $googleLogin = $this->session->read('OAUTH_ACCESS_TOKEN');
					if($googleLogin){
						$this->session->delete('OAUTH_ACCESS_TOKEN');
						$this->session->delete('OAUTH_STATE');
					}
					
					$request_token = $this->session->read('request_token');
					if($request_token){
						$this->session->delete('request_token_secret');
					}
					
					
					
					return $this->redirect($this->Auth->logout('Auth.User'));	
				}
		
     
    }
	
		public function errorReporting(){

			$this->beforeRender = false;
			if(strpos(SITE_URL,$_SERVER['HTTP_ORIGIN'])!==false){
				$data = $this->request->data;
				 	$site = array();
				$site['name']  = $this->siteconfig->title;
				$site['logo']  = SITE_URL.'/img/medium/'.$this->siteconfig->header_logo_image;
				 
				$subject = "Something Went wrong to ".$site['name'];
				
			  $message = $data['message'];
				
				$email = new Email('gmail');
				$email->emailFormat('html');
				$email->attachments('/logs/error.log');
				$email->template('notification', 'admin');
				$email->from([$this->siteconfig->email => $this->siteconfig->title]);
    		$email->to(['rathod@webmynesystems.com','pruthviraj848@gmail.com']);
    		$email->subject($subject);
				$email->viewVars(array('subject'=>$subject,'site'=>$site,'content' => $message));
    		$email->send($message);
		
			}else{
				echo "Not found";
			}
				exit;	
		 
		}
	
	 

   
	
}
