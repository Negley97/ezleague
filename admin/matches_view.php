<?php include('header.php'); ?>

<?php include('sidebar.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View All Matches</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-file-o"></i> Viewing Matches
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                         <?php if(isset($_GET['id'])) { 
                         		$league_id = $_GET['id'];
                         		 $matches = $ez->getMatches($league_id);
                         		 $disputes = $ez->getLeagueDisputes($league_id);
                         ?>
                         	<h3><?php print $ez->getLeagueName($league_id); ?> Matches</h3>
                              <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
									      <th>Matchup</th>
									      <th>Dispute</th>
									      <th>Score</th>
									      <th>Match Date</th>
									      <th></th>
									    </tr>
                                    </thead>
                                    <tbody>
                         				<?php foreach($matches as $match) { 
                         						$is_dispute = $ez->multidimensional_search($disputes, array('challenge_id'=>$match['id'], 'status'=>0)); //return 1 if true
                         				?>
									 		<tr <?php print ($is_dispute == 1 ? 'class=danger' : ''); ?>>
									 		  <td><a class="text-primary" href="teams_view.php?id=<?php print $match['challenger']; ?>"><?php print $match['g_challenger'] . "</a> vs <a class=\"text-info\" href=\"teams_view.php?id=$match[challengee]\">" . $match['g_challengee']; ?></a>
									 		  </td>
									 		  <td>
									 		  	<?php print ($is_dispute == 1 ? '<a href=\'dispute_view.php?id=' . $match['id'] . '\'>View</a>'  : ''); ?>
									 		  </td>
									 		  <td>
									 		  	<?php if($match['challenger_score'] == 0 && $match['challengee_score'] == 0) { ?>
									 		  		<?php print "<em>Not Submitted</em>"; ?>
									 		  	<?php } else { ?>  
									 		  	  <?php print $match['challenger_score']; ?>
									 		  	  &#8211;
									 		  	  <?php print $match['challengee_score']; ?>
									 		  	<?php } ?>
									 		  </td>
									 		  <td><?php 
									 		  		  if($match['match_date'] != '') { 
									 		  			print date('F d, Y', strtotime($match['match_date']));
									 		  		  } else {
									 		  		  	print "<em>Not Set</em>";
									 		  		  } 
									 		  	  ?>
									 		  </td>
									 		  <td>
									 		  	<a href="matches_edit.php?id=<?php print $match['id']; ?>" class="btn btn-info btn-xs">Edit Match</a>
									 		  </td>
									 		</tr>
									 	<?php } ?>
                                    </tbody>
                                 </table>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                          <?php } else { ?>
                       		Select the League below to view their matches.
                       		   <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>League</th>
                                            <th>Game</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                        <?php $leagues = $ez->getLeaguesAll(); ?>
                                    <tbody>
                          <?php foreach($leagues as $league) { ?>
                                        <tr>
                                            <td><?php echo $league['league']; ?></td>
                                            <td><?php echo $league['game']; ?></td>
                                            <td>
                                            	<a href="matches_view.php?id=<?php print $league['id']; ?>" class="btn btn-primary btn-xs">View Matches</a>
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
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="js/demo/dashboard-demo.js"></script>

</body>

</html>
