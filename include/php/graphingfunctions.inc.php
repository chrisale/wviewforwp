<?php 



function createDayTripleLineGraph($weatherSelector,$graphname,$xTitle,$yTitle,$y2Title,$Title,$dualYaxis) {
echo 'hi';
foreach ($weatherSelector[3] as $value) {

}
DEFINE('NDATAPOINTS',288);
DEFINE('SAMPLERATE',300);

$sqldatapoints = NDATAPOINTS - 1;
$starttime = $weatherArray['SQLData'][3][0];
$endtime = $starttime+NDATAPOINTS*SAMPLERATE;
for($i = 0;$i < NDATAPOINTS; ++$i) {
$sqlX[$i] = ($starttime - (3600*8)) + $i * SAMPLERATE;
}
$start = time();

$end = $start+NDATAPOINTS*SAMPLERATE;
for($i=0;$i < NDATAPOINTS; ++$i) {
$sqlX[$i] = $start + $i * SAMPLERATE;
}	

	$graph = new graph(380,200,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);  
	$graph->SetScale('datlin');
	if ($dualYaxis == 1) {
	$graph->SetY2Scale("lin");
	}
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->yaxis->SetLabelMargin(1); 
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(8);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelMargin(15); 
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->SetPos('min');
	$graph->xaxis->scale->SetDateFormat('H:i');
	$graph->xaxis->HideTicks(true,true); 
	$txt = new Text("");
	$txt->SetColor("red");
	$graph->AddText($txt);
	$line1 = new LinePlot($weatherSelector[2],$weatherSelector[3]);
	$line1->SetColor('red'); 
	$line2 = new LinePlot($weatherSelector[1],$weatherSelector[3]);
	$line2->SetColor('blue'); 
	$line3 = new LinePlot($weatherSelector[0],$weatherSelector[3]);
	$line3->SetColor('darkolivegreen'); 
	$line3->SetWeight(3);
	if ($dualYaxis == 1) {
	$graph->AddY2($line2);
	$graph->AddY2($line1);
	}
	else {
	$graph->Add($line2);
	$graph->Add($line1);
	}
	$graph->Add($line3);
	$filename = "/home/chrisale/img/" . $graphname . ".png";
	$graph->Stroke($filename);
//-------------------------------------------------------------------
	$graph = new graph(750,450,$graphname,0,0);
	$graph->img->SetMargin(50,30,15,80); 
	$graph->SetScale('datlin');
	if ($dualYaxis == 1) {
	$graph->SetY2Scale("lin");
	}
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(5);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelMargin(0);
	$graph->xaxis->SetLabelAlign('top','top');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->scale->SetDateFormat('M d H:i');
	$graph->xaxis->HideTicks(true,true); 
	$line1 = new LinePlot($weatherSelector[2],$weatherSelector[3]);
	$line1->SetColor('red'); 
	$line2 = new LinePlot($weatherSelector[1],$weatherSelector[3]);
	$line2->SetColor('blue'); 
	$line3 = new LinePlot($weatherSelector[0],$weatherSelector[3]);
	$line3->SetColor('darkolivegreen'); 
	$line3->SetWeight(3);
	if ($dualYaxis == 1) {
	$graph->AddY2($line2);
	$graph->AddY2($line1);
	}
	else {
	$graph->Add($line2);
	$graph->Add($line1);
	}
	$graph->Add($line3);
	$filename = '/home/chrisale/img/' . $graphname . 'big.png';
	$graph->Stroke($filename);
	//-------------------------------------------------------------------
	$graph = new graph(1600,800,$graphname,0,0);
	$graph->img->SetMargin(50,30,15,80); 
	$graph->SetScale('datlin');
	if ($dualYaxis == 1) {
	$graph->SetY2Scale("lin");
	}
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(5);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelMargin(0);
	$graph->xaxis->SetLabelAlign('top','top');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->scale->SetDateFormat('M d H:i');
	$graph->xaxis->HideTicks(true,true); 
	$line1 = new LinePlot($weatherSelector[2],$weatherSelector[3]);
	$line1->SetColor('red'); 
	$line2 = new LinePlot($weatherSelector[1],$weatherSelector[3]);
	$line2->SetColor('blue'); 
	$line3 = new LinePlot($weatherSelector[0],$weatherSelector[3]);
	$line3->SetColor('darkolivegreen'); 
	$line3->SetWeight(3);
	if ($dualYaxis == 1) {
	$graph->AddY2($line2);
	$graph->AddY2($line1);
	}
	else {
	$graph->Add($line2);
	$graph->Add($line1);
	}
	$graph->Add($line3);
	$filename = '/home/chrisale/img/' . $graphname . 'download.png';
	$graph->Stroke($filename);
	//-------------------------------------------------------------------

}

function createWeekTripleLineGraph($weatherArray,$graphname,$xTitle,$yTitle,$y2Title,$Title,$dualYaxis) {

//TRIPLE LINE WEEKLY SMALL GRAPH

DEFINE('WNDATAPOINTS',2016);
DEFINE('WSAMPLERATE',300);

$start = time();
$end = $start+WNDATAPOINTS*WSAMPLERATE;
for($i=0;$i < WNDATAPOINTS; ++$i) {
$sqlX[$i] = $start + $i * WSAMPLERATE;
}	
	

	$graph = new graph(380,200,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);  
	$graph->SetScale('datlin');
	if ($dualYaxis == 1) {
	$graph->SetY2Scale("lin");
	}
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	
	$graph->yaxis->SetLabelMargin(1); 
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(8);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelMargin(15); 
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->SetPos('min');
	$graph->xaxis->scale->SetDateFormat('D H');
	$graph->xaxis->HideTicks(true,true); 
	$txt = new Text("");
	$txt->SetColor("red");
	$graph->AddText($txt);
	$line1 = new LinePlot($weatherArray[2],$weatherArray[3]);
	$line1->SetColor('red'); 
	$line2 = new LinePlot($weatherArray[1],$weatherArray[3]);
	$line2->SetColor('blue'); 
	$line3 = new LinePlot($weatherArray[0],$weatherArray[3]);
	$line3->SetColor('darkolivegreen'); 
	$line3->SetWeight(3);
	if ($dualYaxis == 1) {
	$graph->AddY2($line2);
	$graph->AddY2($line1);
	}
	else {
	$graph->Add($line2);
	$graph->Add($line1);
	}
	$graph->Add($line3);
	$filename = "/home/chrisale/img/" . $graphname . ".png";
	$graph->Stroke($filename);
	
	// Triple Line Weekly Big Graph
	
	$graph = new graph(700,350,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30); 
	$graph->SetScale('datlin');
	if ($dualYaxis == 1) {
	$graph->SetY2Scale("lin");
	}
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(5);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelMargin(15);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->scale->SetDateFormat('D H');
	$graph->xaxis->HideTicks(true,true); 
	$line1 = new LinePlot($weatherArray[2],$weatherArray[3]);
	$line1->SetColor('red'); 
	$line2 = new LinePlot($weatherArray[1],$weatherArray[3]);
	$line2->SetColor('blue'); 
	$line3 = new LinePlot($weatherArray[0],$weatherArray[3]);
	$line3->SetColor('darkolivegreen'); 
	$line3->SetWeight(3);
	if ($dualYaxis == 1) {
	$graph->AddY2($line2);
	$graph->AddY2($line1);
	}
	else {
	$graph->Add($line2);
	$graph->Add($line1);
	}
	$graph->Add($line3);
	$filename = '/home/chrisale/img/' . $graphname . 'big.png';
	$graph->Stroke($filename);
}

function createMonthTripleLineGraph($weatherArray,$graphname,$xTitle,$yTitle,$y2Title,$Title,$dualYaxis) {

//TRIPLE LINE WEEKLY SMALL GRAPH

DEFINE('MNDATAPOINTS',8928);
DEFINE('MSAMPLERATE',300);

$start = time();
$end = $start+MNDATAPOINTS*MSAMPLERATE;
for($i=0;$i < MNDATAPOINTS; ++$i) {
$sqlX[$i] = $start + $i * MSAMPLERATE;
}	
	

	$graph = new graph(380,200,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);  
	$graph->SetScale('datlin');
	if ($dualYaxis == 1) {
	$graph->SetY2Scale("lin");
	}
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->yaxis->SetLabelMargin(1); 
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(8);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelMargin(15); 
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->SetPos('min');
	$graph->xaxis->scale->SetDateFormat('M d');
	$graph->xaxis->HideTicks(true,true); 
	$txt = new Text("");
	$txt->SetColor("red");
	$graph->AddText($txt);
	$line1 = new LinePlot($weatherArray[2],$weatherArray[3]);
	$line1->SetColor('red'); 
	$line2 = new LinePlot($weatherArray[1],$weatherArray[3]);
	$line2->SetColor('blue'); 
	$line3 = new LinePlot($weatherArray[0],$weatherArray[3]);
	$line3->SetColor('darkolivegreen'); 
	$line3->SetWeight(3);
	if ($dualYaxis == 1) {
	$graph->AddY2($line2);
	$graph->AddY2($line1);
	}
	else {
	$graph->Add($line2);
	$graph->Add($line1);
	}
	$graph->Add($line3);
	$filename = "/home/chrisale/img/" . $graphname . ".png";
	$graph->Stroke($filename);
	
	// Triple Line Monthly Big Graph
	
	$graph = new graph(700,350,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30); 
	$graph->SetScale('datlin');
	if ($dualYaxis == 1) {
	$graph->SetY2Scale("lin");
	}
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(5);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelMargin(15);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->scale->SetDateFormat('M d');
	$graph->xaxis->HideTicks(true,true); 
	$line1 = new LinePlot($weatherArray[2],$weatherArray[3]);
	$line1->SetColor('red'); 
	$line2 = new LinePlot($weatherArray[1],$weatherArray[3]);
	$line2->SetColor('blue'); 
	$line3 = new LinePlot($weatherArray[0],$weatherArray[3]);
	$line3->SetColor('darkolivegreen'); 
	$line3->SetWeight(3);
	if ($dualYaxis == 1) {
	$graph->AddY2($line2);
	$graph->AddY2($line1);
	}
	else {
	$graph->Add($line2);
	$graph->Add($line1);
	}
	$graph->Add($line3);
	$filename = '/home/chrisale/img/' . $graphname . 'big.png';
	$graph->Stroke($filename);
}

function createYearTripleLineGraph($weatherArray,$graphname,$xTitle,$yTitle,$y2Title,$Title,$dualYaxis) {

//TRIPLE LINE Month SMALL GRAPH

DEFINE('YNDATAPOINTS',105129);
DEFINE('YSAMPLERATE',300);

$start = time();
$end = $start+YNDATAPOINTS*YSAMPLERATE;
for($i=0;$i < YNDATAPOINTS; ++$i) {
$sqlX[$i] = $start + $i * YSAMPLERATE;
}	
	

	$graph = new graph(380,200,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);  
	$graph->SetScale('datlin');
	if ($dualYaxis == 1) {
	$graph->SetY2Scale("lin");
	}
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->yaxis->SetLabelMargin(1); 
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(8);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelMargin(15); 
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->SetPos('min');
	$graph->xaxis->scale->SetDateFormat('M d');
	$graph->xaxis->HideTicks(true,true); 
	$txt = new Text("");
	$txt->SetColor("red");
	$graph->AddText($txt);
	$line1 = new LinePlot($weatherArray[2],$weatherArray[3]);
	$line1->SetColor('red'); 
	$line2 = new LinePlot($weatherArray[1],$weatherArray[3]);
	$line2->SetColor('blue'); 
	$line3 = new LinePlot($weatherArray[0],$weatherArray[3]);
	$line3->SetColor('darkolivegreen'); 
	$line3->SetWeight(3);
	if ($dualYaxis == 1) {
	$graph->AddY2($line2);
	$graph->AddY2($line1);
	}
	else {
	$graph->Add($line2);
	$graph->Add($line1);
	}
	$graph->Add($line3);
	$filename = "/home/chrisale/img/" . $graphname . ".png";
	$graph->Stroke($filename);
	
	// Triple Line Yearly Big Graph
	
	$graph = new graph(700,350,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30); 
	$graph->SetScale('datlin');
	if ($dualYaxis == 1) {
	$graph->SetY2Scale("lin");
	}
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(5);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelMargin(15);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->scale->SetDateFormat('M d');
	$graph->xaxis->HideTicks(true,true); 
	$line1 = new LinePlot($weatherArray[2],$weatherArray[3]);
	$line1->SetColor('red'); 
	$line2 = new LinePlot($weatherArray[1],$weatherArray[3]);
	$line2->SetColor('blue'); 
	$line3 = new LinePlot($weatherArray[0],$weatherArray[3]);
	$line3->SetColor('darkolivegreen'); 
	$line3->SetWeight(3);
	if ($dualYaxis == 1) {
	$graph->AddY2($line2);
	$graph->AddY2($line1);
	}
	else {
	$graph->Add($line2);
	$graph->Add($line1);
	}
	$graph->Add($line3);
	$filename = '/home/chrisale/img/' . $graphname . 'big.png';
	$graph->Stroke($filename);
}

function createDayDoubleLineSIngleYGraph($weatherArray,$graphname,$xTitle,$yTitle,$y2Title,$Title,$dualYaxis) {

DEFINE('NDATAPOINTS',288);
DEFINE('SAMPLERATE',300);


$start = time();
$end = $start+NDATAPOINTS*SAMPLERATE;
for($i=0;$i < NDATAPOINTS; ++$i) {
$sqlX[$i] = $start + $i * SAMPLERATE;
}	
	// Double Line Graph
	
	
	$graph = new graph(380,200,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);   
	$graph->SetScale('datlin');

	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(8);
	$graph->xaxis->SetLabelMargin(15);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->scale->SetDateFormat('H:i');
	$graph->xaxis->HideTicks(true,true); 
	$line1 = new LinePlot($weatherArray[0],$weatherArray[2]);
	$line1->SetColor('blue'); 
	$line2 = new LinePlot($weatherArray[1],$weatherArray[2]);
	$line2->SetColor('red'); 
	$graph->Add($line1);
	$graph->Add($line2);
	$filename = "/home/chrisale/img/" . $graphname . ".png";
	$graph->Stroke($filename);
//-----------------------------------------------------------------------------

	$graph = new graph(750,450,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);   
	$graph->SetScale('datlin');	
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->xaxis->SetLabelMargin(15);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(8);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->scale->SetDateFormat('H:i');
	$graph->xaxis->HideTicks(true,true); 
	$line1 = new LinePlot($weatherArray[0],$weatherArray[2]);
	$line1->SetColor('blue'); 
	$line2 = new LinePlot($weatherArray[1],$weatherArray[2]);
	$line2->SetColor('red'); 
	$graph->Add($line1);
	$graph->Add($line2);
	$filename = "/home/chrisale/img/" . $graphname . "big.png";
	$graph->Stroke($filename);
//-----------------------------------------------------------------------------
	$graph = new graph(1600,800,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);   
	$graph->SetScale('datlin');	
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->xaxis->SetLabelMargin(15);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(8);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->scale->SetDateFormat('H:i');
	$graph->xaxis->HideTicks(true,true); 
	$line1 = new LinePlot($weatherArray[0],$weatherArray[2]);
	$line1->SetColor('blue'); 
	$line2 = new LinePlot($weatherArray[1],$weatherArray[2]);
	$line2->SetColor('red'); 
	$graph->Add($line1);
	$graph->Add($line2);
	$filename = "/home/chrisale/img/" . $graphname . "download.png";
	$graph->Stroke($filename);

}
function createDayDoubleLineGraph($weatherArray,$graphname,$xTitle,$yTitle,$y2Title,$Title,$dualYaxis) {

DEFINE('NDATAPOINTS',288);
DEFINE('SAMPLERATE',300);


$start = time();
$end = $start+NDATAPOINTS*SAMPLERATE;
for($i=0;$i < NDATAPOINTS; ++$i) {
$sqlX[$i] = $start + $i * SAMPLERATE;
}	
	// Double Line Graph

	$graph = new graph(380,200,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);   
	$graph->SetScale('datlin');
	$graph->SetY2Scale("lin");
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(8);
	$graph->xaxis->SetLabelMargin(15);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->scale->SetDateFormat('H:i');
	$graph->xaxis->HideTicks(true,true); 
	$line1 = new LinePlot($weatherArray[0],$weatherArray[2]);
	$line1->SetColor('blue'); 
	$line2 = new LinePlot($weatherArray[1],$weatherArray[2]);
	$line2->SetColor('red'); 
	$graph->Add($line1);
	$graph->AddY2($line2);
	$filename = "/home/chrisale/img/" . $graphname . ".png";
	$graph->Stroke($filename);
//----------------------------------------------------------------
	$graph = new graph(750,450,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);   
	$graph->SetScale('datlin');
	$graph->SetY2Scale("lin");
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->xaxis->SetLabelMargin(15);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(8);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->scale->SetDateFormat('H:i');
	$graph->xaxis->HideTicks(true,true); 
	$line1 = new LinePlot($weatherArray[0],$weatherArray[2]);
	$line1->SetColor('blue'); 
	$line2 = new LinePlot($weatherArray[1],$weatherArray[2]);
	$line2->SetColor('red'); 
	$graph->Add($line1);
	$graph->AddY2($line2);
	$filename = "/home/chrisale/img/" . $graphname . "big.png";
	$graph->Stroke($filename);
//----------------------------------------------------------------
	$graph = new graph(1600,800,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);   
	$graph->SetScale('datlin');
	$graph->SetY2Scale("lin");
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->xaxis->SetLabelMargin(15);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(8);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->scale->SetDateFormat('H:i');
	$graph->xaxis->HideTicks(true,true); 
	$line1 = new LinePlot($weatherArray[0],$weatherArray[2]);
	$line1->SetColor('blue'); 
	$line2 = new LinePlot($weatherArray[1],$weatherArray[2]);
	$line2->SetColor('red'); 
	$graph->Add($line1);
	$graph->AddY2($line2);
	$filename = "/home/chrisale/img/" . $graphname . "download.png";
	$graph->Stroke($filename);	

}

function createWeekDoubleLineGraph($weatherArray,$graphname,$xTitle,$yTitle,$y2Title,$Title,$dualYaxis) {

DEFINE('WNDATAPOINTS',2016);
DEFINE('WSAMPLERATE',300);


$start = time();
$end = $start+WNDATAPOINTS*WSAMPLERATE;
for($i=0;$i < WNDATAPOINTS; ++$i) {
$sqlX[$i] = $start + $i * WSAMPLERATE;
}	
	// Double Line Graph Small
	
	$graph = new graph(380,200,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);   
	$graph->SetScale('datlin');
	$graph->SetY2Scale("lin");
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(8);
	$graph->xaxis->SetLabelMargin(15);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->scale->SetDateFormat('D H');
	$graph->xaxis->HideTicks(true,true); 
	//$graph->xgrid->Show(true,true);
	$line1 = new LinePlot($weatherArray[0],$weatherArray[2]);
	$line1->SetColor('blue'); 
	$line2 = new LinePlot($weatherArray[1],$weatherArray[2]);
	$line2->SetColor('red'); 
	$graph->Add($line1);
	$graph->AddY2($line2);
	$filename = "/home/chrisale/img/" . $graphname . ".png";
	$graph->Stroke($filename);
	
	// Double Line Graph Big
	
	$graph = new graph(700,350,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);   
	$graph->SetScale('datlin');
	$graph->SetY2Scale("lin");
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->xaxis->SetLabelMargin(15);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(8);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->scale->SetDateFormat('D H');
	$graph->xaxis->HideTicks(true,true); 
	$line1 = new LinePlot($weatherArray[0],$weatherArray[2]);
	$line1->SetColor('blue'); 
	$line2 = new LinePlot($weatherArray[1],$weatherArray[2]);
	$line2->SetColor('red'); 
	$graph->Add($line1);
	$graph->AddY2($line2);
	$filename = "/home/chrisale/img/" . $graphname . "big.png";
	$graph->Stroke($filename);
}

function createMonthDoubleLineGraph($weatherArray,$graphname,$xTitle,$yTitle,$y2Title,$Title,$dualYaxis) {

DEFINE('MNDATAPOINTS',8928);
DEFINE('MSAMPLERATE',300);


$start = time();
$end = $start+MNDATAPOINTS*MSAMPLERATE;
for($i=0;$i < MNDATAPOINTS; ++$i) {
$sqlX[$i] = $start + $i * MSAMPLERATE;
}	
	// Double Line Graph Small
	
	$graph = new graph(380,200,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);   
	$graph->SetScale('datlin');
	$graph->SetY2Scale("lin");
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(8);
	$graph->xaxis->SetLabelMargin(15);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->scale->SetDateFormat('M d');
	$graph->xaxis->HideTicks(true,true); 
	//$graph->xgrid->Show(true,true);
	$line1 = new LinePlot($weatherArray[0],$weatherArray[2]);
	$line1->SetColor('blue'); 
	$line2 = new LinePlot($weatherArray[1],$weatherArray[2]);
	$line2->SetColor('red'); 
	$graph->Add($line1);
	$graph->AddY2($line2);
	$filename = "/home/chrisale/img/" . $graphname . ".png";
	$graph->Stroke($filename);
	
	// Double Line Graph Big
	
	$graph = new graph(700,350,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);   
	$graph->SetScale('datlin');
	$graph->SetY2Scale("lin");
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->xaxis->SetLabelMargin(15);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(8);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->scale->SetDateFormat('M d');
	$graph->xaxis->HideTicks(true,true); 
	$line1 = new LinePlot($weatherArray[0],$weatherArray[2]);
	$line1->SetColor('blue'); 
	$line2 = new LinePlot($weatherArray[1],$weatherArray[2]);
	$line2->SetColor('red'); 
	$graph->Add($line1);
	$graph->AddY2($line2);
	$filename = "/home/chrisale/img/" . $graphname . "big.png";
	$graph->Stroke($filename);
}

function createDaySingleLineGraph($weatherArray,$graphname,$xTitle,$yTitle,$Title,$dualYaxis) {

DEFINE('NDATAPOINTS',288);
DEFINE('SAMPLERATE',300);


$start = time();
$end = $start+NDATAPOINTS*SAMPLERATE;
for($i=0;$i < NDATAPOINTS; ++$i) {
$sqlX[$i] = $start + $i * SAMPLERATE;
}	
	// Single Line Graph
	
	$graph = new graph(380,200,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);   
	$graph->SetScale('datlin');
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(8);
	$graph->xaxis->SetLabelMargin(15);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->scale->SetDateFormat('H:i');
	$graph->xaxis->HideTicks(true,true); 
	$line1 = new LinePlot($weatherArray[0],$weatherArray[1]);
	$line1->SetColor('blue'); 
	$graph->Add($line1);
	$filename = "/home/chrisale/img/" . $graphname . ".png";
	$graph->Stroke($filename);
	
	// Single Line Graph Big
	
	
	$graph = new graph(750,450,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);   
	//sets type of chart
	$graph->SetScale('datlin');
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->xaxis->SetLabelMargin(15);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(8);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->scale->SetDateFormat('H:i');
	$graph->xaxis->HideTicks(true,true); 
	$line1 = new LinePlot($weatherArray[0],$weatherArray[1]);
	$line1->SetColor('blue'); 
	$graph->Add($line1);
	$filename = "/home/chrisale/img/" . $graphname . "big.png";
	$graph->Stroke($filename);
	
	
	$graph = new graph(1600,800,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);   
	//sets type of chart
	$graph->SetScale('datlin');
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->xaxis->SetLabelMargin(15);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(8);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->scale->SetDateFormat('H:i');
	$graph->xaxis->HideTicks(true,true); 
	$line1 = new LinePlot($weatherArray[0],$weatherArray[1]);
	$line1->SetColor('blue'); 
	$graph->Add($line1);
	$filename = "/home/chrisale/img/" . $graphname . "download.png";
	$graph->Stroke($filename);
	

}

function createWeekSingleLineGraph($weatherArray,$graphname,$xTitle,$yTitle,$Title,$dualYaxis) {

DEFINE('WNDATAPOINTS',2016);
DEFINE('WSAMPLERATE',300);


$start = time();
$end = $start+WNDATAPOINTS*WSAMPLERATE;
for($i=0;$i < WNDATAPOINTS; ++$i) {
$sqlX[$i] = $start + $i * WSAMPLERATE;
}	
	// Double Line Graph Small
	
	$graph = new graph(380,200,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);   
	$graph->SetScale('datlin');
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(8);
	$graph->xaxis->SetLabelMargin(15);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->scale->SetDateFormat('D H');
	$graph->xaxis->HideTicks(true,true); 
	//$graph->xgrid->Show(true,true);
	$line1 = new LinePlot($weatherArray[0],$weatherArray[1]);
	$line1->SetColor('blue'); 
	$graph->Add($line1);
	$filename = "/home/chrisale/img/" . $graphname . ".png";
	$graph->Stroke($filename);
	
	// Double Line Graph Big
	
	$graph = new graph(700,350,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);   
	$graph->SetScale('datlin');
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->xaxis->SetLabelMargin(15);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(8);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->scale->SetDateFormat('D H');
	$graph->xaxis->HideTicks(true,true); 
	$line1 = new LinePlot($weatherArray[0],$weatherArray[1]);
	$line1->SetColor('blue'); 
	$graph->Add($line1);
	$filename = "/home/chrisale/img/" . $graphname . "big.png";
	$graph->Stroke($filename);
	

}

function createMonthSingleLineGraph($weatherArray,$graphname,$xTitle,$yTitle,$Title,$dualYaxis) {

DEFINE('MNDATAPOINTS',8928);
DEFINE('MSAMPLERATE',300);


$start = time();
$end = $start+MNDATAPOINTS*MSAMPLERATE;
for($i=0;$i < MNDATAPOINTS; ++$i) {
$sqlX[$i] = $start + $i * MSAMPLERATE;
}	
	// Double Line Graph Small
	
	$graph = new graph(380,200,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);   
	$graph->SetScale('datlin');
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(8);
	$graph->xaxis->SetLabelMargin(15);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->scale->SetDateFormat('M d');
	$graph->xaxis->HideTicks(true,true); 
	//$graph->xgrid->Show(true,true);
	$line1 = new LinePlot($weatherArray[0],$weatherArray[1]);
	$line1->SetColor('blue'); 
	$graph->Add($line1);
	$filename = "/home/chrisale/img/" . $graphname . ".png";
	$graph->Stroke($filename);
	
	// Double Line Graph Big
	
	$graph = new graph(700,350,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);   
	$graph->SetScale('datlin');
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->xaxis->SetLabelMargin(15);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(8);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->scale->SetDateFormat('M d');
	$graph->xaxis->HideTicks(true,true); 
	$line1 = new LinePlot($weatherArray[0],$weatherArray[1]);
	$line1->SetColor('blue'); 
	$graph->Add($line1);
	$filename = "/home/chrisale/img/" . $graphname . "big.png";
	$graph->Stroke($filename);
	

}

function createYearSingleLineGraph($weatherArray,$graphname,$xTitle,$yTitle,$Title,$dualYaxis) {

DEFINE('YNDATAPOINTS',104832);
DEFINE('YSAMPLERATE',300);


$start = time();
$end = $start+YNDATAPOINTS*YSAMPLERATE;
for($i=0;$i < YNDATAPOINTS; ++$i) {
$sqlX[$i] = $start + $i * YSAMPLERATE;
}	
	// Double Line Graph Small
	
	$graph = new graph(380,200,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);   
	$graph->SetScale('datlin');
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(8);
	$graph->xaxis->SetLabelMargin(15);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->scale->SetDateFormat('M d');
	$graph->xaxis->HideTicks(true,true); 
	//$graph->xgrid->Show(true,true);
	$line1 = new LinePlot($weatherArray[0],$weatherArray[1]);
	$line1->SetColor('blue'); 
	$graph->Add($line1);
	$filename = "/home/chrisale/img/" . $graphname . ".png";
	$graph->Stroke($filename);
	
	// Double Line Graph Big
	
	$graph = new graph(700,350,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);   
	$graph->SetScale('datlin');
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->xaxis->SetLabelMargin(15);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(8);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->scale->SetDateFormat('M d');
	$graph->xaxis->HideTicks(true,true); 
	$line1 = new LinePlot($weatherArray[0],$weatherArray[1]);
	$line1->SetColor('blue'); 
	$graph->Add($line1);
	$filename = "/home/chrisale/img/" . $graphname . "big.png";
	$graph->Stroke($filename);
	

}

function createBarGraph($weatherArray,$graphname,$xTitle,$yTitle,$Title,$points,$sample) {

$start = time();
$end = $start+$points*$sample;

for($i=0;$i < $points; ++$i) {
$sqlX[$i] = $start + $i * $sample;
}	
	
	
	// Rain Graph
	
	$graph = new graph(380,200,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);  
	$graph->SetScale('datlin');
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->Show(false,false);
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(10);
	$graph->footer->center->Set($xTitle);
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->ygrid->Show(true,true);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->SetLabelMargin(15);
	$graph->xaxis->SetTickLabels($sqlX);
	$graph->xaxis->HideTicks(false,false); 
	$graph->xgrid->SetFill(true,'#BBCCFF@0.9','#EFEFEF@0.9');
	$graph->xaxis->scale->SetDateFormat('H:i');
	
	$bar1=new BarPlot($weatherArray[0]);
	$bar1->SetAbsWidth(8);
	$bar1->SetAlign("center");
	$bar1->SetFillgradient('green','darkolivegreen',GRAD_HOR); 
	$bar1->SetShadow(black,3,3,true); 
	$graph->Add($bar1);
	$filename = "/home/chrisale/img/" . $graphname . ".png";
	$graph->Stroke($filename);
	
	
	$graph = new graph(750,450,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);  
	$graph->SetScale('datlin');
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->Show(false,false);
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(10);
	$graph->footer->center->Set($xTitle);
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->ygrid->Show(true,true);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->SetLabelMargin(15);
	$graph->xaxis->SetTickLabels($sqlX);
	$graph->xaxis->HideTicks(false,false); 
	$graph->xgrid->SetFill(true,'#BBCCFF@0.9','#EFEFEF@0.9');
	$graph->xaxis->scale->SetDateFormat('H:i');
	
	$bar1=new BarPlot($weatherArray[0]);
	$bar1->SetAbsWidth(8);
	$bar1->SetAlign("center");
	$bar1->SetFillgradient('green','darkolivegreen',GRAD_HOR); 
	$bar1->SetShadow(black,3,3,true); 
	$graph->Add($bar1);
	$filename = "/home/chrisale/img/" . $graphname . "big.png";
	$graph->Stroke($filename);
	
	$graph = new graph(1600,800,$graphname,0,0);
	$graph->img->SetMargin(50,35,15,30);  
	$graph->SetScale('datlin');
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->Show(false,false);
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(10);
	$graph->footer->center->Set($xTitle);
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->ygrid->Show(true,true);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->SetLabelMargin(15);
	$graph->xaxis->SetTickLabels($sqlX);
	$graph->xaxis->HideTicks(false,false); 
	$graph->xgrid->SetFill(true,'#BBCCFF@0.9','#EFEFEF@0.9');
	$graph->xaxis->scale->SetDateFormat('H:i');
	
	$bar1=new BarPlot($weatherArray[0]);
	$bar1->SetAbsWidth(8);
	$bar1->SetAlign("center");
	$bar1->SetFillgradient('green','darkolivegreen',GRAD_HOR); 
	$bar1->SetShadow(black,3,3,true); 
	$graph->Add($bar1);
	$filename = "/home/chrisale/img/" . $graphname . "download.png";
	$graph->Stroke($filename);
	
}


function createAccBarGraph($weatherArray,$graphname,$xTitle,$yTitle,$Title,$points,$sample) {


foreach ($weatherArray[2] as $key=>$val){
$weatherArray[2][$key] = date('H:i',$val);
}
	
	// Rain ET Graph
	
	$graph = new graph(380, 200, $graphname,0,0);
	//margin around chart - Left, Right, Top, Bottom
	$graph->img->SetMargin(50,35,15,30);  
	//sets type of chart
	$graph->SetScale('datlin');
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->Show(false,false);
	//TItle section
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(10);
	$graph->footer->center->Set($xTitle);
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->ygrid->Show(true,true);
	$graph->xgrid->Show(true,true);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->SetLabelMargin(13);
	$graph->xaxis->SetTickLabels($weatherArray[2]);
	$graph->xaxis->HideTicks(false,false); 
	$graph->xgrid->SetFill(true,'#BBCCFF@0.9','#EFEFEF@0.9');
	
	$bar1=new BarPlot($weatherArray[0]);
	
	$bar1->SetAlign("center");
	$bar1->SetFillgradient('green','darkolivegreen',GRAD_HOR); 
	$bar1->SetShadow(black,3,3,true); 
	$bar2=new BarPlot($weatherArray[1]);
	
	$bar2->SetAlign("center");
	$bar2->SetFillgradient('red','darkred',GRAD_HOR); 
	$bar2->SetShadow(black,3,3,true); 
	$accbar = new AccBarPlot(array($bar1,$bar2));
	$graph->Add($accbar);
	
	$filename = "/home/chrisale/img/" . $graphname . ".png";
	$graph->Stroke($filename);
	
	
	
	/**** NOW BIG VERSION *****/
	
	$graph = new graph(700,350,$graphname,0,0);
		//margin around chart - Left, Right, Top, Bottom
	$graph->img->SetMargin(50,35,15,30);  
	//sets type of chart
	$graph->SetScale('datlin');
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->Show(false,false);
	//TItle section
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(10);
	$graph->footer->center->Set($xTitle);
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->ygrid->Show(true,true);
	$graph->xgrid->Show(true,true);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->SetLabelMargin(13);
	$graph->xaxis->SetTickLabels($weatherArray[2]);
	$graph->xaxis->HideTicks(false,false); 
	$graph->xgrid->SetFill(true,'#BBCCFF@0.9','#EFEFEF@0.9');
	
	$bar1=new BarPlot($weatherArray[0]);
	//$bar1->value-> Show();
	$bar1->SetAbsWidth(8);
	$bar1->SetAlign("center");
	$bar1->SetFillgradient('green','darkolivegreen',GRAD_HOR); 
	$bar1->SetShadow(black,3,3,true); 
	$bar2=new BarPlot($weatherArray[1]);
	//$bar2->value-> Show();
	$bar2->SetAbsWidth(8);
	$bar2->SetAlign("center");
	$bar2->SetFillgradient('red','darkred',GRAD_HOR); 
	$bar2->SetShadow(black,3,3,true); 
	$accbar = new AccBarPlot(array($bar1,$bar2));
	$graph->Add($accbar);
	
	$filename = "/home/chrisale/img/" . $graphname . "big.png";
	$graph->Stroke($filename);

	/**** NOW BIG VERSION *****/
	
	$graph = new graph(1600,800,$graphname,0,0);
		//margin around chart - Left, Right, Top, Bottom
	$graph->img->SetMargin(50,35,15,30);  
	//sets type of chart
	$graph->SetScale('datlin');
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->Show(false,false);
	//TItle section
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(10);
	$graph->footer->center->Set($xTitle);
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->ygrid->Show(true,true);
	$graph->xgrid->Show(true,true);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('left','left');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->SetLabelMargin(13);
	$graph->xaxis->SetTickLabels($weatherArray[2]);
	$graph->xaxis->HideTicks(false,false); 
	$graph->xgrid->SetFill(true,'#BBCCFF@0.9','#EFEFEF@0.9');
	
	$bar1=new BarPlot($weatherArray[0]);
	//$bar1->value-> Show();
	$bar1->SetAbsWidth(8);
	$bar1->SetAlign("center");
	$bar1->SetFillgradient('green','darkolivegreen',GRAD_HOR); 
	$bar1->SetShadow(black,3,3,true); 
	$bar2=new BarPlot($weatherArray[1]);
	//$bar2->value-> Show();
	$bar2->SetAbsWidth(8);
	$bar2->SetAlign("center");
	$bar2->SetFillgradient('red','darkred',GRAD_HOR); 
	$bar2->SetShadow(black,3,3,true); 
	$accbar = new AccBarPlot(array($bar1,$bar2));
	$graph->Add($accbar);
	
	$filename = "/home/chrisale/img/" . $graphname . "download.png";
	$graph->Stroke($filename);

}

function create7dayBarGraph($weatherArray,$weatherArray2,$graphname,$xTitle,$yTitle,$Title,$points,$sample) {

DEFINE('RAINSUMPOINTS',$points);
DEFINE('SUMSAMPLERATE',$sample);


$start = time();
$end = $start+RAINSUMPOINTS*SUMSAMPLERATE;

$counter = 0;
/*foreach ($weatherArray as $key => $val) {
	$counter++;
}
if ($counter < ($points-1)){
$diff = $points - $counter;
while ($diff > 0) {
$tempValue = $points - $diff;
$weatherArray[$tempValue] = 0;
$diff--;
}

}*/

foreach ($weatherArray as $key => $val){
$sqly[$counter] = $val;
$counter++;
}
//echo $counter;

for($i=0;$i < RAINSUMPOINTS; ++$i) {
$sqlX[$i] = $start + $i * SUMSAMPLERATE;
}	
	
	
	// 7 Day Rain Graph
	
	$graph = new graph(380, 200, $graphname,0,0);
	//margin around chart - Left, Right, Top, Bottom
	$graph->img->SetMargin(50,35,15,30);  
	//sets type of chart
	$graph->SetScale('lin');
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	
	//$graph->ygrid->SetFill(true,'#EFEFEF@0.7','#BBCCFF@0.7');
	$graph->ygrid->Show(false,false);
	//TItle section
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	//$graph->title->SetLabelAlign('center','center');
	//$graph->xaxis->title->Set($xTitle);
	
	//$graph->footer->center->Set($xTitle);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(10);
	//$graph->xaxis->title->SetAlign('center');
	//$graph->xaxis->title->Set($xTitle);
	$graph->footer->center->Set($xTitle);
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->ygrid->Show(true,true);
	//$graph->yscale->SetAutoTicks();
	//$graph->yaxis->scale->SetAutoMin(0);
	//$graph->SetScale("textlin",-10,40);
	
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->SetLabelMargin(15);
//weekly	$graph->xaxis->SetTextTickInterval(10.4);
	//$graph->xaxis->SetTextTickInterval($Xinterval);
	$graph->xaxis->SetTickLabels($sqlX);
	$graph->xaxis->HideTicks(false,false); 
	//$graph->xgrid->Show(true,true);
	$graph->xgrid->SetFill(true,'#BBCCFF@0.9','#EFEFEF@0.9');
	
	$bar1=new BarPlot($weatherArray,$weatherArray2);
	//$bar1->value-> Show();
	//$bar1->SetValuePos('center'); 
	//$bar1->SetFillColor("darkolivegreen");
	$bar1->SetAbsWidth(8);
	$bar1->SetAlign("center");
	$bar1->SetFillgradient('green','darkolivegreen',GRAD_HOR); 
	$bar1->SetShadow(black,3,3,true); 
	$graph->Add($bar1);
	$filename = "/home/chrisale/img/" . $graphname . ".png";
	$graph->Stroke($filename);
	
	
	$graph = new graph(700,350,$graphname,0,0);
	//margin around chart - Left, Right, Top, Bottom
	$graph->img->SetMargin(50,35,15,30);   
	//sets type of chart
	$graph->SetScale('datlin');
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	
	//$graph->ygrid->SetFill(true,'#EFEFEF@0.7','#BBCCFF@0.7');
	$graph->ygrid->Show(false,false);
	//TItle section
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	//$graph->title->SetLabelAlign('center','center');
	//$graph->xaxis->title->Set($xTitle);
	
	//$graph->footer->center->Set($xTitle);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(10);
	$graph->footer->center->Set($xTitle);
	$graph->yaxis->title->Set($yTitle);
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->ygrid->Show(true,true);
	//$graph->yscale->SetAutoTicks();
	//$graph->yaxis->scale->SetAutoMin(0);
	//$graph->SetScale("textlin",-10,40);

	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->SetLabelMargin(12);
	//$graph->xaxis->SetLabelAngle(0);
//weekly	$graph->xaxis->SetTextTickInterval(10.4);
	//$graph->xaxis->SetTextTickInterval($Xinterval);
	$graph->xaxis->SetTickLabels($weatherArray2);
	$graph->xaxis->HideTicks(false,false); 
	//$graph->xgrid->Show(true,true);
	$graph->xgrid->SetFill(true,'#BBCCFF@0.9','#EFEFEF@0.9');
	
	$bar1=new BarPlot($weatherArray,$weatherArray2);
	//$bar1->value-> Show();
	//$bar1->SetValuePos('center'); 
	//$bar1->SetFillColor("darkolivegreen");
	$bar1->SetAbsWidth(8);
	$bar1->SetAlign("center");
	$bar1->SetFillgradient('green','darkolivegreen',GRAD_HOR); 
	$bar1->SetShadow(black,3,3,true); 
	$graph->Add($bar1);
	$filename = "/home/chrisale/img/" . $graphname . "big.png";
	$graph->Stroke($filename);

}
function createSingleMeter($weatherArray,$graphname,$xTitle,$yTitle,$y2Title,$Title,$dualYaxis) {

DEFINE('RAINSUMPOINTS',1);

$dateX = 8800;
$weatherArray = 23;
	// Rain Graph
	
	$graph = new graph(200, 100, $graphname,0,0);
	//margin around chart - Left, Right, Top, Bottom
	$graph->img->SetMargin(50,35,15,30);  
	//sets type of chart
	$graph->SetScale('lin');
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	
	//$graph->ygrid->SetFill(true,'#EFEFEF@0.7','#BBCCFF@0.7');
	$graph->ygrid->Show(false,false);
	//TItle section
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	//$graph->title->SetLabelAlign('center','center');
	//$graph->xaxis->title->Set($xTitle);
	
	//$graph->footer->center->Set($xTitle);
	$graph->yaxis->title->Set($yTitle);
	$graph->yaxis->title->SetFONT(FF_FONT1, FS_BOLD);
	$graph->yaxis->title->SetMargin(10);
	//$graph->xaxis->title->SetAlign('center');
	//$graph->xaxis->title->Set($xTitle);
	$graph->footer->center->Set($xTitle);
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	$graph->ygrid->Show(true,true);
	//$graph->yscale->SetAutoTicks();
	//$graph->yaxis->scale->SetAutoMin(0);
	//$graph->SetScale("textlin",-10,40);
	
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	$graph->xaxis->SetLabelMargin(15);
//weekly	$graph->xaxis->SetTextTickInterval(10.4);
	//$graph->xaxis->SetTextTickInterval($Xinterval);
	$graph->xaxis->SetTickLabels($dateX);
	$graph->xaxis->HideTicks(false,false); 
	//$graph->xgrid->Show(true,true);
	$graph->xgrid->SetFill(true,'#BBCCFF@0.9','#EFEFEF@0.9');
	
	$bar1=new BarPlot($weatherArray);
	//$bar1->value-> Show();
	//$bar1->SetValuePos('center'); 
	//$bar1->SetFillColor("darkolivegreen");
	$bar1->SetAbsWidth(8);
	$bar1->SetAlign("center");
	$bar1->SetFillgradient('green','darkolivegreen',GRAD_HOR); 
	$bar1->SetShadow(black,3,3,true); 
	$graph->Add($bar1);
	$filename = "/home/chrisale/img/" . $graphname . ".png";
	$graph->Stroke($filename);
	
	}
function createSingleDial($weatherArray,$graphname,$xTitle,$yTitle,$y2Title,$Title,$dualYaxis) {
require_once("wp-content/themes/default/include/jpgraph/jpgraph_pie.php");

	// Pie Graph Sum
	
	//size, name of graph   - TEMP GRAPH
	$graph = new PieGraph(160,160,'auto');
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_COMIC,FS_BOLD,14);
	$graph->title->SetMargin(8);
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$p1 = new PiePlotC(200);
	$p1->SetSize(0.32);
	//ÊLabelÊfontÊandÊcolorÊsetup
	$p1->value->SetFont(FF_ARIAL,FS_BOLD,10);
	$p1->value->SetColor('black');
	//ÊSetupÊtheÊtitleÊonÊtheÊcenterÊcircle
	$midtitle = $weatherArray[0] . $weatherArray[1];
	$p1->midtitle->Set($midtitle);
	$p1->midtitle->SetFont(FF_COMIC,FS_NORMAL,10);
	//ÊSetÊcolorÊforÊmidÊcircle
	$p1->SetMidColor('white');
	//ÊUseÊpercentageÊvaluesÊinÊtheÊlegendsÊvaluesÊ(ThisÊisÊalsoÊtheÊdefault)
	$p1->SetLabelType(PIE_VALUE_PER);
	//ÊAddÊplotÊtoÊpieÊgraph
	$graph->Add($p1);
	//Ê..ÊandÊsendÊtheÊimageÊonÊit'sÊmarryÊwayÊtoÊtheÊbrowser
	$filename = "/home/chrisale/img/" . $graphname . ".png";
	$graph->Stroke($filename);
/*	
	// Triple Line Graph
	
	//size, name of graph   - TEMP GRAPH
	$graph = new graph(700,350,$graphname,0,0);
	//margin around chart - Left, Right, Top, Bottom
	$graph->img->SetMargin(40,35,15,30);  
	//sets type of chart
	$graph->SetScale('datlin');
	if ($dualYaxis == 1) {
	$graph->SetY2Scale("lin");
	}
	$graph->SetColor('white');
	$graph->SetMarginColor('white');
	$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
	//$graph->ygrid->Show(false,false);
	//TItle section
	$graph->title->Set($Title);
	$graph->title->SetFont(FF_FONT1, FS_NORMAL);
	//$graph->title->SetLabelAlign('center','center');
	//$graph->xaxis->title->Set($xTitle);
	
	//$graph->footer->center->Set($xTitle);
	$graph->yaxis->title->Set($yTitle);
	//$graph->yaxis->HideTicks(true,true); 
	//$graph->SetScale("textlin",-10,40);
	//$graph->xaxis->SetTickLabels($sqlX);
	$graph->xaxis->SetFont(FF_FONT0, FS_NORMAL);
	$graph->xaxis->SetLabelMargin(15);
	$graph->xaxis->SetLabelAlign('center','center');
	$graph->xaxis->SetLabelAngle(90);
	//$graph->xaxis->scale->SetTimeAlign(MINADJ_5,MINADJ_5);
	$graph->xaxis->scale->SetDateFormat('H:00');
	//$graph->xaxis->SetLabelAngle(0);
//weekly	$graph->xaxis->SetTextTickInterval(10.4);
	//$graph->xaxis->SetTextTickInterval($Xinterval);
	$graph->xaxis->HideTicks(true,true); 
	//$graph->xgrid->Show(true,true);
	$line1 = new LinePlot($weatherArray[2],$weatherArray[1]);
	$line1->SetColor('red'); 
	$line2 = new LinePlot($weatherArray[1],$weatherArray[1]);
	$line2->SetColor('blue'); 
	$line3 = new LinePlot($weatherArray[0],$weatherArray[1]);
	$line3->SetColor('darkolivegreen'); 
	$line3->SetWeight(3);
	if ($dualYaxis == 1) {
	$graph->AddY2($line2);
	$graph->AddY2($line1);
	}
	else {
	$graph->Add($line2);
	$graph->Add($line1);
	}
	$graph->Add($line3);
	$filename = '/home/chrisale/img/' . $graphname . 'big.png';
	$graph->Stroke($filename);
	
	*/

}

?>