<?php 

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;

function get_posts_sp_main($id){
    global $wpdb;
    $table_prefix=$wpdb->prefix .'shopseo_posts';
         $sql = $wpdb->prepare( "SELECT id_post,thumnail,title,price,json_data FROM $table_prefix WHERE id_category = %d AND post_status = 'publish' AND post_type = 'sp_main' ORDER BY id DESC ",$id);
    $results = $wpdb->get_results( $sql , OBJECT );
        foreach($results as $x){
            $x->id=get_permalink($x->id_post);
            $x->json_data=json_decode($x->json_data);
            $x->json_data->price=$x->price;
        }
    send($results);
}

// if(is_user_logged_in()){
    $id=$_GET['id'];
    get_posts_sp_main($id);  
// }

 
 
 
 
 
 
 ?>