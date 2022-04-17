<?php 
    $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
    require_once( $parse_uri[0] . 'wp-load.php' );

    
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

if(true){//[todo]
    $id_user=6;
    $permisstion_type="editor";
// if(is_user_logged_in()){
//     $user = wp_get_current_user();
//     $permisstion_type=$user->roles[0];
//
        if($permisstion_type=="administrator"||$permisstion_type=="editor"){
            if($_POST){
                $keyz=stripslashes($_POST['keyz']);
                $valuez =stripslashes($_POST['valuez']);
                $status= update_setup($keyz,$valuez);
                $objects = new stdClass();
                $objects->status=true;
                send($objects);
            }else{
                $object = new stdClass();
                $object->status=false;
                send($object);
            } 
        }else{
            $object = new stdClass();
            $object->status=false;
            send($object);
        } 
    }else{
        $object = new stdClass();
        $object->status=false;
        send($object);
    }









?>