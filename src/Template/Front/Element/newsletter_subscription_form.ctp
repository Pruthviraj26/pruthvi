
 <h6>Subscribe to our mailing list</h6>
 

            <div class="inputdiv">
            	<input type="email" value="" name="email" id="nls-email" placeholder="Enter your email address" />
                <a style="cursor:pointer" id="nls-embedded-subscribe"><i class="fa fa-envelope"></i></a>
            </div>
<p id="newsLetterMsg"></p>


            


	<script>
		$(document).ready(function(){
			
			$("#nls-embedded-subscribe").click(function(){
			$nlsemail = $('#nls-email').val();
				 var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  
				if($nlsemail!="" && regex.test($nlsemail)){
					$.post('<?=SITE_URL ?>/newslettersubscribers/add',{email:$nlsemail},function(response){
						response = JSON.parse(response);	
							if(response.mailResponse.title==null){
								$("#newsLetterMsg").css("color","#5e9019");
								$("#newsLetterMsg").html("This email address "+$nlsemail+" is has been successfully added to our Mailing List");
								
							}
							if(response.mailResponse.title=="Member Exists"){
								
								$("#newsLetterMsg").css("color","orange");
									$("#newsLetterMsg").html("This email address "+$nlsemail+" is already exist in our Mailing List");
								}
										
								
							
						 $('#nls-email').val('');
						
							console.log(response.status+ ' : '+response.msg);

					});		
				}else{
					 $('#nls-email').val('');
					$('#nls-email').attr('placeholder','Enter Valid Email address');
					$('#nls-email').focus();
					$("#newsLetterMsg").html("");
				}
				
		});
		
		
		});
		</script>

