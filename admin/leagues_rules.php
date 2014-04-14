<?php include('header.php'); ?>

<?php include('sidebar.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit League Rules</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-10">
                	<?php 
                		if(isset($_GET['id'])) { 
	                        $id = $_GET['id'];
	                         $league = $ez->getLeagueRules($id);
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-sitemap"></i> League Rules
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <?php if(!empty($id)) {  print "<h3>" . $league['league'] . "</h3>"; ?>
							<form id="editLeagueRules" name="editLeagueRules" method="POST">
					       	  <textarea class="ckeditor form-control" id="body" name="body"><?php print $league['rules']; ?></textarea>
					      		<button type="submit" class="btn btn-primary">Edit</button>
					        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					       </form>
					    <?php } else { ?>
					    	<h3>No League was selected</h3>
					    <?php } ?>
					<?php } ?>
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
