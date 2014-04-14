<?php session_start(); 
include('lib/db.class.php');
include('lib/ezleague.class.php');

$ez = new ezLeague();

		if(isset($_SESSION['ez_admin'])) {
			header("Location: index.php");
		}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ezLeague v1.0 - PHP Online Gaming League Script</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/ezleague.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">ezLeague Admin - Please Sign In</h3> 
                         <?php $total_admins = $ez->checkForAdmins(); ?>
                    </div>
                    <div class="panel-body">
                     <?php if($total_admins == 0) { ?>
                     	No Admins were detected. Please <a href="create_admin.php">Create an Admin</a>.
                     <?php } else { ?>
                        <form role="form" id="ezLeagueLogin" name="ezLeagueLogin">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" id="username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" id="password" name="password" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                                <div class="login_success">
				                  <span class="login_success_text"></span>
				                </div>
                            </fieldset>
                        </form>
                      <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>
    <script src="js/ezleague.js"></script>

</body>

</html>
