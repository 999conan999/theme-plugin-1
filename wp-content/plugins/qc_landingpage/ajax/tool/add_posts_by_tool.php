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
}

if(is_user_logged_in()){
    $object = new stdClass();
    if($_POST){
        if($_POST['data_list']!=""){
            $data_list=json_decode(stripslashes($_POST['data_list']));
            if(count($data_list)>0){
                foreach($data_list as $x){
                    // $id=$x->id;
                    $title=$x->title;
                    $content=$x->content;
                    $status=$x->status;
                    $id_parent=$x->id_parent;
                    $metaA=$x->metaA;
                    create_page($title,$content,$status,$metaA,$id_parent);
                }
                $object->status=true;
                send($object);
            }else{
                $object->status=false;
                send($object);
            }
        }
    }else{
        $object->status=false;
        send($object);
    }
}












?>