<h5 class="headingindex"><br/>
Latest Observations Received from Port Alberni, BC on <br/>
<?php 
// THIS GRABS THE LATEST TIME IN THE DATABASE SET... $LATESTENTRY IS IN SQLVARS.PHP
$latestwviewdata = fetchTime($latestentry);
print $latestwviewdata;
?>
<br/><br/>
<?php echo $currentperiod; 
?></h5> 
<h5 id="databar">Select Data<br/><form method="post" action="<?php echo $PHP_SELF;?>">
	Temp:<input type="checkbox" name="showtemp" value="1"/>
	Rain:<input type="checkbox" name="showrain" value="1"/>
	Barometer:<input type="checkbox" name="showbarom" value="1"/>
	Dewpoint:<input type="checkbox" name="showdew" value="1"/>
	Wind:<input type="checkbox" name="showwind" value="1"/>
	Humidity:<input type="checkbox" name="showhumid" value="1"/>
	Heat Index:<input type="checkbox" name="showheat" value="1"/>
	Chill:<input type="checkbox" name="showchill" value="1"/>
	<input type="hidden" name="range" value='<?php echo $range; ?>'>
	<input type="hidden" name="refinedsearch" value='1'>
	<input type="hidden" name="starttime" value="<?php echo $starttime; ?>"/>
	<input type="hidden" name="endtime" value="<?php echo $endtime; ?>"/>
	<input type="submit" name="submit" value="Go"/>
	
	<a href="hi_low_graph.php">Back to View Menu </a></form>
</h5>	
<div><p> Select Your Data Please </p>
</div>