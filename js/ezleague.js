<<<<<<< HEAD
<<<<<<< HEAD
/**
* Custom Javascript & jQuery
* About: Used to handle form submissions & button onclicks
* 		 A majority of these functions could have been combined into one,
* 		 but I wrote them individually to allow for more customization
* 		 and future changes.
* Author: Michael Loring
* Project: ezLeague - http://www.mdloring.com/ezleague
* Contact: E-Mail - mdloring@gmail.com ~ Web - http://www.mdloring.com
*/

	var url  = site_url + '/submit.php';
		url2 = site_url + '/get_challenge.php';

	$('#ezLeagueRegister').submit(function(e) {

		var username    = $("#register-username").val();
			email	    = $("#register-email").val();
			password    = $("#register-password").val();
			confirm     = $("#register-confirm").val();

		 e.preventDefault();
	if(password == confirm && password != '') {
	 $.ajax({
	     type: "POST",
	     url: url,
	     data: { form: 'register', username: '' + username + '', email: '' + email + '', password: '' + password + '', confirm: '' + confirm + '' }
	   }).success(function( msg ) {
		      $('.register_success').css("display", "");
		      $(".register_success").fadeIn(1000, "linear");
		      $('.register_success_text').fadeIn("slow");
	 	  $('.register_success_text').html(msg);
	 	  //$(".login_success").fadeOut(5200, "linear");
	 	   if(msg == "<strong>Success!</strong> Account has been created. You may now login.") {
	 		  setTimeout(function(){location.reload()},3000);
	 	   }
	  });
	} else {
			$('.register_success').css("display", "");
	        $(".register_success").fadeIn(1000, "linear");
	        $('.register_success_text').fadeIn("slow");
	        $('.register_success_text').html('<strong>Error</strong> Passwords do not match');
	}
	});

//login to ezLeague	
	$('#ezLeagueLogin').submit(function(e) {
		var username	= $("#login-username").val();
			password    = $("#login-password").val();
			
		 e.preventDefault();
	 $.ajax({
	     type: "POST",
	     url: url,
	     data: { form: 'login', username: '' + username + '', password: '' + password + ''}
	   }).success(function( msg ) {
		      $('.login_success').css("display", "");
		      $(".login_success").fadeIn(1000, "linear");
		      $('.login_success_text').fadeIn("slow");
		      $('.login_success_text').html(msg);
		      setTimeout(function(){location.reload()},3000);
	  });
	});

/*
 * END LOGIN & REGISTRATION FUNCTIONALITY
 */
	
/*
 * LEAGUES
 */	
	function joinLeague(league, guild) {
		$.ajax({
		     type: "POST",
		     url: url,
		     data: { form: 'joinLeague', guild: '' + guild + '', league: '' + league + '' }
		   }).success(function( msg ) {
			   	  $('.success').css("display", "");
			      $(".success").fadeIn(1000, "linear");
			      $('.success_text').fadeIn("slow");
			      $('.success_text').html(msg);
			      setTimeout(function(){location.reload()},3000);
		  });
	}
	
	
/*
 * TEAMS
 */

//create team	
	$('#ezLeagueCreateTeam').submit(function(e) {
		var	team	= $("#team-name").val();
			abbr	= $("#team-abbr").val();
			game	= $("#team-game").val();
			
		 e.preventDefault();
	 $.ajax({
	     type: "POST",
	     url: url,
	     data: { form: 'createTeam', team: '' + team + '', abbr: '' + abbr + '', game: '' + game + '' }
	   }).success(function( msg ) {
		   	  $('.success').css("display", "");
		      $(".success").fadeIn(1000, "linear");
		      $('.success_text').fadeIn("slow");
		      $('.success_text').html(msg);
		      //setTimeout(function(){location.reload()},3000);
	  });
	});
	
//team settings
	$('#updateTeamSettings').submit(function(e) {
		var id			= $("#team-id").val();
			gm			= $("#team-gm").val();
			agm			= $("#team-agm").val();
			site		= $("#team-site").val();
			admin		= $("#team-admin").val();
			
		 e.preventDefault();
	 $.ajax({
	     type: "POST",
	     url: url,
	     data: { form: 'teamSettings', id: '' + id + '', gm: '' + gm + '', agm: '' + agm + '', site: '' + site + '', admin: '' + admin +'' }
	   }).success(function( msg ) {
		   	  $('.success').css("display", "");
		      $(".success").fadeIn(1000, "linear");
		      $('.success_text').fadeIn("slow");
		      $('.success_text').html(msg);
		      setTimeout(function(){location.reload()},3000);
	  });
	});
	
	function teamInvite(user_id, team_id) {
		alert('U: ' + user_id + ' T: ' + team_id);
	}

/*
 * MATCHES
 */	
	
//make challenge
	function makeChallenge(guild, challenger, league) {
		
		$.ajax({
		     type: "POST",
		     url: url,
		     data: { form: 'makeChallenge', league: '' + league + '', guild: '' + guild + '', challenger: '' + challenger + '' }
		   }).success(function( msg ) {
			   	  $('.success').css("display", "");
			      $(".success").fadeIn(1000, "linear");
			      $('.success_text').fadeIn("slow");
			      $('.success_text').html(msg);
			      //setTimeout(function(){location.reload()},3000);
		  });
	}

//update match 	
	$('#match-settings').submit(function(e) {
		var	date	 = $("#match-date").val();
			hour	 = $("#match-hour option:selected").val();
			mins	 = $("#match-min option:selected").val();
			pod		 = $("#match-pod option:selected").val();
			zone	 = $("#match-zone option:selected").val();
			match_id = $("#match-id").val();
			
			if(date == '' || hour == '' || mins == '' || pod == '' || zone == '') {
				alert("All values must be filled in");
				 return;
			} else {
				 e.preventDefault();
			 $.ajax({
			     type: "POST",
			     url: url,
			     data: { form: 'matchSettings', id: '' + match_id + '', date: '' + date + '', hour: '' + hour + '', mins: '' + mins + '', pod: '' + pod + '', zone: '' + zone + '' }
			   }).success(function( msg ) {
				   	  $('.success').css("display", "");
				      $(".success").fadeIn(1000, "linear");
				      $('.success_text').fadeIn("slow");
				      $('.success_text').html(msg);
				      setTimeout(function(){location.reload()},3000);
			  });
			}
	});

//update match status
	$('#match-status').submit(function(e) {
		var	status	 = $("#match-status option:selected").val();
			team	 = $("#match-team").val();
			match_id = $("#match-id").val();
			
		 e.preventDefault();
	 $.ajax({
	     type: "POST",
	     url: url,
	     data: { form: 'challengeStatus', id: '' + match_id + '', team: '' + team + '', status: '' + status + '' }
	   }).success(function( msg ) {
		   	  $('.success').css("display", "");
		      $(".success").fadeIn(1000, "linear");
		      $('.success_text').fadeIn("slow");
		      $('.success_text').html(msg);
		      setTimeout(function(){location.reload()},3000);
	  });
	});
	
//add match log response
	$('#match-log').submit(function(e) {
		var	body	 = $("textarea#match-body").val();
			match_id = $("#match-id").val();
			
		 e.preventDefault();
	 $.ajax({
	     type: "POST",
	     url: url,
	     data: { form: 'addResponse', id: '' + match_id + '', body: '' + body + '' }
	   }).success(function( msg ) {
		   	  $('.success').css("display", "");
		      $(".success").fadeIn(1000, "linear");
		      $('.success_text').fadeIn("slow");
		      $('.success_text').html(msg);
		      setTimeout(function(){location.reload()},3000);
	  });
	});
	
//submit match score
	$('#match-score').submit(function(e) {
		var	challenger	 = $("#challenger-score").val();
			challengee 	 = $("#challengee-score").val();
			match_id 	 = $("#match-id").val();

		 e.preventDefault();
	 $.ajax({
	     type: "POST",
	     url: url,
	     data: { form: 'submitScore', id: '' + match_id + '', challenger: '' + challenger + '', challengee: '' + challengee + '' }
	   }).success(function( msg ) {
		   	  $('.success').css("display", "");
		      $(".success").fadeIn(1000, "linear");
		      $('.success_text').fadeIn("slow");
		      $('.success_text').html(msg);
		      setTimeout(function(){location.reload()},3000);
	  });
	});
	
	
//submit dispute
	$('#ezLeagueDispute').submit(function(e) {
		var id		       = $("#challenge-id").val();
			description    = $("#dispute-description").val();
			filer	       = $("#dispute-filer").val();
			
		 e.preventDefault();
	 $.ajax({
	     type: "POST",
	     url: url,
	     data: { form: 'dispute', id: '' + id + '', description: '' + description + '', filer: '' + filer + '' }
	   }).success(function( msg ) {
		      $('.success').css("display", "");
		      $(".success").fadeIn(1000, "linear");
		      $('.success_text').fadeIn("slow");
		      $('.success_text').html(msg);
		      setTimeout(function(){location.reload()},3000);
	  });
	});
	
/*
 * GENERAL
 */	

	$(function() {
		  $( "#match-date" ).datepicker();
			 $( "#match-date" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	});
	
	function getChallenge(id) {
		$.ajax({
		     type: "POST",
		     url: url2,
		     data: "id=" + id
		   }).success(function( msg ) {
		 	  $('#viewChallengeModal').html(msg);
		  });
    }
	
	$(document).ready(function() {
		  $('#summernote').summernote();
		  
		  $(function() {    // Makes sure the code contained doesn't run until
              //     all the DOM elements have loaded

			$('#match-status').change(function(){
			    if($('#match-status option:selected').val() == 1) {
			    	$('#add-match-score').show();
			    	$('#match-submit-score').show();
			    } else {
			    	$('#add-match-score').hide();
			    	$('#match-submit-score').hide();
			    }
			});

		 });
	});
	
/*
 * INSTALLATION
 */	

//run installer
	$('#ezLeagueInstallation').submit(function(e) {
		  $('.success').css("display", "");
	      $(".success").fadeIn(1000, "linear");
	      //$('.success_text').fadeIn("fast");
	      $('.success_text').html('Installation Running...');
		var	db	 	 = $("#database").val();
			prefix 	 = $("#prefix").val();
			
		 e.preventDefault();
	 $.ajax({
	     type: "POST",
	     url: url,
	     data: { form: 'installer', db: '' + db + '', prefix: '' + prefix + '' }
	   }).success(function( msg ) {

		      setTimeout(function(){
		    	  $('.success').css('background-color', '#C2DBEF');
		    	  $('.success_text').html(msg);
		    	  $('.success_text').css('color', '#000000');
		      },3000);
	  });
	});
	
//create initial admin account
	$('#ezLeagueAdmin').submit(function(e) {
			var username    = $("#register-username").val();
				email	    = $("#register-email").val();
				password    = $("#register-password").val();
				confirm     = $("#register-confirm").val();

			 e.preventDefault();
		if(password == confirm && password != '') {
		 $.ajax({
		     type: "POST",
		     url: "submit.php",
		     data: { form: 'createAdmin', username: '' + username + '', email: '' + email + '', password: '' + password + '', confirm: '' + confirm + '' }
		   }).success(function( msg ) {
			      $('.success').css("display", "");
			      $(".success").fadeIn(1000, "linear");
			      $('.success_text').fadeIn("slow");
		 	  $('.success_text').html(msg);
		 	  //$(".login_success").fadeOut(5200, "linear");
		 	   if(msg == "<strong>Success!</strong> Account has been created. You may now login.") {
		 		  setTimeout(function(){location.reload()},3000);
		 	   }
		  });
		} else {
				$('.success').css("display", "");
		        $(".success").fadeIn(1000, "linear");
		        $('.success_text').fadeIn("slow");
		        $('.success_text').html('<strong>Error</strong> Passwords do not match');
		}
		});
	
=======
=======
>>>>>>> 871aac6fb2abdcb263a59c035d16f0e633ee3f31
/**

* Custom Javascript & jQuery

* About: Used to handle form submissions & button onclicks

* 		 A majority of these functions could have been combined into one,

* 		 but I wrote them individually to allow for more customization

* 		 and future changes.

* Author: Michael Loring

* Project: ezLeague - http://www.mdloring.com/ezleague

* Contact: E-Mail - mdloring@gmail.com ~ Web - http://www.mdloring.com

*/



	var url = 'http://your-domain/ezleague-install/submit.php';

		url2 = 'http://your-domain/ezleague-install/get_challenge.php';



	$('#ezLeagueRegister').submit(function(e) {

		var username    = $("#register-username").val();

			email	    = $("#register-email").val();

			password    = $("#register-password").val();

			confirm     = $("#register-confirm").val();



		 e.preventDefault();

	if(password == confirm && password != '') {

	 $.ajax({

	     type: "POST",

	     url: "submit.php",

	     data: { form: 'register', username: '' + username + '', email: '' + email + '', password: '' + password + '', confirm: '' + confirm + '' }

	   }).success(function( msg ) {

		      $('.register_success').css("display", "");

		      $(".register_success").fadeIn(1000, "linear");

		      $('.register_success_text').fadeIn("slow");

	 	  $('.register_success_text').html(msg);

	 	  //$(".login_success").fadeOut(5200, "linear");

	 	   if(msg == "<strong>Success!</strong> Account has been created. You may now login.") {

	 		  setTimeout(function(){location.reload()},3000);

	 	   }

	  });

	} else {

			$('.register_success').css("display", "");

	        $(".register_success").fadeIn(1000, "linear");

	        $('.register_success_text').fadeIn("slow");

	        $('.register_success_text').html('<strong>Error</strong> Passwords do not match');

	}

	});



//login to ezLeague	

	$('#ezLeagueLogin').submit(function(e) {

		var username	= $("#login-username").val();

			password    = $("#login-password").val();

			

		 e.preventDefault();

	 $.ajax({

	     type: "POST",

	     url: url,

	     data: { form: 'login', username: '' + username + '', password: '' + password + ''}

	   }).success(function( msg ) {

		      $('.login_success').css("display", "");

		      $(".login_success").fadeIn(1000, "linear");

		      $('.login_success_text').fadeIn("slow");

		      $('.login_success_text').html(msg);

		      setTimeout(function(){location.reload()},3000);

	  });

	});



/*

 * END LOGIN & REGISTRATION FUNCTIONALITY

 */

	

/*

 * LEAGUES

 */	

	function joinLeague(league, guild) {

		$.ajax({

		     type: "POST",

		     url: url,

		     data: { form: 'joinLeague', guild: '' + guild + '', league: '' + league + '' }

		   }).success(function( msg ) {

			   	  $('.success').css("display", "");

			      $(".success").fadeIn(1000, "linear");

			      $('.success_text').fadeIn("slow");

			      $('.success_text').html(msg);

			      setTimeout(function(){location.reload()},3000);

		  });

	}

	

	

/*

 * TEAMS

 */



//create team	

	$('#ezLeagueCreateTeam').submit(function(e) {

		var	team	= $("#team-name").val();

			abbr	= $("#team-abbr").val();

			game	= $("#team-game").val();

			

		 e.preventDefault();

	 $.ajax({

	     type: "POST",

	     url: url,

	     data: { form: 'createTeam', team: '' + team + '', abbr: '' + abbr + '', game: '' + game + '' }

	   }).success(function( msg ) {

		   	  $('.success').css("display", "");

		      $(".success").fadeIn(1000, "linear");

		      $('.success_text').fadeIn("slow");

		      $('.success_text').html(msg);

		      //setTimeout(function(){location.reload()},3000);

	  });

	});

	

//team settings

	$('#updateTeamSettings').submit(function(e) {

		var id			= $("#team-id").val();

			gm			= $("#team-gm").val();

			agm			= $("#team-agm").val();

			site		= $("#team-site").val();

			admin		= $("#team-admin").val();

			

		 e.preventDefault();

	 $.ajax({

	     type: "POST",

	     url: url,

	     data: { form: 'teamSettings', id: '' + id + '', gm: '' + gm + '', agm: '' + agm + '', site: '' + site + '', admin: '' + admin +'' }

	   }).success(function( msg ) {

		   	  $('.success').css("display", "");

		      $(".success").fadeIn(1000, "linear");

		      $('.success_text').fadeIn("slow");

		      $('.success_text').html(msg);

		      setTimeout(function(){location.reload()},3000);

	  });

	});

	

	function teamInvite(user_id, team_id) {

		alert('U: ' + user_id + ' T: ' + team_id);

	}



/*

 * MATCHES

 */	

	

//make challenge

	function makeChallenge(guild, challenger, league) {

		

		$.ajax({

		     type: "POST",

		     url: url,

		     data: { form: 'makeChallenge', league: '' + league + '', guild: '' + guild + '', challenger: '' + challenger + '' }

		   }).success(function( msg ) {

			   	  $('.success').css("display", "");

			      $(".success").fadeIn(1000, "linear");

			      $('.success_text').fadeIn("slow");

			      $('.success_text').html(msg);

			      //setTimeout(function(){location.reload()},3000);

		  });

	}



//update match 	

	$('#match-settings').submit(function(e) {

		var	date	 = $("#match-date").val();

			hour	 = $("#match-hour option:selected").val();

			mins	 = $("#match-min option:selected").val();

			pod		 = $("#match-pod option:selected").val();

			zone	 = $("#match-zone option:selected").val();

			match_id = $("#match-id").val();

			

			if(date == '' || hour == '' || mins == '' || pod == '' || zone == '') {

				alert("All values must be filled in");

				 return;

			} else {

				 e.preventDefault();

			 $.ajax({

			     type: "POST",

			     url: url,

			     data: { form: 'matchSettings', id: '' + match_id + '', date: '' + date + '', hour: '' + hour + '', mins: '' + mins + '', pod: '' + pod + '', zone: '' + zone + '' }

			   }).success(function( msg ) {

				   	  $('.success').css("display", "");

				      $(".success").fadeIn(1000, "linear");

				      $('.success_text').fadeIn("slow");

				      $('.success_text').html(msg);

				      setTimeout(function(){location.reload()},3000);

			  });

			}

	});



//update match status

	$('#match-status').submit(function(e) {

		var	status	 = $("#match-status option:selected").val();

			team	 = $("#match-team").val();

			match_id = $("#match-id").val();

			

		 e.preventDefault();

	 $.ajax({

	     type: "POST",

	     url: url,

	     data: { form: 'challengeStatus', id: '' + match_id + '', team: '' + team + '', status: '' + status + '' }

	   }).success(function( msg ) {

		   	  $('.success').css("display", "");

		      $(".success").fadeIn(1000, "linear");

		      $('.success_text').fadeIn("slow");

		      $('.success_text').html(msg);

		      setTimeout(function(){location.reload()},3000);

	  });

	});

	

//add match log response

	$('#match-log').submit(function(e) {

		var	body	 = $("textarea#match-body").val();

			match_id = $("#match-id").val();

			

		 e.preventDefault();

	 $.ajax({

	     type: "POST",

	     url: url,

	     data: { form: 'addResponse', id: '' + match_id + '', body: '' + body + '' }

	   }).success(function( msg ) {

		   	  $('.success').css("display", "");

		      $(".success").fadeIn(1000, "linear");

		      $('.success_text').fadeIn("slow");

		      $('.success_text').html(msg);

		      setTimeout(function(){location.reload()},3000);

	  });

	});

	

//submit match score

	$('#match-score').submit(function(e) {

		var	challenger	 = $("#challenger-score").val();

			challengee 	 = $("#challengee-score").val();

			match_id 	 = $("#match-id").val();



		 e.preventDefault();

	 $.ajax({

	     type: "POST",

	     url: url,

	     data: { form: 'submitScore', id: '' + match_id + '', challenger: '' + challenger + '', challengee: '' + challengee + '' }

	   }).success(function( msg ) {

		   	  $('.success').css("display", "");

		      $(".success").fadeIn(1000, "linear");

		      $('.success_text').fadeIn("slow");

		      $('.success_text').html(msg);

		      setTimeout(function(){location.reload()},3000);

	  });

	});

	

	

//submit dispute

	$('#ezLeagueDispute').submit(function(e) {

		var id		       = $("#challenge-id").val();

			description    = $("#dispute-description").val();

			filer	       = $("#dispute-filer").val();

			

		 e.preventDefault();

	 $.ajax({

	     type: "POST",

	     url: url,

	     data: { form: 'dispute', id: '' + id + '', description: '' + description + '', filer: '' + filer + '' }

	   }).success(function( msg ) {

		      $('.success').css("display", "");

		      $(".success").fadeIn(1000, "linear");

		      $('.success_text').fadeIn("slow");

		      $('.success_text').html(msg);

		      setTimeout(function(){location.reload()},3000);

	  });

	});

	

/*

 * GENERAL

 */	



	$(function() {

		  $( "#match-date" ).datepicker();

			 $( "#match-date" ).datepicker( "option", "dateFormat", "yy-mm-dd" );

	});

	

	function getChallenge(id) {

		$.ajax({

		     type: "POST",

		     url: url2,

		     data: "id=" + id

		   }).success(function( msg ) {

		 	  $('#viewChallengeModal').html(msg);

		  });

    }

	

	$(document).ready(function() {

		  $('#summernote').summernote();

		  

		  $(function() {    // Makes sure the code contained doesn't run until

              //     all the DOM elements have loaded



			$('#match-status').change(function(){

			    if($('#match-status option:selected').val() == 1) {

			    	$('#add-match-score').show();

			    	$('#match-submit-score').show();

			    } else {

			    	$('#add-match-score').hide();

			    	$('#match-submit-score').hide();

			    }

			});



		 });

	});

	

/*

 * INSTALLATION

 */	



//run installer

	$('#ezLeagueInstallation').submit(function(e) {

		  $('.success').css("display", "");

	      $(".success").fadeIn(1000, "linear");

	      //$('.success_text').fadeIn("fast");

	      $('.success_text').html('Installation Running...');

		var	db	 	 = $("#database").val();

			prefix 	 = $("#prefix").val();

			

		 e.preventDefault();

	 $.ajax({

	     type: "POST",

	     url: url,

	     data: { form: 'installer', db: '' + db + '', prefix: '' + prefix + '' }

	   }).success(function( msg ) {



		      setTimeout(function(){

		    	  $('.success').css('background-color', '#C2DBEF');

		    	  $('.success_text').html(msg);

		    	  $('.success_text').css('color', '#000000');

		      },3000);

	  });

	});

	

//create initial admin account

	$('#ezLeagueAdmin').submit(function(e) {

			var username    = $("#register-username").val();

				email	    = $("#register-email").val();

				password    = $("#register-password").val();

				confirm     = $("#register-confirm").val();



			 e.preventDefault();

		if(password == confirm && password != '') {

		 $.ajax({

		     type: "POST",

		     url: "submit.php",

		     data: { form: 'createAdmin', username: '' + username + '', email: '' + email + '', password: '' + password + '', confirm: '' + confirm + '' }

		   }).success(function( msg ) {

			      $('.success').css("display", "");

			      $(".success").fadeIn(1000, "linear");

			      $('.success_text').fadeIn("slow");

		 	  $('.success_text').html(msg);

		 	  //$(".login_success").fadeOut(5200, "linear");

		 	   if(msg == "<strong>Success!</strong> Account has been created. You may now login.") {

		 		  setTimeout(function(){location.reload()},3000);

		 	   }

		  });

		} else {

				$('.success').css("display", "");

		        $(".success").fadeIn(1000, "linear");

		        $('.success_text').fadeIn("slow");

		        $('.success_text').html('<strong>Error</strong> Passwords do not match');

		}

		});

	
<<<<<<< HEAD
>>>>>>> 871aac6fb2abdcb263a59c035d16f0e633ee3f31
=======
>>>>>>> 871aac6fb2abdcb263a59c035d16f0e633ee3f31
