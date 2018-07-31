

<?= $this->element('table_start',['tableTitle'=>$viewTitle]) ?>

                        <thead>
                          <tr class="headings">
                          <th>
                              <input type="checkbox" id="selectAll" name="selectAll" >
                            </th>
                            <th class="column-title">Sr.</th>
                            <th class="column-title">Name</th>
                            <th class="column-title">Image</th>                                                                             
                            <th class="column-title">Description</th>                                                                             
                                                                                                            
                            <th class="column-title no-link last" style="width:160px;"><span class="fa fa-gear"></span> Action</th>
                            
                          </tr>
                        </thead>

                        <tbody>
													<?php foreach($features as $index=>$row) { ?>
                          <tr class="even pointer">
                           <td class="a-center ">
                              <input type="checkbox" class="ids" name="ids[<?= $row->id ?>]">
                            </td>
														<th><?= ++$index ?></th>
                            <td><?= $row->title ?></td>
                            <td><img src="<?= SITE_URL.'/img/icon/'.$row->image ?>"></td>																											
														<td><?= $row->description ?></td>
															<td>
																<?= $this->element('table_change_status_toggel',['row'=>$row])?>
															<?= $this->element('table_edit_btn',['row'=>$row])?>
                            		<?= $this->element('table_delete_btn',['row'=>$row])?>
                            	</td>
                            	

                          </tr>
													
                       <?php } ?>
													
                        </tbody>

 
<table>

	
 
      
</table>
<?= $this->element('table_end') ?>





