<?php 
	
	$linkbox = 'Click Graphs for larger versions';
				
switch ($weatherArray[sidebarLink]) {

		case 'Graphs':
		
		
		$box1 = '<li class="header" style="width:381px;">
			Temperature, Windchill and Heat Index</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="/index.php/rain-accumulations-over-24hrs/temperature-windchill-and-heatindex-large-graph/"><img src="/images/csimcache/daytempchillheat.png" width="380" height="200" alt="24hr Temp Chill Heat Chart"/></a>
			</li>';
			
		//Rain24hr($weatherArray);
		
		/*$box2 = '<li class="header" style="width:381px;"> Rain Accumulations
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="#"><img src="/images/csimcache/dayrainphp.png" width="380" height="200" alt="Daily Rain"/></a></li>';*/
		$box2 = '<li class="header" style="width:381px;"> ET and Rain Accumulations
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="/index.php/rain-accumulations-over-24hrs/24hr-large-graphs/24hr-rain-accumulations/"><img src="/images/csimcache/dayetrainphp.png" width="380" height="200" alt="Daily ET and Rain"/></a></li>';
		
		
		$box3 = '<li class="header" style="width:381px;"> Barometer and Wind
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="/index.php/rain-accumulations-over-24hrs/barometer-wind-and-high-wind-large-graph/"><img src="/images/csimcache/daybaromwind.png" width="380" height="200" alt="24hr Barometer and Wind Trend"/></a></li>';
		
		$box4 = '<li class="header" style="width:381px;"> Dewpoint and Humidity
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="/index.php/rain-accumulations-over-24hrs/humidity-and-dewpoint-large-graph/"><img src="/images/csimcache/dayhumiddewp.png" width="380" height="200" alt="Humidity and Dewpoint"/></a></li>';
			
		
		$box5 = '<li class="header" style="width:381px;"> Solar Radiation
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="/index.php/daily-solar-radiation-large-graph/"><img src="/images/csimcache/daySolarRad.png" width="380" height="200" alt="24hr Solar Radiation"/></a></li>';
	
		
		$box6 = '<li class="header" style="width:381px;"> UV Index
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="/index.php/daily-uv-index-large-graph/"><img src="/images/csimcache/dayUV.png" width="380" height="200" alt="24hr UV Index"/></a></li>';
			
		
		$box7 = '<li class="header" style="width:381px;"> In &amp; Out Temperature Comparison
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="/index.php/rain-accumulations-over-24hrs/24hr-large-graphs/inside-and-outside-temperature-large-graph-24hr/"><img src="/images/csimcache/dayintempouttemp.png" width="380" height="200" alt="Day Inside and Outside Temp Comparison"/></a></li>';
			
		
		$box8 = '<li class="header" style="width:381px;"> Rain Accumulation
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="/index.php/rain-accumulations-large-graph/"><img src="/images/csimcache/dayrainrateandaccuml.png" width="380" height="200" alt="Day Rain Rates"/></a></li>';
		
		$box9 = '<li class="header" style="width:381px;"> Wind Direction
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="/index.php/rain-accumulations-over-24hrs/24hr-large-graphs/wind-direction-large-graph/"><img src="/images/csimcache/daywinddir.png" width="380" height="200" alt="Day Wind Direction"/></a></li>';
	
		$box10 = '<li class="header" style="width:381px;"> Rain Rate
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="/index.php/rain-accumulations-over-24hrs/24hr-large-graphs/rain-rate-large-graph/"><img src="/images/csimcache/dayrainrate.png" width="380" height="200" alt="Rain Rate"/></a></li>';	
		
		
		
		
		break;
		
		case 'NOAACharts':
		
		
		
		break;
		
			case 'Animations':
		
		
		
		break;
		

}


?>
<div id="bottombox" style="width:808px; margin-left: 162px;">
	<div class="leftconditions" style="width:390px;">
		<ul >
		<?php 
		dayTempChillHeat($weatherArray);
		echo $box1;?>
		</ul> 
		
	</div>
	<div class="leftconditions" style="width:390px;">
		<ul>
		<?php 
		RainETNet24hr($weatherArray);
		echo $box2;?>	
		</ul> 
		
	</div>
	<div class="leftconditions" style="width:390px;">
		<ul >
		<?php 
		dayBaromWind($weatherArray);	
		echo $box3;?>
		</ul> 
		
	</div>
	<div class="leftconditions" style="width:390px;">
		<ul>
		<?php
		dayHumidDewp($weatherArray);	
		echo $box4;?>	
		</ul> 
		
	</div>
	<div class="leftconditions" style="width:390px;">
		<ul >
		<?php
		daySolarRad($weatherArray);
		echo $box5;?>
		</ul> 
		
	</div>
	<div class="leftconditions" style="width:390px;">
		<ul>
		<?php
		dayUV($weatherArray);
		echo $box6;?>	
		</ul> 
		
	</div>
	<div class="leftconditions" style="width:390px;">
		<ul>
		<?php
		dayInTempOutTemp($weatherArray);
		echo $box7;?>	
		</ul> 
		
	</div>
	<div class="leftconditions" style="width:390px;">
		<ul>
		<?php
		dayRainRateandAccuml($weatherArray);
		echo $box8;?>	
		</ul> 
		
	</div>
	<div class="leftconditions" style="width:390px;">
		<ul>
		<?php
		daywinddir($weatherArray);
		echo $box9;?>	
		</ul> 
		
	</div>
	<div class="leftconditions" style="width:390px;">
		<ul>
		<?php
		dayRainRate($weatherArray);
		echo $box10;?>	
		</ul> 
		
	</div>
	<div>
		<ul>
			<li>
			<dl>
				<dt></dt>
				<dd>
				<?php echo $linkbox;?>
				</dd>
			</dl>
			</li>
		</ul> 
	</div>

</div>
