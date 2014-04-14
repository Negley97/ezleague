<?php 
/*
 * ######################################################
* Author: Michael Loring
* Project: Silent App
* Began: February 1st, 2014
* Finished: Code is never done, but in a working state
* Notes: Database Connection class...
* ######################################################
*/
class DB_Class {
	
		var $link;
		
		var $host = ""; //database host
		var $username = ""; //database username
		var $password = ""; //database password
		var $database = ""; //mysql database
		var $prefix = ""; //database table prefix
		
		public function __construct() {
			global $connection;
			mb_internal_encoding( 'UTF-8' );
			mb_regex_encoding( 'UTF-8' );
			$this->link = new mysqli( $this->host, $this->username, $this->password, $this->database );
		}
		
		public function __destruct() {
			$this->disconnect();
		}
		
	function query($query) {
			$result = mysqli_query($query, $this->link) or die ("Invalid query: " . mysqli_error());
		 return $result;
	}
	
	function numRows($result) {
		$count = mysqli_num_rows($result);
		 return $count;
	}
	
	function fetch($query) {
		  $data = array();
			$result = $this->link->query($query);
				while($row = mysqli_fetch_assoc($result)) {
					$data[] = $row;
				}

		  return $data;
	}
	
	public function disconnect()
	{
		$this->link->close();
	}
	
}
?>