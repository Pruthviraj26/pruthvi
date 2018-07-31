

<?= $this->element('table_start',['tableTitle'=>$viewTitle]) ?>

                        <thead>
                          <tr class="headings">
                           <th>
                             <!-- <input type="checkbox" id="selectAll" name="selectAll" >-->
                            </th>
                            <th>Sr.</th>
                            <th>Title</th>                            
                            <th>Subject</th>                            
                      <!--      <th>Content</th>   -->                         
                            
														
														
              
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
													<?php foreach($emailtemplates as $index=>$row) { ?>
                          <tr class="even pointer">
                          <td class="a-center ">
														<?php if(count($row->cards)==0 and $row->id!=$authUser['id']){ ?>
                             <!-- <input type="checkbox" class="ids" name="ids[<?php $row->id ?>]">-->
														<?php } ?>
                            </td>
                           
														
														<td><?= ++$index ?></td>
													
												
															
														<td><a href="<?= ADMIN_URL.'/emailtemplates/edit/'.$row->id ?>" data-toggle="tooltip" data-original-title="View and Edit"><?= ucwords($row->title) ?></a></td>
														
														<td><?= $row->subject ?></td>
														<!--<td><?php $row->content ?></td>-->
														
                            
                            	<td style="width:160px;">
	
                            	<?php $this->element('table_change_status_toggel',['row'=>$row])?>
                            	<?= $this->element('table_edit_btn',['row'=>$row])?>   
															<?php if(count($row->cards)==0 and $row->id!=$authUser['id']){ ?>
                            	<?php $this->element('table_delete_btn',['row'=>$row])?>
															<?php } ?>
																
																	<?php if(count($row->cards)){ ?>
																<a href="<?= ADMIN_URL.'/emailtemplates/cards/'.$row->id ?>" title="View Cards <?= 'of '.ucwords($row->first_name.' '.$row->last_name) ?>" data-toggle="tooltip" class="btn btn-primary"><i class="fa fa-credit-card"></i></a>
																<?php } ?>
                            	</td>
                            	

                          </tr>
                       <?php } ?>
                        </tbody>
             

<?= $this->element('table_end') ?>