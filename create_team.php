<?php include('header.php'); ?>

	<div class="row">
		  
          <?php include('sidebar.php'); ?>
          <div class="col-lg-10">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="bolder">Teams</span> - <span class="italic">Create Team</span></h3>
                </div>
                <div class="panel-body">
                 <div class="row">
                  <div class="col-lg-4">
					<form role="form" name="ezLeagueCreateTeam" id="ezLeagueCreateTeam" method="POST">
			            <div class="form-group">
			              <h5>Team Name</h5>
			              <input id="team-name" class="form-control text placeholder" placeholder="Team Name" name="team-name" type="text">
			            </div>
			            <div class="form-group">
			              <h5>Team Abbreviation</h5>
			              <input id="team-abbr" class="form-control email placeholder" placeholder="Team Abbreviation" name="team-abbr" type="text">
			            </div>
			            <div class="form-group">
			              <h5>Game</h5>
			               <select name="team-game" id="team-game" class="form-control select">
			               	  <option value=""></option>
			                <?php $games = $ez->getAllGames(); ?>
			                 <?php foreach($games as $game) { ?>
			                  <option value="<?php print $game['slug']; ?>"><?php print $game['game']; ?></option>
			                 <?php } ?>
			               </select>
			            </div>
			            <div class="form-group">
			              <button class="btn btn-primary" type="submit">Create Team</button>
			            </div>
			            <div class="success">
						 <span class="success_text"></span>
						</div>
					</form>
				   </div>
				  </div>
                </div>
              </div>

          </div>
        
	</div>


<?php include('footer.php'); ?>