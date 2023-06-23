<?php 

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;

if(is_user_logged_in()){
    if($_POST){
        $value=$_POST['value']; // teen option
        if(get_option('API_telegram')==false){
            // // tao moi vi chua co
            $rs=add_option('API_telegram',$value,'','no');
            $object = new stdClass();
            $object->status=$rs;
            send($object);
        }else{
            // da co roi, chi can update
            $rs=update_option('API_telegram',$value);
            $object = new stdClass();
            $object->status=$rs;
            send($object);
        }
    }
}
?>