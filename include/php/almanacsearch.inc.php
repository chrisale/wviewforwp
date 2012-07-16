<div id="bottombox" style="width:790px; margin-left:155px;">

	<?php include("searchform.inc.php"); ?>
	
	
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
				<a href="?almanacPeriod=Yearly">Yearly</a> :: 
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
