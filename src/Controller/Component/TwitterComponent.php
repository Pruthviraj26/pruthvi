<?php
namespace App\Controller\Component;
use Cake\Controller\Component;



require_once(ROOT.DS.'vendor'.DS.'twitteroauth'.DS.'OAuth.php');
require_once(ROOT.DS.'vendor'.DS.'twitteroauth'.DS.'twitteroauth.php');
// define the consumer key and secet and callback



use Cake\ORM\TableRegistry;
use TwitterOAuth;
class TwitterComponent extends Component{
	
		private $controller;
    public $consumer = null;
		public $twitterUser;
	  public $components = ['Flash', 'Auth'];
    function initialize(array $config){
			$this->Users = TableRegistry::get('Users');
      $this->config = $config;			
			$this->Controller = $this->_registry->getController();

			
				$this->consumer_callback = SITE_URL.'/users/twitterlogin/';
				//echo "<script>console.log('Twitter Initiated')</script>";
				$this->consumer_key =$config['twitter_consumer_key'];
				$this->consumer_secret = $config['twitter_consumer_secret'];
		}
		
	
		 	public function getLoginUrl(){
				//	echo "<script>console.log('Getting twitter url')</script>";
					$this->connection = new TwitterOAuth($this->consumer_key , $this->consumer_secret);
					$request_token = $this->connection->getRequestToken($this->consumer_callback); 
				
					// if request_token exists then get the token and secret and store in the session
					if($request_token){
				
						$token = $request_token['oauth_token'];
						
						$_SESSION['request_token'] = $token ;
						
						$_SESSION['request_token_secret'] = $request_token['oauth_token_secret'];
						
						// get the login url from getauthorizeurl method
				
						return $login_url = $this->connection->getAuthorizeURL($token);
				
					
					}
				return false;
				}
		 public function login(){
			
			//echo "<script>console.log('Start Twitter login...')</script>";
			 if(isset($_GET['oauth_token'])){
					// create a new twitter connection object with request token
					$connection = new TwitterOAuth($this->consumer_key, $this->consumer_secret, $_SESSION['request_token'], $_SESSION['request_token_secret']);
					// get the access token from getAccesToken method
					$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
					if($access_token){	
						// create another connection object with access token
						$connection = new TwitterOAuth($this->consumer_key, $this->consumer_secret, $access_token['oauth_token'], $access_token['oauth_token_secret']);
						// set the parameters array with attributes include_entities false
					
						// get the data
						$getParam = array('include_email' => 'true', 'include_entities' => 'false', 'skip_status' => 'true'); 
						$this->twitterUser = $connection->get('account/verify_credentials',$getParam);
						
					}
				}
			
		
			
					if($this->twitterUser){
						
						$user = $this->Users->find('all')->where(['email'=>$this->twitterUser->email])->first();
						if($user){
							$this->__updateAccount($user);
						}else{
							$this->__newAccount();
						}
							
						
					}else{
						return false;
					}
						
			}
			 
		 
			 protected function __updateAccount($user)
    	{
		
				$this->Users->patchEntity($user, ['twitter_id'=>$this->twitterUser->id,'twitter_screen_name' =>$this->twitterUser->screen_name]);
				if ($result = $this->Users->save($user))
				{
	    		$this->__autoLogin($result);
				}
    	}

		/*public function getUniqueUserName($username){
				$digits = 3;
			$username_suffix = "";
			$isUsernameExist = $this->Users->find()->where(['Users.username'=>$username])->count();
			if($isUsernameExist){
				$username_suffix = rand(pow(10, $digits-1), pow(10, $digits)-1);
				$newUserName = $username.$username_suffix;
				$this->getUniqueUserName($username);
			}else{
				return $username;
			}
				
			
		}*/
    protected function __newAccount()
    {
		
		
			//$username = $this->getUniqueUserName($this->twitterUser->screen_name);
			$username = $this->twitterUser->screen_name;

			$data['twitter_screen_name'] = $username;
			$data['username'] = $username;
	    $data['twitter_id'] = $this->twitterUser->id;
			if(strpos($this->twitterUser->name," ")!==false){
				$fullname = $this->twitterUser->name;
				$name = explode(" ",$fullname);
	
					if(count($name)>0){
							$data['first_name'] = isset($name[0])?$name[0]:'';			
	    				$data['last_name'] = isset($name[1])?$name[1]:'';			
					}
	    	
			}else{
				 	$data['first_name'] = $this->twitterUser->name;
			}
			
	    $data['image'] = $this->twitterUser->profile_image_url_https;	
	    $data['address'] = $this->twitterUser->location;	
	    $data['about'] = $this->twitterUser->description;	
	    $data['password'] = '123456';
	
	    $data['gender'] = isset($this->twitterUser->gender)?$this->twitterUser->gender:null;
	    $data['email'] = $this->twitterUser->email;
					
			$user = $this->Users->newEntity();
			$q = $this->Users->patchEntity($user,$data,['associated'=>[]]);
			
			if ($user = $this->Users->save($user))
			{
	    	$this->__autoLogin($user);
			}
    }

   
    protected function __autoLogin($result)
    {
			
				$authUser = $this->Users->get($result->id)->toArray();
				$this->Auth->setUser($authUser);
				$this->Controller->redirect(SITE_URL);
    }

   
		 	
		 
		

}
