 <div class="row top_tiles">
           <a href="<?= ADMIN_URL.'/users/type/user' ?>" title="Click to view user list" > 
           	
           <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-users"></i></div>
                  <div class="count">
                  	
                <?= $totalActiveUsers + $totalInactiveUsers ?></div>
                  <h3>Total Users</h3>
                  <p>Active users : <?= $totalActiveUsers ?> | Inactive users : <?= $totalInactiveUsers ?></p>
                </div>
              </div>
					</a>
	 		
            </div>
	 