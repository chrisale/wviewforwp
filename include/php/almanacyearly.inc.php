<div id="bottombox">
	<div class="leftconditions">
		<ul>
			<li class="header">
			<?php
			if ($weatherArray[almanacPeriod] == 'Yearly') {
			echo 'Yearly Almanac';
			$sincemessage = "</dt><dd style=''>";
			}
			else {
			echo '365 Day Almanac';
			$sincemessage = "<br/><small>Since August 2008</small><br/></dt><dd style=''><br/>";
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
				<dt>Evapotranspiration<?php echo $sincemessage;?>-<?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][Value][ETSum]; echo $weatherArray[rainUnit];?></dd>
			</dl>
			</li>
			<li>
			<dl>
				<dt>Net Moisture<?php echo $sincemessage;?><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][Value][NetMoisture]; echo $weatherArray[rainUnit];?></dd>
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
				<dd><?php echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][Value][lowoutTemp]; echo $weatherArray[tempUnit]; echo $weatherArray[SQLData][$weatherArray[almanacPeriod]][ClockTime][lowoutTempTime]; ?></dd>
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
	<div>
		<ul>
			<li>
			<dl>
				<dt></dt>
				<dd>
				<a href="?almanacPeriod=Daily">Daily</a> ::
				<a href="/Archive/">Daily Trends</a> ::
				<a href="?almanacPeriod=Weekly">Weekly</a> ::
				<a href="?almanacPeriod=Monthly">Monthly</a> :: 
				<a href="?almanacPeriod=Yearly">Yearly</a>, <a href="?almanacPeriod=ThreeSixFive"> past 365 Days, </a> or <a href="/NOAA/">NOAA Reports</a>:: 
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
