      <!-- Navbar
      ================================================== -->
      <div class="bs-docs-section clearfix">
        <div class="row">
          <div class="col-lg-12">

              <div class="navbar navbar-inverse">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="<?php echo $site_url; ?>/"><?php echo $site_name; ?></a>
                </div>
                <div class="navbar-collapse collapse navbar-inverse-collapse">
                <?php if(isset($_SESSION['ez_game'])) { $game = $_SESSION['ez_game']; ?>
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="<?php echo $site_url; ?>/game/<?php echo $game_slug; ?>">News</a></li>
                    <li><a href="<?php echo $site_url; ?>/game/<?php echo $game_slug; ?>/leagues">Leagues</a></li>
                    <li><a href="<?php echo $site_url; ?>/game/<?php echo $game_slug; ?>/schedules">Schedules</a></li>
                    <li><a href="<?php echo $site_url; ?>/game/<?php echo $game_slug; ?>/results">Results</a></li>
                    <li><a href="<?php echo $site_url; ?>/game/<?php echo $game_slug; ?>/standings">Standings</a></li>
                    <li><a href="<?php echo $site_url; ?>/game/<?php echo $game_slug; ?>/teams">Teams</a></li>
                  </ul>

                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo $site_url; ?>/contact">Contact</a></li>
                  </ul>
                <?php } ?>
                </div>
              </div>

          </div>
        </div>
      </div>