<?php 

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;

function get_all_contact($quantity,$offset){// search phone or email ~~ '' => get all
   global $wpdb;
   $table_prefix=$wpdb->prefix .'qc_order';
        $sql = $wpdb->prepare( "SELECT id,data,date_create FROM $table_prefix ORDER BY date_create DESC LIMIT %d OFFSET %d ",$quantity,$offset);
   $results = $wpdb->get_results( $sql , OBJECT );
   $rs=array();
   foreach($results as $x){
     $object = new stdClass();
     $object->id=$x->id;
     $object->value=json_decode($x->data);
     $object->time=$x->date_create;
     // $a=json_decode($x);
     array_push($rs,$object);
   }
   send($rs);
}
if(is_user_logged_in()){

     get_all_contact(25,0);
}

 ?>