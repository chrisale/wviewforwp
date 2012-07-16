<?php

// ******************************************
// Code written by M. Brooks Clark June 2010 
// With tweaks by Mark Levine
// and Jim Bradbury   August 2010
// ******************************************

include "windrose_settings.php";

if (defined('STDIN')){ // cli
	$cli = getopt("t:");
	if (isset($cli["t"])) {
			$displayHours = $cli["t"];
	}
	$generateFile=true;
} else {
	if (isset($_GET['displayHours'])) {
			$displayHours = $_GET['displayHours'];
	}
}

if (!isset($displayHours)) {
	$displayHours = 24;
}

$width = 2 * $radius + $border;
$height = 2 * $radius + $border;

$center_x = $radius + $border/2;
$center_y = $radius + $border/2;

$windSpeed = array();
$windDir = array();

// Get data from database
try {
	$db = new PDO("sqlite:" . $db_path . $db_fname);
	
	//      set up query string (mysql)
	if ($useWindGust) {
		$sql = "SELECT windGust, windGustDir FROM archive WHERE datetime(datetime, 'unixepoch', 'localtime') >= datetime('now', 'localtime', '-$displayHours hours');";
		foreach ($db->query($sql) as $row) {
			array_push($windSpeed, $row['windGust']);
			$dir = $row['windGustDir'] + 270;
			array_push($windDir, $dir > 360 ? $dir - 360 : $dir);
		}
	} else {
		$sql = "SELECT windSpeed, windDir FROM archive WHERE datetime(datetime, 'unixepoch', 'localtime') >= datetime('now', 'localtime', '-$displayHours hours');";
		foreach ($db->query($sql) as $row) {
			array_push($windSpeed, $row['windSpeed']);
			$dir = $row['windDir'] + 270;
			array_push($windDir, $dir > 360 ? $dir - 360 : $dir);
		}
	}
	
	$nvals = count($windSpeed);
	$db = NULL;
	
	$maxSpeed = 0.0;
	
	for ($i = 0; $i < count($windSpeed); $i++) {
		if ($windSpeed[$i] > $maxSpeed) {
			$maxSpeed = $windSpeed[$i];
		}
	}
	
	$speedArray = $speed[0];
	for ($i = 0; $i < count($speed); $i++) {
		if ($maxSpeed > $speed[$i][0]) {
			$speedArray = $speed[$i];
		}
	}
	
	$angle = array();
	$freq = array();
	$data = array();
	$freq_calm = 0;
	for ($j = 0; $j < $n_arcs; $j++) {
		array_push($angle, $j * $bin_angle);
		array_push($freq, 0);
		$data[$j] = array();
	}
	$n = 0;
	
	for ($i = 0; $i < $nvals; $i++) {
		if($windSpeed[$i] < $calm) {
			$freq_calm++;
			continue;
		}
		for ($j = 0; $j < $n_arcs; $j++) {
			if ($angle[$j] == 0) {
				if($windSpeed[$i] >= $calm && ($windDir[$i] == 0 ||
							(($windDir[$i] <= ($angle[$j] + $bin_angle / 2) && $windDir[$i] >= ($angle[$j] - $bin_angle / 2) + 360)))) {
					$freq[$j]++;
					array_push($data[$j], $windSpeed[$i]);
					continue;
				}
			} else {
				if ($windSpeed[$i] >= $calm && ($windDir[$i] <= ($angle[$j] + $bin_angle / 2) && $windDir[$i] > ($angle[$j] - $bin_angle / 2))) {
					$freq[$j]++;
					array_push($data[$j], $windSpeed[$i]);
					continue;
				}
			}
		}
	}
	
	$max = 0;
	$n = 0;
	for ($j = 0; $j < $n_arcs; $j++) {
	$max = $freq[$j] > $max ? $freq[$j] : $max;
	$n += $freq[$j];
	}
	
	//Create image and allocate colors
	$im = imagecreate((2*$radius + $border), (2*$radius + $border)) or die("Could not create source image");
	$white = imagecolorallocate($im, 255, 255, 255);
	$black = imagecolorallocate($im, 0, 0, 0);
	$magenta = imagecolorallocate($im, 255, 0, 200);
	$red = imagecolorallocate($im, 255, 0, 0);
	$orange = imagecolorallocate($im, 255, 126, 0);
	$yellow = imagecolorallocate($im, 255, 255, 0);
	$green = imagecolorallocate($im, 0, 255, 0);
	$blue = imagecolorallocate($im, 0, 0, 255);
	$gray25 = imagecolorallocate($im, 188, 188, 188);
	$gray50 = imagecolorallocate($im, 126, 126, 126);
	
	$colors = array($red, $orange, $yellow, $green, $blue, $gray50, $black);
	
	imagecolortransparent($im, $white);
	
	for ($j = 0; $j < $n_arcs; $j++) {
		$w = ($freq[$j]/$max) * (2 * $radius);
		imagefilledarc($im, $center_x, $center_y, $w, $w, $angle[$j] - $bin_angle/2 + $gap, $angle[$j] + $bin_angle/2 -$gap, $magenta, IMG_ARC_PIE);
		imagefilledarc($im, $center_x, $center_y, $w, $w, $angle[$j] - $bin_angle/2 + $gap, $angle[$j] + $bin_angle/2 -$gap, $black, IMG_ARC_NOFILL);
	}
	
	
	if($n==0) {
		$text = "No Wind Data to Plot";
		$size = imagettfbbox(18, 0, $textfont, $text);
		$x = $center_x - abs($size[2] - $size[0]) / 2;
		$y = $center_y + 9;
		imagettftext($im, 18, 0, $x, $y, $black, $headerfont, $text);
	} else {
	
		$freq2 = array();
		for ($j = 0; $j < $n_arcs; $j++) {
			array_push($freq2, 0);
		}
	
		for($i = 0; $i < count($speedArray); $i++) {
			for ($j = 0; $j < $n_arcs; $j++) {
				for ($k = 0; $k < count($data[$j]); $k++) {
					if ($data[$j][$k] < $speedArray[$i]) {
						$freq2[$j]++;
					}
				}
				//printf("i = %d freq2[%d] = %d<br>", $i, $j, $freq2[$j]);  // Debug
				$w = (($freq2[$j])/$max) * (2 * $radius);
				imagefilledarc($im, $center_x, $center_y, $w, $w, $angle[$j] - $bin_angle/2 + $gap, $angle[$j] + $bin_angle/2 -$gap, $colors[$i], IMG_ARC_PIE);
			}
			for ($j = 0; $j < $n_arcs; $j++) {
				$freq2[$j] = 0;
			}
		}
	}
	
		// Draw internal circles
		imagefilledarc($im, $center_x, $center_y, $radius*2, $radius*2, 0, 360, $black, IMG_ARC_NOFILL);
		imagefilledarc($im, $center_x, $center_y, 0.25 * $radius*2, 0.25 * $radius*2, 0, 360, $gray50, IMG_ARC_NOFILL);
		imagefilledarc($im, $center_x, $center_y, 0.5 * $radius*2, 0.5 * $radius*2, 0, 360, $gray50, IMG_ARC_NOFILL);
		imagefilledarc($im, $center_x, $center_y, 0.75 * $radius*2, 0.75 * $radius*2, 0, 360, $gray50, IMG_ARC_NOFILL);
	
		// Image header
		$text = "Wind Data for $displayHours hours ending " . $now;
		$size = imagettfbbox($fontsize, 0, $textfont, $text);
		$x = $center_x - abs($size[2] - $size[0]) / 2 - 15;
		$y = $border/2-35;
		imagettftext($im, $fontsize, 0, $x, $y, $black, $headerfont, $text);
	
			// Draw Legend Lower Right of Image
		$x = 2* $radius + $border / 2;
		$y = $radius + $radius/2 + $border/2;
		imagefilledrectangle($im, $x, $y, $x+20, $y - 20, $magenta);
		$y += 20;
		for ($i = 0; $i < count($speedArray); $i++) {
			imagefilledrectangle($im, $x, $y, $x+20, $y - 20, $colors[$i]);
		   // Print Numbers on the boundary of the color change
			imagettftext($im, $fontsize, 0, $x+30, $y-15, $black, $textfont, $speedArray[$i]);
			$y += 20;
		}
	
		// Draw ticks around the rose
		$ang = 0;
		$delta_ang = 22.5;
		for ($j = 0; $j < 360 / $delta_ang; $j++) {
			$ang += $delta_ang;
			$x1 = $center_x + sin(deg2rad($ang)) * $radius;
			$y1 = $center_y + cos(deg2rad($ang)) * $radius;
			$x2 = $center_x + sin(deg2rad($ang)) * ($radius + 7);
			$y2 = $center_y + cos(deg2rad($ang)) * ($radius + 7);
					// Uncomment one of the two lines below and comment out the other one
	//		imageline($im, $x1, $y1, $x2, $y2, $black);   // Only draw tick marks around outer circle
			imageline($im, 200, 200, $x2, $y2, $black);   // Draw lines from center for compass points
	
			  //  Label Compass Points
			  if ( $ang == 45 ) {
				   $text = "SE";
				   imagettftext($im, $fontsize, 0, $x2+2, $y2+12, $black, $ptfont, $text);
			  }
			  if ( $ang == 90 ) {
				   $text = "E";
				   imagettftext($im, $headerfontsize+2, 0, $x2+5, $y2+7, $black, $ptfont, $text);
			  }
			  if ( $ang == 135 ) {
				   $text = "NE";
				   imagettftext($im, $fontsize, 0, $x2+2, $y2-2, $black, $ptfont, $text);
			  }
			  if ( $ang == 180 ) {
				   $text = "N";
				   imagettftext($im, $headerfontsize+2, 0, $x2-4, $y2-3, $black, $ptfont, $text);
			  }
			  if ( $ang == 225 ) {
				   $text = "NW";
				   imagettftext($im, $fontsize, 0, $x2-18, $y2-2, $black, $ptfont, $text);
			  }
			  if ( $ang == 270 ) {
				   $text = "W";
				   imagettftext($im, $headerfontsize+2, 0, $x2-18, $y2+7, $black, $ptfont, $text);
			  }
			  if ( $ang == 315 ) {
				   $text = "SW";
				   imagettftext($im, $fontsize, 0, $x2-18, $y2+12, $black, $ptfont, $text);
			  }
			  if ( $ang == 360 ) {
				   $text = "S";
				   imagettftext($im, $headerfontsize+2, 0, $x2-5, $y2+18, $black, $ptfont, $text);
			  }
	
		}  // End for Loop
	
			// Draw 2 Lines of Text Lower Left of image
		$text = "Number of samples (calm): " . $freq_calm;
		$size = imagettfbbox($fontsize, 0, $textfont, $text);
		$x = 5;
		$y = 2* $radius + $border-23;
		imagettftext($im, $fontsize, 0, $x, $y, $black, $textfont, $text);
	
		$text = "Number of samples (> calm): " . $n;
		$size = imagettfbbox($fontsize, 0, $textfont, $text);
		$y += 15;
		imagettftext($im, $fontsize, 0, $x, $y, $black, $textfont, $text);
	
	
	header("content-type: image/png");
	
	if ($generateFile) {
		$fname = $fname . "-" . $displayHours . "hr.png";
		imagepng($im, $fname);
	} else {
		imagepng($im);
	}
	
	imagedestroy($im);  // Free up image resource
}

catch( PDOException $exception ) {
die("new POD" . " failed: " . $exception->getMessage());
}

?>
