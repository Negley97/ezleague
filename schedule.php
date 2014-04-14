<?php include('header.php'); ?>

	<div class="row">
		  
          <?php include('sidebar.php'); ?>
          <div class="col-lg-10">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="bolder"><?php echo $current_game; ?></span> - <span class="italic">Schedule</span></h3>
                </div>
                <div class="panel-body">
                 <div class="col-lg-12">
                  	<?php if(isset($_GET['id'])) {
                  			$league_id = $_GET['id'];
                  			 $league_schedule = $ez->getLeagueSchedule($league_id);
                  	?>
                  		<h3><?php print $ez->getLeagueName($league_id); ?></h3>
                  	  <table class="table table-striped table-hover ">
					   <thead>
					    <tr>
					      <th>Matchup</th>
					      <th>Challenged</th>
					      <th>Match Date</th>
					      <th></th>
					    </tr>
					   </thead>
					   <tbody>
					 <?php 
                  			  foreach($league_schedule as $schedule) { ?>
                  			   <tr>
                  				<td><a class="text-primary bolder" href="http://mdloring.com/ezleague/game/<?php print $current_game; ?>/teams/id/<?php print $schedule['challenger']; ?>"><?php print $schedule['g_challenger'] . "</a> vs <a class=\"text-info bolder\" href=\"http://mdloring.com/ezleague/game/$current_game/teams/id/$schedule[challengee]\">" . $schedule['g_challengee']; ?></a></td>
                  				<td><?php print date('F d, Y', strtotime($schedule['created'])); ?></td>
                  				<td>
                  					<?php if($schedule['match_date'] == '') { ?>
                  						Not Set
                  					<?php } else { ?>
                  						<?php print date('F d, Y', strtotime($schedule['match_date'])); ?>
                  					<?php } ?>
                  				</td>  	
                  			   </tr>
                  	<?php  } ?>
                  	   </tbody>
                  	  </table>
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