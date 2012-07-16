<?php 
date_default_timezone_set('America/Vancouver');
$current_time = time();
$curhour=date("H");
$curhour=$curhour*1;
$curtime=date("YmdH");
$todaytime=date("Ymd");
$yesterdaytime=date("Ymd", strtotime('-1 day',$current_time));
$yesterday2time=date("Ymd", strtotime('-2 day',$current_time));
$tomorrowtime=date("Ymd", strtotime('+1 day',$current_time));

$webcamprefix="/images/webcam/archive";
$webcam18suffix="18day.mp4";
$webcam06suffix="06night.mp4";
$webcam24suffix="24hr.mp4";
$netcamprefix="netcam";

//Now we're going to find the latest video URL from our txt file that gets updated from the home computer whenever a new video is uploaded to youtube.

//Only take text from 30 characters in and 80 characters long
$section = file_get_contents('./movieurl.txt', FALSE, NULL, 30, 150);

//Only take text from 30 characters in and 80 characters long
$runningsection = file_get_contents('./runningurl.txt', FALSE, NULL, 30, 80);

//FIRST WE FIND THE STRING FOR THE DAILY VIDEO
//Find where the youtube id string starts
$pos1 = strpos($section,'?v=');
//Find where it ends
$pos2 = strpos($section,'&');
//The actual start is 3 beyond...
$pos1 = $pos1+3;
//Figure out the length
$length=$pos2-$pos1;
echo 'BOO';
echo $pos2;
echo $pos1;
echo $length;
//Grab the bit we want from the string so we can put it in the URL below.
$youtubeURL = substr($section, $pos1, $length); 

//SECOND WE FIND THE STRING FOR THE RUNNING VIDEO
//Find where the youtube id string starts
$pos1 = strpos($runningsection,'?v=');
//Find where it ends
$pos2 = strpos($runningsection,'&');
//The actual start is 3 beyond...
$pos1 = $pos1+3;
//Figure out the length
$length=$pos2-$pos1;
//Grab the bit we want from the string so we can put it in the URL below.
$runningyoutubeURL = substr($runningsection, $pos1, $length); 

//echo $section;

if ($curhour == 7 || $curhour == 8 || $curhour == 9 || $curhour == 10 || $curhour == 11 || $curhour == 12 || $curhour == 13 || $curhour == 14 || $curhour == 15 || $curhour == 16 || $curhour == 17 || $curhour == 18 || $curhour == 19 || $curhour == 20 || $curhour == 21 || $curhour == 22 || $curhour == 23) 
{
$dayfoldernight='';
$daytimenight=$todaytime;
$fulldaycam= $webcamprefix . "/" . $todaytime . "/" . $yesterdaytime . $webcam24suffix;
$nightcam= $webcamprefix . "/" . $todaytime . "/" . $todaytime . $webcam06suffix;
}
else {
$dayfoldernight=$todaytime . '/';
$daytimenight=$yesterdaytime;
$fulldaycam= $webcamprefix . "/" . $yesterdaytime . "/" . $yesterday2time . $webcam24suffix;
$nightcam= $webcamprefix . "/" . $yesterdaytime . "/" . $yesterdaytime . $webcam06suffix;
}

if ($curhour == 1 || $curhour == 2 || $curhour == 3 || $curhour == 4 || $curhour == 5 || $curhour == 6 || $curhour == 7 || $curhour == 8 || $curhour == 9 || $curhour == 10 || $curhour == 11 || $curhour == 12 || $curhour == 13 || $curhour == 14 || $curhour == 15 || $curhour == 16 || $curhour == 17 || $curhour == 18) 
{
echo 'HELLO';
$dayfolderday=$todaytime . '/';
$daytimeday=$yesterdaytime;
$daycam = $webcamprefix . "/" . $yesterdaytime . "/" . $yesterdaytime . $webcam18suffix;
}
else {
echo 'HELL02';
$dayfolderday='';
$daytimeday=$todaytime;
$daycam = $webcamprefix . "/" . $todaytime . "/" . $todaytime . $webcam18suffix;
}



	$finalbox = '<h5 style="font-style:italic;">Click Images for Larger Versions and Videos</h5>';
	
				
switch ($weatherArray[sidebarLink]) {

		case 'Webcams':
		
/*		$box1 = '<li class="header">
			Latest Day Video
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="'. $daycam . '"><img width="182" height="102" src="/images/webcam/archive/' . $dayfolderday . 'netcam' . $daytimeday . '1900.jpg" /></a>
			</li>';
			
		$box2 = '<li class="header">
			Latest 24 Hour
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="'. $fulldaycam . '"><img width="182" height="102" src="/images/webcam/archive/' . $todaytime . '/netcam' . $yesterdaytime . '2100.jpg" /></a>
			</li>';
			
		$box3 = '<li class="header">
			Latest Nighttime
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="'. $nightcam . '"><img width="182" height="102" src="/images/webcam/archive/' . $dayfoldernight . 'netcam' . $daytimenight . '1100.jpg" /></a>
			</li>';*/
			
		$box4 = '<li class="header">
			Hwy 4 "Hump"
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="http://images.drivebc.ca/bchighwaycam/pub/html/www/102.html" title="Highway 4 Alberni Summit Webcam">
			<img id="livehwy4" src="/images/highwaycam.jpg" height="160" width="200" title="Highway 4 Alberni Summit Webcam" alt="Highway 4 Alberni Summit Webcam"/>
			</a>
			</li>';
		$box5 = '<li class="header">
			Harbour Quay
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="http://www.bigwavedave.ca/webcams.php?cam=11" title="Big Wave Dave Harbour Quay Cam" >
			<img id="livehbq" src="http://windisgood.com/Webcams/downloadimage.php?file=Albernicam.jpg&amp;filename=Albernicam" height="160" width="200" title="Big Wave Dave Harbour Quay Cam" alt="Big Wave Dave Harbour Quay Cam"/>
			</a>
			</li>';
		$box6 = '<li class="header">
			Hwy 4 Sutton Pass
			</li>
			<li style="padding-top:5px; padding-left:5px; text-align:center;">
			<a href="http://images.drivebc.ca/bchighwaycam/pub/html/www/207.html" title="Highway 4 Alberni Summit Webcam">
			<img id="livehwy4" src="/images/suttoncam.jpg" height="160" width="200" title="Highway 4 Alberni Summit Webcam" alt="Highway 4 Alberni Summit Webcam"/>
			</a>
			</li>';
			
		
			
		$box7 = '<li class="header">Island Webcams
			</li>
			<li>
			<dl style="width:200px;">
				<dt style="padding:5px;"><a href="http://www.westcoastaquatic.ca/webcam.htm">Tofino Cox Beach</a></dt>
				
				<dt style="padding:5px;"><a href="http://www.viu.ca/viucam/">Vancouver Island University - Nanaimo</a></dt>
				
				<dt style="padding:5px;"><a href="http://www.webcams.travel/webcam/1237436702-Weather-Amphritite-Lighthouse-Southeast-Ucluelet">Ucluelet Webcams</a></dt>
				
			</dl></li>
			';
			
		break;
		

}


?>

<div id="bottombox">
<p style="text-align:center; font-weight: bold; font-size: bigger;" >Live Alberni Weather Cloud Cam - <span style="font-size:9pt;">click for full size</span>
<a href="/images/webcam/netcam.jpg"><img id="livewebcam" src="/images/webcam/netcam.jpg" alt="Live Webcam" height="360" width="640"></a>
<br/>Port Alberni<br/><a href="http://www.alberniweather.ca/images/webcam/archive">Browse Images and Video Archive</a></p>

<p style="text-align:center; font-weight: bold;">
Last Few Hours and Yesterdays Timelapse<br/>
<iframe width="280" height="157" src="http://www.youtube.com/embed/<?php echo $runningyoutubeURL;?>" frameborder="0" allowfullscreen autoplay="0"></iframe>
<iframe width="280" height="157" src="http://www.youtube.com/embed/<?php echo $youtubeURL;?>" frameborder="0" allowfullscreen autoplay="0"></iframe>
</p>
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
		<ul >
		<?php echo $box4;?>
		</ul> 
		
	</div>
	<div class="leftconditions">
		<ul>
		<?php echo $box5;?>
		</ul> 
	</div>
	
	<div class="leftconditions">
		<ul>
		<?php echo $box6;?>	
		</ul> 
		
	</div>
	<div class="leftconditions">
		<ul>
			
			<?php echo $box7;?>	
			
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
				<?php echo $finalbox;//echo $curhour;echo $todaytime; echo $daycam;
?>
				</dd>
				<dd>
				
				</dd>
			</dl>
			</li>
		</ul> 
	</div>

</div>
