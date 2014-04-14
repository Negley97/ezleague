<?php 
 //run a check on the users guild every page load incase: created a team, left their team, were kicked, etc...
	$user_guild = $ez->getUserGuildId($ez_username); 
 	 $ez_guild = $ez->getUserGuild($user_guild);
 	 $ez_guild_id = $ez_guild['0']['id']; 
 	 $ez_guild_name = $ez_guild['0']['guild'];
?>		  
		  <div class="col-lg-2">
              <div class="panel panel-default">
                <div class="panel-heading">My Teams</div>
                <div class="panel-body">
                 <?php if(isset($_SESSION['ez_username']) && $ez_guild_name == '') { ?>
                  <a href="<?php print $site_url; ?>/create/team" class="btn btn-info btn-xs">Create Team</a>
                 <?php } elseif(!empty($ez_guild_name)) { ?>
                    <div class="btn-group">
					  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><?php print $ez_guild['0']['guild']; ?> <span class="caret"></span></button>
					  <ul class="dropdown-menu">
					    <li><a href="<?php print $site_url; ?>/game/<?php print $ez_guild['0']['game']; ?>/teams/id/<?php print $ez_guild['0']['id']; ?>"><i class="fa fa-users"></i> View Team</a></li>
					    <?php 
			                 $team_admin = $ez->getTeamAdmin($ez_guild_id);
				                 if($team_admin == $_SESSION['ez_username']) { ?>
				                    <li class="divider"></li>
				                 	<li><a href="<?php print $site_url; ?>/team-admin/<?php print $ez_guild['0']['id']; ?>"><i class="fa fa-cog"></i> Guild Settings</a></li>
				         <?php   }  ?>
				        <li class="divider"></li>
					    <li><a href="<?php print $site_url; ?>/challenges/view/team/<?php print $ez_guild_id; ?>"><i class="fa fa-sitemap"></i> Challenges <span class="badge"><?php print $ez->getTeamPendingChallenges($ez_guild_id); ?> Pending</span></a></li>
					  </ul>
					</div>
					
					<?php } else { ?>
                 	<a href="#" data-target="#registerModal" data-toggle="modal">Register</a> or <a href="#" data-target="#loginModal" data-toggle="modal">Login</a>
                 <?php } ?>
                </div>
              </div>
          </div>