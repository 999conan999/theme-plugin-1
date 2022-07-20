<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;

function get_infor_category($id){
    $id=(int)$id;
    $cat = get_category( $id);
    $object = new stdClass();
    $object->category_id=$cat->term_id;
    $object->category_title=$cat->name;
    $object->category_content=$cat->description;
    $object->thumnail_post=get_term_meta($id,'thumnail_url', true);
    $object->categorys_result=$cat->parent;
    global $wpdb;
    $table_prefix=$wpdb->prefix .'termmeta';
    $sql = $wpdb->prepare( "SELECT meta_key,meta_value FROM $table_prefix WHERE term_id=%s AND meta_key <> '_edit_lock' ",$id);
    $a2 = $wpdb->get_results( $sql , OBJECT );
    $rs2=array();
    foreach($a2 as $x){
        $rs2[$x->meta_key]=$x->meta_value;
    }
    $object->metaA=$rs2;
    return($object);
}
function get_all_categorys(){
    global $wpdb;
    $table_prefix=$wpdb->prefix .'term_taxonomy';
    $sql = $wpdb->prepare( "SELECT term_id,parent FROM $table_prefix WHERE taxonomy ='category' ORDER BY term_id ASC");
    $results = $wpdb->get_results( $sql , OBJECT );
    $arr=array();
    foreach($results as $x){
        $obj= new stdClass();
        $obj->key=$x->term_id;
        $obj->value=$x->term_id;
       $cat = get_category( $x->term_id);
       $obj->text=$cat->name;
       array_push($arr,$obj);
    }
    return $arr;
}
function check_is_category($id){
    global $wpdb;
    $table_prefix=$wpdb->prefix .'term_taxonomy';
            $sql = $wpdb->prepare( "SELECT COUNT(term_id) FROM $table_prefix WHERE term_id=%d AND taxonomy='category'",$id);
    $results = $wpdb->get_results( $sql , ARRAY_A );
    $v=$results[0]["COUNT(term_id)"];
    if($v==0){
        return false;
    }else{
        return true;
    }
}
$object= new stdClass();
if(true){//[todo]
    $id_user=6;
    $permisstion_type="editor";
// if(is_user_logged_in()==false){
//     $id_user=get_current_user_id();
//     $user = wp_get_current_user();
//     $permisstion_type="administrator";
    //
    if($permisstion_type=="administrator"||$permisstion_type=="editor"){
        if($_GET){
            if(isset($_GET['idN'])){
                $idN=abs((int)stripslashes(strip_tags( $_GET['idN'])));
                if(check_is_category($idN)){
                    
                    $data_cate=get_infor_category($idN);
                    $object->id=$data_cate->category_id;
                    $object->title_post=$data_cate->category_title;
                    $object->content_post=$data_cate->category_content;
                    $object->thumnail_post=$data_cate->thumnail_post;
                    $object->categorys_result=$data_cate->categorys_result;
                    $object->metaA=$data_cate->metaA;
                    // $object->categorys_list= get_all_categorys();
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