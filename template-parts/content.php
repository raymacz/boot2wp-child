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

		//if ( 'post' === get_post_type() ) : ?>
		<div class="post-details entry-meta">
			<?php //  boot2wp_posted_on(); ?>
				<span>Posted: </span>
				<i class="fa fa-user"></i><a href="#"><?php print ' ';the_author(); ?></a>
				<i class="fa fa-clock-o"></i><time><?php print ' ';the_modified_date(); ?></time>
				<i class="fa fa-folder"></i><?php print ' ';the_category( $separator = ', ', $parents = '', $post_id = false ); ?>
				<i class="fa fa-tags">Tags </i> <?php the_tags('#',', #',''); ?>
				<?php edit_post_link( 'Edit', '<i class="fa fa-pencil"></i>','', null, 'post-edit-link'); ?>
		</div><!-- post-details -->

		<div class="post-comments-badge">
			<a href="<?php comments_link();p ?>"><i class="fa fa-comments"></i><?php comments_number(0, 1, '%'); ?></a>
		</div><!-- post-comments-badge -->
		<?php//	endif; ?>
	</header><!-- .entry-header -->
	<?php if (has_post_thumbnail()) {?>
	<div class="post-image">
			<?php //the_post_thumbnail( array( 615, 300)); ?>
			<?php the_post_thumbnail(); ?>
	</div><!-- post-image -->
  <?php } ?>
    <?php
	if ( 'post'===get_post_type() ) {
	print '<div class="posttypez" > Blog </div>';  
	} else {
	print '<div class="posttypez" >'.get_post_type().'</div>';  
	} ;
	?>
	<div class="post-excerpt">
		<?php the_excerpt(); ?>
			<!-- <pre>			<?php				//	echo var_dump($post_categories);			?>		</pre> -->
	</div><!-- post-excerpt -->

	<!-- <footer class="entry-footer">		<?php // boot2wp_entry_footer(); ?>	</footer> .entry-footer -->
</article><!-- #post-<?php// the_ID(); ?> -->
