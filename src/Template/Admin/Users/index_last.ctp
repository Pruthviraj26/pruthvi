

<?= $this->element('table_start',['tableTitle'=>$viewTitle]) ?>

                        <thead>
                          <tr class="headings">
                           <th>
                              <input type="checkbox" id="selectAll" name="selectAll" >
                            </th>
                            <th>Sr.</th>
                            <th>Image</th>                            
                            <th>User Name</th>                            
                            <th>Full Name</th>                            
                            <th>Gender</th>
														<th>Email</th>
														<th>Mobile</th>
														<th>Address</th>
														<th>Social</th>
														
														
              
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
													<?php foreach($users as $index=>$row) { ?>
                          <tr class="even pointer">
                          <td class="a-center ">
                              <input type="checkbox" class="ids" name="ids[<?= $row->id ?>]">
                            </td>
                           
														
														<td><?= ++$index ?></td>
														<td><?= $row->username ?></td>
														<td>	<?php $url = strpos($row->image,'http')!==false?$row->image:SITE_URL."/img/medium/".$row->image;  ?>
																	<img width="45px" height="45px" src="<?= $url ?>" alt="<?= $row->username ?>" >
														
														</td>
														<td><a href="<?= ADMIN_URL.'/users/edit/'.$row->id ?>" data-toggle="tooltip" data-original-title="View and Edit"><?= ucwords($row->first_name.' '.$row->last_name) ?></a></td>
														
														<td><?= $row->gender ?></td>
														<td><?= $row->email ?></td>
														<td><?= $row->mobile_no ?></td>
														<td><?= $row->address ?></td>
														<td><?php if($row->facebook_id){ ?><a  href="<?= 'https://www.facebook.com/'.$row->facebook_id ?>"><i class="fa fa-facebook"></i></a>
																<?php } ?>
													<?php if($row->google_id){ ?><a  href="<?= 'https://plus.google.com/'.$row->google_id ?>"><i class="fa fa-google-plus"></i></a>
																<?php } ?>
															<?php if($row->twitter_screen_name){ ?><a  href="<?= 'https://twitter.com/'.$row->twitter_screen_name ?>"><i class="fa fa-twitter"></i></a>
																<?php } ?>
															</td>
													
                            
                            	<td>
															
																
                            		<?= $this->element('table_change_status_toggel',['row'=>$row])?>
                            	<?= $this->element('table_edit_btn',['row'=>$row])?>   
																<?php if(count($row->cards)==0 and $row->id!=$authUser['id']){ ?>
                            	<?= $this->element('table_delete_btn',['row'=>$row])?>
																<?php } ?>
																	<?php if(count($row->cards)){ ?>
																<a href="<?= ADMIN_URL.'/users/cards/'.$row->id ?>" title="View Cards <?= 'of '.ucwords($row->first_name.' '.$row->last_name) ?>" data-toggle="tooltip" class="btn btn-primary"><i class="fa fa-credit-card"></i></a>
																<?php } ?>
                            	</td>
                            	

                          </tr>
                       <?php } ?>
                        </tbody>
             

<?= $this->element('table_end') ?>