<?php 

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;

function delete_contact_by_id($id){// search phone or email ~~ '' => get all
     global $wpdb;
     $table = $wpdb->prefix . 'contacts_form';
     $delete = $wpdb->delete(
     $table,
     array( 'id' => $id ),
     array( '%d' )
     );
     //
     $x=(int)get_data_theme('contact_count')->data;
     if($x>0){
          $x=$x-1;
          update_setup('contact_count',$x);
     }
}
function get_data_theme($keyz){
     // var_dump( check_keyz_is_create($keyz));
     global $wpdb;
     $table_prefix = $wpdb->prefix . 'data_theme';
     $sql = $wpdb->prepare( "SELECT keyz,valuez FROM $table_prefix WHERE keyz =%s ",$keyz);
     $results = $wpdb->get_results( $sql , OBJECT );
     if(count($results)>0){
         $objects = new stdClass();
         $objects->keyz=$keyz;
         $objects->data=json_decode($results[0]->valuez);
         return $objects;
     }else{
         $objects = new stdClass();
         $objects->keyz=$keyz;
         $objects->data="null";
         return $objects;
     }
}
function update_setup($keyz,$valuez){
    $is_created_keyz=check_keyz_is_create($keyz);
    global $wpdb;
    $table = $wpdb->prefix . 'data_theme';
    if($is_created_keyz){
        $data = array(
            'keyz'=> $keyz,
            'valuez' => $valuez
        );

        $update = $wpdb->update(
            $table,
            $data,
            array('keyz' => $keyz)
        );
    }else{
            $data = array(
                'keyz'=> $keyz,
                'valuez' => $valuez
            );
            $rs = $wpdb->insert(
                $table,
                $data
            );
    }
}
function check_keyz_is_create($keyz){
     global $wpdb;
     $table_prefix = $wpdb->prefix . 'data_theme';
     $sql = $wpdb->prepare( "SELECT COUNT(id) FROM $table_prefix WHERE keyz=%s",$keyz);
     $results = $wpdb->get_results( $sql , ARRAY_A );
     $z=(int)($results[0]["COUNT(id)"]);
     if($z>0) return true;
     return false;
 }
$object = new stdClass();
$object->status=false;
// if(is_user_logged_in()==false){
//     $id_user=get_current_user_id();
//     $user = wp_get_current_user();
//     $permisstion_type="administrator";
if(true){//[todo]
     $id_user=6;
     $permisstion_type="editor";
 
     //
     if($permisstion_type=="administrator"||$permisstion_type=="editor"||$permisstion_type=="author"){
                    
          if(isset($_POST['id'])){
               $id=(int)stripslashes(strip_tags($_POST['id']));
               delete_contact_by_id($id);
               $object->status=true;
          }
     }
}
send($object);
 ?>