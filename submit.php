<?php session_start();
include('lib/db.class.php');
include('lib/ezleague.class.php');

$ez = new ezLeaguePub();
$ez_username = $_SESSION['ez_username'];

	if(isset($_POST['form'])) {
		$form = $_POST['form'];
		
		 switch($form) {
		 	
/*
 * LOGIN, REGISTRATION & INSTALLATION
 */		 
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
		 		
		 	case 'installer':
		 		$db			= $_POST['db'];
		 		$prefix		= $_POST['prefix'];
		 		 $ez->runInstaller($db, $prefix);
		 		break;
		 		
/*
 * LEAGUES & CHALLENGES
 */		 
		 	case 'joinLeague':
		 		$guild		= $_POST['guild'];
		 		$league		= $_POST['league'];
		 		 $ez->joinLeague($guild, $league);
		 		break;
		 		
		 	case 'makeChallenge':
		 		$guild			= $_POST['guild'];
		 		$challenger		= $_POST['challenger'];
		 		$league_id		= $_POST['league'];
		 		 $ez->makeChallenge($challenger, $guild, $league_id);
		 		break;
		 		
		 	case 'challengeStatus':
		 		$team 			= $_POST['team'];
		 		$status			= $_POST['status'];
		 		$match_id		= $_POST['id'];
		 		 $ez->updateChallengeStatus($match_id, $team, $status);
		 		break;
		 		
		 	case 'matchSettings':
		 		$id				= $_POST['id'];
		 		$date			= $_POST['date'];
		 		$hour			= $_POST['hour'];
		 		$mins			= $_POST['mins'];
		 		$zone			= $_POST['zone'];
		 		$pod			= $_POST['pod'];
		 		 $ez->updateChallenge($id, $date, $hour, $mins, $zone, $pod);
		 		break;
		 		
		 	case 'submitScore':
		 		$challenger 	= $_POST['challenger'];
		 		$challengee		= $_POST['challengee'];
		 		$match_id		= $_POST['id'];
		 		 $ez->submitChallengeScore($match_id, $challenger, $challengee);
		 		break;
		 		
		 	case 'addResponse':
		 		$body			= $_POST['body'];
		 		$id				= $_POST['id'];
		 		$date = date('m/d/y h:ia', strtotime('now'));
		 		 $response = "[<em>" . $date . "</em>] " . "<strong>" . $ez_username . "</strong> " . $body;
		 		 $ez->updateChallengeResponse($id, $response, $ez_username);
		 		break;
		 		
/*
 * TEAMS
 */		 		
		 		
		 	case 'createTeam':
		 		$team		= $_POST['team'];
		 		$abbr 		= $_POST['abbr'];
		 		$game		= $_POST['game'];
		 		 $ez->createTeam($team, $abbr, $game, $ez_username);
		 		break;
		 		
		 	case 'teamSettings':
		 		$id			= $_POST['id'];
		 		$gm 		= $_POST['gm'];
		 		$agm		= $_POST['agm'];
		 		$site		= $_POST['site'];
		 		$admin		= $_POST['admin'];
		 		 $ez->updateTeamSettings($id, $gm, $agm, $site, $admin);
		 		break;
		 	
		 	default:
		 		break;
		 }
		 
	} else {
		print "nothing was submitted";
	}
?>