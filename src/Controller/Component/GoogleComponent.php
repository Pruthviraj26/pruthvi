<?php
namespace App\Controller\Component;
use Cake\Controller\Component;

include(ROOT.DS.'vendor'.DS.'google'.DS.'oauth_client.php');
include(ROOT.DS.'vendor'.DS.'google'.DS.'http.php');
use Cake\ORM\TableRegistry;
use oauth_client_class;
class GoogleComponent extends Component{
	
		private $controller;
    public $client = null;
		public $googleUser;
	  public $components = ['Flash', 'Auth'];
    function initialize(array $config){
      $this->config = $config;			
			$this->Controller = $this->_registry->getController();
			$this->client = new oauth_client_class();

			$this->Users = TableRegistry::get('Users');
			$this->client->offline = FALSE;
			$this->client->debug = false;
			$this->client->debug_http = true;
			$this->client->redirect_uri = SITE_URL.'/users/googlelogin';
			$this->client->client_id = $config['google_client_id'];
			$this->client->client_secret = $config['google_client_secret'];
			$application_line = __LINE__;				
			$this->client->scope = 'https://www.googleapis.com/auth/userinfo.email '.'https://www.googleapis.com/auth/userinfo.profile';
			
        
     }
	
		public function getloginUrl(){
			if(($success = $this->client->Initialize())) {
				return $this->client->Process(false);
	
			}
		}
		 
	
		 public function login(){
			
			 	if(($success = $this->client->Initialize())) {
				if (($success = $this->client->Process())) {
					if (strlen($this->client->authorization_error)) {
						$this->client->error = $this->client->authorization_error;
						$success = false;
					} elseif (strlen($this->client->access_token)) {
						$success = $this->client->CallAPI('https://www.googleapis.com/oauth2/v1/userinfo', 'GET', array(), array('FailOnAccessError' => true), $this->googleUser);
					}
				}
				
				
				if($this->googleUser){
							$success = $this->client->Finalize($success);
			
				
					if($success){
				
						$user = $this->Users->find('all')->where(['email'=>$this->googleUser->email])->first();
						if($user){
							$this->__updateAccount($user);
						}else{
							$this->__newAccount();
						}
							
						
					}else{
						echo "fail";
						die;
					}
				}
			
						
			}
			 
		 }
			 protected function __updateAccount($user)
    	{
		
				$this->Users->patchEntity($user, ['google_id' => $this->googleUser->id]);

	    		$this->__autoLogin($this->Users->save($user));
				
    	}

    /**
     * Create a new user using Facebook Credentials
     */
    protected function __newAccount()
    {
			
			$digits = 3;
			$username_suffix = rand(pow(10, $digits-1), pow(10, $digits)-1);
		
			$data['username'] = strtolower($this->googleUser->given_name.$this->googleUser->family_name).$username_suffix;
	    $data['google_id'] = $this->googleUser->id;
	    $data['first_name'] = $this->googleUser->given_name;
	    $data['last_name'] = $this->googleUser->family_name;
	    $data['image'] = $this->googleUser->picture;	
	    $data['password'] = '123456';
	    $data['gender'] = $this->googleUser->gender;
	    $data['email'] = $this->googleUser->email;
			
			$user = $this->Users->newEntity();
			$q = $this->Users->patchEntity($user,$data,['associated'=>[]]);
			
			if ($user = $this->Users->save($user))
			{
	    	$this->__autoLogin($user);
			}
    }

    /**
     * Logs user in application after successful save
     * 
     * @param type $result
     */
    protected function __autoLogin($result)
    {
			
				$authUser = $this->Users->get($result->id)->toArray();
				$this->Auth->setUser($authUser);
				$this->Controller->redirect(SITE_URL);
    }

   
		 	
		 
		

}
?>

