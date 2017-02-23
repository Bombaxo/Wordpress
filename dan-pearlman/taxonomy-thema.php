<?php
/*
*	Template Name: Taxonomy thema 
*
*	Template for custom taxonomy categories from news - Ajax list
*/

	get_header(); 


	$cat      = get_queried_object(); 
	$cat_slug = $cat->slug;
	$cat_name = $cat->name;
	$cat_desc = $cat->description;

	if (function_exists('z_taxonomy_image')){																	
		$category_image = z_taxonomy_image_url(  $cat->term_id, 'header-article' );

		if( $category_image == '')
			$category_image = get_template_directory_uri( ) . '/img/headers/Work.jpg';
	}

	if(ICL_LANGUAGE_CODE == 'de')
		$static_button = 'Weitere Projekte';
	else if(ICL_LANGUAGE_CODE == 'en')
		$static_button = 'Next Projects';

?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header class="entry-header">
	
				<div class="opacity-filter"></div>

				<img src="<?= $category_image ?>" class="attachment-post-thumbnail wp-post-image" alt="">

				<div class="entry-headline">

					<h1 class="entry-subtitle"> <?= $cat_name ?></h1>
					<p class="section-resume"> <?= $cat_desc ?></p>	

				</div><!--.entry-headline -->
			</header> <!--.entry-header -->

			
			<?php include("inc/taxonomy-news-block.php"); ?>
	

			<div id="list"><!-- AJAX LOAD MORE -->
				<section class="list" data-path="<?php echo get_template_directory_uri(); ?>/ajax-load-more" data-post-type="news" data-lang="<?= ICL_LANGUAGE_CODE ?>" data-category="" data-taxonomy="thema" data-tag="<?= $cat_slug ?>" data-search="" data-display-posts="4" data-scroll="true" data-max-pages="5" data-button-text="<?php _e($static_button, 'framework'); ?>" data-transition="fade">
					
					
				</section>
			</div><!-- /end AJAX LOAD MORE -->
			
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php  get_footer(); ?>
