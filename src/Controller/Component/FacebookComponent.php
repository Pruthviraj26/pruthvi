<?php
use Cake\ORM\TableRegistry;
include('Facebook/autoload.php');
class FacebookComponent extends Component{
    
    private $controller;
    public $config;
    public $callbackUrl;
    
    function initialize(Controller $controller){
      $this->controller = $controller;			
			$this->config['default_graph_version'] = 'v2.2';
			$this->callbackUrl = SITE_URL;  
    }
    
    function setConfig($app_id,$app_secret){
     $this->config['app_id'] = $app_id;
		 $this->config['app_secret'] = $app_secret;
    }
    
    function setCallbackUrl($callbackUrl){
        $this->callbackUrl = $callbackUrl;
    }
    
    function getLoginUrl(){
        $fb = new Facebook\Facebook($this->$config);
        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['email'];
        $loginUrl = $helper->getLoginUrl($this->callbackUrl, $permissions);
        return htmlspecialchars($loginUrl);
    }
}