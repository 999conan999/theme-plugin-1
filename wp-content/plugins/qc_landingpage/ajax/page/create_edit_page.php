<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;

function create_page($title,$content,$status,$metaA,$id_parent){
    $my_post = array(
        'post_title'    => $title,
        'post_content'  => $id_parent,
        'post_status'   => $status,
        'post_type'      => 'qc',
        'meta_input'    =>array(
            'metaA'=>$metaA,
        )
    );
    $post_ID=wp_insert_post( $my_post );
    $object = new stdClass();
    $object->id=$post_ID;
    $object->url=get_permalink($post_ID);
    $data_metaA=json_decode(stripslashes($metaA));
    $object->img=$data_metaA->thumnail;
    $object->title=$title;
    $object->status=$status;
    $object->kt=$data_metaA->data_qc->data_trick->kt;
    $object->price_og=$data_metaA->data_qc->data_trick->price;
    $object->price_sale=$data_metaA->data_qc->data_trick->sale;
    $object->short_des=$data_metaA->short_des;
    $object->id_parent=$id_parent;
    $object->metaA=$data_metaA;
    send($object);
}
function update_page($id,$title,$content,$status,$metaA,$id_parent){
    $my_post = array(
        'ID'            =>$id,
        'post_title'    => $title,
        'post_content'  => $id_parent,
        'post_status'   => $status,
        'post_type'      => 'qc',
        'meta_input'    =>array(
            'metaA'=>$metaA,
        )
    );
    $post_ID=wp_insert_post( $my_post );
    $object = new stdClass();
    $object->id=$id;
    $object->url=get_permalink($id);
    $data_metaA=json_decode(stripslashes($metaA));
    $object->img=$data_metaA->thumnail;
    $object->title=$title;
    $object->status=$status;
    $object->kt=$data_metaA->data_qc->data_trick->kt;
    $object->price_og=$data_metaA->data_qc->data_trick->price;
    $object->price_sale=$data_metaA->data_qc->data_trick->sale;
    $object->short_des=$data_metaA->short_des;
    $object->id_parent=$id_parent;
    $object->metaA=$data_metaA;
    send($object);
}
if(is_user_logged_in()){
    if($_POST){
        $id=(int)$_POST['id']; // id =-1 >create || update
        $title=$_POST['title']; // "tieu de"
        $content=$_POST['content'];// "noi dung"
        $status=$_POST['status'];//'publish'
        $metaA=$_POST['metaA'];//
        $id_parent=$_POST['id_parent'];//
        if($id==-1){// create new post 93
            create_page($title,$content,$status,$metaA,$id_parent);
        }else{
            update_page($id,$title,$content,$status,$metaA,$id_parent);
        }
 
    }else{
        $object = new stdClass();
        send($object);
    }
}













?>