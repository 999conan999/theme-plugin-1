<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;
if (!function_exists('is_plugin_active')) {
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
   }
function delete_page_by_id($id){
    wp_delete_post($id,true);
}
if(is_plugin_active('zsharevn-landing-page/index.php')){

    if(is_user_logged_in()){
        $id_user=get_current_user_id();
        $user = wp_get_current_user();
        $permisstion_type=$user->roles[0];
        //
        if($_POST){
            $idN=(int)$_POST['idN'];
            if($permisstion_type=="administrator"||$permisstion_type=="editor"){// remove full permisstion
                delete_page_by_id($idN);
                $object = new stdClass();
                $object->id=$idN;
                $object->status='ok';
                send($object);
            }else{
                $object = new stdClass();
                $object->id=$idN;
                $object->status='fail';
                send($object);
            }
        }else{
            $object = new stdClass();
            $object->status='fail';
            send($object);
        }
    }else{
        $object = new stdClass();
        $object->status='fail';
        send($object);
    }
}
?>