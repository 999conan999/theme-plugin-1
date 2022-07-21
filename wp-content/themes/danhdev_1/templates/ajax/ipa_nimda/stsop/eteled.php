<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;
function delete_post_by_id($id){
    wp_delete_post($id,false);
}
function check_post_create_by_user($id_user,$id_post){
    global $wpdb;
    $table_prefix=$wpdb->prefix .'posts';
            $sql = $wpdb->prepare( "SELECT COUNT(ID) FROM $table_prefix WHERE post_author=%d AND ID=%d",$id_user,$id_post);
    $results = $wpdb->get_results( $sql , ARRAY_A );
    $v=$results[0]["COUNT(ID)"];
    if($v==0){
        return false;
    }else{
        return true;
    }
}

if(true){
    $id_user=6;
    $permisstion_type="editor";
//[todo]
// if(is_user_logged_in()){
//     $id_user=get_current_user_id();
//     $user = wp_get_current_user();
//     $permisstion_type=$user->roles[0];
    //
    if($_POST){
        $idN=(int)$_POST['idN'];
        if($permisstion_type=="administrator"||$permisstion_type=="editor"){// remove full permisstion
            delete_post_by_id($idN);
            $object = new stdClass();
            $object->id=$idN;
            $object->status='ok';
            send($object);
        }elseif($permisstion_type=="author"||$permisstion_type=="contributor"){//remove just for own user
            if(check_post_create_by_user($id_user,$idN)){
                delete_post_by_id($idN);
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