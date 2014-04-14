<?php include('header.php'); ?>
	<div class="row">
<?php 
	 	if(!empty($game_slug)) { 
	 		 $game_teams = $ez->getTeams($game_slug);
	 		  
	 		 
include('sidebar.php'); 

?>
          <div class="col-lg-10">
              <div class="panel panel-primary">
               <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $current_game; ?> Teams</h3>
                </div>
               	 <div class="panel-body">
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
<?php foreach($game_teams as $team) { ?>				 
				    <tr>
				      <td><?php print $team['id']; ?></td>
				      <td><?php print $team['guild']; ?></td>
				      <td class="hidden-xs"><?php print $team['gm']; ?></td>
				      <td><?php print $team['elo']; ?></td>
				      <td><a href="<?php echo $site_url; ?>/game/<?php echo $game_slug; ?>/teams/id/<?php echo $team['id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-search"></i> View Team</a></td>
				    </tr>
<?php } ?>				    
				   </tbody>
				  </table>
				 </div>
              </div>
          </div>
      <?php } else { ?>
       <h3>You must select a game</h3>
      <?php } ?> 
	</div>


<?php include('footer.php'); ?>