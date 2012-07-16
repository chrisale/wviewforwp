<?php

////////////////// Database Settings Go Here /////////////////////////////
// Change these settings for database
//////////////////////////////////////////////////////////////////////////
	
	define("DBCONNECT_USER", $mysqluser);				// <-- mysql db user 
	define("DBCONNECT_PW", $mysqlpass);				// <-- mysql db password 
	define("DBCONNECT_DBASE_NAME", $mysqldbname);		// <-- mysql db name
	define("DBCONNECT_HOST", $mysqlhost);				// <-- mysql server host
	$newdb = new wpdb(DBCONNECT_USER, DBCONNECT_PW, DBCONNECT_DBASE_NAME, DBCONNECT_HOST);
	$newdb->show_errors();

	


?>