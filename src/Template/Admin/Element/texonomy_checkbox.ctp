<style>
	
	@import url(https://fonts.googleapis.com/css?family=Noto+Sans);

*, *::before, *::after {
  box-sizing: border-box;
}

.boxes {
  margin: auto;
  padding: 5px;
  
}

/*Checkboxes styles*/
input[type="checkbox"] { display: none; }

input[type="checkbox"] + label {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 2px;
  font: 14px/20px 'Open Sans', Arial, sans-serif;

  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
}

input[type="checkbox"] + label:last-child { margin-bottom: 0; }

input[type="checkbox"] + label:before {
  content: '';
  display: block;
  width: 20px;
  height: 20px;
  border: 1px solid #6cc0e5;
  position: absolute;
  left: 0;
  top: 0;
  opacity: .6;
  -webkit-transition: all .12s, border-color .08s;
  transition: all .12s, border-color .08s;
}

input[type="checkbox"]:checked + label:before {
  width: 10px;
  top: -5px;
  left: 5px;
  border-radius: 0;
  opacity: 1;
  border-top-color: transparent;
  border-left-color: transparent;
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
}
	
</style>

<?php
	//pr($terms);
?>

	<div class="boxes">
	<?php foreach($terms as $id=>$term){
		if(strpos($term,"_")!==false)
			$term = str_replace("_","&nbsp;&nbsp;&nbsp;",$term);
		else
			$term = "<b>".$term."</b>";
			$checked = "";
		if($termsForPost!='')
			$checked = in_array($id,$termsForPost)?'checked':'';
	
		
		?>
		<input type="checkbox" name="terms['<?= $texonomy ?>'][<?= $id ?>]" <?= $checked ?> value="<?=$term ?>"  id="<?=$term ?>">
  	<label for="<?=$term ?>"><?= $term ?></label>
	<?php } ?>
</div>


