<?php session_start();
    include('lib/db.class.php');
	include('lib/ezleague.class.php');
    
    $ez = new ezLeague();
    
     if(!isset($_SESSION['ez_admin'])) {
     	header("Location: login.php");
     } else {
     	$username = $_SESSION['ez_admin'];
     }
     
//get an individual user
if(isset($_POST['id'])) {
	$user_id = $_POST['id'];
	 $user = $ez->getUser($user_id);
?>

<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">Viewing User Profile</h4>
		</div>
		<div class="modal-body">
		 <div class="row">
		  <div class="col-lg-8">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title text-info">Profile <em>Details</em></h3>
              </div>
              <div style="height: auto;" id="collapseOne" class="panel-collapse">
                <div class="panel-body">
					<strong>Username</strong> <?php print $user['username']; ?><br/>
					<strong>E-Mail</strong> <?php print $user['email']; ?><br/>
					<strong>Registered</strong> <?php print date('F d, Y h:ia', strtotime($user['created'])); ?>
					<hr/>
					<strong>Guild</strong> 
					  <?php if($user['guild_id'] != '') { ?>
						<a href="teams_view.php?id=<?php print $user['guild_id']; ?>"><?php print $user['guild_name']; ?></a>
					  <?php } else { ?>
					    <?php print $user['guild_name']; ?> 
					  <?php } ?>	
						<br/>
					<?php if(isset($user['guild_admin'])) { ?>
					 <strong>Guild Admin</strong> <?php print ($user['guild_admin'] == $user['username'] ? 'Yes' : 'No'); ?>
					 	<br/>
					<?php } ?>
					<hr/>
					<strong>Role</strong> <?php print $user['role']; ?>
					<div class="success">
					  <span class="success_text"></span>
					 </div>
                </div>
              </div>
            </div>
           </div>
           
           <div class="col-lg-4"> 
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title text-info">Account <em>Actions</em></h3>
              </div>
              <div style="height: auto;" id="collapseOne" class="panel-collapse">
                <div class="panel-body">
              <?php if($user['username'] != 'admin') { ?>
                  <?php if($user['role'] == 'admin') { ?>
					<button type="button" onclick="toggleRoleUser('<?php print $user['id']; ?>', 'user')" class="btn btn-default btn-block">Demote to User</button>
				  <?php } else { ?>
					<button type="button" onclick="toggleRoleUser('<?php print $user['id']; ?>', 'admin')" class="btn btn-primary btn-block">Promote to Admin</button>
				  <?php } ?>
				  
                  <?php if($user['status'] == 0) { ?>
					<button type="button" onclick="toggleSuspendUser('<?php print $user['id']; ?>', '1')" class="btn btn-warning btn-block">Suspend Account</button>
				  <?php } else { ?>
					<button type="button" onclick="toggleSuspendUser('<?php print $user['id']; ?>', '0')" class="btn btn-success btn-block">Reactivate Account</button>
				  <?php } ?>
				 	<hr/>
					<button type="button" onclick="deleteAccount('<?php print $user['id']; ?>')" class="btn btn-danger btn-block">Delete Account</button>
                <small class="text-danger bolder center">Deletion is permanent</small>
              <?php } else { ?>
              	<strong>Account Protected</strong>
              <?php } ?>
                </div>
              </div>
            </div>
           </div>
          </div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
	<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->

<?php } ?>