ezLeague v1.1
"a custom php online gaming script"

(bug fixes listed at the bottom)

http://www.mdloring.com

After writing 2-3 different PHP Gaming League scripts, I've received numerous emails over the past 6months asking to offer it up for download...but it wasn't exactly user friendly. So that's what ezLeague is.

Instead of having to build in a custom templating system, the front and backend are being built on Bootstrap to make theming easier for the user.

A full-list of features is soon to come. I'm still in debate on how to combine the 3 previous scripts I've written.


News, Leagues, Matches, Teams, Users, Site Settings, Support Multiple Games

Team/Guild Challenge System for Matches
Rankings will be built on an ELO algorithm, the same ranking system used for Chess Players ...more to be listed later

Admin Panel to control and modify all Leagues, Matches, Users and Data

------------------------------------------------------------------------------------------------------------------------
BUG FIXES AND UPDATES
------------------------------------------------------------------------------------------------------------------------
v1.1
 - removed installation step #2
 - -> ./header.php, ./js/ezleague.js
 
 - fixed add news body text issue
 - -> ./admin/js/ezleague.js, ./admin/submit.php, ./index.php, ./js/ezleague.js, ./news.php
 
 - login function double-prefix bug
 - -> ./lib/ezleague.class.php
 
 - added dispute functionality
 - -> ./index.php, ./view_challenge.php
 
 - display message if no news items found
 - -> ./index.php, ./lib/ezleague.class.php
 
 - added a View Site link in the sidebar on the admin side
 - -> ./admin/sidebar.php
