<?php
/**
 * Plugin Name:     Simple Wp Mods
 * Plugin URI:      https://github.com/johnakos/simple-wp-mods
 * Description:     Simple WordPress plugin to set/remove/add settings/hooks, no UI for developers
 * Author:          John Kaziridis
 * Author URI:      https://github.com/johnakos/simple-wp-mods
 * Text Domain:     swpm
 * Version:         1.0.0
 *
 * @package         swpm
 */

/**
 * Disable XML RPC for security.
 * 
 * @link  https://developer.wordpress.org/reference/hooks/xmlrpc_enabled/
 * @since 1.0.0
 */
add_filter( 'xmlrpc_enabled', '__return_false' );

/**
 * Remove WordPress version from head
 * 
 * @link  https://developer.wordpress.org/reference/functions/wp_generator/
 * @since 1.0.0
 */
remove_action( 'wp_head', 'wp_generator' );

/**
 * Remove shortlink from head
 * 
 * @link  https://developer.wordpress.org/reference/functions/wp_shortlink_wp_head/
 * @since 1.0.0
 */
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );

/**
 * Remove shortlink Link: header from HTTP requests
 * 
 * @link  https://developer.wordpress.org/reference/functions/wp_shortlink_header/
 * @since 1.0.0
 */
remove_action( 'template_redirect', 'wp_shortlink_header', 11 );

/**
 * Remove RSD (Really Simple Discovery) link from head
 * 
 * @link  https://developer.wordpress.org/reference/functions/rsd_link/
 * @since 1.0.0
 */
remove_action( 'wp_head', 'rsd_link' );

/**
 * Remove RSS feed links from head
 * 
 * @link  https://developer.wordpress.org/reference/functions/feed_links/
 * @since 1.0.0
 */
remove_action( 'wp_head', 'feed_links', 2 );

/**
 * Remove all extra RSS feed links from head
 * 
 * @link  https://developer.wordpress.org/reference/functions/feed_links_extra/
 * @since 1.0.0
 */
remove_action( 'wp_head', 'feed_links_extra', 3 );

/**
 * Remove comments feed
 * 
 * @link  https://developer.wordpress.org/reference/hooks/feed_links_show_comments_feed/
 * @since 1.0.0
 */
add_filter( 'feed_links_show_comments_feed', '__return_false' );

/**
 * Redirect all feeds to home page.
 *
 * @since 1.0.0
 */
function swpm_disable_feeds() {
    return wp_safe_redirect( site_url() );
    exit;
}

/**
 * Redirect all feeds to home url
 * 
 * @link  https://developer.wordpress.org/reference/hooks/do_feed_feed/
 * @since 1.0.0
 */
add_action( 'do_feed',      'swpm_disable_feeds', 1 );
add_action( 'do_feed_rdf',  'swpm_disable_feeds', 1 );
add_action( 'do_feed_rss',  'swpm_disable_feeds', 1 );
add_action( 'do_feed_rss2', 'swpm_disable_feeds', 1 );
add_action( 'do_feed_atom', 'swpm_disable_feeds', 1 );

// Redirect comment feeds.
add_action( 'do_feed_rss2_comments', 'swpm_disable_feeds', 1 );
add_action( 'do_feed_atom_comments', 'swpm_disable_feeds', 1 );

/**
 * Remove Windows Live Writer manifest (wlwmanifest.xml) file link from head
 * 
 * @link  https://developer.wordpress.org/reference/functions/wlwmanifest_link/
 * @since 1.0.0
 */
remove_action( 'wp_head', 'wlwmanifest_link' );

/**
 * Remove prefetch for s.w.org from head
 * 
 * @link  https://developer.wordpress.org/reference/functions/wp_resource_hints/
 * @since 1.0.0
 */
remove_action( 'wp_head', 'wp_resource_hints', 2 );

/**
 * Remove relational links for posts.
 * 
 * @link  https://developer.wordpress.org/reference/functions/adjacent_posts_rel_link_wp_head/
 * @since 1.0.0
 */
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

/**
 * Remove REST API URL output from head.
 * 
 * @link  https://developer.wordpress.org/reference/functions/rest_output_link_wp_head/
 * @since 1.0.0
 */
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );

/**
 * Remove REST API URL from WP RSD endpoint
 * 
 * @link  https://developer.wordpress.org/reference/functions/rest_output_rsd/
 * @since 1.0.0
 */
remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );

/**
 * Remove REST API URL Link: header from HTTP requests
 * 
 * @link  https://developer.wordpress.org/reference/functions/rest_output_link_header/
 * @since 1.0.0
 */
remove_action( 'template_redirect', 'rest_output_link_header', 11 );

/**
 * Remove script link tag for emoji from head
 * 
 * @link  https://developer.wordpress.org/reference/functions/print_emoji_detection_script/
 * @since 1.0.0
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

/**
 * Remove script link tag for emoji from head in admin area
 * 
 * @link  https://developer.wordpress.org/reference/functions/print_emoji_detection_script/
 * @since 1.0.0
 */
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );

/**
 * Remove style link tag for emoji from head
 * 
 * @link  https://developer.wordpress.org/reference/functions/print_emoji_styles/
 * @since 1.0.0
 */
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/**
 * Remove style link tag for emoji from head in admin area
 * 
 * @link  https://developer.wordpress.org/reference/functions/print_emoji_styles/
 * @since 1.0.0
 */
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * Remove emoji from comments & feed
 * 
 * @link  https://developer.wordpress.org/reference/functions/wp_staticize_emoji/
 * @since 1.0.0
 */
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

/**
 * Remove emojis URL
 * 
 * @link  https://developer.wordpress.org/reference/hooks/emoji_svg_url/
 * @since 1.0.0
 */
add_filter( 'emoji_svg_url', '__return_false' );

/**
 * Remove emoji for emails
 *
 * @link  https://developer.wordpress.org/reference/functions/wp_staticize_emoji_for_email/
 * @since 1.0.0 
 */
// remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

/**
 * Remove oEmbeds
 * 
 * @link  https://developer.wordpress.org/reference/functions/wp_oembed_add_discovery_links/
 * @link  https://developer.wordpress.org/reference/functions/wp_oembed_add_host_js/
 * @since 1.0.0
 */
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );

/**
 * Remove default galllery css
 * 
 * @link  https://developer.wordpress.org/reference/hooks/use_default_gallery_style/
 * @since 1.0.0
 */
add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * Remove Gutenberg's front-end block styles.
 *
 * @since 1.0.0
 */
function swpm_disable_gutenberg_style_block() {
    wp_deregister_style( 'wp-block-library' );
}

add_action( 'wp_enqueue_scripts', 'swpm_disable_gutenberg_style_block' );

/**
 * Disable X-Pingback header from HTTP requests
 *
 * @param  array $headers
 * @return array
 * 
 * @since  1.0.0
 */
function swpm_disable_x_pingback( $headers ) {
    unset( $headers['X-Pingback'] );

	return $headers;
}

add_filter( 'wp_headers', 'swpm_disable_x_pingback' );

/**
 * Disable default users API endpoints for security.
 *
 * @param  array $endpoints
 * @return array
 * 
 * @link   https://developer.wordpress.org/reference/hooks/rest_endpoints/
 * @link   https://www.wp-tweaks.com/hackers-can-find-your-wordpress-username/
 * @since  1.0.0
 */
function swpm_disable_users_rest_endpoints( $endpoints ) {
    if ( !is_user_logged_in() ) {
        if ( isset( $endpoints['/wp/v2/users'] ) ) {
            unset( $endpoints['/wp/v2/users'] );
        }

        if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
            unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
        }
    }

    return $endpoints;
}

add_filter( 'rest_endpoints', 'swpm_disable_users_rest_endpoints' );

/**
 * Update login page image link
 *
 * @link  https://developer.wordpress.org/reference/hooks/login_headerurl/
 * @since 1.0.0
 */
function swpm_login_url() {
    return home_url();
}

add_filter( 'login_headerurl', 'swpm_login_url' );

/**
 * Remove contributor & subscriber roles.
 *
 * @link  https://developer.wordpress.org/reference/hooks/init/
 * @since 1.0.0
 */
function swpm_remove_roles() {
    remove_role( 'contributor' );
    remove_role( 'subscriber' );
}

add_action( 'init', 'swpm_remove_roles' );

/**
 * Set the number of revisions to keep in the database
 *
 * @param  int $num
 * @return int
 * 
 * @link   https://wordpress.org/support/article/revisions/#revision-options
 * @link   https://developer.wordpress.org/reference/hooks/wp_revisions_to_keep/
 * @since  1.0.0
 */
function swpm_set_revisions_number( $num ) {
    return $num = 3;
}

add_filter( 'wp_revisions_to_keep', 'swpm_set_revisions_number', 10 );