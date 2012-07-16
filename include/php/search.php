<?php get_header(); 
//THESE FIRST TWO LINES ARE THE "MEAT" OF THE SYSTEM AND RUN THE BACKEND DATA CRUNCHING.  YOU SOULD HAVE THESE TWO LINES IN ANY PAGE YOU WANT WEATHER DATA FROM EITHER WVIEW DIRECTLY OR MYSQL
	$weatherperiod = 0;
	$weatherArray = unitConverter($weatherperiod);

/**<dt>Est. Freezing Level</dt>
				<dd style="<?php //echo $weatherArray[freezingLevelCSS];?>"><?php echo $weatherArray[freezingLevel]; echo $weatherArray[cumulusBaseUnit];?></dd> */

// IF YOU DON"T USE ADS ON YOUR WEBSITE YOU CAN REMOVE THE FOLLOWING IF/ELSE STATEMENT COMPLETELY or, you can customize the stationCity to 	

if ($weatherArray[stationCity] != 'PortAlberni') {

echo "<h2>Wview Configuration Problem.</h2>
<p> You need to change line 16 in index.php of the wordpress Alberniweather theme so it matches with  the StationCity configuration variable in wview.  This is just a trap to catch whenever there is an update to wview and you might forget to fix the configuration.</p>";

}
else {

$currentAds = adrotate(); // Run the Ad Rotator

//THIS SECTIONS RUNS GRAPHS FOR THE FRONTPAGE.  THIS IS ALSO THE "MASTER LIST" OF GRAPHS AVAILABLE ON THE PHP SITE.  YOU MAY USE THESE FUNCTIONS ON ANY OTHER PAGE AS LONG AS YOU ALSO INCLUDE THE FIRST TWO LINES OF THIS FILE AS WELL TO RUN THE weatherArray FUNCTION

dayTempChillHeat($weatherArray);
dayBaromWind($weatherArray);
RainETNet24hr($weatherArray);

include("getforecast.php");
get_sidebar();
}?>

	<div id="bottombox" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Search Results</h2>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; More Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>


		<?php while (have_posts()) : the_post(); ?>

			<div class="post">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, F jS, Y') ?></small>

				<p class="postmetadata">Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; More Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">No posts found. Try a different search?</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>



