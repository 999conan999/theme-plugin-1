<?php 
    $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
    require_once( $parse_uri[0] . 'wp-load.php' );

    
function create_form($namez,$phonez,$addressz,$cityz,$orderz,$genderz,$costz,$emailz,$typez,$dataz){
    $data = array(
        'namez'=> $namez,
        'phonez' => $phonez,
        'addressz' => $addressz,
        'cityz' => $cityz,
        'orderz' => $orderz,
        'genderz' => $genderz,
        'costz' => $costz,
        'emailz' => $emailz,
        'typez' => $typez,
        'dataz' => $dataz,
        'datez' => current_time( 'mysql'),
    );
    global $wpdb;
    $table = $wpdb->prefix . 'contacts_form';
    $wpdb->insert(
        $table,
        $data
    );
}
    $object = new stdClass();
    $object->status=false;
    if(isset($_POST['data'])){
        $data=stripslashes(strip_tags($_POST['data']));
        create_form('','','','','','','','','theme',$data);
        $object->status=true;
    }
    send($object);
?>