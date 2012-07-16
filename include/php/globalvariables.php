<?php $firstwviewdata = '20051101000000';
$wanttime = 1;
$startYear = 2005;
putenv("TZ=America/Vancouver");
date_default_timezone_set('America/Vancouver');
$TempUnit = '&deg;C';
$HumidUnit = '%';
$RainUnit = 'mm';
$RainRateUnit = 'mm/hr';
$WindSpeedUnit = 'km/hr';
$BaromUnit = 'kPa';
$WindDirUnit = '&deg;';
$max = 'MAX';
$min = 'MIN';
$ave = 'AVE';
$latestentry = "SELECT DATE_FORMAT(MAX(".$weatherArray[archiveTableArray]['dateTime']."),'%b %D %Y at %H:%i') from archive;";
$selector = array(RecordTime => RecordTime, OutTemp => OutTemp, HiOutTemp => HiOutTemp, LowOutTemp => LowOutTemp, InTemp => InTemp, Barometer => Barometer, OutHumid => OutHumid, InHumid => InHumid, Rain => Rain, HiRainRate => HiRainRate, WindSpeed => WindSpeed, HiWindSpeed => HiWindSpeed, WindDir => WindDir, HiWindDir => HiWindDir, Dewpoint => Dewpoint, WindChill => WindChill, HeatIndex => HeatIndex);

//-------------------UNIT FUNCTIONS------------------------------------//


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

$DistanceUnits[0] = 'km';
$DistanceUnits[1] = 'm';
$DistanceUnits[2] = 'in';
$DistanceUnits[3] = 'ft';
$DistanceUnits[4] = 'US miles';
$DistanceUnits[5] = 'nautical miles';

$BaromUnits[0] = 'kPa';
$BaromUnits[1] = 'hPa';
$BaromUnits[2] = 'mb';
$BaromUnits[3] = 'in';

$HumidUnits[0] = '%';

$SolarUnit[0] = 'W/m<sup>2</sup>';
$SolarUnit[1] = 'W/f<sup>2</sup>';

$UnitSystem[0] = 'Canada Metric';
$UnitSystem[1] = 'Global Metric';
$UnitSystem[2] = 'Nautical';
$UnitSystem[3] = 'US Imperial';
$UnitSystem[4] = 'UK Metric';




// We'll set the default parameters for Unit Systems if no cookies are set

if (isset($_COOKIE['DefaultUnitSystem'])) { //Checking for a Default Unit System cookie

	if (isset($_COOKIE['CurrentUnitSystem'])) { //Checks if user has set a temporary/session unit system... if no cookie found, set it to default
		$CurrentUnitSystem = $_COOKIE['CurrentUnitSystem'];
		}
	else {
	$CurrentUnitSystem = $_COOKIE['DefaultUnitSystem'];
	setcookie('CurrentUnitSystem', $CurrentUnitSystem, time()+60*60, '/', '.alberniweather.ca');
	}
}
else { //If no Default Unit cookie is found, then act as if it is client/users "first time"
	
	$Units[Sys] = $UnitSystem[0]; // This sets the overall brand new client/user system default, or if cookies are disabled
	
	if (isset($_POST['rememberunits'])) { //checks to see if user is setting Units to be remembered
	$DefaultUnitSystem = $Units[Sys];
	$CurrentUnitSystem = $DefaultUnitSystem;
	setcookie('DefaultUnitSystem', $CurrentUnitSystem, time()+60*60*24*365, '/', '.alberniweather.ca');
	setcookie('CurrentUnitSystem', $CurrentUnitSystem, time()+60*60, '/', '.alberniweather.ca');
	}
	else { //Otherwise, user has not set to save cookies, so will create cookie that expire when browser closed
	$DefaultUnitSystem = $Units[Sys];
	$CurrentUnitSystem = $DefaultUnitSystem;
	setcookie('DefaultUnitSystem', $CurrentUnitSystem, false, '/', '.alberniweather.ca');
	setcookie('CurrentUnitSystem', $CurrentUnitSystem, false, '/', '.alberniweather.ca');
	}
}

function unitGrabber($wantedvalue, $CurrentSys) {
		
		switch ($CurrentSys) {
		case $UnitSystem[1]: //Defining Global Metric System Units
		$Units[Sys] = $UnitSystem[1]; 
		$Units[Temp] = $TempUnits[0];
		$Units[Humid] = $HumidUnits[0];
		$Units[Rain] = $RainUnits[1];
		$Units[RainRate] = $RainRateUnits[1];
		$Units[Wind] = $WindUnits[0];
		$Units[Distance] = $DistanceUnits[0];
		$Units[Barom] = $BaromUnits[1];
		break;
		case $UnitSystem[2]: //Defining Nautical System Units
		$Units[Sys] = $UnitSystem[2]; 
		$Units[Temp] = $TempUnits[0];
		$Units[Humid] = $HumidUnits[0];
		$Units[Rain] = $RainUnits[0];
		$Units[RainRate] = $RainRateUnits[0];
		$Units[Wind] = $WindUnits[4];
		$Units[Distance] = $DistanceUnits[5];
		$Units[Barom] = $BaromUnits[2];
			break;
		case $UnitSystem[3]: //Defining US Imperial System Units
		$Units[Sys] = $UnitSystem[3]; 
		$Units[Temp] = $TempUnits[2];
		$Units[Humid] = $HumidUnits[0];
		$Units[Rain] = $RainUnits[2];
		$Units[RainRate] = $RainRateUnits[2];
		$Units[Wind] = $WindUnits[2];
		$Units[Distance] = $DistanceUnits[4];
		$Units[Barom] = $BaromUnits[3];
			break;
		case $UnitSystem[4]: //Defining UK Metric System Units
		$Units[Sys] = $UnitSystem[4]; 
		$Units[Temp] = $TempUnits[0];
		$Units[Humid] = $HumidUnits[0];
		$Units[Rain] = $RainUnits[0];
		$Units[RainRate] = $RainRateUnits[0];
		$Units[Wind] = $WindUnits[2];
		$Units[Distance] = $DistanceUnits[0];
		$Units[Barom] = $BaromUnits[2];
			break;
		case '*': //If UnitSystem[0] is selected, or any erroneous selection, will define Canadian Metric
		$Units[Sys] = $UnitSystem[0]; 
		$Units[Temp] = $TempUnits[0];
		$Units[Humid] = $HumidUnits[0];
		$Units[Rain] = $RainUnits[0];
		$Units[RainRate] = $RainRateUnits[0];
		$Units[Wind] = $WindUnits[1];
		$Units[Distance] = $DistanceUnits[0];
		$Units[Barom] = $BaromUnits[0];
		$Units[Solar] = $SolarUnit[0];
			break;
		
		$CurrentUnitArray = array(Sys => $Units[Sys], Temp => $Units[Temp], Humid => $Units[Humid], Rain => $Units[Rain], RainRate => $Units[RainRate],  Wind => $Units[Wind], Distance => $Units[Distance], Barom => $Units[Barom], Solar => $Units[Solar]);
		//echo 'test';
		return $CurrentUnitArray[$wantevalue];
		}
}
//-------------------TIME FUNCTIONS------------------------------------//

function fetchTime($sql)
//Fetches Tabular Data from the Database using the SQL statement selected passed //to do all mathematical calculations
{
	//Run the SQL statement and return a result
	
	$sqlresult = mysql_query($sql) or die(mysql_error()); 
	//Insert the Row into an Array with each field as a value
	$row = mysql_fetch_row($sqlresult) or die(mysql_error()); 
	if ($row[0] != NULL) {
	$dataoutput = $row[0];
	}
	else {
	$dataoutput = NULL;
	}
	return $dataoutput;
	//Return the output wherever it is called.
	
}

//-------------------CREATING DATE FORM FIELDS FUNCTION------------------------//

function dateSelector($useDate=0, $startYear, $isEnd)
{ 	
	/* if date invalid or not supplied, use current time */
	
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
	
	/* make month selector */
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
	
	/* make day selector */
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
	
	/* make year selector */
	//echo "<select name=\"year" . $isEnd . "\">\n";
	$currentYear = date('Y');
	for($startYear = $startYear; $startYear <= $currentYear;$startYear++) 
	{
		//echo "<option value=\"$startYear\"";
		//echo ">$startYear</option>";
	}

	//echo "<option value='--' selected='selected' >--</option></select>  @ ";
	
	/* make hour selector */
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
	
	/* make minute selector */
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