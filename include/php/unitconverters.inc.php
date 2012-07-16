<?php
/**************
This file includes all data processing applications for the WVIEW template.
This file is loaded automatically by Wordpress
***************/

//include('wp-content/themes/alberniweather/include/php/master.inc.php'); // for later date


/*****************************************
First we have functions to do basic operations and calculations
******************************************/
function TemptoF($input) {
$output = round(($input*(9/5) + 32), 2);
return ($output);
}

function FtoC($input) {
$output = (0.55555*($input-32));
return ($output);
}

function BaromtokpA($input) {
$output = round(($input / 10), 2);
return ($output);
}

function BaromIntomb($input) {
$output = round(($input * 33.8637526), 2);
return ($output);
}

function Baromtoinch($input) {
$output = round(((29.92 * $input) / 1013.25), 2);
return ($output);
}

function RaintoInch($input) {
$output = round((0.03937 * $input), 2);
return ($output);
}

function InchtoMM($input) {
$output = round(($input * 25.4), 2);
return ($output);
}

function mphtokph($input) {
$output = round(($input * 1.609344), 1);
return ($output);
}

function kphtomph($input) {
$output = round(($input / 1.609344), 1);
return ($output);
}

function kphtomps($input) {
$output = round(($input * 0.277777778), 1);
return ($output);
}

function kphtoknot($input) {
$output = round(($input * 0.539593), 1);
return ($output);
}

function KMtomiles($input) {
$output = round(($input * 0.62), 1);
return ($output);
}

function KMtonautm($input) {
$output = round(($input * 0.539956803), 1);
return ($output);
}

function metertoft($input) {
$output = round(($input * 3.28084), 1);
return ($output);
}

function fttometer($input) {
$output = round(($input * 0.3048), 1);
return ($output);
}

function kgpmtolbspft($input) {
//actually this is to lbs per inch
$output = round(($input * 35.27396), 3); //to pounds
$output = round(($output / 35.31467), 3); //to cubic feet
return ($output);
}

function wattmetertowattft($input) {
$output = round(($input / 10.76391), 1);
return ($output);
}


/****
Converting kg to lbs
**/

function convertdatakgtolbs($weatherArray) {
		$weatherArray['airDensity'] = kgpmtolbspft($weatherArray['airDensity']);
		
	return $weatherArray;
}

/****
Converting meters to feet
**/
function convertdatameterttoft($weatherArray) {
		$weatherArray['cumulusBase'] = metertoft($weatherArray['cumulusBase']);
		
	return $weatherArray;
}


/****
Converting feet to meter
**/

function convertdataftttometer($weatherArray) {
		if (($weatherArray['cumulusBase'] > 400) || ($weatherArray['rainRate'] > 0)) {
			$weatherArray['freezingLevel'] = fttometer($weatherArray['freezingLevel']);
		}
	return $weatherArray;
}



/*****************************************
These are the generic functions that take the individual values and run them through the processors.
******************************************/

/****
Calculating Freezing Level
**/
function calculateFreezingLevel($weatherArray) {

	
	
	if (($weatherArray['cumulusBase'] > 400) || ($weatherArray['rainRate'] > 0)) {
		$weatherArray['freezingLevel'] = 0; //Put in station Elevation Manually
		$counttemp = $weatherArray['outsideTemp']; 
		
		while (($counttemp > $weatherArray['outsideDewPt']) && ($counttemp > 0.0)) {
		
			$weatherArray['freezingLevel'] = $weatherArray['freezingLevel'] + 1000;
			$counttemp = $counttemp - 1.5;
		
		}	
	
	
		while ($counttemp > 0.0) {
		
			$weatherArray['freezingLevel'] = $weatherArray['freezingLevel'] + 1000;
			$counttemp = $counttemp - 3;
		
		}	
	}
	else {
		$weatherArray['freezingLevel'] = 'Inversion likely --';
	}
	return $weatherArray;
}

function calculateWindPowerDensity($weatherArray) {

	$weatherArray['windPowerDensity'] = round(0.5 * $weatherArray['airDensity'] * pow(($weatherArray['windSpeed']*0.277777778),3),0);

	return $weatherArray;


}
function cumulusBase($weatherArray) { //Cumulus Base computation because it doesn't seem to be coming through WVIEW Software

		$weatherArray['cumulusBase'] = round(((($weatherArray['outsideTemp'] - $weatherArray['outsideDewPt']) / 4.5) * 1000) + $weatherArray['stationElevation'], 1);
		return $weatherArray;

}

function calcSolarPotential($weatherArray) { //Calculate Solar Potential of current reading over 1 hour with 1 198W, from one 77 cell (.08m x .015m per cell) panel with an area of 0.924 square metres with 12% efficiency cells and 95.5% efficient inverter.

		$weatherArray['solarPotential'] = round((($weatherArray['solarRad'] * 0.924) * 0.12 * 0.955),1);
		return $weatherArray;

}

/****
Converting hpa/mb to kPa
**/
function convertdataBaromtokPa($weatherArray, $check) {
	
	if ($check != 0) {
		$weatherArray['stationPressure'] = BaromtokpA($weatherArray['stationPressure']);
		$weatherArray['barometer'] = BaromtokpA($weatherArray['barometer']); 
		$weatherArray['hiBarometer'] = BaromtokpA($weatherArray['hiBarometer']);
		$weatherArray['lowBarometer'] = BaromtokpA($weatherArray['lowBarometer']);
		$weatherArray['hiMonthlyBarometer'] = BaromtokpA($weatherArray['hiMonthlyBarometer']);
		$weatherArray['lowMonthlyBarometer'] = BaromtokpA($weatherArray['lowMonthlyBarometer']);
		$weatherArray['hiYearlyBarometer'] = BaromtokpA($weatherArray['hiYearlyBarometer']);
		$weatherArray['lowYearlyBarometer'] = BaromtokpA($weatherArray['lowYearlyBarometer']);
		$weatherArray['houravgbarom'] = BaromtokpA($weatherArray['houravgbarom']);
		$weatherArray['hourchangebarom'] = BaromtokpA($weatherArray['hourchangebarom']);
		$weatherArray['dayavgbarom'] = BaromtokpA($weatherArray['dayavgbarom']);
		$weatherArray['daychangebarom'] = BaromtokpA($weatherArray['daychangebarom']);
		$weatherArray['weekavgbarom'] = BaromtokpA($weatherArray['weekavgbarom']);
		$weatherArray['weekchangebarom'] = BaromtokpA($weatherArray['weekchangebarom']);
		$weatherArray['monthtodateavgbarom'] = BaromtokpA($weatherArray['monthtodateavgbarom']);
		$weatherArray['yeartodateavgbarom'] = BaromtokpA($weatherArray['yeartodateavgbarom']);
		
		if (($_GET['almanacPeriod'] == 'SearchGo') || $_GET['almanacPeriod'] == 'SearchGoFile') {
		foreach ($weatherArray['SQLDataCustom']['barometer'] as $key => $value) {
			$weatherArray['SQLDataCustom']['barometer'][$key] = BaromtokpA($value);
		}
		}
		
		//Database Conversions
		if ($weatherArray['weatherperiod']['Custom'] != TRUE) {
		switch  ($weatherArray['weatherperiod']) { 
		
		case '1': // Weekly - will do 24hr as well
			foreach ($weatherArray['SQLDataWeekly']['barometer'] as $key => $value) {
				$weatherArray['SQLDataWeekly']['barometer'][$key] = BaromtokpA($weatherArray['SQLDataWeekly']['barometer'][$key]);
			}
			
			foreach ($weatherArray['SQLData']['barometer'] as $key=>$value) {
				$weatherArray['SQLData']['barometer'][$key] = BaromtokpA($weatherArray['SQLData']['barometer'][$key]);
			}
			break;
	
		case '2': // Monthly - will do 24hr as well
			foreach ($weatherArray['SQLDataMonthly']['barometer'] as $key=>$value) {
				$weatherArray['SQLDataMonthly']['barometer'][$key] = BaromtokpA($weatherArray['SQLDataMonthly']['barometer'][$key]);
			}
			
			foreach ($weatherArray['SQLData']['barometer'] as $key=>$value) {
				$weatherArray['SQLData']['barometer'][$key] = BaromtokpA($weatherArray['SQLData']['barometer'][$key]);
			}
			break;
		
		case '3': // Yearly - will do 24hr as well
			foreach ($weatherArray['SQLDataYearly']['barometer'] as $key=>$value) {
				$weatherArray['SQLDataYearly']['barometer'][$key] = BaromtokpA($weatherArray['SQLDataYearly']['barometer'][$key]);
			}
			break;
		
		case '*': // Weekly - will do 24hr as well
			foreach ($weatherArray['SQLData']['barometer'] as $key=>$value) {
				$weatherArray['SQLData']['barometer'][$key] = BaromtokpA($weatherArray['SQLData']['barometer'][$key]);
			}
			break;
		
		}
		
		}
		
		
		
		switch ($weatherArray['baromtrend']) { //I like arrows instead of plus and minus signs for the barometer trend.
			case '+':
				$weatherArray['baromtrend'] = '&uarr;';
				break;
			case '-':
				$weatherArray['baromtrend'] = '&darr;';
				break;
			case '~':
				$weatherArray['baromtrend'] = '&harr;';
				break;
			}
		
		}
	else {
		$weatherArray['barometer'] = $weatherArray['barometer'] * 1; //just multiply it to force PHP to strip out any non-numbers without changing the value.
		
		switch ($weatherArray['baromtrend']) { //I like arrows instead of plus and minus signs for the barometer trend.
			case '+':
				$weatherArray['baromtrend'] = '&uarr;';
				break;
			case '-':
				$weatherArray['baromtrend'] = '&darr;';
				break;
			case '~':
				$weatherArray['baromtrend'] = '&harr;';
				break;
			}
		
	}
		
	return $weatherArray;
}

/****
Converting degrees C to F
**/
function convertdataCtoF($weatherArray) {
	//Temp Conversion
		$weatherArray['outsideTemp'] = TemptoF($weatherArray['outsideTemp']);
		$weatherArray['insideTemp'] = TemptoF($weatherArray['insideTemp']);
		$weatherArray['extraTemp1'] = TemptoF($weatherArray['extraTemp1']);
		$weatherArray['extraTemp2'] = TemptoF($weatherArray['extraTemp2']);
		$weatherArray['extraTemp3'] = TemptoF($weatherArray['extraTemp3']);
		$weatherArray['hiOutsideTemp'] = TemptoF($weatherArray['hiOutsideTemp']);
		$weatherArray['lowOutsideTemp'] = TemptoF($weatherArray['lowOutsideTemp']);
		$weatherArray['hiMonthlyOutsideTemp'] = TemptoF($weatherArray['hiMonthlyOutsideTemp']);
		$weatherArray['lowMonthlyOutsideTemp'] = TemptoF($weatherArray['lowMonthlyOutsideTemp']);
		$weatherArray['hiYearlyOutsideTemp'] = TemptoF($weatherArray['hiYearlyOutsideTemp']);
		$weatherArray['lowYearlyOutsideTemp'] = TemptoF($weatherArray['lowYearlyOutsideTemp']);
		$weatherArray['houravgtemp'] = TemptoF($weatherArray['houravgtemp']);
		$weatherArray['hourchangetemp'] = TemptoF($weatherArray['hourchangetemp']);
		$weatherArray['dayavgtemp'] = TemptoF($weatherArray['dayavgtemp']);
		$weatherArray['daychangetemp'] = TemptoF($weatherArray['daychangetemp']);
		$weatherArray['weekavgtemp'] = TemptoF($weatherArray['weekavgtemp']);
		$weatherArray['weekchangetemp'] = TemptoF($weatherArray['weekchangetemp']);
		$weatherArray['monthtodateavgtemp'] = TemptoF($weatherArray['monthtodateavgtemp']);
		$weatherArray['monthtodatemaxtempdate'] = TemptoF($weatherArray['monthtodatemaxtempdate']);
		$weatherArray['monthtodatemintempdate'] = TemptoF($weatherArray['monthtodatemintempdate']);
		$weatherArray['yeartodateavgtemp'] = TemptoF($weatherArray['yeartodateavgtemp']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hioutTemp'] = TemptoF($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hioutTemp']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['lowoutTemp'] = TemptoF($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['lowoutTemp']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiinTemp'] = TemptoF($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiinTemp']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['lowinTemp'] = TemptoF($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['lowinTemp']);
			
	
	//Dewpoint Conversion
		$weatherArray['outsideDewPt'] = TemptoF($weatherArray['outsideDewPt']);
		$weatherArray['hiDewpoint'] = TemptoF($weatherArray['hiDewpoint']);
		$weatherArray['lowDewpoint'] = TemptoF($weatherArray['lowDewpoint']);
		$weatherArray['hiMonthlyDewpoint'] = TemptoF($weatherArray['hiMonthlyDewpoint']);
		$weatherArray['lowMonthlyDewpoint'] = TemptoF($weatherArray['lowMonthlyDewpoint']);
		$weatherArray['hiYearlyDewpoint'] = TemptoF($weatherArray['hiYearlyDewpoint']);
		$weatherArray['lowYearlyDewpoint'] = TemptoF($weatherArray['lowYearlyDewpoint']);
		$weatherArray['houravgdewpt'] = TemptoF($weatherArray['houravgdewpt']);
		$weatherArray['hourchangedewpt'] = TemptoF($weatherArray['hourchangedewpt']);
		$weatherArray['dayavgdewpt'] = TemptoF($weatherArray['dayavgdewpt']);
		$weatherArray['daychangedewpt'] = TemptoF($weatherArray['daychangedewpt']);
		$weatherArray['weekavgdewpt'] = TemptoF($weatherArray['weekavgdewpt']);
		$weatherArray['weekchangedewpt'] = TemptoF($weatherArray['weekchangedewpt']);
		$weatherArray['monthtodateavgdewpt'] = TemptoF($weatherArray['monthtodateavgdewpt']);
		$weatherArray['yeartodateavgdewpt'] = TemptoF($weatherArray['yeartodateavgdewpt']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiDewpoint'] = TemptoF($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiDewpoint']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['lowDewpoint'] = TemptoF($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['lowDewpoint']);
		
	//Windchill Conversions
		$weatherArray['windChill'] = TemptoF($weatherArray['windChill']);
		$weatherArray['intervalAvgWindChill'] = TemptoF($weatherArray['intervalAvgWindChill']);
		$weatherArray['lowWindchill'] = TemptoF($weatherArray['lowWindchill']);
		$weatherArray['lowMonthlyWindchill'] = TemptoF($weatherArray['lowMonthlyWindchill']);
		$weatherArray['lowYearlyWindchill'] = TemptoF($weatherArray['lowYearlyWindchill']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['lowWindchill'] = TemptoF($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['lowWindchill']);
		
	//HeatIndex Conversions
		$weatherArray['outsideHeatIndex'] = TemptoF($weatherArray['outsideHeatIndex']);
		$weatherArray['hiHeatindex'] = TemptoF($weatherArray['hiHeatindex']);
		$weatherArray['hiMonthlyHeatindex'] = TemptoF($weatherArray['hiMonthlyHeatindex']);
		$weatherArray['hiYearlyHeatindex'] = TemptoF($weatherArray['hiYearlyHeatindex']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiHeatindex'] = TemptoF($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiHeatindex']);
		
	//Database Conversions		
	
	if (($_GET['almanacPeriod'] == 'SearchGo') || $_GET['almanacPeriod'] == 'SearchGoFile') {
		foreach ($weatherArray['SQLDataCustom']['OutTemp'] as $key => $value) {
			$weatherArray['SQLDataCustom']['OutTemp'][$key] = TemptoF($value);
		}
		foreach ($weatherArray['SQLDataCustom']['InTemp'] as $key => $value) {
			$weatherArray['SQLDataCustom']['InTemp'][$key] = TemptoF($value);
		}
		foreach ($weatherArray['SQLDataCustom']['windChill'] as $key => $value) {
			$weatherArray['SQLDataCustom']['windChill'][$key] = TemptoF($value);
		}
		foreach ($weatherArray['SQLDataCustom']['Dewpoint'] as $key => $value) {
			$weatherArray['SQLDataCustom']['Dewpoint'][$key] = TemptoF($value);
		}
		foreach ($weatherArray['SQLDataCustom']['HeatIndex'] as $key => $value) {
			$weatherArray['SQLDataCustom']['HeatIndex'][$key] = TemptoF($value);
		}
		
	}

	switch($weatherArray['weatherperiod']) { 
	
			case '*': // DEFAULT
			$i = 0;
			while ($i < 288) {
				$weatherArray['SQLData']['OutTemp'][$i] = TemptoF($weatherArray['SQLData']['OutTemp'][$i]);
				$weatherArray['SQLData']['hioutTemp'][$i] = TemptoF($weatherArray['SQLData']['hioutTemp'][$i]);
				$weatherArray['SQLData']['lowoutTemp'][$i] = TemptoF($weatherArray['SQLData']['lowoutTemp'][$i]);
				$weatherArray['SQLData']['InTemp'] = TemptoF($weatherArray['SQLData']['InTemp'][$i]);
				$weatherArray['SQLData']['Dewpoint'][$i] = TemptoF($weatherArray['SQLData']['Dewpoint'][$i]);
				$weatherArray['SQLData']['windChill'][$i] = TemptoF($weatherArray['SQLData']['windChill'][$i]);
				$weatherArray['SQLData']['HeatIndex'][$i] = TemptoF($weatherArray['SQLData']['HeatIndex'][$i]);
				$i++;
			}
			break;
			}		
	return $weatherArray;
}

function convertdataFtoC($weatherArray) {
	//Temp Conversion
		$weatherArray['outsideTemp'] = FtoC($weatherArray['outsideTemp']);
		$weatherArray['insideTemp'] = FtoC($weatherArray['insideTemp']);
		$weatherArray['extraTemp1'] = FtoC($weatherArray['extraTemp1']);
		$weatherArray['extraTemp2'] = FtoC($weatherArray['extraTemp2']);
		$weatherArray['extraTemp3'] = FtoC($weatherArray['extraTemp3']);
		$weatherArray['hiOutsideTemp'] = FtoC($weatherArray['hiOutsideTemp']);
		$weatherArray['lowOutsideTemp'] = FtoC($weatherArray['lowOutsideTemp']);
		$weatherArray['hiMonthlyOutsideTemp'] = FtoC($weatherArray['hiMonthlyOutsideTemp']);
		$weatherArray['lowMonthlyOutsideTemp'] = FtoC($weatherArray['lowMonthlyOutsideTemp']);
		$weatherArray['hiYearlyOutsideTemp'] = FtoC($weatherArray['hiYearlyOutsideTemp']);
		$weatherArray['lowYearlyOutsideTemp'] = FtoC($weatherArray['lowYearlyOutsideTemp']);
		$weatherArray['houravgtemp'] = FtoC($weatherArray['houravgtemp']);
		$weatherArray['hourchangetemp'] = FtoC($weatherArray['hourchangetemp']);
		$weatherArray['dayavgtemp'] = FtoC($weatherArray['dayavgtemp']);
		$weatherArray['daychangetemp'] = FtoC($weatherArray['daychangetemp']);
		$weatherArray['weekavgtemp'] = FtoC($weatherArray['weekavgtemp']);
		$weatherArray['weekchangetemp'] = FtoC($weatherArray['weekchangetemp']);
		$weatherArray['monthtodateavgtemp'] = FtoC($weatherArray['monthtodateavgtemp']);
		$weatherArray['monthtodatemaxtempdate'] = FtoC($weatherArray['monthtodatemaxtempdate']);
		$weatherArray['monthtodatemintempdate'] = FtoC($weatherArray['monthtodatemintempdate']);
		$weatherArray['yeartodateavgtemp'] = FtoC($weatherArray['yeartodateavgtemp']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hioutTemp'] = FtoC($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hioutTemp']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['lowoutTemp'] = FtoC($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['lowoutTemp']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiinTemp'] = FtoC($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiinTemp']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['lowinTemp'] = FtoC($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['lowinTemp']);
			
	
	//Dewpoint Conversion
		$weatherArray['outsideDewPt'] = FtoC($weatherArray['outsideDewPt']);
		$weatherArray['hiDewpoint'] = FtoC($weatherArray['hiDewpoint']);
		$weatherArray['lowDewpoint'] = FtoC($weatherArray['lowDewpoint']);
		$weatherArray['hiMonthlyDewpoint'] = FtoC($weatherArray['hiMonthlyDewpoint']);
		$weatherArray['lowMonthlyDewpoint'] = FtoC($weatherArray['lowMonthlyDewpoint']);
		$weatherArray['hiYearlyDewpoint'] = FtoC($weatherArray['hiYearlyDewpoint']);
		$weatherArray['lowYearlyDewpoint'] = FtoC($weatherArray['lowYearlyDewpoint']);
		$weatherArray['houravgdewpt'] = FtoC($weatherArray['houravgdewpt']);
		$weatherArray['hourchangedewpt'] = FtoC($weatherArray['hourchangedewpt']);
		$weatherArray['dayavgdewpt'] = FtoC($weatherArray['dayavgdewpt']);
		$weatherArray['daychangedewpt'] = FtoC($weatherArray['daychangedewpt']);
		$weatherArray['weekavgdewpt'] = FtoC($weatherArray['weekavgdewpt']);
		$weatherArray['weekchangedewpt'] = FtoC($weatherArray['weekchangedewpt']);
		$weatherArray['monthtodateavgdewpt'] = FtoC($weatherArray['monthtodateavgdewpt']);
		$weatherArray['yeartodateavgdewpt'] = FtoC($weatherArray['yeartodateavgdewpt']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiDewpoint'] = FtoC($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiDewpoint']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['lowDewpoint'] = FtoC($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['lowDewpoint']);
		
	//Windchill Conversions
		$weatherArray['windChill'] = FtoC($weatherArray['windChill']);
		$weatherArray['intervalAvgWindChill'] = FtoC($weatherArray['intervalAvgWindChill']);
		$weatherArray['lowWindchill'] = FtoC($weatherArray['lowWindchill']);
		$weatherArray['lowMonthlyWindchill'] = FtoC($weatherArray['lowMonthlyWindchill']);
		$weatherArray['lowYearlyWindchill'] = FtoC($weatherArray['lowYearlyWindchill']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['lowWindchill'] = FtoC($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['lowWindchill']);
		
	//HeatIndex Conversions
		$weatherArray['outsideHeatIndex'] = FtoC($weatherArray['outsideHeatIndex']);
		$weatherArray['hiHeatindex'] = FtoC($weatherArray['hiHeatindex']);
		$weatherArray['hiMonthlyHeatindex'] = FtoC($weatherArray['hiMonthlyHeatindex']);
		$weatherArray['hiYearlyHeatindex'] = FtoC($weatherArray['hiYearlyHeatindex']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiHeatindex'] = FtoC($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiHeatindex']);
		
	//Database Conversions		
	
	if (($_GET['almanacPeriod'] == 'SearchGo') || $_GET['almanacPeriod'] == 'SearchGoFile') {
		foreach ($weatherArray['SQLDataCustom']['OutTemp'] as $key => $value) {
			$weatherArray['SQLDataCustom']['OutTemp'][$key] = FtoC($value);
		}
		foreach ($weatherArray['SQLDataCustom']['InTemp'] as $key => $value) {
			$weatherArray['SQLDataCustom']['InTemp'][$key] = FtoC($value);
		}
		foreach ($weatherArray['SQLDataCustom']['windChill'] as $key => $value) {
			$weatherArray['SQLDataCustom']['windChill'][$key] = FtoC($value);
		}
		foreach ($weatherArray['SQLDataCustom']['Dewpoint'] as $key => $value) {
			$weatherArray['SQLDataCustom']['Dewpoint'][$key] = FtoC($value);
		}
		foreach ($weatherArray['SQLDataCustom']['HeatIndex'] as $key => $value) {
			$weatherArray['SQLDataCustom']['HeatIndex'][$key] = FtoC($value);
		}
		
	}

	switch($weatherArray['weatherperiod']) { 
	
			case '*': // DEFAULT
			$i = 0;
			while ($i < 288) {
				$weatherArray['SQLData']['OutTemp'][$i] = FtoC($weatherArray['SQLData']['OutTemp'][$i]);
				$weatherArray['SQLData']['hioutTemp'][$i] = FtoC($weatherArray['SQLData']['hioutTemp'][$i]);
				$weatherArray['SQLData']['lowoutTemp'][$i] = FtoC($weatherArray['SQLData']['lowoutTemp'][$i]);
				$weatherArray['SQLData']['InTemp'] = FtoC($weatherArray['SQLData']['InTemp'][$i]);
				$weatherArray['SQLData']['Dewpoint'][$i] = FtoC($weatherArray['SQLData']['Dewpoint'][$i]);
				$weatherArray['SQLData']['windChill'][$i] = FtoC($weatherArray['SQLData']['windChill'][$i]);
				$weatherArray['SQLData']['HeatIndex'][$i] = FtoC($weatherArray['SQLData']['HeatIndex'][$i]);
				$i++;
			}
			break;
			}		
	return $weatherArray;
}

/****
Converting hpa/mb to inches
**/
function convertdataBaromtoInch($weatherArray) {
		$weatherArray['stationPressure'] = Baromtoinch($weatherArray['stationPressure']);
		$weatherArray['barometer'] = Baromtoinch($weatherArray['barometer']);
		$weatherArray['hiBarometer'] = Baromtoinch($weatherArray['hiBarometer']);
		$weatherArray['lowBarometer'] = Baromtoinch($weatherArray['lowBarometer']);
		$weatherArray['hiMonthlyBarometer'] = Baromtoinch($weatherArray['hiMonthlyBarometer']);
		$weatherArray['lowMonthlyBarometer'] = Baromtoinch($weatherArray['lowMonthlyBarometer']);
		$weatherArray['hiYearlyBarometer'] = Baromtoinch($weatherArray['hiYearlyBarometer']);
		$weatherArray['lowYearlyBarometer'] = Baromtoinch($weatherArray['lowYearlyBarometer']);
		$weatherArray['houravgbarom'] = Baromtoinch($weatherArray['houravgbarom']);
		$weatherArray['hourchangebarom'] = Baromtoinch($weatherArray['hourchangebarom']);
		$weatherArray['dayavgbarom'] = Baromtoinch($weatherArray['dayavgbarom']);
		$weatherArray['daychangebarom'] = Baromtoinch($weatherArray['daychangebarom']);
		$weatherArray['weekavgbarom'] = Baromtoinch($weatherArray['weekavgbarom']);
		$weatherArray['weekchangebarom'] = Baromtoinch($weatherArray['weekchangebarom']);
		$weatherArray['monthtodateavgbarom'] = Baromtoinch($weatherArray['monthtodateavgbarom']);
		$weatherArray['yeartodateavgbarom'] =  Baromtoinch($weatherArray['yeartodateavgbarom']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiBarometer'] = Baromtoinch($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiBarometer']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['lowBarometer'] = Baromtoinch($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['lowBarometer']);
	
	
		if (($_GET['almanacPeriod'] == 'SearchGo') || $_GET['almanacPeriod'] == 'SearchGoFile') {
		foreach ($weatherArray['SQLDataCustom']['barometer'] as $key => $value) {
			$weatherArray['SQLDataCustom']['barometer'][$key] = Baromtoinch($value);
		}
		
	}
	
	
		switch ($weatherArray['baromtrend']) { //I like arrows instead of plus and minus signs for the barometer trend.
			case '+':
				$weatherArray['baromtrend'] = '&uarr;';
				break;
			case '-':
				$weatherArray['baromtrend'] = '&darr;';
				break;
			case '~':
				$weatherArray['baromtrend'] = '&harr;';
				break;
			}
		//Database Conversions		
		$i = 0;
			while ($i < 288) {
				$weatherArray['SQLData']['barometer'][$i] = Baromtoinch($weatherArray['SQLData']['barometer'][$i]);
				$i++;
			}
	return $weatherArray;
}

/****
Converting mm to Inch
**/
function convertdataMMtoInch($weatherArray) {
		$weatherArray['SQLData']['RainPeriodSum'] = RaintoInch($weatherArray['SQLData']['RainPeriodSum']);
		$weatherArray['rainRate'] = RaintoInch($weatherArray['rainRate']);
		$weatherArray['dailyRain'] = RaintoInch($weatherArray['dailyRain']);
		$weatherArray['monthlyRain'] = RaintoInch($weatherArray['monthlyRain']);
		$weatherArray['stormRain'] = RaintoInch($weatherArray['stormRain']);
		$weatherArray['totalRain'] = RaintoInch($weatherArray['totalRain']);
		$weatherArray['hiRainRate'] = RaintoInch($weatherArray['hiRainRate']);
		$weatherArray['hiMonthlyRainRate'] = RaintoInch($weatherArray['hiMonthlyRainRate']);
		$weatherArray['hiYearlyRainRate'] = RaintoInch($weatherArray['hiYearlyRainRate']);
		$weatherArray['hourrain'] = RaintoInch($weatherArray['hourrain']);
		$weatherArray['ET'] = RaintoInch($weatherArray['ET']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['RainSum'] = RaintoInch($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['RainSum']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['ETSum'] = RaintoInch($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['ETSum']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['NetMoisture'] = RaintoInch($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['NetMoisture']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiRainRate'] = RaintoInch($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiRainRate']);
		
		//Database Conversions		
		
		if (($_GET['almanacPeriod'] == 'SearchGo') || $_GET['almanacPeriod'] == 'SearchGoFile') {
		foreach ($weatherArray['SQLDataCustom']['Rain'] as $key => $value) {
			$weatherArray['SQLDataCustom']['Rain'][$key] = RaintoInch($value);
		}
		
		foreach ($weatherArray['SQLDataCustom']['hiRainRate'] as $key => $value) {
			$weatherArray['SQLDataCustom']['hiRainRate'][$key] = RaintoInch($value);
		}
		
		foreach ($weatherArray['SQLDataCustom']['ET'] as $key => $value) {
			$weatherArray['SQLDataCustom']['ET'][$key] = RaintoInch($value);
		}
		
		}
		
		
		$i = 0;
			while ($i < 288) {
				$weatherArray['SQLData']['Rain'][$i] = RaintoInch($weatherArray['SQLData']['Rain'][$i]);
				if ($i < 24) {
				$weatherArray['SQLData']['Rain24HourlySum'][$i] = RaintoInch($weatherArray['SQLData']['Rain24HourlySum'][$i]);
				}
				$i++;
			}


	return $weatherArray;
}

/****
Converting kph to mph
**/
function convertdatakphtomph($weatherArray) {
	
		$weatherArray['windSpeed'] = kphtomph($weatherArray['windSpeed']);
		$weatherArray['intervalAvgWindSpeed'] = kphtomph($weatherArray['intervalAvgWindSpeed']);
		$weatherArray['windGustSpeed'] = kphtomph($weatherArray['windGustSpeed']);
		$weatherArray['hiWindSpeed'] = kphtomph($weatherArray['hiWindSpeed']);
		$weatherArray['hiMonthlyWindSpeed'] = kphtomph($weatherArray['hiMonthlyWindSpeed']);
		$weatherArray['hiYearlyWindSpeed'] = kphtomph($weatherArray['hiYearlyWindSpeed']);
		$weatherArray['houravgwind'] = kphtomph($weatherArray['houravgwind']);
		$weatherArray['hourchangewind'] = kphtomph($weatherArray['hourchangewind']);
		$weatherArray['dayavgwind'] = kphtomph($weatherArray['dayavgwind']);
		$weatherArray['daychangewind'] = kphtomph($weatherArray['daychangewind']);
		$weatherArray['weekavgwind'] = kphtomph($weatherArray['weekavgwind']);
		$weatherArray['weekchangewind'] = kphtomph($weatherArray['weekchangewind']);
		$weatherArray['monthtodateavgwind'] = kphtomph($weatherArray['monthtodateavgwind']);
		$weatherArray['yeartodateavgwind'] = kphtomph($weatherArray['yeartodateavgwind']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiwindGust'] = kphtomph($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiwindGust']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiWindSpeed'] = kphtomph($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiWindSpeed']);
		
		
		//Database Conversions		
		
		if (($_GET['almanacPeriod'] == 'SearchGo') || $_GET['almanacPeriod'] == 'SearchGoFile') {
		foreach ($weatherArray['SQLDataCustom']['windSpeed'] as $key => $value) {
			$weatherArray['SQLDataCustom']['windSpeed'][$key] = kphtomph($value);
		}
		
		foreach ($weatherArray['SQLDataCustom']['hiWindSpeed'] as $key => $value) {
			$weatherArray['SQLDataCustom']['hiWindSpeed'][$key] = kphtomph($value);
		}
		
		}
		
		
		$i = 0;
			while ($i < 288) {
				$weatherArray['SQLData']['windSpeed'][$i] = kphtomph($weatherArray['SQLData']['windSpeed'][$i]);
				$weatherArray['SQLData']['hiWindSpeed'][$i] = kphtomph($weatherArray['SQLData']['hiWindSpeed'][$i]);
				$i++;
			}

		
	return $weatherArray;
}

/****
Converting kph to knot
**/
function convertdatakphtoknot($weatherArray) {
		
		$weatherArray['windSpeed'] = kphtoknot($weatherArray['windSpeed']);
		$weatherArray['intervalAvgWindSpeed'] = kphtoknot($weatherArray['intervalAvgWindSpeed']);
		$weatherArray['windGustSpeed'] = kphtoknot($weatherArray['windGustSpeed']);
		$weatherArray['hiWindSpeed'] = kphtoknot($weatherArray['hiWindSpeed']);
		$weatherArray['hiMonthlyWindSpeed'] = kphtoknot($weatherArray['hiMonthlyWindSpeed']);
		$weatherArray['hiYearlyWindSpeed'] = kphtoknot($weatherArray['hiYearlyWindSpeed']);
		$weatherArray['houravgwind'] = kphtoknot($weatherArray['houravgwind']);
		$weatherArray['hourchangewind'] = kphtoknot($weatherArray['hourchangewind']);
		$weatherArray['dayavgwind'] = kphtoknot($weatherArray['dayavgwind']);
		$weatherArray['daychangewind'] = kphtoknot($weatherArray['daychangewind']);
		$weatherArray['weekavgwind'] = kphtoknot($weatherArray['weekavgwind']);
		$weatherArray['weekchangewind'] = kphtoknot($weatherArray['weekchangewind']);
		$weatherArray['monthtodateavgwind'] = kphtoknot($weatherArray['monthtodateavgwind']);
		$weatherArray['yeartodateavgwind'] = kphtoknot($weatherArray['yeartodateavgwind']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiWindSpeed'] = kphtoknot($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiWindSpeed']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiwindGust'] = kphtoknot($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiwindGust']);
		
		if (($_GET['almanacPeriod'] == 'SearchGo') || $_GET['almanacPeriod'] == 'SearchGoFile') {
		foreach ($weatherArray['SQLDataCustom']['windSpeed'] as $key => $value) {
			$weatherArray['SQLDataCustom']['windSpeed'][$key] = kphtoknot($value);
		}
		
		foreach ($weatherArray['SQLDataCustom']['hiWindSpeed'] as $key => $value) {
			$weatherArray['SQLDataCustom']['hiWindSpeed'][$key] = kphtoknot($value);
		}
		
		}
		
		
		$i = 0;
			while ($i < 288) {
				$weatherArray['SQLData']['windSpeed'][$i] = kphtoknot($weatherArray['SQLData']['windSpeed'][$i]);
				$weatherArray['SQLData']['hiWindSpeed'][$i] = kphtoknot($weatherArray['SQLData']['hiWindSpeed'][$i]);
				$i++;
			}
	return $weatherArray;
}

/****
Converting kph to mps
**/
function convertdatakphtomps($weatherArray) {
		
		$weatherArray['windSpeed'] = kphtomps($weatherArray['windSpeed']);
		$weatherArray['intervalAvgWindSpeed'] = kphtomps($weatherArray['intervalAvgWindSpeed']);
		$weatherArray['windGustSpeed'] = kphtomps($weatherArray['windGustSpeed']);
		$weatherArray['hiWindSpeed'] = kphtomps($weatherArray['hiWindSpeed']);
		$weatherArray['hiMonthlyWindSpeed'] = kphtomps($weatherArray['hiMonthlyWindSpeed']);
		$weatherArray['hiYearlyWindSpeed'] = kphtomps($weatherArray['hiYearlyWindSpeed']);
		$weatherArray['houravgwind'] = kphtomps($weatherArray['houravgwind']);
		$weatherArray['hourchangewind'] = kphtomps($weatherArray['hourchangewind']);
		$weatherArray['dayavgwind'] = kphtomps($weatherArray['dayavgwind']);
		$weatherArray['daychangewind'] = kphtomps($weatherArray['daychangewind']);
		$weatherArray['weekavgwind'] = kphtomps($weatherArray['weekavgwind']);
		$weatherArray['weekchangewind'] = kphtomps($weatherArray['weekchangewind']);
		$weatherArray['monthtodateavgwind'] = kphtomps($weatherArray['monthtodateavgwind']);
		$weatherArray['yeartodateavgwind'] = kphtomps($weatherArray['yeartodateavgwind']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiwindGust'] = kphtomps($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiwindGust']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiWindSpeed'] = kphtomps($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiWindSpeed']);
		
		if (($_GET['almanacPeriod'] == 'SearchGo') || $_GET['almanacPeriod'] == 'SearchGoFile') {
		foreach ($weatherArray['SQLDataCustom']['windSpeed'] as $key => $value) {
			$weatherArray['SQLDataCustom']['windSpeed'][$key] = kphtomps($value);
		}
		
		foreach ($weatherArray['SQLDataCustom']['hiWindSpeed'] as $key => $value) {
			$weatherArray['SQLDataCustom']['hiWindSpeed'][$key] = kphtomps($value);
		}
		
		}
		
		
		$i = 0;
			while ($i < 288) {
				$weatherArray['SQLData']['windSpeed'][$i] = kphtomps($weatherArray['SQLData']['windSpeed'][$i]);
				$weatherArray['SQLData']['hiWindSpeed'][$i] = kphtomps($weatherArray['SQLData']['hiWindSpeed'][$i]);
				$i++;
			}
	return $weatherArray;
}

/****
Converting Watt per square meter to Watt per square inch
**/
function convertdatawattMetertoft($weatherArray) {
		$weatherArray['solarRad'] = wattmetertowattft($weatherArray['solarRad']);
		$weatherArray['windPowerDensity'] = wattmetertowattft($weatherArray['windPowerDensity']);
		$weatherArray['hiRadiation'] = wattmetertowattft($weatherArray['hiRadiation']);
		$weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiRadiation'] = wattmetertowattft($weatherArray['SQLData'][$weatherArray['almanacPeriod']][Value]['hiRadiation']);
	
		if (($_GET['almanacPeriod'] == 'SearchGo') || $_GET['almanacPeriod'] == 'SearchGoFile') {
		foreach ($weatherArray['SQLDataCustom']['SolarRadSQL'] as $key => $value) {
			$weatherArray['SQLDataCustom']['SolarRadSQL'][$key] = kphtomps($value);
		}
		
		}
		
	return $weatherArray;
}

/****
Converting kmtomiles
**/
function convertdatakmttomiles($weatherArray) {
		$weatherArray['hourwindrun'] = KMtomiles($weatherArray['hourwindrun']);
		$weatherArray['daywindrun'] = KMtomiles($weatherArray['daywindrun']);
		$weatherArray['weekwindrun'] = KMtomiles($weatherArray['weekwindrun']);
		$weatherArray['monthtodatewindrun'] = KMtomiles($weatherArray['monthtodatewindrun']);
		$weatherArray['yeartodatewindrun'] = KMtomiles($weatherArray['yeartodatewindrun']);
			
	return $weatherArray;
}

/****
Converting kmtonauticalmiles
**/
function convertdatakmttonautmiles($weatherArray) {
		$weatherArray['hourwindrun'] = KMtonautm($weatherArray['hourwindrun']);
		$weatherArray['daywindrun'] = KMtonautm($weatherArray['daywindrun']);
		$weatherArray['weekwindrun'] = KMtonautm($weatherArray['weekwindrun']);
		$weatherArray['monthtodatewindrun'] = KMtonautm($weatherArray['monthtodatewindrun']);
		$weatherArray['yeartodatewindrun'] = KMtonautm($weatherArray['yeartodatewindrun']);
			
	return $weatherArray;
}

function findtrend($weatherArray){

if ($weatherArray['SQLData']['OutTemp'][287] < $weatherArray['SQLData']['OutTemp'][286]) {
	$weatherArray['TempTrend5min'] = ' &darr;';
	}

elseif ($weatherArray['SQLData']['OutTemp'][287] > $weatherArray['SQLData']['OutTemp'][286]){
	$weatherArray['TempTrend5min'] = ' &uarr;';
	}
else {
	$weatherArray['TempTrend5min'] = ' &harr;';
	}
return $weatherArray;
}

?>