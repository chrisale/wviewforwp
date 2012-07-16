<h5 class="headingindex"><br/>
Latest Observations Received from Port Alberni, BC on <br/>
<?php 
// THIS GRABS THE LATEST TIME IN THE DATABASE SET... $LATESTENTRY IS IN SQLVARS.PHP
$latestwviewdata = fetchTime($latestentry);
print $latestwviewdata;
?>
<br/><br/>
<?php echo $currentperiod; 
?></h5><form method="post" action="<?php echo $PHP_SELF;?>">
<h5 id="databar">Select View<br/>
Annual:<input type="radio" name="range" value="annual"/> Monthly:<input type="radio" name="range" value="monthly"/> Weekly:<input type="radio" name="range" value="weekly"/> Daily:<input type="radio" name="range" value="daily" checked="checked"/> 
or Custom:<input type="radio" name="range" value="custom"/> (select range below) <input type="submit" name="submit" value="Refresh"/>
<br/>From: <?php dateSelector(0, $startYear, 0); ?>
	To: <?php dateSelector(0, $startYear, 1); ?> 
	</h5></form>