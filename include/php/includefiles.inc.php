<?php

////////////////// Included files... lots of them /////////////////////////////
// 
//////////////////////////////////////////////////////////////////////////


include_once($weatherArray['wordpressFolder'] . 'include/php/unitConvertervars.inc.php'); 

include_once($weatherArray['wordpressFolder'] . 'include/php/SQL24hrDataProcessors.inc.php');
include_once($weatherArray['wordpressFolder'] . 'include/php/unitconverters.inc.php'); 
// holds specific functions for processing variables and doing unit conversions and extra calculated values
include_once($weatherArray['wordpressFolder'] . 'include/php/timeoffsets.inc.php'); 
// holds all time related functions dealing with differences in station, server, and database time differences and offsets.

include_once($weatherArray['wordpressFolder'] . 'include/php/warnings.inc.php'); 
// holds functions for adding CSS warnings to HTML data as well as other possible warning mechanisms.
//require($weatherArray['wordpressFolder'] . 'advertisements.inc.php'); 
// holds functions for runnings ads on the website.
include_once($weatherArray['wordpressFolder'] . 'include/php/sqlfunctions.inc.php'); 
// holds functions querying the database.
include_once($weatherArray['wordpressFolder'] . 'include/php/graphingfunctions.inc.php'); 
// holds functions for creating graphs.
include_once($weatherArray['wordpressFolder'] . 'include/php/graphdeclarations.inc.php'); 
// holds funtions to create and call all the charts and graphs
include_once($weatherArray['wordpressFolder'] . 'include/php/almanacfunctions.inc.php');
include_once($weatherArray['wordpressFolder'] . 'include/php/uservars.inc.php'); // holds common variables used all over. 
include_once($weatherArray['wordpressFolder'] . 'include/php/dbrun.inc.php'); 




?>