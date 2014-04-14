<?php include('header.php'); ?>

<?php include('sidebar.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Disputes</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-file-o"></i> Viewing Match Dispute
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                         <?php if(isset($_GET['id'])) { 
                         		$challenge_id = $_GET['id'];
                         		 $match = $ez->getMatch($challenge_id);
                         		 $dispute = $ez->getDispute($challenge_id);
                         ?>
                         	<strong>Dispute Filed By</strong> <?php print $dispute['0']['filed_by']; ?><br/>
                         	<strong>Match Date</strong> <?php print date('F d, Y', strtotime($match['match_date'])); ?>
                              <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
									      <th>Matchup</th>
									      <th>Dispute</th>
									      <th></th>
									    </tr>
                                    </thead>
                                    <tbody>
									 		<tr>
									 		  <td><a class="text-primary" href="teams_view.php?id=<?php print $match['challenger_id']; ?>"><?php print $match['challenger'] . "</a> vs <a class=\"text-info\" href=\"teams_view.php?id=$match[challengee_id]\">" . $match['challengee']; ?></a>
									 		  </td>
									 		  <td>
									 		  	<?php print $dispute['0']['description']; ?>
									 		  </td>
									 		  <td>
									 		  	<a href="matches_edit.php?id=<?php print $match['cid']; ?>" class="btn btn-info btn-xs">Edit Match</a>
									 		  	<?php if($dispute['0']['status'] == 1) { ?>
									 		  		<button onclick="updateDispute('<?php print $dispute['0']['id']; ?>', '0');" class="btn btn-warning btn-xs">Open Dispute</button>
									 		  	<?php } else { ?>
									 		  		<button onclick="updateDispute('<?php print $dispute['0']['id']; ?>', '1');" class="btn btn-warning btn-xs">Close Dispute</button>
									 		  	<?php } ?>
									 		  </td>
									 		</tr>
                                    </tbody>
                                 </table>
                                    <!-- /.table-responsive -->
                                </div>
                                <div class="success">
                                 <span class="success_text"></span>
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                          <?php } else { ?>
                       		Select the Match below to view the dispute details
                       		   <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Challenge ID</th>
                                            <th>Filed By</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                        <?php $disputes = $ez->getDisputes(); ?>
                                    <tbody>
                          <?php foreach($disputes as $dispute) { ?>
                                        <tr class="<?php print ($dispute['status'] == 0 ? 'dispute_open' : 'dispute_closed'); ?>">
                                            <td>No. <?php echo $dispute['challenge_id']; ?></td>
                                            <td><?php echo $dispute['filed_by']; ?></td>
                                            <td><?php echo ($dispute['status'] == 0 ? '<span class=\'text-success\'>Open</span>' : '<span class=\'text-danger\'>Closed</span>'); ?></td>
                                            <td><?php echo date('F d, Y', strtotime($dispute['created'])); ?></td>
                                            <td>
                                            	<a href="matches_disputes.php?id=<?php print $dispute['challenge_id']; ?>" class="btn btn-primary btn-xs">View Dispute</a>
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
