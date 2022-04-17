<?php
    $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
    require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;
    // echo plugin_dir_url(__FILE__);

?>