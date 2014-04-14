<?php include('header.php'); ?>

<?php include('sidebar.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Admin Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-user fa-fw"></i> Recent User Registrations
                             <a href="users_view.php" class="btn btn-success btn-xs pull-right">View All Users</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped recent_users">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Username</th>
                                                    <th>E-Mail</th>
                                                    <th>Registered</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                               <?php $recentUsers = $ez->getRecentUsers(5); ?>
                                <?php foreach($recentUsers as $user) { ?>
                                                <tr>
                                                    <td>#<?php echo $user['id']; ?></td>
                                                    <td><?php echo $user['username']; ?></td>
                                                    <td><?php echo $user['email']; ?></td>
                                                    <td><small><?php echo date('M d h:ia', strtotime($user['created'])); ?></small></td>
                                                	<td><a href="users_view.php?id=<?php echo $user['id']; ?>" class="btn btn-info btn-xs">View</a></td>
                                                </tr>
                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-group fa-fw"></i> Recent Team Registrations
                             <a href="teams_view.php" class="btn btn-success btn-xs pull-right">View All Teams</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped recent_users">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Guild</th>
                                                    <th>GM</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                               <?php $recentTeams = $ez->getRecentTeams(5); ?>
                                <?php foreach($recentTeams as $team) { ?>
                                                <tr>
                                                    <td>#<?php echo $team['id']; ?></td>
                                                    <td><?php echo $team['guild']; ?> (<?php echo $team['abbreviation']; ?>)</td>
                                                    <td><?php echo $team['gm']; ?></td>
                                                	<td><a href="teams_view.php?id=<?php echo $team['id']; ?>" class="btn btn-info btn-xs">View</a></td>
                                                </tr>
                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
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
                            <i class="fa fa-bar-chart-o fa-fw"></i> Site Totals
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                            	<a href="#" class="list-group-item">
                                    <i class="fa fa-user fa-fw"></i> Users
                                    <span class="pull-right text-muted small"><em><?php echo $ez->getTotal('users'); ?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-group fa-fw"></i> Teams
                                    <span class="pull-right text-muted small"><em><?php echo $ez->getTotal('teams'); ?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-sitemap fa-fw"></i> Matches
                                    <span class="pull-right text-muted small"><em>0</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-exchange fa-fw"></i> Challenges
                                    <span class="pull-right text-muted small"><em><?php echo $ez->getTotal('challenges'); ?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-trophy fa-fw"></i> Leagues
                                    <span class="pull-right text-muted small"><em><?php echo $ez->getTotal('leagues'); ?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-gamepad fa-fw"></i> Games
                                    <span class="pull-right text-muted small"><em><?php echo $ez->getTotal('games'); ?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> Forum Posts
                                    <span class="pull-right text-muted small"><em>0</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-comments fa-fw"></i> Forum Topics
                                    <span class="pull-right text-muted small"><em>0</em>
                                    </span>
                                </a>
                            </div>
                            <!-- /.list-group -->
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

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="js/demo/dashboard-demo.js"></script>

</body>

</html>
