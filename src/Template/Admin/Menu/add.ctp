 
<link rel="stylesheet" href="<?=SITE_URL.'/backend/'?>/bs-iconpicker/css/bootstrap-iconpicker.min.css">
<div class="row">
           
	<div class="col-md-6 col-sm-12 col-xs-12">
															<?php
																		echo $this->element('form_start',['formTitle'=>'Add Menu']);
																		echo $this->Form->create('test',['id'=>'frmEdit',"url"=>ADMIN_URL."/posttype/post/add"]); ?>

                                <input type="hidden" id="mnu_icon">
                                <input type="hidden" id="id" name="id">
                                <input type="hidden" name="terms[menu][]" id="term_id">
                                <input type="hidden" name="post_type" value="menu">
                                <input type="hidden" name="title" id="title">
                                <input type="hidden" id="content" name="content">
                                
		
		 														<div class="form-group">
                                    <label for="mnu_href" class="control-label">Menu</label>
                                                                  
																			<select class="form-control" id="menuCategory">
																				<option value="">Select Menu</option>
																				<?php foreach($menuList as $term) { ?>}
																					<option value="<?= $term->id ?>"><?= ucfirst($term->name) ?></option>
																				<?php } ?>
																			</select>
                                  
                                </div>
		
		
                              <div class="form-group">
                                    <label for="mnu_text" class="control-label">Text</label>
                               
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="mnu_text" name="mnu_text" placeholder="Text">
                                            <div class="input-group-btn">
                                                <button id="mnu_iconpicker" class="au-btn--submit" data-iconset="fontawesome" data-icon="" type="button">icon</button>
                                            </div>
                                        </div>
                                 
                                </div>
                                <div class="form-group">
                                    <label for="mnu_href" class="control-label">URL</label>
                                   
                                        <input type="text" class="form-control" id="mnu_href" name="mnu_href" placeholder="URL">
                               
                                </div>
                                <div class="form-group">
                                    <label for="mnu_target" class="control-label">Target</label>
                                 
                                        <select id="mnu_target" name="mnu_target" class="form-control">
                                            <option value="_self">Self</option>
                                            <option value="_blank">Blank</option>
                                            <option value="_top">Top</option>
                                        </select>
                               
                                </div>
                                <div class="form-group">
                                    <label for="mnu_title" class="control-label">Tooltip</label>                                
                                        <input type="text" class="form-control" id="mnu_title" name="mnu_title" placeholder="Text">
                           
                                </div>
															
															
		
		
															
															 <button type="button" id="btnUpdate" class="btn btn-primary" disabled><i class="fa fa-refresh"></i> Update</button>
                            <button type="button" id="btnAdd" class="btn btn-success"><i class="fa fa-plus"></i> Add</button>
													<?php		
                          	echo $this->Form->end(); 
	echo $this->element('form_end'); ?>
	</div>

                <div class="col-md-6">
                    <?= $this->element('table_start',['tableTitle'=>'Manage Menu','search'=>false]) ?>
									
                        <div class="panel-body" id="cont">
                            <ul id="myList" class="sortableLists list-group">
                            </ul>
                        </div>
									 <button id="btnOut" type="button" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Save</button>
									<?= $this->element('table_end') ?>
                    </div>
                   
                </div>
         