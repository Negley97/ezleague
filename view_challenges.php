<?php include('header.php'); ?>
	<div class="row">
<?php 
	 	if(!empty($_GET['team'])) { 
	 		 $id = $_GET['team'];
	 		  $team_details = $ez->getTeam($id);
	 		   $team_name = $team_details['0']['guild'];
	 		   
	 		    
include('sidebar.php'); 

?>
          <div class="col-lg-10">
              <div class="panel panel-primary">
               <div class="panel-heading">
                  <h3 class="panel-title"><span class="bolder">View Team Challenges</span> 
                  	<span class="italic"><?php print $team_name; ?></span> 
                  </h3>
                </div>
               	 <div class="panel-body">
               	  <?php if(isset($_SESSION['ez_username']) && $ez_guild_id == $id) { ?>
               	   <div class="well">
                 	<table class="table table-striped table-hover ">
					   <thead>
					    <tr>
					      <th>Matchup</th>
					      <th>Status</th>
					      <th class="hidden-xs hidden-sm">Challenged</th>
					      <th></th>
					    </tr>
					   </thead>
					   <tbody>		
			<?php $challenges = $ez->getTeamChallenges($id); ?>	 
			 <?php foreach($challenges as $challenge) { 
			 			$challenger_guild = $challenge['g_challenger'];
			 			$challengee_guild = $challenge['g_challengee'];
			 			$completed		  = $challenge['completed'];
			 			 if($completed == 0) { 
				 			 $match_status = $ez->getChallengeStatus($challenge['id']);
				 			  switch($match_status) {
				 			  	case '0':
				 			  		$match_status_text = 'Pending';
				 			  		$match_class = 'text-warning italic';
				 			  		break;
				 			  	case '1':
				 			  		$match_status_text = 'Accepted';
				 			  		$match_class = 'text-success bolder';
				 			  		break;
				 			  	case '2':
				 			  		$match_status_text = 'Rejected';
				 			  		$match_class = 'text-danger bolder';
				 			  		break;
				 			  	default:
				 			  		$match_status_text = 'Pending';
				 			  		$match_class = 'text-warning italic';
				 			  		break;
				 			  }
			 			 } else {
			 			 	$match_status_text = 'Completed';
			 			 	$match_class = 'text-primary bolder';
			 			 }
			 ?>
					    <tr>
					      <td><span <?php print ($ez_guild_id == $challenge['challenger'] ? 'class=win' : 'class=italic'); ?>>
					      		<?php print $challenger_guild; ?></span>
					      		 vs 
					      	  <span <?php echo ($ez_guild_id == $challenge['challengee'] ? 'class=win' : 'class=italic'); ?>>
					      	  	<?php print $challengee_guild; ?></span>
					      </td>
					      <td class="<?php print $match_class; ?>"><?php print $match_status_text; ?></td>
					      <td class="hidden-xs hidden-sm"><?php print date('m/d/y', strtotime($challenge['created'])); ?> </td>
					      <td>
					      	  <a class="btn btn-info btn-xs" onclick="getChallenge('<?php print $challenge['id']; ?>')" data-toggle="modal" data-target="#viewChallengeModal"> <i class="fa fa-search"></i></a>
					      	<?php if($id == $ez_guild_id && isset($_SESSION['ez_guild_admin'])) { ?>  
					      	  <a class="btn btn-primary btn-xs" href="<?php print $site_url; ?>/challenges/view/id/<?php print $challenge['id']; ?>"> <i class="fa fa-settings"></i>admin</a>
					     	<?php } ?>
					      </td>
					    </tr>
			 <?php } ?>
					   </tbody>
					  </table>
                    </div>
                    <div id="viewChallengeModal" class="modal">
  						
  					</div>
               	  <?php } else { ?>
               	   <h3>You are not authorized to view this page</h3>
               	  <?php } ?>
				 </div>
              </div>
          </div>
      <?php } else { ?>
       <h3>No challenge was selected</h3>
      <?php } ?> 
	</div>

<?php include('footer.php'); ?>