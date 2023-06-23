<?php 

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;


if(is_user_logged_in()){

            $value=get_option('API_telegram');
            $object = new stdClass();
            if($value!=false){
                $object->API=$value;
            }else{
                $object->API='';
            }
            send($object);
}

?>