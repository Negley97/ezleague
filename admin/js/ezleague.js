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

/*
 * START LOGIN & REGISTRATION FUNCTIONALITY
 */
//user registration

//create admin
	$('#ezLeagueAdmin').submit(function(e) {
		var username    = $("#admin-username").val();
			email	    = $("#admin-email").val();
			password    = $("#admin-password").val();
			confirm     = $("#admin-confirm").val();

		 e.preventDefault();
	if(password == confirm && password != '') {
	 $.ajax({
	     type: "POST",
	     url: "submit.php",
	     data: { form: 'create-admin', username: '' + username + '', email: '' + email + '', password: '' + password + '', confirm: '' + confirm + '' }
	   }).success(function( msg ) {
		      $('.success').css("display", "");
		      $(".success").fadeIn(1000, "linear");
		      $('.success_text').fadeIn("slow");
		      $('.success_text').html(msg);
	 	   if(msg == "<strong>Success!</strong> Account has been created. You may now login.") {
	 		  setTimeout(function(){window.location='index.php'},3000);
	 	   }
	  });
	} else {
			$('.success').css("display", "");
	        $(".success").fadeIn(1000, "linear");
	        $('.success_text').fadeIn("slow");
	        $('.success_text').html('<strong>Error</strong> Passwords do not match');
	}
	});
	
//login to ezLeague	
	$('#ezLeagueLogin').submit(function(e) {
		var username	= $("#username").val();
			password    = $("#password").val();
			
		 e.preventDefault();
	 $.ajax({
	     type: "POST",
	     url: "submit.php",
	     data: "form=login&username=" + username + "&password=" + password
	   }).success(function( msg ) {
		      $('.login_success').css("display", "");
		      $(".login_success").fadeIn(1000, "linear");
		      $('.login_success_text').fadeIn("slow");
		      $('.login_success_text').html(msg);
		      setTimeout(function(){location.reload()},3000);
	  });
	});

//create new user	
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
		      $('.success').css("display", "");
		      $(".success").fadeIn(1000, "linear");
		      $('.success_text').fadeIn("slow");
		      $('.success_text').html(msg);
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
	
/*
 * END LOGIN & REGISTRATION FUNCTIONALITY
 */	
	
/*
 * START NEWS FUNCTIONALITY
 */	
//add news post	
	$('#addNews').submit(function(e) {
		var title		= $("#title").val();
			body		= $("textarea#body").val();
			author		= $("#author").val();
			game		= $("input[name=game]:checked").val();
			 //if the game hasnt been selected, set all as the default
			 if(game == undefined) {
				 game = 'all';
			 }
			category	= '';
			
			//loop through the category checkbox to get the checked values
			$('input:checkbox[name=category]').each(function() {    
			    if($(this).is(':checked'))
			      category += $(this).val() + ',';
			});
			//remove the comma from the end of the string
			category = category.slice(0, -1);

		e.preventDefault();
		 $.ajax({
		     type: "POST",
		     async: true,
		     url: "submit.php",
		     data: { form: 'addNews', title: '' + title + '', body: '' + body + '', author: '' + author + '', category: '' + category + '', game: '' + game + '', published: '1' }
		   }).success(function( msg ) {
			   	  $('.success').css("display", "");
			      $(".success").fadeIn(1000, "linear");
			      $('.success_text').fadeIn("slow");
			      $('.success_text').html(msg);
			      setTimeout(function(){location.reload()},3000);
		  });
	
	});
	
//edit news post	
	$('#editNews').submit(function(e) {
		var id			= $("#news_id").val();
			title		= $("#title").val();
			body		= $("textarea#body").val();
			author		= $("#author").val();
			game		= $("input[name=game]:checked").val();
			 //if the game hasnt been selected, set all as the default
			 if(game == undefined) {
				 game = 'all';
			 }
			category	= '';
			
			//loop through the category checkbox to get the checked values
			$('input:checkbox[name=category]').each(function() {    
			    if($(this).is(':checked'))
			      category += $(this).val() + ',';
			});
			//remove the comma from the end of the string
			category = category.slice(0, -1);

		e.preventDefault();
		 $.ajax({
		     type: "POST",
		     async: true,
		     url: "submit.php",
		     data: { form: 'editNews', id: '' + id + '', title: '' + title + '', body: '' + body + '', author: '' + author + '', category: '' + category + '', game: '' + game + '', published: '1' }
		   }).success(function( msg ) {
			   	  $('.success').css("display", "");
			      $(".success").fadeIn(1000, "linear");
			      $('.success_text').fadeIn("slow");
			      $('.success_text').html(msg);
			      setTimeout(function(){location.reload()},3000);
		  });
	
	});
	
//save draft news post	
	function saveNewsDraft() {
		var title		= $("#title").val();
			body		= $("textarea#body").val();
			author		= $("#author").val();
			game		= $("input[name=game]:checked").val();
			 //if the game hasnt been selected, set all as the default
			 if(game == undefined) {
				 game = 'all';
			 }
			category	= '';
			
			//loop through the category checkbox to get the checked values
			$('input:checkbox[name=category]').each(function() {    
			    if($(this).is(':checked'))
			      category += $(this).val() + ',';
			});
			//remove the comma from the end of the string
			category = category.slice(0, -1);

			$.ajax({
			     type: "POST",
			     async: true,
			     url: "submit.php",
			     data: { form: 'addNews', title: '' + title + '', body: '' + body + '', author: '' + author + '', category: '' + category + '', game: '' + game + '', published: '0' }
			   }).success(function( msg ) {
				   	  $('.success').css("display", "");
				      $(".success").fadeIn(1000, "linear");
				      $('.success_text').fadeIn("slow");
				      $('.success_text').html(msg);
				      setTimeout(function(){window.location='news_view.php'},3000);
			  });
	
	} 
	
//save draft edit news post	
	function saveEditNewsDraft() {
		var id			= $("#news_id").val();
			title		= $("#title").val();
			body		= $("textarea#body").val();
			author		= $("#author").val();
			game		= $("input[name=game]:checked").val();
			 //if the game hasnt been selected, set all as the default
			 if(game == undefined) {
				 game = 'all';
			 }
			category	= '';
			
			//loop through the category checkbox to get the checked values
			$('input:checkbox[name=category]').each(function() {    
			    if($(this).is(':checked'))
			      category += $(this).val() + ',';
			});
			//remove the comma from the end of the string
			category = category.slice(0, -1);

			$.ajax({
			     type: "POST",
			     async: true,
			     url: "submit.php",
			     data: { form: 'editNews', id: '' + id + '', title: '' + title + '', body: '' + body + '', author: '' + author + '', category: '' + category + '', game: '' + game + '', published: '0' }
			   }).success(function( msg ) {
				   	  $('.success').css("display", "");
				      $(".success").fadeIn(1000, "linear");
				      $('.success_text').fadeIn("slow");
				      $('.success_text').html(msg);
				      setTimeout(function(){window.location='news_view.php'},3000);
			  });
	
	} 
	
//unpublish news post
	function unpublishPost(news_id) {
		$.ajax({
		     type: "POST",
		     async: false,
		     url: "submit.php",
		     data: { form: 'unpublishPost', id: '' + news_id + '' }
		   }).success(function( msg ) {
			   	  $('.success').css("display", "");
			      $(".success").fadeIn(1000, "linear");
			      $('.success_text').fadeIn("slow");
			      $('.success_text').html(msg);
			      setTimeout(function(){location.reload()},3000);
		  });
	}
	
	
//add news category	
	$('#addNewsCategory').submit(function(e) {
		var category	= $("#category").val();
		
		e.preventDefault();
		 $.ajax({
		     type: "POST",
		     async: false,
		     url: "submit.php",
		     data: "form=addNewsCategory&category=" + category
		   }).success(function( msg ) {
			   	  $('.success').css("display", "");
			      $(".success").fadeIn(1000, "linear");
			      $('.success_text').fadeIn("slow");
			      $('.success_text').html(msg);
			      setTimeout(function(){location.reload()},3000);
		  });
	
	});

//delete news category	
	function deleteCategory(category_id) {
		$.ajax({
		     type: "POST",
		     async: false,
		     url: "submit.php",
		     data: "form=deleteNewsCategory&id=" + category_id
		   }).success(function( msg ) {
			   	  $('.success').css("display", "");
			      $(".success").fadeIn(1000, "linear");
			      $('.success_text').fadeIn("slow");
			      $('.success_text').html(msg);
			      setTimeout(function(){location.reload()},3000);
		  });
	}

/*
 * END NEWS FUNCTIONALITY
 */	
	
/*
 * START LEAGUE FUNCTIONS
 */
//add new league	
	$('#addNewLeague').submit(function(e) {
		var league		= $("#league").val();
			game 		= $("#game").val();
			teams 		= $("#maxTeams").val();
			start		= $("#league-start-date").val();
			end			= $("#league-end-date").val();
			games		= $("#total-games").val();
		
		e.preventDefault();
		 $.ajax({
		     type: "POST",
		     async: false,
		     url: "submit.php",
		     data: "form=addNewLeague&league=" + league + "&game=" + game + "&teams=" + teams + "&start=" + start + "&end=" + end + "&games=" + games
		   }).success(function( msg ) {
			   	  $('.success').css("display", "");
			      $(".success").fadeIn(1000, "linear");
			      $('.success_text').fadeIn("slow");
			      $('.success_text').html(msg);
			      setTimeout(function(){location.reload()},3000);
		  });
	
	});
	
//delete league
	function deleteLeague(league_id) {
		$.ajax({
		     type: "POST",
		     async: false,
		     url: "submit.php",
		     data: "form=deleteLeague&id=" + league_id
		   }).success(function( msg ) {
			   	  $('.success').css("display", "");
			      $(".success").fadeIn(1000, "linear");
			      $('.success_text').fadeIn("slow");
			      $('.success_text').html(msg);
			      setTimeout(function(){location.reload()},3000);
		  });
	}

/*
 * END LEAGUE FUNCTIONALITY
 */	
	
/*
 * START SETTINGS FUNCTIONALITY
 */	
//add new game (settings page)
	$('#addSettingsGame').submit(function(e) {
		var game		= $("#game").val();
		
		e.preventDefault();
		 $.ajax({
		     type: "POST",
		     async: false,
		     url: "submit.php",
		     data: "form=addNewGame&game=" + game
		   }).success(function( msg ) {
			   	  $('.success').css("display", "");
			      $(".success").fadeIn(1000, "linear");
			      $('.success_text').fadeIn("slow");
			      $('.success_text').html(msg);
			      setTimeout(function(){location.reload()},3000);
		  });
	
	});
	
//delete game
	function deleteGame(game_id) {
		$.ajax({
		     type: "POST",
		     async: false,
		     url: "submit.php",
		     data: "form=deleteGame&id=" + game_id
		   }).success(function( msg ) {
			   	  $('.success').css("display", "");
			      $(".success").fadeIn(1000, "linear");
			      $('.success_text').fadeIn("slow");
			      $('.success_text').html(msg);
			      setTimeout(function(){location.reload()},3000);
		  });
	}

//site name
	$('#siteSettingsName').submit(function(e) {
		var name		= $("#name").val();
		
		e.preventDefault();
		 $.ajax({
		     type: "POST",
		     async: false,
		     url: "submit.php",
		     data: "form=siteSettingsName&name=" + name
		   }).success(function( msg ) {
			   	  $('.success').css("display", "");
			      $(".success").fadeIn(1000, "linear");
			      $('.success_text').fadeIn("slow");
			      $('.success_text').html(msg);
			      setTimeout(function(){location.reload()},3000);
		  });
	
	});
	
//site url
	$('#siteSettingsURL').submit(function(e) {
		var url			= $("#url").val();
		
		e.preventDefault();
		 $.ajax({
		     type: "POST",
		     async: false,
		     url: "submit.php",
		     data: "form=siteSettingsURL&url=" + url
		   }).success(function( msg ) {
			   	  $('.success').css("display", "");
			      $(".success").fadeIn(1000, "linear");
			      $('.success_text').fadeIn("slow");
			      $('.success_text').html(msg);
			      setTimeout(function(){location.reload()},3000);
		  });
	
	});
	
//edit match score & status
	$('#editMatchDetails').submit(function(e) {
		var match_id			= $("#matchId").val();
			challenger_score	= $("#challengerScore").val();
			challenger_status   = $("#challengerStatus").val();
			challengee_score	= $("#challengeeScore").val();
			challengee_status	= $("#challengeeStatus").val();
		
		e.preventDefault();
		 $.ajax({
		     type: "POST",
		     async: false,
		     url: "submit.php",
		     data: { form: 'editMatch', match_id: '' + match_id + '', challenger_score: '' + challenger_score + '', challenger_status: '' + challenger_status + '', challengee_score: '' + challengee_score + '', challengee_status: '' + challengee_status + '' }
		   }).success(function( msg ) {
			   	  $('.success').css("display", "");
			      $(".success").fadeIn(1000, "linear");
			      $('.success_text').fadeIn("slow");
			      $('.success_text').html(msg);
			      setTimeout(function(){location.reload()},3000);
		  });
	
	});
	
//close dispute
	function updateDispute(challenge_id, status) {
		$.ajax({
		     type: "POST",
		     async: false,
		     url: "submit.php",
		     data: "form=updateDispute&id=" + challenge_id + "&status=" + status
		   }).success(function( msg ) {
			   	  $('.success').css("display", "");
			      $(".success").fadeIn(1000, "linear");
			      $('.success_text').fadeIn("slow");
			      $('.success_text').html(msg);
			      setTimeout(function(){window.location='matches_disputes.php'},3000);
		  });
	}
	
//get user
	function getUser(id) {
		$.ajax({
		     type: "POST",
		     async: false,
		     url: "user_get.php",
		     data: "id=" + id
		   }).success(function( msg ) {
			   $('#editUserModal').html(msg);
		  });
	}
	
//toggle suspend user account
	function toggleSuspendUser(id, status) {
		$.ajax({
		     type: "POST",
		     async: false,
		     url: "submit.php",
		     data: "form=suspendUser&id=" + id + "&status=" + status
		   }).success(function( msg ) {
			      $('.success').css("display", "");
			      $(".success").fadeIn(1000, "linear");
			      $('.success_text').fadeIn("slow");
			      $('.success_text').html(msg);
			      setTimeout(function(){window.location='user_all.php'},3000);
		  });
	}

//toggle user role
	function toggleRoleUser(id, role) {
		$.ajax({
		     type: "POST",
		     async: false,
		     url: "submit.php",
		     data: "form=toggleRoleUser&id=" + id + "&role=" + role
		   }).success(function( msg ) {
			      $('.success').css("display", "");
			      $(".success").fadeIn(1000, "linear");
			      $('.success_text').fadeIn("slow");
			      $('.success_text').html(msg);
			      setTimeout(function(){window.location='user_all.php'},3000);
		  });
	}

//delete account	
	function deleteUser(id) {
		$.ajax({
		     type: "POST",
		     async: false,
		     url: "submit.php",
		     data: "form=deleteUser&id=" + id
		   }).success(function( msg ) {
			      $('.success').css("display", "");
			      $(".success").fadeIn(1000, "linear");
			      $('.success_text').fadeIn("slow");
			      $('.success_text').html(msg);
			      setTimeout(function(){window.location='user_all.php'},3000);
		  });
	}
	
/*
 * END SETTINGS FUNCTIONALITY
 */	
	function checkboxToggle(checkbox, amount) {
	  if(document.getElementById(checkbox).checked) {
	     document.getElementById('' + amount + '').disabled=false;
	     $('#' + amount).removeClass("disabled");
	  } else {
		  document.getElementById('' + amount + '').disabled=true;
		  $('#' + amount).addClass("disabled");
	  }
	}
	
	function getRules(id) {
		$.ajax({
		     type: "POST",
		     url: "get_rules.php",
		     data: "id=" + id
		   }).success(function( msg ) {
		 	  $('#viewRulesModal').html(msg);
		  });
    }
	
	
	 $(function() {
	  $( "#league-start-date" ).datepicker();
		 $( "#league-start-date" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	 });
	 
	 $(function() {
	  $( "#league-end-date" ).datepicker();
		 $( "#league-end-date" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	 });
	 /*
	 $(function() {
		  $( "#match-date" ).datepicker();
			 $( "#match-date" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
		 });
	*/