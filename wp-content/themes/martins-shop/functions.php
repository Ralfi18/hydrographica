<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
 
    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
function my_scripts_method() {
    wp_enqueue_script(
        'custom-script',
        get_stylesheet_directory_uri() . '/js/main.js',
        array( 'jquery' )
    );
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
function youtube_videos_widget() {

	register_sidebar( array(
		'name'          => 'Youtube Videos',
		'id'            => 'youtube_videos',
		'before_widget' => '<div class="youtube-videos">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="youtube-videos-heading">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'youtube_videos_widget' );

function remove_customizer_settings( $wp_customize ){
    $wp_customize->remove_section('accesspress-store-pro');
    $wp_customize->remove_section( 'custom_css');
    $wp_customize->remove_section( 'colors');
}
add_action( 'customize_register', 'remove_customizer_settings', 99);

// Register the toggle shortcode
function toggle_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'title' => 'Click To Open',
		'color' => ''
	), $atts ) );

	return '<h3 class="toggle-trigger"><a href="#">' . esc_html( $title  ) . '</a></h3><div class="toggle_container">' . do_shortcode( wp_kses_post( $content ) ) . '</div>';

}
add_shortcode( 'toggle', 'toggle_shortcode' );

require_once get_theme_root() . '/martins-shop/customizer_api/customizer.php';
