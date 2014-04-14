<?php include('header.php'); ?>

<?php include('sidebar.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add News</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-file-o"></i> Create New News Item
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                 <form role="form" id="addNews" name="addNews" method="POST">
                                	<div class="form-group">
									    <label>Title</label>
									    <input class="form-control" id="title" name="title" placeholder="Post Title" />
									</div>
                                    <div class="form-group">
									    <label>Body</label>
									    <textarea class="ckeditor form-control" id="news_body" name="news_body"></textarea>
									</div>
									<div class="form-group">
										<button class="btn btn-success" type="submit">Publish Post</button>
										<button class="btn btn-warning" type="button" onclick="saveNewsDraft()">Save as Draft</button>
										<button class="btn btn-info pull-right" type="button">Preview Post</button>
									</div>
									<div class="success">
										<span class="success_text"></span>
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
                            <i class="fa fa-sitemap"></i> Post Author
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                              <div class="form-group">
							    <select class="form-control" name="author" id="author">
							    	<option></option>
							     <?php $newsAuthors = $ez->getNewsAuthors(); ?>
							      <?php foreach($newsAuthors as $author) { ?>
							      	<option <?php echo ($author['username'] == $username ? 'selected' : ''); ?> value="<?php echo $author['username']; ?>"><?php echo $author['username']; ?></option>
							      <?php } ?>
							    </select>
							   </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-sitemap"></i> Game
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                         <?php $games = $ez->getSettingsGames(); ?>
                         	 <div class="form-group">
							    <div class="radio">
							        <label>
							            <input type="radio" name="game" id="game" value="all"></input> All
							        </label>
							    </div>
							  </div>
                          <?php foreach($games as $game) { ?>
                              <div class="form-group">
							    <div class="radio">
							        <label>
							            <input type="radio" name="game" id="game" value="<?php print $game['slug']; ?>"></input> <?php print $game['game']; ?>
							        </label>
							    </div>
							  </div>
						  <?php } ?>
							   
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                	<div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-sitemap"></i> Post Category
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                         <?php $news_categories = $ez->getNewsCategories(); ?>
                         	  <div class="form-group">
							    <div class="checkbox">
							        <label>
							            <input type="checkbox" name="category" id="category" value="general"></input> General
							        </label>
							    </div>
							  </div>
                          <?php foreach($news_categories as $category) { ?>
                              <div class="form-group">
							    <div class="checkbox">
							        <label>
							            <input type="checkbox" name="category" id="category" value="<?php print $category['category']; ?>"></input> <?php print $category['category']; ?>
							        </label>
							    </div>
						  <?php } ?>
							   </div>
							 </form>
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
    <link rel="stylesheet" href="css/summernote.css" />
	<script type="text/javascript" src="js/summernote.min.js"></script>
    <script src="js/ezleague.js"></script>
    <script src="js/ckeditor/ckeditor.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="js/demo/dashboard-demo.js"></script>

</body>

</html>
