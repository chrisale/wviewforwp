<div id="bottombox">
	<div class="leftconditions">
		<ul>
			<li class="header">
			Todays Almanac
			</li>
			<li>
			<dl>
				<dt>Sunrise</dt>
				<dd><?php echo $weatherArray[sunriseTime];?></dd>
				<dt>Sunset</dt>
				<dd><?php echo $weatherArray[sunsetTime];?></dd>
				<dt>Dawn to Dusk</dt>
				<dd><?php echo $weatherArray[dawnToDuskTime];?> Hours</dd>
				<dt>Moon Phase</dt>
				<dd><?php echo $weatherArray[moonPhase];?></dd>
				<dt>------- -------</dt>
				<dd>------- -------</dd>
			</dl>
			</li>
			<li>
			<dl>
				<dt>Rain since Midnight</dt>
				<dd style="<?php echo $weatherArray[RainPeriodSumCSS];?>"><?php echo $weatherArray[SQLData][RainPeriodSum]; echo $weatherArray[rainUnit];?></dd>
				<dt>Rain in Past 24hr</dt>
				<dd style="<?php echo $weatherArray[dailyRainCSS];?>"><?php echo $weatherArray[dailyRain]; echo $weatherArray[rainUnit];?></dd>
			</dl>
			</li>
			<li>
			<dl>
				<dt>ET since Midnight</dt>
				<dd style="<?php echo $weatherArray[ETPeriodSumCSS];?>"><?php echo $weatherArray[SQLData][ETPeriodSum]; echo $weatherArray[rainUnit];?></dd>
				<dt>ET in Past 24hr</dt>
				<dd style="<?php echo $weatherArray[dailyETCSS];?>"><?php echo $weatherArray[dailyET]; echo $weatherArray[rainUnit];?></dd>
			</dl>
			</li>
			
			<li>
			<dl>
				<dt>Rain Storm Total</dt>
				<dd style="<?php echo $weatherArray[stormRainCSS];?>"><?php echo $weatherArray[stormRain]; echo $weatherArray[rainUnit];?> <br/><?php //echo $weatherArray[stormStart];?></dd>
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
				<dd style="<?php echo $weatherArray[lowOutsideTempCSS];?>"><?php echo $weatherArray[lowOutsideTemp]; echo $weatherArray[tempUnit];?><?php echo $weatherArray[lowOutsideTempTime]; ?></dd>
				<dt>Barometer</dt>
				<dd style="<?php echo $weatherArray[lowBarometerCSS];?>"><?php echo $weatherArray[lowBarometer];echo $weatherArray[barUnit]; ?><?php echo $weatherArray[lowBarometerTime]; ?></dd>
				<dt>Dewpoint</dt>
				<dd style="<?php echo $weatherArray[lowDewpointCSS];?>"><?php echo $weatherArray[lowDewpoint]; echo $weatherArray[tempUnit];?><?php echo $weatherArray[lowDewpointTime]; ?></dd>
				<dt>Humidity</dt>
				<dd style="<?php echo $weatherArray[lowHumidityCSS];?>"><?php echo $weatherArray[lowHumidity]; echo $weatherArray[humUnit];?><?php echo $weatherArray[lowHumTime]; ?></dd>
				<dt>------- -------</dt>
				<dd>------- -------</dd>
			</dl>
			</li>
			<li>
			<dl>
				<dt>Wind Chill</dt>
				<dd style="<?php echo $weatherArray[lowWindchillCSS];?>"><?php echo $weatherArray[lowWindchill]; echo $weatherArray[tempUnit];?><?php echo $weatherArray[lowWindchillTime]; ?></dd>
				
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
				<dd style="<?php echo $weatherArray[hiOutsideTempCSS];?>"><?php echo $weatherArray[hiOutsideTemp]; echo $weatherArray[tempUnit];?><?php echo $weatherArray[hiOutsideTempTime]; ?></dd>
				<dt>Barometer</dt>
				<dd style="<?php echo $weatherArray[hiBarometerCSS];?>"><?php echo $weatherArray[hiBarometer];echo $weatherArray[barUnit]; ?><?php echo $weatherArray[hiBarometerTime]; ?> </dd>
				<dt>Dewpoint</dt>
				<dd style="<?php echo $weatherArray[hiDewpointCSS];?>"><?php echo $weatherArray[hiDewpoint]; echo $weatherArray[tempUnit];?><?php echo $weatherArray[hiDewpointTime]; ?> </dd>
				<dt>Humidity</dt>
				<dd style="<?php echo $weatherArray[hiHumidityCSS];?>"><?php echo $weatherArray[hiHumidity]; echo $weatherArray[humUnit];?><?php echo $weatherArray[hiHumTime]; ?> </dd>
				<dt>------- -------</dt>
				<dd>------- -------</dd>
			</dl>
			</li>
			<li>
			<dl>
				<dt>Wind Day Average</dt>
				<dd style="<?php echo $weatherArray[dayavgwindCSS];?>"><?php echo $weatherArray[dayavgwind]; echo $weatherArray[windUnit];?></dd>
				<dt>Wind Gust</dt>
				<dd style="<?php echo $weatherArray[hiWindSpeedCSS];?>"><?php echo $weatherArray[dayhighwinddir];?> <?php echo $weatherArray[hiWindSpeed]; echo $weatherArray[windUnit];?><?php echo $weatherArray[hiWindSpeedTime];?></dd>
				<dt>------- -------</dt>
				<dd>------- -------</dd>
			</dl>
			</li>
			<li>
			<dl>
				<dt>Rain Rate</dt>
				<dd style="<?php echo $weatherArray[hiRainRateCSS];?>"><?php echo $weatherArray[hiRainRate]; echo $weatherArray[rateUnit];?><?php echo $weatherArray[hiRainRateTime]; ?> </dd>
				<dt>Heat Index</dt>
				<dd style="<?php echo $weatherArray[hiHeatindexCSS];?>"><?php echo $weatherArray[hiHeatindex]; echo $weatherArray[tempUnit];?><?php echo $weatherArray[hiHeatindexTime]; ?></dd>
				<dt>Solar</dt>
				<dd style="<?php echo $weatherArray[hiRadiationCSS];?>"><?php echo $weatherArray[hiRadiation]; echo $weatherArray[solarUnit];?><?php echo $weatherArray[hiRadiationTime]; ?></dd>
				<dt>UV</dt>
				<dd style="<?php echo $weatherArray[hiUVCSS];?>"><?php echo $weatherArray[hiUV];?><?php echo $weatherArray[hiUVTime]; ?></dd>
				<dt>&nbsp;</dt>
				<dd>&nbsp;</dd>
				<dt>&nbsp;</dt>
				<dd>&nbsp;</dd>
				<dt>&nbsp;</dt>
				<dd>&nbsp;</dd>
				
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
				<a style="padding-left:10px;" href="?almanacPeriod=Daily">Day</a> ::
				<a href="/Archive/">Daily Trends</a> ::
				<a href="?almanacPeriod=Weekly">Weekly</a> ::
				<a href="?almanacPeriod=Monthly">Monthly</a> :: 
				<a href="?almanacPeriod=Yearly">Yearly</a> :: 
				<a href="?almanacPeriod=AllTime">All Time</a> ::
				<a href="?almanacPeriod=Search">Search</a>
				<?php/* //Create links to Daily and Monthly Data Summaries
				
				$textyear = date('Y');
				$textmonth = date('m');
				$textmonthword = date('M');
				$textday = date('d');
				
				$textDailylink = 'ARC-'.$textyear.'-'.$textmonth.'-'.$textday.'.txt';
				echo '<a style="color:blue;" href="/Archive/'.$textDailylink.'">:: Todays Summary :: </a>';
				
				$textNOAAlink = 'NOAA-'.$textyear.'-'.$textmonth.'.txt';
				echo '<a style="color:blue;" href="/NOAA/'.$textNOAAlink.'">'.$textmonthword.' Summary</a> :: ';
				
				$textNOAAyearlink = 'NOAA-'.$textyear.'.txt';
				echo '<a style="color:blue;" href="/NOAA/'.$textNOAAyearlink.'">NOAA-'.$textyear.' Summary</a> ';
				
				
				*/?>
				</dd>
				
			</dl>
			</li>
		</ul> 
	</div>

</div>
