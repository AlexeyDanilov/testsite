<?php
add_action('wp_enqueue_scripts','style_theme');
add_action('wp_footer','scripts_theme');
add_action('after_setup_theme','theme_register_nav_menu');
add_action( 'widgets_init', 'register_my_widgets' );
add_filter( 'document_title_separator', 'my_sep' );
function my_sep( $sep ){
    $sep='|';

    return $sep;
}
add_filter('the_content','test_content');
function test_content($content){
    $content.='Спасибо!';
    return $content;
}


function register_my_widgets(){
    register_sidebar( array(
        'name'          => 'Left Sidebar',
        'id'            => "left_sidebar",
        'description'   => 'Описание виджета',
        'class'         => '',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => "</div>\n",
        'before_title'  => '<h5 class="widgettitle">',
        'after_title'   => "</h5>\n",
    ) );
}

function theme_register_nav_menu(){
    register_nav_menu('top','меню в шапке');
    register_nav_menu('footer','меню в подвале');
    register_nav_menu('bottom','меню в верху подвала');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails', array('post'));
    add_image_size('post_thumb',1300,500,true);
    // удаляет H2 из шаблона пагинации
    add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
    function my_navigation_template( $template, $class ){
        /*
        Вид базового шаблона:
        <nav class="navigation %1$s" role="navigation">
            <h2 class="screen-reader-text">%2$s</h2>
            <div class="nav-links">%3$s</div>
        </nav>
        */

        return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
    }

// выводим пагинацию
    the_posts_pagination( array(
        'end_size' => 2,
    ) );
}

function style_theme(){
    wp_enqueue_style('style',get_stylesheet_uri());
    wp_enqueue_style('default',get_template_directory_uri().'/assets/css/default.css');
    wp_enqueue_style('layout',get_template_directory_uri().'/assets/css/layout.css');
    wp_enqueue_style('media-queries',get_template_directory_uri().'/assets/css/media-queries.css');
}

function scripts_theme(){
    wp_deregister_script( 'jquery-core' );
    wp_register_script( 'jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script('flexslider',get_template_directory_uri().'/assets/js/jquery.flexslider.js');
    wp_enqueue_script('doubletaptogo',get_template_directory_uri().'/assets/js/doubletaptogo.js');
    wp_enqueue_script('init',get_template_directory_uri().'/assets/js/init.js');
    wp_enqueue_script('jquery-migrate-1.2.1.min',get_template_directory_uri().'/assets/js/jquery-migrate-1.2.1.min.js');
    wp_enqueue_script('modernizr',get_template_directory_uri().'/assets/js/modernizr.js');
}


add_shortcode('my_short','short_function');
function short_function(){
    return 'Я тут!';
}

function Generate_iframe( $atts ) {
    $atts = shortcode_atts( array(
        'href'   => 'http://youtube.com',
        'height' => '550px',
        'width'  => '600px',
    ), $atts );

    return '<iframe src="'. $atts['href'] .'" width="'. $atts['width'] .'" height="'. $atts['height'] .'"> <p>Your Browser does not support Iframes.</p></iframe>';
}
add_shortcode('iframe', 'Generate_iframe');
// использование: [iframe href="http://www.exmaple.com" height="480" width="640"]