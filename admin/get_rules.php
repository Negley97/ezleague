<?php session_start();
include('lib/db.class.php');
include('lib/ezleague.class.php');

$ez = new ezLeague();
	if(isset($_POST['id'])) {
		$id = $_POST['id'];
			$league = $ez->getLeagueRules($id);
?>
	   <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
	        <h4 class="modal-title">Viewing League Rules - <?php print $league['league']; ?></h4>
	      </div>
	      <div class="modal-body">
	        <div class="row">
	         <div class="col-lg-12">
	       		<div id="editLeagueRules">
	       		  <div class="col-lg-6">
	       			<form id="editLeagueRules" name="editLeagueRules" method="POST">
	       			 <textarea class="ckeditor form-control" id="body" name="body"><?php print $league['rules']; ?></textarea>
	       		  </div>
	       		 </div>
	         </div>
	        </div>
	      </div>
	      <div class="modal-footer">
	      	<button type="submit" class="btn btn-primary">Edit</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	       </form>
	      </div>
	    </div>
	   </div>

		<!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>
    <script src="js/ezleague.js"></script>
    <script src="js/ckeditor/ckeditor.js"></script>
<?php
	}
?>