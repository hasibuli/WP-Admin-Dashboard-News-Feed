<?php
/*
  Plugin Name: WP Admin Dashboard News Feed
  Plugin URI: http://www.e2soft.com/blog/wp-admin_dashboard_news_feed/
  Description: WP Admin Dashboard News Feed is a wordpress custom admin dashboard news feed plugin.
  Version: 1.0
  Author: S M Hasibul Islam
  Author URI: http://www.e2soft.com
  Copyright: 2015 S M Hasibul Islam http:/`/www.e2soft.com
  License URI: license.txt
 */
 
#######################   WP Admin Dashboard News Feed ###############################
 
function esoft_admin_dashboard_news_feed() {
     global $wp_meta_boxes;
     unset(
          $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'],
          $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'],
          $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']
     );
	 $adnf_feed_title = get_option('adnf_feed_title'); 
     wp_add_dashboard_widget( 'dashboard_custom_feed', $adnf_feed_title , 'esoft_dashboard_custom_feed_output' );
}
 
function esoft_dashboard_custom_feed_output() {
     echo '<div class="rss-widget">';
	 $adnf_feed_title = get_option('adnf_feed_title'); 
	 $adnf_feed_link = get_option('adnf_feed_link'); 
	 $adnf_show_count = get_option('adnf_show_count'); 
	 $adnf_show_summery = get_option('adnf_show_summery');
	 $adnf_show_author = get_option('adnf_show_author');
	 $adnf_show_date = get_option('adnf_show_date');
	
     wp_widget_rss_output(array(
          'url' => $adnf_feed_link,
          'title' => $adnf_feed_title,
          'items' => $adnf_show_count,
          'show_summary' => $adnf_show_summery,
          'show_author' => $adnf_show_author,
          'show_date' => $adnf_show_date
     ));
     echo '</div>';
}
add_action('wp_dashboard_setup', 'esoft_admin_dashboard_news_feed');

foreach ( glob( plugin_dir_path( __FILE__ )."lib/*.php" ) as $php_file )
    include_once $php_file;

register_activation_hook(__FILE__, 'adnf_plugin_activate');
add_action('admin_init', 'adnf_plugin_redirect');

function adnf_plugin_activate() {
    add_option('adnf_plugin_do_activation_redirect', true);
}

function adnf_plugin_redirect() {
    if (get_option('adnf_plugin_do_activation_redirect', false)) {
        delete_option('adnf_plugin_do_activation_redirect');
        if(!isset($_GET['activate-multi']))
        {
            wp_redirect("options-general.php?page=adnf-dashboard-feed");
        }
    }
}