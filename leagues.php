<?php include('header.php'); ?>

	<div class="row">
		  
          <?php include('sidebar.php'); ?>
          <div class="col-lg-10">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="bolder"><?php echo $current_game; ?></span> - <span class="italic">Current Leagues</span></h3>
                </div>
                <div class="panel-body">
                 <div class="col-lg-6">
                  <?php 
                  		$team_leagues = $ez->getTeamLeagues($ez_guild_id);
                  		$leagues = $ez->getLeagues($game_slug);
						
                  		 //check if the current user is the guild admin
                  		  $team_admin = $ez->getTeamAdmin($ez_guild['0']['id']);
                  		   if($team_admin == $_SESSION['ez_username']) {
                  		   	$_SESSION['ez_admin'] = $_SESSION['ez_username'];
                  		   }
                  		 foreach($leagues as $league) {
                  		 	$total_teams = $ez->getTotalLeagueTeams($league['id']);
                  		 	$max_teams = $league['teams'];
                  		 	print "<h4>" . $league['league'] . " &#8211; (" . $total_teams . " of " . $max_teams . " max teams) </h4>";
                  		   if(!strpos("x" . $team_leagues, $league['id']) && isset($_SESSION['ez_admin'])) { ?>
                  		 		<button onclick="joinLeague('<?php print $league['id']; ?>', '<?php print $ez_guild_id; ?>');" class="btn btn-info btn-xs">Join League</button>
                  <?php    } else { ?>
                  				<a href="<?php print $site_url; ?>/challenges/make/<?php print $league['id']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-sitemap"></i> Challenges</a>
                  <?php    } ?>
                  				<a href="<?php print $site_url; ?>/game/<?php print $game_slug; ?>/standings" class="btn btn-warning btn-xs"><i class="fa fa-search"></i> View Standings</a>
                  				<a href="<?php print $site_url; ?>/game/<?php print $game_slug; ?>/rules/id/<?php print $league['id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> View Rules</a>
               				<hr/>
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