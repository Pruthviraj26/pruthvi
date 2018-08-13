
<?php echo $this->element('table_start',['tableTitle'=>$posttype,'postType'=>$posttype]);

?>

                        <thead>
                          <tr class="headings">
                          <th>
                             
                              <label class="au-checkbox">
                              <input type="checkbox" id="selectAll" name="selectAll" >
                                                            <span class="au-checkmark"></span>
                                                        </label>
                            </th>
                            <th class="column-title">Sr.</th>
                            <th class="column-title">Name</th>
                            <th class="column-title">Image</th>                                                                     <?php foreach($termsList as $name=>$texonomy){ ?>
                            <th class="column-title"><?php echo $name ?></th>
														<?php } ?>
                                                                                                            
                            <th class="column-title no-link last" style="width:160px;"><span class="fa fa-gear"></span> Action</th>
                            
                          </tr>
                        </thead>

                        <tbody>
													<?php foreach($post as $index=>$row) { ?>
                          <tr class="even pointer">
                           <td class="a-center ">
                           <label class="au-checkbox">
                           <input type="checkbox" class="ids" name="ids[<?= $row->id ?>]">
                                                            <span class="au-checkmark"></span>
                                                        </label>

                              
                            </td>
														<td><?= ++$index ?></td>
                            <td><?= $row->title ?></td>
                            <td><img src="<?= SITE_URL.'/img/icon/'.$row->image ?>"></td>																											
														<td><?= $row->description ?></td>
														
                                                       
                                               

															<td>
                          <div class="table-data-feature">
                                <?= $this->element('table_change_status_toggel',['row'=>$row])?>

															<a href="<?= ADMIN_URL ?>\posttype\<?=$posttype?>\edit\<?= $row->id ?>" title="" data-toggle="tooltip" class="item btn btn-success" data-original-title="View and Edit"><i class="fa fa-edit"></i></a>
										
                                <?= $this->element('table_delete_btn',['row'=>$row])?>
                                </div>
                            	</td>
                            	

                          </tr>
													
                       <?php } ?>
													
                        </tbody>

 
<table>

	
 
      
</table>
<?= $this->element('table_end') ?>





