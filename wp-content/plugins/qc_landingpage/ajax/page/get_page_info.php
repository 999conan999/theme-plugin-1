<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;

function get_qc_infor($id){
    $metaA=get_post_meta($id,'metaA', true);
    $data_metaA=json_decode(($metaA));
    if($data_metaA->id_parent!=-1){
        $data_metaA->data_qc->dm=return_dm_fix($data_metaA->top->top_1,$data_metaA->top->top_2,$data_metaA->id_parent,$data_metaA)->dm;
    }else{
        $data_metaA->data_qc->dm=return_dm_fix($data_metaA->top->top_1,$data_metaA->top->top_2,$data_metaA->id_parent,$data_metaA)->dm;
    }
    send($data_metaA);
}
 
if(is_user_logged_in()){
    $object= new stdClass();
    if($_GET){
        $idN=abs((int)stripslashes(strip_tags( $_GET['id'])));
        get_qc_infor($idN);
    } 
}
?>