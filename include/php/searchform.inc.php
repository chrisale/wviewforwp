<p style="text-align: center;">Select a date range to view hourly weather statistics for that time period<br/></p>

<form style="text-align:center" method="post" action="/?almanacPeriod=SearchGo" id="Search"><?php 

$Year = date('Y');
  //Create the form 
  //Create the month pull-down menu 
  echo "<p>";
  echo "<select name='startmonth'>";
  $month = date('m', strtotime('-1 month'));
  $monthcount = 1;
  
  //Creating From Month Dropdown
  while ($monthcount <= 12) { 
  
  $monthname = date('F', mktime(00,01,00,$monthcount,1,date('Y')));
  $monthcount = date('m', mktime(00,01,00,$monthcount,1,date('Y')));
  
  	if ($monthcount == $month) {
   		echo "<option value='$monthcount' selected='selected'>$monthname</option>";
    }
    else {
    	echo "<option value='$monthcount'>$monthname</option>"; 
    }
    $monthcount++;
  }
  //End From Month Dropdown
  
  echo "</select>"; 
  echo "<select name='startday'>"; 
 
 $day = date('d');
 $newdate = date('d', strtotime("-1 day", strtotime(date('d.m.Y', mktime(00,01,00,date('m', strtotime("+1 month")),1,date('Y'))))));
  
  $newdate = 1;
  while ($newdate <= 31 && $newdate > 0) { 
  
  	if ($newdate == $day) {
   		echo "<option value='$newdate' selected='selected'>$newdate</option>";
    }
    else {
    	echo "<option value='$newdate'>$newdate</option>"; 
    }
    $newdate++;
  }
 
  echo "</select>"; //Create the year pull-down menu. 
  echo "<select name='startyear'>"; 
  
  $currentyear = date('Y', strtotime('-1 month'));
  
  while ($Year >= 2005) { 
  	if ($currentyear != $Year){
    echo "<option value='$Year'>$Year</option>";
    }
    else {
    echo "<option value='$Year' selected='selected'>$Year</option>";
    }
    $Year--; 
  } 
  echo "</select>";
   echo "<select name='starthour'>"; 
  
  $hour = date('H');
  $hourcount = 0;
  while ($hourcount <= 23) { 
  
 //$hourcount = date('H', mktime(01,01,00,01,1,date('Y')));
 
 if ($hourcount < 10) {
 	
 	$hourcount = '0' . $hourcount;
 
 }
  
  	if ($hourcount == $hour) {
   		echo "<option value='$hourcount' selected='selected'>$hourcount:00</option>";
    }
    else {
    	echo "<option value='$hourcount'>$hourcount:00</option>"; 
    }
    $hourcount++;
  }
  
  
  echo "</select>"; 
  echo ""; ?>
  
   to 
  
  <?php
  $Year = date('Y');


  //Create the form 
  //Create the month pull-down menu 
  echo "<select name='endmonth'>";
  $month = date('m');
  $monthcount = 1;
  while ($monthcount <= 12) { 
  
  $monthname = date('F', mktime(00,01,00,$monthcount,1,date('Y')));
  $monthcount = date('m', mktime(00,01,00,$monthcount,1,date('Y')));
  
  	if ($monthcount == $month) {
   		echo "<option value='$monthcount' selected='selected'>$monthname</option>";
    }
    else {
    	echo "<option value='$monthcount'>$monthname</option>"; 
    }
    $monthcount++;
  }
  
  
  echo "</select>"; 
  
  
  echo "<select name='endday'>"; 
 
 $day = date('d');
 $newdate = date('d', strtotime("-1 day", strtotime(date('d.m.Y', mktime(00,01,00,date('m', strtotime("+1 month")),1,date('Y'))))));
  
  $newdate = 1;
  while ($newdate <= 31 && $newdate > 0) { 
  
  	if ($newdate == $day) {
   		echo "<option value='$newdate' selected='selected'>$newdate</option>";
    }
    else {
    	echo "<option value='$newdate'>$newdate</option>"; 
    }
    $newdate++;
  }
  
  /*while ($newdate < $day && $newdate > 0 ) { 
  
  	echo "<option value='$newdate'>$newdate</option>"; 
    $newdate = date('d', strtotime("-1 day", strtotime(date('d.m.Y', mktime(00,01,00,date('m'),$newdate,date('Y'))))));
  }*/
  
  
  
  echo "</select>"; //Create the year pull-down menu. 
  echo "<select name='endyear'>"; 

  while ($Year >= 2005) { 
    echo "<option value='$Year'>$Year</option>"; 
    $Year--; 
  } 
  echo "</select>";
   echo "<select name='endhour'>"; 
  
  $hour = date('H');
  $hourcount = 0;
  while ($hourcount <= 23) { 
  
 //$hourcount = date('H', mktime(01,01,00,01,1,date('Y')));
 
 if ($hourcount < 10) {
 	
 	$hourcount = $hourcount;
 
 }
  
  	if ($hourcount == $hour) {
   		echo "<option value='$hourcount' selected='selected'>$hourcount:00</option>";
    }
    else {
    	echo "<option value='$hourcount'>$hourcount:00</option>"; 
    }
    $hourcount++;
  }
  
  echo "</select>"; 

	?></p><p>
<input type="hidden" name="range" value='1' /><input type="hidden" name="refinedsearch" value='1' /><input type="hidden" name="starttime" value="<?php echo $starttime; ?>" /><input type="hidden" name="endtime" value="<?php echo $endtime; ?>" /><input type='reset' value='Reset Dates' /><input type='submit' name='submit' value='Submit Dates' /></p></form>

<?php

if ($_POST['range'] == 1) {
 
 $poststarthour = $_POST['starthour'];
				if ($poststarthour < 10) {
					$poststarthour = $poststarthour;

				}
			$weatherArray[starttime] = '"' . $_POST['startyear'] . '-' . $_POST['startmonth'] . '-' . $_POST['startday'] . ' ' . $poststarthour . ':00' . ':00"';
			$weatherArray[endtime] = '"' . $_POST['endyear'] . '-' . $_POST['endmonth'] . '-' . $_POST['endday'] . ' ' . $_POST['endhour'] . ':00' . ':00"';
			
			

		$countresult = count($weatherArray[SQLDataCustom][RecordTime]);
		
?>

<form method="post" action="/wp-content/themes/default/createfile.php?almanacPeriod=SearchGoFile">
<input type="hidden" name="range" value='1' /><input type="hidden" name="refinedsearch" value='1' /><input type="hidden" name="starttime" value="<?php echo $weatherArray[SQLDataCustom][RecordTime][1];?>" /><input type="hidden" name="endtime" value="<?php echo $weatherArray[SQLDataCustom][RecordTime][$countresult]; ?>" />
<input type='submit' name='submit' value='Download this in Excel (CSV) format' /></form>

<small><a href="#Totals">Go To Totals, Averages and Graphs</a></small><br/>

<small>Times are <?php echo $weatherArray[timeOffsetSymbol];?> Local Time (UTC<?php echo $weatherArray[timeOffsetSign]; echo $weatherArray[timeOffsetNum]?>)</small>
</p>

<?php
echo '<table id="customsearch" style="width:800px;">';
echo '<tr>';
echo '<td class="tabularheader">Date and Time</td>';
echo '<td class="tabularheader">OutTemp</td>';
echo '<td class="tabularheader">InTemp</td>';
echo '<td class="tabularheader">Barom</td>';
echo '<td class="tabularheader">OutHumid</td>';
echo '<td class="tabularheader">InHumid</td>';
echo '<td class="tabularheader">Rain</td>';
echo '<td class="tabularheader"">HiRainRate</td>';
echo '<td class="tabularheader">Wind</td>';
echo '<td class="tabularheader">HiWind</td>';
echo '<td class="tabularheader">WdDir</td>';
echo '<td class="tabularheader">HiWdDir</td>';
echo '<td class="tabularheader">Dew</td>';
echo '<td class="tabularheader">Chill</td>';
echo '<td class="tabularheader">HeatIdx</td>';
echo '<td class="tabularheader">SolRad</td>';
echo '<td class="tabularheader">UV</td>';
echo '<td class="tabularheader">Evap</td>';
echo '</tr>';

//echo $weatherArray[SQLData][RecordTime][3];

$i = 1;
$j = 1;
$HiRainRate = 0;
$HiWindSpeed = 0;
$rainSum = 0;
$etSum = 0;

foreach ($weatherArray[SQLDataCustom][RecordTime] as $key=>$value) {


echo '<tr>';
echo '<td class="tabulardataodd">';
echo $weatherArray[SQLDataCustom][RecordTime][$key];
echo '</td>'; echo '<td class="tabulardataeven">';
echo $weatherArray[SQLDataCustom][OutTemp][$key];
echo $weatherArray[tempUnit];
echo '</td>'; echo '<td class="tabulardataodd">';
echo $weatherArray[SQLDataCustom][InTemp][$key];
echo $weatherArray[tempUnit];
echo '</td>'; echo '<td class="tabulardataeven">';
echo $weatherArray[SQLDataCustom][Barometer][$key];
echo $weatherArray[barUnit];
echo '</td>'; echo '<td class="tabulardataodd">';
echo $weatherArray[SQLDataCustom][OutHumid][$key];
echo $weatherArray[humUnit];
echo '</td>'; echo '<td class="tabulardataeven">';
echo $weatherArray[SQLDataCustom][InHumid][$key];
echo $weatherArray[humUnit];
echo '</td>'; echo '<td class="tabulardataodd">';
echo $weatherArray[SQLDataCustom][Rain][$key];
echo $weatherArray[rainUnit];
echo '</td>'; echo '<td class="tabulardataeven">';
echo $weatherArray[SQLDataCustom][HiRainRate][$key];
echo $weatherArray[rateUnit];
echo '</td>'; echo '<td class="tabulardataodd">';
echo $weatherArray[SQLDataCustom][WindSpeed][$key];
echo $weatherArray[windUnit];
echo '</td>'; echo '<td class="tabulardataeven">';
echo $weatherArray[SQLDataCustom][HiWindSpeed][$key];
echo $weatherArray[windUnit];
echo '</td>'; echo '<td class="tabulardataodd">';
echo $weatherArray[SQLDataCustom][WindDir][$key];
echo '</td>'; echo '<td class="tabulardataeven">';
echo $weatherArray[SQLDataCustom][HiWindDir][$key];
echo '</td>'; echo '<td class="tabulardataodd">';
echo $weatherArray[SQLDataCustom][Dewpoint][$key];
echo $weatherArray[tempUnit];
echo '</td>'; echo '<td class="tabulardataeven">';
echo $weatherArray[SQLDataCustom][WindChill][$key];
echo $weatherArray[tempUnit];
echo '</td>'; echo '<td class="tabulardataodd">';
echo $weatherArray[SQLDataCustom][HeatIndex][$key];
echo $weatherArray[tempUnit];
echo '</td>'; echo '<td class="tabulardataeven">';
echo $weatherArray[SQLDataCustom][SolarRadSQL][$key];
echo $weatherArray[solarUnit];
echo '</td>'; echo '<td class="tabulardataeven">';
echo $weatherArray[SQLDataCustom][UVSQL][$key];
echo '</td>'; echo '<td class="tabulardataeven">';
echo $weatherArray[SQLDataCustom][ET][$key];
echo $weatherArray[rainUnit];
echo '</td>'; echo '</tr>';
}
echo '<tr>';
echo '<td class="tabularheader">Date and Time</td>';
echo '<td class="tabularheader">OutTemp</td>';
echo '<td class="tabularheader">InTemp</td>';
echo '<td class="tabularheader">Barom</td>';
echo '<td class="tabularheader">OutHumid</td>';
echo '<td class="tabularheader">InHumid</td>';
echo '<td class="tabularheader">Rain</td>';
echo '<td class="tabularheader"">HiRainRate</td>';
echo '<td class="tabularheader">Wind</td>';
echo '<td class="tabularheader">HiWind</td>';
echo '<td class="tabularheader">WdDir</td>';
echo '<td class="tabularheader">HiWdDir</td>';
echo '<td class="tabularheader">Dew</td>';
echo '<td class="tabularheader">Chill</td>';
echo '<td class="tabularheader">HeatIdx</td>';
echo '<td class="tabularheader">SolRad</td>';
echo '<td class="tabularheader">UV</td>';
echo '<td class="tabularheader">Evap</td>';
echo '</tr>';
'<tr>';
echo '<td class="tabularheader">------</td>';
echo '<td class="tabularheader">------</td>';
echo '<td class="tabularheader">------</td>';
echo '<td class="tabularheader">------</td>';
echo '<td class="tabularheader">------</td>';
echo '<td class="tabularheader">------</td>';
echo '<td class="tabularheader">------</td>';
echo '<td class="tabularheader">------</td>';
echo '<td class="tabularheader">------</td>';
echo '<td class="tabularheader">------</td>';
echo '<td class="tabularheader">------</td>';
echo '<td class="tabularheader">------</td>';
echo '<td class="tabularheader">------</td>';
echo '<td class="tabularheader">------</td>';
echo '<td class="tabularheader">------</td>';
echo '<td class="tabularheader">------</td>';
echo '<td class="tabularheader">------</td>';
echo '<td class="tabularheader">------</td>';
echo '</tr>';
echo '<tr>';
echo '<td class="tabulardataodd" id="Totals">';
echo 'Totals and Averages';
echo '</td>'; echo '<td class="tabulardataeven"><strong>';
echo $weatherArray[SQLDataCustom][OutTempAvg];
echo $weatherArray[tempUnit];
echo '</td>'; echo '<td class="tabulardataodd"><strong>';
echo $weatherArray[SQLDataCustom][InTempAvg];
echo $weatherArray[tempUnit];
echo '</strong></td>'; echo '<td class="tabulardataeven"><strong>';
echo $weatherArray[SQLDataCustom][BarometerAvg];
echo $weatherArray[barUnit];
echo '</strong></td>'; echo '<td class="tabulardataodd"><strong>';
echo $weatherArray[SQLDataCustom][OutHumidAvg];
echo $weatherArray[humUnit];
echo '</strong></td>'; echo '<td class="tabulardataeven"><strong>';
echo $weatherArray[SQLDataCustom][InHumidAvg];
echo $weatherArray[humUnit];
echo '</strong></td>'; echo '<td class="tabulardataodd"><strong>';
echo $weatherArray[SQLDataCustom][RainSum];
echo $weatherArray[rainUnit];
echo '</strong></td>'; echo '<td class="tabulardataeven"><strong>';
echo $weatherArray[SQLDataCustom][HiRainRateMax];
echo $weatherArray[rateUnit];
echo '</strong></td>'; echo '<td class="tabulardataodd"><strong>';
echo $weatherArray[SQLDataCustom][WindSpeedAvg];
echo $weatherArray[windUnit];
echo '</strong></td>'; echo '<td class="tabulardataeven"><strong>';
echo $weatherArray[SQLDataCustom][HiWindSpeedMax];
echo $weatherArray[windUnit];
echo '</strong></td>'; echo '<td class="tabulardataodd"><strong>';
echo $weatherArray[SQLDataCustom][WindDirAvg];
echo '</strong></td>'; echo '<td class="tabulardataeven"><strong>';
echo $weatherArray[SQLDataCustom][HiWindDirAvg];
echo '</strong></td>'; echo '<td class="tabulardataodd"><strong>';
echo $weatherArray[SQLDataCustom][DewpointAvg];
echo $weatherArray[tempUnit];
echo '</strong></td>'; echo '<td class="tabulardataeven"><strong>';
echo $weatherArray[SQLDataCustom][WindChillAvg];
echo $weatherArray[tempUnit];
echo '</strong></td>'; echo '<td class="tabulardataodd"><strong>';
echo $weatherArray[SQLDataCustom][HeatIndexAvg];
echo $weatherArray[tempUnit];
echo '</strong></td>'; echo '<td class="tabulardataeven"><strong>';
echo $weatherArray[SQLDataCustom][SolarRadSQLAvg];
echo $weatherArray[solarUnit];
echo '</strong></td>'; echo '<td class="tabulardataeven"><strong>';
echo $weatherArray[SQLDataCustom][UVSQLAvg];
echo '</strong></td>'; echo '<td class="tabulardataeven"><strong>-';
echo $weatherArray[SQLDataCustom][ETSum];
echo $weatherArray[rainUnit];
echo '</strong></td>'; echo '</tr>';



echo '</table>';

echo '<p><a href="#Search">Back to Top Search</a><br/>';

customTempChillHeat($weatherArray);
echo '<a href="/index.php/custom-data-search-large-temperature-graph/"><img src="images/csimcache/customtempchillheat.png"></a>';

customBaromWind($weatherArray);
echo '<a href="/index.php/custom-data-search-large-barometer-and-wind-graph/"><img src="images/csimcache/custombaromwind.png"></a></p>';

}
else {

	echo '<h3>Waiting for Your Selection</h3>';

}
?>