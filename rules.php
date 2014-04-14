<?php include('header.php'); ?>

	<div class="row">
		  
          <?php include('sidebar.php'); ?>
          <div class="col-lg-10">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="bolder"><?php echo $current_game; ?></span> - <span class="italic">Rules</span></h3>
                </div>
                <div class="panel-body">
                 <div class="col-lg-12">
                  	<?php if(isset($_GET['league_id'])) {
                  			$league_id = $_GET['league_id'];
                  	?>
                  		<h3><?php print $ez->getLeagueName($league_id); ?> Rules</h3>
                  	  <hr/>
                  	  <?php print $ez->getLeagueRules($league_id); ?>
                  	<?php 
                  		  } else { 
                  	?>
                  		<h3>No League was selected</h3>  
                  		  	
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