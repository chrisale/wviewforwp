<?php

//-------------------DATABASE ACCESS FUNCTIONS-------------------------------------------//
function connecttoDB() {
mysql_connect(DBCONNECT_HOST,DBCONNECT_USER,DBCONNECT_PW) or
   die("Could not connect: " . mysql_error());
mysql_select_db(DBCONNECT_DBASE_NAME);
}


function dayRain($weatherArray){
	
putenv("TZ=".$weatherArray['timeOffsetSymbol']."");
$starttime = strtotime("midnight");
$endtime = time();
	$sql = "SELECT SUM(".$weatherArray['archiveTableArray']['rain'].") from " . $weatherArray['dbtableName'] . " WHERE ". $weatherArray['archiveTableArray']['dateTime'] ." BETWEEN " . $starttime . " AND " . $endtime;
	//echo $sql;
	$result = mysql_query($sql);
	$i = 0;
	while ($row = mysql_fetch_array($result)) {
				$weatherArray['SQLData']['RainPeriodSum'] = InchtoMM($row[0]);
				$i++;
			}
		
	return $weatherArray;
}

function dayET($weatherArray){
	
connecttoDB();
putenv("TZ=".$weatherArray['timeOffsetSymbol']."");
$starttime = strtotime("midnight");
$endtime = time();
	$sql = "SELECT SUM(" . $weatherArray['archiveTableArray']['ET'] . ") from " . $weatherArray['dbtableName'] . " WHERE ".$weatherArray['archiveTableArray']['dateTime']." BETWEEN " . $starttime . " AND " . $endtime;
	$result = mysql_query($sql);
	$i = 0;
	while ($row = mysql_fetch_array($result)) {
				$weatherArray['SQLData']['ETPeriodSum'] = 0 - InchtoMM($row[0]);
				$i++;
			}
		
	return $weatherArray;
}



function runRain24hrQuery($weatherArray){
	connecttoDB();
putenv("TZ=".$weatherArray['timeOffsetSymbol']."");
$starttime = strtotime("-1 day");
$endtime = time();
	$sql = "SELECT SUM(" . $weatherArray['archiveTableArray']['rain'] . "), FROM_UNIXTIME(".$weatherArray['archiveTableArray']['dateTime'].",'%H')HOUR, ".$weatherArray['archiveTableArray']['dateTime']." from " . $weatherArray['dbtableName'] . " WHERE ".$weatherArray['archiveTableArray']['dateTime']." BETWEEN " . $starttime . " AND " . $endtime . " GROUP BY HOUR ORDER BY ".$weatherArray['archiveTableArray']['dateTime']." ASC;";
	//echo $sql;
	$result = mysql_query($sql);
	$i = 0;
	while ($row = mysql_fetch_array($result)) {
				$weatherArray['SQLData']['Rain24HourlySum'][$i] = InchtoMM($row[0]);
				$weatherArray['SQLData']['Rain24HourlyTime'][$i] = $row[1];
				$weatherArray['SQLData']['Rain24HourlyUnixTime'][$i] = $row[2];
	//			echo ','.$i.',';
		//		echo $weatherArray['SQLData']['Rain24HourlySum'][$i];
				
				$i++;
			}
	return $weatherArray;
}

function runHiLo24hr($weatherArray){
	putenv("TZ=".$weatherArray['timeOffsetSymbol']."");
	$starttime = strtotime("-24 hour");
	$endtime = time();
	connecttoDB();
	
	$sql = "SELECT ROUND((high * 1.609344), 1), whenHigh, FROM_UNIXTIME(timeHigh" . $weatherArray['timeOffsetSign'] . $weatherArray['timeServerOffsetUnixNum'] . ",'%H:%i') FROM windGust WHERE high = (
SELECT max(high) FROM windGust WHERE dateTime BETWEEN " . $starttime . " AND " . $endtime . ") AND dateTime BETWEEN " . $starttime . " AND " . $endtime . ";";

	//echo $sql;
	$result = mysql_query($sql);
	$i = 0;
	while ($row = mysql_fetch_array($result)) {
				$weatherArray['hiWindSpeed'] = $row[0];
				$weatherArray['dayhighwinddir'] = $row[1];
				$weatherArray['hiWindSpeedTime'] = $row[2];
				$i++;
			}
			
			
//Currently omitting hail, hailrate and noaaHistory from this array as they are empty.

$hiloarraynames = array('baromPressure' => 'baromPressure','dewPoint' => 'dewPoint','ET' => 'ET','heatIndex' => 'heatIndex','inHumidity' => 'inHumidity','outHumidity' => 'outHumidity','inTemp' => 'inTemp','outTemp' => 'outTemp','rain' => 'rain','rainRate' => 'rainRate', 'solarRadiation' => 'solarRadiation','UV' => 'UV','windChill' => 'windChill');

foreach ($hiloarraynames as $key => $value) {


		switch  ($value) { 
			case 'baromPressure':
					$varname = 'hiBarometer';
					$varnametime = 'hiBarometerTime';
					$sqlfunc = 'ROUND((high * 33.8637526),2)';
			break;
			
			case 'outTemp':
					$varname = 'hiOutsideTemp';
					$varnametime = 'hiOutsideTempTime';
					$sqlfunc = 'ROUND((0.55555*(high-32)),2)';
			break;
			case 'dewPoint':
					$varname = 'hiDewpoint';
					$varnametime = 'hiDewpointTime';
					$sqlfunc = 'ROUND((0.55555*(high-32)),2)';
			break;
			case 'ET':
					$varname = 'hiET';
					$varnametime = 'hiETTime';
					$sqlfunc = 'high';
			break;
			case 'heatIndex':
					$varname = 'hiHeatindex';
					$varnametime = 'hiHeatindexTime';
					$sqlfunc = 'ROUND((0.55555*(high-32)),2)';
			break;
			case 'inHumidity':
					$varname = 'hiInHumidity';
					$varnametime = 'hiInHumidityTime';
					$sqlfunc = 'high';
			break;
			case 'outHumidity':
					$varname = 'hiHumidity';
					$varnametime = 'hiHumTime';
					$sqlfunc = 'high';
			break;
			case 'inTemp':
					$varname = 'hiInTemp';
					$varnametime = 'hiInTempTime';
					$sqlfunc = 'ROUND((0.55555*(high-32)),2)';
			break;
			case 'rain':
					$varname = 'hiRain';
					$varnametime = 'hiRainTime';
					$sqlfunc = 'high';
			break;
			/*case 'rainRate':
				$varname = 'hiRainRate';
				$varnametime = 'hiRainRateTime';
				$sqlfunc = 'high';
			break;*/
			case 'solarRadiation':
					$varname = 'hiRadiation';
					$varnametime = 'hiRadiationTime';
			break;
			case 'UV':
					$varname = 'hiUV';
					$varnametime = 'hiUVTime';
					$sqlfunc = 'high';
			break;
			case 'windChill':
					$varname = 'hiWindchill';
					$varnametime = 'hiWindchillTime';
					$sqlfunc = 'ROUND((0.55555*(high-32)),2)';
			break;
		}
		
	$sql = "SELECT " . $sqlfunc . ", FROM_UNIXTIME(timeHigh" . $weatherArray['timeOffsetSign'] . $weatherArray['timeServerOffsetUnixNum'] . ",'%H:%i') FROM " . $value . " WHERE high = (SELECT max(high) FROM " . $value . " WHERE dateTime BETWEEN " . $starttime . " AND " . $endtime . ") AND dateTime BETWEEN " . $starttime . " AND " . $endtime . ";";
	
	//echo $sql;
	//echo '--';
	$result = mysql_query($sql);
	$i = 0;
	while ($row = mysql_fetch_array($result)) {
				$weatherArray[$varname] = $row[0];
				$weatherArray[$varnametime] = $row[1];
				$i++;
			}
	}
	

foreach ($hiloarraynames as $key => $value) {

	

	switch  ($value) { 
		case 'baromPressure':
				$varname = 'lowBarometer';
				$varnametime = 'lowBarometerTime';
				$sqlfunc = 'ROUND((low * 33.8637526),2)';
		break;
		
		case 'outTemp':
				$varname = 'lowOutsideTemp';
				$varnametime = 'lowOutsideTempTime';
				$sqlfunc = 'ROUND((0.55555*(low-32)),2)';
		break;
		case 'dewPoint':
				$varname = 'lowDewpoint';
				$varnametime = 'lowDewpointTime';
				$sqlfunc = 'ROUND((0.55555*(low-32)),2)';
		break;
		case 'ET':
				$varname = 'lowET';
				$varnametime = 'lowETTime';
				$sqlfunc = 'low';
		break;
		case 'heatIndex':
				$varname = 'lowHeatindex';
				$varnametime = 'lowHeatindexTime';
				$sqlfunc = 'ROUND((0.55555*(low-32)),2)';
		break;
		case 'inHumidity':
				$varname = 'lowInHumidity';
				$varnametime = 'lowInHumidityTime';
				$sqlfunc = 'low';
		break;
		case 'outHumidity':
				$varname = 'lowHumidity';
				$varnametime = 'lowHumTime';
				$sqlfunc = 'low';
		break;
		case 'inTemp':
				$varname = 'lowInTemp';
				$varnametime = 'lowInTempTime';
				$sqlfunc = 'ROUND((0.55555*(low-32)),2)';
		break;
		case 'rain':
				$varname = 'lowRain';
				$varnametime = 'lowRainTime';
				$sqlfunc = 'low';
		break;
		/*case 'rainRate':
				$varname = 'lowRainRate';
				$varnametime = 'lowRainRateTime';
				$sqlfunc = 'low';
		break;*/
		case 'solarRadiation':
				$varname = 'lowRadiation';
				$varnametime = 'lowRadiationTime';
				$sqlfunc = 'low';
		break;
		case 'UV':
				$varname = 'lowUV';
				$varnametime = 'lowUVTime';
				$sqlfunc = 'low';
		break;
		case 'windChill':
				$varname = 'lowWindchill';
				$varnametime = 'lowWindchillTime';
				$sqlfunc = 'ROUND((0.55555*(low-32)),2)';
		break;
	}
$sql = "SELECT " . $sqlfunc . ", FROM_UNIXTIME(timeLow" . $weatherArray['timeOffsetSign'] . $weatherArray['timeServerOffsetUnixNum'] . ",'%H:%i') FROM " . $value . " WHERE low = (
SELECT min(low) FROM " . $value . " WHERE dateTime BETWEEN " . $starttime . " AND " . $endtime . ") AND dateTime BETWEEN " . $starttime . " AND " . $endtime . ";";


$result = mysql_query($sql);
	$i = 0;
	while ($row = mysql_fetch_array($result)) {
				$weatherArray[$varname] = $row[0];
				$weatherArray[$varnametime] = $row[1];
				$i++;
			}
}

return $weatherArray;
}

function runET24hrQuery($weatherArray){
	
	connecttoDB();
	
putenv("TZ=".$weatherArray['timeOffsetSymbol']."");
$starttime = strtotime("-1 day");
$endtime = time();
	$sql = "SELECT SUM(" . $weatherArray['archiveTableArray']['ET'] . "), FROM_UNIXTIME(".$weatherArray['archiveTableArray']['dateTime'].",'%H')HOUR, ".$weatherArray['archiveTableArray']['dateTime']." from " . $weatherArray['dbtableName'] . " WHERE ".$weatherArray['archiveTableArray']['dateTime']." BETWEEN " . $starttime . " AND " . $endtime . " GROUP BY HOUR ORDER BY ".$weatherArray['archiveTableArray']['dateTime']." ASC;";
	$result = mysql_query($sql);
	$i = 0;
//	echo $sql;
	while ($row = mysql_fetch_array($result)) {
				if (isset($row[0])&&isset($row[1])&&isset($row[2]))
				{
				$weatherArray['SQLData']['ET24HourlySum'][$i] = 0 - InchtoMM($row[0]);
				$weatherArray['SQLData']['ET24HourlyTime'][$i] = $row[1];	
				$weatherArray['SQLData']['ET24HourlyUnixTime'][$i] = $row[2];
				}
				
				
				$i++;
			}
	$counter=0;
	foreach ($weatherArray['SQLData']['ET24HourlyUnixTime'] as $key) {
	$counter++;
	}
	$reversal = 0;
	while ($counter>=0) {
	$weatherArray['SQLData']['ET24HourlyUnixTime'][$reversal] = $weatherArray['SQLData']['ET24HourlyUnixTime'][$counter];
	$counter--;
	$reversal++;
	}
	
	return $weatherArray;
}

function runRain7DayQuery($weatherArray){

connecttoDB();
putenv("TZ=".$weatherArray['timeOffsetSymbol']."");
$starttime = strtotime("-6 day");
$endtime = time();

	$sql = "SELECT SUM(" . $weatherArray['archiveTableArray']['rain'] . "), FROM_UNIXTIME(".$weatherArray['archiveTableArray']['dateTime'].",'%d')DAY from " . $weatherArray['dbtableName'] . " WHERE ".$weatherArray['archiveTableArray']['dateTime']." BETWEEN " . $starttime . " AND " . $endtime . " GROUP BY DAY ORDER BY ".$weatherArray['archiveTableArray']['dateTime']." ASC;";
	//echo $sql;
	$result = mysql_query($sql);
	$i = 0;
	while ($row = mysql_fetch_array($result)) {
				$weatherArray['SQLDataWeekly']['Rain7DaySum'][$i] = InchtoMM($row[0]);
				$weatherArray['SQLDataWeekly']['Rain7DayTime'][$i] = $row[1];
				//echo ','.$i.',';
				//echo $weatherArray['SQLData']['Rain7DaySum'][$i] . ',';
				//echo $weatherArray['SQLData']['Rain7DayTime'][$i];
				
				$i++;
			}
	return $weatherArray;
}

function runRainMonthQuery($weatherArray){

connecttoDB();
putenv("TZ=".$weatherArray['timeOffsetSymbol']."");
$starttime = strtotime("-30 day");
$endtime = time();

	$sql = "SELECT SUM(" . $weatherArray['archiveTableArray']['rain'] . "), FROM_UNIXTIME(".$weatherArray['archiveTableArray']['dateTime'].",'%d')DAY from " . $weatherArray['dbtableName'] . " WHERE ".$weatherArray['archiveTableArray']['dateTime']." BETWEEN " . $starttime . " AND " . $endtime . " GROUP BY DAY ORDER BY ".$weatherArray['archiveTableArray']['dateTime']." ASC;";
	//echo $sql;
	$result = mysql_query($sql);
	$i = 0;
	while ($row = mysql_fetch_array($result)) {
				$weatherArray['SQLDataMonthly']['RainMonthSum'][$i] = InchtoMM($row[0]);
				$weatherArray['SQLDataMonthly']['RainMonthTime'][$i] = $row[1];
				//echo ','.$i.',';
				//echo $weatherArray['SQLData']['Rain7DaySum'][$i] . ',';
				//echo $weatherArray['SQLData']['Rain7DayTime'][$i];
				
				$i++;
			}
	return $weatherArray;
}

function runRainYearQuery($weatherArray){

connecttoDB();
putenv("TZ=".$weatherArray['timeOffsetSymbol']."");
$starttime = strtotime("-364 day");
$endtime = time();

	$sql = "SELECT SUM(" . $weatherArray['archiveTableArray']['rain'] . "), FROM_UNIXTIME(".$weatherArray['archiveTableArray']['dateTime'].",'%d')MONTH from " . $weatherArray['dbtableName'] . " WHERE ".$weatherArray['archiveTableArray']['dateTime']." BETWEEN " . $starttime . " AND " . $endtime . " GROUP BY DAY ORDER BY ".$weatherArray['archiveTableArray']['dateTime']." ASC;";
	//echo $sql;
	$result = mysql_query($sql);
	$i = 0;
	while ($row = mysql_fetch_array($result)) {
				$weatherArray['SQLDataYearly']['RainYearSum'][$i] = InchtoMM($row[0]);
				$weatherArray['SQLDataYearly']['RainYearTime'][$i] = $row[1];
				//echo ','.$i.',';
				//echo $weatherArray['SQLData']['Rain7DaySum'][$i] . ',';
				//echo $weatherArray['SQLData']['Rain7DayTime'][$i];
				
				$i++;
			}
	return $weatherArray;
}

function runDB24hrQuery($weatherArray){
	if ($weatherArray['sensors'] == 0) {
	connecttoDB();
	
	$sql = "SELECT ROUND(" . $weatherArray['archiveTableArray']['outTemp'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['inTemp'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['barometer'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['outHumidity'] . ",0),ROUND(" . $weatherArray['archiveTableArray']['inHumidity'] . ",2)," . $weatherArray['archiveTableArray']['rain'] . "," . $weatherArray['archiveTableArray']['rainRate'] . ",ROUND(" . $weatherArray['archiveTableArray']['windSpeed'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windGust'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windDir'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windGustDir'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['dewpoint'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windchill'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['heatindex'] . ",2)," . $weatherArray['archiveTableArray']['dateTime'] . " from " . $weatherArray['dbtableName'] . " ORDER BY ".$weatherArray['archiveTableArray']['dateTime']." DESC LIMIT 288;";
	$result = mysql_query($sql);
	$i = 288;
	while ($row = mysql_fetch_array($result)) {
			$i--;
				$weatherArray['SQLData']['OutTemp'][$i] = $row[0];
				$weatherArray['SQLData']['InTemp'][$i] = $row[1];
				$weatherArray['SQLData']['Barometer'][$i] = $row[2];
				$weatherArray['SQLData']['OutHumid'][$i] = $row[3];
				$weatherArray['SQLData']['InHumid'][$i] = $row[4];
				$weatherArray['SQLData']['rain'][$i] = InchtoMM($row[5]);
				$weatherArray['SQLData']['HiRainRate'][$i] = InchtoMM($row[6]);
				$weatherArray['SQLData']['WindSpeed'][$i] = $row[7];
				$weatherArray['SQLData']['hiWindSpeed'][$i] = $row[8];
				$weatherArray['SQLData']['WindDir'][$i] = $row[9];
				$weatherArray['SQLData']['HiWindDir'][$i] = $row[10];
				$weatherArray['SQLData']['Dewpoint'][$i] = $row[11];
				$weatherArray['SQLData']['WindChill'][$i] = $row[12];
				$weatherArray['SQLData']['HeatIndex'][$i] = $row[13];
				$weatherArray['SQLData']['RecordTime'][$i] = $row[14];
				
			
			}
			
			
	//echo $sql;
	
	return $weatherArray;
}
else {
connecttoDB();
	
	$sql = "SELECT ROUND(" . $weatherArray['archiveTableArray']['outTemp'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['inTemp'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['barometer'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['outHumidity'] . ",0),ROUND(" . $weatherArray['archiveTableArray']['inHumidity'] . ",2)," . $weatherArray['archiveTableArray']['rain'] . "," . $weatherArray['archiveTableArray']['rainRate'] . ",ROUND(" . $weatherArray['archiveTableArray']['windSpeed'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windGust'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windDir'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windGustDir'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['dewpoint'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windchill'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['heatindex'] . ",2), " . $weatherArray['archiveTableArray']['dateTime'] . ",ROUND(" . $weatherArray['archiveTableArray']['radiation'] . ",1),ROUND(" . $weatherArray['archiveTableArray']['UV'] . ",1)," . $weatherArray['archiveTableArray']['ET'] . " from " . $weatherArray['dbtableName'] . " ORDER BY ".$weatherArray['archiveTableArray']['dateTime']." DESC LIMIT 288;";
	
	$result = mysql_query($sql);
	$i = 288;
	while ($row = mysql_fetch_array($result)) {
			$i--;
				$weatherArray['SQLData']['OutTemp'][$i] = round(FtoC($row[0]),2);
				$weatherArray['SQLData']['InTemp'][$i] = round(FtoC($row[1]),2);
				$weatherArray['SQLData']['Barometer'][$i] = BaromIntomb($row[2]);
				$weatherArray['SQLData']['OutHumid'][$i] = $row[3];
				$weatherArray['SQLData']['InHumid'][$i] = $row[4];
				$weatherArray['SQLData']['rain'][$i] = InchtoMM($row[5]);
				$weatherArray['SQLData']['HiRainRate'][$i] = InchtoMM($row[6]);
				$weatherArray['SQLData']['WindSpeed'][$i] = mphtokph($row[7]);
				$weatherArray['SQLData']['hiWindSpeed'][$i] = mphtokph($row[8]);
				$weatherArray['SQLData']['WindDir'][$i] = $row[9];
				$weatherArray['SQLData']['HiWindDir'][$i] = $row[10];
				$weatherArray['SQLData']['Dewpoint'][$i] = round(FtoC($row[11]),2);
				$weatherArray['SQLData']['WindChill'][$i] = round(FtoC($row[12]),2);
				$weatherArray['SQLData']['HeatIndex'][$i] = round(FtoC($row[13]),2);
				$weatherArray['SQLData']['RecordTime'][$i] = $row[14];
				$weatherArray['SQLData']['SolarRadSQL'][$i] = $row[15];
				$weatherArray['SQLData']['UVSQL'][$i] = $row[16];
				$weatherArray['SQLData']['ET'][$i] = InchtoMM($row[17]);
				
				//echo $row[0] . '<br/>';
				//echo $row[1] . '-';
			}
			
			
	//echo $sql;
	
	return $weatherArray;

}



}

function runDB7dayQuery($weatherArray){
	
if ($weatherArray['sensors'] == 0) {
	connecttoDB();
	
	$sql = "SELECT ROUND(" . $weatherArray['archiveTableArray']['outTemp'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['inTemp'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['barometer'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['outHumidity'] . ",0),ROUND(" . $weatherArray['archiveTableArray']['inHumidity'] . ",2)," . $weatherArray['archiveTableArray']['rain'] . "," . $weatherArray['archiveTableArray']['rainRate'] . ",ROUND(" . $weatherArray['archiveTableArray']['windSpeed'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windGust'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windDir'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windGustDir'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['dewpoint'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windchill'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['heatindex'] . ",2)," . $weatherArray['archiveTableArray']['dateTime'] . " from " . $weatherArray['dbtableName'] . " ORDER BY ".$weatherArray['archiveTableArray']['dateTime']." DESC LIMIT 2016;";
	$result = mysql_query($sql);
	$i = 2016;
	while ($row = mysql_fetch_array($result)) {
			$i--;
				$weatherArray['SQLDataWeekly']['OutTemp'][$i] = $row[0];
				$weatherArray['SQLDataWeekly']['InTemp'][$i] = $row[1];
				$weatherArray['SQLDataWeekly']['Barometer'][$i] = BaromIntomb($row[2]);
				$weatherArray['SQLDataWeekly']['OutHumid'][$i] = $row[3];
				$weatherArray['SQLDataWeekly']['InHumid'][$i] = $row[4];
				$weatherArray['SQLDataWeekly']['rain'][$i] = InchtoMM($row[5]);
				$weatherArray['SQLDataWeekly']['HiRainRate'][$i] = InchtoMM($row[6]);
				$weatherArray['SQLDataWeekly']['WindSpeed'][$i] = $row[7];
				$weatherArray['SQLDataWeekly']['hiWindSpeed'][$i] = $row[8];
				$weatherArray['SQLDataWeekly']['WindDir'][$i] = $row[9];
				$weatherArray['SQLDataWeekly']['HiWindDir'][$i] = $row[10];
				$weatherArray['SQLDataWeekly']['Dewpoint'][$i] = $row[11];
				$weatherArray['SQLDataWeekly']['WindChill'][$i] = $row[12];
				$weatherArray['SQLDataWeekly']['HeatIndex'][$i] = $row[13];
				$weatherArray['SQLDataWeekly']['RecordTime'][$i] = $row[14];
				
			
			}
			
			
	//echo $sql;
	
	return $weatherArray;
	
}
else {

connecttoDB();
	
	$sql = "SELECT ROUND(" . $weatherArray['archiveTableArray']['outTemp'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['inTemp'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['barometer'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['outHumidity'] . ",0),ROUND(" . $weatherArray['archiveTableArray']['inHumidity'] . ",2)," . $weatherArray['archiveTableArray']['rain'] . "," . $weatherArray['archiveTableArray']['rainRate'] . ",ROUND(" . $weatherArray['archiveTableArray']['windSpeed'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windGust'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windDir'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windGustDir'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['dewpoint'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windchill'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['heatindex'] . ",2)," . $weatherArray['archiveTableArray']['dateTime'] . ",ROUND(" . $weatherArray['archiveTableArray']['radiation'] . ",1),ROUND(" . $weatherArray['archiveTableArray']['UV'] . ",1)," . $weatherArray['archiveTableArray']['ET'] . " from " . $weatherArray['dbtableName'] . " ORDER BY ".$weatherArray['archiveTableArray']['dateTime']." DESC LIMIT 2016;";
	//echo $sql;
	$result = mysql_query($sql);
	$i = 2016;
	while ($row = mysql_fetch_array($result)) {
			$i--;
				$weatherArray['SQLDataWeekly']['OutTemp'][$i] = $row[0];
				$weatherArray['SQLDataWeekly']['InTemp'][$i] = $row[1];
				$weatherArray['SQLDataWeekly']['Barometer'][$i] = BaromIntomb($row[2]);
				$weatherArray['SQLDataWeekly']['OutHumid'][$i] = $row[3];
				$weatherArray['SQLDataWeekly']['InHumid'][$i] = $row[4];
				$weatherArray['SQLDataWeekly']['rain'][$i] = $row[5];
				$weatherArray['SQLDataWeekly']['HiRainRate'][$i] = $row[6];
				$weatherArray['SQLDataWeekly']['WindSpeed'][$i] = $row[7];
				$weatherArray['SQLDataWeekly']['hiWindSpeed'][$i] = $row[8];
				$weatherArray['SQLDataWeekly']['WindDir'][$i] = $row[9];
				$weatherArray['SQLDataWeekly']['HiWindDir'][$i] = $row[10];
				$weatherArray['SQLDataWeekly']['Dewpoint'][$i] = $row[11];
				$weatherArray['SQLDataWeekly']['WindChill'][$i] = $row[12];
				$weatherArray['SQLDataWeekly']['HeatIndex'][$i] = $row[13];
				$weatherArray['SQLDataWeekly']['RecordTime'][$i] = $row[14];
				$weatherArray['SQLDataWeekly']['SolarRadSQL'][$i] = $row[15];
				$weatherArray['SQLDataWeekly']['UVSQL'][$i] = $row[16];
				$weatherArray['SQLDataWeekly']['ET'][$i] = $row[17];
				
			
			}
			
			
	//echo $sql;
	
	return $weatherArray;
	
}


}

function runDBMonthQuery($weatherArray){
	
	if ($weatherArray['sensors'] == 0) {
	connecttoDB();
	
	$sql = "SELECT ROUND(" . $weatherArray['archiveTableArray']['outTemp'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['inTemp'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['barometer'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['outHumidity'] . ",0),ROUND(" . $weatherArray['archiveTableArray']['inHumidity'] . ",2)," . $weatherArray['archiveTableArray']['rain'] . "," . $weatherArray['archiveTableArray']['rainRate'] . ",ROUND(" . $weatherArray['archiveTableArray']['windSpeed'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windGust'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windDir'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windGustDir'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['dewpoint'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windchill'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['heatindex'] . ",2)," . $weatherArray['archiveTableArray']['dateTime'] . " from " . $weatherArray['dbtableName'] . " ORDER BY ".$weatherArray['archiveTableArray']['dateTime']." DESC LIMIT 8928;";
	$result = mysql_query($sql);
	$i = 8928;
	while ($row = mysql_fetch_array($result)) {
			$i--;
			
				$weatherArray['SQLDataMonthly']['OutTemp'][$i] = $row[0];
				$weatherArray['SQLDataMonthly']['InTemp'][$i] = $row[1];
				$weatherArray['SQLDataMonthly']['Barometer'][$i] = BaromIntomb($row[2]);
				$weatherArray['SQLDataMonthly']['OutHumid'][$i] = $row[3];
				$weatherArray['SQLDataMonthly']['InHumid'][$i] = $row[4];
				$weatherArray['SQLDataMonthly']['rain'][$i] = $row[5];
				$weatherArray['SQLDataMonthly']['HiRainRate'][$i] = $row[6];
				$weatherArray['SQLDataMonthly']['WindSpeed'][$i] = $row[7];
				$weatherArray['SQLDataMonthly']['hiWindSpeed'][$i] = $row[8];
				$weatherArray['SQLDataMonthly']['WindDir'][$i] = $row[9];
				$weatherArray['SQLDataMonthly']['HiWindDir'][$i] = $row[10];
				$weatherArray['SQLDataMonthly']['Dewpoint'][$i] = $row[11];
				$weatherArray['SQLDataMonthly']['WindChill'][$i] = $row[12];
				$weatherArray['SQLDataMonthly']['HeatIndex'][$i] = $row[13];
				$weatherArray['SQLDataMonthly']['RecordTime'][$i] = $row[14];
				
			
			}
			
			
	//echo $sql;
	
	return $weatherArray;
	
	}
else {
connecttoDB();
	
	$sql = "SELECT ROUND(" . $weatherArray['archiveTableArray']['outTemp'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['inTemp'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['barometer'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['outHumidity'] . ",0),ROUND(" . $weatherArray['archiveTableArray']['inHumidity'] . ",2)," . $weatherArray['archiveTableArray']['rain'] . "," . $weatherArray['archiveTableArray']['rainRate'] . ",ROUND(" . $weatherArray['archiveTableArray']['windSpeed'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windGust'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windDir'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windGustDir'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['dewpoint'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windchill'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['heatindex'] . ",2)," . $weatherArray['archiveTableArray']['dateTime'] . ",ROUND(" . $weatherArray['archiveTableArray']['radiation'] . ",1),ROUND(" . $weatherArray['archiveTableArray']['UV'] . ",1)," . $weatherArray['archiveTableArray']['ET'] . " from " . $weatherArray['dbtableName'] . " ORDER BY ".$weatherArray['archiveTableArray']['dateTime']." DESC LIMIT 8928;";
	
	$result = mysql_query($sql);
	$i = 8928;
	while ($row = mysql_fetch_array($result)) {
			$i--;
				
				$weatherArray['SQLDataMonthly']['OutTemp'][$i] = $row[0];
				$weatherArray['SQLDataMonthly']['InTemp'][$i] = $row[1];
				$weatherArray['SQLDataMonthly']['Barometer'][$i] = BaromIntomb($row[2]);
				$weatherArray['SQLDataMonthly']['OutHumid'][$i] = $row[3];
				$weatherArray['SQLDataMonthly']['InHumid'][$i] = $row[4];
				$weatherArray['SQLDataMonthly']['rain'][$i] = $row[5];
				$weatherArray['SQLDataMonthly']['HiRainRate'][$i] = $row[6];
				$weatherArray['SQLDataMonthly']['WindSpeed'][$i] = $row[7];
				$weatherArray['SQLDataMonthly']['hiWindSpeed'][$i] = $row[8];
				$weatherArray['SQLDataMonthly']['WindDir'][$i] = $row[9];
				$weatherArray['SQLDataMonthly']['HiWindDir'][$i] = $row[10];
				$weatherArray['SQLDataMonthly']['Dewpoint'][$i] = $row[11];
				$weatherArray['SQLDataMonthly']['WindChill'][$i] = $row[12];
				$weatherArray['SQLDataMonthly']['HeatIndex'][$i] = $row[13];
				$weatherArray['SQLDataMonthly']['RecordTime'][$i] = $row[14];
				$weatherArray['SQLDataMonthly']['SolarRadSQL'][$i] = $row[15];
				$weatherArray['SQLDataMonthly']['UVSQL'][$i] = $row[16];
				$weatherArray['SQLDataMonthly']['ET'][$i] = $row[17];
				
			
			}
			
			
	//echo $sql;
	
	return $weatherArray;
}
}

function runDBHourlyMonthQuery($weatherArray){
	
	if ($weatherArray['sensors'] == 0) {
	connecttoDB();
	
	$sql = "SELECT ROUND(" . $weatherArray['archiveTableArray']['outTemp'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['inTemp'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['barometer'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['outHumidity'] . ",0),ROUND(" . $weatherArray['archiveTableArray']['inHumidity'] . ",2)," . $weatherArray['archiveTableArray']['rain'] . "," . $weatherArray['archiveTableArray']['rainRate'] . ",ROUND(" . $weatherArray['archiveTableArray']['windSpeed'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windGust'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windDir'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windGustDir'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['dewpoint'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windchill'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['heatindex'] . ",2)," . $weatherArray['archiveTableArray']['dateTime'] . " from " . $weatherArray['dbtableName'] . " ORDER BY ".$weatherArray['archiveTableArray']['dateTime']." DESC LIMIT 8928;";
	$result = mysql_query($sql);
	$i = 8928;
	while ($row = mysql_fetch_array($result)) {
			$i--;
				
				$weatherArray['SQLDataMonthly']['OutTemp'][$i] = $row[0];
				$weatherArray['SQLDataMonthly']['InTemp'][$i] = $row[1];
				$weatherArray['SQLDataMonthly']['Barometer'][$i] = BaromIntomb($row[2]);
				$weatherArray['SQLDataMonthly']['OutHumid'][$i] = $row[3];
				$weatherArray['SQLDataMonthly']['InHumid'][$i] = $row[4];
				$weatherArray['SQLDataMonthly']['rain'][$i] = $row[5];
				$weatherArray['SQLDataMonthly']['HiRainRate'][$i] = $row[6];
				$weatherArray['SQLDataMonthly']['WindSpeed'][$i] = $row[7];
				$weatherArray['SQLDataMonthly']['hiWindSpeed'][$i] = $row[8];
				$weatherArray['SQLDataMonthly']['WindDir'][$i] = $row[9];
				$weatherArray['SQLDataMonthly']['HiWindDir'][$i] = $row[10];
				$weatherArray['SQLDataMonthly']['Dewpoint'][$i] = $row[11];
				$weatherArray['SQLDataMonthly']['WindChill'][$i] = $row[12];
				$weatherArray['SQLDataMonthly']['HeatIndex'][$i] = $row[13];
				$weatherArray['SQLDataMonthly']['RecordTime'][$i] = $row[14];
				
				
			
			}
			
			
	//echo $sql;
	
	return $weatherArray;
	
	}
else {
connecttoDB();
	
	$sql = "SELECT ROUND(" . $weatherArray['archiveTableArray']['outTemp'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['inTemp'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['barometer'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['outHumidity'] . ",0),ROUND(" . $weatherArray['archiveTableArray']['inHumidity'] . ",2)," . $weatherArray['archiveTableArray']['rain'] . "," . $weatherArray['archiveTableArray']['rainRate'] . ",ROUND(" . $weatherArray['archiveTableArray']['windSpeed'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windGust'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windDir'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windGustDir'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['dewpoint'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windchill'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['heatindex'] . ",2)," . $weatherArray['archiveTableArray']['dateTime'] . ",ROUND(" . $weatherArray['archiveTableArray']['UV'] . ",1)," . $weatherArray['archiveTableArray']['ET'] . " from " . $weatherArray['dbtableName'] . " ORDER BY ".$weatherArray['archiveTableArray']['dateTime']." DESC LIMIT 8928;";
	
	$result = mysql_query($sql);
	$i = 8928;
	while ($row = mysql_fetch_array($result)) {
			$i--;
				$weatherArray['SQLDataMonthly']['OutTemp'][$i] = $row[0];
				$weatherArray['SQLDataMonthly']['InTemp'][$i] = $row[1];
				$weatherArray['SQLDataMonthly']['Barometer'][$i] = $row[2];
				$weatherArray['SQLDataMonthly']['OutHumid'][$i] = $row[3];
				$weatherArray['SQLDataMonthly']['InHumid'][$i] = $row[4];
				$weatherArray['SQLDataMonthly']['rain'][$i] = $row[5];
				$weatherArray['SQLDataMonthly']['HiRainRate'][$i] = $row[6];
				$weatherArray['SQLDataMonthly']['WindSpeed'][$i] = $row[7];
				$weatherArray['SQLDataMonthly']['hiWindSpeed'][$i] = $row[8];
				$weatherArray['SQLDataMonthly']['WindDir'][$i] = $row[9];
				$weatherArray['SQLDataMonthly']['HiWindDir'][$i] = $row[10];
				$weatherArray['SQLDataMonthly']['Dewpoint'][$i] = $row[11];
				$weatherArray['SQLDataMonthly']['WindChill'][$i] = $row[12];
				$weatherArray['SQLDataMonthly']['HeatIndex'][$i] = $row[13];
				$weatherArray['SQLDataMonthly']['RecordTime'][$i] = $row[14];
				$weatherArray['SQLDataMonthly']['SolarRadSQL'][$i] = $row[15];
				$weatherArray['SQLDataMonthly']['UVSQL'][$i] = $row[16];
				$weatherArray['SQLDataMonthly']['ET'][$i] = $row[17];
				
			
			}
			
			
	//echo $sql;
	
	return $weatherArray;
}
}

function runDBYearQuery($weatherArray){
	
	if ($weatherArray['sensors'] == 0) {
	connecttoDB();
	
	$sql = "SELECT ROUND(" . $weatherArray['archiveTableArray']['outTemp'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['inTemp'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['barometer'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['outHumidity'] . ",0),ROUND(" . $weatherArray['archiveTableArray']['inHumidity'] . ",2)," . $weatherArray['archiveTableArray']['rain'] . ", " . $weatherArray['archiveTableArray']['rainRate'] . ",ROUND(" . $weatherArray['archiveTableArray']['windSpeed'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windGust'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windDir'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windGustDir'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['dewpoint'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windchill'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['heatindex'] . ",2)," . $weatherArray['archiveTableArray']['dateTime'] . " from " . $weatherArray['dbtableName'] . " ORDER BY ".$weatherArray['archiveTableArray']['dateTime']." DESC LIMIT 105129;";
	$result = mysql_query($sql);
	$i = 105129;
	while ($row = mysql_fetch_array($result)) {
			$i--;
				$weatherArray['SQLDataYearly']['OutTemp'][$i] = $row[0];
				$weatherArray['SQLDataYearly']['InTemp'][$i] = $row[1];
				$weatherArray['SQLDataYearly']['Barometer'][$i] = BaromIntomb($row[2]);
				$weatherArray['SQLDataYearly']['OutHumid'][$i] = $row[3];
				$weatherArray['SQLDataYearly']['InHumid'][$i] = $row[4];
				$weatherArray['SQLDataYearly']['rain'][$i] = $row[5];
				$weatherArray['SQLDataYearly']['HiRainRate'][$i] = $row[6];
				$weatherArray['SQLDataYearly']['WindSpeed'][$i] = $row[7];
				$weatherArray['SQLDataYearly']['hiWindSpeed'][$i] = $row[8];
				$weatherArray['SQLDataYearly']['WindDir'][$i] = $row[9];
				$weatherArray['SQLDataYearly']['HiWindDir'][$i] = $row[10];
				$weatherArray['SQLDataYearly']['Dewpoint'][$i] = $row[11];
				$weatherArray['SQLDataYearly']['WindChill'][$i] = $row[12];
				$weatherArray['SQLDataYearly']['HeatIndex'][$i] = $row[13];
				$weatherArray['SQLDataYearly']['RecordTime'][$i] = $row[14];
				
				
			
			}
			
			
	//echo $sql;
	
	return $weatherArray;
	
		}
else {
connecttoDB();
	
	$sql = "SELECT ROUND(" . $weatherArray['archiveTableArray']['outTemp'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['inTemp'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['barometer'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['outHumidity'] . ",0),ROUND(" . $weatherArray['archiveTableArray']['inHumidity'] . ",2)," . $weatherArray['archiveTableArray']['rain'] . "," . $weatherArray['archiveTableArray']['rainRate'] . ",ROUND(" . $weatherArray['archiveTableArray']['windSpeed'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windGust'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windDir'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windGustDir'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['dewpoint'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windchill'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['heatindex'] . ",2)," . $weatherArray['archiveTableArray']['dateTime'] . ",ROUND(" . $weatherArray['archiveTableArray']['radiation'] . ",1),ROUND(" . $weatherArray['archiveTableArray']['UV'] . ",1),ROUND(" . $weatherArray['archiveTableArray']['ET'] . ",1) from " . $weatherArray['dbtableName'] . " ORDER BY ".$weatherArray['archiveTableArray']['dateTime']." DESC LIMIT 105129;";
	$result = mysql_query($sql);
	$i = 105129;
	while ($row = mysql_fetch_array($result)) {
			$i--;
				$weatherArray['SQLDataYearly']['OutTemp'][$i] = $row[0];
				$weatherArray['SQLDataYearly']['InTemp'][$i] = $row[1];
				$weatherArray['SQLDataYearly']['Barometer'][$i] = BaromIntomb($row[2]);
				$weatherArray['SQLDataYearly']['OutHumid'][$i] = $row[3];
				$weatherArray['SQLDataYearly']['InHumid'][$i] = $row[4];
				$weatherArray['SQLDataYearly']['rain'][$i] = $row[5];
				$weatherArray['SQLDataYearly']['HiRainRate'][$i] = $row[6];
				$weatherArray['SQLDataYearly']['WindSpeed'][$i] = $row[7];
				$weatherArray['SQLDataYearly']['hiWindSpeed'][$i] = $row[8];
				$weatherArray['SQLDataYearly']['WindDir'][$i] = $row[9];
				$weatherArray['SQLDataYearly']['HiWindDir'][$i] = $row[10];
				$weatherArray['SQLDataYearly']['Dewpoint'][$i] = $row[11];
				$weatherArray['SQLDataYearly']['WindChill'][$i] = $row[12];
				$weatherArray['SQLDataYearly']['HeatIndex'][$i] = $row[13];
				$weatherArray['SQLDataYearly']['RecordTime'][$i] = $row[14];
				$weatherArray['SQLDataYearly']['SolarRadSQL'][$i] = $row[15];
				$weatherArray['SQLDataYearly']['UVSQL'][$i] = $row[16];
				$weatherArray['SQLDataYearly']['ET'][$i] = $row[17];
				
				
			
			}
			
			
	//echo $sql;
	
	return $weatherArray;
}
}

function runDBCustomQuery($weatherArray){

	if ($weatherArray['sensors'] == 0) {
	connecttoDB();
putenv('TZ=UTC');
	$sql = "SELECT ROUND(" . $weatherArray['archiveTableArray']['outTemp'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['inTemp'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['barometer'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['outHumidity'] . ",0),ROUND(" . $weatherArray['archiveTableArray']['inHumidity'] . ",2)," . $weatherArray['archiveTableArray']['rain'] . "," . $weatherArray['archiveTableArray']['rainRate'] . ",ROUND(" . $weatherArray['archiveTableArray']['windSpeed'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windGust'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windDir'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windGustDir'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['dewpoint'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windchill'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['heatindex'] . ",2), FROM_UNIXTIME(".$weatherArray['archiveTableArray']['dateTime'].") from " . $weatherArray['dbtableName'] . " WHERE ".$weatherArray['archiveTableArray']['dateTime']." <= " . $weatherArray[endtime] . " AND ".$weatherArray['archiveTableArray']['dateTime']." >= " . $weatherArray[starttime] . " ORDER BY ".$weatherArray['archiveTableArray']['dateTime']." ASC;";
	$result = mysql_query($sql);
	$i = 288;
	while ($row = mysql_fetch_array($result)) {
			$i--;
				$weatherArray['SQLDataCustom']['OutTemp'][$i] = round(FtoC($row[0]),2);
				$weatherArray['SQLDataCustom']['InTemp'][$i] = round(FtoC($row[1]),2);
				$weatherArray['SQLDataCustom']['Barometer'][$i] = BaromIntomb($row[2]);
				$weatherArray['SQLDataCustom']['OutHumid'][$i] = $row[3];
				$weatherArray['SQLDataCustom']['InHumid'][$i] = $row[4];
				$weatherArray['SQLDataCustom']['rain'][$i] = InchtoMM($row[5]);
				$weatherArray['SQLDataCustom']['HiRainRate'][$i] = InchtoMM($row[6]);
				$weatherArray['SQLDataCustom']['WindSpeed'][$i] = mphtokph($row[7]);
				$weatherArray['SQLDataCustom']['hiWindSpeed'][$i] = mphtokph($row[8]);
				$weatherArray['SQLDataCustom']['WindDir'][$i] = $row[9];
				$weatherArray['SQLDataCustom']['HiWindDir'][$i] = $row[10];
				$weatherArray['SQLDataCustom']['Dewpoint'][$i] = round(FtoC($row[11]),2);
				$weatherArray['SQLDataCustom']['WindChill'][$i] = round(FtoC($row[12]),2);
				$weatherArray['SQLDataCustom']['HeatIndex'][$i] = round(FtoC($row[13]),2);
				$weatherArray['SQLDataCustom']['RecordTime'][$i] = $row[14];
				
			}
			
			
	//echo $sql;
	
	return $weatherArray;
}
else {
connecttoDB();
	
	
	$sql = "SELECT " . $weatherArray['archiveTableArray']['outTemp'] . "," . $weatherArray['archiveTableArray']['inTemp'] . "," . $weatherArray['archiveTableArray']['barometer'] . ",ROUND(" . $weatherArray['archiveTableArray']['outHumidity'] . ",0),ROUND(" . $weatherArray['archiveTableArray']['inHumidity'] . ",2), SUM(" . $weatherArray['archiveTableArray']['rain'] . "), MAX(" . $weatherArray['archiveTableArray']['rainRate'] . "),ROUND(" . $weatherArray['archiveTableArray']['windSpeed'] . ",2),ROUND(MAX(" . $weatherArray['archiveTableArray']['windGust'] . "),2),ROUND(" . $weatherArray['archiveTableArray']['windDir'] . ",2),ROUND(AVG(" . $weatherArray['archiveTableArray']['windGustDir'] . "),2),ROUND(" . $weatherArray['archiveTableArray']['dewpoint'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['windchill'] . ",2),ROUND(" . $weatherArray['archiveTableArray']['heatindex'] . ",2), FROM_UNIXTIME(".$weatherArray['archiveTableArray']['dateTime']."-(3600*3),'%Y-%M-%d %H:00')HOUR,ROUND(" . $weatherArray['archiveTableArray']['radiation'] . ",3),ROUND(" . $weatherArray['archiveTableArray']['UV'] . ",1), SUM(" . $weatherArray['archiveTableArray']['ET'] . "), ". $weatherArray['archiveTableArray']['dateTime'] . " from " . $weatherArray['dbtableName'] . " WHERE ".$weatherArray['archiveTableArray']['dateTime']." <= " . $weatherArray[endtime] . " AND ".$weatherArray['archiveTableArray']['dateTime']." >= " . $weatherArray[starttime] . " GROUP BY HOUR ORDER BY ".$weatherArray['archiveTableArray']['dateTime']." ASC;";
	//echo $sql;
	$result = mysql_query($sql);
	
	$sql2 = "SELECT AVG(" . $weatherArray['archiveTableArray']['outTemp'] . "), AVG(" . $weatherArray['archiveTableArray']['inTemp'] . "), AVG(" . $weatherArray['archiveTableArray']['barometer'] . "),ROUND(AVG(" . $weatherArray['archiveTableArray']['outHumidity'] . "),0),ROUND(AVG(" . $weatherArray['archiveTableArray']['inHumidity'] . "),2), SUM(" . $weatherArray['archiveTableArray']['rain'] . "), MAX(" . $weatherArray['archiveTableArray']['rainRate'] . "),ROUND(AVG(" . $weatherArray['archiveTableArray']['windSpeed'] . "),2),ROUND(MAX(" . $weatherArray['archiveTableArray']['windGust'] . "),2),ROUND(AVG(" . $weatherArray['archiveTableArray']['windDir'] . "),2),ROUND(AVG(" . $weatherArray['archiveTableArray']['windGustDir'] . "),2),ROUND(AVG(" . $weatherArray['archiveTableArray']['dewpoint'] . "),2),ROUND(AVG(" . $weatherArray['archiveTableArray']['windchill'] . "),2),ROUND(AVG(" . $weatherArray['archiveTableArray']['heatindex'] . "),2), ROUND(AVG(" . $weatherArray['archiveTableArray']['radiation'] . "),3),ROUND(AVG(" . $weatherArray['archiveTableArray']['UV'] . "),1), SUM(" . $weatherArray['archiveTableArray']['ET'] . ") from " . $weatherArray['dbtableName'] . " WHERE ".$weatherArray['archiveTableArray']['dateTime']." <= " . $weatherArray[endtime] . " AND ".$weatherArray['archiveTableArray']['dateTime']." >= " . $weatherArray[starttime] . ";";
	
	$result2 = mysql_query($sql2);
	//echo $sql2;
	$i= 0;
	
	while ($row = mysql_fetch_array($result)) {
				$weatherArray['SQLDataCustom']['OutTemp'][$i] = round(FtoC($row[0]),2);
				$weatherArray['SQLDataCustom']['InTemp'][$i] = round(FtoC($row[1]),2);
				$weatherArray['SQLDataCustom']['Barometer'][$i] = BaromIntomb($row[2]);
				$weatherArray['SQLDataCustom']['OutHumid'][$i] = $row[3];
				$weatherArray['SQLDataCustom']['InHumid'][$i] = $row[4];
				$weatherArray['SQLDataCustom']['rain'][$i] = InchtoMM($row[5]);
				$weatherArray['SQLDataCustom']['HiRainRate'][$i] = InchtoMM($row[6]);
				$weatherArray['SQLDataCustom']['WindSpeed'][$i] = mphtokph($row[7]);
				$weatherArray['SQLDataCustom']['hiWindSpeed'][$i] = mphtokph($row[8]);
				$weatherArray['SQLDataCustom']['WindDir'][$i] = $row[9];
				$weatherArray['SQLDataCustom']['HiWindDir'][$i] = $row[10];
				$weatherArray['SQLDataCustom']['Dewpoint'][$i] = round(FtoC($row[11]),2);
				$weatherArray['SQLDataCustom']['WindChill'][$i] = round(FtoC($row[12]),2);
				$weatherArray['SQLDataCustom']['HeatIndex'][$i] = round(FtoC($row[13]),2);
				$weatherArray['SQLDataCustom']['RecordTime'][$i] = $row[14];
				$weatherArray['SQLDataCustom']['SolarRadSQL'][$i] = $row[15];
				$weatherArray['SQLDataCustom']['UVSQL'][$i] = $row[16];
				$weatherArray['SQLDataCustom']['ET'][$i] = round(InchtoMM($row[17]),2);
				$weatherArray['SQLDataCustom'][RecordTimeUnix][$i] = $row[18];
				

				/*	if($weatherArray['SQLDataCustom']['WindDir'][$i] < 0) {
				$weatherArray['SQLDataCustom']['WindDir'][$i] = 0;
				}
				if($weatherArray['SQLDataCustom']['HiWindDir'][$i] < 0) {
				$weatherArray['SQLDataCustom']['HiWindDir'][$i] = 0;
				}*/
				
			$i++;
			}
	mysql_free_result($result);
			
	//echo $sql;
	
	

$row2 = mysql_fetch_row($result2);	 
	$weatherArray['SQLDataCustom']['OutTempAvg'] = round(FtoC($row2[0]),2);
	$weatherArray['SQLDataCustom']['InTempAvg'] = round(FtoC($row2[1]),2);
	$weatherArray['SQLDataCustom']['BarometerAvg'] = BaromIntomb($row2[2]);
	$weatherArray['SQLDataCustom']['OutHumidAvg'] = $row2[3];
	$weatherArray['SQLDataCustom']['InHumidAvg'] = $row2[4];
	$weatherArray['SQLDataCustom']['RainSum'] = InchtoMM($row2[5]);
	$weatherArray['SQLDataCustom']['HiRainRateMax'] = InchtoMM($row2[6]);
	$weatherArray['SQLDataCustom']['WindSpeedAvg'] = mphtokph($row2[7]);
	$weatherArray['SQLDataCustom']['HiWindSpeedMax'] = mphtokph($row2[8]);
	$weatherArray['SQLDataCustom']['WindDirAvg'] = $row2[9];
	$weatherArray['SQLDataCustom']['HiWindDirAvg'] = $row2[10];
	$weatherArray['SQLDataCustom']['DewpointAvg'] = round(FtoC($row2[11]),2);
	$weatherArray['SQLDataCustom']['WindChillAvg'] = round(FtoC($row2[12]),2);
	$weatherArray['SQLDataCustom']['HeatIndexAvg'] = round(FtoC($row2[13]),2);
	$weatherArray['SQLDataCustom']['SolarRadSQLAvg'] = $row2[14];
	$weatherArray['SQLDataCustom']['UVSQLAvg'] = $row2[15];
	$weatherArray['SQLDataCustom']['ETSum'] = round(InchtoMM($row2[16]),2);
				
	mysql_free_result($result2);
	
	
	return $weatherArray;



}

}



function almanacSQL($weatherArray){
	
	/***** THE FOLLOWING VALUES ARE LOOPED THROUGH DEPENDING ON THE ALMANAC SECTION.  ONCE THE DATABASE SUPPORTS AND IS STORED USING METRIC THE EXTRA FORMULAYS IN THE VALUES CAN BE REMOVED***/
	
	$values[0] = 'SELECT ROUND((0.55555*((';
	$values2[0]= ')-32)),2), ';
	$table[0] = ' outTemp ';
	
	$values[1] = 'SELECT ROUND((0.55555*((';
	$values2[1]= ')-32)),2), ';
	$table[1] = ' inTemp ';
	
	$values[2] = 'SELECT ROUND((';
	$values2[2] = '),2), ';
	$table[2] = ' inHumidity ';
	
	$values[3] = 'SELECT ROUND((';
	$values2[3] = '),2), ';
	$table[3] = ' outHumidity ';
	
	$values[4] = 'SELECT ROUND((1.609344*((';
	$values2[4] = '))),2), ';
	$table[4] = ' windSpeed ';
	
	$values[5] = 'SELECT ROUND((1.609344*((';
	$values2[5] = '))),2), ';
	$table[5] = ' windGust ';
	
	$values[6] = 'SELECT ROUND(25.4*(';
	$values2[6] = '),2), ';
	$table[6] = ' rain ';
	
	$values[7] = 'SELECT ROUND((25.4*((';
	$values2[7] = '))),2), ';
	$table[7] = ' rainRate ';
	
	$values[8] = 'SELECT ROUND((0.55555*((';
	$values2[8]= ')-32)),2), ';
	$table[8] = ' dewPoint ';
	
	$values[9] = 'SELECT ROUND((0.55555*((';
	$values2[9]= ')-32)),2), ';
	$table[9] = ' windChill ';
	
	$values[10] = 'SELECT ROUND((0.55555*((';
	$values2[10]= ')-32)),2), ';
	$table[10] = ' heatIndex ';
	
	$values[11] = 'SELECT ROUND((33.8637526*((';
	$values2[11] = '))),2), ';
	$table[11] = ' baromPressure ';
	
//	$values[12] = 'SELECT ROUND(';
//	$values2[12] = '(bin0),2), ' . $weatherArray['archiveTableArray']['dateTime'] . ' FROM ' . 'windDir ';
//	$values[13] = 'SELECT ROUND(';
//	$values2[13] = '(bin0),2), ' . $weatherArray['archiveTableArray']['dateTime'] . ' FROM ' . 'windDir ';
	
	$valuesstore[0] = 'hi'.$weatherArray['archiveTableArray']['OutTemp'];
	$valuesstore[1] = 'hi'.$weatherArray['archiveTableArray']['InTemp'];
	$valuesstore[2] = 'hi'.$weatherArray['archiveTableArray']['inHumidity'];
	$valuesstore[3] = 'hi'.$weatherArray['archiveTableArray']['outHumidity'];
	$valuesstore[4] = 'hi'.$weatherArray['archiveTableArray']['WindSpeed'];
	$valuesstore[5] = 'hi'.$weatherArray['archiveTableArray']['windGust'];
	$valuesstore[6] = 'hi'.$weatherArray['archiveTableArray']['rain'];
	$valuesstore[7] = 'hi'.$weatherArray['archiveTableArray']['rainRate'];
	$valuesstore[8] = 'hi'.$weatherArray['archiveTableArray']['Dewpoint'];
	$valuesstore[9] = 'hi'.$weatherArray['archiveTableArray']['WindChill'];
	$valuesstore[10] = 'hi'.$weatherArray['archiveTableArray']['HeatIndex'];
	$valuesstore[11] = 'hi'.$weatherArray['archiveTableArray']['Barometer'];
//	$valuesstore[12] = 'hi'.$weatherArray['archiveTableArray']['WindDir'];
//	$valuesstore[13] = 'hi'.$weatherArray['archiveTableArray']['windGustDir'];
	
	$valuesstoretime[0] = 'hi'.$weatherArray['archiveTableArray']['OutTemp'].'Time';
	$valuesstoretime[1] = 'hi'.$weatherArray['archiveTableArray']['InTemp'].'Time';
	$valuesstoretime[2] = 'hi'.$weatherArray['archiveTableArray']['inHumidity'].'Time';
	$valuesstoretime[3] = 'hi'.$weatherArray['archiveTableArray']['outHumidity'].'Time';
	$valuesstoretime[4] = 'hi'.$weatherArray['archiveTableArray']['WindSpeed'].'Time';
	$valuesstoretime[5] = 'hi'.$weatherArray['archiveTableArray']['windGust'].'Time';
	$valuesstoretime[6] = 'hi'.$weatherArray['archiveTableArray']['rain'].'Time';
	$valuesstoretime[7] = 'hi'.$weatherArray['archiveTableArray']['rainRate'].'Time';
	$valuesstoretime[8] = 'hi'.$weatherArray['archiveTableArray']['Dewpoint'].'Time';
	$valuesstoretime[9] = 'hi'.$weatherArray['archiveTableArray']['WindChill'].'Time';
	$valuesstoretime[10] = 'hi'.$weatherArray['archiveTableArray']['HeatIndex'].'Time';
	$valuesstoretime[11] = 'hi'.$weatherArray['archiveTableArray']['Barometer'].'Time';
//	$valuesstoretime[12] = 'hi'.$weatherArray['archiveTableArray']['WindDir'].'Time';
//	$valuesstoretime[13] = 'hi'.$weatherArray['archiveTableArray']['windGustDir'].'Time';
	
	
	
	$valuesstorelow[0] = 'low'.$weatherArray['archiveTableArray']['OutTemp'];
	$valuesstorelow[1] = 'low'.$weatherArray['archiveTableArray']['InTemp'];
	$valuesstorelow[2] = 'low'.$weatherArray['archiveTableArray']['inHumidity'];
	$valuesstorelow[3] = 'low'.$weatherArray['archiveTableArray']['outHumidity'];
	$valuesstorelow[4] = 'low'.$weatherArray['archiveTableArray']['WindSpeed'];
	$valuesstorelow[5] = 'low'.$weatherArray['archiveTableArray']['windGust'];
	$valuesstorelow[6] = 'low'.$weatherArray['archiveTableArray']['rain'];
	$valuesstorelow[7] = 'low'.$weatherArray['archiveTableArray']['rainRate'];
	$valuesstorelow[8] = 'low'.$weatherArray['archiveTableArray']['Dewpoint'];
	$valuesstorelow[9] = 'low'.$weatherArray['archiveTableArray']['WindChill'];
	$valuesstorelow[10] = 'low'.$weatherArray['archiveTableArray']['HeatIndex'];
	$valuesstorelow[11] = 'low'.$weatherArray['archiveTableArray']['Barometer'];
//	$valuesstorelow[12] = 'low'.$weatherArray['archiveTableArray']['WindDir'];
//	$valuesstorelow[13] = 'low'.$weatherArray['archiveTableArray']['windGustDir'];
	
	$valuesstoretimelow[0] = 'low'.$weatherArray['archiveTableArray']['OutTemp'].'Time';
	$valuesstoretimelow[1] = 'low'.$weatherArray['archiveTableArray']['InTemp'].'Time';
	$valuesstoretimelow[2] = 'low'.$weatherArray['archiveTableArray']['inHumidity'].'Time';
	$valuesstoretimelow[3] = 'low'.$weatherArray['archiveTableArray']['outHumidity'].'Time';
	$valuesstoretimelow[4] = 'low'.$weatherArray['archiveTableArray']['WindSpeed'].'Time';
	$valuesstoretimelow[5] = 'low'.$weatherArray['archiveTableArray']['windGust'].'Time';
	$valuesstoretimelow[6] = 'low'.$weatherArray['archiveTableArray']['rain'].'Time';
	$valuesstoretimelow[7] = 'low'.$weatherArray['archiveTableArray']['rainRate'].'Time';
	$valuesstoretimelow[8] = 'low'.$weatherArray['archiveTableArray']['Dewpoint'].'Time';
	$valuesstoretimelow[9] = 'low'.$weatherArray['archiveTableArray']['WindChill'].'Time';
	$valuesstoretimelow[10] = 'low'.$weatherArray['archiveTableArray']['HeatIndex'].'Time';
	$valuesstoretimelow[11] = 'low'.$weatherArray['archiveTableArray']['Barometer'].'Time';
//	$valuesstoretimelow[12] = 'low'.$weatherArray['archiveTableArray']['WindDir'].'Time';
//	$valuesstoretimelow[13] = 'low'.$weatherArray['archiveTableArray']['windGustDir'].'Time';
	
	
if ($weatherArray['sensors'] == 0) {
	connecttoDB();
	
$starthour = 24 - $weatherArray['timeOffsetNum'];
	
	$startyear = gmdate('Y') . '0101' . $starthour . '0000';
	$startmonth = gmdate('Y') . gmdate('m') . '01' . $starthour . '0000';
	$startday = gmdate('Y') . gmdate('m') . gmdate('d') . $starthour . '0000';
	
	$saved = getenv("TZ");
	putenv("TZ=".$weatherArray['timeOffsetSymbol']."");
	$houroffset = date('H');
	putenv("TZ=$saved");
	
	
	
	$weekday = getdate();
	
	if (date('D') == 'Sun') {
		$daysdiff = 6;
	}
	else {
		$daysdiff = $weekday[wday] - 1;
	}

	$currenthour = date('i');
	$currentminute = date('H');
	
	switch  ($weatherArray['almanacPeriod']) { 
		
		case 'Daily': // Daily 
			$dayInterval = ' WHERE ' . $weatherArray['archiveTableArray']['timeHigh'] . ' <= now() AND ' . $weatherArray['archiveTableArray']['timeHigh'] . ' >= DATE_SUB(now(),INTERVAL ' . $houroffset . ' HOUR;';
			$dayInterval2 = '';
		break;
		
		case 'TwentyFour': // 24 Hours 
			$dayInterval = ' WHERE ' . $weatherArray['archiveTableArray']['timeHigh'] . ' <= now() AND ' . $weatherArray['archiveTableArray']['timeHigh'] . ' >= DATE_SUB(now(),INTERVAL 24 HOUR);';
			$dayInterval2 = '';
		break;
		
		case 'Weekly': // Weekly 
			if (date('D') == 'Mon') {
			$dayInterval = ' WHERE ' . $weatherArray['archiveTableArray']['timeHigh'] . ' <= now() AND ' . $weatherArray['archiveTableArray']['timeHigh'] . ' >= DATE_SUB(now(),INTERVAL 7 day);';
			$dayInterval2 = '';
			}
			else {
			$dayInterval = ' WHERE ' . $weatherArray['archiveTableArray']['timeHigh'] . ' <= now() AND ' . $weatherArray['archiveTableArray']['timeHigh'] . ' >= DATE_SUB(now(),INTERVAL ' . $daysdiff . ' day);';
			$dayInterval2 = '';
			}
		break;
		
		case 'Seven': // Weekly 
			$dayInterval = ' WHERE ' . $weatherArray['archiveTableArray']['timeHigh'] . ' <= now() AND ' . $weatherArray['archiveTableArray']['timeHigh'] . ' >= DATE_SUB(now(),INTERVAL 7 day);';
			$dayInterval2 = '';
		break;
		
		case 'Monthly': // Monthly 
			$dayInterval = ' WHERE ' . $weatherArray['archiveTableArray']['timeHigh'] . ' <= now() AND ' . $weatherArray['archiveTableArray']['timeHigh'] . ' >=  ' . $startmonth . ';';
			$dayInterval2 = '';
		break;
		
		case 'Thirty': // 30 Days 
			$dayInterval = ' WHERE ' . $weatherArray['archiveTableArray']['timeHigh'] . ' <= now() AND ' . $weatherArray['archiveTableArray']['timeHigh'] . ' >= DATE_SUB(now(),INTERVAL 30 day);';
			$dayInterval2 = '';
		break;
		
		case 'ThreeSixFive': // 365 Days
			$dayInterval = ' WHERE ' . $weatherArray['archiveTableArray']['timeHigh'] . ' <= now() AND ' . $weatherArray['archiveTableArray']['timeHigh'] . ' >= DATE_SUB(now(),INTERVAL 364 day);';
			$dayInterval2 = '';
		break;
		
		case 'Yearly': // Yearly
			$dayInterval = ' WHERE ' . $weatherArray['archiveTableArray']['timeHigh'] . ' <= now() AND ' . $weatherArray['archiveTableArray']['timeHigh'] . ' >= ' . $startyear . ';';
			$dayInterval2 = '';
		break;
		
		case 'AllTime': // All Time 
			$dayInterval = 'WHERE high = (SELECT max(high) FROM ';
			$dayInterval2 = ');';
		break;
	}
	$i=0;
	while ($i <= 16) {
	$sql = "SELECT ROUND(MAX(".$values[$i]."),2), " . $weatherArray['archiveTableArray']['timeHigh'] . " FROM " . $weatherArray['dbtableName'] . $dayInterval . $dayinterval2;	
	$result = mysql_query($sql);
	
	while ($row = mysql_fetch_array($result)) {
				$result1 = $row[0];
			}

	$resultplus = $result1 + 0.01;
	$resultminus = $result1 - 0.01;
	$sql2 = "SELECT Round(".$values[$i].",2), " . $weatherArray['archiveTableArray']['timeHigh'] . " FROM " . $weatherArray['dbtableName'] . " WHERE ".$values[$i]." < " . $resultplus . " AND ".$values[$i]." > " . $resultminus . " ORDER BY " . $weatherArray['archiveTableArray']['timeHigh'] . " DESC LIMIT 1;";
	$result2 = mysql_query($sql2);
	//echo $sql2;
	while ($row = mysql_fetch_array($result2)) {
				$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value][$valuesstore[$i]] = $row[0];
				$weatherArray['SQLData'][$weatherArray['almanacPeriod']]['ClockTime'][$valuesstoretime[$i]] = $row[1];
			}
	mysql_free_result($result);
	
	// NOW WE DO THE SAME FOR LOW VALUES
	
	$sql = "SELECT ROUND(MIN(".$values[$i]."),2), " . $weatherArray['mySQLDateMod'] . "(" . $weatherArray['archiveTableArray']['timeHigh'] . ", INTERVAL " . $weatherArray['timeOffsetNum'] . " HOUR) FROM " . $weatherArray['dbtableName'] . $dayInterval;
	$result = mysql_query($sql);
	
	while ($row = mysql_fetch_array($result)) {
				$result1 = $row[0];
			}
	$resultplus = $result1 + 0.01;
	$resultminus = $result1 - 0.01;
	$sql2 = "SELECT Round(".$values[$i].",2), " . $weatherArray['archiveTableArray']['timeHigh'] . " FROM " . $weatherArray['dbtableName'] . " WHERE ".$values[$i]." < " . $resultplus . " AND ".$values[$i]." > " . $resultminus . " ORDER BY " . $weatherArray['archiveTableArray']['timeHigh'] . " DESC LIMIT 1;";
	$result2 = mysql_query($sql2);
	while ($row = mysql_fetch_array($result2)) {
				$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value][$valuesstorelow[$i]] = $row[0];
				$weatherArray['SQLData'][$weatherArray['almanacPeriod']]['ClockTime'][$valuesstoretimelow[$i]] = $row[1];
			
			}
	mysql_free_result($result);

	$i++;
	}
	// NOW WE DO RAIN ACCUMULATIONS 
	
	$sql = "SELECT ROUND(SUM(" . $weatherArray['archiveTableArray']['rain'] . "),2), " . $weatherArray['mySQLDateMod'] . "(" . $weatherArray['archiveTableArray']['timeHigh'] . ", INTERVAL " . $weatherArray['timeOffsetNum'] . $dayInterval;
	$result = mysql_query($sql);
	
	while ($row = mysql_fetch_array($result)) {
				$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['RainSum'] = $row[0];
			}
	
	return $weatherArray;
}
else {
connecttoDB();
	/*********** START EXTENDED VARIABLES *************************************/
	$values[12] = 'SELECT ROUND((';
	$values2[12] = '),2), ';
	$table[12] = ' solarRadiation ';
	$values[13] = 'SELECT ROUND((';
	$values2[13] = '),2), ';
	$table[13] = ' UV ';
	$values[14] = 'SELECT ROUND(25.4*(';
	$values2[14] = '),2), ';
	$table[14] = ' ET ';
	
	
	$valuesstore[12] = 'hi'.$weatherArray['archiveTableArray']['radiation'];
	$valuesstore[13] = 'hi'.$weatherArray['archiveTableArray']['UV'];
	$valuesstore[14] = 'hi'.$weatherArray['archiveTableArray']['ET'];
	
	
	$valuesstoretime[12] = 'hi'.$weatherArray['archiveTableArray']['radiation'].'Time';
	$valuesstoretime[13] = 'hi'.$weatherArray['archiveTableArray']['UV'].'Time';
	$valuesstoretime[14] = 'hi'.$weatherArray['archiveTableArray']['ET'].'Time';
	
	/*********** END EXTENDED VARIABLES ***********/
	
	/*********** START WORKING TIME VARIABLES *********/
	$starthour = 24 - $weatherArray['timeOffsetNum'];
	
	//Special time.  This is when the Solar/UV Sensors were installed and extended values (Rad,UV,ETC) enabled.
	$startsinceaugust08 = mktime($starthour,'00','00','08','06','2008');
	
	$startyear = mktime($starthour,'00','00','01',01,date('Y'));
	$startmonth = mktime($starthour,'00','00',date('n'),01,date('Y'));
	$startday = gmdate('Y') . gmdate('m') . gmdate('d') . $starthour . '0000';
	
	
	$weekday = getdate();
	if (date('D') == 'Sun') {
		$daysdiff = 6;
	}
	else {
		$daysdiff = $weekday['wday'] - 1;
	}

	$currentminute = date('i');
	$currenthour = date('H');
	
	$houroffset = date('H');
	$houroffsetmp = 3600*$starthour;
	$houroffset = time() - $houroffsetmp;
	
	
	$daysdiff = time() - ((3600*(24*$daysdiff)) + ($currenthour*3600) + ($currentminute*60) );   //Current Time in UNIXtime seconds minus days from Monday in seconds plus current hour and minute since midnight in seconds.
	
	$days7diff = time() - 604800; //Current time minus seven days.
	
	
	/*********** END WORKING TIME VARIABLES *********/
	
	
	/*********** START CLICKABLE ALMANAC CASES SQL VARIATIONS *********/
	switch  ($weatherArray['almanacPeriod']) { 
		
		case 'Daily': // Daily 
			$finaloffset = $houroffset;
			$dayInterval = ' WHERE ' . $weatherArray['archiveTableArray']['timeHigh'] . ' <= ' . time() . ' AND ' . $weatherArray['archiveTableArray']['timeHigh'] . ' >=  ' . $finaloffset . ';';
			$dayInterval2 = '';
			
		break;
		
		case 'TwentyFour': // 24 Hours 
			$finaloffset = time() - 24*3600; 
			$dayInterval = ' WHERE ' . $weatherArray['archiveTableArray']['timeHigh'] . ' <= ' . time() .' AND ' . $weatherArray['archiveTableArray']['timeHigh'] . ' >= '. $finaloffset .' ;';
			$dayInterval2 = '';
			
		break;
		
		case 'Weekly': // Weekly 
			if (date('D') == 'Mon') {
			$finaloffset = $houroffset;
			$and = 'AND';
			$where = ' WHERE';

			$dayIntervalHigh = ' ' . $weatherArray['archiveTableArray']['timeHigh'] . ' <= ' . time() . ' AND ' . $weatherArray['archiveTableArray']['timeHigh'] . ' >= ' . $finaloffset;
			
			$dayIntervalLow = ' ' . $weatherArray['archiveTableArray']['timeLow'] . ' <= ' . time() . ' AND ' . $weatherArray['archiveTableArray']['timeLow'] . ' >= ' . $finaloffset;
			
			}
			else {
			$finaloffset = $daysdiff;
			$and = 'AND';
			$where = ' WHERE';
			
			$dayIntervalHigh = ' ' . $weatherArray['archiveTableArray']['timeHigh'] . ' <= ' . time() .' AND ' . $weatherArray['archiveTableArray']['timeHigh'] . ' >= ' . $finaloffset;
			
			$dayIntervalLow = ' ' . $weatherArray['archiveTableArray']['timeLow'] . ' <= ' . time() .' AND ' . $weatherArray['archiveTableArray']['timeLow'] . ' >= ' . $finaloffset;
			
			}
		break;
		
		case 'Seven': // Weekly
			$finaloffset = $days7diff;
			
			$and = 'AND';
			$where = ' WHERE';
			
			$dayIntervalHigh = ' ' . $weatherArray['archiveTableArray']['timeHigh'] . ' <= ' . time() . ' AND ' . $weatherArray['archiveTableArray']['timeHigh'] . ' >= ' . $finaloffset;
			
			$dayIntervalLow = ' ' . $weatherArray['archiveTableArray']['timeLow'] . ' <= ' . time() . ' AND ' . $weatherArray['archiveTableArray']['timeLow'] . ' >= ' . $finaloffset;
			
		break;
		
		case 'Monthly': // Monthly 
			$finaloffset = $startmonth;
			$and = 'AND';
			$where = ' WHERE';
			
			$dayIntervalHigh = ' ' . $weatherArray['archiveTableArray']['timeHigh'] . ' <= ' . time() . ' AND ' . $weatherArray['archiveTableArray']['timeHigh'] . ' >= ' . $finaloffset;
			
			$dayIntervalLow = ' ' . $weatherArray['archiveTableArray']['timeLow'] . ' <= ' . time() . ' AND ' . $weatherArray['archiveTableArray']['timeLow'] . ' >= ' . $finaloffset;
			
		break;
		
		case 'Thirty': // 30 Days 
			$finaloffset = time() - 24*3600*30;
			
			$and = 'AND';
			$where = ' WHERE';
			
			$dayIntervalHigh = ' ' . $weatherArray['archiveTableArray']['timeHigh'] . ' <= ' . time() . ' AND ' . $weatherArray['archiveTableArray']['timeHigh'] . ' >= ' . $finaloffset;
			
			$dayIntervalLow = ' ' . $weatherArray['archiveTableArray']['timeLow'] . ' <= ' . time() . ' AND ' . $weatherArray['archiveTableArray']['timeLow'] . ' >= ' . $finaloffset;
			
		break;
		
		case 'ThreeSixFive': // 365 Days
			$finaloffset = time() - 24*3600*365;
			$and = 'AND';
			$where = ' WHERE';
			
			$dayIntervalHigh = ' ' . $weatherArray['archiveTableArray']['timeHigh'] . ' <= ' . time() . ' AND ' . $weatherArray['archiveTableArray']['timeHigh'] . ' >= ' . $finaloffset;
			
			$dayIntervalLow = ' ' . $weatherArray['archiveTableArray']['timeLow'] . ' <= ' . time() . ' AND ' . $weatherArray['archiveTableArray']['timeLow'] . ' >= ' . $finaloffset;
		break;
		
		case 'Yearly': // Yearly
			$finaloffset = $startyear;
			$and = 'AND';
			$where = ' WHERE';
			
			$dayIntervalHigh = ' ' . $weatherArray['archiveTableArray']['timeHigh'] . ' <= ' . time() . ' AND ' . $weatherArray['archiveTableArray']['timeHigh'] . ' >= ' . $finaloffset;
			
			$dayIntervalLow = ' ' . $weatherArray['archiveTableArray']['timeLow'] . ' <= ' . time() . ' AND ' . $weatherArray['archiveTableArray']['timeLow'] . ' >= ' . $finaloffset;
		break;
		
		case 'AllTime': // All Time 
			$and = '';
			$where = '';
			
			$dayIntervalHigh = ' ';
			
			$dayIntervalLow = ' ';
		break;
		
		case 'SearchGo': // All Time
			
			$and = 'AND';
			$where = ' WHERE';
			
			$dayIntervalHigh = ' ' . $weatherArray['archiveTableArray']['timeHigh'] . ' <= ' . $weatherArray[endtime]  . ' AND ' . $weatherArray['archiveTableArray']['timeHigh'] . ' >= ' . $weatherArray[starttime]  . ';';
			
			$dayIntervalLow = ' ' . $weatherArray['archiveTableArray']['timeLow'] . ' <= ' . $weatherArray[endtime]  . ' AND ' . $weatherArray['archiveTableArray']['timeLow'] . ' >= ' . $weatherArray[starttime]  . ';';
		break;
	}
	
	/*********** END CLICKABLE ALMANAC CASES SQL VARIATIONS *********/
	$i=0;
	$high = 'high';
	$dayWhereHigh = 'WHERE high = (SELECT MAX(high) FROM ';
	$dayWhereLow = 'WHERE low = (SELECT MIN(low) FROM ';
	$dayWhereSum = 'WHERE low = (SELECT MIN(low) FROM ';
	
	$low = 'low';
	while ($i <= 14) { // NOW RUN THE COMBINED QUERIES.	
	$sql = $values[$i] . $high . $values2[$i] . $weatherArray['archiveTableArray']['timeHigh'] . ' FROM ' . $table[$i] . $dayWhereHigh . $table[$i] . $where . $dayIntervalHigh . ') ' . $and . $dayIntervalHigh . ';';
	
	$result = mysql_query($sql);
	
	while ($row = mysql_fetch_array($result)) {
				$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value][$valuesstore[$i]] = $row[0];
				$weatherArray['SQLData'][$weatherArray['almanacPeriod']]['ClockTime'][$valuesstoretime[$i]] = $row[1];
			}
	mysql_free_result($result);
	
	// NOW WE DO THE SAME FOR LOW VALUES
	
	$sql = $values[$i] . $low . $values2[$i] . $weatherArray['archiveTableArray']['timeLow'] . ' FROM ' . $table[$i] . $dayWhereLow . $table[$i] . $where . $dayIntervalLow . ') ' . $and . $dayIntervalLow . ';';
	
	$result = mysql_query($sql);
	while ($row = mysql_fetch_array($result)) {
				$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value][$valuesstorelow[$i]] = $row[0];
				$weatherArray['SQLData'][$weatherArray['almanacPeriod']]['ClockTime'][$valuesstoretimelow[$i]] = $row[1];
			
			}
	mysql_free_result($result);
	
	$i++;
	}
	// NOW WE DO RAIN AND ET ACCUMULATIONS  SELECT ROUND(SUM(" . $weatherArray['archiveTableArray']['rain'] . "),1), DATE_FORMAT(RecordTime,'%H')HOUR from archiveext WHERE RecordTime BETWEEN 20090221211547 AND 20090222211547 GROUP BY HOUR ORDER BY RecordTime ASC;
	
	if  ($weatherArray['almanacPeriod'] != 'AllTime') {
		//Using the "$dayinterval" variable from each case above to grab the rain and ET and SUM it up.
		
	$sql = $values[6] . 'SUM(' . $weatherArray['archiveTableArray']['rain'] . ')' . $values2[6] . $weatherArray['archiveTableArray']['dateTime'] . ' FROM archive ' . $where . ' ' . $weatherArray['archiveTableArray']['dateTime'] . ' <= ' . time() . ' AND ' . $weatherArray['archiveTableArray']['dateTime'] . ' >= ' . $finaloffset . ';';
		
		$result = mysql_query($sql);
		
	
		while ($row = mysql_fetch_array($result)) {
				$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['RainSum'] = $row[0];
			}
			
		$sql = $values[14] . 'SUM(' . $weatherArray['archiveTableArray']['ET'] . ')' . $values2[14] . $weatherArray['archiveTableArray']['dateTime'] . ' FROM archive ' . $where . ' ' . $weatherArray['archiveTableArray']['dateTime'] . ' <= ' . time() . ' AND ' . $weatherArray['archiveTableArray']['dateTime'] . ' >= ' . $finaloffset . ';';
		$result = mysql_query($sql);
		
while ($row = mysql_fetch_array($result)) {
				$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['ETSum'] = $row[0];
			}
	
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['NetMoisture'] = $weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['RainSum'] - $weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['ETSum'];
	
	}
	else {
		
		//FIRST DO REGULAR ALL TIME RAIN SUM
		$sql = $values[6] . 'SUM(' . $weatherArray['archiveTableArray']['rain'] . ')),2) FROM archive;';
		
		$result = mysql_query($sql);
		
		while ($row = mysql_fetch_array($result)) {
				$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['RainSum'] = $row[0];
			}
		
		//NOW DO ALL TIME RAIN SUM SINCE AUGUST 2008 EXTENDED SENSOR INSTALL
		$sql = $values[6] . "SUM(" . $weatherArray['archiveTableArray']['rain'] . ")),2) FROM archive WHERE " . $weatherArray['archiveTableArray']['dateTime'] . " <= " . time() . " AND " . $weatherArray['archiveTableArray']['dateTime'] . " >= " . $startsinceaugust08 . ";";
		
		$result = mysql_query($sql);
	
		while ($row = mysql_fetch_array($result)) {
				$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['RainSumSinceExtended'] = $row[0];
			}
		
		//NOW GET ALL TIME ET SUM 
		$sql = $values[14] . 'SUM(' . $weatherArray['archiveTableArray']['ET'] . ')),2) FROM archive;';
	
		$result = mysql_query($sql);
	
		while ($row = mysql_fetch_array($result)) {
				$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['ETSum'] = $row[0];
			}
	
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['NetMoisture'] = $weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['RainSumSinceExtended'] - $weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['ETSum'];	
	
	}
	
	//echo $result1;
	
	
	return $weatherArray;

	}

}
?>