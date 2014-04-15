<?php include('header.php'); ?>
<?php unset($_SESSION['ez_game']); ?>
	<div class="row">
		  
          <?php include('sidebar.php'); ?>
          <div class="col-lg-10">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">League News</h3>
                </div>
          <?php $news_posts = $ez->getNewsAll(); 
            	 if($news_posts != false) {
	           	  foreach($news_posts as $news) { 
	           			$news_body = substr($news['body'], 0, 200);
	           			 $body_pos = strrpos($news_body, " ");
	           			 if ($body_pos > 0) {
	           			 	$news_body = substr($news_body, 0, $body_pos);
	           			 }
	
	           ?>
                <div class="panel-body">
                  <h4 class="text-primary"><a href="<?php echo $site_url; ?>/news/<?php echo $news['id']; ?>"><?php echo $news['title']; ?></a></h4>
                   <span class="byline">By <span class="text-info"><a href="<?php print $site_url; ?>/news/author/<?php print $news['author']; ?>"><?php echo $news['author']; ?></a></span> @ <?php echo date('F d, Y h:ia', strtotime($news['created'])); ?></span>
                   <p><?php echo $news_body ?>...<a href="<?php echo $site_url; ?>/news/<?php echo $news['id']; ?>">Read More</a></p>
                </div>
           <?php } ?>
          <?php } else { ?>
          		 <div class="panel-body">
                 	<h3>No News Posts to Display</h3>
                </div>
          <?php } ?>
              </div>

          </div>
        
	</div>


<?php include('footer.php'); ?>