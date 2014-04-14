<?php include('header.php'); ?>

	<div class="row">
		  
          <?php include('sidebar.php'); ?>
          <div class="col-lg-10">
              <div class="panel panel-primary">
               <?php 
               		if(isset($_GET['id'])) { 
               			$id = $_GET['id']; 
               			 $team_details = $ez->getTeam($id);
               			 $team_gm	   = $team_details['0']['gm'];
               			 $team_agm	   = $team_details['0']['agm'];
               			 $team_admin   = $team_details['0']['admin'];
               			 $team_website = $team_details['0']['website'];
               			 $team_members = $ez->getTeamMembers($id);
               	?>
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="bolder"><?php echo $team_details['0']['guild']; ?></span> - <span class="italic">Admin Panel</span></h3>
                </div>
                <div class="panel-body">
                <div class="row">
                 <?php if($team_admin == $_SESSION['ez_username']) { ?>
                 <div class="col-sm-5">
                  <h3 class="center">Management</h3>
                  <div class="well">
                 	<h4 class="left">GM</h4>
                 	 <form role="form" id="updateTeamSettings" name="updateTeamSettings">
                 	  <input type="hidden" name="team-id" id="team-id" value="<?php print $id; ?>" />
                 	  <select name="team-gm" id="team-gm" class="form-control select">
                 	    <option></option>
                 	   <?php foreach($team_members as $member) { ?>
                 	    <option <?php print ($member['username'] == $team_gm ? 'selected' : ''); ?> value="<?php print $member['username']; ?>"><?php print $member['username']; ?></option>
                 	   <?php } ?>
                 	  </select>
                 	<h4 class="left">AGM</h4>
                 	  <select name="team-agm" id="team-agm" class="form-control select">
                 	    <option></option>
                 	   <?php foreach($team_members as $member) { ?>
                 	    <option <?php print ($member['username'] == $team_agm ? 'selected' : ''); ?> value="<?php print $member['username']; ?>"><?php print $member['username']; ?></option>
                 	   <?php } ?>
                 	  </select>
                 	<h4 class="left">URL</h4>
                 	  <input type="text" class="form-control text" name="team-site" id="team-site" placeholder="www.site.com" value="<?php print $team_website; ?>" />
                 	<hr/>
                 	<h4 class="left">Site Admin</h4>
                 	  <select name="team-admin" id="team-admin" class="form-control select">
                 	    <option></option>
                 	   <?php foreach($team_members as $member) { ?>
                 	    <option <?php print ($member['username'] == $team_admin ? 'selected' : ''); ?> value="<?php print $member['username']; ?>"><?php print $member['username']; ?></option>
                 	   <?php } ?>
                 	  </select>
                 	<hr/>
                 	  <div class="form-group">
                 	   <button type="submit" class="btn btn-primary">Update Management</button>
                 	  </div>
                 	  <div class="success">
                 	  	<span class="success_text"></span>
                 	  </div>
                 	</form>
                  </div>
                 </div>
                 <div class="col-sm-7">
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
					
				<div class="row">
				 <div class="col-sm-5">
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
				<?php $matches = $ez->getTeamRecentMatches($id); ?>
				 <?php //foreach($matches as $match) { ?>
					    <tr>
					      <td class="win">W</td>
					      <td>compLexity</td>
					      <td>3/12 <a href="<?php echo $site_url; ?>/game/matches/id/<?php  ?>" class="btn btn-info btn-xs"><i class="fa fa-search"></i></a></td>
					    </tr>
				 <?php //} ?>
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
                 
                 <div class="col-sm-7">
                  <h3 class="center">Team Challenges</h3>
                  <div class="well">
                 	<table class="table table-striped table-hover ">
					   <thead>
					    <tr>
					      <th>Challenger</th>
					      <th>Challengee</th>
					      <th>Accepted</th>
					      <th>Date</th>
					      <th></th>
					    </tr>
					   </thead>
					   <tbody>		
			<?php $challenges = $ez->getTeamChallenges($id); ?>	 
			 <?php foreach($challenges as $challenge) { 
			 			$challenger_guild = $ez->getTeamName($challenge['challenger']);
			 			$challengee_guild = $ez->getTeamName($challenge['challengee']);
			 			 $match_status = $ez->getChallengeStatus($challenge['id']);
			 			  switch($match_status) {
			 			  	case '0':
			 			  		$match_status_text = 'Pending';
			 			  		break;
			 			  	case '1':
			 			  		$match_status_text = 'Accepted';
			 			  		break;
			 			  	case '2':
			 			  		$match_status_text = 'Rejected';
			 			  		break;
			 			  	default:
			 			  		$match_status_text = 'Pending';
			 			  		break;
			 			  }
			 ?>
					    <tr>
					      <td <?php echo ($id == $challenge['challenger'] ? 'class=win' : 'class=italic'); ?>><?php print $challenger_guild; ?></td>
					      <td <?php echo ($id == $challenge['challengee'] ? 'class=win' : 'class=italic'); ?>><?php print $challengee_guild ?></td>
					      <td <?php echo ($match_status == 1 ? 'class=yes' : 'class=no'); ?>><?php print $match_status_text; ?></td>
					      <td><?php print date('m/d/y', strtotime($challenge['created'])); ?></td>
					      <td><a class="btn btn-info btn-xs" href="<?php print $site_url; ?>/challenges/view/id/<?php print $challenge['id']; ?>"> <i class="fa fa-search"></i></a></td>
					    </tr>
			 <?php } ?>
					   </tbody>
					  </table>
                  </div>
                 </div>
				</div>
		<?php } else { //if not the team admin ?>
		 				<h3>You are not this teams admin</h3>
		<?php } ?>
                </div> <!-- end panel body -->
                <?php } else { ?>
                 <h3>No team was selected</h3>
                <?php } ?>
              </div>

          </div>
        
	</div>


<?php include('footer.php'); ?>