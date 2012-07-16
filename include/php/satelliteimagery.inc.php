<?php 

	$links = '<a href="?sidebarLink=Satellite">Local Satellite &amp; Radar</a> ::
				<a href="?sidebarLink=Animations">Animations/ASCAT</a> :: <a href="?sidebarLink=NOAACharts">North Pacific Forecast Charts</a>';
				
switch ($weatherArray[sidebarLink]) {

		case 'Satellite':
		
		$box1 = '<div class="leftconditions">
		<ul><li class="header">
			Barometric <small>(<a href="http://squall.sfsu.edu/crws/press.html">SFSU</a>)</small>
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="http://squall.sfsu.edu/gif/sathts_pac_snd_00.gif" title="Barometric Pressure Analysis - San Fransisco State University">
			<img src="/sathts_pac_snd_00.png" height="160" width="200" title="Click for link to San Fransisco State University" alt="Click Here for Barometric Analysis"/>
			</a>
			</li></ul> 
		
	</div>';
		$box2 = '<div class="leftconditions">
		<ul><li class="header">
			Western Canada (EC)
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="http://weatheroffice.ec.gc.ca/data/satellite/goes_wcan_1070_100.jpg" title="Latest Environment Canada Western Canada Satellite" >
			<img src="/goes_wcan.jpg" height="160" width="200" title="Click for full Environment Canada Satellite Image" alt="Click Here for Image of Latest Western Canada Satellite Imagery"/>
			</a>
			</li></ul> 
		
	</div>';
		$box3 = '<div class="leftconditions">
		<ul><li class="header">
			EC Aldergrove Radar
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="http://www.weatheroffice.gc.ca/radar/index_e.html?id=WUJ" title="Latest Vancouver Radar">
	<img src="/radar_image.gif" height="160" width="200" title="Click for to see Seattle RADAR imagery" alt="Click Here for Image Latest RADAR imagery from Seattle Station"/>
	</a></li></ul> 
		
	</div>';
	$box4 = '';
	$box5 = '';
	$box6 = '';
	
	
		break;
		
		case 'NOAACharts':
		
		$box1 = '<div class="leftconditions">
		<ul><li class="header">
			24 Hours
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="http://weather.noaa.gov/pub/fax/PYBE10.gif" title="24 Hour NOAA Forecast">
			<img src="http://weather.noaa.gov/pub/fax/PYBE10.gif" height="128" width="200" title="24 Hour NOAA Forecast" alt="24 Hour NOAA Forecast"/>
			</a>
			</li></ul> 
		
	</div>';
		$box2 = '	<div class="leftconditions">
		<ul><li class="header">
			48 Hours
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="http://weather.noaa.gov/pub/fax/PWBI10.gif" title="48 Hour NOAA Forecast">
	<img src="http://weather.noaa.gov/pub/fax/PWBI10.gif" height="128" width="200" title="Click for 48 Hour NOAA Forecast" alt="Click Here for 48 Hour NOAA Forecast"/>
	</a>
			</li></ul> 
		
	</div>';
		$box3 = '<div class="leftconditions">
		<ul><li class="header">
			96 Hours
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="http://weather.noaa.gov/pub/fax/PWBM99.gif" title="96 Hour NOAA Forecast">
	<img src="http://weather.noaa.gov/pub/fax/PWBM99.gif" height="128" width="200" title="Click for 96 Hour NOAA Forecast" alt="Click Here for 96 Hour NOAA Forecast"/>
	</a></li></ul> 
		
	</div>';
	
	$box4 = '';
	$box5 = '';
	$box6 = '';
	
		
		break;
		
			case 'Animations':
		
		$box1 = '<div class="leftconditions">
		<ul >
		<li class="header">
			Color Infrared Loop
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="http://www.intellicast.com/Storm/Hurricane/PacificSatellite.aspx?animate=true&amp;enlarge=true" title="Intellicast Pacific Sat Animation">
			<img src="http://images.intellicast.com/WxImages/Satellite/hipacsat.gif" height="129" width="200" title="Intellicast Pacific Sat Animation" alt="Intellicast Pacific Sat Animation"/>
			</a>
			</li></ul> 
		
	</div>';
		$box2 = '<div class="leftconditions">
		<ul >
		<li class="header" >
			Wave Forecast
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="http://polar.ncep.noaa.gov/waves/viewer.shtml?-multi_1-latest-hs-NE_pacific-" title="Animated Pacific Wave Forecast Map">
	<img src="http://polar.ncep.noaa.gov/waves/WEB_P/multi_1.latest_run/plots/NE_pacific.hs.f024h.png" height="129" width="200" title="Animated Pacific Wave Forecast Map" alt="Animated Pacific Wave Forecast Map"/>
	</a></li></ul> 
		
	</div>';
		$box3 = '<div class="leftconditions">
		<ul >
		<li class="header">
			Latest Wind AScat
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="http://manati.orbit.nesdis.noaa.gov/ascat/" title="North Pacific AScat Imagery at NOAA">
			<img src="http://manati.orbit.nesdis.noaa.gov/ascat_images/cur_50km/zooms/WMBas6.png" height="129" width="200" title="North Pacific ASCAT" alt="North Pacific ASCAT from NOAA"/>
			</a>
			</li>
			</ul> 
		
	</div>';
		$box4 = '<div class="leftconditions">
		<ul >
		<li class="header">
			Water Vapor Loop
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="http://www.goes.noaa.gov/GSSLOOPS/alwv.html" title="Alaska Water Vapor Loop">
			<img src="http://www.goes.noaa.gov/GIFS/ALWV.JPG" height="129" width="200" title="NOAA Alaska Water Vapor Loop" alt="NOAA Alaska Water Vapor Loop"/>
			</a>
			</li>
			</ul> 
		
	</div>';
	
		$box5 = '<div class="leftconditions">
		<ul >
		<li class="header">
			TPW - MIMIC - Satellite			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="http://tropic.ssec.wisc.edu/real-time/mimic-tpw/epac/main.html" title="MIMIC TPW animation">
			<img src="http://tropic.ssec.wisc.edu/real-time/mimic-tpw/epac/anim/latest72hrs.gif" height="129" width="200" title="NOAA Alaska Infrared Loop" alt="NOAA Alaska Infrared Loop"/>
			</a>
			</li>
			</ul> 
		
	</div>';
		$box6 = '<div class="leftconditions">
		<ul >
		<li class="header">
			Visible Loop (NOAA)
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="http://www.goes.noaa.gov/GSSLOOPS/alvs.html" title="Alaska Visible Loop">
			<img src="http://www.goes.noaa.gov/GIFS/ALVS.JPG" height="129" width="200" title="NOAA Alaska Visible Loop" alt="NOAA Alaska Visible Loop"/>
			</a>
			</li>
			</ul></div>';
		break;
		

}


?>
<div id="bottombox">
	
		<?php echo $box1;?>
		
	
		<?php echo $box2;?>

		<?php echo $box3;?>	
	
		<?php echo $box4;?>	
	
		<?php echo $box5;?>	
	
		<?php echo $box6;?>	
	
	<div>
		<ul>
			<li>
			<dl>
				<dt></dt>
				<dd>
				<?php echo $links;?>
				
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
