<?php session_start();
include('lib/db.class.php');
include('lib/ezleague.class.php');

$ez = new ezLeaguePub();
	if(isset($_POST['id'])) {
		$id = $_POST['id'];
			$challenge = $ez->getChallenge($id);
?>
	   <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
	        <h4 class="modal-title">Viewing Challenge #<?php print $id; ?></h4>
	      </div>
	      <div class="modal-body">
	        <div class="row">
	         <div class="col-lg-12">
	       		<div id="challengeResponse">
	       		  <div class="col-lg-6">
	       			<h3>Challenge Status</h3>
	       			 <?php print $challenge['match_status']; ?>
	       			<h3>Challenge Matchup</h3>
	       			 <span class="text-primary bolder"><?php print $challenge['challenger'] . "</span> <em>vs</em> <span class=\"text-info bolder\">" . $challenge['challengee']; ?></span>
	       		
	       			<h3>Challenge Made</h3>
	       			 <?php print $challenge['match_created']; ?>
	       		  </div>
	       		  <div class="col-lg-6">
	       		  	<h3>Challenge Match Date</h3>
	       			 <?php print $challenge['match_date']; ?>
	       			<h3>Challenge Match Time</h3>
	       			 <?php print $challenge['match_time']; ?>
	       		  </div>
	       		 </div>
	         </div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	   </div>


<?php
	}
?>