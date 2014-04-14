<?php include('header.php'); ?>

	<div class="row">
		  
          <?php include('sidebar.php'); ?>
          <div class="col-lg-10">
           <?php 
               		if(isset($_GET['id'])) { 
               			$id = $_GET['id']; 
               			 $news_post = $ez->getNewsPost($id); 
               	?>
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $news_post['0']['title']; ?></h3>
                </div>
                <div class="panel-body">
                  <span class="byline">By <span class="text-info"><a href="<?php print $site_url; ?>/news/author/<?php print $news_post['0']['author']; ?>"><?php echo $news_post['0']['author']; ?></a></span> @ <?php echo date('F d, Y h:ia', strtotime($news_post['0']['created'])); ?></span>
                  <p><?php echo $news_post['0']['body']; ?></p>
                </div>
                
                <?php } elseif(isset($_GET['author'])) { 
                		$author = $_GET['author'];
                		 $news_posts = $ez->getNewsByAuthor($author);
                ?>
                			<div class="panel panel-primary">
			                <div class="panel-heading">
			                  <h3 class="panel-title">Posts by <span class="italic"><?php print $author; ?></span></h3>
			                </div>
			   <?php 
                		  foreach($news_posts as $news) { ?>
			                <div class="panel-body">
			                  <h4 class="text-primary"><a href="<?php echo $site_url; ?>/news/<?php echo $news['id']; ?>"><?php echo $news['title']; ?></a></h4>
			                   <span class="byline">By <span class="text-info"><a href="<?php print $site_url; ?>/news/author/<?php print $news['author']; ?>"><?php echo $news['author']; ?></a></span> @ <?php echo date('F d, Y h:ia', strtotime($news['created'])); ?></span>
			                   <p><?php echo $news['body']; ?></p>
			                </div>
                <?php     } ?>
                			</div>
                <?php } else { ?>
                <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $news_post['0']['title']; ?></h3>
                </div>
                <div class="panel-body">
                	 <h3>Please select a news post to view</h3>  
                </div>
                </div>
                <?php } ?>
            

          </div>
        
	</div>


<?php include('footer.php'); ?>