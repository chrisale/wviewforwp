<?php

/************ USER DEFINEABLE FUNCTIONS ************
CAREFUL what you do here, but it should be fairly self explanatory, strings are editable if you like Mostly, you'll only want to edit the first grouping of variables immediately following this message.
******************/





/************ END USER DEFINEABLE FUNCTIONS ************/



/** the "weather period" variable affects the data that is fetched from the database.  By Default (0), only 24hr data is fetched.  24hr data is *always* fetched regardless of query in order to maintain accuracy of up-to-the-minute reports.  These built-in fetches supply all data for time period, for all variables.  Since "Custom" can be any length of time, there is a hard limit of 1 query for one variable per client request on the database query (LIMIT 1).

Other possibilities are listed here:

$weatherperiod == 0 : 24hr data only, all variables
$weatherperiod == 1 : Weekly, 7 day, data + 24hr, all variables
$weatherperiod == 2 : Monthly, 30 day data + 24hr, all variables
$weatherperiod == 3 : Yearly, 265 day data + 24hr, all variables
$weatherperiod == 4 : Custom, Any period, ONE VARIABLE.

/***
First we need to define Units we want to be able to use.. each type of unit is inserted into its own array.  To add a Unit for any of the generic values simply stick it on the end of the list and increment the number then you can reference it in the case statements below.
****/

	$TempUnits[0] = '&deg;C';
	$TempUnits[1] = '&deg;F';
	$TempUnits[2] = 'K';

	$RainUnits[0] = 'mm';
	$RainUnits[1] = 'cm';
	$RainUnits[2] = 'in';

	$RainRateUnits[0] = 'mm/hr';
	$RainRateUnits[1] = 'cm/hr';
	$RainRateUnits[2] = 'in/hr';

	$WindUnits[0] = 'm/s';
	$WindUnits[1] = 'km/h';
	$WindUnits[2] = 'mph';
	$WindUnits[3] = 'ft/s';
	$WindUnits[4] = 'knots';

	$DistanceUnits[0] = 'm';
	$DistanceUnits[1] = 'miles';
	$DistanceUnits[2] = 'in';
	$DistanceUnits[3] = 'ft';
	$DistanceUnits[4] = 'nm';
	$DistanceUnits[5] = '';

	$BaromUnits[0] = 'kPa';
	$BaromUnits[1] = 'hPa';
	$BaromUnits[2] = 'mb';
	$BaromUnits[3] = 'in';

	$HumidUnits[0] = '%';
	
	$AirDensityUnit[0] = 'kg/m<sup>3</sup>';
	$AirDensityUnit[1] = 'lbs/ft<sup>3</sup>';
	
	$SolarUnit[0] = 'W/m<sup>2</sup>';
	$SolarUnit[1] = 'W/in<sup>2</sup>';
	
	$WindPowerUnit[0] = 'W/m<sup>-2</sup>';
	$WindPowerUnit[1] = 'W/in<sup>-2</sup>';
	
	$UnitsSystem[0] = 'Canada Metric';
	$UnitsSystem[1] = 'Global Metric';
	$UnitsSystem[2] = 'Nautical';
	$UnitsSystem[3] = 'US Imperial';
	$UnitsSystem[4] = 'UK Metric';

	$wviewSQLdailydata = array("OutTemp","HiOutTemp","LowOutTemp","InTemp","Barometer","OutHumid","InHumid","Rain","HiRainRate","Rain24HourlySum","Rain24HourlyTime","RainPeriodSum","WindSpeed","HiWindSpeed","WindDir","HiWindDir","Dewpoint","WindChill","HeatIndex","RecordTime");
	
	$weatherArray['SQLData'] = $wviewSQLdailydata;
	$weatherArray['SQLDataWeekly'] = $wviewSQLdailydata;
	

function dateSelector($useDate=0, $startYear, $isEnd)
{ 	
	// if date invalid or not supplied, use current time 
	
	$monthName = array(1=> "Jan",  "Feb",  "Mar", 
         "Apr",  "May",  "Jun",  "Jul",  "Aug", 
          "Sep",  "Oct",  "Nov",  "Dec"); 
          
	if($useDate == 0) {
		$useDate = Time();
	}	
	
	if($isEnd == 1) {
		$isEnd = 'END';
	}
	
	else {
	$isEnd = '';
	}
	
	// make month selector 
	//echo "<select name=\"month" . $isEnd . "\">";
	for($currentMonth = 1; $currentMonth <= 12; $currentMonth++)
	{
	//echo "<option value='";
	
	$hold = $currentMonth; //STORE THE ORIGINAL NUMBER
	if ($currentMonth < 10) { // NEED TO ADD LEADING ZEROS FOR MYSQL	
	$currentMonth = '0' . $currentMonth; //CREATE THE NEW STRING
	}
	
	//echo $currentMonth;
	
	
	//echo "'";
	$currentMonth = $hold;
	//echo ">" . $monthName[$currentMonth] . "</option>";
	}
	//echo "<option value='--' selected='selected' >--</option></select>/ ";
	
	// make day selector 
	//echo "<select name=\"day" . $isEnd . "\">\n";
	for($currentDay=1; $currentDay <= 31; $currentDay++)
	{
	$hold = $currentDay; //STORE THE ORIGINAL NUMBER
	if ($currentDay < 10) { // NEED TO ADD LEADING ZEROS FOR MYSQL	
	$currentDay = '0' . $currentDay; //CREATE THE NEW STRING
	}
	
	//echo "<option value=\"$currentDay\"";
	//echo ">$currentDay</option>";
	$currentDay = $hold;
	}
	//echo "<option value='--' selected='selected' >--</option></select> / ";
	
	// make year selector 
	//echo "<select name=\"year" . $isEnd . "\">\n";
	$currentYear = date('Y');
	for($startYear = $startYear; $startYear <= $currentYear;$startYear++) 
	{
		//echo "<option value=\"$startYear\"";
		//echo ">$startYear</option>";
	}

	//echo "<option value='--' selected='selected' >--</option></select>  @ ";
	
	// make hour selector 
	//echo "<select name=\"hour" . $isEnd . "\">\n";
	for($currentHour=0; $currentHour <= 23; $currentHour++)
	{
		$hold = $currentHour; //STORE THE ORIGINAL NUMBER
		if ($currentHour < 10) { // NEED TO ADD LEADING ZEROS FOR MYSQL	
			$currentHour = '0' . $currentHour; //CREATE THE NEW STRING
		}
		//echo "<option value=\"$currentHour\"";
		//echo ">$currentHour</option>";
		$currentHour = $hold;
	}
	
	//echo "<option value='--' selected='selected' >--</option></select>:";
	
	// make minute selector 
	//echo "<select name=\"minute" . $isEnd . "\">\n";
	for($currentMinute=0; $currentMinute <= 55; $currentMinute++)
	{
		if ($currentMinute % 5 == 0) {
			$hold = $currentMinute; //STORE THE ORIGINAL NUMBER
			if ($currentMinute < 10) { // NEED TO ADD LEADING ZEROS FOR MYSQL	
				$currentMinute = '0' . $currentMinute; //CREATE THE NEW STRING
			}
			//echo "<option value=\"$currentMinute\"";
			//echo ">$currentMinute</option>";
			$currentMinute = $hold;
		}
		
	}
	//echo "<option value='' selected='selected' >--</option></select> ";

} // END OF FUNCTION	

?>