<?php
add_action("wp_enqueue_scripts", "respond_table_jquery_enqueue", 13);

function respond_table_jquery_enqueue() {
	wp_enqueue_script(
		'respond-table',
		get_stylesheet_directory_uri() . '/libs/mobile-table/mob-tab.js',		
		array( 'jquery' )
	);
}

add_action( 'wp_enqueue_scripts', 'enqueue_table_css' );

if(!function_exists('enqueue_table_css')){
	function enqueue_table_css(){
		wp_enqueue_style( 'respond-table-style', get_stylesheet_directory_uri() . '/libs/mobile-table/mob-tab.css');
	}
}
?>