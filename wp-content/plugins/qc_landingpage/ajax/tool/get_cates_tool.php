<?php 

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;

function get_all_pages($id){
   
   global $wpdb;
   $table_prefix=$wpdb->prefix .'posts';
        $sql = $wpdb->prepare( "SELECT ID,post_title FROM $table_prefix WHERE post_type ='qc' AND  post_status <> 'trash' AND post_status <> 'auto-draft' AND post_content='%d' ORDER BY post_date DESC",$id);
        $results = $wpdb->get_results( $sql , OBJECT );
        $rs=array();
        foreach($results as $x){
            $object = new stdClass();
            $object->id=$x->ID;
            $metaA=get_post_meta($x->ID,'metaA', true);
            $data_metaA=json_decode($metaA);
            $object->img=$data_metaA->thumnail;
            $object->title=$x->post_title;
            $object->metaA=$data_metaA;
            array_push($rs,$object);
            }
            send($rs);
}

if(is_user_logged_in()){
    get_all_pages(-1);
}
 
 

    
 

 
 
 
 
 
 
 ?>