<?php
/**
 * The template for displaying image attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				// Start the loop.
				while ( have_posts() ) : the_post();
			?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">

						<div class="entry-attachment">
							<?php
								/**
								 * Filter the default Twenty Fifteen image attachment size.
								 *
								 * @since Twenty Fifteen 1.0
								 *
								 * @param string $image_size Image size. Default 'large'.
								 */
								$image_size = apply_filters( 'twentyfifteen_attachment_size', 'large' );

								echo wp_get_attachment_image( get_the_ID(), $image_size );
							?>

							<?php if ( has_excerpt() ) : ?>
								<div class="entry-caption">
									<?php the_excerpt(); ?>
								</div><!-- .entry-caption -->
							<?php endif; ?>

						</div><!-- .entry-attachment -->

						<?php
							the_content();							
						?>
					</div><!-- .entry-content -->			

				</article><!-- #post-## -->

				<?php
				

				// End the loop.
				endwhile;
			?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
