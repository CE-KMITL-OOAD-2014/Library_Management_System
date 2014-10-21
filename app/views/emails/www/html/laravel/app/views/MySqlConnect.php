<?php

class MySqlConn {

	protected $conn;

	public function connect() {
    	$conn = new mysqli("localhost","root","web","mydatabase");
    	return $conn;
 	}

	public function getSql($conn='', $sql='') {
    	$query = $conn->query($sql);
    	$rows = array();

    	while ($row = $query->fetch_array()) {        
       		$rows[] = $row;
   		}
    return $rows;
	}
}

?>