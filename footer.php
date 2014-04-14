     <?php //$_F=__FILE__;$_X='Pz48ZjIydDVyPg0KICAgICAgICA8ZDR2IGNsMXNzPSJyMnciPg0KICAgICAgICAgIDxkNHYgY2wxc3M9ImMybC1sZy02YSI+DQoNCiAgICAgICAgICAgIDwzbCBjbDFzcz0ibDRzdC0zbnN0eWw1ZCI+DQogICAgICAgICAgICAgIDxsNCBjbDFzcz0icDNsbC1yNGdodCI+PDEgaHI1Zj0iI3QycCI+QjFjayB0MiB0MnA8LzE+PC9sND4NCiAgICAgICAgICAgICAgPGw0Pg0KICAgICAgICAgICAgICAJJmMycHk7IGEwNnUgPDEgaHI1Zj0iaHR0cDovL3d3dy5tZGwycjRuZy5jMm0vIiB0MXJnNXQ9Il9ibDFuayI+TURMMnI0bmc8LzE+DQogICAgICAgICAgICAgIDwvbDQ+DQogICAgICAgICAgICAgIDxsND48MSBocjVmPSJodHRwOi8vd3d3Lmc1dGIyMnRzdHIxcC5jMm0iIHQxcmc1dD0iX2JsMW5rIj5CMjJ0c3RyMXA8LzE+PC9sND4NCiAgICAgICAgICAgIDwvM2w+DQogICAgICAgICAgICANCiAgICAgICAgICA8L2Q0dj4NCiAgICAgICAgPC9kNHY+DQoNCiAgICAgIDwvZjIydDVyPg==';eval(base64_decode('JF9YPWJhc2U2NF9kZWNvZGUoJF9YKTskX1g9c3RydHIoJF9YLCcxMjM0NTZhb3VpZScsJ2FvdWllMTIzNDU2Jyk7JF9SPWVyZWdfcmVwbGFjZSgnX19GSUxFX18nLCInIi4kX0YuIiciLCRfWCk7ZXZhbCgkX1IpOyRfUj0wOyRfWD0wOw=='));?>


     <footer>
        <div class="row">
          <div class="col-lg-12">
            <ul class="list-unstyled">
              <li class="pull-right"><a href="#top">Back to top</a></li>
              <li>
              	&copy; 2014 <a href="http://www.mdloring.com/" target="_blank">MDLoring</a>
              </li>
              <li><a href="http://www.getbootstrap.com" target="_blank">Bootstrap</a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
<div id="loginModal" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        <h4 class="modal-title">Login to <?php echo $site_name; ?></h4>
      </div>
      <div class="modal-body">
       <div class="row">
        <div class="col-lg-6">
          <form role="form" name="ezLeagueLogin" id="ezLeagueLogin" method="POST">
            <div class="form-group">
              <h5>Username</h5>
              <input id="login-username" class="form-control text placeholder" placeholder="Username" name="username" type="text" autofocus>
            </div>
            <div class="form-group">
              <h5>Password</h5>
              <input id="login-password" class="form-control password placeholder" placeholder="Password" name="password" autocomplete="off" type="password">
            </div>
         	<div class="login_success">
			 <span class="login_success_text"></span>
			</div>
         </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Login</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> 
     </form>
    </div>
  </div>
</div>
<div id="registerModal" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        <h4 class="modal-title">Register for <?php echo $site_name; ?></h4>
      </div>
      <div class="modal-body">
        <div class="row">
         <div class="col-lg-6">
          <form role="form" name="ezLeagueRegister" id="ezLeagueRegister" method="POST">
            <div class="form-group">
              <h5>Username</h5>
              <input id="register-username" class="form-control text placeholder" placeholder="Username" name="username" type="text">
            </div>
            <div class="form-group">
              <h5>Email</h5>
              <input id="register-email" class="form-control email placeholder" placeholder="Email" name="email" type="email">
            </div>
            <div class="form-group">
              <h5>Password</h5>
              <input id="register-password" class="form-control password placeholder" placeholder="Password" name="password" autocomplete="off" type="password">
            </div>
            <div class="form-group">
              <h5>Confirm</h5>
              <input id="register-confirm" class="form-control password placeholder" placeholder="Password" name="confirm" autocomplete="off" type="password">
            </div>
            <div class="register_success">
			 <span class="register_success_text"></span>
			</div>
         </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Register</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
     </form>
    </div>
  </div>
</div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php print $site_url; ?>/admin/css/redmond/jquery-ui-1.10.4.custom.min.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="<?php echo $site_url; ?>/js/bootswatch.js"></script>
    <link rel="stylesheet" href="<?php echo $site_url; ?>/css/summernote.css" />
	<script type="text/javascript" src="<?php echo $site_url; ?>/js/summernote.min.js"></script>
  	<script src="<?php echo $site_url; ?>/js/ezleague.js"></script>
</body>
</html>