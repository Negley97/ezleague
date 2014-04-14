<?php session_start();
include('lib/db.class.php');
include('lib/ezleague.class.php');

$ez = new ezLeaguePub();
 $site_settings = $ez->getSiteSettings();
  $site_url = $site_settings['url'];
  $site_name = $site_settings['name'];
  
  if(isset($_SESSION['ez_username'])) {
  	$ez_username = $_SESSION['ez_username'];
  	$ez_guild_id = $ez->getUserGuildId($ez_username);
  		$ez_guild_details = $ez->getTeam($ez_guild_id);
  		$ez_guild_admin = $ez_guild_details['0']['admin'];
  		$ez_guild 		= $ez_guild_details['0']['guild'];
  		 if($ez_guild_admin == $ez_username) {
  		 	$_SESSION['ez_guild_admin'] = $ez_guild;
  		 }
  		 
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title><?php echo $site_name; ?> :: managed by ezLeague v1.0</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo $site_url; ?>/css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="<?php echo $site_url; ?>/css/bootswatch.css">
    <!-- ezLeague Custom Styling -->
    <link rel="stylesheet" href="<?php echo $site_url; ?>/css/ezleague.css">
    
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="../bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
</head>
  <body>

    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo $site_url; ?>" class="navbar-brand"><?php echo $site_name; ?></a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $site_url; ?>/" id="themes">Games <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
               <?php $games = $ez->getAllGames(); ?>
                <?php foreach($games as $game) { ?>
                <li><a href="<?php echo $site_url . "/game/" . $game['slug']; ?>"><?php echo $game['game']; ?></a></li>
                <li class="divider"></li>
                <?php } ?>
              </ul>
            </li>
            <li>
              <a href="<?php echo $site_url; ?>/">News</a>
            </li>
            <li>
              <a href="<?php echo $site_url; ?>/users">Members</a>
            </li>
          <!--   <li>
              <a href="#">Forum</a>
            </li> -->
          </ul>

          <ul class="nav navbar-nav navbar-right">
           <?php if(!isset($_SESSION['ez_username'])) { ?>
            <li><a href="#" data-target="#loginModal" data-toggle="modal">Login</a></li>
            <li><a href="#" data-target="#registerModal" data-toggle="modal">Register</a></li>
           <?php } else { ?>
            <li><a href="#">My Settings (<?php echo $_SESSION['ez_username']; ?>)</a></li>
             <?php if(isset($_SESSION['ez_admin'])) { ?>
            <li><a href="<?php echo $site_url; ?>/admin">Admin</a></li>
             <?php } ?>
            <li><a href="<?php echo $site_url; ?>/logout.php">Logout</a></li>
           <?php } ?>
          </ul>

        </div>
      </div>
    </div>


    <div class="container">
<?php 
if(isset($_GET['game'])) {
	$game_slug = $_GET['game'];
	$ez->setGame($game_slug);
	$current_game = $ez->getGameBySlug($game_slug);
} elseif(isset($_SESSION['ez_game'])) {
	$game_slug = $_SESSION['ez_game'];
	$ez->setGame($game_slug);
	$current_game = $ez->getGameBySlug($game_slug);
} else {
	unset($_SESSION['ez_game']);
}
	include('nav.php'); 
	
?>		