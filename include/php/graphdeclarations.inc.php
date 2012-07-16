<?php

function Rain24hr($weatherArray){
$graphnamewext = 'images/csimcache/dayrainphp.png';
$graphname = 'images/csimcache/dayrainphp';
$Title = 'Rain Accumulations - Past 24hr';
$yTitle = 'Hourly Total (' . $weatherArray['rainUnit'] . ')';
$sample = 3600;
$points = 24;
putenv("TZ=America/Vancouver");
$xTitle = '';
$weatherSelector = array($weatherArray['SQLData']['Rain24HourlySum'],$weatherArray['SQLData']['Rain24HourlyUnixTime']);
createBarGraph($weatherSelector,$graphname,$xTitle,$yTitle,$Title,$points,$sample);

}

function RainETNet24hr($weatherArray){
$graphnamewext = 'images/csimcache/dayetrainphp.png';
$graphname = 'images/csimcache/dayetrainphp';
$Title = 'Evap (r) and Rain (g) - Past 24hr';
$yTitle = 'Hourly Total (' . $weatherArray['rainUnit'] . ')';
$sample = 3600;
$points = 24;
putenv("TZ=America/Vancouver");
$xTitle = '';
$weatherSelector = array($weatherArray['SQLData']['Rain24HourlySum'],$weatherArray['SQLData']['ET24HourlySum'],$weatherArray['SQLData']['ET24HourlyUnixTime'],$weatherArray['SQLData']['Rain24HourlyUnixTime']);
createAccBarGraph($weatherSelector,$graphname,$xTitle,$yTitle,$Title,$points,$sample);

}

function Rain7Day($weatherArray){
$graphnamewext = 'images/csimcache/weekrainphp.png';
$graphname = 'images/csimcache/weekrainphp';
$Title = 'Rain Accumulations - Past 7 Days';
$yTitle = 'Weekly Total (' . $weatherArray['rainUnit'] . ')';
$sample = 86400;
$points = 7;
putenv("TZ=America/Vancouver");
$xTitle = '';
createBarGraph($weatherArray['SQLDataWeekly']['Rain7DaySum'],$weatherArray['SQLDataWeekly']['Rain7DayTime'],$graphname,$xTitle,$yTitle,$Title,$points,$sample);
}

function RainMonth($weatherArray){
$graphnamewext = 'images/csimcache/monthrainphp.png';
$graphname = 'images/csimcache/monthrainphp';
$Title = 'Rain Accumulations - Past 30 Days';
$yTitle = 'Weekly Total (' . $weatherArray['rainUnit'] . ')';
$sample = 86400;
$points = 7;
putenv("TZ=America/Vancouver");
$xTitle = '';
createBarGraph($weatherArray['SQLDataMonthly']['RainMonthSum'],$weatherArray['SQLDataMonthly']['RainMonthTime'],$graphname,$xTitle,$yTitle,$Title,$points,$sample);
}

function dayTempChillHeat($weatherArray){
echo 'ho';
$graphnamewext = 'images/csimcache/daytempchillheat.png';
$graphname = 'images/csimcache/daytempchillheat';
$dateformat = 'H:i';
$Title = 'Temp(grn), Heat(red), Chill(blue) Trends - Past 24hr';
$yTitle = 'Temperature ('. $weatherArray['tempUnit'] .')';
$y2Title = '';
$weatherSelector = array($weatherArray['SQLData']['OutTemp'],$weatherArray['SQLData']['WindChill'],$weatherArray['SQLData']['HeatIndex'],$weatherArray['SQLData']['RecordTime']);
$weatherArray = createDayTripleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$y2Title,$Title,0,$dateformat);

return $weatherArray;
}

function customTempChillHeat($weatherArray){
$graphnamewext = 'images/csimcache/customtempchillheat.png';
$graphname = 'images/csimcache/customtempchillheat';
$dateformat = 'M Y';
$Title = 'Temp(grn), Heat(red), Chill(blue) Trends';
$yTitle = 'Temperature ('. $weatherArray['tempUnit'] .')';
$y2Title = '';
$weatherSelector = array($weatherArray['SQLDataCustom']['OutTemp'],$weatherArray['SQLDataCustom']['WindChill'],$weatherArray['SQLDataCustom']['HeatIndex'],$weatherArray['SQLDataCustom']['RecordTimeUnix']);
$filename = createDayTripleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$y2Title,$Title,0,$dateformat);

}

function weeklyTempChillHeat($weatherArray){
$graphnamewext = 'images/csimcache/weektempchillheat.png';
$graphname = 'images/csimcache/weektempchillheat';
$dateformat = 'M d H:i';
$Title = 'Temp(grn), Heat(red), Chill(blue) Trends - Past 7 Days';
$yTitle = 'Temperature';
$y2Title = '';
$weatherSelector = array($weatherArray['SQLDataWeekly']['OutTemp'],$weatherArray['SQLDataWeekly']['WindChill'],$weatherArray['SQLDataWeekly']['HeatIndex'],$weatherArray['SQLDataWeekly']['RecordTime']);
$filename = createWeekTripleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$y2Title,$Title,0,$dateformat);
}

function monthTempChillHeat($weatherArray){
$graphnamewext = 'images/csimcache/monthtempchillheat.png';
$graphname = 'images/csimcache/monthtempchillheat';
$dateformat = 'M d H:i';
$Title = 'Temp(grn), Heat(red), Chill(blue) Trends - Past 30 Days';
$yTitle = 'Temperature';
$y2Title = '';
$weatherSelector = array($weatherArray['SQLDataMonthly']['OutTemp'],$weatherArray['SQLDataMonthly']['WindChill'],$weatherArray['SQLDataMonthly']['HeatIndex'],$weatherArray['SQLDataMonthly']['RecordTime']);
$filename = createMonthTripleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$y2Title,$Title,0);
}

function yearTempChillHeat($weatherArray){
$graphnamewext = 'images/csimcache/yeartempchillheat.png';
$graphname = 'images/csimcache/yeartempchillheat';
$dateformat = 'M d';
$Title = 'Temp(grn), Heat(red), Chill(blue) Trends - Past 365 Days';
$yTitle = 'Temperature';
$y2Title = '';
$weatherSelector = array($weatherArray['SQLDataYearly']['OutTemp'],$weatherArray['SQLDataYearly']['WindChill'],$weatherArray['SQLDataYearly']['HeatIndex'],$weatherArray['SQLDataYearly']['RecordTime']);
$filename = createYearTripleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$y2Title,$Title,0);
}

function dayBaromWind($weatherArray){
$graphnamewext = 'images/csimcache/daybaromwind.png';
$graphname = 'images/csimcache/daybaromwind';
$Title = 'Barom(g), Wind(b), Gust(r) Trends - Past 24hr';
$dateformat = 'H:i';
$yTitle = 'Pressure (' . $weatherArray['barUnit'] . ")";
$y2Title = $weatherArray['windUnit'];
$weatherSelector = array($weatherArray['SQLData']['Barometer'],$weatherArray['SQLData']['WindSpeed'],$weatherArray['SQLData']['HiWindSpeed'],$weatherArray['SQLData']['RecordTime']);
$filename = createDayTripleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$y2Title,$Title,1,$dateformat);
}

function customBaromWind($weatherArray){
$graphnamewext = 'images/csimcache/custombaromwind.png';
$graphname = 'images/csimcache/custombaromwind';
$Title = 'Barometer and Wind Trends';
$yTitle = 'Pressure (' . $weatherArray['barUnit'] . ")";
$dateformat = 'M:Y';
$y2Title = $weatherArray['windUnit'];
$weatherSelector = array($weatherArray['SQLDataCustom']['Barometer'],$weatherArray['SQLDataCustom']['WindSpeed'],$weatherArray['SQLDataCustom']['HiWindSpeed'],$weatherArray['SQLDataCustom']['RecordTimeUnix']);
$filename = createDayTripleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$y2Title,$Title,1,$dateformat);
}

function weekBaromWind($weatherArray){
$graphnamewext = 'images/csimcache/weekbaromwind.png';
$graphname = 'images/csimcache/weekbaromwind';
$Title = 'Barometer and Wind Trends - Past 7 Days';
$yTitle = 'Pressure (' . $weatherArray['barUnit'] . ")";
$y2Title = $weatherArray['windUnit'];
$weatherSelector = array($weatherArray['SQLDataWeekly']['Barometer'],$weatherArray['SQLDataWeekly']['WindSpeed'],$weatherArray['SQLDataWeekly']['HiWindSpeed'],$weatherArray['SQLDataWeekly']['RecordTime']);
$filename = createWeekTripleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$y2Title,$Title,1);
}

function monthBaromWind($weatherArray){
$graphnamewext = 'images/csimcache/monthbaromwind.png';
$graphname = 'images/csimcache/monthbaromwind';
$Title = 'Barometer and Wind Trends - Past 30 Days';
$yTitle = 'Pressure (' . $weatherArray['barUnit'] . ")";
$y2Title = $weatherArray['windUnit'];
$weatherSelector = array($weatherArray['SQLDataMonthly']['Barometer'],$weatherArray['SQLDataMonthly']['WindSpeed'],$weatherArray['SQLDataMonthly']['HiWindSpeed'],$weatherArray['SQLDataMonthly']['RecordTime']);
$filename = createMonthTripleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$y2Title,$Title,1);
}

function dayHumidDewp($weatherArray){
$graphnamewext = 'images/csimcache/dayhumiddewp.png';
$graphname = 'images/csimcache/dayhumiddewp';
$Title = 'Humidity(b) and Dewpoint(r) Trends - Past 24hr';
$yTitle = 'Humidity (%)';
$y2Title = 'Dewpoint';
$weatherSelector = array($weatherArray['SQLData']['OutHumid'],$weatherArray['SQLData']['Dewpoint'],$weatherArray['SQLData']['RecordTime']);
createDayDoubleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$y2Title,$Title,0);
}

function weekHumidDewp($weatherArray){
$graphnamewext = 'images/csimcache/weekhumiddewp.png';
$graphname = 'images/csimcache/weekhumiddewp';
$Title = 'Humidity and Dewpoint Trends - Past 7 Days';
$yTitle = 'Humidity (Blue %)';
$y2Title = 'Dewpoint';
$weatherSelector = array($weatherArray['SQLDataWeekly']['OutHumid'],$weatherArray['SQLDataWeekly']['Dewpoint'],$weatherArray['SQLDataWeekly']['RecordTime']);
createWeekDoubleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$y2Title,$Title,0);
}

function monthHumidDewp($weatherArray){
$graphnamewext = 'images/csimcache/monthhumiddewp.png';
$graphname = 'images/csimcache/monthhumiddewp';
$Title = 'Humidity and Dewpoint Trends - Past 30 Days';
$yTitle = 'Humidity (Blue %)';
$y2Title = 'Dewpoint';
$weatherSelector = array($weatherArray['SQLDataMonthly']['OutHumid'],$weatherArray['SQLDataMonthly']['Dewpoint'],$weatherArray['SQLDataMonthly']['RecordTime']);
createMonthDoubleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$y2Title,$Title,0);
}

function dayRainRateandAccuml($weatherArray){
$graphnamewext = 'images/csimcache/dayrainrateandaccuml.png';
$graphname = 'images/csimcache/dayrainrateandaccuml';
$Title = 'Day Rain Rate Trends - Past 24hr';
$yTitle = 'Rain ('.$weatherArray['rateUnit'].'}';
$y2Title = '';
$weatherSelector = array($weatherArray['SQLData']['HiRainRate'],$weatherArray['SQLData']['HiRainRate'],$weatherArray['SQLData']['RecordTime']);
createDayDoubleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$y2Title,$Title,0);
}

function dayInTempHumid($weatherArray){
$graphnamewext = 'images/csimcache/dayintemphumid.png';
$graphname = 'images/csimcache/dayintemphumid';
$Title = 'Inside Temperature and Humidity Trends - Past 24hr';
$yTitle = 'Humidity (Blue %)';
$y2Title = 'Temperature C';
$weatherSelector = array($weatherArray['SQLData']['InHumid'],$weatherArray['SQLData']['InTemp'],$weatherArray['SQLData']['RecordTime']);
createDayDoubleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$y2Title,$Title,0);

}

function dayInTempOutTemp($weatherArray){
$graphnamewext = 'images/csimcache/dayintempouttemp.png';
$graphname = 'images/csimcache/dayintempouttemp';
$Title = 'Inside and Outside Temp Trends - Past 24hr';
$yTitle = 'In/Out - Red/Blue (C)';
$y2Title = '';
$weatherSelector = array($weatherArray['SQLData']['OutTemp'],$weatherArray['SQLData']['InTemp'],$weatherArray['SQLData']['RecordTime']);
createDayDoubleLineSIngleYGraph($weatherSelector,$graphname,$xTitle,$yTitle,$y2Title,$Title,0);

}

function daySolarRad($weatherArray){
$graphnamewext = 'images/csimcache/daySolarRad.png';
$graphname = 'images/csimcache/daySolarRad';
$Title = 'Solar Radiation Trend - Past 24hr';
$yTitle = 'Solar Rad (W/m2 or ft2)';
$weatherSelector = array($weatherArray['SQLData']['SolarRadSQL'],$weatherArray['SQLData']['RecordTime']);
createDaySingleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$Title,0);
}

function dayUV($weatherArray){
$graphnamewext = 'images/csimcache/dayUV.png';
$graphname = 'images/csimcache/dayUV';
$Title = 'UV Index Trend - Past 24hr';
$yTitle = '';
$weatherSelector = array($weatherArray['SQLData']['UVSQL'],$weatherArray['SQLData']['RecordTime']);
createDaySingleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$Title,0);
}


function weekSolarRad($weatherArray){
$graphnamewext = 'images/csimcache/weekSolarRad.png';
$graphname = 'images/csimcache/weekSolarRad';
$Title = 'Solar Radiation Trend - Past 7 Days';
$yTitle = 'Solar Rad (W/m2 or ft2)';
$weatherSelector = array($weatherArray['SQLDataWeekly']['SolarRad'],$weatherArray['SQLDataWeekly']['RecordTime']);
createWeekSingleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$Title,0);
}

function weekUV($weatherArray){
$graphnamewext = 'images/csimcache/weekUV.png';
$graphname = 'images/csimcache/weekUV';
$Title = 'UV Trend - Past 7 Days';
$yTitle = 'UV Index';
$weatherSelector = array($weatherArray['SQLDataWeekly']['UV'],$weatherArray['SQLDataWeekly']['RecordTime']);
createWeekSingleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$Title,0);
}

function weekInTempHumid($weatherArray){
$graphnamewext = 'images/csimcache/weekintemphumid.png';
$graphname = 'images/csimcache/weekintemphumid';
$Title = 'Inside Temperature and Humidity Trends - Past 7 Days';
$yTitle = 'Humidity (Blue %)';
$y2Title = 'Temperature C';
$weatherSelector = array($weatherArray['SQLDataWeekly']['InHumid'],$weatherArray['SQLDataWeekly']['InTemp'],$weatherArray['SQLDataWeekly']['RecordTime']);
createWeekDoubleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$y2Title,$Title,0);
}

function weekInTempOutTemp($weatherArray){
$graphnamewext = 'images/csimcache/weekintempouttemp.png';
$graphname = 'images/csimcache/weekintempouttemp';
$Title = 'Inside and Outside Temperature Trends - Past 7 Days';
$yTitle = 'Outside Temp (Blue C)';
$y2Title = '';
$weatherSelector = array($weatherArray['SQLDataWeekly']['OutTemp'],$weatherArray['SQLDataWeekly']['InTemp'],$weatherArray['SQLDataWeekly']['RecordTime']);
createWeekDoubleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$y2Title,$Title,0);
}

function monthSolarRad($weatherArray){
$graphnamewext = 'images/csimcache/monthSolarRad.png';
$graphname = 'images/csimcache/monthSolarRad';
$Title = 'Solar Radiation Trend - Past 30 Days';
$yTitle = 'Solar Rad (W/m2 or ft2)';
$weatherSelector = array($weatherArray['SQLDataMonthly']['SolarRad'],$weatherArray['SQLDataMonthly']['RecordTime']);
createMonthSingleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$Title,0);
}

function monthUV($weatherArray){
$graphnamewext = 'images/csimcache/monthUV.png';
$graphname = 'images/csimcache/monthUV';
$Title = 'UV Trend - Past 30 Days';
$yTitle = 'UV Index';
$weatherSelector = array($weatherArray['SQLDataMonthly']['UV'],$weatherArray['SQLDataMonthly']['RecordTime']);
createMonthSingleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$Title,0);
}

function monthInTempHumid($weatherArray){
$graphnamewext = 'images/csimcache/monthintemphumid.png';
$graphname = 'images/csimcache/monthintemphumid';
$Title = 'Inside Temperature and Humidity Trends - Past 30 Days';
$yTitle = 'Humidity (Blue %)';
$y2Title = 'Temperature C';
$weatherSelector = array($weatherArray['SQLDataMonthly']['InHumid'],$weatherArray['SQLDataMonthly']['InTemp'],$weatherArray['SQLDataMonthly']['RecordTime']);
createMonthDoubleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$y2Title,$Title,0);
}

function monthInTempOutTemp($weatherArray){
$graphnamewext = 'images/csimcache/monthintempouttemp.png';
$graphname = 'images/csimcache/monthintempouttemp';
$Title = 'Inside and Outside Temperature Trends - Past 30 Days';
$yTitle = 'Outisde Temp (Blue %)';
$y2Title = 'Inside Temp (C)';
$weatherSelector = array($weatherArray['SQLDataMonthly']['OutTemp'],$weatherArray['SQLDataMonthly']['InTemp'],$weatherArray['SQLDataMonthly']['RecordTime']);
createMonthDoubleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$y2Title,$Title,0);
}




function dayRainRate($weatherArray){
$graphnamewext = 'images/csimcache/dayrainrate.png';
$graphname = 'images/csimcache/dayrainrate';
$Title = 'High Rain Rate Trends - Past 24hr';
$yTitle = 'Rain Rate ('.$weatherArray['rateUnit'].')';
$weatherSelector = array($weatherArray['SQLData']['HiRainRate'],$weatherArray['SQLData']['RecordTime']);
createDaySingleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$Title,0);
}

function weekRainRate($weatherArray){
$graphnamewext = 'images/csimcache/weekrainrate.png';
$graphname = 'images/csimcache/weekrainrate';
$Title = 'High Rain Rate Trends - Past 7 Days';
$yTitle = 'Rain Rate ('.$weatherArray['rateUnit'].')';
$weatherSelector = array($weatherArray['SQLDataWeekly']['HiRainRate'],$weatherArray['SQLDataWeekly']['RecordTime']);
createWeekSingleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$Title,0);
}

function monthRainRate($weatherArray){
$graphnamewext = 'images/csimcache/monthrainrate.png';
$graphname = 'images/csimcache/monthrainrate';
$Title = 'High Rain Rate Trends - Past 31 Days';
$yTitle = 'Rain Rate ('.$weatherArray['rateUnit'].')';
$weatherSelector = array($weatherArray['SQLDataMonthly']['HiRainRate'],$weatherArray['SQLDataMonthly']['RecordTime']);
createMonthSingleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$Title,0);
}

function daywinddir($weatherArray){
$graphnamewext = 'images/csimcache/daywinddir.png';
$graphname = 'images/csimcache/daywinddir';
$Title = 'Wind Direction Trends - Past 24hr - Gaps indicate no wind';
$yTitle = 'Degrees';
$y2Title = '';
$weatherSelector = array($weatherArray['SQLData']['WindDir'],$weatherArray['SQLData']['RecordTime']);
createDaySingleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$Title,0);
}

function weekwinddir($weatherArray){
$graphnamewext = 'images/csimcache/weekwinddir.png';
$graphname = 'images/csimcache/weekwinddir';
$Title = 'Wind Direction Trends - Past 7 Days';
$yTitle = 'Degrees (Degrees)';
$y2Title = '';
$weatherSelector = array($weatherArray['SQLDataWeekly']['WindDir'],$weatherArray['SQLDataWeekly']['RecordTime']);
createWeekSingleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$Title,0);
}

function monthwinddir($weatherArray){
$graphnamewext = 'images/csimcache/monthwinddir.png';
$graphname = 'images/csimcache/monthwinddir';
$Title = 'Wind Direction Trends - Past 30 Days';
$yTitle = 'Degrees (Degrees)';
$y2Title = '';
$weatherSelector = array($weatherArray['SQLDataMonthly']['WindDir'],$weatherArray['SQLDataMonthly']['RecordTime']);
createMonthSingleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$Title,0);
}

function yearlinegraph($weatherData, $weatherTime){
$graphnamewext = 'images/csimcache/yearlinegraph.png';
$graphname = 'images/csimcache/yearlinegraph';
$Title = 'Graph of Past Year';
$yTitle = ' ';
$y2Title = '';
$weatherSelector = array($weatherData,$weatherTime);
createYearSingleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$Title,0);
}

function dayRainMeter($weatherArray){
$graphnamewext = 'images/csimcache/dayrainsummeter.png';
$graphname = 'images/csimcache/dayrainsummeter';
$Title = 'Rain Since Midnight';
$yTitle = '%';
$y2Title = 'Degrees C';
$weatherArray = dayRain($weatherArray);
$weatherSelector = array($weatherArray['SQLData']['RainPeriodSum'],$weatherArray['rainUnit']);
createSingleMeter($weatherSelector,$graphname,$xTitle,$yTitle,$y2Title,$Title,0);
}?>