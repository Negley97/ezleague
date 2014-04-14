<?php include('header.php'); ?>
	<div class="row">
<?php 
	 	if(isset($_GET['game'])) { 
	 		$game_slug = $_GET['game']; 
	 		 $ez->setGame($game_slug);
	 		 $game_news = $ez->getNewsGame($game_slug); 
	 		 
include('sidebar.php'); 

?>
          <div class="col-lg-10">
              <div class="panel panel-primary">
               <?php 
               		if(isset($_GET['id'])) { 
               			$id = $_GET['id']; 
               			 $news_post = $ez->getNewsPost($id); 
               	?>
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $news_post['0']['title']; ?></h3>
                </div>
                <div class="panel-body">
                  <?php echo $news_post['0']['body']; ?>
                </div>
                <?php } else { ?>
                <div class="panel-heading">
                  <h3 class="panel-title">League News</h3>
                </div>
                 <?php foreach($game_news as $news) { ?>
                <div class="panel-body">
                  <h4 class="text-primary"><a href="<?php echo $site_url; ?>/game/<?php echo $game_slug; ?>/news/<?php echo $news['id']; ?>"><?php echo $news['title']; ?></a></h4>
                   <small>posted by <?php echo $news['author']; ?> @ <?php echo date('F d, Y h:ia', strtotime($news['created'])); ?></small>
                   <p><?php echo $news['body']; ?></p>
                </div>
           <?php } ?>  
                <?php } ?>
              </div>

          </div>
      <?php } else { ?>
       <h3>You must select a game</h3>
      <?php } ?> 
	</div>


<?php include('footer.php'); ?>