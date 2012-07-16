<?php 


//$weatherArray[sidebarLink] = $_GET['sidebarLink'];
if (isset($_GET['almanacPeriod'])) {
$weatherArray['almanacPeriod'] = $_GET['almanacPeriod'];
}
else {
$weatherArray['almanacPeriod']= 'Daily';
}

switch  ($weatherArray['almanacPeriod']) { 

		case 'Daily': // Daily
			
		break;
		
		case 'Satellite': // Daily
			
		break;
		
		case 'Weekly': // Weekly 
			$weatherArray = almanacSQL($weatherArray);
		break;
		
		case 'Seven': // Weekly 
			$weatherArray = almanacSQL($weatherArray);
		break;
		
		case 'Monthly': // Monthly 
			$weatherArray = almanacSQL($weatherArray);
		break;
		
		case 'Thirty': // Monthly 
			$weatherArray = almanacSQL($weatherArray);
		break;
		
		case 'Yearly': // Yearly
			$weatherArray = almanacSQL($weatherArray);
		break;
		
		case 'ThreeSixFive': // Yearly
			$weatherArray = almanacSQL($weatherArray);
		break;
		
		case 'AllTime': // All Time 
			$weatherArray = almanacSQL($weatherArray);
		break;
		
		case 'SearchGo': // Custom Search Page
		putenv('TZ='.$weatherArray['timeOffsetSymbol']);
			$poststarthour = $_POST['starthour'];
				if ($poststarthour < 10) {
					$poststarthour = $poststarthour;

				}
			$weatherArray['starttime'] = mktime($poststarthour,'00','00',$_POST['startmonth'],$_POST['startday'],$_POST['startyear']);
			$weatherArray['endtime'] = mktime($_POST['endhour'],'00','00',$_POST['endmonth'],$_POST['endday'],$_POST['endyear']);
			
			$weatherArray = runDBCustomQuery($weatherArray);
		break;
		
		case 'SearchGoFile': // All Time 
			$weatherArray['starttime'] = '"' . $_POST['starttime'] .'"';
			$weatherArray['endtime'] = '"' . $_POST['endtime'] .'"';
			$weatherArray = runDBCustomQuery($weatherArray);
		break;
}
?>