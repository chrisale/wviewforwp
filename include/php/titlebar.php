<div id="bannerheader"></div>
<div id="navbar">
<ul class="menulist" id="listMenuRoot">
 	<li><a href="http://www.alberniweather.ca">Home</a></li>
 	<li><a href="Current.htm">Current Conditions</a></li>
 	<li><a href="#">Weather Archive</a>
		<ul>
 		<li><a href="almanac.htm">Almanac</a></li>
 		<li><a href="Daily.htm">24hr Charts</a></li>
 		<li><a href="Weekly.htm">7 Day Charts</a></li>
 		<li><a href="Monthly.htm">28 Day Charts</a></li>
 		<li><a href="Yearly.htm">Yearly Charts</a></li>
 		<li><a href="http://www.climate.weatheroffice.ec.gc.ca/climate_normals/results_e.html?Province=BC%20%20&amp;StationName=&amp;SearchType=&amp;LocateBy=Province&amp;Proximity=25&amp;ProximityFrom=City&amp;StationNumber=&amp;IDType=MSC&amp;CityName=&amp;ParkName=&amp;LatitudeDegrees=&amp;LatitudeMinutes=&amp;LongitudeDegrees=&amp;LongitudeMinutes=&amp;NormalsClass=A&amp;SelNormals=&amp;StnId=264&amp;">EnvCan Historical Almanac</a></li>
 		</ul>
 	</li>
 	
 	<li><a href="#">Forecasts &amp; Reports</a>
 	<ul>
 	<li><a href="#">Env Canada</a>
 		<ul>
 		<li><a href="http://weatheroffice.ec.gc.ca/warnings/bc_e.html">BC Weather Warnings</a></li>
 		<li><a href="http://weatheroffice.ec.gc.ca/city/pages/bc-46_metric_e.html">Port Alberni</a></li>
 		<li><a href="http://weatheroffice.ec.gc.ca/city/pages/bc-17_metric_e.html">Tofino</a></li>
 		<li><a href="http://weatheroffice.ec.gc.ca/city/pages/bc-5_metric_e.html">Ucluelet</a></li>
 		<li><a href="http://weatheroffice.ec.gc.ca/city/pages/bc-20_metric_e.html">Nanaimo</a></li>
 		</ul>
 	</li>
 	<li><a href="#">Weather Underground</a>
 		<ul>
 		<li><a href="http://www.wunderground.com/cgi-bin/findweather/getForecast?query=Port+Alberni">Port Alberni</a></li>
 		<li><a href="http://www.wunderground.com/cgi-bin/findweather/getForecast?query=Tofino">Tofino</a></li>
 		<li><a href="http://www.wunderground.com/cgi-bin/findweather/getForecast?query=Nanaimo">Nanaimo</a></li>
 		</ul>
 	</li>
 	<li>
 	<a href="#">Marine</a>
 		<ul>
 		<li><a href="http://weatheroffice.ec.gc.ca/marine/region_03_e.html">Pacific EnvCan</a></li>
 		<li><a href="http://www.nws.noaa.gov/om/marine/zone/west/sewmz.htm">Washington State</a></li>
 		<li><a href="http://pajk.arh.noaa.gov/wmofcst.php?wmo=FPAK57PAJK&amp;type=public">SE Alaska Text</a></li>
 		</ul>
	</li>
	<li><a href="http://www.drivebc.ca">BC Road Conditions</a></li>
 	</ul>
 	</li>
 	<li><a href="#">WebCams</a>
 	<ul>
 	<li><a href="http://www.weatheroffice.pyr.ec.gc.ca/RVAS/default_e.html?section=wqc">Alberni Airport <br/>(and BC)</a></li>
 	<li><a href="http://www.th.gov.bc.ca/bchighwaycam/index.aspx#region5">Highway Cams</a></li>
 	<li><a href="http://www.bigwavedave.ca/webcams.php">Local Beach Cams</a></li>
 	
 	</ul>
 	</li>
 	<li><a href="#">About</a>
 		<ul>
 		<li><a href="contact.htm">Contact Me</a></li>
 		<li><a href="setup.htm">The Weather Setup</a></li>
 		<li><a href="http://www.alberni.ca">Alberni.ca <br/>Community Forum</a></li>
 		<li><a href="http://www.portalberni.ca">City of Port Alberni</a></li>
 		</ul>
 	</li>
 	</ul>
<script type="text/javascript">

//<![CDATA[
// Here's a menu object to control the above list of menu data:
var listMenu = new FSMenu('listMenu', true, 'visibility', 'visible', 'hidden');


//  * showOnClick will, suprisingly, set the menus to show on click. Pick one of 3 values:
//    0 = all mouseover, 1 = first level click, sublevels mouseover, 2 = all click.

//listMenu.showDelay = 0;
//listMenu.switchDelay = 125;
//listMenu.hideDelay = 500;
listMenu.cssLitClass = 'highlighted';
//listMenu.showOnClick = 1;




function animClipDown(ref, counter)
{
 var cP = Math.pow(Math.sin(Math.PI*counter/200),0.75);
 ref.style.clip = (counter==100 ?
  ((window.opera || navigator.userAgent.indexOf('KHTML') > -1) ? '':
   'rect(auto, auto, auto, auto)') :
    'rect(0, ' + ref.offsetWidth + 'px, '+(ref.offsetHeight*cP)+'px, 0)');
};

function animFade(ref, counter)
{
 var f = ref.filters, done = (counter==100);
 if (f)
 {
  if (!done && ref.style.filter.indexOf("alpha") == -1)
   ref.style.filter += ' alpha(opacity=' + counter + ')';
  else if (f.length && f.alpha) with (f.alpha)
  {
   if (done) enabled = false;
   else { opacity = counter; enabled=true }
  }
 }
 else ref.style.opacity = ref.style.MozOpacity = counter/100.1;
};

// I'm applying them both to this menu and setting the speed to 20%. Delete this to disable.
listMenu.animations[listMenu.animations.length] = animFade;
listMenu.animations[listMenu.animations.length] = animClipDown;
listMenu.animSpeed = 20;


var arrow = null;
if (document.createElement && document.documentElement)
{
 arrow = document.createElement('span');
 arrow.appendChild(document.createTextNode('>'));
 // Feel free to replace the above two lines with these for a small arrow image...
 //arrow = document.createElement('img');
 //arrow.src = 'arrow.gif';
 //arrow.style.borderWidth = '0';

 arrow.className = 'subind';
}

addEvent(window, 'load', new Function('listMenu.activateMenu("listMenuRoot", arrow)'));
//]]>
</script>
</div>