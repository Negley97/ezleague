<?php include('header.php'); ?>

	<div class="row">
		  
          <?php include('sidebar.php'); ?>
          <div class="col-lg-10">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="bolder"><?php echo $current_game; ?></span> - Schedules - <span class="italic">Select League</span></h3>
                </div>
                <div class="panel-body">
                 <div class="col-lg-6">
                  	<?php $leagues = $ez->getLeaguesByGame($current_game); ?>
                  	 <?php foreach($leagues as $league) { ?>
                  	 		<h3><?php print $league['league']; ?></h3>
                  	 		 <a href="<?php print $site_url; ?>/game/<?php print strtolower($current_game); ?>/schedule/id/<?php print $league['id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-calendar"></i> View Schedule</a>
                  	 <?php } ?>
                  </div>
                </div>
                <div class="success">
				  <span class="success_text"></span>
				 </div>
              </div>

          </div>
	</div>


<?php include('footer.php'); ?>