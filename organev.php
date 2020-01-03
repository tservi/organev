<?php
/**
* Plugin Name: Organev
* Plugin URI: http://mon-blog.fr/plugins/ 
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


?>
