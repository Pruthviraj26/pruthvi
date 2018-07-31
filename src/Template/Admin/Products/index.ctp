

<?= $this->element('table_start',['tableTitle'=>$viewTitle]) ?>

                        <thead>
                          <tr class="headings">
                         <th>
                              <input type="checkbox" id="selectAll" name="selectAll" >
                            </th>
                            <th class="column-title">Sr.</th>
                            <th class="column-title">Title</th>
                            <th class="column-title">Accept Card Per Day</th>                 
                            <th class="column-title">Offer Percentage</th>                 
              
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
													<?php foreach($products as $index=>$row) { ?>
                          <tr class="even pointer">
                              <td class="a-center ">
																	<?php if(count($row->cards)==0){ ?>
                              <input type="checkbox" class="ids" name="ids[<?= $row->id ?>]">
																<?php } ?>
                            </td>
                            <td class=" "><?= ++$index ?></td>
                            <td class=" "><?= $row->title ?></td>
                            <td class=" "><?= $row->accept_card_per_day ?></td>
                            <td class=" "><?= $row->offer_percentage ?></td>
               
                            
                            	<td>
                            		<?= $this->element('table_change_status_toggel',['row'=>$row])?>
                            		
																<?= $this->element('table_edit_btn',['row'=>$row])?>
																
																<?php if(count($row->cards)==0){ ?>
                            		<?= $this->element('table_delete_btn',['row'=>$row])?>
																<?php }else{ ?>
																	
																<a href="<?= ADMIN_URL.'/cards/search/'.strtolower($row->title) ?>" title="View Cards <?= 'of '.ucwords($row->title) ?>" data-toggle="tooltip" class="btn btn-primary"><i class="fa fa-credit-card"></i></a>
																
																<?php } ?>
                            	</td>
                            	

                          </tr>
                       <?php } ?>
                        </tbody>
             

<?= $this->element('table_end') ?>
