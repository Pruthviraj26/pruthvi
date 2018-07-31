<?php
  namespace App\Model\Table;
  use Cake\ORM\Query;
  use Cake\ORM\RulesChecker;
  use Cake\ORM\Table;
  use Cake\Validation\Validator;
	use Search\Manager;
	use App\Network\Session;
use Cake\Mailer\Email;

  class EmailtemplatesTable extends Table{
    public function initialize(array $config){
		parent::initialize($config);
		
		$this->table('emailtemplates');
    $this->primaryKey('id');
		$this->addBehavior('Search.Search');

    $this->addBehavior('Timestamp', [
      'events' => [
        'Model.beforeSave' => [
          'created' => 'new',
          'modified' => 'always'
          ]
        ]
      ]);
			
	
			$this->belongsTo('Creator', ['className' => 'Users','foreignKey'=>'created_by']);
      $this->belongsTo('Modifier', ['className' => 'Users','foreignKey'=>'modified_by']);
			
    }
	
    public function beforeSave($event, $entity, $options){
			
    }
		
		public function sendEmail($to,$type,$variables,$site,$authUser){
				$variables['site_url'] = SITE_URL;
				$variables['site_name'] = $site->title;
				$variables['site_email'] = $site->email;
				$variables['user_email'] = $authUser['email'];
				$variables['user_name'] = $authUser['username'];
				$variables['full_name'] = $authUser['first_name'].' '.$authUser['last_name'];
			
				$emailWhere['AND']['Emailtemplates.type'] = $type; 
				$emailWhere['AND']['Emailtemplates.status'] = 'ACTIVE';				 
				$emailTemplates = $this->find()->where($emailWhere)->limit(1)->toArray();
				$emailTemplate = $emailTemplates[0];
				 
				$subject = $emailTemplate->subject;				
			  $message = $emailTemplate->content;
				 
				foreach($variables as $var=>$value){
					$message = str_replace("[$var]",$value,$message);
				}
 
				$siteArray['name']  = $site->title;
				$siteArray['logo']  = SITE_URL.'/img/medium/'.$site->header_logo_image;
			
				$email = new Email('gmail');
				$email->emailFormat('html');
				$email->template('notification', 'admin');
				$email->from([$site->email => $site->title]);
    		$email->to($to);
    		$email->subject($subject);
				$email->viewVars(array('subject'=>$subject,'site'=>$siteArray,'content' => $message));
    		$result = $email->send($message);
			
			
		}

  }
