<?php 

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;


if(is_user_logged_in()){
            $value=get_option('setups_qc');
            if($value!=false){
                $data=json_decode(stripslashes($value));
                $object = new stdClass();
                $object->status=true;
                $object->common=$data;
                send($object);
            }else{
                $object = new stdClass();
                $object->status=false;
            }
}

?>