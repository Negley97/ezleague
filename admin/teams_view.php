<?php include('header.php'); ?>

<?php include('sidebar.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Teams</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-file-o"></i> Viewing Team
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                         <?php if(isset($_GET['id'])) { 
                         		$team_id = $_GET['id'];
                         		 $team = $ez->getTeam($team_id);
                         ?>
                         	<div class="col-lg-4">
                         	   <div class="panel panel-default">
                         	    <div class="panel-heading">
		                            <i class="fa fa-file-o"></i> Admins
		                        </div>
								<div class="panel-body">
				                 	<strong>GM</strong> <span class="gm"><?php print $team['gm']; ?></span><br/>
				                 	<strong>AGM</strong> <span class="agm"><?php print $team['agm']; ?></span><br/>
				                 	<strong>URL</strong> <span class="website"><a href="<?php print $team['website']; ?>">team site</a></span>
				                 	<hr/>
				                 	<strong>Record</strong> <span class="website">32-8</span>
				                </div>
				               </div>
				            </div>
				            
				            <div class="col-lg-4">
                         	   <div class="panel panel-default">
                         	    <div class="panel-heading">
		                            <i class="fa fa-file-o"></i> Matches
		                        </div>
								<div class="panel-body">
				                 	<strong>GM</strong> <span class="gm"><?php print $team['gm']; ?></span><br/>
				                 	<strong>AGM</strong> <span class="agm"><?php print $team['agm']; ?></span><br/>
				                 	<strong>URL</strong> <span class="website"><a href="<?php print $team['website']; ?>">team site</a></span>
				                 	<hr/>
				                 	<strong>Record</strong> <span class="website">32-8</span>
				                </div>
				               </div>
				            </div>
				            
				            <div class="col-lg-4">
                         	   <div class="panel panel-default">
                         	    <div class="panel-heading">
		                            <i class="fa fa-file-o"></i> Roster
		                        </div>
								<div class="panel-body">
								 <?php $members = $ez->getTeamRoster($team_id); ?>
				                 	<div class="table-responsive">
	                                   <table class="table table-hover">
	                                    <thead>
	                                        <tr>
										      <th>User</th>
										      <th></th>
										    </tr>
	                                    </thead>
	                                    <tbody>
	                                     <?php foreach($members as $member) { ?>
	                                     	<tr>
	                                     	 <td><?php print $member['username']; ?></td>
	                                     	 <td><a href="user_all.php?id=<?php print $member['id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-search"></i> View User</a></td>
	                                     	</tr>
	                                     <?php } ?>
	                                    </tbody>
	                                   </table>
	                                 </div>
				                </div>
				               </div>
				            </div>
                        </div>
                                <div class="success">
                                 <span class="success_text"></span>
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                          <?php } else { ?>
                       		Select the Team below to view their details
                       		   <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Team</th>
                                            <th>Game</th>
                                            <th>Website</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                        <?php $teams = $ez->getTeams(); ?>
                                    <tbody>
                          <?php foreach($teams as $team) { ?>
                                        <tr>
                                            <td><?php print $team['guild']; ?> (<?php print $team['abbreviation']; ?>)</td>
                                            <td><?php print $team['game'] ?></td>
                                            <td><a class="btn btn-success btn-xs" href="<?php print $team['website']; ?>">View Site</a></td>
                                            <td>
                                            	<a href="teams_view.php?id=<?php print $team['id']; ?>" class="btn btn-primary btn-xs">View Team</a>
							            	</td>
                                        </tr>
                           <?php } ?>
                                    </tbody>
                                 </table>
                          <?php } ?>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                </div>
                <!-- /.col-lg-8 -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="<?php print $site_url; ?>/ezleague/admin/css/redmond/jquery-ui-1.10.4.custom.min.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>
    <script src="js/ezleague.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="js/demo/dashboard-demo.js"></script>

</body>

</html>
