<?php include('header.php'); ?>
	<div class="row">
<?php 
	 	if(!empty($game_slug)) { 
	 		 $game_teams = $ez->getTeams($game_slug);
	 		 
	 		 
include('sidebar.php'); 

?>
          <div class="col-lg-10">
              <div class="panel panel-primary">
               <?php 
               		if(isset($_GET['id'])) { 
               			$id = $_GET['id']; 
               			 $league_data = $ez->getLeague($id);
               			  $league_name = $league_data['0']['league'];
               ?>
               <div class="panel-heading">
                  <h3 class="panel-title"><span class="bolder"><?php echo $current_game; ?></span> - <span class="italic"><?php print $league_name; ?> League Challenges</span></h3>
                </div>
               	 <div class="panel-body">
               	 	<div class="success">
               	 		<span class="success_text"></span>
               	 	</div>
               	  <table class="table table-striped table-hover ">
				   <thead>
				    <tr>
				      <th>#</th>
				      <th>Guild (Abr)</th>
				      <th class="hidden-xs">GM</th>
				      <th>ELO</th>
				      <th></th>
				    </tr>
				   </thead>
				   <tbody>
<?php $league_guilds = $ez->getLeagueGuilds($id); 
		$current_challenges = $ez->getTeamMadeLeagueChallenges($ez_guild_id, $id);
?>
	<?php foreach($league_guilds as $team) { 
		   $previous_challenge = 0;
			if(in_array($team['id'], $current_challenges['0'], TRUE)) {
				$previous_challenge = 1;
			}
			 
	?>				 
				    <tr>
				      <td><?php print $team['id']; ?></td>
				      <td><?php print $team['guild']; ?></td>
				      <td class="hidden-xs"><?php print $team['gm']; ?></td>
				      <td><?php print $team['elo']; ?></td>
				      <td>
				      	<a href="<?php echo $site_url; ?>/game/<?php echo $game_slug; ?>/teams/id/<?php echo $team['id']; ?>" class="btn btn-info btn-xs">View Team</a>
				      <?php if($team['guild'] != $ez_guild_name && isset($_SESSION['ez_admin'])) { ?> 
				      	<?php if($previous_challenge == 1) { ?>
				      		<button class="btn btn-warning btn-xs" disabled>Acceptance Pending</button>
				      	<?php } else { ?> 
				        	<button onclick="makeChallenge('<?php print $team['id']; ?>', '<?php print $ez_guild_id; ?>', '<?php print $id; ?>');" class="btn btn-success btn-xs">Make Challenge</button>
				        <?php } ?>
				      <?php } ?>
				      </td>
				    </tr>
	<?php } ?>				    
				   </tbody>
				  </table>
				 </div>
              </div>
            <?php } else { ?>
             <h3>You must select a League</h3>
            <?php } ?>
          </div>
      <?php } else { ?>
       <h3>You must select a game</h3>
      <?php } ?> 
	</div>


<?php include('footer.php'); ?>