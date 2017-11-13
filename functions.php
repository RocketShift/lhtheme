<?php  
	function resources(){
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
		wp_enqueue_style('bootstrap-theme', get_template_directory_uri() . '/css/theme.css');
		wp_enqueue_style('bootstrap-theme-extended', get_template_directory_uri() . '/css/theme-extended.css');
		wp_enqueue_style('lightbox', get_template_directory_uri() . '/css/lightbox.css');
		wp_enqueue_style('style-name', get_stylesheet_uri());
		wp_enqueue_script( 'bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'parallaxie', get_template_directory_uri() . '/js/parallaxie.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'viewportjs', get_template_directory_uri() . '/js/ie10-viewport-bug-workaround.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'lightboxjs', get_template_directory_uri() . '/js/lightbox.js', array('jquery'), '1.0.0', true );
	}

	add_action('wp_enqueue_scripts', 'resources');

	add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

	function special_nav_class ($classes, $item) {
		if( $item->menu_item_parent == 0 && 
		    in_array( 'current-menu-item', $classes ) ||
		    in_array( 'current-menu-ancestor', $classes ) ||
		    in_array( 'current-menu-parent', $classes ) ||
		    in_array( 'current_page_parent', $classes ) ||
		    in_array( 'current_page_ancestor', $classes )
		    ) {

	    	$classes[] = "active";
	 	 }

	  	return $classes;
	}

	function setup(){
			//Navigation Menus
		register_nav_menus(array(
			'primary' => __('Primary Menu')
		));
			//Add featured image support
		add_theme_support('post-thumbnails');
		add_theme_support('post-formats', array('aside', 'gallery', 'link'));
	}
	add_action('after_setup_theme', 'setup');

	function homes_cpt() {
		register_post_type( 'homes', array(
		  'labels' => array(
		    'name' => 'Homes',
		    'singular_name' => 'Home',
		   ),
		  'description' => 'Homes Custom Post Type',
		  'public' => true,
		  'publicly_queryable' => true,
		  'menu_position' => 20,
		  'supports' => array( 'title', 'editor', 'custom-fields', 'author', 'thumbnail', 'excerpt' ),
		  'taxonomies' => array('category')
		));
	}
	add_action( 'init', 'homes_cpt' );


	function officer_cpt() {
		register_post_type( 'officer', array(
		  'labels' => array(
		    'name' => 'Officers',
		    'singular_name' => 'Officer',
		   ),
		  'description' => 'Officer Custom Post Type',
		  'public' => true,
		  'publicly_queryable' => true,
		  'menu_position' => 20,
		  'supports' => array( 'title', 'editor', 'custom-fields', 'author', 'thumbnail', 'excerpt' ),
		  'taxonomies' => array('category')
		));
	}
	add_action( 'init', 'officer_cpt' );
?>