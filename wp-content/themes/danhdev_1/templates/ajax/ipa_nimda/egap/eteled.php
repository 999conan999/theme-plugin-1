<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;
function delete_page_by_id($id){
    wp_delete_post($id,false);
}

if(true){//[todo]
    $id_user=6;
    $permisstion_type="editor";
// if(is_user_logged_in()){
//     $id_user=get_current_user_id();
//     $user = wp_get_current_user();
//     $permisstion_type=$user->roles[0];
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
?>