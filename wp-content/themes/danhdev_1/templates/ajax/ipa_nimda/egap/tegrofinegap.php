<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;

function get_infor_page($id){
    global $wpdb;
    // get infor posst : ID, post_Date, title, content, *url post, status, meta-all
    $table_prefix=$wpdb->prefix .'posts';
    $sql = $wpdb->prepare( "SELECT ID,post_content,post_title,post_status FROM $table_prefix WHERE ID= %s ",$id);
    $results = $wpdb->get_results( $sql , OBJECT );
    $result=$results[0];
    $result->post_url=get_permalink($id);
    $result->thumnail_url=get_post_meta($id,'thumnail_url', true);
    //   
    $table_prefix=$wpdb->prefix .'postmeta';
    $sql = $wpdb->prepare( "SELECT meta_key,meta_value FROM $table_prefix WHERE post_id=%s AND meta_key <> '_edit_lock' AND meta_key <> '_wp_page_template' AND meta_key <> '_wp_trash_meta_status' AND meta_key <> '_wp_trash_meta_time' ",$id);
    $a2 = $wpdb->get_results( $sql , OBJECT );
    $rs2=array();
    foreach($a2 as $x){
        $rs2[$x->meta_key]=$x->meta_value;
    }

    $result->meta_data=$rs2;
    return($result);
}
$object= new stdClass();


if(true){//[todo]
    $id_user=6;
    $permisstion_type="editor";
// if(is_user_logged_in()){
//     $id_user=get_current_user_id();
//     $user = wp_get_current_user();
//     $permisstion_type=$user->roles[0];
    //
    if($permisstion_type=="administrator"||$permisstion_type=="editor"){
        if($_GET){
            if(isset($_GET['idN'])){
                $idN=abs((int)stripslashes(strip_tags( $_GET['idN'])));
                if(get_post_status($idN)){
                    //
                    $data_page=get_infor_page($idN);
                    $object->id=$data_page->ID;
                    $object->thumnail_url=$data_page->thumnail_url;
                    $object->title_post=$data_page->post_title;
                    $object->content_post=$data_page->post_content;
                    $object->status=$data_page->post_status;
                    $object->metaA=$data_page->meta_data;
                    send($object);
                }else{
                    send(null);
                 }
            }else{
                send(null);
             }
        }else{
            send(null);
         }
    }else{
        send(null);
     }
}else{
    send(null);
    }
?>