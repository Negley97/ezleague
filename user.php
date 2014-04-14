<?php include('header.php'); ?>

	<div class="row">
		  
          <?php include('sidebar.php'); ?>
          <div class="col-lg-10">
              <div class="panel panel-primary">
               <?php 
               		if(isset($_GET['id'])) { 
               			$id = $_GET['id']; 
               			 $user_details = $ez->getUser($id);
               			 $user_guild   = $ez->getUserGuild($user_details['0']['guild']);
               	?>
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="bolder">Viewing User</span> - <span class="italic"><?php echo $user_details['0']['username']; ?></span></h3>
                </div>
                <div class="panel-body">
                 	<h4 class="left">USER <span class="gm"><?php print $user_details['0']['username']; ?></span></h4>
                 	<h4 class="left">GUILD <span class="agm"><a href="<?php print $site_url; ?>/game/<?php print $user_guild['0']['game']; ?>/teams/id/<?php print $user_guild['0']['id']; ?>"><?php print $user_guild['0']['guild']; ?></a></span></h4>
                 	<h4 class="left">MAIL <span class="website"><a href="mailto:<?php print $user_details['0']['email']; ?>"><?php print $user_details['0']['email']; ?></a></span></h4>
                </div>
                <?php } else { ?>
                 <h3>Please select a news post to view</h3>
                <?php } ?>
              </div>

          </div>
        
	</div>


<?php include('footer.php'); ?>