<?php 
    $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
    require_once( $parse_uri[0] . 'wp-load.php' );
    if (!function_exists('is_plugin_active')) {
        include_once(ABSPATH . 'wp-admin/includes/plugin.php');
       }

    function delete_img_by_id($id,$permisstion_type){
        $name= explode("uploads",get_post_meta( $id, '_wp_attached_file', true ));
        $uploads = wp_get_upload_dir();
        $file = $uploads['basedir'] . $name[1];
        wp_delete_file($file);
        $rs_delete_attach= wp_delete_attachment($id,false);
        if($rs_delete_attach!=NULL){
            $object = new stdClass();
            $object->status=true;
            $object->id=$id;
            $object->$permisstion_type=$permisstion_type;
            return $object;
        }else{
            $object = new stdClass();
            $object->status=false;
            $object->id=$id;
            $object->$permisstion_type=$permisstion_type;
            return $object;
        }
    }
if(is_plugin_active('zsharevn-landing-page/index.php')){

    if(is_user_logged_in()){
        $id_user=get_current_user_id();
        $user = wp_get_current_user();
        $permisstion_type=$user->roles[0];
        
        if($permisstion_type=="administrator"||$permisstion_type=="editor"||$permisstion_type=="author"){
            if($_POST){
                $idN=(int)$_POST['idN'];
                send(delete_img_by_id($idN,$permisstion_type));
            }
        }else{
            $object = new stdClass();
            $object->status=false;
            $object->$permisstion_type=$permisstion_type;
            send($object);
        }

    }else{
        $object = new stdClass();
        $object->status=false;
        $object->$permisstion_type=$permisstion_type;
        send($object);
    }
}
?>