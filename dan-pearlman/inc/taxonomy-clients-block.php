<?php
/*
*	Template Name: Taxonomy block html 
*
*	Template for reuse the filters block in code
*/
?>

<section class="taxonomy">
				
	<div class="tags-list">
	
		<span>Filters <b>+</b></span>

		<div class="tags-toggle">

			<ul class="wp-tag-cloud">
				
				<?php

					$argv   					=   array( 'child_of' => 90);	                  
	                $custom_order  				=   isset($_GET['_order'])  ?   $_GET['_order'] :   '';
	       
	                $argv['orderby']            =   'name';
	                $argv['order']              =   'ASC';
	                $argv['ignore_custom_sort'] =   TRUE;
	              
	                $children = get_categories($argv);

					foreach ($children as $child) {

					    $child = get_category( $child ); 					    					  

						if (function_exists('z_taxonomy_image')){																						
							$category_image = z_taxonomy_image_url(  $child->term_id, 'list-smaller' );
							$img_html       = '<img src="' . $category_image . '" alt="" />';
							$img_html       = apply_filters( 'bj_lazy_load_html', $img_html );
						}   
				?>

				<li>
					<a class="tag-link-648" style="font-size: 10pt;" title="<?= $child->cat_name ?>" href="<?= get_category_link( $child->term_id ) ?>"><?= $child->cat_name ?></a>
				</li>

			<?php			
				}
			?>

			</ul>
		</div>
	</div>

	<?php 
			// Instead of using wp we build it manually, taking in count if translation needs to be call
		$id_categories = lang_object_ids(array( 102, 103, 90, 605), 'category');  
		$links_categ   = '';

			// Handle the base url depending of the language
		if(ICL_LANGUAGE_CODE == 'de'){
			$basepath  = site_url();
		}else if(ICL_LANGUAGE_CODE == 'en'){
			$basepath  = site_url() . "/en";
		}
		
		foreach ($id_categories as $categ) {							
			$catobject    = get_category( $categ );
			$links_categ .= '<a title="" class="tag-link-' . $catobject->term_taxonomy_id . '" href="' . $basepath . '/category/' . $catobject->slug . '/">' . $catobject->name . '</a>'; 
		}
	?>

	<div class="categories">
		<span>Sort by <i>:</i> <b>+</b></span>
		<div class="categories-toggle">					
			<?=  $links_categ ?>
		</div>
	</div>

</section><!--.taxonomy -->	

<script>

	(function($) {
		$(document).ready(function(){ 									// After ready bind this events
			$('div.tags-list span').click(function(){					// Show or hide filter tags when clicked

				if ( $('div.tags-toggle').css('display') == 'block' ){				
					$('div.tags-list span b').text('+');
					$('div.tags-toggle').slideToggle();
				}else{
					$('div.tags-list span b').text('-');
					$('div.tags-toggle').slideToggle();
				}
		
			});

			$('div.categories span').click(function(){					// Show or hide filter categories after size of window < 602

				if ($(window).width( ) <= 602) {
					if ( $('div.categories-toggle').css('display') == 'block' ){				
						$('div.categories span b').text('+');
						$('div.categories-toggle').slideToggle();
					}else{
						$('div.categories span b').text('-');
						$('div.categories-toggle').slideToggle();
					}
				}
		
			});
		});
	})(jQuery);

</script>