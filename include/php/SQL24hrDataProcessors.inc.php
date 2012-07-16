<?php

$i = 0;
$weatherArray['dailyRain'] = 0; //first reset the daily rain value
$weatherArray['dailyET'] = 0; // reset the daily ET value


// Doing 24hr High Lows from Database


if ( $weatherArray['SQLData'] ) {

if ( $weatherArray['SQLData']['Rain24HourlySum'] && $weatherArray['SQLData']['Rain24HourlySum'] ) {
while ($i < 288) {

		
$weatherArray['dailyRain'] = $weatherArray['dailyRain'] + $weatherArray['SQLData']['Rain24HourlySum'][$i]; // First we'll do daily rain

$weatherArray['dailyET'] = $weatherArray['dailyET'] + $weatherArray['SQLData']['ET24HourlySum'][$i]; // Next we'll do daily ET


//Now We Do Low Outside Temp
/*
	if($weatherArray['SQLData'][OutTemp][$i] <= $weatherArray[lowOutsideTemp]) {
		$weatherArray[lowOutsideTemp] = $weatherArray['SQLData'][OutTemp][$i];
		$weatherArray[lowOutsideTempTime] = date('H:i',$weatherArray['SQLData'][RecordTime][$i]);
		}
		
//Now We Do Low WindChill Temp

	if($weatherArray['SQLData'][WindChill][$i] <= $weatherArray[lowWindchill]) {
		$weatherArray[lowWindchill] = $weatherArray['SQLData'][WindChill][$i];
		$weatherArray[lowWindchillTime] = date('H:i',$weatherArray['SQLData'][RecordTime][$i]);
		}
		
//Now We Do High Barometer

	if($weatherArray['SQLData'][Barometer][$i] >= $weatherArray[hiBarometer]) {
		$weatherArray[hiBarometer] = $weatherArray['SQLData'][Barometer][$i];
		$weatherArray[hiBarometerTime] = date('H:i',$weatherArray['SQLData'][RecordTime][$i]);
		}

//Now We Do Low Barometer

	if($weatherArray['SQLData'][Barometer][$i] <= $weatherArray[lowBarometer]) {
		$weatherArray[lowBarometer] = $weatherArray['SQLData'][Barometer][$i];
		$weatherArray[lowBarometerTime] = date('H:i',$weatherArray['SQLData'][RecordTime][$i]);
		}
		
//Now We Do High Rain Rate

	if(($weatherArray['SQLData'][HiRainRate][$i] >= $weatherArray[hiRainRate])&&($weatherArray['SQLData'][HiRainRate][$i] > 0)) {
		$weatherArray[hiRainRate] = $weatherArray['SQLData'][HiRainRate][$i];
		$weatherArray[hiRainRateTime] = date('H:i',$weatherArray['SQLData'][RecordTime][$i]);
		}	
		
	//Now We Do High Dewpoint

	if($weatherArray['SQLData'][Dewpoint][$i] >= $weatherArray[hiDewpoint]) {
		$weatherArray[hiDewpoint] = $weatherArray['SQLData'][Dewpoint][$i];
		$weatherArray[hiDewpointTime] = date('H:i',$weatherArray['SQLData'][RecordTime][$i]);
		}	
		
	//Now We Do Low Dewpoint 

	if($weatherArray['SQLData'][Dewpoint][$i] <= $weatherArray[lowDewpoint]) {
		$weatherArray[lowDewpoint] = $weatherArray['SQLData'][Dewpoint][$i];
		$weatherArray[lowDewpointTime] = date('H:i',$weatherArray['SQLData'][RecordTime][$i]);
		}	
		
		//Now We Do High Humidity 

	if($weatherArray['SQLData'][OutHumid][$i] >= $weatherArray[hiHumidity]) {
		$weatherArray[hiHumidity] = $weatherArray['SQLData'][OutHumid][$i];
		$weatherArray[hiHumTime] = date('H:i',$weatherArray['SQLData'][RecordTime][$i]);
		}
		
		//Now We Do Low Humidity 

	if($weatherArray['SQLData'][OutHumid][$i] <= $weatherArray[lowHumidity]) {
		$weatherArray[lowHumidity] = $weatherArray['SQLData'][OutHumid][$i];
		$weatherArray[lowHumTime] = date('H:i',$weatherArray['SQLData'][RecordTime][$i]);
		}
		
	//Now We Do Low Humidity 

	if($weatherArray['SQLData'][HeatIndex][$i] >= $weatherArray[hiHeatindex]) {
		$weatherArray[hiHeatindex] = $weatherArray['SQLData'][HeatIndex][$i];
		$weatherArray[hiHeatindexTime] = date('H:i',$weatherArray['SQLData'][RecordTime][$i]);
		}
	//Now we do High Solar Radiation
	
	if($weatherArray['SQLData'][SolarRadSQL][$i] >= $weatherArray[hiRadiation]) {
		$weatherArray[hiRadiation] = $weatherArray['SQLData'][SolarRadSQL][$i];
		$weatherArray[hiRadiationTime] = date('H:i',$weatherArray['SQLData'][RecordTime][$i]);
		}
		
	//Now we do High UV Radiation
	
	if($weatherArray['SQLData'][UVSQL][$i] >= $weatherArray[hiUV]) {
		$weatherArray[hiUV] = $weatherArray['SQLData'][UVSQL][$i];
		$weatherArray[hiUVTime] = date('H:i',$weatherArray['SQLData'][RecordTime][$i]);
		}
		*/
	$i++;
}
} //End of ET/RAIN Check
} //End of SQLDATA CHECK

if ( $weatherArray['dayhighwinddir'] ) {

if (($weatherArray['dayhighwinddir'] > 0)&&($weatherArray['dayhighwinddir'] <= 11)) {
			$weatherArray['dayhighwinddir'] = 'N';
			}
		elseif (($weatherArray['dayhighwinddir']>11)&&($weatherArray['dayhighwinddir']<=34)) { 
			$weatherArray['dayhighwinddir'] = 'NNE'; 
 }
		elseif (($weatherArray['dayhighwinddir']>34)&&($weatherArray['dayhighwinddir']<=56)) { 
			$weatherArray['dayhighwinddir'] = 'NE'; 
 }
		elseif (($weatherArray['dayhighwinddir']>56)&&($weatherArray['dayhighwinddir']<=79)) { 
			$weatherArray['dayhighwinddir'] = 'ENE'; 
 }
		elseif (($weatherArray['dayhighwinddir']>79)&&($weatherArray['dayhighwinddir']<=101)) { 
			$weatherArray['dayhighwinddir'] = 'E'; 
 }
		elseif (($weatherArray['dayhighwinddir']>101)&&($weatherArray['dayhighwinddir']<=124)) { 
			$weatherArray['dayhighwinddir'] = 'ESE'; 
 }
		elseif (($weatherArray['dayhighwinddir']>124)&&($weatherArray['dayhighwinddir']<=146)) { 
			$weatherArray['dayhighwinddir'] = 'SE'; 
 }
		elseif (($weatherArray['dayhighwinddir']>146)&&($weatherArray['dayhighwinddir']<=169)) { 
			$weatherArray['dayhighwinddir'] = 'SSE'; 
 }
		elseif (($weatherArray['dayhighwinddir']>169)&&($weatherArray['dayhighwinddir']<=191)) { 
			$weatherArray['dayhighwinddir'] = 'S'; 
 }
		elseif (($weatherArray['dayhighwinddir']>191)&&($weatherArray['dayhighwinddir']<=214)) { 
			$weatherArray['dayhighwinddir'] = 'SSW'; 
 }
		elseif (($weatherArray['dayhighwinddir']>214)&&($weatherArray['dayhighwinddir']<=236)) { 
			$weatherArray['dayhighwinddir'] = 'SW'; 
 }
		elseif (($weatherArray['dayhighwinddir']>236)&&($weatherArray['dayhighwinddir']<=259)) { 
			$weatherArray['dayhighwinddir'] = 'WSW'; 
 }
		elseif (($weatherArray['dayhighwinddir']>259)&&($weatherArray['dayhighwinddir']<=281)) { 
			$weatherArray['dayhighwinddir'] = 'W'; 
 }
		elseif (($weatherArray['dayhighwinddir']>281)&&($weatherArray['dayhighwinddir']<=304)) { 
			$weatherArray['dayhighwinddir'] = 'WNW'; 
 }
		elseif (($weatherArray['dayhighwinddir']>304)&&($weatherArray['dayhighwinddir']<=326)) { 
			$weatherArray['dayhighwinddir'] = 'NW'; 
 }
		elseif (($weatherArray['dayhighwinddir']>326)&&($weatherArray['dayhighwinddir']<=349)) { 
			$weatherArray['dayhighwinddir'] = 'NNW'; 
 }
		elseif (($weatherArray['dayhighwinddir']>349)&&($weatherArray['dayhighwinddir']<=360)) { 
			$weatherArray['dayhighwinddir'] = 'N'; 
	}
} //End if for dayhigh check


//	$weatherArray['dailyRain'] = $weatherArray['dailyRain'] * 10; //Convert to MM 
?>