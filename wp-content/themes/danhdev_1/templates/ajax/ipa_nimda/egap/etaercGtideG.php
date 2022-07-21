<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;

function create_page($titleS,$contentS,$statusS,$metaA,$thumnailS){
    $my_post = array(
        'post_title'    => $titleS,
        'post_content'  => $contentS,
        'post_status'   => $statusS,
        'post_type'      => 'page',
        'meta_input'    =>$metaA
    );
    $post_ID=wp_insert_post( $my_post );
    add_post_meta($post_ID,'thumnail_url',$thumnailS, true);
    return $post_ID;
}
function update_page($idN,$titleS,$contentS,$statusS,$metaA,$thumnailS){
    $my_post = array(
        'ID'            =>$idN,
        'post_title'    => $titleS,
        'post_content'  => $contentS,
        'post_status'   => $statusS,
        'post_type'      => 'page',
        'meta_input'    =>$metaA
    );
    $post_ID=wp_update_post( $my_post );
    if(isset($thumnailS)&&$thumnailS!=""){
        update_post_meta( $post_ID, 'thumnail_url', $thumnailS);
    }
    return $post_ID;
}
function send_data_return($id){
    $object = new stdClass();
    $object->id=$id;
    $object->status='ok';
    $object->url=get_permalink($id);
    //
    send($object);
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
        $idN=(int)$_POST['idN']; // id =-1 >create || update
        $titleS=$_POST['titleS']; // "tieu de"
        $contentS=$_POST['contentS'];// "noi dung"
        $statusS=$_POST['statusS'];//'publish'
        $metaA=($_POST['metaA'])!="null"?$_POST['metaA']:array();//
        $thumnailS=$_POST['thumnailS'];//"anbinhnew.com"
        
        if($permisstion_type=="administrator"||$permisstion_type=="editor"){// create, edit full permisstion
            if($idN==-1){// create new post 93
                $id=create_page($titleS,$contentS,$statusS,$metaA,$thumnailS);
                send_data_return($id);
                // $object = new stdClass();
                // $object->id=$id;
                // $object->status='ok';
                // send($object);
            }else{
                $id=update_page($idN,$titleS,$contentS,$statusS,$metaA,$thumnailS);
                send_data_return($id);
                // $object = new stdClass();
                // $object->id=$id;
                // $object->status='ok';
                // send($object);
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















?>