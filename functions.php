<?php

// child functions.php is loaded first before parent, that's why all scripts are called forth from child first.
function boot2wp_enqueue_styles() {
    $parent_style = 'boot2wp-style'; // This is 'boot2wp-style' for the B2W theme.
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), wp_get_theme()->get('Version'));  
	wp_enqueue_style( 'boot2wp-google-fonts', 'https://fonts.googleapis.com/css?family=Raleway:400,700' ); 
}

//load the scripts from parent to child
add_action( 'wp_enqueue_scripts', 'boot2wp_enqueue_styles' );




function my_add_reviews( $query ) {
//	 echo '<pre>'. 'testz ' . var_dump($query) . '</pre>'; 

    if ( !is_admin() && $query->is_main_query()) {
        if ($query->is_home() || $query->is_search() ) {
        $query->set('post_type', array('post', 'review'));
		$query->set('orderby', array('post_date' => 'DESC', 'post_title'=> 'ASC'));
        }
    }
	
  
}

add_action( 'pre_get_posts', 'my_add_reviews' );



/* NOTE:: 07_03-Creating custom loops for custom post types
 * this function displays the template part to index.php
 */
function my_teztimonial() {
 //display sidebar
  if ( is_home() && !is_admin() ) {
	get_template_part( 'template-parts/custom_testimonials', get_post_format() );
  }
  
}


//add_action( 'wp', 'my_teztimonial' ); //loads on topmost of page or before a page is loaded
add_action( 'rbtm_insert_home', 'my_teztimonial' ); // this function displays the template part to index.php
// F:\Raymacz\xampp\htdocs\wp\site2\wp-content\themes\boot2wp-child\index.php

?>
