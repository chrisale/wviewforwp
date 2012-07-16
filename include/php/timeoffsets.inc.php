<?php

/*****************************************
This Function Converts times from UTC to locale time, You need to change the OFFSET values at the
top to your settings.  If you are not using UTC you can remove the calls to the unit conversion case functions at near the bottom.
******************************************/

function timeconverter($input, $selector, $weatherArray) 
{
putenv('TZ=PST');
$formatLong = 'l, M. d Y G:i';
$formatShort = 'l M. d Y';

if ($selector == 0) { // No Change Time add Today/Yesterday for H:D format


	
	list($hour,$minute) = split('[:]', $input);
	
/* If Station/Wview is set to UTC, use commented code
	if ($hour >= $weatherArray[timeOffsetNum])
	{ // taking care of 24 hr factor 
		$hour = $hour + $weatherArray['offset'];
	}
	else {
	$hour = ($hour + $weatherArray['offset']) + 24;
	}
*/
	$currenthour = date('H');
	
	//$hour = ($hour + $weatherArray['offset']);
	$currentminute = date('i');
	//$mindifference = $minute - $currentminute;
	
	if ($hour <= $currenthour) // Take Care of 24 values make them easier to understand
	{
		if (($hour == $currenthour)&&($minute > $currentminute))
		{
		$output = '<small> @ ' . $hour . ':' . $minute .' Ystd.</small>';
		}
	else {
		
		$output = '<small> @ ' . $hour . ':' . $minute . ' Tdy.</small>';
		}
	}

	else {
		
	
		$output = '<small> @ ' . $hour . ':' . $minute .' Ystd</small>';
	}
}

if ($selector == 1) { // Same as above, but without Today and Yesterday monikers... 

	list($hour,$minute) = split('[:]', $input);
	
	/* UNCOMMENT THIS IF YOUR STATION/WVIEW is SET TO UTC OR SOMETHING OTHER THAN LOCAL TIME
	
	/*if ($hour >= $weatherArray[timeOffsetNum])
	{ // taking care of 24 hr factor 
		$hour = $hour + $weatherArray['offset'];
	}
	else {
	$hour = ($hour - $weatherArray['offset']);
	}*/
	
	$output = $hour . ':' . $minute;
	
	
}

if ($selector == 2) { // Changes Dates with DMY Only given

$newoffset = $weatherArray['offset'] * 60 * 60;
$y = substr($input,0,4) * 1;
$M = substr($input,4,2) * 1;
$d = substr($input,6,2) * 1;

if (($M < 11) && ($y <= 2007)) { 
//THIS IS ONLY FOR CHRIS ALEMANYS STATION AS THIS WAS THE DATE THAT I SWITCHED TO UTC TIME... PRIOR TO THIS DATE I WAS PST ON THE STATION
$output = date($formatShort, (mktime(0, 0, 0, $M, $d, $y) + $newoffset));
}
else {
$output = date($formatShort, mktime(0, 0, 0, $M, $d, $y));
}
}


if ($selector == 3) { // Changes Times with Full DMY H:M 

$newoffset = $weatherArray['offset'] * 60 * 60;
$y = substr($input,0,4) * 1;
$M = substr($input,5,2) * 1;
$d = substr($input,8,2) * 1;
$h = substr($input,11,2) * 1;
$m = substr($input,14,2) * 1;

if (($M < 11) && ($y <= 2007)) { 

$output = date($formatLong, mktime($h, $m, 0, $M, $d, $y));
$output = '<small> <br \> ' . $output . '</small>';

}
else {
$output = date($formatLong, (mktime($h, $m, 0, $M, $d, $y) + $newoffset));
$output = '<small> <br \> ' . $output . '</small>';

}



} //End Selector 3


if ($selector == 4) { // Changes Times with UNIXTIME
$output = date("F d, Y H:m",$input);
$output = '<small> <br \> ' . $output . '</small>';


} //End Selector 4


return ($output);
}


/****
Converting OFFSET Dates and Times
**/
function OFFSETtimes($weatherArray) {
		
		
		$newoffset = $weatherArray['offset'] * 60 * 60;
		$formatdate = 'M d Y';
		$formattime = 'G:i:s T';
		
		if ($weatherArray['hiRainRate'] != 0){
		$weatherArray['hiRainRateTime'] = timeconverter($weatherArray['hiRainRateTime'], 0, $weatherArray);
		}
		
		$weatherArray['hiWindSpeedTime'] = timeconverter($weatherArray['hiWindSpeedTime'], 0, $weatherArray);
		$weatherArray['hiOutsideTempTime'] = timeconverter($weatherArray['hiOutsideTempTime'], 0, $weatherArray);
		$weatherArray['hiHeatindexTime'] = timeconverter($weatherArray['hiHeatindexTime'], 0, $weatherArray);
		$weatherArray['lowOutsideTempTime'] = timeconverter($weatherArray['lowOutsideTempTime'], 0, $weatherArray);
		$weatherArray['lowWindchillTime'] = timeconverter($weatherArray['lowWindchillTime'], 0, $weatherArray);
		$weatherArray['hiBarometerTime'] = timeconverter($weatherArray['hiBarometerTime'], 0, $weatherArray);
		$weatherArray['lowBarometerTime'] = timeconverter($weatherArray['lowBarometerTime'], 0, $weatherArray);
		$weatherArray['hiDewpointTime'] = timeconverter($weatherArray['hiDewpointTime'], 0, $weatherArray);
		$weatherArray['lowDewpointTime'] = timeconverter($weatherArray['lowDewpointTime'], 0, $weatherArray);
		$weatherArray['hiHumTime'] = timeconverter($weatherArray['hiHumTime'], 0, $weatherArray);
		$weatherArray['hiRadiationTime'] = timeconverter($weatherArray['hiRadiationTime'], 0, $weatherArray);
		
		$weatherArray['hiUVTime'] = timeconverter($weatherArray['hiUVTime'], 0, $weatherArray);
		
		
		$weatherArray['lowHumTime'] = timeconverter($weatherArray['lowHumTime'], 0, $weatherArray);
		$weatherArray['astroriseTime'] = timeconverter($weatherArray['astroriseTime'], 1, $weatherArray);
		$weatherArray['civilriseTime'] = timeconverter($weatherArray['civilriseTime'], 1, $weatherArray);
		$weatherArray['civilsetTime'] = timeconverter($weatherArray['civilsetTime'], 1, $weatherArray);
		$weatherArray['astrosetTime'] = timeconverter($weatherArray['astrosetTime'], 1, $weatherArray);
		$weatherArray['sunriseTime'] = timeconverter($weatherArray['sunriseTime'], 1, $weatherArray);
		$weatherArray['sunsetTime'] = timeconverter($weatherArray['sunsetTime'], 1, $weatherArray);
		
	//	echo $weatherArray['SQLData'][$weatherArray['almanacPeriod']]['ClockTime'];
		
		if (($weatherArray['almanacPeriod'] != 'Daily') && ($weatherArray['almanacPeriod'] != 'Satellite') && ($weatherArray['almanacPeriod'] != 'Search') && ($weatherArray['almanacPeriod'] != 'SearchGo') &&
		($weatherArray['almanacPeriod'] != 'SearchGoFile')) {
		foreach ($weatherArray['SQLData'][$weatherArray['almanacPeriod']]['ClockTime'] as $key => $value) {
			$weatherArray['SQLData'][$weatherArray['almanacPeriod']]['ClockTime'][$key] = timeconverter($weatherArray['SQLData'][$weatherArray['almanacPeriod']]['ClockTime'][$key], 4, $weatherArray);
							}
		}
		
		
		
		
		
		
		if ($weatherArray['stormStart'] != 0){
		$weatherArray['stormStart'] = timeconverter($weatherArray['stormStart'], 3, $weatherArray);
		}
		$weatherArray['monthtodatemaxtempdate'] = timeconverter($weatherArray['monthtodatemaxtempdate'], 2, $weatherArray);
		$weatherArray['monthtodatemaxtempdate'] = timeconverter($weatherArray['monthtodatemaxtempdate'], 2, $weatherArray);
		$weatherArray['monthtodatemintempdate'] = timeconverter($weatherArray['monthtodatemintempdate'], 2, $weatherArray);
		$weatherArray['yeartodatemaxtempdate'] = timeconverter($weatherArray['yeartodatemaxtempdate'], 2, $weatherArray);
		$weatherArray['yeartodatemintempdate'] = timeconverter($weatherArray['yeartodatemintempdate'], 2, $weatherArray);
		$weatherArray['monthtodatemaxdewptdate'] = timeconverter($weatherArray['monthtodatemaxdewptdate'], 2, $weatherArray);
		$weatherArray['monthtodatemindewptdate'] = timeconverter($weatherArray['monthtodatemindewptdate'], 2, $weatherArray);
		$weatherArray['yeartodatemaxdewptdate'] = timeconverter($weatherArray['yeartodatemaxdewptdate'], 2, $weatherArray);
		$weatherArray['yeartodatemindewptdate'] = timeconverter($weatherArray['yeartodatemindewptdate'], 2, $weatherArray);
		$weatherArray['monthtodatemaxhumiddate'] = timeconverter($weatherArray['monthtodatemaxhumiddate'], 2, $weatherArray);
		$weatherArray['monthtodateminhumiddate'] = timeconverter($weatherArray['monthtodateminhumiddate'], 2, $weatherArray);
		$weatherArray['yeartodatemaxhumiddate'] = timeconverter($weatherArray['yeartodatemaxhumiddate'], 2, $weatherArray);
		$weatherArray['yeartodateminhumiddate'] = timeconverter($weatherArray['yeartodateminhumiddate'], 2, $weatherArray);
		$weatherArray['monthtodateminchilldate'] = timeconverter($weatherArray['monthtodateminchilldate'], 2, $weatherArray);
		$weatherArray['yeartodateminchilldate'] = timeconverter($weatherArray['yeartodateminchilldate'], 2, $weatherArray);
		$weatherArray['monthtodatemaxheatdate'] = timeconverter($weatherArray['monthtodatemaxheatdate'], 2, $weatherArray);
		$weatherArray['yeartodatemaxheatdate'] = timeconverter($weatherArray['yeartodatemaxheatdate'], 2, $weatherArray);
		$weatherArray['monthtodatemaxgustdate'] = timeconverter($weatherArray['monthtodatemaxgustdate'], 2, $weatherArray);
		$weatherArray['yeartodatemaxgustdate'] = timeconverter($weatherArray['yeartodatemaxgustdate'], 2, $weatherArray);
		$weatherArray['monthtodatemaxbaromdate'] = timeconverter($weatherArray['monthtodatemaxbaromdate'], 2, $weatherArray);
		$weatherArray['monthtodateminbaromdate'] = timeconverter($weatherArray['monthtodateminbaromdate'], 2, $weatherArray);
		$weatherArray['yeartodatemaxbaromdate'] = timeconverter($weatherArray['yeartodatemaxbaromdate'], 2, $weatherArray);
		$weatherArray['monthtodatemaxrainratedate'] = timeconverter($weatherArray['monthtodatemaxrainratedate'], 2, $weatherArray);
		$weatherArray['yeartodatemaxrainratedate'] = timeconverter($weatherArray['yeartodatemaxrainratedate'], 2, $weatherArray);
		$tempdate = $weatherArray['stationDate']; 
		$temptime = $weatherArray['stationTime'];
		
		$y = substr($tempdate,0,4);
		$M = substr($tempdate,4,2);
		$d = substr($tempdate,6,2);
		list($h,$m,$s) = split('[:]', $temptime);
		
		$weatherArray['stationDate'] = date($formatdate, (mktime($h, $m, $s, $M, $d, $y)));
		
		
		$weatherArray['stationTime'] = date($formattime, (mktime($h, $m, $s, $M, $d, $y)));
		
		//CALCULATING HOURS OF DAYLIGHT
		$weatherArray['dawnToDuskTime'] = $weatherArray['civilsetTime'] - $weatherArray['civilriseTime'];
		
		
		//This is a Check that the Weather Station is sending current data.. ie. has it crashed... if the difference between now and than it the offset then we know something is wrong.  The Station is UTC so it's going to be ahead of current time for my timezone... you will want to shoot for your configuration
		
		$checknow = time();
		$checkstation = $weatherArray['SQLData']['RecordTime'][0];
		$checkdifference = time() - $checkstation;  
		//echo $checknow;
		//echo '--';
		//echo $checkstation;
		//echo '--';
		//echo $checkdifference;
		if ($checkdifference < 24500) {
		
		$weatherArray['stationDate'] = date($formatdate); //Insert Current Date
		$weatherArray['stationTime'] = $weatherArray['stationTime'] . ' <strong>Weather Data Delayed</strong>'; //Insert Message
		$to = "chrisale@gmail.com";
		$subject = "Weather Station Down";
		$body = "Weather Station Down. Last Update at " . $weatherArray['stationTime'];
		mail($to, $subject, $body);
		}
		return $weatherArray;

}



?>