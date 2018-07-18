<?php
/**
 * The template for displaying archive-reviews pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Boot_to_WP
 */

get_header(); ?>

	<!-- <div id="primary" class="content-area">
		<main id="main" class="site-main"> -->
		 <div id="content_archive" class="site-content">
		  <section class="feature-image feature-image-default-alt" data-type="background" data-speed="3">

			 <?php
			 if ( have_posts() ) :
					 if (!empty(get_the_archive_description())) :
						 the_archive_title( '<h1 class="page-title archives">', '</h1>' );
						 the_archive_description( '<div class="archive-description text-center">', '</div>' );
					 else :
					   the_archive_title( '<h1 class="page-title archives" style="padding-bottom: 90px;"> ', '</h1>' );
					 endif;
			 else :
			 	print '<h1 class="page-title archives" style="padding-bottom: 90px;"> Category </h1>';
			endif
			 ?>
		 </section>
		</div> 
			<section id="primary">
				<div class="container">
				 		<div class="row">
					<!-- MAIN CONTENT
					================================================== -->
					<main id="content" class="col-sm-8" role="main">
								<?php
								if ( have_posts() ) : ?>
									<!-- <header class="page-header"> -->
									<!-- </header><!-- .page-header -->
									<?php
									/* Start the Loop */
									while ( have_posts() ) : the_post();

										/*
										 * Include the Post-Format-specific template for the content.
										 * If you want to override this in a child theme, then include a file
										 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
										 */
										get_template_part( 'template-parts/content', get_post_format() );
										
										
									//	start: display what type of archive 
								/*
											if (is_category() ):
											 printf( __('Category :', 'boot2wp'));
											 single_cat_title();
											elseif (is_tag() ):
											 printf( __('Tag Title:', 'boot2wp'));								
											 single_tag_title();
											elseif (is_post_type_viewable() ):
											 printf( __('Post Title :', 'boot2wp'));								
											 single_post_title();
											elseif (is_term() ):
											 printf( __('Term Title :', 'boot2wp'));								
											 single_term_title();
											elseif (is_date() ):
											 printf( __('Month Title :', 'boot2wp'));								
											 single_month_title();
											elseif (is_day() ):
											  printf( __('Get Date %s:', 'boot2wp'), '<span>'.get_the_date().'</span>' );
											elseif (is_month() ):
											  printf( __('Get Month %s:', 'boot2wp'), '<span>'.get_the_date( _x('F Y','monthly archive date format','boot2wp')).'</span>' );	  
											elseif (is_author() ):
											 printf( __('The Author :', 'boot2wp'));								
											 the_author();
											 printf( __('Get Author %s:', 'boot2wp'), '<span>'.get_the_author().'</span>' );								
											elseif (is_tax('post_format', 'post-format-aside') ):
											 _e( 'Asides', 'boot2wp');	
											else:
											 _e( 'Plain Archives', 'boot2wp'); 
											endif;
									*/
									//	end: display what type of archive 

									endwhile;
									printf( __('The Posts Navigation :', 'boot2wp'));	
									the_posts_navigation();

								else :

									get_template_part( 'template-parts/content', 'none' );

								endif; ?>
					</main> <!-- #main -->
					<?php get_sidebar(); ?>
				</div>	<!-- row -->
	  </div> 		<!-- container -->
</section><!-- #primary -->

<?php
get_footer();
