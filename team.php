<?php include('header.php'); ?>

	<div class="row">
		  
          <?php include('sidebar.php'); ?>
          <div class="col-lg-10">
              <div class="panel panel-primary">
               <?php 
               		if(isset($_GET['id'])) { 
               			$id = $_GET['id']; 
               			 $team_details = $ez->getTeam($id);
               	?>
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="bolder"><?php echo $current_game; ?></span> - <span class="italic"><?php echo $team_details['0']['guild']; ?></span></h3>
                </div>
                <div class="panel-body">
                 <div class="col-sm-3">
                  <h3 class="center">Admins</h3>
                  <div class="well">
                 	<h4 class="left">GM <span class="gm"><?php print $team_details['0']['gm']; ?></span></h4>
                 	<h4 class="left">AGM <span class="agm"><?php print $team_details['0']['agm']; ?></span></h4>
                 	<h4 class="left">URL <span class="website"><a href="<?php print $team_details['0']['website']; ?>">team site</a></span></h4>
                 	<hr/>
                 	<h4 class="left">Record <span class="website">32-8</span></h4>
                  </div>
                 </div>
                 <div class="col-sm-4">
                  <h3 class="center">Recent Matches</h3>
                  <div class="well">
                 	<table class="table table-striped table-hover ">
					   <thead>
					    <tr>
					      <th></th>
					      <th>vs</th>
					      <th></th>
					    </tr>
					   </thead>
					   <tbody>			 
					    <tr>
					      <td class="win">W</td>
					      <td>compLexity</td>
					      <td>3/12 <a href="<?php echo $site_url; ?>/game/matches/id/<?php  ?>" class="btn btn-info btn-xs"><i class="fa fa-search"></i></a></td>
					    </tr>
					    <tr>
					      <td class="loss">L</td>
					      <td>Meeps</td>
					      <td>3/15 <a href="<?php echo $site_url; ?>/game/matches/id/<?php  ?>" class="btn btn-info btn-xs"><i class="fa fa-search"></i></a></td>
					    </tr>
					    <tr>
					      <td class="win">W</td>
					      <td>oBsolete</td>
					      <td>3/18 <a href="<?php echo $site_url; ?>/game/matches/id/<?php  ?>" class="btn btn-info btn-xs"><i class="fa fa-search"></i></a></td>
					    </tr>
					   </tbody>
					  </table>
                  </div>
                 </div>
                 <div class="col-sm-5">
                  <h3 class="center">Roster</h3>
	                 <table class="table table-striped table-hover ">
					   <thead>
					    <tr>
					      <th class="hidden-xs">#</th>
					      <th>Username</th>
					      <th></th>
					    </tr>
					   </thead>
					   <tbody>
	<?php $team_members = $ez->getTeamMembers($id); ?>
	<?php foreach($team_members as $member) { ?>				 
					    <tr>
					      <td class="hidden-xs"><?php print $member['id']; ?></td>
					      <td><?php print $member['username']; ?></td>
					      <td><a href="<?php echo $site_url; ?>/users/id/<?php echo $member['id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-search"></i> view</a></td>
					    </tr>
	<?php } ?>				    
					   </tbody>
					  </table>
					 </div>
                </div>
                <?php } else { ?>
                 <h3>Please select a news post to view</h3>
                <?php } ?>
              </div>

          </div>
        
	</div>


<?php include('footer.php'); ?>