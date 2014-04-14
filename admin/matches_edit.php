<?php include('header.php'); ?>

<?php include('sidebar.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Match Details</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <?php 
            if(isset($_GET['id'])) {
            	$match_id = $_GET['id'];
            ?>
                <div class="col-lg-7">
                  <div class="success">
                   <span class="success_text"></span>
                  </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-file-o"></i> Match Details
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                         <?php $match = $ez->getMatch($match_id); ?>
                         <form class="form-horizontal" id="editMatchDetails" name="editMatchDetails" method="POST">
                          <input type="hidden" name="matchId" id="matchId" value="<?php print $match['cid']; ?>" />
                         <div class="row">
                          <div class="col-lg-12">
	                          <div class="form-group">
	                           <label class="col-lg-2 control-label">League</label>
	                         	<div class="col-lg-4">
	                         	 <input type="text" class="form-control" value="<?php print $ez->getLeagueName($match['league_id']); ?>" disabled />
	                         	</div>
	                          </div>
	                          <div class="form-group">
	                           <label class="col-lg-2 control-label">Challenge ID</label>
	                         	<div class="col-lg-2">
	                         	 <input type="text" class="form-control" value="<?php print $match['cid']; ?>" disabled />
	                         	</div>
	                          </div>
	                          <div class="form-group">
	                           <label class="col-lg-2 control-label">Status</label>
	                         	<div class="col-lg-4">
	                         	 <input type="text" class="form-control" value="<?php print ($match['completed'] == 0 ? 'Not Completed' : 'Completed'); ?>" disabled />
	                         	</div>
	                          </div>
	                          <div class="form-group">
	                           <label class="col-lg-2 control-label">Created</label>
	                         	<div class="col-lg-5">
	                         	 <input type="text" class="form-control" value="<?php print date('F d, Y h:ia', strtotime($match['created'])); ?>" disabled />
	                         	</div>
	                          </div>
	                          <hr/> 
	                        </div>
	                      </div>
	                       <div class="row"> 
                            <div class="col-lg-6">
	                          <div class="form-group">
	                           <label class="col-lg-4 control-label">Challenger</label>
	                         	<div class="col-lg-8">
	                         	 <input type="text" class="form-control" value="<?php print $match['challenger']; ?>" disabled />
	                         	</div>
	                          </div>
	                          <div class="form-group">
	                           <label class="col-lg-4 control-label">Score</label>
	                         	<div class="col-lg-4">
	                         	 <input type="text" class="form-control" id="challengerScore" value="<?php print $match['challenger_score']; ?>" />
	                         	</div>
	                          </div>
	                          <div class="form-group">
	                           <label class="col-lg-4 control-label">Status</label>
	                         	<div class="col-lg-8">
	                         	 <select name="challengerStatus" id="challengerStatus" class="form-control">
	                         	  <option <?php print ($match['challenger_accepted'] == 0 ? 'selected' : ''); ?> value="0">Pending</option>
	                         	  <option <?php print ($match['challenger_accepted'] == 1 ? 'selected' : ''); ?> value="1">Accepted</option>
	                         	  <option <?php print ($match['challenger_accepted'] == 2 ? 'selected' : ''); ?> value="2">Rejected</option>
	                         	 </select>
	                         	</div>
	                          </div>
                          </div>
                          <div class="col-lg-6">
	                          <div class="form-group">
	                           <label class="col-lg-4 control-label">Challengee</label>
	                         	<div class="col-lg-8">
	                         	 <input type="text" class="form-control" value="<?php print $match['challengee']; ?>" disabled />
	                         	</div>
	                          </div>
	                          <div class="form-group">
	                           <label class="col-lg-4 control-label">Score</label>
	                         	<div class="col-lg-4">
	                         	 <input type="text" class="form-control" id="challengeeScore" value="<?php print $match['challengee_score']; ?>" />
	                         	</div>
	                          </div>
	                          <div class="form-group">
	                           <label class="col-lg-4 control-label">Status</label>
	                         	<div class="col-lg-8">
	                         	 <select name="challengeeStatus" id="challengeeStatus" class="form-control">
	                         	  <option <?php print ($match['challengee_accepted'] == 0 ? 'selected' : ''); ?> value="0">Pending</option>
	                         	  <option <?php print ($match['challengee_accepted'] == 1 ? 'selected' : ''); ?> value="1">Accepted</option>
	                         	  <option <?php print ($match['challengee_accepted'] == 2 ? 'selected' : ''); ?> value="2">Rejected</option>
	                         	 </select>
	                         	</div>
	                          </div>
	                        </div>
	                       </div>
	                       <hr/>
	                       <div class="form-group">
	                         <div class="col-lg-4">
	                         	 <button type="submit" class="btn btn-success">Update Match Details</button>
	                         </div>
	                        </div>
                         </form>
                         </div>
                        <!-- /.panel-body -->
                    </div>
                    	<!-- /.panel -->

                </div>
                
                <div class="col-lg-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o"></i> Match Date &amp; Time
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                         <?php $match = $ez->getMatch($match_id); ?>
                         
                         <form class="form-horizontal" id="editMatchDetails" name="editMatchDetails" method="POST">
                         <div class="row">
                          <div class="col-lg-12">
	                          <div class="form-group">
	                           <label class="col-lg-2 control-label">Match Date</label>
	                         	<div class="col-lg-6">
	                         	 <input type="text" class="form-control" id="match-date" value="<?php print date('F d, Y', strtotime($match['match_date'])); ?>" disabled />
	                         	</div>
	                          </div>
	                          <div class="form-group">
	                           <label class="col-lg-2 control-label">Match Time</label>
	                         	<div class="col-lg-6">
	                         	 <input type="text" class="form-control" value="<?php print (strlen($match['match_hour']) == 1 ? '0' . $match['match_hour'] : $match['match_hour']) . ":" . (strlen($match['match_min']) == 1 ? '0' . $match['match_min'] : $match['match_min']) . $match['match_pod'] . " " . $match['match_zone']; ?>" disabled />
	                         	</div>
	                          </div>
	                          <div class="form-group">
	                           <label class="col-lg-2 control-label">Status</label>
	                         	<div class="col-lg-4">
	                         	 <input type="text" class="form-control" value="<?php print ($match['completed'] == 0 ? 'Not Completed' : 'Completed'); ?>" disabled />
	                         	</div>
	                          </div>
	                          <div class="form-group">
	                           <label class="col-lg-2 control-label">Created</label>
	                         	<div class="col-lg-5">
	                         	 <input type="text" class="form-control" value="<?php print date('F d, Y h:ia', strtotime($match['created'])); ?>" disabled />
	                         	</div>
	                          </div>
	                        </div>
	                      </div>
                         </form>
                         </div>
                        <!-- /.panel-body -->
                    </div>
                    	<!-- /.panel -->

                </div>
                
                <div class="col-lg-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-file-o"></i> Match Chat Log
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                         <div class="row">
                          <div class="col-lg-12">
	                          <?php print $match['chat_log']; ?>
	                      </div>
	                     </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    	<!-- /.panel -->

                </div>
                	<!-- /.col-lg-8 -->
                          <?php } else { ?>
                    <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-file-o"></i> Edit Match
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                       		No Match was selected.
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
