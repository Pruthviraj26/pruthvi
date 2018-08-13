<style>	
	#searchButton {
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

                    
                    <h3 class="title-3 m-b-30"><?= ucfirst($tableTitle) ?> <small><?= isset($tagline)?$tagline:'' ?></small></h3>
                    <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option selected="selected">Today</option>
                                                <option value="">3 Days</option>
                                                <option value="">1 Week</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <a href="<?= ADMIN_URL.'/posttype/'.$postType.'/add' ?>" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add item</a>
                                   
                                            <button id="deleteAll" class="au-btn au-btn-icon btn-danger au-btn--small">
                                            <i class="fa fa-trash"></i>Remove</button>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                            <select class="js-select2" name="type">
                                                <option selected="selected">Export</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                    
									<!-- 	<form method="post">
                    <ul class="nav navbar-right panel_toolbox">
											
											<li>
												
											
										 	<input type="search"  name="searchInput" class="form-control" placeholder="Search...">
												
											
											</li>
											<li><button type="submit" class="btn btn-primary"  style="border-radius: 0px;"><i class="fa fa-search"></i></button></li>
										
										
                   
                     
                     
                    </ul>
													</form> -->
									
                 
                 
<form action="<?= $deleteAction ?>" name="listForm" id="deleteAllForm" method="post">
                  <div class="x_content">

                    <!--<p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>-->

                    <div class="table-responsive m-b-40">                    
                      <table id="productList" class="table table-borderless table-data3">
                  