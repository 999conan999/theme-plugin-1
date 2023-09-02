<?php 
    $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
    require_once( $parse_uri[0] . 'wp-load.php' );
    function get_tags_name(){
        global $wpdb;
        $table_prefix = $wpdb->prefix . 'shopseo_imgs';
        $sql = "SELECT DISTINCT tag FROM $table_prefix";
        $results = $wpdb->get_results($sql, OBJECT);
        foreach($results as $x){
            $x->key=$x->tag;
            $x->value=$x->tag;
            $x->text=$x->tag;
        }
        send($results);
    }

    if(is_user_logged_in()){
        get_tags_name();
    }