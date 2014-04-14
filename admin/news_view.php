<?php include('header.php'); ?>

<?php include('sidebar.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View All News</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-file-o"></i> Viewing News
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                              <div class="table-responsive">
					<?php $all_news = $ez->getAllNews(); ?>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th class="hidden-xs">Game</th>
                                            <th class="hidden-xs">Category</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                         <?php foreach($all_news as $news) { ?> 
                           <?php if($news['published'] == 1) { ?>
                           				<tr class="success">
                           <?php } else { ?>
                           				<tr class="info">
                           <?php } ?>
                                            <td><?php print $news['title']; ?></td>
                                            <td><?php print $news['author']; ?></td>
                                            <td class="hidden-xs"><?php print $news['game']; ?></td>
                                            <td class="hidden-xs"><?php print $news['category']; ?></td>
                                            <td><?php print ($news['published'] == 1 ? 'published' : 'draft'); ?></td>
                                            <td><?php print date('M d, Y h:ia', strtotime($news['created'])); ?></td>
                                            <td>
                                            	<a href="news_edit.php?id=<?php print $news['id']; ?>" class="btn btn-info btn-xs">Edit</a>
                                            </td>
                                        </tr>
                          <?php } ?>
                                    </tbody>
                                 </table>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
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
