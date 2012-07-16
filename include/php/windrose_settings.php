<?php

$db_path = '/opt/local/var/wview/archive/';
$db_fname = 'wview-archive.sdb';
$site_url = 'http://www.clarkwx.net/wview.php';

//Set your timezone. See http://php.net/manual/en/timezones.php for values
date_default_timezone_set('America/Chicago');


//Number of hours of wind data to display
$displayHours = 24;
$now = date('d-M-Y  H:i T');

//If true, use wind gust data rather than the 5 minute averages
$useWindGust = true;

//In order to create a PNG file rather than having the images generated on-demand
//when the web page is loaded, change this value to true
$generateFile = false;
$fname = "/var/lib/wview/img/windrose"; 
//Note: number of hours will be added to the file name, so the final file name will look like
// "windrose-3hr.png"

$radius = 150;
$border = 100;

// Fonts to be used in plots
// You will need to specify the directory containing true type fonts, and you'll need
// to make sure you have the fonts installed in that directory.
// If you don't have the fonts specified here, you can change the names of the fonts to something
// you do have installed.
//******************************************************************
// 1 To use Arial, uncomment the lines between 1 and 2 and comment out the lines between 2 and 3
$fontpath = "/Library/Fonts/";
$headerfontsize = 12;
$headerfont = $fontpath . "Arial Bold.ttf";
$textfont = $fontpath . "Arial.ttf";
$fontsize = 10;
$ptfont     = $fontpath . "Arial Bold.ttf";

// 2 To use alternate fonts, comment the lines between 1 and 2 and uncomment the lines between 2 and 3
//$fontpath = "/usr/share/fonts/truetype/ttf-liberation/";
//$ptfontpath = "/usr/share/fonts/truetype/ttf-dejavu/";
//$headerfontsize = 12;
//$fontsize = 10;
//$headerfont = $fontpath . "LiberationSans-Regular.ttf";
//$textfont   = $fontpath . "LiberationSans-Regular.ttf";
//$ptfont     = $ptfontpath . "DejaVuSansMono-Bold.ttf";
// 3
//******************************************************************



//Number of petals to show in windrose
$n_arcs = 24;
$bin_angle = 360 / $n_arcs;
$gap = 2;

//Wind speed that is considered "calm" (not plotted on windrose)
$calm = 1;

//This array represents the ranges for the colors on the windrose
//Additinal values can be added to the $speed array, but the maximum
//value must increase from the first to the last array.
$speed = array(         array(7.0, 6.0, 5.0, 4.0, 3.0, 2.0),
                        array(12.0, 10.0, 8.0, 6.0, 4.0, 2.0),
                        array(30.0, 25.0, 20.0, 15.0, 10.0, 5.0),
                        array(55.0, 50.0, 40.0, 30.0, 20.0, 10.0));

$speedArray = array();

?>
