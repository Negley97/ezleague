<?php include('header.php'); ?>
	<div class="row">
<?php 
	 	if(!empty($_GET['id'])) { 
	 		 $cid = $_GET['id'];
	 		  //get the challenge details
	 		  $challenge = $ez->getChallenge($cid);
	 		   //challenger guild details
	 		    
	 		    $challenger_id 	  = $challenge['challenger_id'];
	 		    $challenger    	  = $challenge['challenger'];
	 		    $challenger_admin = $challenge['challenger_admin'];
	 		    
	 		   //challengee guild details
	 		    $challengee_id 	  = $challenge['challengee_id'];
	 		    $challengee 	  = $challenge['challengee'];
	 		    $challengee_admin = $challenge['challengee_admin'];
	 		    
	 		    //get the match date and time details
	 		    $match_date   = $challenge['match_date'];
	 		    $match_pod    = $challenge['match_pod'];
	 		    $match_hour	  = $challenge['match_hour'];
	 		    $match_min 	  = $challenge['match_min'];
	 		    $match_zone   = $challenge['match_zone'];
	 		    $match_log    = $challenge['match_log'];
	 		    
	 		    //get completed
	 		    $match_completed = $challenge['match_completed'];
	 		    
	 		    //get the challenge status of both guilds
	 		    $challenger_status = $challenge['challenger_accepted'];
	 		    $challengee_status = $challenge['challengee_accepted'];
	 		    
	 		     //check if both guilds have accepted the challenge
	 		     if($challenger_status == 1 && $challengee_status == 1) {
	 		     	$match_status = 1;
	 		     } elseif($challenger_status == 2 || $challengee_status == 2) {
	 		     	$match_status = 2;
	 		     } else {
	 		     	$match_status = 0;
	 		     }
	 		     
	 		     	//used below;
		 		    $opponent_status = '';
		 		    $opponent_status_text ='';
	 		   
	 		    
include('sidebar.php'); 

?>
          <div class="col-lg-10">
              <div class="panel panel-primary">
               <div class="panel-heading">
                  <h3 class="panel-title"><span class="bolder">View Challenge</span> 
                  	<span class="italic"><?php print $challenger . " vs " . $challengee; ?></span> 
                  	<?php 
                  		 if($match_status == 0) { 
                  		 	echo "<span class=\"text-warning bolder\">Unaccepted</span>";
                  		 } elseif($match_status == 1) {
                  		 	echo "<span class=\"text-success bolder\">Accepted</span>";
                  		 } else {
                  		 	echo "<span class=\"text-danger bolder\">Rejected</span>";
                  		 }
                  	?>	
                  </h3>
                </div>
               	 <div class="panel-body">
               	  <?php if(isset($_SESSION['ez_username']) && $challengee_admin == $_SESSION['ez_username'] || $challenger_admin == $_SESSION['ez_username']) { ?>
               	    <?php if($match_completed == 0) { ?>
               	   <div class="row">
               	    <div class="col-lg-3">
               	     <a href="<?php echo $site_url; ?>/challenges/view/team/<?php print $ez_guild_id; ?>" class="btn btn-primary btn-sm">Back to Challenges</a>
               	    </div>
               	   </div>
               	   <div class="row">
               	   	 <div class="success">
               	   	 	<span class="success_text"></span>
               	   	 </div>
               	   	<div class="col-lg-6">
               	   	  <div class="row">
	               	  	 <div class="form-group col-sm-12">
	               	  	  <h3>Match Status</h3>
	               	  	 </div>
               	  	  </div>
               	  	  <div class="row">
	               	  	 <div class="form-group col-sm-12">
	               	  	   <form role="form" name="match-status" id="match-status" method="POST">
	               	  	    <input type="hidden" name="match-id" id="match-id" value="<?php print $cid; ?>" />
	               	  	  <?php 
	               	  	  //check which guild the admin user is from to setup the match status button
		               	  	  $challenge_admin = '';
		               	  	  if($challengee_id == $ez_guild_id) { 
		               	  	  	$opponent_status = $challenger_status;
		               	  	  	 switch($opponent_status) {
		               	  	  	 	case '0':
		               	  	  	 		$opponent_status_text = 'Unaccepted';
		               	  	  	 		break;
		               	  	  	 	case '1':
		               	  	  	 		$opponent_status_text = 'Accepted';
		               	  	  	 		break;
		               	  	  	 	case '2':
		               	  	  	 		$opponent_status_text = 'Permanently Rejected';
		               	  	  	 		break;
		               	  	  	 	default:
		               	  	  	 		$opponent_status_text = 'Pending';
		               	  	  	 		break;
		               	  	  	 }
		               	  	  ?>
		               	  	  	<select name="match-status" id="match-status" class="form-control">
		               	  	  	 <option <?php print ($challengee_status == 0 ? 'selected' : ''); ?> value="0">Unaccepted</option>
		               	  	  	 <option <?php print ($challengee_status == 1 ? 'selected' : ''); ?> value="1">Accepted</option>
		               	  	  	 <option <?php print ($challengee_status == 2 ? 'selected' : ''); ?> value="2">Permanently Rejected</option>
		               	  	  	</select>
		               	  	  	<input type="hidden" name="match-team" id="match-team" value="challengee" />
		               	  	  	 Opponents Status: <?php print $opponent_status_text; ?>
		               	  <?php } else { 
		               	  
			               	  	$opponent_status = $challengee_status;
			               	  	switch($opponent_status) {
			               	  		case '0':
			               	  			$opponent_status_text = 'Unaccepted';
			               	  			break;
			               	  		case '1':
			               	  			$opponent_status_text = 'Accepted';
			               	  			break;
			               	  		case '2':
			               	  			$opponent_status_text = 'Permanently Rejected';
			               	  			break;
			               	  		default:
			               	  			$opponent_status_text = 'Pending';
			               	  			break;
			               	  	}	
		               	  ?>
		               	  	 	<select name="match-status" id="match-status" class="form-control">
		               	  	  	 <option <?php print ($challenger_status == 0 ? 'selected' : ''); ?> value="0">Unaccepted</option>
		               	  	  	 <option <?php print ($challenger_status == 1 ? 'selected' : ''); ?> value="1">Accept</option>
		               	  	  	 <option <?php print ($challenger_status == 2 ? 'selected' : ''); ?> value="2">Permanently Reject</option>
		               	  	  	</select>
		               	  	  	<input type="hidden" name="match-team" id="match-team" value="challenger" />
		               	  	  	Opponents Status: <?php print $opponent_status_text; ?>
		               	  <?php } ?>
		               	 </div>
		               
	               	  	 <div class="form-group col-sm-4">
		               	  	 <button type="submit" class="btn btn-warning">Update Status</button>
		               	   </form>
	               	  	 </div>
		              	</div>
	              	</div>
	                <div class="col-lg-6">
	                 <div class="row"> 	 
		               	 <div class="form-group col-sm-12">
	               	  	  <h3>Match Score</h3>
	               	  	 </div>
               	  	 </div>
               	  	 
		               	  <?php if($match_status == 1) { ?>
		             <div class="row">
		               	 <div class="form-group col-sm-12" id="add-match-score">
	               	  	   <form class="form-horizontal" role="form" name="match-score" id="match-score" method="POST">
	               	  	    <input type="hidden" name="match-id" id="match-id" value="<?php print $cid; ?>" />
	               	  	  		<div class="form-group">
	               	  	  			<label class="col-lg-4 control-label"><?php print $challenger; ?></label>
	               	  	  		   <div class="col-lg-4">
	               	  	  			 <input type="text" class="form-control col-sm-6" id="challenger-score" placeholder="Score" />
	               	  	  		   </div>
	               	  	  		</div>
	               	  	  		<div class="form-group">
	               	  	  			<label class="col-lg-4 control-label"><?php print $challengee; ?></label>
	               	  	  		   <div class="col-lg-4">
	               	  	  			 <input type="text" class="form-control col-sm-6" id="challengee-score" placeholder="Score" />
	               	  	  		   </div>
	               	  	  		</div>
	               	  	  	</div>
	               	  </div>
	               	  <div class="row" id="match-submit-score">
               	  	  		<div class="form-group col-sm-4">
	               	  	 		<button type="submit" class="btn btn-warning">Submit Score</button>
	               	  	 	</div>
	               	  	 	<div class="form-group col-sm-8">
	               	  	 		This will mark the match as <em>completed</em>. All match scores are reviewable by <em>admins</em> if a dispute is filed.
	               	  	 	</div>
		              </div>
	               	  	   </form>
	               	  	  <?php } else { ?>
	               	  	  	Both Teams must Accept the challenge before a score can be posted.
	               	  	  <?php } ?>
		            </div>

				   </div>
				   
               	   <form role="form" name="match-settings" id="match-settings" method="POST">
               	    <input type="hidden" name="match-id" id="match-id" value="<?php print $cid; ?>" />
               	  	<div class="row">
               	  	 <div class="form-group col-sm-4">
               	  	  <h3>Match Date & Time</h3>
               	  	 </div>
               	  	</div>
               	  	<div class="row">
	               	   <div class="form-group col-sm-2">
	               	    <label>Date</label>
	               	  	 <input type="text" id="match-date" class="form-control" value="<?php print $match_date; ?>" />
	               	  	  <?php print $match_date; ?>
	               	  	</div>
	               	   <div class="form-group col-sm-2">
	               	    <label>Hour</label>
	               	  	 <select name="match-hour" id="match-hour" class="form-control">
	               	  	  <option></option>
	               	  	   <?php for ($i = 1; $i <= 12; $i++) { ?>
	               	  	    <option <?php echo ($i == $match_hour ? 'selected' : ''); ?> value="<?php print $i; ?>"><?php print $i; ?></option>
	               	  	   <?php } ?>
	               	  	 </select>
	               	   </div>
	               	   <div class="form-group col-sm-2">
	               	    <label>Minute</label>
	               	  	 <select name="match-min" id="match-min" class="form-control">
	               	  	  <option></option>
	               	  	   <?php for ($i = 0; $i <= 59; $i++) { ?>
	               	  	    <option <?php echo ($i == $match_min ? 'selected' : ''); ?> value="<?php print $i; ?>"><?php print $i; ?></option>
	               	  	   <?php } ?>
	               	  	 </select>
	               	   </div>
	               	   <div class="form-group col-sm-2">
	               	    <label>AM/PM</label>
	               	  	 <select name="match-pod" id="match-pod" class="form-control">
	               	  	  <option <?php echo ($match_pod == 'AM' ? 'selected' : ''); ?> value="AM">AM</option>
	               	  	  <option <?php echo ($match_pod == 'PM' ? 'selected' : ''); ?> value="PM">PM</option>
	               	  	 </select>
	               	   </div>
	               	   <div class="form-group col-sm-2">
	               	    <label>Time Zone</label>
	               	  	 <select name="match-zone" id="match-zone" class="form-control">
	               	  	  <option></option>
	               	  	  <option <?php print ($match_zone == 'EST' ? 'selected' : ''); ?> value="EST">EST</option>
	               	  	  <option <?php print ($match_zone == 'CST' ? 'selected' : ''); ?> value="CST">CST</option>
	               	  	  <option <?php print ($match_zone == 'MST' ? 'selected' : ''); ?> value="MST">MST</option>
	               	  	 </select>
	               	   </div>
	               	  </div>
	               	  <div class="row">
	               	   <div class="form-group col-sm-2">
	               	  	 <button type="submit" class="btn btn-primary">Submit Match Date & Time</button>
	               	   </div>
	               	  </div>
	               	  </form>
	               	 
               	  	<div class="row">
               	  	 <div class="form-group col-sm-6">
               	  	  <h3>Add Response</h3>
               	  	   <form role="form" name="match-log" id="match-log" method="POST">
               	  	    <input type="hidden" name="match-id" id="match-id" value="<?php print $cid; ?>" />
               	  	    <textarea class="form-control" name="match-body" id="match-body"></textarea>
	               	  	 <hr/>
	               	  	 <button type="submit" class="btn btn-info">Add Response</button>
					   </form>
               	  	 </div>
               	  	 <div class="form-group col-sm-6">
               	  	 <h3>Current Log</h3>
               	  	 <?php print str_replace('\\', '', $match_log); ?>
               	  	 </div>
               	  	</div>
               	   <?php } else {  //end if match is completed 
		            		$score = $ez->getChallengeScore($cid);   	  
		           ?>
               	   <div class="row">
               	    <div class="col-lg-3">
               	      <h3>Match Status</h3>
               	       <h4 class="text-success bolder">Completed</h4>
               	       <?php $has_dispute = $ez->checkForUserDispute($cid, $ez_username); ?>
               	       <button <?php print ($has_dispute == false ? '' : 'disabled'); ?> type="button" class="btn btn-danger btn-sm" data-target="#disputeModal" data-toggle="modal">File Dispute</button>
               	    </div>
               	    <div class="col-lg-3">
               	      <h3>Match Score</h3>
               	       <h4>Challenger <span class="text-primary"><?php print $score['challenger_score']; ?></span></h4>
               	       <h4>Challengee <span class="text-info"><?php print $score['challengee_score']; ?></span></h4>
               	    </div>
               	   </div>
               	   <hr/>
               	   <div class="row">
               	    <div class="col-lg-3">
               	     <a href="<?php echo $site_url; ?>/challenges/view/team/<?php print $ez_guild_id; ?>" class="btn btn-primary btn-sm">Back to Challenges</a>
               	    </div>
               	   </div>
               	   <?php } //end match completed ?>
               	   
               	  <?php } else { //end if user is not a guild member and admin 
		           		print $challengee_admin . " - " . $challenger_admin; ?>
               	   <h3>You are not authorized to view this page</h3>
               	  <?php } ?>
				 </div>
              </div>
          </div>
      <?php } else { ?>
       <h3>No challenge was selected</h3>
      <?php } ?> 
	</div>

<div id="disputeModal" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        <h4 class="modal-title">File a Dispute: Challenge #<?php print $cid; ?></h4>
      </div>
      <div class="modal-body">
       <div class="row">
        <div class="col-lg-10">
         <p>Please describe why you are filing a dispute for this challenge</p>
          <form role="form" name="ezLeagueDispute" id="ezLeagueDispute" method="POST">
           <input type="hidden" name="challenge-id" id="challenge-id" value="<?php print $cid; ?>" />
           <input type="hidden" name="challenge-filer" id="dispute-filer" value="<?php print $ez_username; ?>" />
            <div class="form-group">
              <h5>Description</h5>
              <textarea class="form-control textarea" id="dispute-description" name="dispute-description"></textarea>
            </div>
            <div class="form-group">
              <h5>Submitted By</h5>
              <input class="form-control text placeholder" value="<?php print $ez_username; ?>" type="text" disabled>
            </div>
            <div class="form-group">
              <div class="success">
          	   <span class="success_text"></span>
         	  </div>
         	</div>
         </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">File Dispute</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div> 
     </form>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>