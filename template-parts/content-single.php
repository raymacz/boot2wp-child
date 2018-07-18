<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Boot_to_WP
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h3 class="entry-title">', '</h3>' );
		else :
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); 
		endif;

		if ( 'post' === get_post_type() || 'teztimonial' === get_post_type() ) : ?>
		<div class="post-details entry-meta">
			<?php //  boot2wp_posted_on(); ?>
				<i class="fa fa-user"></i><a href="#"><?php print ' ';the_author(); ?></a>
				<i class="fa fa-clock-o"></i><time><?php print ' ';the_modified_date(); ?></time>
				<i class="fa fa-folder"></i><?php print ' ';the_category( $separator = ', ', $parents = '', $post_id = false ); ?>
				<i class="fa fa-tags">Tags </i> <?php the_tags('#',', #',''); ?>
				<?php edit_post_link( 'Edit', '<i class="fa fa-pencil"></i>','', null, 'post-edit-link'); ?>
		</div><!-- post-details -->
		<div class="post-comments-badge">
			<a href="<?php comments_link();p ?>"><i class="fa fa-comments"></i><?php comments_number(0, 1, '%'); ?></a>
		</div><!-- post-comments-badge -->
		<?php	endif; ?>
	</header><!-- .entry-header -->
	<?php if (has_post_thumbnail()) {?>
	<div class="post-image">
			<?php //the_post_thumbnail( array( 615, 300)); ?>
			<?php the_post_thumbnail(); ?>
	</div><!-- post-image -->
  <?php } ?>
  <?php   print '<div class="posttypez" >'.get_post_type().'</div>';  ?>
	<div class="post-excerpt entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'boot2wp' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'boot2wp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->
