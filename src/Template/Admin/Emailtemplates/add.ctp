

<script>
	
<?= $this->start('script') ?>
		
	$(document).ready(function(){		

			$("#emailtemplateForm").validate({
				rule: {
					title: "required",
					subject: "required",
					content: "required",
		
				},
				messages: {
					title: "<?=__("Please, enter title name.") ?>",
					subject:  "<?=__("Please, enter subject.") ?>",
					content:  "<?=__("Please, enter content.") ?>",
				
          
      },
				
						errorPlacement: function(error, element) {
							$(".form-group").css("height","100px !important;");
							element.attr("placeholder",error.html());
						},
			});
		
editor = CKEDITOR.replace('container'); // bind editor
 
editor.addCommand("mySimpleCommand", { // create named command
    exec: function(edt) {
        alert(edt.getData());
			test
    }
}); 

editor.ui.addButton('SuperButton', { // add new button and bind our command
    label: "Click me",
    command: 'mySimpleCommand',
 
    icon: 'https://avatars1.githubusercontent.com/u/5500999?v=2&s=16'
});
	});

	
	
<?= $this->end('script') ?>
	
	</script>

<?php 
	$new = $emailtemplate->isNew();	 


	
	echo $this->element('form_start',['formTitle'=>$viewTitle]);
		echo $this->Form->create($emailtemplate,['id'=>'emailtemplateForm','url'=>ADMIN_URL.'/emailtemplates/add','enctype' => 'multipart/form-data']);

			echo $this->Form->input('id',['type'=>'hidden','value'=> !$new ? $emailtemplate->id:'']); 
			echo $this->Form->input('type',['type'=>'hidden','value'=> !$new ? $emailtemplate->type:'']); 
			echo $this->Form->control('title',['readonly','required','value'=> !$new ? $emailtemplate->first_name:'']); 
			echo $this->Form->control('subject',['required','value'=> !$new ? $emailtemplate->last_name:'']); ?>
						<div class="form-group " form-type="text">
                       
                       
                         <label class="control-label col-md-2 col-sm-2 col-xs-12" for="last_name">Message</label><div class="col-md-10 col-sm-10 col-xs-12">
	<textarea  name="content" type="" class="ckeditor form-control" required="required" id="container" rows="5" aria-required="true">
		
	<?= !$new ? $emailtemplate->content:'' ?></textarea> </div>
                       
                      </div>
			<?php
		  echo !$new ? $this->element('create_modify_details',['record'=>$emailtemplate]):''; 
			echo $this->Form->button(!$new?'Update':'Add',['class'=>'btn btn-success']);               
		echo $this->Form->end(); 
	echo $this->element('form_end');
?>
<?php $validTemplateForOffer = ['ON_CARD_ACCEPT','ON_CARD_REJECT','ON_CARD_APPROVE','ON_CARD_DISAPPROVE','ON_CARD_COMPLETED'] ?>

<div class="x_panel">
                  <div class="x_title">
                    <h2>VARIABLES<small>will be replace by real value</small></h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-bordered">
                     
                      <tbody>
                        <tr>
              
                          <td><b>USER</b></td>
                          <td>[user_name]</td>
                          <td>[full_name]</td>
                          <td>[user_email]</td> 
													<td></td>
                         
                          
                        </tr>
                        <tr>
													<td><b>CARD</b></td>
													<td>[wallet_address]</td>
                          <td>[card_no]</td>
                          <td>[product_name]</td>
                          <td>[currency_name]</td>
                         
                     
                        </tr>
												<?php if(in_array($emailtemplate->type,$validTemplateForOffer)) { ?>
                       <tr> 
												 <td><b>OFFER</b></td>
												 <td>[offer_balance]</td>
												 <td>[accept_offer_link]</td>
												 <td></td>
												 <td></td>
											</tr>
												<?php } ?>
												<tr>
													<td><b>SITE</b></td>
													<td>[site_name]</td>
													<td>[site_email]</td>
                          <td>[site_url]</td>
                             <td></td>
										
                        </tr>
                      </tbody>
                    </table>

                  </div>
                </div>