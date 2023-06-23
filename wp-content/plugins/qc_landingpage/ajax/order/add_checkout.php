<?php 
    $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
    require_once( $parse_uri[0] . 'wp-load.php' );
 


    function create_form($data,$phone){
        $data = array(
            'data'=> $data,
            'phone'=> $phone,
            'date_create' => current_time('mysql'),
        );
        global $wpdb;
        $table = $wpdb->prefix . 'qc_order';
        $rs=$wpdb->insert(
            $table,
            $data
        );
    }
    $object = new stdClass();
    $object->status=false;
    if(isset($_POST['data'])){
        $data=stripslashes(strip_tags($_POST['data']));
        $phone=stripslashes(strip_tags($_POST['phone']));
        if($data!=''){
            $object->status=true;
            // ghi order
            create_form($data,$phone);
            send($object);
        }else{
            $object->status=false;
            send($object);
        }
    }else{
        $object->status=false;
        send($object);
    }
 

    

    

?>