<?php
include('lib/db.class.php');
include('lib/ezleague.class.php');

 $ez = new ezLeague();

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
                        <h3 class="panel-title">ezLeague <em>Create Admin</em></h3> 
                    </div>
                    <div class="panel-body">
                      <small>Create your initial Admin Account below</small>
                        <form role="form" id="ezLeagueAdmin" name="ezLeagueAdmin" method="POST">
                            <fieldset>
                            	<div class="form-group">
                                  <label>Username</label>
                                    <input class="form-control" id="admin-username" name="username" type="text">
                                </div>
                                <div class="form-group">
                                  <label>E-Mail Address</label>
                                    <input class="form-control" id="admin-email" name="email" type="text">
                                </div>
                                <div class="form-group">
                                  <label>Password</label>
                                    <input class="form-control" id="admin-password" name="password" type="password">
                                </div>
                                
                                <div class="form-group">
                                  <label>Confirm Password</label>
                                    <input class="form-control" id="admin-confirm" name="confirm" type="password">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Create Account</button>
                                <div class="success">
				                  <span class="success_text"></span>
				                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>
    <script src="js/ezleague.js"></script>

</body>

</html>
