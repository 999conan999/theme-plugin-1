<?php 

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;

function get_all_contact($data_search,$quantity,$offset){// search phone or email ~~ '' => get all
   global $wpdb;
   $table_prefix=$wpdb->prefix .'contacts_form';
   if($data_search==''){
        $sql = $wpdb->prepare( "SELECT id,namez,phonez,addressz,cityz,orderz,genderz,costz,emailz,typez,datez,dataz FROM $table_prefix ORDER BY datez DESC LIMIT %d OFFSET %d ",$quantity,$offset);
   }else{
        $sql = $wpdb->prepare( "SELECT id,namez,phonez,addressz,cityz,orderz,genderz,costz,emailz,typez,datez,dataz FROM $table_prefix WHERE phone LIKE %s OR email LIKE %s ORDER BY datez DESC LIMIT %d OFFSET %d ",'%'.$data_search.'%','%'.$data_search.'%',$quantity,$offset);
   }
   $results = $wpdb->get_results( $sql , OBJECT );
   return($results);
}

// var_dump(get_all_contact('',2,2));
$list_data=array();
 if(isset($_GET['page'])){
      $page=(int)stripslashes($_GET['page']);
      $list_data=get_all_contact('',25,$page*25);
 }
 send($list_data);
 
 ?>