<?php

/**

Template Name:  Right Sidebar Template

* * 

*/

get_header();

?>

<section class="maincontentRow">

<div class="container">

<div class="row">


  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 leftsection">

  <div class="inner">

<?php  if ( is_page(16) ) { ?>
<div class="grayboxeventbox">
<h5>Current Events</h5>
<div id="eventscrol" class="scroll-text">
<ul>
<?php 

$loop = new WP_Query( array( 'post_type' => 'tribe_events', 'posts_per_page' => 3 ) ); 
$loop_posts	=	get_posts();

/* print_r($loop_posts); */

if($loop->have_posts()) {
	
?>
<?php while ( $loop->have_posts() ) : $loop->the_post();
	
	/* THR */
	/* echo 'test'.the_field('EventStartDate'); echo get_the_ID(); */
	$eventStartDate	=	strtotime(get_post_meta(get_the_ID(), '_EventStartDate', true));
	$eventEndDate	=	strtotime(get_post_meta(get_the_ID(), '_EventEndDate', true));
	/* print_r($lopmeta); */
	/* THR */
?>
<?php /* <li><span class="clicklightbox"><?php the_title(); ?> : <?php the_time('D , F , d'); ?> - <?php the_time('g:i A'); ?></span></li> */ ?>
<li><span class="clicklightbox"><?php the_title(); ?> : <?php echo date('D , F , d', $eventStartDate); ?> - <?php echo date('g:i A', $eventStartDate); ?></span></li>

<div class="lightbox" style="display:none;">
    <div class="inside"><span class="close">X</span>
        <div class="insideone">
        <h3><?php the_title(); ?></h3>
        <div class="short_desc"><?php echo get_the_excerpt(); ?></div>
        <div class="eventdate"><?php echo date('D , F , d', $eventEndDate); ?> - <?php echo date('g:i A', $eventEndDate); ?></div>
        <?php /* <div class="eventdate"><?php the_time('D , F , d'); ?> - <?php the_time('g:i A'); ?></div> */ ?>
        <?php /*<p><?php the_title(); ?> : <?php the_time('D , F , d'); ?> - <?php the_time('g:i A'); ?></p>*/ ?>
        </div>
    </div>
</div>

<?php endwhile; wp_reset_query(); 
} else {
?>
<li>Coming Soon.</li>
<?php
}
?>
</ul>
</div>
<script type="text/javascript">
$(document).ready(function(e) {
    
$('#eventscrol').scrollbox({
    linear: true,
    step: 1,
    delay: 0,
    speed: 100
  });
});
</script>
</div>
<h5 class="headingmaintext">NEWSLETTERS</h5>
<div class="menu">
		<div class="newsletterlist">
		<?php 

            $args = array( 'post_type' => 'news_letter', 'meta_key' => 'order_by', 'orderby' => 'meta_value',
'order' => 'ASC');
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); ?>
<a rel="" href="<?php the_field('pdf_file'); ?>" target="_blank"><?php the_title(); ?></a>
          
   <?php endwhile; // end of the loop. ?>
   </div>
 </div>
 
<a class="schedulbtn" title="Schedule a Tour" href="<?php bloginfo('url') ?>/contact/">Schedule a Tour<em class="artrow"></em></a>
<a class="schedulbtn graycolr" title="Take a Virtual Tour" href="<?php bloginfo('url') ?>/virtual-tour">Take a Virtual Tour <em class="artrow"></em></a>
<?php  } else { ?>
<div class="mapimg">

<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>

<div style='overflow:hidden;height:240px;width:341px;'><div id='gmap_canvas' style='height:240px;width:341px;'></div>

</div>





<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAWy6_vOkNN-sc4zq9FqKVktjcume6_Ud8'></script>  <a href='https://embedmaps.net'>&nbsp;</a><script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=1577e5147f7a5a9edf9c454e290d26581bd7ef80'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(44.4513589,-95.78922),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(44.4513589,-95.78922)});infowindow = new google.maps.InfoWindow({content:'<strong></strong><br>207 North 4th Street<br>56258 Marshall<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>


</div>

<p class="adresstext">Heritage Pointe Senior Living<br>

207 North 4th Street<br>

Marshall, MN 56258<br>

<a href="https://www.google.com/maps/place/207+N+4th+St,+Marshall,+MN+56258/@44.4513589,-95.7914087,17z/data=!4m5!3m4!1s0x878a59120d56c3a1:0x2589e82d954ee706!8m2!3d44.4513589!4d-95.78922" target="_blank">Get Directions</a><br>
&nbsp;<br>

Phone: <a href="507-337-4330">507-337-4330</a><br>

Fax: <a href="tel:507-337-4334">507-337-4334</a></p>
<?php  } ?>


  </div>

 </div>





 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 rightsection">

 <div class="inner">

 <?php

		// Start the loop.

		while ( have_posts() ) : the_post();



			// Include the page content template.

			get_template_part( 'content', 'page' );





		// End the loop.

		endwhile;

		?>

  

 </div>

 </div>

 

 



 

</div>

</div>

</section>







<?php get_footer(); ?>