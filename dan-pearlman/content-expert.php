<?php
/**
 * The template for displaying detail page of news
 *
 */

	if (ICL_LANGUAGE_CODE == 'de') {
	 	$placeholder = 'Ihre E-Mail-Adresse';
	} elseif (ICL_LANGUAGE_CODE == 'en') {
	 	$placeholder = 'Your e-mail address';
	}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-project'); ?>> 

	<?php
		$featured_image = get_extra_images();
	?>

	<header class="entry-header">
	
		<div class="opacity-filter"></div>

		<img alt="Lufthansa_01" class="attachment-post-thumbnail wp-post-image" src="<?= $featured_image[0] ?>" />

		<div class="entry-headline">
			<?php
				the_title( '<h1 class="entry-subtitle">', '</h1>' );				
			?>
			<h1 class="entry-title">EXPERT</h1>
		</div><!--.entry-headline -->
	</header> <!--.entry-header -->

	<div class="head-overview"></div>
	
	<div class="entry-overview">

		<div class="entry-news">

			<h3 class="block-title">&nbsp;</h3>

			<?php

				the_subtitle( '<h1 class="entry-news-title">', '</h1>' );
			
				the_content( );
				
					// Get slideshow shortcode
				$slideshowcode = get_post_meta($post->ID, 'DP_SLIDE_CODE', true);

					// If not empty call shortcode to display it
				if( $slideshowcode != '' ){ 					
			        print do_shortcode(  $slideshowcode );
			    }
			?>

			<div class="entry-share">

				<h3 class="block-title">Share</h3>

				<?php echo do_shortcode(  "[shariff]" ); ?>	

			</div><!-- .entry-share -->

		</div><!-- .entry-news -->

		<div class="entry-related">		

			<?php joints_related_posts( 'Related News', 'expert', 'title', 4 ); ?>

		</div><!-- .entry-related -->
	</div><!-- .entry-overview -->

</article><!-- #post-## -->



