<?php session_start();
    include('lib/db.class.php');
	include('lib/ezleague.class.php');
    
    $ez = new ezLeague();
    
    if(isset($_POST['form'])) {
    	$form = strip_tags($_POST['form']);
    	 switch($form) {
    	 	case 'login':
    	 		$username = $_POST['username'];
    	 		$password = $_POST['password'];
    	 		 $ez->login($username, $password);
    	 	 break;
    	 	 
    	 	 case 'register':
    	 	 	$username	= $_POST['username'];
    	 	 	$password	= $_POST['password'];
    	 	 	$confirm	= $_POST['confirm'];
    	 	 	$email		= $_POST['email'];
    	 	 	 $ez->register($username, $password, $email);
    	 	 	break;
    	 		
/*
 * START NEWS
 */    	 	 
    	 	case 'addNews':
	    	 	$title     = $_POST['title'];
	    	 	$body      = $_POST['body'];
	    	 	$author    = $_POST['author'];
	    	 	$category  = $_POST['category'];
	    	 	$game	   = $_POST['game'];
	    	 	$published = $_POST['published'];
	    	 	 $ez->addNews($title, $body, $author, $category, $game, $published);
	    	 break;
	    	 
	    	case 'editNews':
	    		$id		   = $_POST['id'];
	    	 	$title     = $_POST['title'];
	    	 	$body      = $_POST['body'];
	    	 	$author    = $_POST['author'];
	    	 	$category  = $_POST['category'];
	    	 	$game	   = $_POST['game'];
	    	 	$published = $_POST['published'];
	    	 	 $ez->editNews($id, $title, $body, $author, $category, $game, $published);
	    	 break;
	    	 
	    	case 'unpublishPost':
	    		$id		   = $_POST['id'];
	    		 $ez->unpublishPost($id);
	    	 break;
	    	 
    	 	case 'addNewsCategory':
    	 		$category = $_POST['category'];
    	 		 $ez->addNewsCategory($category);
    	 	 break;
    	 	 
    	 	case 'deleteNewsCategory':
    	 		$category_id = $_POST['id'];
    	 		 $ez->deleteNewsCategory($category_id); 
    	 	 break;

/*
 * END NEWS
 */    	 	

/*
 * START LEAGUES
 */    	 	 

    	 	case 'addNewLeague':
    	 		$league		= $_POST['league'];
    	 		$game 		= $_POST['game'];
    	 		$teams 		= $_POST['teams'];
    	 		$start		= $_POST['start'];
    	 		$end		= $_POST['end'];
    	 		$games		= $_POST['games'];
    	 		 $ez->addLeague($league, $game, $teams, $start, $end, $games);
    	 	 break;
    	 	 
    	 	case 'deleteLeague':
    	 		$league_id	= $_POST['id'];
    	 		 $ez->deleteLeague($league_id);
    	 	 break;

/*
 * END LEAGUES
 */    	 	
    	 	 
/*
 * START MATCHES
 */
    	 	 
    	 	case 'editMatch':
    	 		$match_id		   = $_POST['match_id'];
    	 		$challenger_score  = $_POST['challenger_score'];
    	 		$challenger_status = $_POST['challenger_status'];
    	 		$challengee_score  = $_POST['challengee_score'];
    	 		$challengee_status = $_POST['challengee_status'];
    	 		 $ez->editMatch($match_id, $challenger_score, $challenger_status, $challengee_score, $challengee_status);
    	 		break;
    	 		
    	 	case 'updateDispute':
    	 		$match_id			= $_POST['id'];
    	 		$status				= $_POST['status'];
    	 		 $ez->updateDispute($match_id, $status);
    	 		break;
    	 	 
/*
 * END MATCHES
 */
    	 		
/*
 * START USERS
 */    	 		
    	 	case 'suspendUser':
    	 		$id 		= $_POST['id'];
    	 		$status		= $_POST['status'];
    	 		 $ez->toggleSuspendUser($id, $status);
    	 		break;
    	 		
    	 	case 'toggleRoleUser':
    	 		$id			= $_POST['id'];
    	 		$role		= $_POST['role'];
    	 		 $ez->toggleRoleUser($id, $role);
    	 		break;
    	 		
    	 	case 'deleteUser':
    	 		$id			= $_POST['id'];
    	 		 $ez->deleteUser($id);
    	 		break;
    	 		
    	 	case 'create-admin':
    	 		$username	= $_POST['username'];
    	 		$password	= $_POST['password'];
    	 		$confirm	= $_POST['confirm'];
    	 		$email		= $_POST['email'];
    	 		 $ez->createAdmin($username, $password, $email);
    	 		break;
    	 		
/*
 * END USERS
 */    	 	
    	 			
/*
 * START SETTINGS
 */    	 	 
    	 	 case 'addNewGame':
    	 	 	$game		= $_POST['game'];
    	 	 	 $ez->addSettingsGame($game);
    	 	  break;
    	 	  
    	 	 case 'siteSettingsName':
    	 	 	$name		= $_POST['name'];
    	 	 	 $ez->siteSettingsName($name);
    	 	  break;
    	 	  
    	 	 case 'siteSettingsURL':
    	 	 	$url		= $_POST['url'];
    	 	 	 $ez->siteSettingsURL($url);
    	 	  break;
    	 	  
    	 	 case 'createAdmin':
    	 	 	$username	= $_POST['username'];
    	 	 	$email		= $_POST['email'];
    	 	 	$password   = $_POST['password'];
    	 	 	$confirm	= $_POST['confirm'];
    	 	 	 $ez->createAdmin($username, $password, $email);
    	 	  break;
    	 	 
/*
 * END SETTINGS
 */    	 	 
    	 	default:
    	 		break;
    	 }
    	
    }
?>