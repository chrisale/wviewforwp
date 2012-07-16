<p>
	<?php 
	$div = '<div>';
	$closediv = '</div>';
	$valuecounter = 1;
	$graphvaluecounter = 1;
	
	if ($_POST['showtemp'] == 1) {
	AllGraphs($selector[OutTemp],$TempUnit, $range, $starttime, $endtime, $max);
	AllGraphs($selector[InTemp],$TempUnit, $range, $starttime, $endtime, $max);
	
	$hightempvalue = fetchMinMaxData($selector[OutTemp],$TempUnit, $wanttime, $starttime, $endtime, $max);
	$lowtempvalue = fetchMinMaxData($selector[OutTemp],$TempUnit, $wanttime, $starttime, $endtime, $min);
	
	
	$textdivarray[$valuecounter] = '<div>High Temp:</div>';
	$valuedivarray[$valuecounter] = $div . $hightempvalue . $closediv;
	$valuecounter++;
	
	$textdivarray[$valuecounter] = '<div>Low Temp:</div>';
	$valuedivarray[$valuecounter] = $div . $lowtempvalue . $closediv;
	$valuecounter++;
	
	$grapharray[$graphvaluecounter] = 'Temperature Graph (' . $Units[Temp] . ')<br/>
	<img src="images/csimcache/OutTempday.png" width="' . $graphwidth . '" height=" ' . $grapheight . '" alt="Temp Chart"/>';
	$graphvaluecounter++;
	
	}
	
	if ($_POST['showwind'] == 1) {
	AllGraphs($selector[WindSpeed],$TempUnit, $range, $starttime, $endtime, $max);
	AllGraphs($selector[HiWindSpeed],$TempUnit, $range, $starttime, $endtime, $max);
	AllGraphs($selector[WindDir],$TempUnit, $range, $starttime, $endtime, $max);
	$highwindvalue = fetchMinMaxData($selector[HiWindSpeed],$WindSpeedUnit, $wanttime, $starttime, $endtime, $max);
	
	$textdivarray[$valuecounter] = '<div>High Wind:</div>';
	$valuedivarray[$valuecounter] = $div . $highwindvalue . $closediv;
	$valuecounter++;
		
	
	$grapharray[$graphvaluecounter] = 'High Wind Speed Graph (' . $CurrentUnitArray[Wind] . ')<br/>
	<img src="images/csimcache/HiWindSpeedday.png" width="' . $graphwidth . '" height=" ' . $grapheight . '" alt="High Wind Speed Chart"/>';
	$graphvaluecounter++;
	
	$grapharray[$graphvaluecounter] = 'Wind Speed Graph (' . $Units[Wind] . ')<br/>
	<img src="images/csimcache/WindSpeedday.png" width="' . $graphwidth . '" height=" ' . $grapheight . '" alt="Year Wind Speed Chart"/>';
	$graphvaluecounter++;
	
	$grapharray[$graphvaluecounter] = 'Wind Direction Graph (' . $Units[Wind] . ')<br/>
	<img src="images/csimcache/WindDirday.png" width="' . $graphwidth . '" height=" ' . $grapheight . '" alt="Year Wind Direction Chart"/>';
	$graphvaluecounter++;
	
	}
	
	if ($_POST['showdew'] == 1) {
	AllGraphs($selector[Dewpoint],$TempUnit, $range, $starttime, $endtime, $max);
	$highdewvalue = fetchMinMaxData($selector[Dewpoint],$TempUnit, $wanttime, $starttime, $endtime, $max);
	$lowdewvalue = fetchMinMaxData($selector[Dewpoint],$TempUnit, $wanttime, $starttime, $endtime, $min);
	
	$textdivarray[$valuecounter] = '<div>High Dewpoint:</div>';
	$valuedivarray[$valuecounter]= $div . $highdewvalue . $closediv;
	$valuecounter++;
	
	$textdivarray[$valuecounter] = '<div>Low Dewpoint:</div>';
	$valuedivarray[$valuecounter] = $div . $lowdewvalue . $closediv;
	$valuecounter++;
	
	$grapharray[$graphvaluecounter] = 'Dewpoint Graph (' . $Units[Temp] . ')<br/>
	<img src="images/csimcache/Dewpointday.png" width="' . $graphwidth . '" height=" ' . $grapheight . '" alt="Year Dewpoint Trend Chart"/>';
	$graphvaluecounter++;
	
	}
	if ($_POST['showhumid'] == 1) {
	AllGraphs($selector[OutHumid],$TempUnit, $range, $starttime, $endtime, $max);
	AllGraphs($selector[InHumid],$TempUnit, $range, $starttime, $endtime, $max);
	$lowhumidvalue = fetchMinMaxData($selector[OutHumid],$HumidUnit, $wanttime, $starttime, $endtime, $min);
	
	$textdivarray[$valuecounter] = '<div>Low Humidity:</div>';
	$valuedivarray[$valuecounter] = $div . $lowhumidvalue . $closediv;
	$valuecounter++;
	
	
	$grapharray[$graphvaluecounter] = 'Humidity Graph (' . $Units[Humid] . ')<br/>
	<img src="images/csimcache/OutHumidday.png" width="' . $graphwidth . '" height=" ' . $grapheight . '" alt="Year Humidity Trend Chart"/>';
	$graphvaluecounter++;
	
	}
	if ($_POST['showheat'] == 1) {
	$highheatvalue = fetchMinMaxData($selector[HeatIndex],$TempUnit, $wanttime, $starttime, $endtime, $max);
	AllGraphs($selector[HeatIndex],$TempUnit, $range, $starttime, $endtime, $max);
	
	$textdivarray[$valuecounter] = '<div>High Heat Index:</div>';
	$valuedivarray[$valuecounter] = $div . $highheatvalue . $closediv;
	$valuecounter++;
	
	$grapharray[$graphvaluecounter] = 'Heat Index Graph (' . $Units[Temp] . ')<br/>
	<img src="images/csimcache/HeatIndexday.png" width="' . $graphwidth . '" height=" ' . $grapheight . '" alt="Year Heat Chart"/>';
	$graphvaluecounter++;
	
	}
	
	if ($_POST['showchill'] == 1) {
	AllGraphs($selector[WindChill],$TempUnit, $range, $starttime, $endtime, $max);
	$lowchillvalue = fetchMinMaxData($selector[WindChill],$TempUnit, $wanttime, $starttime, $endtime, $min);
	
	$textdivarray[$valuecounter] = '<div>Low Wind Chill:</div>';
	$valuedivarray[$valuecounter] = $div . $lowchillvalue . $closediv;
	$valuecounter++;
	
	$grapharray[$graphvaluecounter] = 'Wind Chill Graph (' . $Units[Temp] . ')<br/>
	<img src="images/csimcache/WindChillday.png" width="' . $graphwidth . '" height=" ' . $grapheight . '" alt="Year Chill Chart"/>';
	$graphvaluecounter++;
	
	}
	
	if ($_POST['showrain'] == 1) {
	AllGraphs($selector[HiRainRate],$TempUnit, $range, $starttime, $endtime, $max);
	RainGraph($selector[Rain],$TempUnit, $range, $starttime, $endtime, $max);
	$totalrainvalue = fetchRainSumData($selector[Rain],$RainUnit, $starttime, $endtime);
	$highrainratevalue = fetchMinMaxData($selector[HiRainRate],$RainRateUnit, $wanttime, $starttime, $endtime, $max);
	
	$textdivarray[$valuecounter] = '<div>Total Rain:</div>';
	$valuedivarray[$valuecounter] = $div . $totalrainvalue . $closediv;
	$valuecounter++;
	
	$textdivarray[$valuecounter] = '<div>High Rain Rate:</div>';
	$valuedivarray[$valuecounter] = $div . $highrainratevalue . $closediv;
	$valuecounter++;
	
	
	
	$grapharray[$graphvaluecounter] = 'Rain Accumulation Graph ('. $Units[Rain] . ')<br/>
	<img src="images/csimcache/Rainday.png" width="' . $graphwidth . '" height=" ' . $grapheight . '" alt="Rain Chart"/>';
	$graphvaluecounter++;
	
	$grapharray[$graphvaluecounter] = 'High Rain Rate Graph (' . $Units[RainRate] . ')<br/>
	<img src="images/csimcache/HiRainRateday.png" width="' . $graphwidth . '" height=" ' . $grapheight . '" alt="Hi Rain Rate Chart"/>';
	$graphvaluecounter++;
	
	}
	
	if ($_POST['showbarom'] == 1) {
	AllGraphs($selector[Barometer],$TempUnit, $range, $starttime, $endtime, $max);
	$highbaromvalue = fetchMinMaxData($selector[Barometer],$TempUnit, $wanttime, $starttime, $endtime, $max);
	$lowbaromvalue = fetchMinMaxData($selector[Barometer],$TempUnit, $wanttime, $starttime, $endtime, $min);
	
	$textdivarray[$valuecounter] = '<div>Low Barometer:</div>';
	$valuedivarray[$valuecounter] = $div . $lowbaromvalue . $closediv;
	$valuecounter++;
	
	$textdivarray[$valuecounter] = '<div>High Barometer:</div>';
	$valuedivarray[$valuecounter] = $div . $highbaromvalue . $closediv;
	$valuecounter++;
	
	$grapharray[$graphvaluecounter] = 'Barometer Graph (' . $Units[Barom] . ')<br/>
	<img src="images/csimcache/Barometerday.png" width="' . $graphwidth . '" height=" ' . $grapheight . '" alt="Year Barometer Trend Chart"/>';
	$graphvaluecounter++;
	
	}
	
	/*
	
	
	
	
	
	
	
	
	
	
	*/
	
?></p>	


<!-- Now start Page Specific Tables and other Content -->
	
	<div id="hilodatablock" class="hilocolumn">

<?php 

$i=1; 
while ($i<=$valuecounter) { 
//We need a way to split the data into two tables for nice presentation, I will do this by copying every other value to a new array so that all values meant to be together in a column will be together in the array.  And then we can just spit them out all at once.

if ($i % 2) {
	$showtextarrayleft[$i] = $textdivarray[$i];
	$showvaluearrayleft[$i] = $valuedivarray[$i];
	$showgrapharraryleft[$i] = $grapharray[$i];
	}
else {
	$showtextarrayright[$i] = $textdivarray[$i];
	$showvaluearrayright[$i] = $valuedivarray[$i];
	$showgrapharraryright[$i] = $grapharray[$i];
	}
$i++;

}

$i=1; 
while ($i<=$graphvaluecounter) { 
//Same for the graphs
if ($i % 2) {
	$showgrapharrayleft[$i] = $grapharray[$i];
	}
else {
	$showgrapharrayright[$i] = $grapharray[$i];
	}
$i++;

}

?>
		<div class="hilocol1">
			<?php 
			echo unitGrabber(Wind,$_COOKIE['CurrentUnitSystem']);
			$i=1;
			while ($i<= $valuecounter) {
			echo $showtextarrayleft[$i];
			$i++;
			}?>
			</div>
			
			<div class="hilocol2">
			<?php 
			$i=1;
			while ($i<= $valuecounter) {
			echo $showvaluearrayleft[$i];
			$i++;
			}?>
			</div>
			
			<div class="hilocol3">
			<?php 
			$i=1;
			while ($i<= $valuecounter) {
			echo $showtextarrayright[$i];
			$i++;
			}?>	
			</div>
			
			<div class="hilocol4">
			<?php 
			$i=1;
			while ($i<= $valuecounter) {
			echo $showvaluearrayright[$i];
			$i++;
			}?>
			<?php
			?>	 	
	</div>
		<div id="dailycharts">
		<div id="chartscol1">
		<?php $i=1;
			while ($i<= $graphvaluecounter) {
			echo $showgrapharrayleft[$i];
			$i++;
			}
		?>
		</div>
		
		<div id="chartscol2">
		<?php $i=1;
			while ($i<= $graphvaluecounter) {
			echo $showgrapharrayright[$i];
			$i++;
			}
		?>
		</div>