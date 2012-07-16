<p>
	<?php 
	AllGraphs($selector[OutTemp],$TempUnit, $range, $starttime, $endtime, $max);
	AllGraphs($selector[Barometer],$TempUnit, $range, $starttime, $endtime, $max);
	AllGraphs($selector[Dewpoint],$TempUnit, $range, $starttime, $endtime, $max);
	AllGraphs($selector[WindChill],$TempUnit, $range, $starttime, $endtime, $max);
	AllGraphs($selector[WindSpeed],$TempUnit, $range, $starttime, $endtime, $max);
	AllGraphs($selector[OutHumid],$TempUnit, $range, $starttime, $endtime, $max);
	AllGraphs($selector[InHumid],$TempUnit, $range, $starttime, $endtime, $max);
	AllGraphs($selector[InTemp],$RainUnit, $range, $starttime, $endtime, $max);
	RainGraph($selector[HiRainRate],$TempUnit, $range, $starttime, $endtime, $max);
	AllGraphs($selector[HiWindSpeed],$TempUnit, $range, $starttime, $endtime, $max);
	AllGraphs($selector[HeatIndex],$TempUnit, $range, $starttime, $endtime, $max);
	AllGraphs($selector[WindDir],$TempUnit, $range, $starttime, $endtime, $max);
	RainGraph($selector[Rain],$RainUnit, $range, $starttime, $endtime, $max);
	
?></p>	

<!-- Now start Page Specific Tables and other Content -->
	<div>
	<div id="hilodatablock" class="hilocolumn">
			<div class="hilocol1">
			<div>High Temp:</div>
			<div>Low Temp:</div>
			<div>High Heat Index:</div>
			<div>Low Humidity:</div>
			<div>High Dewpoint:</div>
			<div>Low Dewpoint:</div>
			</div>
			
			<div class="hilocol2">
			<div><?php print fetchMinMaxData($selector[HiOutTemp],$TempUnit, $wanttime, $starttime, $endtime, $max);?></div>
			<div><?php print fetchMinMaxData($selector[OutTemp],$TempUnit, $wanttime, $starttime, $endtime, $min);?></div>
			<div><?php print fetchMinMaxData($selector[HeatIndex],$TempUnit, $wanttime, $starttime, $endtime, $max);?></div>
			<div><?php print fetchMinMaxData($selector[OutHumid],$HumidUnit, $wanttime, $starttime, $endtime, $min);?></div>
			<div><?php print fetchMinMaxData($selector[Dewpoint],$TempUnit, $wanttime, $starttime, $endtime, $max);?></div>
			<div><?php print fetchMinMaxData($selector[Dewpoint],$TempUnit, $wanttime, $starttime, $endtime, $min);?></div>
			</div>
			
			<div class="hilocol3">	
			<div>Low Wind Chill:</div>
			<div>Rain Total:</div>
			<div>High Rain Rate:</div>
			<div>High Wind Speed:</div>
			<div>High Barometer:</div>
			<div>Low Barometer:</div>
			</div>
			
			<div class="hilocol4">
			<div><?php print fetchMinMaxData($selector[WindChill],$TempUnit, $wanttime, $starttime, $endtime, $min);?></div>
			<div><?php print fetchRainSumData($selector[Rain],$RainUnit, $starttime, $endtime);?></div>
			<div><?php print fetchMinMaxData($selector[HiRainRate],$RainRateUnit, $wanttime, $starttime, $endtime, $max);?></div>
			<div><?php print fetchMinMaxData($selector[HiWindSpeed],$WindSpeedUnit, $wanttime, $starttime, $endtime, $max);?></div>
			<div><?php print fetchMinMaxData($selector[Barometer],$BaromUnit, $wanttime, $starttime, $endtime, $max);?></div>
			<div><?php print fetchMinMaxData($selector[Barometer],$BaromUnit, $wanttime, $starttime, $endtime, $min);?></div>
			</div>
	</div>	
		
		<div id="dailycharts">
		<div id="chartscol1">
		Temperature Graph (<?php $TempUnit ?>)<br/><img src="images/csimcache/OutTempday.png" width=" <?php $graphwidth ?>" height="<?php $grapheight ?>" alt="Year Temp Dew Chart"/>
		Rain Graph (<?php $RainUnit ?>)<br/><img src="images/csimcache/Rainday.png" width=" <?php $graphwidth ?>" height="<?php $grapheight ?>" alt="Year Rain per Week Chart"/>
		Wind Speed Graph (<?php $WindSpeedUnit ?>)<br/><img src="images/csimcache/WindSpeedday.png" width=" <?php $graphwidth ?>" height="<?php $grapheight ?>" alt="Year Wind Speed Chart"/>
		Wind Direction Graph (<?php $TempUnit ?>)<br/><img src="images/csimcache/WindDirday.png" width=" <?php $graphwidth ?>" height="<?php $grapheight ?>" alt="Year Wind Direction Chart"/>
		Heat Index Graph (<?php $TempUnit ?>)<br/><img src="images/csimcache/HeatIndexday.png" width=" <?php $graphwidth ?>" height="<?php $grapheight ?>" alt="Year Heat Chart"/>
		Hi Rain Rate Graph (<?php $RainRateUnit ?>)<br/><img src="images/csimcache/HiRainRateday.png" width=" <?php $graphwidth ?>" height="<?php $grapheight ?>" alt="Hi Rain Rate Chart"/>
	
		</div>
		
		<div id="chartscol2">
		Barometer Graph (<?php $BaromUnit ?>)<br/><img src="images/csimcache/Barometerday.png" width=" <?php $graphwidth ?>" height="<?php $grapheight ?>" alt="Year Barometer Trend Chart"/>
		High Windspeed Graph (<?php $WindSpeedUnit ?>)<br/><img src="images/csimcache/HiWindSpeedday.png" width=" <?php $graphwidth ?>" height="<?php $grapheight ?>" alt="Year High Windspeed Chart"/>
		Humidity Graph (<?php $HumidUnit ?>)<br/><img src="images/csimcache/OutHumidday.png" width=" <?php $graphwidth ?>" height="<?php $grapheight ?>" alt="Year Humidity Trend Chart"/>
		Dewpoint Graph (<?php $TempUnit ?>)<br/><img src="images/csimcache/Dewpointday.png" width=" <?php $graphwidth ?>" height="<?php $grapheight ?>" alt="Year Dewpoint Trend Chart"/>
		WindChill Graph (<?php $TempUnit ?>)<br/><img src="images/csimcache/WindChillday.png" width=" <?php $graphwidth ?>" height="<?php $grapheight ?>" alt="Year Chill Chart"/>
	
	
		</div>
	</div>