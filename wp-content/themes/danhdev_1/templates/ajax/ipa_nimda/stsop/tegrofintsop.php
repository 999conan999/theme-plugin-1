<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;

function get_infor_post($id){
    global $wpdb;
    // get infor posst : ID, post_Date, title, content, *url post, status, meta-all
    $table_prefix=$wpdb->prefix .'posts';
    $sql = $wpdb->prepare( "SELECT ID,post_modified,post_content,post_title,post_status,post_author FROM $table_prefix WHERE ID= %s ",$id);
    $results = $wpdb->get_results( $sql , OBJECT );
    $result=$results[0];
    $author_id=$result->post_author;
    $result->author_name=get_the_author_meta( 'display_name' ,(int)$author_id );
    $result->post_url=get_permalink($id);
    $result->thumnail_url=get_post_meta($id,'thumnail_url', true);
    //
        $post_categories=(wp_get_post_categories($id));
        $result->categorys_result=$post_categories;
        //
        $post_tags=wp_get_post_tags($id);
        $tags_list=array();
        foreach($post_tags as $c){
            array_push($tags_list,$c->name);
        }
        $result->tags_list=$tags_list;

    
    $table_prefix=$wpdb->prefix .'postmeta';
    $sql = $wpdb->prepare( "SELECT meta_key,meta_value FROM $table_prefix WHERE post_id=%s AND meta_key <> '_edit_lock' ",$id);
    $a2 = $wpdb->get_results( $sql , OBJECT );
    $rs2=array();
    foreach($a2 as $x){
        $rs2[$x->meta_key]=$x->meta_value;
    }

    $result->meta_data=$rs2;
    return($result);
}
$object= new stdClass();
// if(is_user_logged_in()){
//     $id_user=get_current_user_id();
//     $user = wp_get_current_user();
//     $permisstion_type=$user->roles[0];
if(true){//[todo]
    $id_user=6;
    $permisstion_type="editor";

    //
    if($permisstion_type=="administrator"||$permisstion_type=="editor"){
        if($_GET){
            if(isset($_GET['idN'])){
                $idN=abs((int)stripslashes(strip_tags( $_GET['idN'])));
                if(get_post_status($idN)){
                    $data_post=get_infor_post($idN);
                    $object->id=$data_post->ID;
                    $object->categorys_result=$data_post->categorys_result;
                    $object->title_post=$data_post->post_title;
                    $object->content_post=$data_post->post_content;
                    $object->tags_result=$data_post->tags_list;
                    $object->thumnail_post=$data_post->thumnail_url;
                    $object->status=$data_post->post_status;
                    $object->meta_data=$data_post->meta_data;
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