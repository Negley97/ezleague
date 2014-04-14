<?php include('header.php'); ?>

<?php include('sidebar.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View All Leagues</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-sitemap"></i> Current Leagues
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        	<div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>League</th>
                                            <th>Game</th>
                                            <th>Total Teams</th>
                                            <th>Max Teams</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                        <?php $leagues = $ez->getLeaguesAll(); ?>
                                    <tbody>
                          <?php foreach($leagues as $league) { ?>
                                        <tr>
                                            <td><?php echo $league['league']; ?></td>
                                            <td><?php echo $league['game']; ?></td>
                                            <td></td>
                                            <td><?php echo $league['teams']; ?></td>
                                            <td>
                                            	<a href="leagues_rules.php?id=<?php print $league['id']; ?>" class="btn btn-primary btn-xs">Rules</a>
							            		<button type="button" onclick="deleteLeague('<?php echo $league['id']; ?>')" class="btn btn-danger btn-xs">Delete</button>
							            	</td>
                                        </tr>
                           <?php } ?>
                                    </tbody>
                                 </table>
                                    <!-- /.table-hover -->
                             </div>
                              <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                        <!-- /.panel -->
                </div>
                 	<!-- /.col-lg-8 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <div id="viewRulesModal" class="modal"></div>
    
    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>
    <script src="js/ezleague.js"></script>
    <script src="js/ckeditor/ckeditor.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="js/demo/dashboard-demo.js"></script>

</body>

</html>
