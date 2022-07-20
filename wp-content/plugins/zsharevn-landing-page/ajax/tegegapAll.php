<?php 

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;
if (!function_exists('is_plugin_active')) {
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
   }

// get all page
function get_all_page(){
    global $wpdb;
    $table_prefix=$wpdb->prefix .'posts';
    $sql = $wpdb->prepare( "SELECT ID,post_title FROM $table_prefix WHERE post_type ='page' OR post_type ='zshare' AND post_status <> 'trash' AND post_status='publish' AND post_status <> 'auto-draft' ORDER BY post_date DESC ");
    $results = $wpdb->get_results( $sql , OBJECT );
    foreach($results as $x){
        $id=$x->ID;
        $x->url=get_permalink($id);
        $x->title=$x->post_title;
        $x->key=$x->post_title;
        $x->text=$x->post_title;
        $x->value=$x->post_title;
    }
    return($results);
}

if(is_plugin_active('zsharevn-landing-page/index.php')){

    if(is_user_logged_in()==false){
        $id_user=get_current_user_id();
        $user = wp_get_current_user();
        $permisstion_type="administrator";
        if($permisstion_type=="administrator"||$permisstion_type=="editor"||$permisstion_type=="author"||$permisstion_type=="contributor"){
            send(get_all_page());
        }else{
            send(array());
        }
    }else{
        send(array());
    }
}
 
 
 
 ?>