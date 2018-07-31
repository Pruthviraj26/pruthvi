<style>
	
	#searchButton{
		border-bottom-left-radius: 0;
    border-top-left-radius: 0;	
	}
	
</style>
<?php

	if(!isset($deleteAction))
		$deleteAction = ADMIN_URL.DS.strtolower($this->name).DS.'deleteAll';

	if(!isset($controller))
		$controller = strtolower($this->name);
?>


<div id="confirmDelete" class="modal">
  <div class="modal-body" style="background-color: white;">
    <b>Are you sure to delete ?</b>
  </div>
  <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-danger" id="delete">Delete</button>
    <button type="button" data-dismiss="modal" class="btn">Cancel</button>
  </div>
</div>


	
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= $tableTitle ?> <small><?= isset($tagline)?$tagline:'' ?></small></h2>
									
										<form method="post">
                    <ul class="nav navbar-right panel_toolbox">
											
											<li>
												
											
										 	<input type="search"  name="searchInput" class="form-control" placeholder="Search...">
												
											
											</li>
											<li><button type="submit" class="btn btn-primary"  style="border-radius: 0px;"><i class="fa fa-search"></i></button></li>
										
										
                      <li><button type="button" class="btn btn-danger" id="deleteAll" type="submit"><i class="fa fa-trash"></i></button></li>
                     
                     
                    </ul>
													</form>
									
                    <div class="clearfix"></div>
                  </div>
<form action="<?= $deleteAction ?>" name="listForm" id="deleteAllForm" method="post">
                  <div class="x_content">

                    <!--<p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>-->

                    <div class="table-responsive">
											
                      <table id="productList" class="table table-striped jambo_table bulk_action">
                  