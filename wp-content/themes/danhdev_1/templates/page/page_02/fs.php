<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;

if(isset($_POST['ma_code'])&&isset($_POST['id'])){
$ma_code=(stripslashes($_POST['ma_code']));
$id=(int)stripslashes($_POST['id']);
$metaA=json_decode(get_post_meta($id,'metaA', true));
$rs='';
foreach($metaA->data_redirect_code->list_code as $code){
    if($code->ma_code==$ma_code){
        $rs=$code->url;
    }
}
$object = new stdClass();
if($rs==''){
    $object->url='';
    $object->status=false;
}else{
    $object->url=$rs;
    $object->status=true;
}
send($object);
}

?>