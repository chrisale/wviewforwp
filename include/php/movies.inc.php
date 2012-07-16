<?php 

	$box4 = '<h5 style="font-style:italic;">Click Images for Larger Versions</h5>';
				
switch ($weatherArray[sidebarLink]) {

		case 'Webcams':
		
		$box1 = '<li class="header">
			Hwy 4 "Hump"
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="http://images.drivebc.ca/bchighwaycam/pub/html/www/102.html" title="Highway 4 Alberni Summit Webcam">
			<img id="livehwy4" src="/images/highwaycam.jpg" height="160" width="200" title="Highway 4 Alberni Summit Webcam" alt="Highway 4 Alberni Summit Webcam"/>
			</a>
			</li>';
		$box2 = '<li class="header">
			Harbour Quay
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="http://www.bigwavedave.ca/webcams.php?cam=11" title="Big Wave Dave Harbour Quay Cam" >
			<img id="livehbq" src="http://windisgood.com/Webcams/downloadimage.php?file=Albernicam.jpg&amp;filename=Albernicam" height="160" width="200" title="Big Wave Dave Harbour Quay Cam" alt="Big Wave Dave Harbour Quay Cam"/>
			</a>
			</li>';
		$box3 = '<li class="header">
			Hwy 4 Sutton Pass
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="http://images.drivebc.ca/bchighwaycam/pub/html/www/207.html" title="Highway 4 Alberni Summit Webcam">
			<img id="livehwy4" src="/images/suttoncam.jpg" height="160" width="200" title="Highway 4 Alberni Summit Webcam" alt="Highway 4 Alberni Summit Webcam"/>
			</a>
			</li>';
	
		break;
		
		case 'NOAACharts':
		
		break;
		
			case 'Animations':
		
		
		break;
		

}


?>

<div id="bottombox">
<p style="text-align:center; font-weight: bold; font-size: bigger;" >Live Alberni Weather Cloud Cam - See <a href="http://www.youtube.com/alberniweather">Timelapse Movies</a>
<a href="/images/webcam/netcam.jpg"><img id="livewebcam" src="/images/webcam/netcam.jpg" alt="Live Webcam" height="360" width="640"></a>
Downtown Port Alberni - <a href="http://www.wunderground.com/webcams/chrisale/1/show.html">See Image Archive</a></p>
	<div class="leftconditions">
		<ul >
		<?php echo $box1;?>
		</ul> 
		
	</div>
	<div class="leftconditions">
		<ul>
		<?php echo $box2;?>
		</ul> 
	</div>
	
	<div class="leftconditions">
		<ul>
		<?php echo $box3;?>	
		</ul> 
		
	</div>
	<div class="leftconditions">
		<ul>
			<li class="header">
			Island Webcams
			</li>
			<li>
			<dl style="width:200px;">
				<dt style="padding:5px;"><a href="http://www.westcoastaquatic.ca/webcam.htm">Tofino Cox Beach</a></dt>
				
				<dt style="padding:5px;"><a href="http://www.viu.ca/viucam/">Vancouver Island University - Nanaimo</a></dt>
				
				<dt style="padding:5px;"><a href="http://www.webcams.travel/webcam/1237436702-Weather-Amphritite-Lighthouse-Southeast-Ucluelet">Ucluelet Webcams</a></dt>
				
			</dl>
			</li>
		</ul> 
		
	</div>
	<div class="leftconditions">
		<ul>
			<li class="header">
			More Local Cams
			</li>
			<li>
			<dl style="width:200px;">
				<dt style="padding:5px;"><a href="http://www.webcamvictoria.com/">Victoria Webcams</a></dt>
				
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
				
				<dt style="padding:5px;"><a href="http://images.drivebc.ca/bchighwaycam/pub/html/www/index.html#regionVancouverIsland">BC MoT (DriveBC)</a></dt>
				
				<dt style="padding:5px;"><a href="http://www.weatheroffice.pyr.ec.gc.ca/RVAS/default_e.html">Environment Canada - BC Cams</a></dt>
				
				<dt style="padding:5px;"><a href="http://www.metcam.navcanada.ca/hb/index.jsp?lang=e">Airport Cameras</a></dt>
				
				
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
				<?php echo $box4;?>
				</dd>
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
