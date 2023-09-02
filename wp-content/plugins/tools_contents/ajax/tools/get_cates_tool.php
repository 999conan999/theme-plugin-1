<?php 

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;

function get_cates(){
    global $wpdb;
    $table_prefix=$wpdb->prefix .'shopseo_terms';
    $sql = $wpdb->prepare( "SELECT id_term,thumnail,title FROM $table_prefix ORDER BY id_term DESC");
    $results = $wpdb->get_results( $sql , OBJECT );
        foreach($results as $x){
            $x->key=$x->id_term;
            $x->value=$x->id_term;
            $x->text=$x->title;
            $x->link=get_category_link($x->id_term);
        }
    send($results);
}

if(is_user_logged_in()){
    get_cates();  
}

 
 
 
 
 
 
 ?>