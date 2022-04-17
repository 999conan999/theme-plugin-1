<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;
function delete_category($id){
   return wp_delete_category($id);
}

if(true){//[todo]
    $id_user=6;
    $permisstion_type="editor";
// if(is_user_logged_in()){
//     $user = wp_get_current_user();
//     $permisstion_type=$user->roles[0];
    if($_POST){
        $idN=(int)$_POST['idN'];
        if($permisstion_type=="administrator"||$permisstion_type=="editor"){// remove full permisstion
           $rs= delete_category($idN);
            $object = new stdClass();
            $object->id=$idN;
            $object->status='ok';
            $object->rs=$rs;
            send($object);
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
}else{
    $object = new stdClass();
    $object->status='fail';
    send($object);
}
?>