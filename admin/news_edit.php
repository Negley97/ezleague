<?php include('header.php'); ?>

<?php include('sidebar.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit News</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-file-o"></i> Edit News Post
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                         <?php 
                         	if(isset($_GET['id'])) { 
                         		$news_id = $_GET['id']; 
                         		 $news_post = $ez->getNewsPost($news_id);
                         		  $news_title  = $news_post['0']['title'];
                         		  $news_body   = $news_post['0']['body'];
                         		  $news_author = $news_post['0']['author'];
                         		  $news_game   = $news_post['0']['game'];
                         		  $news_cat    = $news_post['0']['category'];
                         		  $news_pub	   = $news_post['0']['published'];
                         ?>
                            <div class="row">
                                <div class="col-lg-12">
                                 <form role="form" id="editNews" name="editNews" method="POST">
                                  <input type="hidden" name="news_id" id="news_id" value="<?php print $news_id; ?>" />
                                	<div class="form-group">
									    <label>Title</label>
									    <input class="form-control" id="title" name="title" placeholder="Post Title" value="<?php print $news_title; ?>" />
									</div>
                                    <div class="form-group">
									    <label>Body</label>
									    <textarea class="ckeditor form-control" id="body" name="body" rows="3"><?php print $news_body; ?></textarea>
									</div>
									<div class="form-group">
										<button class="btn btn-success" type="submit">Publish Post</button>
										<button class="btn btn-warning" type="button" onclick="saveEditNewsDraft()">Update Draft</button>
									<?php if($news_pub == 1) { ?>
										<button class="btn btn-info pull-right" type="button" onclick="unpublishPost('<?php print $news_id; ?>')">Unpublish Post</button>
									<?php } ?>
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
							      	<option <?php echo ($author['username'] == $news_author ? 'selected' : ''); ?> value="<?php echo $author['username']; ?>"><?php echo $author['username']; ?></option>
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
							            <input <?php echo ($game['slug'] == $news_game ? 'checked' : ''); ?> type="radio" name="game" id="game" value="<?php print $game['slug']; ?>"></input> <?php print $game['game']; ?>
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
							            <input <?php echo ($category['category'] == $news_cat ? 'checked' : ''); ?> type="checkbox" name="category" id="category" value="<?php print $category['category']; ?>"></input> <?php print $category['category']; ?>
							        </label>
							    </div>
						  <?php } ?>
							   </div>
							 </form>
					<?php } else { ?>
					 <h3>No News item selected</h3>
					<?php } ?>
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
    <script src="js/ckeditor/ckeditor.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="js/demo/dashboard-demo.js"></script>

</body>

</html>
