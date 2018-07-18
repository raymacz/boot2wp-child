<?php
/**
 * The template for displaying archive pages
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

									endwhile;

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
