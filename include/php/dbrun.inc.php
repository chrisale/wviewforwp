<?php

////////////////// THIS FUNCTION RUNS ALL THE DB QUERIES AND CHECKS BASED ON THE TIME PERIOD WANTED /////////////////////////////
// 
//////////////////////////////////////////////////////////////////////////


function dbstandardrun($weatherArray) {
if ($weatherArray['weatherperiod']['Custom'] != TRUE) { //GOOD
	
	switch  ($weatherArray['weatherperiod']) { //GOOD
	
		case '1': // Weekly - will do 24hr as well
			$weatherArray = runDB24hrQuery($weatherArray);
			$weatherArray = runRain24hrQuery($weatherArray);
			//Lets Create some of the same Daily Values expressely as 24hr values regardless of stupid TimeZones
			//include($weatherArray['wordpressFolder'] . 'SQL24hrDataProcessors.inc.php'); // holds functions processing 24hr data from MySQL database
			$weatherArray = dayRain($weatherArray);
			$weatherArray = findtrend($weatherArray); 
			$weatherArray = runDB7dayQuery($weatherArray);
			$weatherArray = runRain7dayQuery($weatherArray);
		break;
	
		case '2': //Monthly - will do 24hr as well
			$weatherArray = runDB24hrQuery($weatherArray);
			$weatherArray = runRain24hrQuery($weatherArray);
			//Lets Create some of the same Daily Values expressely as 24hr values regardless of stupid TimeZones
			//include($weatherArray['wordpressFolder'] . 'SQL24hrDataProcessors.inc.php'); // holds functions processing 24hr data from MySQL database
			$weatherArray = dayRain($weatherArray);
			$weatherArray = findtrend($weatherArray); 
			$weatherArray = runDBMonthQuery($weatherArray);
			$weatherArray = runRainMonthQuery($weatherArray);
		break;
		
		case '3': //Yearly
			$weatherArray = runDBYearQuery($weatherArray);
			$weatherArray = runRainYearQuery($weatherArray);
		break;
		
		default; //Everything Else Defaults to just 24hr.
			
			$weatherArray = runDB24hrQuery($weatherArray);
			$weatherArray = runHiLo24hr($weatherArray);
			$weatherArray = runRain24hrQuery($weatherArray);
			//Lets Create some of the same Daily Values expressely as 24hr values regardless of stupid TimeZones
			//include($weatherArray['wordpressFolder'] . 'SQL24hrDataProcessors.inc.php'); // holds functions processing 24hr data from MySQL database
			$weatherArray = dayRain($weatherArray);
			$weatherArray = findtrend($weatherArray); 
			
		break;
		} //END OF SWITCH
	
	} //END OF CUSTOM IF

else { // IF WEATHERPERIOD IS NOT CUSTOM THEN DO REGULAR STUFF PLUS CUSTOM JOB

	$weatherArray = runDB24hrQuery($weatherArray);
	$weatherArray = runHiLo24hr($weatherArray);
	$weatherArray = runRain24hrQuery($weatherArray);
	//Lets Create some of the same Daily Values expressely as 24hr values regardless of stupid TimeZones
	//include($weatherArray['wordpressFolder'] . 'SQL24hrDataProcessors.inc.php'); // holds functions processing 24hr data from MySQL database
			$weatherArray = dayRain($weatherArray);
			$weatherArray = findtrend($weatherArray); 
	
	} //END OF CUSTOM ELSE

return $weatherArray;
} // END OF STANDARD DB FUNCTION


function dbextendedrun($weatherArray) {//The DB queries for extended sensor support
if ($weatherArray['weatherperiod']['Custom'] != TRUE) {
	
	switch  ($weatherArray['weatherperiod']) { 
		//running queries in sqlfunctions.php
		case '1': // Weekly - will do 24hr as well
		
			$weatherArray = runDB24hrQuery($weatherArray); 
			$weatherArray = runRain24hrQuery($weatherArray);
			$weatherArray = runET24hrQuery($weatherArray);
			
			//Lets Create some of the same Daily Values expressely as 24hr values regardless of stupid TimeZones
			//include($weatherArray['wordpressFolder'] . 'SQL24hrDataProcessors.inc.php'); // holds functions processing 24hr data from MySQL database
			$weatherArray = dayRain($weatherArray);
			$weatherArray = dayET($weatherArray);
			$weatherArray = findtrend($weatherArray); 
			$weatherArray = runDB7dayQuery($weatherArray);
			$weatherArray = runRain7dayQuery($weatherArray);
			
		break;
	
		case '2': //Monthly - will do 24hr as well
			//$weatherArray = runDB24hrQuery($weatherArray);
			//$weatherArray = runRain24hrQuery($weatherArray);
			//$weatherArray = runET24hrQuery($weatherArray);
			//$weatherArray = dayET($weatherArray);
			//Lets Create some of the same Daily Values expressely as 24hr values regardless of stupid TimeZones
			//include($weatherArray['wordpressFolder'] . 'SQL24hrDataProcessors.inc.php'); // holds functions processing 24hr data from MySQL database
			$weatherArray = dayRain($weatherArray);
			$weatherArray = findtrend($weatherArray); 
			$weatherArray = runDBMonthQuery($weatherArray);
			$weatherArray = runRainMonthQuery($weatherArray);
		break;
		
		case '3': //Yearly
			$weatherArray = runDBYearQuery($weatherArray);
			$weatherArray = runRainYearQuery($weatherArray);
		break;
		
		default: //Everything Else Defaults to just 24hr.
			
			
			$weatherArray = runDB24hrQuery($weatherArray);
			$weatherArray = runHiLo24hr($weatherArray);
			
			$weatherArray = runRain24hrQuery($weatherArray);
			
			$weatherArray = runET24hrQuery($weatherArray);
			
			$weatherArray = dayRain($weatherArray);
			
			$weatherArray = dayET($weatherArray);
			
			$weatherArray = findtrend($weatherArray);
			
			
			
			
			//Lets Create some of the same Daily Values expressely as 24hr values regardless of stupid TimeZones
			//include($weatherArray['wordpressFolder'] . 'SQL24hrDataProcessors.inc.php');
			
			// holds functions processing 24hr data from MySQL database
			 
			
			
			
		break;
	} //END OF SWITCH

} //END OF CUSTOM

else { // IF WEATHERPERIOD IS NOT CUSTOM THEM DO REGULAR STUFF PLUS CUSTOM JOB

	
	//Lets Create some of the same Daily Values expressely as 24hr values regardless of stupid TimeZones
	//include($weatherArray['wordpressFolder'] . 'SQL24hrDataProcessors.inc.php'); // holds functions processing 24hr data from MySQL database
	//		$weatherArray = dayRain($weatherArray);
	//		$weatherArray = findtrend($weatherArray); 
	
	} //END OF CUSTOM ELSE

return $weatherArray;
}//End DB EXTENDED RUN FUNCTION

?>