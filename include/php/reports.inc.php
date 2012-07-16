<?php 

	$box4 = 'Webcam Links and Useful Sites';
				
switch ($weatherArray[sidebarLink]) {

		case 'Reports':
		
		$box1 = '<li class="header">
			Hwy 4 Alberni "Hump"
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="http://squall.sfsu.edu/gif/sathts_pac_snd_00.gif" title="Highway 4 Alberni Summit Webcam">
			<img src="http://www.th.gov.bc.ca/bchighwaycam/getFile2.aspx?cam=102&amp;thumb=false" height="160" width="200" title="Highway 4 Alberni Summit Webcam" alt="Highway 4 Alberni Summit Webcam"/>
			</a>
			</li>';
		$box2 = '<li class="header">
			Harbour Quay Big Wave
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="http://www.bigwavedave.ca/webcams.php?cam=11" title="Big Wave Dave Harbour Quay Cam" >
			<img src="http://windisgood.com/Webcams/downloadimage.php?file=Albernicam.jpg&amp;filename=Albernicam" height="160" width="200" title="Big Wave Dave Harbour Quay Cam" alt="Big Wave Dave Harbour Quay Cam"/>
			</a>
			</li>';
		$box3 = '<li class="header">
			AVRA	 Northwest View
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="http://www.weatheroffice.pyr.ec.gc.ca/RVAS/default_e.html?section=wqc" title="Alberni Valley Regional Airport Webcam Northwest View">
	<img src="http://www.weatheroffice.pyr.ec.gc.ca/RVASfeed/wqc-w.jpg" height="160" width="200" title="Alberni Valley Regional Airport Webcam Northwest View" alt="Alberni Valley Regional Airport Webcam Northwest View"/>
	</a></li>';
	
		break;
		
		case 'NOAACharts':
		
		break;
		
			case 'Animations':
		
		
		break;
		

}


?>
<div id="bottombox">
	<div class="leftconditions">
		<ul>
			<li class="header">
			Environment Canada
			</li>
			<li>
			<dl style="width:200px;">
				<dt style="padding:5px;"><a href="/index.php/full-page-webcam/">BC Weather Warnings</a></dt>
				
				<dt style="padding:5px;"><a href="http://www.wunderground.com/webcams/chrisale/1/show.html">Port Alberni</a></dt>
				
				<dt style="padding:5px;"><a href="http://www.youtube.com/alberniweather">Campbell River</a></dt>
				
				<dt style="padding:5px;"><a href="http://www.wunderground.com/webcams/chrisale/1/show.html">Nanaimo</a></dt>
				
				<dt style="padding:5px;"><a href="http://www.youtube.com/alberniweather">Tofino</a></dt>
				
				<dt style="padding:5px;"><a href="http://www.wunderground.com/webcams/chrisale/1/show.html">Ucluelet</a></dt>
				
				<dt style="padding:5px;"><a href="http://www.youtube.com/alberniweather">Vancouver</a></dt>
				
				<dt style="padding:5px;"><a href="http://www.youtube.com/alberniweather">Victoria</a></dt>
				
			</dl>
			</li>
		</ul> 
		
	</div>
	<div class="leftconditions">
		<ul>
			<li class="header">
			Island Cams
			</li>
			<li>
			<dl style="width:200px;">
				<dt style="padding:5px;"><a href="http://www.bms.bc.ca/computing/webcam/index.htm">Bamfield Marine Station</a></dt>
				
				<dt style="padding:5px;"><a href="http://www.visitparksvillequalicumbeach.com/cms.asp?wpID=56">Parksville-Qualicum</a></dt>
				
				<dt style="padding:5px;"><a href="http://www.bigwavedave.ca/webcams.php">Beach and Windsurf Cams</a></dt>
				
			</dl>
			</li>
		</ul> 
	</div>
	
	<div class="leftconditions">
		<ul>
			<li class="header">
			Government Cams
			</li>
			<li>
			<dl style="width:200px;">
				<dt style="padding:5px;"><a href="http://orca.bcferries.com:8080/cc/conditions/cams.asp">BC Ferries Terminals</a></dt>
				
				<dt style="padding:5px;"><a href="http://images.drivebc.ca/bchighwaycam/pages/index.html">BC Highway</a></dt>
				
				<dt style="padding:5px;"><a href="http://www.weatheroffice.pyr.ec.gc.ca/RVAS/default_e.html">Environment Canada</a></dt>
				
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
				<?php echo $box4;?>
				
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
