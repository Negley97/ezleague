<?php include('header.php'); ?>

<?php include('sidebar.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Game Settings</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-file-o"></i> Add Additional Games
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                 <form method="POST" id="addSettingsGame" name="addSettingsGame">
                                  <input type="hidden" name="form" value="addSettingsGame" />
                                	<div class="form-group">
									    <label>Game</label>
									    <input class="form-control" id="game" name="game" placeholder="Game Name" />
									</div>
									<div class="form-group">
										<button class="btn btn-success" type="submit">Add Game</button>
									</div>
									<div class="success">
				                      <span class="success_text"></span>
				                    </div>
								  </form>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                	<div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-sitemap"></i> Current Games
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        	<div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Game</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                        <?php $games = $ez->getSettingsGames(); ?>
                                    <tbody>
                          <?php foreach($games as $game) { ?>
                                        <tr>
                                            <td><?php echo $game['game']; ?></td>
                                            <td>
							            		<button type="button" onclick="deleteGame('<?php echo $game['id']; ?>')" class="btn btn-danger btn-xs">Delete</button>
							            	</td>
                                        </tr>
                           <?php } ?>
                                    </tbody>
                                 </table>
                                    <!-- /.table-responsive -->
                                </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                 </div>
                    <!-- /.panel .chat-panel -->
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
    
    <script src="js/ezleague.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="js/demo/dashboard-demo.js"></script>

</body>

</html>
