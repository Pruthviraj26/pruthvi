
<a href="<?= ADMIN_URL.DS.strtolower($this->name).DS.'togglestatus'.DS.$row->id ?>" title="Change Status" class="item btn btn-default" data-toggle="tooltip">
	
<i class="<?= $row->status=='ACTIVE'?'fa fa-toggle-on':'fa fa-toggle-off'; ?>"></i></a>