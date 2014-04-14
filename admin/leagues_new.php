<?php include('header.php'); ?>

<?php include('sidebar.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add League</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-file-o"></i> Create New League
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                 <form method="POST" id="addNewLeague" name="addNewLeague">
                                  <input type="hidden" name="form" value="addNewleague" />
                                	<div class="form-group">
									    <label>League</label>
									    <input class="form-control" id="league" name="league" placeholder="League Name" />
									</div>
									<div class="form-group">
										<label>Max Teams</label>
										<select class="form-control" name="maxTeams" id="maxTeams">
										 <?php for($i=2; $i <= 34; $i = $i + 2) { ?>
										 	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										 <?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Start Date</label>
										<input type="text" class="form-control text" id="league-start-date" />
									</div>
									<div class="form-group">
										<label>End Date</label>
										<input type="text" class="form-control text" id="league-end-date" />
									</div>
									<div class="form-group">
										<label>Total Games</label>
										<select name="total-games" id="total-games" class="form-control select">
											<option value="0">0 (Unlimited)</option>
										 <?php for ($i = 2; $i <= 20; $i = $i + 2) { ?>
											<option value="<?php print $i; ?>"><?php print $i; ?></option>
										 <?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Game</label>
										<select class="form-control" name="game" id="game">
											<option></option>
										 <?php $games = $ez->getSettingsGames(); ?>
										  <?php foreach($games as $game) { ?> 
										  	<option value="<?php echo $game['game']; ?>"><?php echo $game['game']; ?></option>
										  <?php } ?>
										</select>
									</div>
									<div class="form-group">
										<button class="btn btn-success" type="submit">Create League</button>
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
                <div class="col-lg-8">
                	<div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-sitemap"></i> Current Leagues
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        	<div class="table-responsive">
                                <table class="table table-hover current_leagues">
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
							            		<button type="button" onclick="deleteLeague('<?php echo $league['id']; ?>')" class="btn btn-danger btn-xs">Delete</button>
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
     <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
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
