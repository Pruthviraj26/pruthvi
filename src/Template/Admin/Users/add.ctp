
<?php 
	$new = $user->isNew();	 
	$option = [];
	$option['MALE'] = "Male";
	$option['FEMALE'] = "Female";
	echo $this->element('form_start',['formTitle'=>$viewTitle]);
		echo $this->Form->create($user,['id'=>'userForm','url'=>ADMIN_URL.'/users/add','enctype' => 'multipart/form-data']);

			echo $this->Form->input('id',['type'=>'hidden','value'=> !$new ? $user->id:'']); 
			echo $this->Form->input('type',['type'=>'hidden','value'=> !$new ? $user->type:'ADMIN']); 
			echo $this->Form->control('first_name',['id'=>'first_name','required','value'=> !$new ? $user->first_name:'']); 
			echo $this->Form->control('last_name',['id'=>'last_name','required','value'=> !$new ? $user->last_name:'']); 
			echo $this->Form->control('username',['required','value'=> !$new ? $user->username:'']); 
			echo $this->Form->control('address',['id'=>'address_1','required','value'=> !$new ? $user->address:'']); 			
			echo $this->Form->control('mobile_no',['required','value'=> !$new ? $user->mobile_no:'']); 
			echo $this->Form->control('email',['type'=>'email','required','value'=> !$new ? $user->email:'']); 
			if($new || $user->type=='ADMIN'){
				echo $this->Form->control('password',['required','value'=> !$new ? $user->password:'']); 
			 } 
			echo $this->Form->select('gender',$option); 		
		  
			echo $this->Form->input('image', ['label' => 'Image','type' => 'file']);
			if(!$new){
							$url = strpos($user->image,'http')!==false?$user->image:SITE_URL."/img/medium/".$user->image; 
			?>
						<center><img src="<?= $url ?>" width="100" height="100"></center>
			<?php  }	

		  echo !$new ? $this->element('create_modify_details',['record'=>$user]):''; 
			echo $this->Form->button(!$new?'Update':'Add',['class'=>'btn btn-success']);               
		echo $this->Form->end(); 
	echo $this->element('form_end');
?>


<script>
<?= $this->start('script') ?>
		
	$(document).ready(function(){		
			$("#userForm").validate({
				rule: {
					first_name: "required",
					last_name: "required",
					username: "required",
					address: "required",
					mobile_no: "required",
					email: "required",
					password: "required",
					gender: "required",
					//image: "required"
				},
				messages: {
					first_name: "<?=__("Please, enter first name.") ?>",
					last_name:  "<?=__("Please, enter last name.") ?>",
					username:  "<?=__("Please, enter username.") ?>",
					address:  "<?=__("Please, enter address.") ?>",
					mobile_no:  "<?=__("Please, enter mobile number.") ?>",
					email:  "<?=__("Please, enter email address.") ?>",
					password:  "<?=__("Please, enter password.") ?>",
					gender:  "<?=__("Please, select gender.") ?>",
					//image:  "<?php //__("Please, upload image.") ?>",
				
          
      },
				
						errorPlacement: function(error, element) {
							$(".form-group").css("height","100px !important;");
							element.attr("placeholder",error.html());
						},
			});
	});

<?= $this->end('script') ?>
	</script>