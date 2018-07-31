<style>
#leftPanel{
    background-color:#b63c00;
    color:#fff;
    text-align: center;
}

#rightPanel{
    min-height:415px;
}
	
	.img-circle {
    border-radius: 50%;
    height: 280px;
    width: 280px;
}
	

/* Credit to bootsnipp.com for the css for the color graph */
.colorgraph {
  height: 5px;
  border-top: 0;
  background: #5c8e18;
  border-radius: 5px;
 
}	
	
	
</style>
<?= $this->element('page_banner') ?>
    <section class="faq">
<div class="container">
 	<form role="form" method="post" id="profileForm" enctype="multipart/form-data" >
		<h1 class="heading">Profile</h1>
	<div class="row" id="main">
        <div class="col-md-4 well" id="leftPanel">
            <div class="row">
                <div class="col-md-12">
                	<div>
										<input type="file" name="image">
        				<img src="<?= strpos($user['image'],'http')!==false?$user['image']:SITE_URL.'/img/medium/'.$user['image'] ?>" alt="Texto Alternativo" class="img-circle img-thumbnail">
        				<h2><?= $user['first_name'].' '.$user['last_name'] ?></h2>
        			
									<?php if($user['facebook_id'] || $user['google_id'] || $user['twitter_screen_name'] ) { ?>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning">
                                Social</button>
													
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                               
												<li>		<?php if($user['facebook_id']){ ?><a  href="<?= 'https://www.facebook.com/'.$user['facebook_id'] ?>"><i class="fa fa-facebook"></i>  Facebook </a>
																<?php } ?></li>
															
													<li>		<?php if($user['google_id']){ ?><a  href="<?= 'https://plus.google.com/'.$user['google_id'] ?>"><i class="fa fa-google-plus"></i> Google+</a>
																<?php } ?></li>
															
															<li>		<?php if($user['twitter_screen_name']){ ?><a  href="<?= 'https://twitter.com/'.$user['twitter_screen_name'] ?>"><i class="fa fa-twitter"> Twitter</i></a>
																<?php } ?></li>
                            </ul>
                        </div>
										<?php } ?>
        			</div>
        		</div>
            </div>
        </div>
        <div class="col-md-8 well" id="rightPanel">
            <div class="row">
    <div class="col-md-12">
   
			
			
	
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1" value="<?= isset($user['first_name'])?$user['first_name']:'' ?>">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2"
									 value="<?= isset($user['last_name'])?$user['last_name']:'' ?>"
									 >
					</div>
				</div>
			</div>
				<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="<?= isset($user['email'])?$user['email']:'' ?>" tabindex="4">
			</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<input type="mobile_no" name="mobile_no" id="mobile_no" class="form-control input-lg" placeholder="Enter Mobile Number" value="<?= isset($user['mobile_no'])?$user['mobile_no']:'' ?>" tabindex="4">
			</div>
					</div>
				</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<textarea name="address" placeholder="Address" class="form-control input-lg"><?= isset($user['address'])?$user['address']:'' ?></textarea>
					
					</div>
				</div>
				
			</div>
				<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<textarea name="about"  placeholder="About me" class="form-control input-lg"><?= isset($user['about'])?$user['about']:'' ?></textarea>
					
					</div>
				</div>
				
			</div>
	
				<div class="row">
				<div class="col-xs-12 col-md-6"></div>
				<div class="col-xs-12 col-md-6"><button type="submit" class="btn btn-success pull-right">Update</button></div>
			</div>
	
	</div>
</div>
<!-- Modal -->

</div>
        </div>
			</form>
     </div>  
</section>


<script>
	
	$(document).ready(function(){
			 $("#profileForm").validate({
         rules: {
             first_name: "required",
             last_name: "required",
             email: "required",
             mobile_no: "required",
             address: "required",
             about: "required",
             
           
         },
         messages: {
           	 first_name: "Enter First Name",
             last_name: "Enter Last Name",
             email: "Enter Email",
             mobile_no: "Enter Mobile Number",
             address: "Enter Address",
             about: "Enter something about you",
         },
			 	
				  	errorPlacement: function(error, element) {					
				  	$(".form-group").css("height","100px !important;");					
						element.attr('placeholder',error.html());
						
				  },

   				 
   
     });
	});
	
	
</script>
