<?php

function changefreezingColor($weatherArray,$key,$val,$subArray){

$warncoldcolorlow = '#CCFFFF';
$warncoldcolormed = '#9999FF';
$warncoldcolorhigh = '#4444FF';
$warncolorlow = '#EEEE66';
$warncolormed = '#FFBB44';
$warncolorhigh = '#FF4444';
$windlevelmoderate = '#ffff22';
$windlevelstrong = '#ffbb33';
$windlevelgale = '#ff8833';
$windlevelstorm = '#ff33bb';
$windlevelhurricane = '#ff2222';
$currentraincolor ='#CCFFFF';
$windpowerlow = '#44FF44';
$windpowergood = '#22FF22';
$windpowerbest = '#00FF00';
$freezinglevlow = '#88b';
$freezinglevlower = '#88c';
$freezinglevlowest = '#88d';

$CSSIdent = 'CSS'; // We're adding this string to the regular weatherArray variable to create a new array item that has the CSS background colour... default is "no".
$CSSstyletag = 'background-color: ';
$CSSdefaultvalue = 'transparent;';
$CSSdefault = $CSSstyletag . $CSSdefaultvalue;
$newName = $key . $CSSIdent; //Create the new $weatherArray variable.



//////////////Current Freezing Level Reading/////////////////////////
if ($key == 'freezingLevel'){
//echo $val . '__';
//echo $newName . '__'. $CSSstyletag . $warncolorlow . '__';
	if ($val < 3000) {
		$weatherArray[$newName] = $CSSstyletag . $freezinglevlow;
	}
	
	if ($val < 1150) {
		$weatherArray[$newName] = $CSSstyletag . $freezinglevlower;
	}
}
//echo $val;
return $weatherArray;

}


function changeBarColor($weatherArray,$key,$val,$subArray){

$warncoldcolorlow = '#CCFFFF';
$warncoldcolormed = '#9999FF';
$warncoldcolorhigh = '#4444FF';
$warncolorlow = '#EEEE66';
$warncolormed = '#FFBB44';
$warncolorhigh = '#FF4444';
$windlevelmoderate = '#ffff22';
$windlevelstrong = '#ffbb33';
$windlevelgale = '#ff8833';
$windlevelstorm = '#ff33bb';
$windlevelhurricane = '#ff2222';
$currentraincolor ='#CCFFFF';
$windpowerlow = '#44FF44';
$windpowergood = '#22FF22';
$windpowerbest = '#00FF00';
$freezinglevlow = '#00FF00';
$freezinglevlower = '#00FF00';
$freezinglevlowest = '#00FF00';

$CSSIdent = 'CSS'; // We're adding this string to the regular weatherArray variable to create a new array item that has the CSS background colour... default is "no".
$CSSstyletag = 'background-color: ';
$CSSdefaultvalue = 'transparent;';
$CSSdefault = $CSSstyletag . $CSSdefaultvalue;
$newName = $key . $CSSIdent; //Create the new $weatherArray variable.



//////////////Current Barometer Reading/////////////////////////
if ($key == 'barometer' || $key == 'stationPressure' || $key == 'houravgbarom' || $key == 'dayavgbarom' || $key == 'weekavgbarom' || $key == 'monthtodateavgbarom' || $key == 'yeartodateavgbarom'){
//echo $val . '__';
//echo $newName . '__'. $CSSstyletag . $warncolorlow . '__';
	if ($val <= 999 && $val > 995) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorlow;
	}

	if ($val <= 995 && $val > 985) {
		$weatherArray[$newName] = $CSSstyletag . $warncolormed;
	}

	if ($val <= 985) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorhigh;
	}
}
//////////////Hour Barometer Change/////////////////////////
if ($key == 'hourchangebarom' || $key == 'weekchangebarom'){
	if (($val >= 1 && $val < 1.5) || ($val <= -1 && $val > -1.5) ) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorlow;
	}

	if (($val > 1.5) || ($val < -1.5) ) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorhigh;
	}
}
//////////////Day Barometer Change/////////////////////////

if ($key == 'daychangebarom'){
	if (($val >= 5 && $val < 8.5) || ($val <= -5 && $val > -8.5) ) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorlow;
	}

	if (($val > 8.5) || ($val < -8.5) ) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorhigh;
	}
}
//////////////Day Barometer Low/////////////////////////

if ($key == 'lowBarometer' || $key == 'hiBarometer'){
	if ($val <= 987 && $val > 983) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorlow;
	}
	if ($val <= 983) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorhigh;
	}

}

return $weatherArray;

}


function changeWindColor($weatherArray,$key,$val,$subArray){

$warncoldcolorlow = '#CCFFFF';
$warncoldcolormed = '#9999FF';
$warncoldcolorhigh = '#4444FF';
$warncolorlow = '#EEEE66';
$warncolormed = '#FFBB44';
$warncolorhigh = '#FF4444';
$windlevelmoderate = '#ffff22';
$windlevelstrong = '#ffbb33';
$windlevelgale = '#ff8833';
$windlevelstorm = '#ff33bb';
$windlevelhurricane = '#ff2222';
$currentraincolor ='#CCFFFF';
$windpowerlow = '#44FF44';
$windpowergood = '#22FF22';
$windpowerbest = '#00FF00';
$freezinglevlow = '#00FF00';
$freezinglevlower = '#00FF00';
$freezinglevlowest = '#00FF00';

$CSSIdent = 'CSS'; // We're adding this string to the regular weatherArray variable to create a new array item that has the CSS background colour... default is "no".
$CSSstyletag = 'background-color: ';
$CSStxtstyletag = 'color: ';
$CSSdefaultvalue = 'transparent;';
$CSSdefault = $CSSstyletag . $CSSdefaultvalue;
$newName = $key . $CSSIdent; //Create the new $weatherArray variable.

//////////////WindSpeed Warning Check/////////////////////////

if ($key == 'windSpeed' || $key == 'intervalAvgWindSpeed'){
	if ($val >= 20 && $val < 45) {
		$weatherArray[$newName] = $CSSstyletag . $windlevelmoderate;
	}

	if ($val >= 45 && $val < 63) {
		$weatherArray[$newName] = $CSSstyletag . $windlevelstrong;
	}

	if ($val >= 63 && $val < 93) {
		$weatherArray[$newName] = $CSSstyletag . $windlevelgale;
	}

	if ($val >= 93 && $val < 120) {
		$weatherArray[$newName] = $CSSstyletag . $windlevelstorm;
	}

	if ($val >= 120) {
		$weatherArray[$newName] = $CSSstyletag . $windlevelhurricane;
	}

}


//////////////High WindSpeed Warning Check/////////////////////////
elseif ($key == 'hiWindSpeed'){
	if ($val >= 25 && $val < 45) {
		$weatherArray[$newName] = $CSSstyletag . $windlevelmoderate;
		}

	if ($val >= 45 && $val < 63) {
		$weatherArray[$newName] = $CSSstyletag . $windlevelstrong;
		
	}

	if ($val >= 63 && $val < 93) {
		$weatherArray[$newName] = $CSSstyletag . $windlevelgale;
	
	}

	if ($val >= 93 && $val < 120) {
		$weatherArray[$newName] = $CSSstyletag . $windlevelstorm;
		
	}

	if ($val >= 120) {
		$weatherArray[$newName] = $CSSstyletag . $windlevelhurricane;
		
	}
}

return $weatherArray;

}


function changeRainColor($weatherArray,$key,$val,$subArray){

$warncoldcolorlow = '#CCFFFF';
$warncoldcolormed = '#9999FF';
$warncoldcolorhigh = '#4444FF';
$warncolorlow = '#EEEE66';
$warncolormed = '#FFBB44';
$warncolorhigh = '#FF4444';
$windlevelmoderate = '#ffff22';
$windlevelstrong = '#ffbb33';
$windlevelgale = '#ff8833';
$windlevelstorm = '#ff33bb';
$windlevelhurricane = '#ff2222';
$currentraincolor ='#CCFFFF';
$windpowerlow = '#44FF44';
$windpowergood = '#22FF22';
$windpowerbest = '#00FF00';
$freezinglevlow = '#00FF00';
$freezinglevlower = '#00FF00';
$freezinglevlowest = '#00FF00';


$CSSIdent = 'CSS'; // We're adding this string to the regular weatherArray variable to create a new array item that has the CSS background colour... default is "no".
$CSSstyletag = 'background-color: ';
$CSSdefaultvalue = 'transparent;';
$CSSdefault = $CSSstyletag . $CSSdefaultvalue;
$newName = $key . $CSSIdent; //Create the new $weatherArray variable.


//////////////Rain Warning Check/////////////////////////
// PROBLEM HERE:  NOT GOING INTO SUB ARRAY SQLDATA... creating unnecessary values.
if ($key == 'dailyRain' || $key == 'RainPeriodSum' ){

	if ($val > 0 && $val < 20) {
		if ($subArray == 'SQLData') {
		$weatherArray[$subArray][$newName] = $CSSstyletag . $currentraincolor;
		}
		else {
		$weatherArray[$newName] = $CSSstyletag . $currentraincolor;
		}
		//echo $weatherArray[$newName];
		//echo $newName;
		//echo $weatherArray[RainPeriodSumCSS];
	}
	
	if ($val >= 20 && $val < 40) {
		if ($subArray == 'SQLData') {
		$weatherArray[$subArray][$newName] = $CSSstyletag . $warncolorlow;
		}
		else {
		
		$weatherArray[$newName] = $CSSstyletag . $warncolorlow;
		}
		//echo $weatherArray[$subArray][$newName];
		//echo $newName;
		//echo $weatherArray[RainPeriodSumCSS];
	}

	if ($val >= 40 && $val < 80) {
		if ($subArray == 'SQLData') {
			$weatherArray[$subArray][$newName] = $CSSstyletag . $warncolormed;
		}
		else {
		
		$weatherArray[$newName] = $CSSstyletag . $warncolormed;
		}
	}

	if ($val >= 80) {
		if ($subArray == 'SQLData') {
			$weatherArray[$subArray][$newName] = $CSSstyletag . $warncolorhigh;
		}
		else {
		
		$weatherArray[$newName] = $CSSstyletag . $warncolormed;
		}
	}
}


//////////////Storm Rain Warning Check/////////////////////////

if ($key == 'stormRain'){

	if ($subArray == 'SQLData') {
	if ($val >= 50 && $val < 100) {	
		$weatherArray[$subArray][$newName] = $CSSstyletag . $warncolorlow;
	}

	if ($val >= 100 && $val < 150) {
		$weatherArray[$subArray][$newName] = $CSSstyletag . $warncolormed;
	}

	if ($val >= 150) {
		$weatherArray[$subArray][$newName] = $CSSstyletag . $warncolorhigh;
	}
	}
	else {
	
	if ($val >= 50 && $val < 100) {	
		$weatherArray[$newName] = $CSSstyletag . $warncolorlow;
	}

	if ($val >= 100 && $val < 150) {
		$weatherArray[$newName] = $CSSstyletag . $warncolormed;
	}

	if ($val >= 150) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorhigh;
	}
	}
	
	$weatherArray[$subArray][$newName];
}

//////////////Current Rain Rate Warning Check/////////////////////////

if ($key == 'rainRate'){
	if ($val > 0 && $val < 5) {
		$weatherArray[$newName] = $CSSstyletag . $currentraincolor;
	}

	if ($val >= 5 && $val < 15) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorlow;
	}

	if ($val >= 15 && $val < 30) {
		$weatherArray[$newName] = $CSSstyletag . $warncolormed;
	}

	if ($val >= 30) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorhigh;
	}
}
//////////////High Rain Rate Warning Check/////////////////////////

if ($key == 'hiRainRate'){

	if ($val > 0 && $val < 10) {
		$weatherArray[$newName] = $CSSstyletag . $currentraincolor;
	}
	
	if ($val >= 10 && $val < 20) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorlow;
	}

	if ($val >= 20 && $val < 40) {
		$weatherArray[$newName] = $CSSstyletag . $warncolormed;
	}

	if ($val >= 40) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorhigh;
	}

}

return $weatherArray;

}
function changeTempColor($weatherArray,$key,$val,$subArray){

$warncoldcolorlow = '#CCFFFF';
$warncoldcolormed = '#AAAAFF';
$warncoldcolorhigh = '#7777FF';
$warncolorlow = '#EEEE66';
$warncolormed = '#FFBB44';
$warncolorhigh = '#FF4444';
$windlevelmoderate = '#ffff22';
$windlevelstrong = '#ffbb33';
$windlevelgale = '#ff8833';
$windlevelstorm = '#ff33bb';
$windlevelhurricane = '#ff2222';
$currentraincolor ='#CCFFFF';
$windpowerlow = '#44FF44';
$windpowergood = '#22FF22';
$windpowerbest = '#00FF00';
$freezinglevlow = '#00FF00';
$freezinglevlower = '#00FF00';
$freezinglevlowest = '#00FF00';
$greyout = '#eee';
$greyouteven = '#111';

$CSSIdent = 'CSS'; // We're adding this string to the regular weatherArray variable to create a new array item that has the CSS background colour... default is "no".
$CSSstyletag = 'background-color: ';
$CSStxtstyletag = 'color: ';
$CSSdefaultvalue = 'transparent;';
$CSSdefault = $CSSstyletag . $CSSdefaultvalue;
$newName = $key . $CSSIdent; //Create the new $weatherArray variable.

//////////////Temperature Cold Warning/////////////////////////
$weatherArray[$newName] = $CSSdefault;

if ($val <= 0 && $val > -5) {
$weatherArray[$newName] = $CSSstyletag . $warncoldcolorlow;
}

elseif ($val <= -5 && $val > -10) {
$weatherArray[$newName] = $CSSstyletag . $warncoldcolormed;
}

elseif ($val <= -10) {
$weatherArray[$newName] = $CSSstyletag . $warncoldcolorhigh;
}

if ($key != 'windChill') {
	//////////////Temperature Hot Warning/////////////////////////
	if ($val >= 20 && $val < 30) {
		if ($key == 'heatIndex' || $key == 'outsideHeatIndex' ) {
			if ($weatherArray['heatIndex'] > $weatherArray['outTemp']) {
					$weatherArray['heatIndexCSS'] = $CSSstyletag . $warncolorlow;
				}
			elseif ($weatherArray['outsideHeatIndex'] > $weatherArray['outTemp']) {
				$weatherArray['outsideHeatIndexCSS'] = $CSSstyletag . $warncolorlow;
				}
			if ($weatherArray['outsideHeatIndex'] == $weatherArray['outTemp']) {
				$weatherArray['outsideHeatIndexCSS'] = $CSSstyletag . $CSSdefaultvalue;
				$weatherArray['outsideHeatIndex'] = 'N/A';
				}	
			
			}
		}
	elseif ($val >= 30 && $val < 35) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorlow;
		}

	elseif ($val >= 35 && $val < 38) {
		$weatherArray[$newName] = $CSSstyletag . $warncolormed;
		}

	elseif ($val >= 38) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorhigh;
		}
	}

return $weatherArray;

}


function changesolarRadColor($weatherArray,$key,$val,$subArray){

$warncolorlow = '#EEEE66';
$warncolormed = '#FFBB44';
$warncolorhigh = '#FF4444';

$CSSIdent = 'CSS'; // We're adding this string to the regular weatherArray variable to create a new array item that has the CSS background colour... default is "no".
$CSSstyletag = 'background-color: ';
$CSSdefaultvalue = 'transparent;';
$CSSdefault = $CSSstyletag . $CSSdefaultvalue;
$newName = $key . $CSSIdent; //Create the new $weatherArray variable.

//////////////Current Solar Radiation/////////////////////////

	if ($val < 500) {
		$weatherArray[$newName] = $CSSstyletag . $CSSdefaultvalue;
	}
	if ($val >= 500 && $val < 800) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorlow;
	}

	if ($val >= 800 && $val < 1000) {
		$weatherArray[$newName] = $CSSstyletag . $warncolormed;
	}

	if ($val >= 1000) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorhigh;
	}

return $weatherArray;

}

function changeSolarWindPotentialColor($weatherArray,$key,$val,$subArray){

$warncolorlow = '#EEEE66';
$warncolormed = '#FFBB44';
$warncolorhigh = '#FF4444';

$CSSIdent = 'CSS'; // We're adding this string to the regular weatherArray variable to create a new array item that has the CSS background colour... default is "no".
$CSSstyletag = 'background-color: ';
$CSSdefaultvalue = 'transparent;';
$CSSdefault = $CSSstyletag . $CSSdefaultvalue;
$newName = $key . $CSSIdent; //Create the new $weatherArray variable.

//////////////Current Solar Potential/////////////////////////

	if ($val < 100) {
		$weatherArray[$newName] = $CSSstyletag . $CSSdefaultvalue;
	}
	if ($val >= 100 && $val < 200) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorlow;
	}

	if ($val >= 200 && $val < 400) {
		$weatherArray[$newName] = $CSSstyletag . $warncolormed;
	}

	if ($val >= 400) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorhigh;
	}

return $weatherArray;

}

function changeUVColor($weatherArray,$key,$val,$subArray){

$warncolorUVlow = '#99dd99';
$warncolorUVmed = '#EEEE66';
$warncolorUVhigh = '#FFBB44';
$warncolorUVveryhigh = '#FF4444';
$warncolorUVextreme = '#bb33bb';

$CSSIdent = 'CSS'; // We're adding this string to the regular weatherArray variable to create a new array item that has the CSS background colour... default is "no".
$CSSstyletag = 'background-color: ';
$CSSdefaultvalue = 'transparent;';
$CSSdefault = $CSSstyletag . $CSSdefaultvalue;
$newName = $key . $CSSIdent; //Create the new $weatherArray variable.

//////////////Current Solar Radiation/////////////////////////

	
	if ($val >= 1 && $val < 3) {
		$weatherArray[$newName] = $CSSstyletag . $CSSdefaultvalue;
	}
	if ($val >= 3 && $val < 6) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorUVmed;
	}

	if ($val >= 6 && $val < 8) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorUVhigh;
	}

	if ($val >= 8 && $val < 11) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorUVveryhigh;
	}
	
	if ($val >= 11) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorUVextreme;
	}
return $weatherArray;

}

function changeETColor($weatherArray,$key,$val,$subArray){

$warncolorlow = '#EEEE66';
$warncolormed = '#FFBB44';
$warncolorhigh = '#FF4444';

$CSSIdent = 'CSS'; // We're adding this string to the regular weatherArray variable to create a new array item that has the CSS background colour... default is "no".
$CSSstyletag = 'background-color: ';
$CSSdefaultvalue = 'transparent;';
$CSSdefault = $CSSstyletag . $CSSdefaultvalue;
$newName = $key . $CSSIdent; //Create the new $weatherArray variable.

//echo $key;
//echo $val;
//////////////Current ET/////////////////////////
	if ($val < 1) {
		$weatherArray[$newName] = $CSSstyletag . $CSSdefaultvalue;
	}
	if ($val >= 3 && $val < 6) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorlow;
	}

	if ($val >= 6 && $val < 10) {
		$weatherArray[$newName] = $CSSstyletag . $warncolormed;
	}

	if ($val >= 10) {
		$weatherArray[$newName] = $CSSstyletag . $warncolorhigh;
	}
return $weatherArray;

}


function setcssalert($weatherArray) {

foreach ($weatherArray as $key => $val) {

	
	if (stristr($key, 'freezingLevel')){ // Searching for freezingLevel
	
		if (stristr($key, 'Time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
			if (stristr($key, 'date') === FALSE){
				if (stristr($key, 'change') === FALSE){
					if (stristr($key, 'avg') === FALSE){
						if (stristr($key, 'unit') === FALSE){
		
		$weatherArray = changefreezingColor($weatherArray,$key,$val,$subArray);
							}
						}
					}
				}
			}
		} //end of FreezingLevel CSS Styling
		
	if (stristr($key, 'temp') || stristr($key, 'chill') || stristr($key, 'dew') || stristr($key, 'heat')){ // Searching for temperature, windchill, dewpoint, and heat values
	
		if (stristr($key, 'Time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
			if (stristr($key, 'date') === FALSE){
				if (stristr($key, 'change') === FALSE){
					if (stristr($key, 'avg') === FALSE){
						if (stristr($key, 'unit') === FALSE){
		
		$weatherArray = changeTempColor($weatherArray,$key,$val,$subArray);
							}
						}
					}
				}
			}
		} //end of Temperature CSS Styling
		
	
	if (stristr($key, 'rain')){ // Searching for Rain
	
		if (stristr($key, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
			if (stristr($key, 'date') === FALSE){
				if (stristr($key, 'change') === FALSE){
					if (stristr($key, 'avg') === FALSE){
						if (stristr($key, 'unit') === FALSE){
		
		//echo $val;
		//echo $key;
		
		
		$weatherArray = changeRainColor($weatherArray,$key,$val,$subArray);
							}
						}
					}
				}
			}
		} //end of Rain CSS Styling
		
		if (stristr($key, 'wind')){ // Searching for Wind
	
		if (stristr($key, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
			if (stristr($key, 'date') === FALSE){
				if (stristr($key, 'change') === FALSE){
					if (stristr($key, 'unit') === FALSE){
		
		$weatherArray = changeWindColor($weatherArray,$key,$val,$subArray);
						}
					}
				}
			}
		} //end of Wind CSS Styling
		
		if (stristr($key, 'barom')){ // Searching for Wind
	
		if (stristr($key, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
			if (stristr($key, 'date') === FALSE){
				if (stristr($key, 'change') === FALSE){
					if (stristr($key, 'unit') === FALSE){
		//echo $key;
		$weatherArray = changeBarColor($weatherArray,$key,$val,$subArray);
						}
					}
				}
			}
		} //end of Barometer CSS Styling
		
		if (stristr($key, 'solarRad')){ // Searching for Solar Radiation and Wind Power Density
	
		if (stristr($key, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
			if (stristr($key, 'date') === FALSE){
				if (stristr($key, 'change') === FALSE){
					if (stristr($key, 'unit') === FALSE){
		//echo $key;
		$weatherArray = changesolarRadColor($weatherArray,$key,$val,$subArray);
						}
					}
				}
			}
		} //end of SolarRad CSS Styling
		
		if (stristr($key, 'hiRadiation')){ // Searching for Solar Radiation and Wind Power Density
	
		if (stristr($key, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
			if (stristr($key, 'date') === FALSE){
				if (stristr($key, 'change') === FALSE){
					if (stristr($key, 'unit') === FALSE){
		//echo $key;
		$weatherArray = changesolarRadColor($weatherArray,$key,$val,$subArray);
						}
					}
				}
			}
		} //end of hiRadiation CSS Styling
		
		if (stristr($key, 'solarPotential') || stristr($key, 'windPowerDensity') ){ // Searching for Solar Potential
	
		if (stristr($key, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
			if (stristr($key, 'date') === FALSE){
				if (stristr($key, 'change') === FALSE){
					if (stristr($key, 'unit') === FALSE){
		//echo $key;
		$weatherArray = changeSolarWindPotentialColor($weatherArray,$key,$val,$subArray);
						}
					}
				}
			}
		} //end of SolarPotential CSS Styling
		
		if (stristr($key, 'UV')){ // Searching for UV
	
		if (stristr($key, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
			if (stristr($key, 'date') === FALSE){
				if (stristr($key, 'change') === FALSE){
					if (stristr($key, 'unit') === FALSE){
		//echo $key;
		//echo $val;
		$weatherArray = changeUVColor($weatherArray,$key,$val,$subArray);
						}
					}
				}
			}
		} //end of UV CSS Styling
		
		if (stristr($key, 'ET')){ // Searching for EvapoTrans
	
		if (stristr($key, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
			if (stristr($key, 'date') === FALSE){
				if (stristr($key, 'change') === FALSE){
					if (stristr($key, 'unit') === FALSE){
						if (stristr($key, 'barometer') === FALSE){
							if (stristr($key, 'out') === FALSE){
								if (stristr($key, 'in') === FALSE){
									if (stristr($key, 'leaf') === FALSE){
		$weatherArray = changeETColor($weatherArray,$key,$val,$subArray);
										}
									}
								}
							}
						}
					}
				}
			}
		} //end of ET CSS Styling
		
		if (stristr($key, 'SQLData')) { // Searching for SQLData {
			foreach ($val as $key2 => $val2) {
				if (stristr($key2, 'temp') || stristr($key2, 'chill') || stristr($key2, 'dew') || stristr($key2, 'heat')){ // Searching for temperature, windchill, dewpoint, and heat values
					if (stristr($key2, 'Time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
						if (stristr($key2, 'date') === FALSE){
							if (stristr($key2, 'change') === FALSE){
								if (stristr($key2, 'avg') === FALSE){
									if (stristr($key2, 'unit') === FALSE){
										$weatherArray = changeTempColor($weatherArray,$key2,$val2,$subArray);
									}
								}
							}
						}
					}
				} //end of SQL Temperature CSS Styling
				
				if (stristr($key2, 'rain')){ // Searching for Rain
				if (stristr($key2, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
					if (stristr($key2, 'date') === FALSE){
						if (stristr($key2, 'change') === FALSE){
							if (stristr($key2, 'avg') === FALSE){
								if (stristr($key2, 'unit') === FALSE){
								//echo $key2;
								//echo ';';
								//echo $val2;
									$weatherArray = changeRainColor($weatherArray,$key2,$val2,$subArray);
		
									}
								}
							}
						}
					}
				} //end of Rain CSS Styling
		
				if (stristr($key2, 'wind')){ // Searching for Wind
				if (stristr($key2, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
					if (stristr($key2, 'date') === FALSE){
						if (stristr($key2, 'change') === FALSE){
							if (stristr($key2, 'unit') === FALSE){
				
				$weatherArray = changeWindColor($weatherArray,$key2,$val2[287],$subArray);
								}
							}
						}
					}
				} //end of Wind CSS Styling
		
				if (stristr($key2, 'barom')){ // Searching for Wind
			
				if (stristr($key2, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
					if (stristr($key2, 'date') === FALSE){
						if (stristr($key2, 'change') === FALSE){
							if (stristr($key2, 'unit') === FALSE){
				//echo $key;
				$weatherArray = changeBarColor($weatherArray,$key2,$val2[287],$subArray);
								}
							}
						}
					}
				} //end of Barometer CSS Styling
		
				if (stristr($key2, 'solarRad')){ // Searching for Solar Radiation
			
				if (stristr($key2, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
					if (stristr($key2, 'date') === FALSE){
						if (stristr($key2, 'change') === FALSE){
							if (stristr($key2, 'unit') === FALSE){
				//echo $key;
				$weatherArray = changesolarRadColor($weatherArray,$key2,$val2[287],$subArray);
								}
							}
						}
					}
				} //end of SolarRad CSS Styling
		
				if (stristr($key2, 'hiRadiation')){ // Searching for Solar Radiation
			
				if (stristr($key2, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
					if (stristr($key2, 'date') === FALSE){
						if (stristr($key2, 'change') === FALSE){
							if (stristr($key2, 'unit') === FALSE){
				//echo $key;
				$weatherArray = changesolarRadColor($weatherArray,$key2,$val2[287],$subArray);
								}
							}
						}
					}
				} //end of hiRadiation CSS Styling
		
		
				if (stristr($key2, 'UV')){ // Searching for UV
			
				if (stristr($key2, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
					if (stristr($key2, 'date') === FALSE){
						if (stristr($key2, 'change') === FALSE){
							if (stristr($key2, 'unit') === FALSE){

				$weatherArray = changeUVColor($weatherArray,$key2,$val2[287],$subArray);
								}
							}
						}
					}
				} //end of UV CSS Styling
		
				if (stristr($key2, 'ET')){ // Searching for EvapoTrans
			
				if (stristr($key2, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
					if (stristr($key2, 'date') === FALSE){
						if (stristr($key2, 'change') === FALSE){
							if (stristr($key2, 'unit') === FALSE){
								if (stristr($key2, 'barometer') === FALSE){
									$weatherArray = changeETColor($weatherArray,$key2,$val2[287],$subArray);
									}
								}
							}
						}
					}
				} //end of ET CSS Styling*/
		
				if (stristr($key2, 'ET') && stristr($key2, 'sum')){ // Searching for EvapoTrans
					if (stristr($key2, 'hourly') === FALSE){
									$weatherArray = changeETColor($weatherArray,$key2,$val2,$subArray);
					}
				} //end of ET CSS Styling*/
				
				
			} //END if SQLDATA foreach
		
			
		
		}//End of SQL IF
	} //end of FOREACH loop

/*
if ($weatherArray[almanacPeriod] != 'Daily') {
	
	foreach ($weatherArray[SQLData][$weatherArray[almanacPeriod]][Value] as $key2 => $value2) {
		
	if (stristr($key2, 'temp') || stristr($key2, 'chill') || stristr($key2, 'dew') || stristr($key2, 'heat')){ // Searching for temperature, windchill, dewpoint, and heat values
			$weatherArray = changeTempColor($weatherArray,$key2,$value2,$subArray);
			//print_r($weatherArray[SQLData][$weatherArray[almanacPeriod]][Value]);	
			} //end of SQL Temperature CSS Styling
				
			if (stristr($key2, 'rain')){ // Searching for Rain
			$weatherArray = changeRainColor($weatherArray,$key2,$value2,$subArray);
		
			} //end of Rain CSS Styling
		
				if (stristr($key2, 'wind')){ // Searching for Wind
				if (stristr($key2, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
					if (stristr($key2, 'date') === FALSE){
						if (stristr($key2, 'change') === FALSE){
							if (stristr($key2, 'unit') === FALSE){
				
				$weatherArray = changeWindColor($weatherArray,$key2,$val2[287],$subArray);
								}
							}
						}
					}
				} //end of Wind CSS Styling
		
				if (stristr($key2, 'barom')){ // Searching for Wind
			
				if (stristr($key2, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
					if (stristr($key2, 'date') === FALSE){
						if (stristr($key2, 'change') === FALSE){
							if (stristr($key2, 'unit') === FALSE){
				//echo $key;
				$weatherArray = changeBarColor($weatherArray,$key2,$val2[287],$subArray);
								}
							}
						}
					}
				} //end of Barometer CSS Styling
		
				if (stristr($key2, 'solarRad')){ // Searching for Solar Radiation
			
				if (stristr($key2, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
					if (stristr($key2, 'date') === FALSE){
						if (stristr($key2, 'change') === FALSE){
							if (stristr($key2, 'unit') === FALSE){
				//echo $key;
				$weatherArray = changesolarRadColor($weatherArray,$key2,$val2[287],$subArray);
								}
							}
						}
					}
				} //end of SolarRad CSS Styling
		
				if (stristr($key2, 'hiRadiation')){ // Searching for Solar Radiation
			
				if (stristr($key2, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
					if (stristr($key2, 'date') === FALSE){
						if (stristr($key2, 'change') === FALSE){
							if (stristr($key2, 'unit') === FALSE){
				//echo $key;
				$weatherArray = changesolarRadColor($weatherArray,$key2,$val2[287],$subArray);
								}
							}
						}
					}
				} //end of hiRadiation CSS Styling
		
		
				if (stristr($key2, 'UV')){ // Searching for UV
			
				if (stristr($key2, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
					if (stristr($key2, 'date') === FALSE){
						if (stristr($key2, 'change') === FALSE){
							if (stristr($key2, 'unit') === FALSE){

				$weatherArray = changeUVColor($weatherArray,$key2,$val2[287],$subArray);
								}
							}
						}
					}
				} //end of UV CSS Styling
		
				if (stristr($key2, 'ET')){ // Searching for EvapoTrans
			
				if (stristr($key2, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
					if (stristr($key2, 'date') === FALSE){
						if (stristr($key2, 'change') === FALSE){
							if (stristr($key2, 'unit') === FALSE){
								if (stristr($key2, 'barometer') === FALSE){
									$weatherArray = changeETColor($weatherArray,$key2,$val2[287],$subArray);
									}
								}
							}
						}
					}
				} //end of ET CSS Styling
		
				if (stristr($key2, 'ET') && stristr($key2, 'sum')){ // Searching for EvapoTrans
					if (stristr($key2, 'hourly') === FALSE){
									$weatherArray = changeETColor($weatherArray,$key2,$val2,$subArray);
					}
				} //end of ET CSS Styling
		if (stristr($key2, 'temp') || stristr($key2, 'chill') || stristr($key2, 'dew') || stristr($key2, 'heat')){ // Searching for temperature, windchill, dewpoint, and heat values
					if (stristr($key2, 'Time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
						if (stristr($key2, 'date') === FALSE){
							if (stristr($key2, 'change') === FALSE){
								if (stristr($key2, 'avg') === FALSE){
									if (stristr($key2, 'unit') === FALSE){
										$weatherArray = changeTempColor($weatherArray,$key2,$val2[288],$subArray);
									}
								}
							}
						}
					}
				} //end of SQL Temperature CSS Styling
				
				if (stristr($key2, 'rain')){ // Searching for Rain
				if (stristr($key2, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
					if (stristr($key2, 'date') === FALSE){
						if (stristr($key2, 'change') === FALSE){
							if (stristr($key2, 'avg') === FALSE){
								if (stristr($key2, 'unit') === FALSE){
									$weatherArray = changeRainColor($weatherArray,$key2,$val2[287],$subArray);
		
									}
								}
							}
						}
					}
				} //end of Rain CSS Styling
		
				if (stristr($key2, 'wind')){ // Searching for Wind
				if (stristr($key2, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
					if (stristr($key2, 'date') === FALSE){
						if (stristr($key2, 'change') === FALSE){
							if (stristr($key2, 'unit') === FALSE){
				
				$weatherArray = changeWindColor($weatherArray,$key2,$val2[287],$subArray);
								}
							}
						}
					}
				} //end of Wind CSS Styling
		
				if (stristr($key2, 'barom')){ // Searching for Wind
			
				if (stristr($key2, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
					if (stristr($key2, 'date') === FALSE){
						if (stristr($key2, 'change') === FALSE){
							if (stristr($key2, 'unit') === FALSE){
				//echo $key;
				$weatherArray = changeBarColor($weatherArray,$key2,$val2[287],$subArray);
								}
							}
						}
					}
				} //end of Barometer CSS Styling
		
				if (stristr($key2, 'solarRad')){ // Searching for Solar Radiation
			
				if (stristr($key2, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
					if (stristr($key2, 'date') === FALSE){
						if (stristr($key2, 'change') === FALSE){
							if (stristr($key2, 'unit') === FALSE){
				//echo $key;
				$weatherArray = changesolarRadColor($weatherArray,$key2,$val2[287],$subArray);
								}
							}
						}
					}
				} //end of SolarRad CSS Styling
		
				if (stristr($key2, 'hiRadiation')){ // Searching for Solar Radiation
			
				if (stristr($key2, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
					if (stristr($key2, 'date') === FALSE){
						if (stristr($key2, 'change') === FALSE){
							if (stristr($key2, 'unit') === FALSE){
				//echo $key;
				$weatherArray = changesolarRadColor($weatherArray,$key2,$val2[287],$subArray);
								}
							}
						}
					}
				} //end of hiRadiation CSS Styling
		
		
				if (stristr($key2, 'UV')){ // Searching for UV
			
				if (stristr($key2, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
					if (stristr($key2, 'date') === FALSE){
						if (stristr($key2, 'change') === FALSE){
							if (stristr($key2, 'unit') === FALSE){

				$weatherArray = changeUVColor($weatherArray,$key2,$val2[287],$subArray);
								}
							}
						}
					}
				} //end of UV CSS Styling
		
				if (stristr($key2, 'ET')){ // Searching for EvapoTrans
			
				if (stristr($key2, 'time') === FALSE){// The Following Conditions get rid of the array keys that have to do with times, or are intervals, instead of bare temperatures
					if (stristr($key2, 'date') === FALSE){
						if (stristr($key2, 'change') === FALSE){
							if (stristr($key2, 'unit') === FALSE){
								if (stristr($key2, 'barometer') === FALSE){
									$weatherArray = changeETColor($weatherArray,$key2,$val2[287],$subArray);
									}
								}
							}
						}
					}
				} //end of ET CSS Styling
		
				if (stristr($key2, 'ET') && stristr($key2, 'sum')){ // Searching for EvapoTrans
					if (stristr($key2, 'hourly') === FALSE){
									$weatherArray = changeETColor($weatherArray,$key2,$val2,$subArray);
					}
				} //end of ET CSS Styling
				
	}//End Almanac ForEach
}//End Daily Almanac IF
*/

return $weatherArray;

}	

function hidechillheat($weatherArray) {
	if ($weatherArray['windChill'] == $weatherArray['outsideTemp']) {
				$weatherArray['windChillCSS'] = $CSSstyletag . $CSSdefaultvalue;
				$weatherArray['windChill'] = 'N/A';
				}	
	if ($weatherArray['outsideHeatIndex'] == $weatherArray['outsideTemp']) {
				$weatherArray['outsideHeatIndexCSS'] = $CSSstyletag . $CSSdefaultvalue;
				$weatherArray['outsideHeatIndex'] = 'N/A';
				}
				
	return $weatherArray;
}

?>