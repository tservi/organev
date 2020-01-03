<?php
/**
* Plugin Name: Organev
* Plugin URI: http://www.t-servi.com/ 
* Description: Ce plugin wordpress permet de créer des evénements
* Version: 0.1 
* Author: Jean Tinguely Awais aka t-servi.com 
* Author URI: http://www.t-servi.com
* License: Ma licence GPL2 
*
*
*/

// starting the session if it is not !

function register_session_if_not_activated_before(){

    if( !session_id() )

        session_start();

}

add_action('init','register_session_if_not_activated_before');



// loading the dashicons 

add_action( 'wp_enqueue_scripts', 'load_dashicons' );

function load_dashicons() {

wp_enqueue_style( 'dashicons' );

} 

// action to perform at activation of the plugin

function organev_setup_post_type() {
    // register the "organev" custom post type
    register_post_type( 'organev', ['public' => 'true'] );
}
add_action( 'init', 'organev_setup_post_type' );
 
function organev_install() {
    // trigger our function that registers the custom post type
    organev_setup_post_type();
 
    // clear the permalinks after the post type has been registered
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'organev_install' );

// action to perform at deactivation of the plugin

function organev_deactivation() {
    // unregister the post type, so the rules are no longer in memory
    unregister_post_type( 'organev' );
    // clear the permalinks to remove our post type's rules from the database
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'organev_deactivation' );

?>
