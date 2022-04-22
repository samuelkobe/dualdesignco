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
    $logo_width  = 240;
    $logo_height = 128;

    $logo_defaults = array(
        'height'               => $logo_height,
        'width'                => $logo_width,
        'unlink-homepage-logo' => false,
    );
    add_theme_support( 'custom-logo', $logo_defaults );
    add_editor_style( 'custom-editor-style.css' );
}

function webokstarter_custom_class_replace( $html ) {
    $html = str_replace('custom-logo', 'flex shrink w-24 lg:w-inherit', $html );
    return $html;
}
add_filter('get_custom_logo', 'webokstarter_custom_class_replace', 10);

 /*------------------------------------*\
  Theme Settings - Added via ACF
\*------------------------------------*/
if ( function_exists('acf_add_options_page') ) {
    acf_add_options_page('Theme Settings');
}

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
		'items_wrap'      => '<ul class="flex flex-col lg:flex-row w-full text-slate-800 lg:w-auto space-y-2 lg:space-y-0 lg:space-x-2">%3$s</ul>', // The items_wrap lets us put Tailwind CSS classes on the menu's <ul> element.
		'depth'           => 0,
        'add_li_class'    => '',
		'walker'          => false
		)
	);
}

/* ####### Footer Navigation ####### */
function footer_nav_one()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'footer-menu-one',
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
		'items_wrap'      => '<ul class="">%3$s</ul>',
		'depth'           => 0,
        'add_li_class'    => '',
		'walker'          => false
		)
	);
}

/* ####### Footer Navigation ####### */
function footer_nav_two()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'footer-menu-two',
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
		'items_wrap'      => '<ul class="">%3$s</ul>',
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
        'footer-menu-one' => __('Footer Menu 1', 'web-ok-starter'), // Footer Navigation
        'footer-menu-two' => __('Footer Menu 2', 'web-ok-starter'), // Footer Navigation
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
