<?php 

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;

function get_all_pages($id){
   
   global $wpdb;
   $table_prefix=$wpdb->prefix .'posts';
        $sql = $wpdb->prepare( "SELECT ID,post_title,post_status FROM $table_prefix WHERE post_type ='qc' AND  post_status <> 'trash' AND post_status <> 'auto-draft' AND post_content='%d' ORDER BY post_date DESC",$id);
        $results = $wpdb->get_results( $sql , OBJECT );
        $rs=array();
        foreach($results as $x){
            $object = new stdClass();
            $object->id=$x->ID;
            $object->url=get_permalink($x->ID);
            $metaA=get_post_meta($x->ID,'metaA', true);
            $data_metaA=json_decode($metaA);
            $object->img=$data_metaA->thumnail;
            $object->title=$x->post_title;
            $object->price_og=$data_metaA->data_qc->data_trick->price;
            $object->price_sale=$data_metaA->data_qc->data_trick->sale;
            $object->short_des=$data_metaA->short_des;
            array_push($rs,$object);
            }
            send($rs);
}

if(is_user_logged_in()){
      if($_GET){
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                get_all_pages($id);
            }else{
                send(array());
             }
        }else{
            send(array());
         }
}
 
 

    
 

 
 
 
 
 
 
 ?>