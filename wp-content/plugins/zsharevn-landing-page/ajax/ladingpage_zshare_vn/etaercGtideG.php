<?php
    $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
    require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;
    if (!function_exists('is_plugin_active')) {
     include_once(ABSPATH . 'wp-admin/includes/plugin.php');
    }
    // echo plugin_dir_url(__FILE__);
    // is_plugin_active('zsharevn-landing-page/index.php');
    
function create_landing_page($titleS,$contentS,$statusS,$metaA){
    $my_post = array(
        'post_title'    => $titleS,
        'post_content'  => $contentS,
        'post_status'   => $statusS,
        'post_type'      => 'zshare',
        'meta_input'    =>$metaA
    );
    $post_ID=wp_insert_post( $my_post );
    return $post_ID;
}
function update_landing_page($idN,$titleS,$contentS,$statusS,$metaA){
    $my_post = array(
        'ID'            =>$idN,
        'post_title'    => $titleS,
        'post_content'  => $contentS,
        'post_status'   => $statusS,
        'post_type'      => 'zshare',
        'meta_input'    =>$metaA
    );
    $post_ID=wp_update_post( $my_post );
    return $post_ID;
}
//
function send_data_return($id){
    $object = new stdClass();
    $object->id=$id;
    $object->status='ok';
    $object->url=get_permalink($id);
    //
    send($object);
}

if(is_plugin_active('zsharevn-landing-page/index.php')){

    if(is_user_logged_in()==false){
        $id_user=get_current_user_id();
        $user = wp_get_current_user();
        $permisstion_type="administrator";
        
        if($_POST){
            $idN=(int)$_POST['idN']; // id =-1 >create || update
            $titleS=$_POST['titleS']; // "tieu de"
            $contentS=$_POST['contentS'];// "noi dung"
            $statusS=$_POST['statusS'];//'publish'
            $metaA=($_POST['metaA'])!="null"?$_POST['metaA']:array();//
            
            if($permisstion_type=="administrator"||$permisstion_type=="editor"||$permisstion_type=="author"||$permisstion_type=="contributor"){// create, edit full permisstion
                if($idN==-1){// create new post 93
                    $id=create_landing_page($titleS,$contentS,$statusS,$metaA);
                    send_data_return($id);
                }else{
                    $id=update_landing_page($idN,$titleS,$contentS,$statusS,$metaA);
                    send_data_return($id);
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
    }else{
        $object = new stdClass();
        $object->status='fail';
        send($object);
    }
}


?>