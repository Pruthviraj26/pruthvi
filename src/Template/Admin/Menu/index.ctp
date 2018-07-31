 
<link rel="stylesheet" href="<?=SITE_URL.'/backend/'?>/bs-iconpicker/css/bootstrap-iconpicker.min.css">
<div class="row">
           
	<div class="col-md-6 col-sm-12 col-xs-12">
															<?php
																		echo $this->element('form_start',['formTitle'=>'test']);
																		echo $this->Form->create('test',['id'=>'frmEdit']); ?>

                                <input type="hidden" name="mnu_icon" id="mnu_icon">
                                <div class="form-group">
                                    <label for="mnu_text" class="col-sm-2 control-label">Text</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="mnu_text" name="mnu_text" placeholder="Text">
                                            <div class="input-group-btn">
                                                <button id="mnu_iconpicker" class="btn btn-default" data-iconset="fontawesome" data-icon="" type="button"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mnu_href" class="col-sm-2 control-label">URL</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="mnu_href" name="mnu_href" placeholder="URL">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mnu_target" class="col-sm-2 control-label">Target</label>
                                    <div class="col-sm-10">
                                        <select id="mnu_target" name="mnu_target" class="form-control">
                                            <option value="_self">Self</option>
                                            <option value="_blank">Blank</option>
                                            <option value="_top">Top</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mnu_title" class="col-sm-2 control-label">Tooltip</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="mnu_title" name="mnu_title" placeholder="Text">
                                    </div>
                                </div>
															
															
															 <button type="button" id="btnUpdate" class="btn btn-primary" disabled><i class="fa fa-refresh"></i> Update</button>
                            <button type="button" id="btnAdd" class="btn btn-success"><i class="fa fa-plus"></i> Add</button>
													<?php		
                          	echo $this->Form->end(); 
	echo $this->element('form_end'); ?>
	</div>

                <div class="col-md-6">
                    <?= $this->element('table_start',['tableTitle'=>'test','search'=>false]) ?>
									
                        <div class="panel-body" id="cont">
                            <ul id="myList" class="sortableLists list-group">
                            </ul>
                        </div>
									 <button id="btnOut" type="button" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Save</button>
									<?= $this->element('table_end') ?>
                    </div>
                   
                </div>
         