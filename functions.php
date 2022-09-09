<?php
/*
 *  Author: Samuel Kobe | @samuelkobe
 *  URL: webok.ca/web-ok-starter_2022 | @web-ok-starter
 */

 /*------------------------------------*\
  Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 1920;
}

if (function_exists('add_theme_support')) {

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_theme_support( 'title-tag' );
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    // add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Localisation Support
    load_theme_textdomain('web-ok-starter', get_template_directory() . '/languages');

    // Custom logo support
    $logo_width  = 702;
    $logo_height = 119;

    $logo_defaults = array(
        'height'               => $logo_height,
        'width'                => $logo_width,
        'unlink-homepage-logo' => false,
    );
    add_theme_support( 'custom-logo', $logo_defaults );
    add_editor_style( 'custom-editor-style.css' );
}

function webokstarter_custom_class_replace( $html ) {
    $html = str_replace('custom-logo', 'flex shrink w-full', $html );
    return $html;
}
add_filter('get_custom_logo', 'webokstarter_custom_class_replace', 10);


 /*------------------------------------*\
  Theme Settings - Dynamic Styles required
\*------------------------------------*/
    // fill-white fill-black - for svg fill
    // mb-[0px] mb-[16px] mb-[32px] mb-[48px] mb-[64px] mb-[80px] - margin bottom for hero block
    // rounded-none rounded rouned-2xl rounded-full - image rounded for side by side block

 /*------------------------------------*\
  Theme Settings - Editor Styles
\*------------------------------------*/
function legit_block_editor_styles() {
    wp_enqueue_style('editor-styles', get_theme_file_uri( 'src/styles/admin/style-editor.css' ), false, '1.0.0', 'all' );
    wp_enqueue_style('web-ok-starter-styles', get_theme_file_uri( '/style.css' ), false, '1.0.0', 'all');
} 
add_action( 'enqueue_block_editor_assets', 'legit_block_editor_styles' );

 /*------------------------------------*\
  Theme Settings - Added via ACF
\*------------------------------------*/
if ( function_exists('acf_add_options_page') ) {
    acf_add_options_page('Theme Settings');
}

 /*------------------------------------*\
  Block Registry - Added via ACF
\*------------------------------------*/
add_action( 'acf/init', 'register_hero_block' );
function register_hero_block() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( array(
			'name' 					=> 'Hero',
			'title' 				=> __( 'Hero' ),
			'description' 			=> __( 'Hero block.' ),
			'category' 				=> 'formatting',
			'icon'					=> 'layout',
			'keywords'				=> array( 'hero', 'header', 'banner' ),
			'post_types'			=> array( 'post', 'page' ),
			'mode'					=> 'auto',
			'align'				=> 'wide',
			'render_template'		=> 'parts/blocks/hero.php',
			// 'render_callback'	=> 'example_block_render_callback',
			// 'enqueue_style' 		=> get_template_directory_uri() . '/template-parts/blocks/example/example.css',
			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',
			// 'enqueue_assets' 	=> 'example_block_enqueue_assets',
		));
	}
}

add_action( 'acf/init', 'register_cta_block' );
function register_cta_block() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( array(
			'name' 					=> 'Call to action',
			'title' 				=> __( 'Call to action' ),
			'description' 			=> __( 'Call to action block.' ),
			'category' 				=> 'formatting',
			'icon'					=> 'layout',
			'keywords'				=> array( 'call to action' ),
			'post_types'			=> array( 'post', 'page' ),
			'mode'					=> 'auto',
			'align'				=> 'wide',
			'render_template'		=> 'parts/blocks/cta.php',
		));
	}
}

add_action( 'acf/init', 'register_side_by_side_block' );
function register_side_by_side_block() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( array(
			'name' 					=> 'Side by Side',
			'title' 				=> __( 'Side by Side' ),
			'description' 			=> __( 'Side by Side block.' ),
			'category' 				=> 'formatting',
			'icon'					=> 'layout',
			'keywords'				=> array( 'side by side', '50/50', 'image and text', 'image', 'text', 'content' ),
			'post_types'			=> array( 'post', 'page' ),
			'mode'					=> 'auto',
			'align'				=> 'wide',
			'render_template'		=> 'parts/blocks/side-by-side.php',
		));
	}
}

add_action( 'acf/init', 'register_feature_image_block' );
function register_feature_image_block() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( array(
			'name' 					=> 'Feature image',
			'title' 				=> __( 'Feature image' ),
			'description' 			=> __( 'Feature image block.' ),
			'category' 				=> 'formatting',
			'icon'					=> 'layout',
			'keywords'				=> array( 'Feature image', 'image and text', 'image', 'text', 'content' ),
			'post_types'			=> array( 'post', 'page' ),
			'mode'					=> 'auto',
			'align'				=> 'wide',
			'render_template'		=> 'parts/blocks/feature-image.php',
		));
	}
}

add_action( 'acf/init', 'register_paired_images_block' );
function register_paired_images_block() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( array(
			'name' 					=> 'Paired images',
			'title' 				=> __( 'Paired images' ),
			'description' 			=> __( 'Paired images block.' ),
			'category' 				=> 'formatting',
			'icon'					=> 'layout',
			'keywords'				=> array( 'Paired images', 'images and text', 'images', 'text', 'content', 'paired' ),
			'post_types'			=> array( 'post', 'page' ),
			'mode'					=> 'auto',
			'align'				=> 'wide',
			'render_template'		=> 'parts/blocks/paired-images.php',
		));
	}
}

add_action( 'acf/init', 'register_steps_block' );
function register_steps_block() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( array(
			'name' 					=> 'Steps',
			'title' 				=> __( 'Steps' ),
			'description' 			=> __( 'Steps block.' ),
			'category' 				=> 'formatting',
			'icon'					=> 'layout',
			'keywords'				=> array( 'steps', 'icon and text', 'icon', 'image', 'text', 'content' ),
			'post_types'			=> array( 'post', 'page' ),
			'mode'					=> 'auto',
			'align'				=> 'wide',
			'render_template'		=> 'parts/blocks/steps.php',
		));
	}
}

add_action( 'acf/init', 'register_faqs_block' );
function register_faqs_block() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( array(
			'name' 					=> 'FAQs',
			'title' 				=> __( 'FAQs' ),
			'description' 			=> __( 'FAQs block.' ),
			'category' 				=> 'formatting',
			'icon'					=> 'layout',
			'keywords'				=> array( 'FAQ', 'FAQs', 'content' ),
			'post_types'			=> array( 'post', 'page' ),
			'mode'					=> 'auto',
			'align'				=> 'wide',
			'render_template'		=> 'parts/blocks/faqs.php',
		));
	}
}

add_action( 'acf/init', 'register_package_block' );
function register_package_block() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( array(
			'name' 					=> 'Package',
			'title' 				=> __( 'Package' ),
			'description' 			=> __( 'Package block.' ),
			'category' 				=> 'formatting',
			'icon'					=> 'layout',
			'keywords'				=> array( 'package', 'product', 'item' ),
			'post_types'			=> array( 'post', 'page' ),
			'mode'					=> 'auto',
			'align'				=> 'wide',
			'render_template'		=> 'parts/blocks/package.php',
		));
	}
}

// BLOCK REGISTRY ENDS

 /*------------------------------------*\
  Fucntions  
\*------------------------------------*/
/* ####### Load scripts (header.php) ####### */
function header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        wp_register_script('webokscripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0'); // Custom scripts
        wp_enqueue_script('webokscripts'); // Enqueue
    }
}

/* ####### Load scripts (footer.php) ####### */
function footer_scripts()
{
    wp_register_script('vue-settings', get_template_directory_uri() . '/js/vue-data.js', array(), '1.0.0'); // Custom scripts
    wp_enqueue_script('vue-settings'); // Enqueue

    wp_register_script('faqs', get_template_directory_uri() . '/js/faqs.js', array(), '1.0.0'); // Custom scripts
    wp_enqueue_script('faqs'); // Enqueue
}

/* ####### Load styles ####### */
function styles_sheet()
{
    wp_register_style('web-ok-starter-styles', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
    wp_enqueue_style('web-ok-starter-styles'); // Enqueue
}

/* ####### Main Navigation ####### */
function webokstarter_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => false,
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="flex flex-col lg:flex-row relative w-full h-auto pt-16 pb-6 lg:pt-0 lg:pb-0 lg:items-center lg:justify-end text-white font-title text-3xl lg:text-base xl:text-lg tracking-wider capitalize lg:w-auto space-y-2 lg:space-y-0 lg:space-x-2">%3$s</ul>', // The items_wrap lets us put Tailwind CSS classes on the menu's <ul> element.
		'depth'           => 0,
        'add_li_class'    => '',
		'walker'          => false
		)
	);
}

/* ####### Footer Navigation ####### */
function footer_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'footer-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => false,
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="text-base xl:leading-8">%3$s</ul>',
		'depth'           => 0,
        'add_li_class'    => '',
		'walker'          => false
		)
	);
}

/* ####### Register Navigation Options ####### */
function register_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'web-ok-starter'), // Header/Main Navigation
        'footer-menu' => __('Footer Menu', 'web-ok-starter'), // Footer Navigation
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// widgets
// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// restrict searchs to only posts
function SearchFilter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts','SearchFilter');

/**
 * Halt the main query in the case of an empty search 
 */
add_filter( 'posts_search', function( $search, \WP_Query $q )
{
    if( ! is_admin() && empty( $search ) && $q->is_search() && $q->is_main_query() )
        $search .=" AND 0=1 ";

    return $search;
}, 10, 2 );

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function webokstarter_wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function webokstarter_wp_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function webokstarter_wp_gravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

/*------------------------------------*\
	Web Ok - Navigation alterations
\*------------------------------------*/

// Remove and add custom navigation classes - Web Ok
function add_link_atts($atts, $item) {
  $atts['class'] = "menu-anchor"; // styles for anchors in menu.
  $atts['data-title'] = $item->title; // gives menu <a> a data attribute for the title of the page
  return $atts;
}

function clear_nav_menu_item_id($id, $item, $args) {
    return ""; //clears <li> IDs from menu
}

function clear_nav_menu_item_class($classes, $item, $args) {
  if (in_array('current-menu-item', $classes) ){
    return array('active last:lg:pr-4'); //adds classes the active <li> on the menu
  } else {
    return array('last:lg:pr-4'); // adds classes to all the other menu <li>
  }
}

/*------------------------------------*\
	Custom Services Post Type
\*------------------------------------*/
// NO CUSTOM POST TYPES CURRENTLY

/*------------------------------------*\
	Web Ok - Remove Comments completely
\*------------------------------------*/
// Removes from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function webokstarter_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}

/*------------------------------------*\
	URLs formatted with hyphens(-)
\*------------------------------------*/
// function formatUrl($str, $sep='-')
// {
//         $res = strtolower($str);
//         $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
//         $res = preg_replace('/[[:space:]]+/', $sep, $res);
//         return trim($res, $sep);
// }

/*------------------------------------*\
	Web Ok - User restrictions - Requires Plugin 'members'
\*------------------------------------*/

// if (is_admin() && current_user_can('director')) {

//     function remove_menu () {
//         remove_menu_page('edit.php');

//     }

//     function hideUnncessaryMenuItems () {
//         global $menu;
//         $itemsToHIDE = array(
//             ('Tools'),
//             ('Users'),
//             ('Plugins'),
//             ('Gutenberg'),
//             ('Contact'),
//             );
//         end ($menu);
//         while (prev($menu)){
//             $value = explode(
//                     ' ',
//                     $menu[key($menu)][0]);
//             if(in_array($value[0] != NULL?$value[0]:"" , $itemsToHIDE)){
//                 unset($menu[key($menu)]);
//             }
//         }
//     }

//     add_action('admin_menu', 'remove_menu');
//     add_action('admin_menu', 'hideUnncessaryMenuItems');
// }

/* ####### Actions + Filters + ShortCodes ####### */

// Add Actions
add_action('init', 'header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_footer', 'footer_scripts'); // Add custom scripts to wp_footer
add_action('wp_enqueue_scripts', 'styles_sheet'); // Add Theme Stylesheet
add_action('init', 'register_menu'); // Add Menus
add_action('init', 'webokstarter_wp_pagination'); // Add the Pagination

// Remove Actions
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.

// Add Filters
add_filter('avatar_defaults', 'webokstarter_wp_gravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'webokstarter_wp_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Web Ok filters
add_filter('nav_menu_link_attributes', 'add_link_atts', 10, 2); // add attr to menu anchors - Web Ok
add_filter('nav_menu_item_id', 'clear_nav_menu_item_id', 10, 3); // Remove id attr on menu items - Web Ok
add_filter('nav_menu_css_class', 'clear_nav_menu_item_class', 10, 3); // Remove class attr on menu items - Web Ok
add_action( 'wp_before_admin_bar_render', 'webokstarter_admin_bar_render' );

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

?>
