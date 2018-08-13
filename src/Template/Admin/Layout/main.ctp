<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $viewTitle ?></title>
	<base href="<?= SITE_URL ?>/backend/">
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendors/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendors/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendors/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendors/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendors/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendors/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendors/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendors/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendors/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendors/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendors/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="vendors/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
		
    <!-- jQuery -->
 
	
		<style>
			th. label.au-checkbox{
				margin-bottom: 1.5rem !important;
			}
			.error{
				    border-color: red;
			}
			
			.form-horizontal .control-label {
    			padding-top: 8px;
    			text-transform: capitalize;
			}
			
			
		</style>
  </head>

  <body class="nav-md animsition">
		

		
    <div class="page-wrapper body">
      <div class="main_container">
       <?= $this->element('sidebar') ?>

        <!-- top navigation -->
      
        <!-- /top navigation -->

        <!-- page content -->
		<div class="page-container2">
            <!-- HEADER DESKTOP-->
            <?php echo $this->element('topnav') ?>
            <?= $this->element('sidebar_right') ?>
            <div class="main-content">
				<div class="container-fluid">
					<?= $this->fetch('content') ?>
				</div>
		</div>
        </div>
		<?php $siteconfig->copyright ?>
      </div>
	</div>
	
	<script src="vendors/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendors/bootstrap-4.1/popper.min.js"></script>
    <script src="vendors/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendors/slick/slick.min.js">
    </script>
    <script src="vendors/wow/wow.min.js"></script>
    <script src="vendors/animsition/animsition.min.js"></script>
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendors/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendors/circle-progress/circle-progress.min.js"></script>
    <script src="vendors/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendors/chartjs/Chart.bundle.min.js"></script>
    <script src="vendors/select2/select2.min.js">
    </script>
    <script src="vendors/vector-map/jquery.vmap.js"></script>
    <script src="vendors/vector-map/jquery.vmap.min.js"></script>
    <script src="vendors/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="vendors/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
		<script src="vendors/bootstraptour/js/bootstrap-tour-standalone.js"></script>
		<script src="vendors/bootstraptour/js/bootstrap-tour.min.js"></script>

		  <script src="build/js/custom.js"></script>
  
  <script src="<?= SITE_URL ?>/backend/vendors/jquery-validation/dist/jquery.validate.min.js" ></script>
  
  
		<?= $this->Flash->render('positive') ?>
		<script>
			function chekcPercentageValue(){
			value = $(this).val();
			if(isNaN(value) || value > 100){
				 value = value.substring(0, value.length-1);
				$(this).val(value);
				$(this).attr('placeholder','Enter percentage in digit');
			}
		}
		
		function digitOnly(){
			value = $(this).val();
			if(isNaN(value)){
				 value = value.substring(0, value.length-1);
				$(this).val(value);
				$(this).attr('placeholder','Enter percentage in digit');
			}
		}
		

			<?= $this->fetch('script') ?>
			</script>
		
	
        
        <script src='bs-iconpicker/js/iconset/iconset-fontawesome-4.2.0.min.js'></script>
        <script src='bs-iconpicker/js/bootstrap-iconpicker.min.js'></script>
<script src='jquery-menu-editor.js'></script>
        <script>
            $(document).ready(function () {
                //var strJson = '[{"text":"Home","icon":"fa-home","href":"http://codeignitertutoriales.com"},{"text":"Youtube","icon":"fa-youtube-square","href":"https://www.youtube.com/user/davicotico"},{"text":"Github","icon":"fa-github","href":"https://github.com/davicotico","target":"_self","title":""},{"text":"Opcion4","icon":"fa-crop"},{"text":"Opcion5","icon":"fa-flask"},{"text":"Opcion6","icon":"fa-map-marker"},{"text":"Opcion7","icon":"fa-search","children":[{"text":"Opcion7-1","icon":"fa-plug"},{"text":"Opcion7-2","icon":"fa-filter"}]}]';
               
                var iconPickerOpt = {cols: 5, searchText: "Buscar...", labelHeader: '{0} de {1} Pags.', footer: false};
                var options = {
                    hintCss: {'border': '1px dashed #13981D'},
                    placeholderCss: {'background-color': 'gray'},
                    ignoreClass: 'btn',
                    opener: {
                        active: true,
                        as: 'html',
                        close: '<i class="fa fa-minus"></i>',
                        open: '<i class="fa fa-plus"></i>',
                        openerCss: {'margin-right': '10px'},
                        openerClass: 'btn btn-success btn-xs'
                    }
                };
                var editor = new MenuEditor('myList', {listOptions: options, iconPicker: iconPickerOpt, labelEdit: 'Edit', labelRemove: 'Remove'});
								$("#btnAdd").click(function(){
									
									
								});
								$("#menuCategory").change(function(){
									
									$term_id = $('#menuCategory option:selected').val();
									$term_name = $('#menuCategory option:selected').text();
										$.post("<?= ADMIN_URL.'/menu/getMenuList'?>",{term_id:$term_id,term_name:$term_name},function(response){
										
												response = JSON.parse(response);
									
												editor.setData(response.data.post.content);
													$("#term_id").attr('name',"terms[menu]["+$term_id+"]");
													$("#term_id").val(response.data.post.id);
													$("#id").val(response.data.post.id);
													$("#content").val(response.data.post.content);
													$("#title").val(response.data.post.title);
										});
								});
                
							
							
                $('#btnOut').on('click', function () {
                    var str = editor.getString();
									$("#content").val(str);
									$("#frmEdit").submit();
									console.log(str);
                   
                });
            });
        </script>
		
		<script>
				$(document).ready(function(){
					var tour = new Tour({
						steps: [
						{
							element: "#test",
							title: "Click Here to go back Dashboard",
							content: "From Anywhere you can go to dashboard from here"
							
						}
					]});
					
					tour.addStep({
						path: "",
						host: "",
						element: "",
						placement: "right",
						smartPlacement: true,
						title: "",
						content: "",
						next: 0,
						prev: 0,
						animation: true,
						container: "body",
						backdrop: false,
						backdropContainer: 'body',
						backdropPadding: false,
						redirect: true,
						reflex: false,
						orphan: false,
						template: "",
						onShow: function (tour) {},
						onShown: function (tour) {},
						onHide: function (tour) {},
						onHidden: function (tour) {},
						onNext: function (tour) {},
						onPrev: function (tour) {},
						onPause: function (tour) {},
						onResume: function (tour) {},
						onRedirectError: function (tour) {}
						});
					

					// Initialize the tour
					//tour.init();

					// Start the tour
					//tour.start();
					
					
				$("#deleteAll").click(function(){
					 var $form = $("#deleteAllForm");
						event.preventDefault();
					$('#confirmDelete').modal({
							backdrop: 'static',
							keyboard: false
						})
						.one('click', '#delete', function(e) {
				
							$form.trigger('submit');
						});
					
				});
					
					function search(){
						
						$searchInput = $("#searchInput").val();

						if($searchInput!=""){
							$searchUrl = "<?= ADMIN_URL.'/'.strtolower($this->name).'/search/' ?>"+$searchInput;				
							
							window.location.href = $searchUrl;							
						}else{
							window.location.href = "<?= ADMIN_URL.'/'.strtolower($this->name) ?>";
						}				
					}
					
					$('#searchInput').keypress(function (e) {
					 var key = e.which;
					 if(key == 13)  // the enter key code
						{
							event.preventDefault(); 
							search();
						}
					}); 
					
				
					$("#searchButton").click(search);
																	 
					$(".removeIt").click(function(event){
					 var $href = $(this).attr("href");
					 
						event.preventDefault();
					$('#confirmDelete').modal({
							backdrop: 'static',
							keyboard: false
						})
						.one('click', '#delete', function(e) {
							window.location.href = $href;
						});
					
				});
					
					
					
				$("#deleteAll").hide();
				$("#selectAll").change(function() {
					$(".ids").prop('checked', $(this).prop('checked'));

					if($(".ids:checked").length>0)
						$("#deleteAll").show();
					else
						$("#deleteAll").hide();

				});


				$(".ids").change(function() {
					if($(".ids:checked").length>0)
						$("#deleteAll").show();
					else
						$("#deleteAll").hide();


					 if($(".ids").length == $(".ids:checked").length)
							$("#selectAll").prop("selectAll", true);
						else							
							$("#selectAll").prop("checked", false);            

				});

				});

</script>
  </body>
</html>
