<?php include('header.php'); ?>

	<div class="row">
		  
          <?php include('sidebar.php'); ?>
          <div class="col-lg-10">
           <?php if(!isset($_GET['id'])) { ?>
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="bolder"><?php echo $current_game; ?></span> - Match Results - <span class="italic">Select League</span></h3>
                </div>
                <div class="panel-body">
                 <div class="col-lg-6">
                  	<?php $leagues = $ez->getLeaguesByGame($current_game); ?>
                  	 <?php foreach($leagues as $league) { ?>
                  	 		<h3><?php print $league['league']; ?></h3>
                  	 		 <a href="<?php print $site_url; ?>/game/<?php print strtolower($current_game); ?>/result/id/<?php print $league['id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-trophy"></i> View Results</a>
                  	 <?php } ?>
                  </div>
                </div>
                <div class="success">
				  <span class="success_text"></span>
				 </div>
              </div>
			<?php } elseif(isset($_GET['id'])) { 
						$league_id = $_GET['id']; 
			?>
			  <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="bolder"><?php echo $current_game; ?></span> - <span class="italic">Results</span></h3>
                </div>
                <div class="panel-body">
                 <div class="col-lg-6">
                  <h3><?php print $ez->getLeagueName($league_id) . " Results"; ?></h3>
                  	<table class="table table-striped table-hover ">
					   <thead>
					    <tr>
					      <th>Matchup</th>
					      <th>Score</th>
					      <th>Match Date</th>
					      <th></th>
					    </tr>
					   </thead>
					   <tbody>
					    <?php $match_results = $ez->getLeagueResults($league_id); ?>
					 	<?php foreach($match_results as $match) { ?>
					 		<tr>
					 		  <td><span <?php print ($match['challenger_score'] > $match['challengee_score'] ? 'class=\'win\'>' : 'class=\'loss\'>') . $match['g_challenger']; ?></span>
					 		  	  vs
					 		  	  <span <?php print ($match['challengee_score'] > $match['challenger_score'] ? 'class=\'win\'>' : 'class=\'loss\'>') . $match['g_challengee']; ?></span>
					 		  </td>
					 		  <td><?php print $match['challenger_score']; ?>
					 		  	  &#8211;
					 		  	  <?php print $match['challengee_score']; ?>
					 		  </td>
					 		  <td><?php print date('F d, Y', strtotime($match['match_date'])); ?></td>
					 		</tr>
					 	<?php } ?>
                  	   </tbody>
                  	  </table>
                  </div>
                </div>
                <div class="success">
				  <span class="success_text"></span>
				 </div>
              </div>
			<?php } ?>
          </div>
	</div>


<?php include('footer.php'); ?>