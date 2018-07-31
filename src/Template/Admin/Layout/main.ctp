<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $viewTitle ?></title>

    <!-- Bootstrap -->
    <link href="<?= SITE_URL ?>/backend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= SITE_URL ?>/backend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= SITE_URL ?>/backend/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?= SITE_URL ?>/backend/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="<?= SITE_URL ?>/backend/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?= SITE_URL ?>/backend/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?= SITE_URL ?>/backend/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= SITE_URL ?>/backend/build/css/custom.css" rel="stylesheet">
		<link rel="icon" type="image/png" href="<?= SITE_URL ?>/favicon.png" />
		
		 <link href="<?= SITE_URL ?>/backend/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="<?= SITE_URL ?>/backend/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="<?= SITE_URL ?>/backend/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
		<link href="<?= SITE_URL ?>/backend/vendors/bootstraptour/css/bootstrap-tour-standalone.css" rel="stylesheet">
		<link href="<?= SITE_URL ?>/backend/vendors/bootstraptour/css/bootstrap-tour.min.css" rel="stylesheet">
		
    <!-- jQuery -->
 
	
		<style>
			
			.error{
				    border-color: red;
			}
			
			.form-horizontal .control-label {
    padding-top: 8px;
    text-transform: capitalize;
}
			
			
		</style>
  </head>

  <body class="nav-md">
		

		
    <div class="container body">
      <div class="main_container">
       <?= $this->element('sidebar') ?>

        <!-- top navigation -->
        <?= $this->element('topnav') ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main" id="test">
       	
						  <?= $this->fetch('content') ?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <?= $siteconfig->copyright ?>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
   <script src="<?= SITE_URL ?>/backend/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
		
		 
    <script src="<?= SITE_URL ?>/backend/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= SITE_URL ?>/backend/vendors/ckeditor/ckeditor.js"></script>
    
    <!-- FastClick -->
    <script src="<?= SITE_URL ?>/backend/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= SITE_URL ?>/backend/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?= SITE_URL ?>/backend/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?= SITE_URL ?>/backend/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?= SITE_URL ?>/backend/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?= SITE_URL ?>/backend/vendors/iCheck/icheck.js"></script>
    <!-- Skycons -->
    <script src="<?= SITE_URL ?>/backend/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?= SITE_URL ?>/backend/vendors/Flot/jquery.flot.js"></script>
    <script src="<?= SITE_URL ?>/backend/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?= SITE_URL ?>/backend/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?= SITE_URL ?>/backend/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?= SITE_URL ?>/backend/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?= SITE_URL ?>/backend/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?= SITE_URL ?>/backend/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?= SITE_URL ?>/backend/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?= SITE_URL ?>/backend/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?= SITE_URL ?>/backend/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?= SITE_URL ?>/backend/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?= SITE_URL ?>/backend/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?= SITE_URL ?>/backend/vendors/moment/min/moment.min.js"></script>
    <script src="<?= SITE_URL ?>/backend/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?= SITE_URL ?>/backend/build/js/custom.js"></script>
  
		<script src="<?= SITE_URL ?>/backend/vendors/jquery-validation/dist/jquery.validate.min.js" ></script>
		
		 <script src="<?= SITE_URL ?>/backend/vendors/pnotify/dist/pnotify.js"></script>
    <script src="<?= SITE_URL ?>/backend/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="<?= SITE_URL ?>/backend/vendors/pnotify/dist/pnotify.nonblock.js"></script>
		<script src="<?= SITE_URL ?>/backend/vendors/bootstraptour/js/bootstrap-tour-standalone.js"></script>
		<script src="<?= SITE_URL ?>/backend/vendors/bootstraptour/js/bootstrap-tour.min.js"></script>
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
		
	
        
        <script src='<?=SITE_URL.'/backend/'?>bs-iconpicker/js/iconset/iconset-fontawesome-4.2.0.min.js'></script>
        <script src='<?=SITE_URL.'/backend/'?>bs-iconpicker/js/bootstrap-iconpicker.min.js'></script>
<script src='<?=SITE_URL.'/backend/'?>jquery-menu-editor.js'></script>
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
													$("#term_id").val($term_id);
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
																	 
					$(".removeIt").click(function(){
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
