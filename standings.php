<?php include('header.php'); ?>

	<div class="row">
		  
          <?php include('sidebar.php'); ?>
          <div class="col-lg-10">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="bolder"><?php echo $current_game; ?></span> - <span class="italic">Standings</span></h3>
                </div>
                <div class="panel-body">
<?php $leagues = $ez->getLeagues($current_game); ?>
 <?php foreach($leagues as $league) { $standing = 0; ?>
 	<?php $league_standings = $ez->getLeagueStandings($league['id']); ?>       
 	 		   <div class="col-lg-6"> 
 	 		     <h3><?php print $league['league']; ?></h3>        
                  <table class="table table-striped table-hover ">
				   <thead>
				    <tr>
				      <th>Standing</th>
				      <th>Guild</th>
				      <th>ELO</th>
				      <th></th>
				    </tr>
				   </thead>
				   <tbody>
				   
	<?php foreach($league_standings as $team) { $standing++; ?>				 
				    <tr>
				      <td class="bolder"><?php print $standing; ?></td>
				      <td><?php print $team['guild']; ?></td>
				      <td><?php print $team['elo']; ?></td>
				      <td><a href="<?php echo $site_url; ?>/game/<?php echo $game_slug; ?>/teams/id/<?php echo $team['id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-search"></i> View Team</a></td>
				    </tr>
	<?php } ?>				    
				   </tbody>
				  </table>
				 </div>
<?php } ?>				  
                </div>
              </div>

          </div>
        
	</div>


<?php include('footer.php'); ?>