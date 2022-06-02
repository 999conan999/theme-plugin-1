<?php 

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;
if (!function_exists('is_plugin_active')) {
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
   }

// get all page
function get_all_page($quantity,$offset){
    global $wpdb;
    $table_prefix=$wpdb->prefix .'posts';
    $sql = $wpdb->prepare( "SELECT ID,post_title,post_status FROM $table_prefix WHERE post_type ='zshare' AND post_status <> 'trash' AND post_status <> 'auto-draft' ORDER BY post_date DESC LIMIT %d OFFSET %d ",$quantity,$offset);
    $results = $wpdb->get_results( $sql , OBJECT );
    foreach($results as $x){
        $id=$x->ID;
        $x->post_url=get_permalink($id);
    }
    return($results);
}
if(is_plugin_active('zsharevn-landing-page/index.php')){

    if(is_user_logged_in()){
        $id_user=get_current_user_id();
        $user = wp_get_current_user();
        $permisstion_type=$user->roles[0];
        $quantity=30;
        if($permisstion_type=="administrator"||$permisstion_type=="editor"||$permisstion_type=="author"||$permisstion_type=="contributor"){
            if($_GET){
                if(isset($_GET['page'])){
                    $page=abs((int)stripslashes(strip_tags( $_GET['page']))*$quantity);
                    $data_page=get_all_page($quantity,$page);
                    $data_final=array();
                    foreach($data_page as $x){
                        $obj= new stdClass();
                        $obj->is_home=false;
                        $obj->id=$x->ID;
                        $obj->title=$x->post_title;
                        $obj->status=$x->post_status;
                        $obj->url=$x->post_url;
                        array_push($data_final,$obj);
                    }
                    send($data_final);

                }else{
                    send(array());
                }
            }else{
                send(array());
            }
        }else{
            send(array());
        }
    }else{
        send(array());
    }
}
 
 
 ?>