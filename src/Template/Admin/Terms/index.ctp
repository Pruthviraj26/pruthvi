<div class="row">
	<div class="col-md-4 col-sm-12 col-xs-12">

<?php 
		
		$texonomyOptions = $themeConfig['Texonomies'][$texonomy]['option'];
		
		
		$new = $term->isNew();	 
		$viewTitle = ucfirst($texonomy);
		$options = ['0'=>'None'];
		
		if($terms){
			foreach($terms as $option)
				$options[$option->id] = $option->name; 		
		}
			echo $this->Form->create($term,['name'=>'termForm','id'=>'termForm','url'=>ADMIN_URL.'/terms/add','type'=>'POST','enctype' => 'multipart/form-data']);		
		
		$elements[] = $this->Form->button('ADD',['class'=>'btn btn-success']);
		echo $this->element('form_start',['formTitle'=>$texonomyOptions['labels']['add_new_item'],'elements'=>$elements]);
		echo '<div class="form-horizontal" >';
		echo $this->Form->control('texonomy',['type'=>'hidden','value'=>$texonomy,'required']);
		echo $this->Form->input('post_type',['type'=>'hidden','value'=> $posttype]); 
		echo $this->Form->control('name',['required']);	
		if($texonomyOptions['hierarchical']){
			echo $this->Form->select('parent_id',$options);
		}
		echo $this->Form->control('description',['required']);					
		echo !$new?$this->element('create_modify_details',['record'=>$term]):''; 
		echo '</div>';
	echo $this->element('form_end');
			echo $this->Form->end(); 
?>

	</div>
	
<div class="col-md-8 col-sm-12 col-xs-12">

<?= $this->element('table_start',['tableTitle'=>$texonomyOptions['labels']['all_items']]) ?>

                        <thead>
                          <tr class="headings">
                          <th>
                              <input type="checkbox" id="selectAll" name="selectAll" >
                            </th>
                            <th class="column-title">Sr.</th>
                            <th class="column-title">Name</th>
                            <th class="column-title">Parent</th>
                            <th class="column-title">Children</th>
                            <th class="column-title">Slug</th>                                                                             
                                          
                                                                                                            
                            <th class="column-title no-link last" style="width:160px;"><span class="fa fa-gear"></span> Action</th>
                            
                          </tr>
                        </thead>

                        <tbody>
													<?php foreach($terms as $index=>$row) {
									?>
                          <tr class="even pointer">
                           <td class="a-center ">
                              <input type="checkbox" class="ids" name="ids[<?= $row->id ?>]">
                            </td>
														<th><?= ++$index ?></th>
                            <td><?= $row->name ?></td>
                            <td><?= $row->Parent['name']; ?></td>
                            <td><?= count($row->child); ?></td>
                            <td><?= $row->slug ?></td>

														<td>
															<?= $this->element('table_change_status_toggel',['row'=>$row])?>																
															<a href="<?=ADMIN_URL.'/posttype/'.$posttype.'/texonomy/'.$texonomy.'/edit/'.$row->id ?>" title="" data-toggle="tooltip" class="btn btn-success" data-original-title="View and Edit"><i class="fa fa-edit"></i></a>
															<?= $this->element('table_delete_btn',['row'=>$row])?>
														</td>
                            	

                          </tr>
													
                       <?php } ?>
													
                        </tbody>


<?= $this->element('table_end') ?>
	</div>

</div>
<script>
	<?= $this->start('script') ?>
	$(document).ready(function(){
		$("#termForm").validate({
      rules: {
          title: "required",
          description: "required",          
        
      },
      messages: {
        title: "<?=__("Please, enter title.") ?>",
        image:  "<?=__("Please, select image.") ?>",
        description:  "<?=__("Please, enter description.") ?>",
          
      },
				  errorPlacement: function(error, element) {
				  	$(".form-group").css("height","100px !important;");
				  	element.attr("placeholder",error.html());
				  },

  });
	});
		 
	<?= $this->end('script') ?>
	
</script>


