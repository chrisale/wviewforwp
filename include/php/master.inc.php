<?php
	define('CURRENTYEAR', date('Y'));	// Current Year
	define('CURRENTDAY', date('d'));	// Current Day
	define('CURRENTHOUR', date('G'));	// Current Hour (24-h format)
	$graphwidth = 380;
	$graphheight = 180;
	require_once('wp-content/themes/alberniweather/include/php/dbConnect.inc.php');
	require_once('wp-content/themes/alberniweather/include/php/globalvariables.php');
	require_once('wp-content/themes/alberniweather/sqlvars.php');
	require_once('wp-content/themes/alberniweather/include/jpgraph/jpgraph.php'); 
	require_once('wp-content/themes/alberniweather/include/jpgraph/jpgraph_bar.php');
	require_once('wp-content/themes/alberniweather/include/jpgraph/jpgraph_line.php');
	require_once("wp-content/themes/alberniweather/include/jpgraph/jpgraph_scatter.php");
//	require_once('/usr/local/lib/php/Cache/Function.php');
//	require_once('/usr/local/lib/php/Cache/Output.php');
?>