<?php

////////////////// Database Settings Go Here /////////////////////////////
// Change these settings for database
//////////////////////////////////////////////////////////////////////////

	define("DBCONNECT_USER", "chrisale_remote");				// <-- mysql db user 
	define("DBCONNECT_PW", "6l3m6ny");				// <-- mysql db password 
	define("DBCONNECT_DBASE_NAME", "chrisale_wviewDBSim");		// <-- mysql db name
	define("DBCONNECT_HOST", "localhost");				// <-- mysql server host


mysql_connect(DBCONNECT_HOST,DBCONNECT_USER,DBCONNECT_PW) or
   die("Could not connect: " . mysql_error());
mysql_select_db(DBCONNECT_DBASE_NAME);
   
?>