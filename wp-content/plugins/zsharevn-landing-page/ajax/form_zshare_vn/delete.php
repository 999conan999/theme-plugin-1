<?php 

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;
if (!function_exists('is_plugin_active')) {
     include_once(ABSPATH . 'wp-admin/includes/plugin.php');
    }
function delete_contact_by_id($id){// search phone or email ~~ '' => get all
     global $wpdb;
     $table = $wpdb->prefix . 'contacts_form';
     $delete = $wpdb->delete(
     $table,
     array( 'id' => $id ),
     array( '%d' )
     );
}
if(is_plugin_active('zsharevn-landing-page/index.php')){
     $object = new stdClass();
     $object->status=false;
     if(is_user_logged_in()==false){
         $id_user=get_current_user_id();
         $user = wp_get_current_user();
         $permisstion_type="administrator";
          if($permisstion_type=="administrator"||$permisstion_type=="editor"||$permisstion_type=="author"){
                         
               if(isset($_POST['id'])){
                    $id=(int)stripslashes(strip_tags($_POST['id']));
                    delete_contact_by_id($id);
                    $object->status=true;
               }
          }
     }
     send($object);
}
 ?>