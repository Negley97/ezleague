<?php include('header.php'); ?>

<?php include('sidebar.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Create User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-sitemap"></i> Create New User
                        </div>
                        <!-- /.panel-heading -->
                        	<div class="panel-body">
                        	 <div class="row">
                        	  <div class="col-lg-4">
                        	   <div class="success">
						        <span class="success_text"></span>
						       </div>
						      </div>
						     </div>
						     <div class="row">
                        	 <div class="col-sm-4">
                        		<form role="form" name="ezLeagueRegister" id="ezLeagueRegister" method="POST">
						            <div class="form-group">
						              <h5>Username</h5>
						              <input id="register-username" class="form-control text placeholder" placeholder="Username" name="username" type="text">
						            </div>
						            <div class="form-group">
						              <h5>Email</h5>
						              <input id="register-email" class="form-control email placeholder" placeholder="Email" name="email" type="email">
						            </div>
						            <div class="form-group">
						              <h5>Password</h5>
						              <input id="register-password" class="form-control password placeholder" placeholder="Password" name="password" autocomplete="off" type="password">
						            </div>
						            <div class="form-group">
						              <h5>Confirm</h5>
						              <input id="register-confirm" class="form-control password placeholder" placeholder="Password" name="confirm" autocomplete="off" type="password">
						            </div>
						            <div class="register_success">
									 <span class="register_success_text"></span>
									</div>
							      <div class="form-group">
							        <button type="submit" class="btn btn-primary">Register</button>
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							      </div>
						       </form>
						      </div>
						     </div>
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
