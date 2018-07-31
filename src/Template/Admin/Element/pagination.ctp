<?php if(isset($pagination)){ ?>
<table>
<?php 

$actual_link = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$page = "";
if (strpos($actual_link, 'page') !== false) {

}else{
	$urlLastChar =  substr($actual_link,-1);
	if($urlLastChar!="/")
    $page = $actual_link.'/page/';
	else
		$page = $actual_link.'page/';
}

if($pagination['pageCount']>1) { ?>

<nav aria-label="Page navigation">
        <ul class="pagination">
					<?php if($pagination['prevPage']) { ?>
            <li class="page-item"><a class="page-link" href="<?= $page.$pagination['page']-1 ?>">Prev </a></li>
					<?php }else{  ?>
						<li class="page-item disabled"><a class="page-link" >Prev</a></li>
					<?php } ?>
					
					<?php if($pagination['pageCount']<10){ 
																for($i=1;$i<=$pagination['pageCount'];$i++){  ?>
								<li class="page-item <?= $i==$pagination['page']?'active':'' ?> "><a class="page-link" href="<?= $page.$i ?>"> <?= $i ?></a></li>
					<?php } 
				} ?>
					
					<?php if($pagination['pageCount']>9){
					$i = $pagination['page'];
					?>
									<?php if($pagination['page']>4){?> 
									<li class="page-item  "><a class="page-link" href="<?= $page.$i - 4 ?>"> <?= $i - 4 ?></a></li>
									<li class="page-item"><a class="page-link" href="<?= $page.$i-3 ?>"> <?= $i - 3 ?></a></li>
									<li class="page-item"><a class="page-link" href="<?= $page.$i-2 ?>"> <?= $i - 2 ?></a></li>
									<li class="page-item"><a class="page-link" href="<?= $page.$i-1 ?>"> <?= $i - 1 ?></a></li>								
								<?php } ?>
							<li class="page-item active"><a class="page-link" href="<?= $page.$i ?>"> <?= $i ?></a></li>
							<li class="page-item"><a class="page-link" href="<?= $page.$i+1 ?>"> <?= $i+1 ?></a></li>
							<li class="page-item"><a class="page-link" href="<?= $page.$i+2 ?>"> <?= $i+2 ?></a></li>
							<li class="page-item"><a class="page-link" href="<?= $page.$i+3 ?>"> <?= $i+3 ?></a></li>
							<li class="page-item"><a class="page-link" href="<?= $page.$i+4 ?>"> <?= $i+4 ?></a></li>
									
					
					<?php } ?>
					
					
						<?php if($pagination['nextPage']) { ?>
            <li class="page-item"><a class="page-link" href="<?= $page.$pagination['page']+1 ?>">Next </a></li>
					<?php }else{  ?>
						<li class="page-item disabled"><a class="page-link" >Next</a></li>
					<?php } ?>
					
					
					
        </ul>
    </nav>
	
<?php } ?>
<h4>Total Result Found : <?= $pagination['count'] ?></h4>
	</table>

<?php } ?>