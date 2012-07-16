<div id="bottombox">
	<div class="leftconditions">
		<ul>
			<li class="header">
			<?php
			if ($weatherArray[almanacPeriod] == 'Weekly') {
			echo 'Weekly Almanac';
			}
			else {
			echo '7 Day Almanac';
			}
			?>
			</li>
			<li>
			<dl>
				<dt>Precipitation</dt>
				<dd style="<?php echo $weatherArray[RainPeriodSumCSS];?>"><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][Value][RainSum]; echo $weatherArray[rainUnit];?></dd>
			</dl>
			</li>
			<li>
			<dl>
				<dt>Evapotranspiration</dt>
				<dd style="<?php echo $weatherArray[ETPeriodSumCSS];?>">-<?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][Value][ETSum]; echo $weatherArray[rainUnit];?></dd>
			</dl>
			</li>
			<li>
			<dl>
				<dt>Net Moisture</dt>
				<dd style="<?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][Value][NetMoistureCSS];?>"><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][Value][NetMoisture]; echo $weatherArray[rainUnit];?></dd>
			</dl>
			<dl>
				<dt>------- -------</dt>
				<dd>------- -------</dd>
				<dt>Env. Canada: </dt>
				<dd><a href="http://www.weatheroffice.gc.ca/almanac/almanac_e.html?wqc">Records for Today</a></dd>
				<dt>&nbsp;</dt>
				<dd><a href="http://www.climate.weatheroffice.gc.ca/climateData/dailydata_e.html?StationID=8045">Weather Almanacs</a></dd>
				<dt>&nbsp;</dt>
				<dd><a href="http://climate.weatheroffice.gc.ca/climate_normals/stnselect_e.html?province=ALL&pageid=1&lang=e&StationName=alberni&stnNameBut=Search&SearchType=Contains">Historical</a>
			</dd>
			</dl>
			</li>
		</ul> 
		
	</div>
	<div class="leftconditions">
		<ul>
			<li class="header">
			Lows
			</li>
			<li>
			<dl>
				<dt>Temperature</dt>
				<dd style="<?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][Value][lowOutTempCSS];?>"><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][Value][lowoutTemp]; echo $weatherArray[tempUnit]; echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][ClockTime][lowoutTempTime]; ?></dd>
				<dt>Barometer</dt>
				<dd><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][Value][lowbarometer]; echo $weatherArray[barUnit];  echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][ClockTime][lowbarometerTime]; ?></dd>
				<dt>Dewpoint</dt>
				<dd><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][Value][lowdewpoint]; echo $weatherArray[tempUnit];  echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][ClockTime][lowdewpointTime]; ?></dd>
				<dt>Humidity</dt>
				<dd><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][Value][lowoutHumidity]; echo $weatherArray[humUnit]; echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][ClockTime][lowoutHumidityTime]; ?></dd>
			</dl>
			</li>
			<li>
			<dl>
				<dt>Wind Chill</dt>
				<dd><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][Value][lowwindchill]; echo $weatherArray[tempUnit]; echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][ClockTime][lowwindchillTime]; ?></dd>
				
			</dl>
			</li>
		</ul> 
	</div>
	
	<div class="leftconditions">
		<ul>
			<li class="header">
			Highs
			</li>
			<li>
			<dl>
				<dt>Temperature</dt>
				<dd><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][Value][hioutTemp]; echo $weatherArray[tempUnit];?><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][ClockTime][hioutTempTime]; ?></dd>
				<dt>Barometer</dt>
				<dd><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][Value][hibarometer]; echo $weatherArray[barUnit];?><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][ClockTime][hibarometerTime]; ?></dd>
				<dt>Dewpoint</dt>
				<dd><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][Value][hidewpoint]; echo $weatherArray[tempUnit];?><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][ClockTime][hidewpointTime]; ?></dd>
				<dt>Humidity</dt>
				<dd><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][Value][hioutHumidity]; echo $weatherArray[humUnit];?><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][ClockTime][hioutHumidityTime]; ?></dd>
				
			</dl>
			</li>
			<li>
			<dl>
				<dt>Wind Sustained</dt>
				<dd><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][Value][hiwindSpeed]; echo $weatherArray[windUnit];?><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][ClockTime][hiwindSpeedTime]; ?></dd>
				<dt>Wind Gust</dt>
				<dd><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][Value][hiwindGust]; echo $weatherArray[windUnit];?><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][ClockTime][hiwindGustTime]; ?></dd>
				<dt>Heat Index</dt>
				<dd><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][Value][hiheatindex]; echo $weatherArray[tempUnit];?><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][ClockTime][hiheatindexTime]; ?></dd>
				<dt>Solar</dt>
				<dd><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][Value][hiradiation]; echo $weatherArray[solarUnit];?><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][ClockTime][hiradiationTime]; ?></dd>
				<dt>UV</dt>
				<dd><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][Value][hiUV]; echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][ClockTime][hiUVTime]; ?></dd>
				
				<dt>Rain Rate</dt>
				<dd><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][Value][hirainRate]; echo $weatherArray[rateUnit];?><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][ClockTime][hirainRateTime]; ?></dd>
			</dl>
			</li>
		</ul> 
		
	</div>
	<div class="nofloatalm">
	&nbsp;
	</div>
	<div>
		<ul>
			<li>
			<dl>
				<dt></dt>
				<dd>
				<a href="?almanacPeriod=Daily">Daily</a> ::
				<a href="/Archive/">Daily Trends</a> ::
				<a href="?almanacPeriod=Weekly">Weekly</a> or <a href="?almanacPeriod=Seven"> past 7 Days</a> ::
				<a href="?almanacPeriod=Monthly">Monthly</a> :: 
				<a href="?almanacPeriod=Yearly">Yearly</a> :: 
				<a href="?almanacPeriod=AllTime">All Time</a> ::
				<a href="?almanacPeriod=Search">Search</a>
				
				<?php //Create links to Daily and Monthly Data Summaries
				/*
				$textyear = date('Y');
				$textmonth = date('m');
				$textmonthword = date('M');
				$textday = date('d');
				
				$textNOAAyearlink = 'NOAA-'.$textyear.'.txt';
				echo '<a style="color:blue;" href="/NOAA/'.$textNOAAyearlink.'">NOAA-'.$textyear.'-Text-Summary</a> - ';
				
				$textNOAAlink = 'NOAA-'.$textyear.'-'.$textmonth.'.txt';
				echo '<a style="color:blue;" href="/NOAA/'.$textNOAAlink.'">'.$textmonthword.' Text Summary</a> - ';
				
				$textDailylink = 'ARC-'.$textyear.'-'.$textmonth.'-'.$textday.'.txt';
				echo '<a style="color:blue;" href="/Archive/'.$textDailylink.'">Todays Text Data</a>';
				*/?>
				</dd>
			</dl>
			</li>
		</ul> 
	</div>

</div>
