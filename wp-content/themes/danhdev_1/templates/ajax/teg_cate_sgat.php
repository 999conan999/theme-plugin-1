<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;

// var_dump(get_infor_post(88));
function get_all_tags(){
    $tags = get_tags(array(
        'taxonomy' => 'post_tag',
        'orderby' => 'name',
        'hide_empty' => false // for development
      ));
    $tags_list=array();
    foreach($tags as $c){
        $object = new stdClass();
        $object->key=$c->name;
        $object->value=$c->name;
        $object->text=$c->name;
        array_push($tags_list,$object);
    }
    return $tags_list;
}
function get_all_categorys(){
    global $wpdb;
    $table_prefix=$wpdb->prefix .'term_taxonomy';
    $sql = $wpdb->prepare( "SELECT term_id,parent FROM $table_prefix WHERE taxonomy ='category' ORDER BY term_id ASC");
    $results = $wpdb->get_results( $sql , OBJECT );
    $arr=array();
    foreach($results as $x){
        $obj= new stdClass();
        $obj->key=(int)($x->term_id);
        $obj->value=(int)($x->term_id);
       $cat = get_category( $x->term_id);
       $obj->text=$cat->name;
       array_push($arr,$obj);
    }
    return $arr;
}
$object= new stdClass();

if(true){// [todo]
// if(is_user_logged_in()==false){
    $object->categorys_list=get_all_categorys();
    $object->tags_all=get_all_tags();
    send($object);
}else{
    send(null);
    }
?>